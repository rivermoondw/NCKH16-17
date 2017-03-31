<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_list_lskb()
    {
        $query = $this->db->select('lskb_id,tieude')->from('lskb')->get();
        return $query->result_array();
    }
}