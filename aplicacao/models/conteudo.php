<?php
class Conteudo extends CI_Model 
{
    
    public $idConteudo;
    public $idCategoria;
    public $ordem;
    public $idUsuario;
    public $idConteudoPai;
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Recife');
    }
    
    function retornarObjeto($id)
    {	
        $query = $this->db->get_where('Conteudo', array('idConteudo' => $id));
        $objConteudo = $query->row(0,'Conteudo');        
        return $objConteudo;
    }
    
    function categoria()
    {
        $this->load->model('Categoria');
        $query = $this->db->get_where('Categoria', array('idCategoria' => $this->idCategoria));
        return $query->row(0,'Categoria');
    }
    
    public function valores()
    {	
    	$this->load->model('Valor');
    	$this->load->model('Campo');
    	
    	$query = $this->db->get_where('Campo', array('idCategoria' => $this->idCategoria));
    	$lstCampos = $query->result('Campo');
    	
    	if(is_array($lstCampos) && count($lstCampos) > 0)
    	{
    		foreach($lstCampos as $objCampo)
    		{
    			if($objCampo->id != "selOrdem")
    			{
    				if($objCampo->atributo != "")
    					$nome_campo = slug($objCampo->atributo);
    				else
    					$nome_campo = slug($objCampo->nome);
    				$this->$nome_campo = "";
    			}
    		}
    	
    	}
    	
    	$this->db->select('v.*, c.ordem, c.nome, c.tipo_dado as tipo, c.id, c.atributo');
    	$this->db->from('Valor v');
    	$this->db->join('Campo c', 'v.idCampo = c.idCampo');
    	$this->db->where('v.idConteudo', $this->idConteudo);
    	$query = $this->db->get();
    	$lstValores = $query->result('Valor');
    	
    	if(is_array($lstValores) && count($lstValores) > 0)
    	{
    		foreach($lstValores as $objValor)
    		{
    			//$nome_campo = slug2($objValor->nome);
    			if($objValor->id != "selOrdem")
    			{
    				/**/
    				if($objValor->atributo != "")
    					$nome_campo = slug($objValor->atributo);
    				else
    					$nome_campo = slug($objValor->nome);
    				$this->$nome_campo = "";
    				/**/
    				
    				switch($objValor->tipo)
    				{
    					case 'text': $this->$nome_campo = $objValor->texto; break;
    					case 'numero': $this->$nome_campo = $objValor->numero; break;
    					case 'char': $this->$nome_campo = $objValor->char; break;
    					case 'data_hora': $this->$nome_campo = $objValor->data_hora; break;
    				}
    			}
    	
    		}
    	}
    	return $this;
    }
        
    function valor($campo,$tipo)
    {
        $this->load->model('Valor');
        
        $this->db->select('v.*, c.ordem');
        $this->db->from('Valor v');
        $this->db->join('Campo c', 'v.idCampo = c.idCampo');
        $this->db->where('v.idConteudo', $this->idConteudo);
        $this->db->where('c.ordem', $campo);
        $query = $this->db->get();
        $objValor = $query->row(0, 'Valor');
        
        /*$query = $this->db->get_where('Valor', array('idConteudo' => $this->idConteudo, 'idCampo' => $campo));
        $objValor = $query->row(0,'Valor');*/
        
        if(is_object($objValor))
        {
            switch($tipo)
            {
                case 'texto': return $objValor->texto; break;
                case 'numero': return $objValor->numero; break;
                case 'char': return $objValor->char; break;
                case 'data_hora': return $objValor->data_hora; break;
            }
        }
        else
            return "";
        
    }
    
    function usuario()
    {
        $this->load->model('Usuario');
        $query = $this->db->get_where('Usuario', array('idUsuario' => $this->idUsuario));
        return $query->row(0,'Usuario');
    }
    
    function conteudoPai()
    {
        $query = $this->db->get_where('Conteudo', array('idConteudo' => $this->idConteudoPai));
        return $query->row(0,'Conteudo');
    }
    
    function salvar()
    {
        if(isset($this->idConteudo))
        {
            $this->db->update('Conteudo', $this, array('idConteudo' => $this->idConteudo));
        }
        else
        {
            $this->db->insert('Conteudo', $this); 
            $this->idConteudo = $this->db->insert_id();
        }
    }
    
    function remover()
    {
        $this->db->delete('Conteudo', array('idConteudo' => $this->idConteudo)); 
    }
    
    function remover_valores()
    {
        $this->db->delete('Valor', array('idConteudo' => $this->idConteudo)); 
    }
    
    function arquivo()
    {
        $this->load->model('Arquivo');
        $query = $this->db->get_where('Arquivo', array('idConteudo' => $this->idConteudo));
        return $query->row(0,'Arquivo');
    }
    
    function arquivos($limit=null,$offset=null,$order=null,$descricao=null,$destaque=null)
    {
        $this->load->model('Arquivo');
        if($descricao != "")
            $this->db->like('descricao', $descricao);
        if($destaque != "")
            $this->db->where('destaque', "1"); 
        if($order != "")
            $this->db->order_by($order); 
        $query = $this->db->get_where('Arquivo', array('idConteudo' => $this->idConteudo),$limit,$offset);
        return $query->result('Arquivo');
    }
    
    function imagens($limit=null,$offset=null,$order=null,$descricao=null,$destaque=null)
    {
        $this->load->model('Imagem');
        if($descricao != "")
            $this->db->like('descricao', $descricao);
        if($destaque != "")
            $this->db->where('destaque', "1"); 
        if($order != "")
            $this->db->order_by($order); 
        $query = $this->db->get_where('Imagem', array('idConteudo' => $this->idConteudo),$limit,$offset);
        return $query->result('Imagem');
        
    }
    
    function imagem($tamanho=null)
    {
        $this->load->model('Imagem');
        $query = $this->db->get_where('Imagem', array('idConteudo' => $this->idConteudo));
        $objImagem = $query->row(0,'Imagem');
        
        if(is_object($objImagem))
        {
            if($tamanho != "")
            {
                $this->load->model('Tamanho');
                $query = $this->db->get_where('Tamanho', array('idImagem' => $objImagem->idImagem,'tamanho' => $tamanho));
                $objTamanho = $query->row(0,'Tamanho');
                if(is_object($objTamanho) && $objTamanho->idImagem == $objImagem->idImagem)
                {
                    $objImagem->caminho = $objTamanho->caminho;
                    $objImagem->tamanho = $tamanho;
                }
            }
            return $objImagem;
                
        }   
        else
            return null;
    }
    
    function imagemDestaque()
    {
        $this->load->model('Imagem');
        $query = $this->db->get_where('Conteudo', array('idConteudo' => $this->idConteudo,'destaque' => '1'));
        return $query->row(0,'Imagem');
    }
    
    function conteudos($limit=null,$offset=null,$order=null,$plchave=null)
    {
        if($descricao != "")
            $this->db->like('titulo', $plchave);
        if($order != "")
            $this->db->order_by($order); 
        $query = $this->db->get('Conteudo', array('idConteudoPai' => $this->idConteudo),$limit,$offset);
        return $query->result('Conteudo');
    }
    
    function ultimos($limit=null, $offset=null, $lstCategorias = Array())
    {
    	$lstCategorias = range(1, 200); // melhorar isso
    	
    	$this->load->model('Conteudo');
    	$this->db->where_in('idCategoria', $lstCategorias);
    	$this->db->order_by("dtModificacao DESC");
    	$query = $this->db->get('Conteudo',$limit,$offset);
    	return $query->result('Conteudo');
    }
     
    function getGradeCurso()
    {
    	$this->load->model('Valor');
    
    	$this->db->select('c.*');
    	$this->db->from('Valor v');
    	$this->db->join('Conteudo c', 'v.idConteudo = c.idConteudo');
    	$this->db->where('v.numero', $this->idConteudo);
    	$this->db->where('v.idCampo', 72);
    	$this->db->order_by("c.ordem", "ASC");
    	$query = $this->db->get();
    	 
    	return $query->result('Conteudo');
    }
    
    function getCursosPorCategoria($limit = NULL, $offset = NULL)
    {
    	$this->load->model('Valor');
    
    	$this->db->select('c.*');
    	$this->db->distinct();
    	$this->db->from('Valor v');
    	$this->db->join('Conteudo c', 'v.idConteudo = c.idConteudo');
    	$this->db->where('v.char', $this->idConteudo);
    	$this->db->where('v.idCampo', 35);
    	$this->db->order_by("c.ordem", "ASC");
    	$query = $this->db->get('Conteudo', $limit, $offset);
    	return $query->result('Conteudo');
    }
    
    function getCursosPorTitulo($idConteudo)
    {
    	$this->load->model('Valor');
    
    	$this->db->select('v.*');
    	$this->db->distinct();
    	$this->db->from('Valor v');
    	$this->db->join('Conteudo c', 'v.idConteudo = c.idConteudo');
    	$this->db->where('v.idConteudo', $idConteudo);
    	$this->db->order_by("c.ordem", "ASC");
    	$query = $this->db->get('Conteudo');
    	return $query->result('Conteudo');
    }
}