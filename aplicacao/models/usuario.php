<?php
class Usuario extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    function retornarObjeto($id)
    {
        $query = $this->db->get_where('Usuario', array('idUsuario' => $id));
        return $query->row(0,'Usuario');
    }
    
    function salvar()
    {
        if(isset($this->idUsuario))
        {
            $this->db->update('Usuario', $this, array('idUsuario' => $this->idUsuario));
        }
        else
        {
            $this->db->insert('Usuario', $this); 
            $this->idUsuario = $this->db->insert_id();
        }
    }
    
    function inativar()
    {
        $this->status = 'inativo';
        $this->db->update('Usuario', $this, array('idUsuario' => $this->idUsuario));
    }
    
    function perfil()
    {
        $this->load->model('Perfil');
        $query = $this->db->get_where('Perfil', array('idPerfil' => $this->idPerfil));
        return $query->row(0,'Perfil');
    }
    
    function autenticarUsuario($login,$senha)
    {
        $query = $this->db->get_where('Usuario', array('email' => $login,'senha' => $senha,'status' => 'ativo'));
        return $query->row(0,'Usuario');
    }
    
    function verificarLogin($login)
    {
        $query = $this->db->get_where('Usuario', array('email' => $login, 'status' => 'ativo'));
        return $query->row(0,'Usuario');
    }
    
    function verificar_permissao($idPerfil,$idCategoria)
    {
    	$query = $this->db->get_where('Permissao', array('idPerfil' => $idPerfil, 'idCategoria' => $idCategoria));
    	return ($query->num_rows()>0)? TRUE:FALSE;
    }
    
    function listar($limit=null,$offset=null,$order=null,$plchave=null,$lstIds=null,$campos=null,$inativo=null)
    {    	
        if($campos != "")
            $this->db->select($campos);
        if($plchave != "")
            $this->db->like('nome', $plchave);
        if($inativo == 1)
            $this->db->where_in('status', array('inativo')); 
        else if($inativo == "")
            $this->db->where_in('status', array('ativo')); 
        if($lstIds != "") 
            $this->db->where_not_in('idUsuario', $lstIds); 
        if($order != "") 
            $this->db->order_by($order);
        $query = $this->db->get('Usuario',$limit,$offset);
        return $query->result('Usuario');
    }
    
    /**
     * Usuario::verificarEmail()
     *
     * Método que verifica se o e-mail passado por parâmetro já existe no sistema.
     * @param mixed $email
     * @return $objUsuario = Usuário cadastrado com o email.
     */
    function verificarEmail($email)
    {
    	$query = $this->db->get_where('Usuario', array('email' => $email,'status <>' => USUARIO_INATIVO));
    	return ($query->num_rows()>0)? TRUE:FALSE;
    }
    
    function retornarUsuarioEmail($email)
    {
    	$query = $this->db->get_where('Usuario', array('email' => $email,'status <>' => USUARIO_INATIVO));
    	return $query->row(0,'Usuario');
    }
    
    function resetarSenha()
    {	
    	$this->db->update('Usuario', $this, array('idUsuario' => $this->idUsuario));
    }
    
    function buscarResultado($param){
        /*SELECT * FROM customers WHERE name REGEXP '^$param' OR email REGEXP '^$param' OR phone REGEXP '^$param'*/
        $query = $this->db->query("SELECT * FROM hsl_Usuario WHERE nome REGEXP '^$param' OR email REGEXP '^$param'");
        return $query->result('Usuario');
    }
}