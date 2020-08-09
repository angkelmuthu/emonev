<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dak_alokasi_satker_model extends CI_Model
{

    public $table = 'm_dak_alokasi';
    public $vtable = 'v_dak_alokasi';
    public $id = 'id_dak_alokasi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $satker = $this->session->userdata('id_satker');
        $this->db->from($this->vtable);
        $this->db->where('id_satker', $satker);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    // get data submenu
    function get_komponen($id_sub_bidang)
    {
        $this->db->from('v_komponen');
        $this->db->where('id_dak_sub_bidang', $id_sub_bidang);
        return $this->db->get()->result();
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
        $satker = $this->session->userdata('id_satker');
        $this->db->from($this->vtable);
        $this->db->where('id_satker', $satker);
        $this->db->group_start();
        $this->db->like('id_dak_alokasi', $q);
        $this->db->or_like('nama_dak_sub_bidang', $q);
        $this->db->or_like('dak_kelompok', $q);
        $this->db->or_like('satker', $q);
        $this->db->or_like('tahun', $q);
        $this->db->or_like('nilai_alokasi', $q);
        $this->db->or_like('created_by', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('updated_by', $q);
        $this->db->or_like('updated_date', $q);
        $this->db->or_like('isdeleted', $q);
        $this->db->group_end();
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $satker = $this->session->userdata('id_satker');
        $this->db->from($this->vtable);
        $this->db->where('id_satker', $satker);
        $this->db->order_by($this->id, $this->order);
        $this->db->group_start();
        $this->db->like('id_dak_alokasi', $q);
        $this->db->or_like('nama_dak_sub_bidang', $q);
        $this->db->or_like('dak_kelompok', $q);
        $this->db->or_like('satker', $q);
        $this->db->or_like('tahun', $q);
        $this->db->or_like('nilai_alokasi', $q);
        $this->db->or_like('created_by', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('updated_by', $q);
        $this->db->or_like('updated_date', $q);
        $this->db->or_like('isdeleted', $q);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
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
        $this->db->update($this->table, array('isdeleted' => '1'));
    }
}

/* End of file M_dak_alokasi_model.php */
/* Location: ./application/models/M_dak_alokasi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-16 16:43:44 */
/* http://harviacode.com */