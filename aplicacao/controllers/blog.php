<?php

class Blog extends BSA_Site_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('site/blog/blog');
    }
}