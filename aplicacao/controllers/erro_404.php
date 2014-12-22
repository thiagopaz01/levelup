<?php

class Erro_404 extends HSL_Site_Controller
{
    function __construct()
    {
            parent::__construct();
    }

    public function index()
    {
        $this->load->library('session');
            
        //Verifica se o usuário está logado
        $objUsuarioLogado = $this->_usuarioLogado();
        if(empty($objUsuarioLogado)){
            $this->login();
        }else{
            

            $data = array();
            $data['objUsuarioLogado'] = $objUsuarioLogado;

            $this->template->load('site', 'site/erro', $data);
        }
    }
    
    private function _aniversariante()
    {
        $this->load->model('Usuario');
        $aniversariantes = $this->Usuario->listar(NULL, NULL, 'dtNascimento ASC', NULL, NULL, NULL, NULL);
        return $aniversariantes;

    }

    private function _usuarioLogado()
    {
        $CI =& get_instance();
        $CI->load->model('Usuario');
        $CI->load->library('session');

        //Verifica se o usuário está logado
        if (!$CI->session->userdata('usuario_logado'))
                redirect('home/login', 'location');
        else
        {
                $objUsuarioLogado = $CI->session->userdata('usuario_logado');
                return $objUsuarioLogado;
        }
    }
}