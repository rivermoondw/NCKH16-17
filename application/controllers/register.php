<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends MY_Controller{
    public function index(){
        $this->load->library('form_validation');
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[taikhoan.username]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[taikhoan.email]');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required|max_length[16]|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Xác nhận mật khẩu', 'trim|required|matches[password]');
            if ($this->form_validation->run()===FALSE) {
                $this->load->helper('form');
                $this->load->view('user/register');
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $email = $this->input->post('email');
                $this->load->library('ion_auth');
                 if ($this->ion_auth->register($username, $password, $email)) {
                    $_SESSION['auth_message'] = 'Tài khoản đăng kí thành công';
                    $this->session->mark_as_flash('auth_message');
                    redirect('user/login_view');
                } else {
                    $_SESSION['auth_message'] = $this->ion_auth->errors();
                    $this->session->mark_as_flash('auth_message');
                    redirect('user/register');
                }
            }
        }
        else{
            $this->load->view('user/register');
        }
    }
}