<?php
class Test extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->load->model('User_model');
        $this->data['the_view_content'] = $this->User_model->get_list();
        $this->render('user/list_lskb');
    }
}