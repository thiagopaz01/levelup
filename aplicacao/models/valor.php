<?php
class Valor extends CI_Model 
{
    public $texto;
    public $numero;
    public $data_hora;
    public $char;
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Recife');
    }
    
    function salvar()
    {
        $this->db->insert('Valor', $this);
    }
    
    function remover()
    {
        $this->db->delete('Valor', array('idConteudo' => $this->idConteudo, 'idCampo' => $this->idCampo)); 
    }
    
    function conteudo()
    {
        $this->load->model('Conteudo');
        $query = $this->db->get_where('Conteudo', array('idConteudo' => $this->idConteudo));
        return $query->row(0,'Conteudo');
    }
}