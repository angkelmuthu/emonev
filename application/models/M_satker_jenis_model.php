<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_satker_jenis_model extends CI_Model
{

    public $table = 'm_satker_jenis';
    public $id = 'id_satker_jenis';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_satker_jenis,nama_satker_jenis,created_by,created_date,updated_by,updated_date,isdeleted');
        $this->datatables->from('m_satker_jenis');
        //add this line for join
        //$this->datatables->join('table2', 'm_satker_jenis.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('m_satker_jenis/read/$1'),'<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed'))." 
            ".anchor(site_url('m_satker_jenis/update/$1'),'<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed'))." 
                ".anchor(site_url('m_satker_jenis/delete/$1'),'<i class="fal fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_satker_jenis');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_satker_jenis', $q);
	$this->db->or_like('nama_satker_jenis', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('updated_by', $q);
	$this->db->or_like('updated_date', $q);
	$this->db->or_like('isdeleted', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_satker_jenis', $q);
	$this->db->or_like('nama_satker_jenis', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('updated_by', $q);
	$this->db->or_like('updated_date', $q);
	$this->db->or_like('isdeleted', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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

/* End of file M_satker_jenis_model.php */
/* Location: ./application/models/M_satker_jenis_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-24 09:07:59 */
/* http://harviacode.com */