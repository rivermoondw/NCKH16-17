<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_list(){

    }
    public function create($giadinh, $mota)
    {
        $data = array(
            'giadinh' => $giadinh,
            'mota' => $mota,
            'soluong' => 1
        );
        $this->db->insert('giadinh', $data);
    }
}