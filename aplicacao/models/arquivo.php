<?php
class Arquivo extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Recife');
    }
    
    function retornarObjeto($id)
    {
        $query = $this->db->get_where('Arquivo', array('idArquivo' => $id));
        return $query->row(0,'Arquivo');
    }
    
    public function retornarObjetoPortal($id){
        $banco2 = $this->load->database('banco_2', TRUE);
        $query = $banco2->get_where('Arquivo', array('idArquivo' => $id));
        $objArquivo = $query->row(0,'Arquivo');        
        return $objArquivo;
    }
    
    public function retornarArquivo($idArquivo){
        $banco2 = $this->load->database('banco_2', TRUE);
        $query = $banco2->get_where('Arquivo', array('idArquivo' => $idArquivo));
        $objArquivo = $query->row(0,'Arquivo');        
        return $objArquivo;
    }
    
    function salvar()
    {
        if(isset($this->idArquivo))
        {
            $this->db->update('Arquivo', $this, array('idArquivo' => $this->idArquivo));
        }
        else
        {
            $this->db->insert('Arquivo', $this); 
            $this->idArquivo = $this->db->insert_id();
        }
    }
    
    function remover()
    {
    	if($this->caminho != "" && file_exists("conteudo/" . $this->caminho))
			unlink("conteudo/" . $this->caminho);
        $this->db->delete('Arquivo', array('idArquivo' => $this->idArquivo)); 
    }
    
    function removerPortal($id)
    {
        $banco2 = $this->load->database('banco_2', TRUE);
        if($this->caminho != "" && file_exists("conteudo/" . $this->caminho))
                        unlink("conteudo/" . $this->caminho);
        $banco2->delete('Arquivo', array('idArquivo' => $id)); 
    }
    
    function removerArquivoByPost($id)
    {
        $banco2 = $this->load->database('banco_2', TRUE);
        if($this->caminho != "" && file_exists("conteudo/" . $this->caminho))
                        unlink("conteudo/" . $this->caminho);
        $banco2->delete('Arquivo', array('idPosts' => $id)); 
    }
    
    function usuario()
    {
        $this->load->model('Usuario');
        $query = $this->db->get_where('Usuario', array('idUsuario' => $this->idUsuario));
        return $query->row(0,'Usuario');
    }
    
    function conteudo()
    {
        $this->load->model('Conteudo');
        $query = $this->db->get_where('Conteudo', array('idConteudo' => $this->idConteudo));
        return $query->row(0,'Conteudo');
    }
    
    public function listarArquivosPosts($id)
    {
            $banco2 = $this->load->database('banco_2', TRUE);
            $banco2->select('*');
            $banco2->from('Arquivo');
            $banco2->join('Posts', 'Arquivo.idPosts = Posts.idPosts');
            $banco2->where('Arquivo.idPosts', $id);
            $banco2->order_by('Arquivo.idArquivo DESC');
            $query = $banco2->get();		
            return $query->result('Arquivo');
    }
    
    public function listarArquivos($idPost)
    {
            $banco2 = $this->load->database('banco_2', TRUE);
            $banco2->where('Arquivo.idPosts', $idPost);
            $query = $banco2->get('Arquivo');
            return $query->result('Arquivo');
    }
}
?>