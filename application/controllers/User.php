<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['pagetitle'] = 'Trang chủ';
        $this->load->model('User_model');
        $this->data['the_view_content'] = $this->User_model->get_list_lskb();
        $this->render('user/list_lskb');
    }

    public function login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Tài khoản', 'trim|required');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->helper('form');
            $this->load->view('user/login_view');
        } else {
            $remember = (bool)$this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'),$remember)) {
                redirect('h');
            } else {
                $this->render('user/login_view',NULL);
            }
        }
    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('/');
    }
}

?>