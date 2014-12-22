<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {

    var $template_data = array();
    var $ci;

    function __construct() {
        $this->ci = & get_instance();
        $this->ci->load->model('Categoria');
    }

    function rodape() {
        $categoriasRodape	= $this->ci->Categoria->retornarObjeto(9);
        $rodape 		= $categoriasRodape->conteudo();
        
        $rodape			= $rodape->valores();
                
        return $rodape;
    }

    function set($name, $value) {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = array(), $return = FALSE) {

        $view_data['rodape']	= $this->rodape();
        
        $this->set('contents', $this->ci->load->view($view, $view_data, TRUE));
        return $this->ci->load->view($template, $this->template_data, $return);
    }

}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */