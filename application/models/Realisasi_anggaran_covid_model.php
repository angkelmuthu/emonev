<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Realisasi_anggaran_covid_model extends CI_Model
{

    public $table = 'realisasi_anggaran_covid';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function data_parent($id=NULL){
        $whereid = '';
        $whereSatker = '';
        if($_SESSION['id_user_level'] == 3 OR $_SESSION['id_user_level'] == 4 ){
            $whereSatker = 'AND mac.id_satker = "'.$_SESSION['id_satker'].'" ';
        }
        if(!empty($id)){
            $whereid = 'AND mac.id = "'.$id.'" ';
        }
        $sql = $this->db->query("SELECT 
                                mac.id,
                                s.nama,
                                mk.nama_kegiatan,
                                mac.alokasi,
                                mac.alokasi_akhir,
                                (select SUM(inputan_nilai) 
                                 from realisasi_anggaran_covid ra 
                                 WHERE ra.id_alokasi_covid = mac.id
                                 AND ra.jenis_input = 'kontrak'
                                ) as r_kontrak,
                                (select SUM(inputan_nilai) 
                                 from realisasi_anggaran_covid ra 
                                 WHERE ra.id_alokasi_covid = mac.id
                                 AND ra.jenis_input = 'pembayaran'
                                ) as r_pembayaran,
                                (select CONCAT_WS('#$#',rm.rencana_penarikan_dana,rm.rencana_penarikan_dana_sd,rm.permasalahan,rm.rencana_tindak_lanjut)
                                 FROM rencana_masalah_anggaran_covid rm
                                 WHERE rm.id_alokasi = mac.id
                                 order by id desc limit 1
                                )as keterangan_masalah,
                                m_sub_kegiatan_anggaran_covid.nama_sub_kegiatan,
                                m_output_anggaran_covid.nama_output,
                                (select SUM(alokasi_akhir) FROM m_alokasi_anggaran_covid WHERE m_alokasi_anggaran_covid.id_parent = mac.id_parent ) as total_yang_sudah_dialokasi,
                                (select alokasi_akhir from m_alokasi_anggaran_covid where m_alokasi_anggaran_covid.id = mac.id_parent ) orang_tua_alokasi
                                FROM
                                m_alokasi_anggaran_covid mac
                                INNER JOIN m_satker s ON s.id_satker = mac.id_satker
                                INNER JOIN m_kegiatan_anggaran_covid mk ON mk.id = mac.kegiatan
                                LEFT JOIN m_sub_kegiatan_anggaran_covid ON m_sub_kegiatan_anggaran_covid.id = mac.id_sub_kegiatan
                                LEFT JOIN m_output_anggaran_covid ON m_output_anggaran_covid.id = mac.id_output
                                where 1=1 
                                AND level = 3
                                ".$whereid."
                                ".$whereSatker."
                                ");
        $data = $sql->result_array();

        return $data;
    }

    // get alls
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
        $this->db->like('id', $q);
	$this->db->or_like('id_alokasi_covid', $q);
	$this->db->or_like('inputan_nilai', $q);
	$this->db->or_like('jenis_input', $q);
	$this->db->or_like('alokasi_akhir', $q);
	$this->db->or_like('total_akumulasi_rp', $q);
	$this->db->or_like('total_akumulasi_percen', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL,$id=null,$jenis=null) {
    $this->db->select('realisasi_anggaran_covid.*,m_alokasi_anggaran_covid.alokasi_akhir as alokasi_akhir_master,m_sub_kegiatan_anggaran_covid.nama_sub_kegiatan');
    $this->db->order_by($this->id, $this->order);
    $this->db->join('m_alokasi_anggaran_covid','m_alokasi_anggaran_covid.id = realisasi_anggaran_covid.id_alokasi_covid');
    $this->db->join('m_sub_kegiatan_anggaran_covid','m_sub_kegiatan_anggaran_covid.id = realisasi_anggaran_covid.id_sub_kegiatan','left');
    $this->db->where('id_alokasi_covid',$id);
    $this->db->where('jenis_input',''.$jenis.'');
	#$this->db->limit($limit, $start);
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

/* End of file Realisasi_anggaran_covid_model.php */
/* Location: ./application/models/Realisasi_anggaran_covid_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-02 19:04:35 */
/* http://harviacode.com */