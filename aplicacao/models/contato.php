<?php

class Contato extends CI_Model
{
	function __construct()
        {
            parent::__construct();
            date_default_timezone_set('America/Recife');
        }
	
	function retornarObjeto($id)
	{
		$query = $this->db->get_where('Contato', array('idContato' => $id));
		return $query->row(0,'Contato');
	}
	
	public function salvar()
	{		
		$this->db->insert('Contato', $this);
		$this->idContato = $this->db->insert_id();
	}
	
	public function remover()
	{
		$this->db->delete('Contato', array('idContato' => $this->idContato));
	}
	
	public function listar($limit = NULL, $offset = NULL, $order = NULL, $nome = NULL, $email = NULL)
	{
		if ($order != "") {
			$this->db->order_by($order);
		}
		
		if ($nome != "") {
			$this->db->like('nome', $plchave);
		}
		
		if ($email != "") {
			$this->db->where('email', $email);
		}
		
		$query = $this->db->get('Contato', $limit, $offset);
        return $query->result('Contato');
	}
}
