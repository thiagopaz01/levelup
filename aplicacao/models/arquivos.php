<?php
class Arquivos extends CI_Model{
    
	function __construct()
        {
            parent::__construct();
            date_default_timezone_set('America/Recife');
        }
        
        public function retornarArquivos($id)
        {
            $query = $this->db->get_where('Arquivos', array('idArquivos' => $id));
            return $query->row(0,'Arquivos');
        }
        
        public function retornarArquivosInfo($id)
        {
            $query = $this->db->get_where('Arquivos', array('idInformativo' => $id));
            return $query->row(0,'Arquivos');
        }
        
        public function retornarArquivosBySlug($id)
        {
            $query = $this->db->get_where('Arquivos', array('idInformativo' => $id));
            return $query->result('Arquivos');
        }
        
        public function listarArquivos($idInformativo)
        {
            $query = $this->db->get_where('Arquivos', array('idInformativo' => $idInformativo));
            return $query->result('Arquivos');
        }
        
        public function salvar()
	{
            $this->db->insert('Arquivos', $this);
            $idArquivo = $this->db->insert_id();
            return $idArquivo;
	}
        
        public function alterar($idArq, $descricao){
            
            $this->db->set('titulo', $descricao);
            $this->db->where('idArquivos', $idArq);
            $this->db->update('Arquivos');
            $idArquivo = $this->db->insert_id();
        }
        
        public function excluirArquivos($id, $imagem)
        {       
            if (file_exists('conteudo/' . $imagem))
                {
                        unlink('conteudo/' . $imagem);
                }
            
            $this->db->delete('Arquivos', array('idArquivos' => $id)); 
        }
} 
?>
