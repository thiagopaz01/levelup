<?php
class Categoria extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Recife');
    }
    
    function retornarObjeto($id)
    {
        $query = $this->db->get_where('Categoria', array('idCategoria' => $id));
        return $query->row(0,'Categoria');
    }
    
    function categoriaRelacionada()
    {
        $query = $this->db->get_where('Categoria', array('idCategoria' => $this->idCategoriaRelacionada));
        return $query->row(0,'Categoria');
    }
    
    function conteudo()
    {
        /*$this->load->model('Conteudo');
        $query = $this->db->get_where('Conteudo', array('idCategoria' => $this->idCategoria));
        $objConteudo = $query->row(0,'Conteudo');       
        return $objConteudo->valores();*/
    	
    	$this->load->model('Conteudo');
    	$query = $this->db->get_where('Conteudo', array('idCategoria' => $this->idCategoria));
        $objConteudo = $query->row(0,'Conteudo'); 
        
        if(!is_object($objConteudo))
        {
            $objConteudo = new Conteudo;
            $objConteudo->idCategoria = $this->idCategoria;
        }
        return $objConteudo->valores();  	
    }
    
    function subCategorias()
    {
        $query = $this->db->get_where('Categoria', array('idCategoriaPai' => $this->idCategoria));
        return $query->result('Categoria');
    }
    
    function menus($order = NULL)
    {
    	if ($order != "") 
    	{
    		$this->db->order_by($order);
    	}
    	$this->db->where('idCategoria != 15');
    	$query = $this->db->get_where('Categoria', array('idCategoriaPai' => $this->idCategoria));
    	return $query->result('Categoria');
    }
    
    function campos()
    {
        $this->load->model('Campo');
        $this->db->order_by("ordem ASC");
        $query = $this->db->get_where('Campo', array('idCategoria' => $this->idCategoria));
        return $query->result('Campo');
    }
    
    function campoImagem()
    {
        $this->load->model('Campo');
        $query = $this->db->get_where('Campo', array('idCategoria' => $this->idCategoria,'tipo' => "imagem"));
        return $query->row(0,'Campo');
    }
    
    function listar($limit=null,$offset=null,$order=null,$plchave=null,$idCategoriaPai=null)
    {
        $this->db->like('descricao', $plchave); 
        if($order != "")
            $this->db->order_by($order);
        if($idCategoriaPai != "")
            $this->db->where('idCategoriaPai', $idCategoriaPai); 
        else
            $this->db->where('idCategoriaPai IS NULL', null, false);
            
        $query = $this->db->get('Categoria',$limit,$offset);
        return $query->result('Categoria');
    }
    
    function categoriaPai()
    {
        $query = $this->db->get_where('Categoria', array('idCategoria' => $this->idCategoriaPai));
        return $query->row(0,'Categoria');
    }
    
    function conteudos($limit=null,$offset=null,$descricao=null,$order=null,$destaque=null,$galeria=null)
    {
        $this->load->model('Conteudo');
        $this->db->where('idCategoria', $this->idCategoria);
        if($destaque != "")
            $this->db->where('destaque', 1);
        if($order != "")
            $this->db->order_by($order);
        $query = $this->db->get('Conteudo',$limit,$offset);
        return $query->result('Conteudo');
    }
    
    /**
     * Retorna os bannerss com flag de publicado
     * Cliente: FBR
     * 
     * @param string $order
     * @return unknown
     */
    function getBannersPublicados($order = null)
    {
    	$this->load->model('Conteudo');
    	$this->load->model('Valor');
    	 
    	$this->db->select('c.*');
    	$this->db->from('Valor v');
    	$this->db->join('Conteudo c', 'c.idConteudo = v.idConteudo');
    	$this->db->where('v.idCampo', 28);
    	$this->db->where('v.char', 'sim');
    	$this->db->where('c.idCategoria', $this->idCategoria);
    	 
    	if ( ! empty($order))
    	{
    		$this->db->order_by($order);
    	}
    	 
    	$query = $this->db->get();
    	$lstConteudo = $query->result('Conteudo');
    	 
    	return $lstConteudo;
    }
}