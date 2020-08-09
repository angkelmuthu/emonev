<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_dak_rincian_model extends CI_Model
{

    public $table = 't_dak_rincian';
    public $id = 'id_rincian';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($id_dak_alokasi, $id_dak_menu_sub)
    {
        $this->datatables->select('id_rincian,id_menu_sub,id_dak_alokasi,id_dak_rincian,volume,harga_satuan,satuan,total,created_by,created_date,updated_by,updated_date,isdeleted');
        $this->datatables->from('t_dak_rincian');
        $this->datatables->where('id_dak_alokasi', $id_dak_alokasi);
        $this->datatables->where('id_menu_sub', $id_dak_menu_sub);
        //add this line for join
        //$this->datatables->join('table2', 't_dak_rincian.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t_dak_rincian/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed')) . "
            " . anchor(site_url('t_dak_rincian/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed')) . "
                " . anchor(site_url('t_dak_rincian/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_rincian');
        return $this->datatables->generate();
    }

    function get_instalasi()
    {
        $this->db->order_by('nama_rs_instalasi', 'ASC');
        return $this->db->from('m_rs_instalasi')->get()->result();
    }

    function get_ruangan($kode_instalasi)
    {
        $this->db->where('kode_rs_instalasi', $kode_instalasi);
        $this->db->order_by('nama_rs_ruangan', 'ASC');
        return $this->db->from('m_rs_ruangan')->get()->result();
    }
    function get_sarana($id_ruangan)
    {
        $this->db->where('kode_rs_ruangan', $id_ruangan);
        $this->db->order_by('nama_rs_sarana', 'ASC');
        return $this->db->from('m_rs_sarana')->get()->result();
    }

    /////////////////////////////////////////////////////////////
    function get_fasyankes()
    {
        $this->db->group_by('id_jenis_faskes');
        return $this->db->from('v_alkes')->get()->result();
    }

    function get_instalasi_alkes($kode_faskes)
    {
        $this->db->where('id_jenis_faskes', $kode_faskes);
        $this->db->group_by('kode_instalasi');
        return $this->db->from('v_alkes')->get()->result();
    }
    function get_ruangan_alkes($kode_instalasi_alkes)
    {
        $this->db->where('kode_instalasi', $kode_instalasi_alkes);
        $this->db->group_by('kode_ruangan');
        return $this->db->from('v_alkes')->get()->result();
    }
    function get_sarana_alkes($kode_ruangan_alkes)
    {
        $this->db->where('kode_ruangan', $kode_ruangan_alkes);
        $this->db->group_by('kode_sarana', 'ASC');
        return $this->db->from('v_alkes')->get()->result();
    }
    function get_alkes($kode_sarana_alkes)
    {
        $this->db->where('kode_sarana', $kode_sarana_alkes);
        $this->db->group_by('kode_alkes', 'ASC');
        return $this->db->from('v_alkes')->get()->result();
    }
    ///////////////////////////////////////////////////////////
    // get all
    function get_all($id_dak_alokasi, $id_dak_menu_sub)
    {
        $this->db->from('t_dak_rincian');
        $this->db->where('id_dak_alokasi', $id_dak_alokasi);
        $this->db->where('id_menu_sub', $id_dak_menu_sub);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_rincian', $q);
        $this->db->or_like('id_menu_sub', $q);
        $this->db->or_like('id_dak_alokasi', $q);
        $this->db->or_like('id_dak_rincian', $q);
        $this->db->or_like('volume', $q);
        $this->db->or_like('harga_satuan', $q);
        $this->db->or_like('satuan', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('created_by', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('updated_by', $q);
        $this->db->or_like('updated_date', $q);
        $this->db->or_like('isdeleted', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_rincian', $q);
        $this->db->or_like('id_menu_sub', $q);
        $this->db->or_like('id_dak_alokasi', $q);
        $this->db->or_like('id_dak_rincian', $q);
        $this->db->or_like('volume', $q);
        $this->db->or_like('harga_satuan', $q);
        $this->db->or_like('satuan', $q);
        $this->db->or_like('total', $q);
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

/* End of file T_dak_rincian_model.php */
/* Location: ./application/models/T_dak_rincian_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-18 18:17:16 */
/* http://harviacode.com */