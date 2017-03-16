<?php
    class Masterlayout extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
        }

        public function index(){
            $this->load->helper('url');
            $data['title'] = 'Trang chủ';
            $this->load->view('master-layout',$data);
        }
    }
?>