<?php

class Equipe extends BSA_Site_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('site/sobre/equipe');
    }

    private function _getEquipeDestaque(){
        $categoriasEquipe	= $this->Categoria->retornarObjeto(3);
        $equipe 		= $categoriasEquipe->conteudos();
        
        $arrayEquipe = array();
        $array = array();
        foreach ($equipe as $eq) {
            $equi                 = $eq->valores();
            $equi->imagem         = $eq->imagem(1)->caminho;
            
            $array[]          = $equi;
        }
        
        foreach($array as $a){
            if($a->destaque == 'sim'){
                $arrayEquipe[] = $a;
            }
        }
        
        return $arrayEquipe;
    }
    
    private function _getEquipe(){
        $categoriasEquipe	= $this->Categoria->retornarObjeto(3);
        $equipe 		= $categoriasEquipe->conteudos();
        
        $arrayEquipe = array();
        $array = array();
        foreach ($equipe as $eq) {
            $equi                 = $eq->valores();
            $equi->imagem         = $eq->imagem(1)->caminho;
            
            $array[]          = $equi;
        }
        
        foreach($array as $a){
            if($a->destaque != 'sim'){
                $arrayEquipe[] = $a;
            }
        }
        
        return $arrayEquipe;
    }
}