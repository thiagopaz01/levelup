<?php

class Home extends BSA_Site_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('site/index');
        
    }

    private function _getBanner() {
        $categoriasBanner = $this->Categoria->retornarObjeto(6);
        $lstBanner = $categoriasBanner->conteudos(NULL, NULL, NULL, 'ordem ASC', NULL, NULL);
        $arrayBanner = array();

        if ((is_array($lstBanner)) && (!empty($lstBanner))) {
            foreach ($lstBanner as $banner) {
                $banner = $banner->valores();
                $banner->imagem = $banner->imagem(1)->caminho;

                if (empty($banner->link)) {
                    $banner->link = 'javascript:void(0);';
                }

                $arrayBanner[] = $banner;
            }
        }

        return $arrayBanner;
    }

    private function _getQuemSomos() {
        $categoriasQuemSomos = $this->Categoria->retornarObjeto(18);
        $quemSomos = $categoriasQuemSomos->conteudo();

        $quemSomos = $quemSomos->valores();

        return $quemSomos;
    }

    private function _getEquipe() {
        $categoriasEquipe = $this->Categoria->retornarObjeto(16);
        $equipe = $categoriasEquipe->conteudo();

        $equipe = $equipe->valores();

        return $equipe;
    }

    private function _getAreas() {
        $categoriasAreas = $this->Categoria->retornarObjeto(17);
        $areas = $categoriasAreas->conteudo();

        $areas = $areas->valores();

        return $areas;
    }

}