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
    function get_rincian($id_alokasi)
    {
        $this->db->where('id_dak_alokasi', $id_alokasi);
        $this->db->order_by('created_date', $this->order);
        return $this->db->get('t_dak_rincian')->result();
    }
    function get_alokasi($id_alokasi)
    {
        $this->db->where('id_dak_alokasi', $id_alokasi);
        return $this->db->get('v_dak_alokasi')->row();
    }
    function get_valokasi($id_alokasi)
    {
        $this->db->select('a.*,a.nilai_alokasi-ifnull(sum(b.total),0) AS sisa_alokasi');
        $this->db->from('v_dak_alokasi a');
        $this->db->join('t_dak_rincian b', 'a.id_dak_alokasi=b.id_dak_alokasi', 'left');
        $this->db->where('a.id_dak_alokasi', $id_alokasi);
        return $this->db->get()->row();
    }

    function fetch_komponen($id_alokasi)
    {
        $this->db->select("a.id_dak_komponen,a.nama_dak_komponen");
        $this->db->from("m_dak_komponen a");
        $this->db->join("m_dak_bidang_sub b", "a.id_dak_sub_bidang=b.id_dak_sub_bidang", "left");
        $this->db->join("m_dak_alokasi c", "b.id_dak_sub_bidang=c.id_dak_sub_bidang", "left");
        $this->db->where("c.id_dak_alokasi", $id_alokasi);
        $this->db->order_by("a.nama_dak_komponen", "ASC");
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_subkomponen($id_dak_komponen)
    {
        $this->db->where('id_dak_komponen', $id_dak_komponen);
        $this->db->order_by('nama_dak_komponen_sub', 'ASC');
        $query = $this->db->get('m_dak_komponen_sub');
        $output = '<option value="">Select Sub Komponen</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_dak_komponen_sub . '">' . $row->nama_dak_komponen_sub . '</option>';
        }
        return $output;
    }

    function fetch_rincian($id_dak_sub_komponen)
    {
        $this->db->where('id_dak_komponen_sub', $id_dak_sub_komponen);
        $this->db->order_by('nama_dak_rincian', 'ASC');
        $query = $this->db->get('m_dak_rincian');
        $output = '<option value="">Select Rincian Kegiatan</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_dak_rincian . '">' . $row->nama_dak_rincian . '</option>';
        }
        return $output;
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
    function total_rows($q = NULL)
    {
        $this->db->like('id_rincian', $q);
        $this->db->or_like('id_satker', $q);
        $this->db->or_like('id_dak_alokasi', $q);
        $this->db->or_like('tahun_anggaran', $q);
        $this->db->or_like('id_dak_bidang', $q);
        $this->db->or_like('id_dak_sub_bidang', $q);
        $this->db->or_like('id_dak_komponen', $q);
        $this->db->or_like('id_dak_komponen_sub', $q);
        $this->db->or_like('menu_kegiatan', $q);
        $this->db->or_like('kegiatan', $q);
        $this->db->or_like('id_dak_rincian', $q);
        $this->db->or_like('id_alkes', $q);
        $this->db->or_like('id_jenis_output', $q);
        $this->db->or_like('harga_satuan', $q);
        $this->db->or_like('volume', $q);
        $this->db->or_like('volume_perubahan', $q);
        $this->db->or_like('satuan', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('sarana', $q);
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
        $this->db->or_like('id_satker', $q);
        $this->db->or_like('id_dak_alokasi', $q);
        $this->db->or_like('tahun_anggaran', $q);
        $this->db->or_like('id_dak_bidang', $q);
        $this->db->or_like('id_dak_sub_bidang', $q);
        $this->db->or_like('id_dak_komponen', $q);
        $this->db->or_like('id_dak_komponen_sub', $q);
        $this->db->or_like('menu_kegiatan', $q);
        $this->db->or_like('kegiatan', $q);
        $this->db->or_like('id_dak_rincian', $q);
        $this->db->or_like('id_alkes', $q);
        $this->db->or_like('id_jenis_output', $q);
        $this->db->or_like('harga_satuan', $q);
        $this->db->or_like('volume', $q);
        $this->db->or_like('volume_perubahan', $q);
        $this->db->or_like('satuan', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('sarana', $q);
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
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-01 16:32:34 */
/* http://harviacode.com */
