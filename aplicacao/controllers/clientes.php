<?php

class Clientes extends BSA_Site_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
    	$data['lstClientes'] = $this->_getClientes();
        $this->load->view('site/sobre/clientes',$data);
    }

    private function _getClientes(){
        $categoriasEquipe	= $this->Categoria->retornarObjeto(14);
        $equipe 		= $categoriasEquipe->conteudos(NULL, NULL, NULL, 'ordem ASC', NULL, NULL);
        
        $arrayEquipe = array();
        foreach ($equipe as $eq) {
            $equi                 = $eq->valores();
            $equi->imagem         = $eq->imagem(1)->caminho;
            
            $arrayEquipe[]          = $equi;
        }
        return $arrayEquipe;
    }
}