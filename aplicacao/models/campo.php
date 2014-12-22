<?php
class Campo extends CI_Model 
{
    public $arrayValor;    
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Recife');
    }
    
    function get_array()
    {
        return array('tipo' => $this->tipo, 'nome' => $this->nome, 'id' => $this->id, 'classe' => $this->classe, 'valor' => $valor, 'array' => $array);
    }
}