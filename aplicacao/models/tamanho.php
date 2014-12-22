<?php
class Tamanho extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Recife');
    }
    
    function salvar()
    {
        $this->db->insert('Tamanho', $this);
    }
    
    function remover()
    {
        $this->db->delete('Tamanho', array('idImagem' => $this->idImagem, 'tamanho' => $this->tamanho)); 
    }
}