<?php

class Blog extends BSA_Site_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['page'] = 1;
    	$data['total_pages'] = 100;
    	$data['limit'] = 4;
        $this->load->view('site/blog/blog',$data);
    }

    public function lista($page=1) {
    	$data['page'] = $page;
    	$data['total_pages'] = 100;
    	$data['limit'] = 4;
        $this->load->view('site/blog/blog',$data);
    }
}