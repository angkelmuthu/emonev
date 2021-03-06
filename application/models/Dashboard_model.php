<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public $table = 't_kunjungan';
    public $id = 'kdrs';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all dash
    function barchart_prop($tahun_default)
    {

        $this->db->select('ifnull(b.nama_provinsi,"N/A") as nama_provinsi,sum(a.nilai_alokasi) as alokasi,sum(a.ttl_rincian) as rka,sum(a.ttl_realisasi) as realisasi');
        $this->db->from('v_dak_alokasi a');
        $this->db->join('m_provinsi b', 'a.id_provinsi=b.id_provinsi', 'left');
        $this->db->where('a.tahun', $tahun_default);
        $this->db->group_by('a.id_provinsi');
        $query = $this->db->get();
        return $query->result();
    }
    function progres($tahun_default)
    {
        $date = new DateTime("now");
        //$curr_date = $date->format('Y');
        $this->db->select('sum(a.nilai_alokasi) as alokasi,sum(a.ttl_rincian) as rka,sum(a.ttl_realisasi) as realisasi');
        $this->db->from('v_dak_alokasi a');
        $this->db->where('a.tahun', $tahun_default);
        $query = $this->db->get();
        return $query->result();
    }

    ////sub
    function getby_prop($prop)
    {
        $date = new DateTime("now");
        //$curr_date = $date->format('Y');
        $this->db->select('sum(a.nilai_alokasi) as alokasi,sum(a.ttl_rincian) as rka,sum(a.ttl_realisasi) as realisasi');
        $this->db->from('v_dak_alokasi a');
        $this->db->join('m_provinsi b', 'a.id_provinsi=b.id_provinsi', 'left');
        $this->db->where('b.nama_provinsi', $prop);
        $this->db->where('a.tahun', '2019');
        $query = $this->db->get();
        return $query->result();
    }
    function get_tahun()
    {
        $this->db->select('tahun');
        $this->db->from('v_dak_alokasi');
        $this->db->order_by('tahun', 'DESC');
        $this->db->group_by('tahun');
        $query = $this->db->get();
        return $query->result();
    }
    function get_tahun_row()
    {
        $this->db->select('tahun');
        $this->db->from('v_dak_alokasi');
        $this->db->order_by('tahun', 'DESC');
        $this->db->group_by('tahun');
        $query = $this->db->get();
        return $query->row();
    }
}
