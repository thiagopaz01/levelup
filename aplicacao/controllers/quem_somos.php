<?php

class Quem_somos extends BSA_Site_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['quemSomos']          = $this->_getQuemSomos();
        $data['missao']             = $this->_getMissao();
        $data['visao']              = $this->_getVisao();
        $data['valores']            = $this->_getValores();
        $data['estrutura']          = $this->_getEstrutura();
        $this->template->load('site', 'site/quem-somos/index', $data);
    }
    
    private function _getQuemSomos(){
        $categoriasQuemSomos	= $this->Categoria->retornarObjeto(10);
        $quemSomos		= $categoriasQuemSomos->conteudo();
        
        $quemSomos			= $quemSomos->valores();
        $quemSomos->imagem          = $quemSomos->imagem(1)->caminho;
                
        return $quemSomos;
    }
    
    private function _getMissao(){
        $categoriasMissao	= $this->Categoria->retornarObjeto(11);
        $missao 		= $categoriasMissao->conteudo();
        
        $missao			= $missao->valores();
                
        return $missao;
    }
    
    private function _getVisao(){
        $categoriasVisao	= $this->Categoria->retornarObjeto(12);
        $visao   		= $categoriasVisao->conteudo();
        
        $visao			= $visao->valores();
                
        return $visao;
    }
    
    private function _getValores(){
        $categoriasValores	= $this->Categoria->retornarObjeto(13);
        $valores   		= $categoriasValores->conteudo();
        
        $valores		= $valores->valores();
                
        return $valores;
    }
    
    private function _getEstrutura(){
        $categoriasEstrutura	= $this->Categoria->retornarObjeto(14);
        $estrutura   		= $categoriasEstrutura->conteudo();
        
        $estrutura		= $estrutura->valores();
                
        return $estrutura;
    }

}