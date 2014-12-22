<?php

class Home extends BSA_Site_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['material']          = $this->_getMaterial();
        $data['precos']             = $this->_getPrecos();
        $data['outros']              = $this->_getOutros();
        $data['grupos']            = $this->_getGrupos();
        $data['sobrenos']              = $this->_getSobreNos();
        $data['endereco']            = $this->_getEndereco();
        $data['lstDiferencial']            = $this->_getDiferencial();
        $this->load->view('site/index',$data);
        
    }

    private function _getMaterial() {
        $categoria = $this->Categoria->retornarObjeto(6);
        $conteudo = $categoria->conteudo();

        $conteudo = $conteudo->valores();

        return $conteudo;
    }

    private function _getPrecos() {
        $categoria = $this->Categoria->retornarObjeto(7);
        $conteudo = $categoria->conteudo();

        $conteudo = $conteudo->valores();

        return $conteudo;
    }

    private function _getOutros() {
        $categoria = $this->Categoria->retornarObjeto(8);
        $conteudo = $categoria->conteudo();

        $conteudo = $conteudo->valores();

        return $conteudo;
    }

    private function _getGrupos() {
        $categoria = $this->Categoria->retornarObjeto(9);
        $conteudo = $categoria->conteudo();

        $conteudo = $conteudo->valores();

        return $conteudo;
    }

    private function _getSobreNos() {
        $categoria = $this->Categoria->retornarObjeto(11);
        $conteudo = $categoria->conteudo();

        $conteudo = $conteudo->valores();

        return $conteudo;
    }

    private function _getEndereco() {
        $categoria = $this->Categoria->retornarObjeto(12);
        $conteudo = $categoria->conteudo();

        $conteudo = $conteudo->valores();

        return $conteudo;
    }

    private function _getDiferencial() {
        $categoria = $this->Categoria->retornarObjeto(10);
        $lstConteudos = $categoria->conteudos(3, NULL, NULL, 'ordem ASC', NULL, NULL);
        $arrayConteudo = array();

        if ((is_array($lstConteudos)) && (!empty($lstConteudos))) {
            foreach ($lstConteudos as $conteudo) {
                $conteudo = $conteudo->valores();
                $conteudo->imagem = $conteudo->imagem(1)->caminho;
                
                if (empty($conteudo->link)) {
                    $conteudo->link = 'javascript:void(0);';
                }

                $arrayConteudo[] = $conteudo;
            }
        }

        return $arrayConteudo;
    }
}