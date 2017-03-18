<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
    }
    public function index()
    {
        $this->load->view('welcome_message');
    }
    public function login()
    {
        $this->data['title'] = 'Login';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('taikhoan','Tài khoản','trim|required');
        $this->form_validation->set_rules('matkhau','Mật khẩu','trim|required');
        if ($this->form_validation->run() === false)
        {
            $this->load->helper('form');
            $this->render('user/login_view');
        }
        else
        {
            $remember = (bool) $this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('taikhoan'),$this->input->post('matkhau'),$remember))
            {
                redirect('dashboard');
            }
            else
            {
                $_SESSION['auth_message'] = $this->ion_auth->errors();
                $this->session->mark_as_flash('auth_message');
                redirect('user/login');
            }
        }
        /*$this->data['message'] = 'here will be the login form';
        $this->render('user/login_view');*/
    }
    public function logout()
    {
        $this->ion_auth->logout();
        redirect('user/login');
    }
}
?>