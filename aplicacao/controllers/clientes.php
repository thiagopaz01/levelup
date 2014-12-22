<?php

class Clientes extends BSA_Site_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('site/sobre/clientes');
    }
}