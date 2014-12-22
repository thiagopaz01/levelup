<?php
class Imagem extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Recife');
    }
    
    function retornarObjeto($id)
    {
        $query = $this->db->get_where('Imagem', array('idImagem' => $id));
        return $query->row(0,'Imagem');
    }
    
    public function retornarImagem($id)
    {
        $this->load->model('Tamanho');
        $query = $this->db->get_where('Tamanho', array('idImagem' => $id));
        return $query->result('Tamanho');
    }
    
    function salvar()
    {
        if(isset($this->idImagem))
        {
            $this->db->update('Imagem', $this, array('idImagem' => $this->idImagem));
        }
        else
        {
            $this->db->insert('Imagem', $this); 
            $this->idImagem = $this->db->insert_id();
        }
    }
    
    function remover()
    {
    	$this->remover_tamanhos();
        $this->db->delete('Imagem', array('idImagem' => $this->idImagem)); 
    }
    
    function remover_tamanhos()
    {
    	$this->load->model('Tamanho');
        $query = $this->db->get_where('Tamanho', array('idImagem' => $this->idImagem));
        $lstTamanhos = $query->result('Tamanho');
        
        if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
        {
            foreach($lstTamanhos as $objTamanho)
            {
                if($objTamanho->caminho != "" && file_exists("conteudo/" . $objTamanho->caminho))
                    unlink("conteudo/" . $objTamanho->caminho);
            }
        }
        $this->db->delete('Tamanho', array('idImagem' => $this->idImagem)); 
    }
    
    function conteudo()
    {
        $this->load->model('Conteudo');
        $query = $this->db->get_where('Conteudo', array('idConteudo' => $this->idConteudo));
        return $query->row(0,'Conteudo');
    }
    
    function tamanhos()
    {
        $this->load->model('Tamanho');
        $query = $this->db->get_where('Tamanho', array('idImagem' => $this->idImagem));
        return $query->result('Tamanho');
    }
    
    function tamanho($tamanho)
    {
        if($tamanho != "")
        {
            $this->load->model('Tamanho');
            $query = $this->db->get_where('Tamanho', array('idImagem' => $this->idImagem,'tamanho' => $tamanho));
            $objTamanho = $query->row(0,'Tamanho');
            if(is_object($objTamanho) && $objTamanho->idImagem == $this->idImagem)
            {
                $this->caminho = $objTamanho->caminho;
                $this->tamanho = $tamanho;
            }
        }
        return $this;
    }
}