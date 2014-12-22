<?php

class Equipe extends BSA_Site_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['lstEquipe'] = $this->_getEquipe();
        $this->load->view('site/sobre/equipe');
    }
    
    private function _getEquipe(){
        $categoriasEquipe	= $this->Categoria->retornarObjeto(13);
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