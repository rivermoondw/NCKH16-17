<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->data['pagetitle'] = 'Gia đình';
        $this->load->model('Family_model');
    }
    public function index(){
        $result = $this->Family_model->get_giadinh_id($_SESSION['user_id']);
        foreach ($result as $key => $val){
            $giadinh_id = $val['giadinh_id'];
        }
        $this->data['the_view_content'] = $this->Family_model->get_list('hoten',$giadinh_id);
        $this->render('family/family_view');
    }
    public function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('giadinh', 'Gia đình', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->render('family/create_view');
        }
        else{
            $giadinh = $this->input->post('giadinh');
            $mota = $this->input->post('mota');
            $this->Family_model->create($giadinh,$mota);
            redirect('h');
        }
    }
}