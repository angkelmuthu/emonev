<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_realisasi_model extends CI_Model
{

    public $table = 't_realisasi';
    public $id = 'id_realisasi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    // function json($idrincian)
    // {
    //     $this->datatables->select('id_realisasi,id_rincian,id_user,periode,realisasi_fisik,realisasi_harga_satuan,realisasi_satuan,realisasi_persen,realisasi_nilai,id_progress,id_rincian_hambatan,rencana_tindak_lanjut,pemanfaatan,keterangan,created_by,created_date,updated_by,updated_date,isdeleted');
    //     $this->datatables->from('t_realisasi');
    //     $this->datatables->where('id_rincian', $idrincian);
    //     //add this line for join
    //     //$this->datatables->join('table2', 't_realisasi.field = table2.field');
    //     $this->datatables->add_column('action', anchor(site_url('t_realisasi/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed')) . "
    //         " . anchor(site_url('t_realisasi/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed')) . "
    //             " . anchor(site_url('t_realisasi/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_realisasi');
    //     return $this->datatables->generate();
    // }

    function get_alokasi($tahun)
    {
        $id_satker = $this->session->userdata('id_satker');
        $this->db->where('id_satker', $id_satker);
        $this->db->where('tahun', $tahun);
        $this->db->order_by('nama_dak_sub_bidang', 'ASC');
        return $this->db->from('v_dak_alokasi')->get()->result();
    }
    // get all
    function get_realisasi($idrincian)
    {
        $this->db->select('a.*,b.satuan,c.nama_rincian_hambatan');
        $this->db->from('t_realisasi a');
        $this->db->join('m_satuan b', 'a.realisasi_satuan=b.kdsatuan', 'left');
        $this->db->join('m_hambatan_rincian c', 'a.id_rincian_hambatan=c.id_rincian_hambatan', 'left');
        $this->db->where('a.id_rincian', $idrincian);
        $this->db->order_by('a.id_realisasi', 'ASC');
        return $this->db->get()->result();
    }

    function get_rincian($idrincian)
    {
        $this->db->where('id_rincian', $idrincian);
        return $this->db->get('v_rincian')->row();
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
        $this->db->like('id_realisasi', $q);
        $this->db->or_like('id_rincian', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('periode', $q);
        $this->db->or_like('realisasi_fisik', $q);
        $this->db->or_like('realisasi_harga_satuan', $q);
        $this->db->or_like('realisasi_satuan', $q);
        $this->db->or_like('realisasi_persen', $q);
        $this->db->or_like('realisasi_nilai', $q);
        $this->db->or_like('id_progress', $q);
        $this->db->or_like('id_rincian_hambatan', $q);
        $this->db->or_like('rencana_tindak_lanjut', $q);
        $this->db->or_like('pemanfaatan', $q);
        $this->db->or_like('keterangan', $q);
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
        $this->db->like('id_realisasi', $q);
        $this->db->or_like('id_rincian', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('periode', $q);
        $this->db->or_like('realisasi_fisik', $q);
        $this->db->or_like('realisasi_harga_satuan', $q);
        $this->db->or_like('realisasi_satuan', $q);
        $this->db->or_like('realisasi_persen', $q);
        $this->db->or_like('realisasi_nilai', $q);
        $this->db->or_like('id_progress', $q);
        $this->db->or_like('id_rincian_hambatan', $q);
        $this->db->or_like('rencana_tindak_lanjut', $q);
        $this->db->or_like('pemanfaatan', $q);
        $this->db->or_like('keterangan', $q);
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

/* End of file T_realisasi_model.php */
/* Location: ./application/models/T_realisasi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-28 13:47:06 */
/* http://harviacode.com */