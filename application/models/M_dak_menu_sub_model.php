<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dak_menu_sub_model extends CI_Model
{

    public $table = 'm_dak_menu_sub';
    public $vtable = 'v_dak_menu_sub';
    public $id = 'id_dak_menu_sub';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->vtable)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->vtable)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_dak_menu_sub', $q);
        $this->db->or_like('dak', $q);
        $this->db->or_like('menu_group', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('updated_by', $q);
        $this->db->or_like('updated_date', $q);
        $this->db->from($this->vtable);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_dak_menu_sub', $q);
        $this->db->or_like('dak', $q);
        $this->db->or_like('menu_group', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('updated_by', $q);
        $this->db->or_like('updated_date', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->vtable)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file M_dak_menu_sub_model.php */
/* Location: ./application/models/M_dak_menu_sub_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-17 16:00:26 */
/* http://harviacode.com */