<?php

class Contato extends BSA_Site_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $this->template->load('site', 'site/contato/index', $data);
    }

}