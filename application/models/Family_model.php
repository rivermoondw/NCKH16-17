<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_giadinh_id($param_where = NULL){
        return $this->db->select('taikhoan.giadinh_id')->from('giadinh')->join('taikhoan','giadinh.giadinh_id = taikhoan.giadinh_id')
            ->where('id', $param_where)->get()->result_array();
    }
    public function get_list($param_select = 'hoten',$param_where = NULL){
        $this->db->select($param_select)->from('taikhoan')->join('giadinh','taikhoan.giadinh_id = giadinh.giadinh_id');
        if ($param_where){
            $this->db->where('giadinh.giadinh_id', @$param_where);
        }
        return $this->db->get()->result_array();
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