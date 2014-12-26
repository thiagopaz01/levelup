<?php

class Imagens extends BSA_Site_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
    	$data['lstCategorias'] = $this->_getCategorias();
    	$data['lstImagens'] = $this->_getImagens();
        $this->load->view('site/imagens/imagens',$data);
    }

    private function _getCategorias() {
        $categoria	= $this->Categoria->retornarObjeto(17);
        $categorias 		= $categoria->conteudos(NULL, NULL, NULL, 'ordem ASC', NULL, NULL);
        
        $arrayCat = array();
        foreach ($categorias as $cat) {
            $cat                 = $cat->valores();
            $arrayCat[]          = $cat;
        }
        return $arrayCat;
    }

    private function _getImagens() {
    	$categoria	= $this->Categoria->retornarObjeto(16);
        $imagens 		= $categoria->conteudos(NULL, NULL, NULL, 'ordem ASC', NULL, NULL);
        
        $arrayImagens = array();
        foreach ($imagens as $imagem) {
            $imagem                 = $imagem->valores();
            $imagem->imagem         = $imagem->imagem(1)->caminho;
            $imagem->imagem2         = $imagem->imagem(2)->caminho;

            $objCat = $this->Conteudo->retornarObjeto($imagem->categoria);
            $imagem->catImagem      = $objCat->valores()->nome;
            
            $arrayImagens[]          = $imagem;
        }
        return $arrayImagens;
    }
}