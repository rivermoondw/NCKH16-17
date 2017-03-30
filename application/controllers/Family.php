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
        $this->Family_model->get_list();
    }
    public function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('giadinh','Gia đình','trim|required');
        if ($this->form_validation->run()===FALSE){
            $this->render('family/create_view');
        } else{
            if ($this->input->post('submit')){
                $giadinh = $this->input->post('giadinh');
                $mota = $this->input->post('mota');
                $this->Family_model->create($giadinh,$mota);
                echo 'Them thanh cong';die;
            }
            else{
                echo 'Loi';die;
            }
        }
    }
}