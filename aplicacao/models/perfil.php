<?php
class Perfil extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Recife');
    }
    
    function retornarObjeto($id)
    {
        $query = $this->db->get_where('Perfil', array('idPerfil' => $id));
        return $query->row(0,'Perfil');
    }
    
    function listar($idPerfil=null)
    {
    	if($idPerfil != "")
    		$this->db->where('idPerfil >', $idPerfil);
    	$query = $this->db->get('Perfil');
    	return $query->result('Perfil');
    }
}
?>