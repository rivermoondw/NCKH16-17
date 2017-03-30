<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->data['pagetitle'] = 'Gia đình';
    }
    public function create(){
        $this->render('family/create_view');
    }
}