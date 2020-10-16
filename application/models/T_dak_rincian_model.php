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
        $this->db->select('a.*,b.nama_dak_rincian,b.nama_dak_komponen_sub,b.nama_dak_komponen,IFNULL((SELECT realisasi_persen FROM t_realisasi WHERE id_rincian=a.id_rincian ORDER BY periode DESC LIMIT 1),0) AS persen');
        $this->db->from('v_rincian a');
        $this->db->join('v_dak_rincian b', 'a.id_dak_rincian=b.id_dak_rincian', 'left');
        //$this->db->join('v_rincian c', 'a.id_rincian=c.id_rincian', 'left');
        //$this->db->join('m_satuan d', 'a.id_satuan=d.id_satuan', 'left');
        $this->db->where('a.id_dak_alokasi', $id_alokasi);
        $this->db->order_by('a.created_date', $this->order);
        return $this->db->get()->result();
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
    function fetch_fasyankes($fasyankes)
    {
        //$filter = $this->session->userdata('id_kota_kabupaten');

        if ($fasyankes == '2') {

            if (empty($this->session->userdata('id_kota_kabupaten') == 2)) {
                $id_provinsi = $this->session->userdata('id_provinsi');
                $this->db->where('id_provinsi', $id_provinsi);
                //$this->db->where('nama !=', NULL);
            } else {
                $id_kabupaten = $this->session->userdata('id_kota_kabupaten');
                $this->db->where('id_kota_kabupaten', $id_kabupaten);
                //$this->db->where('nama !=', NULL);
            }
            $this->db->order_by('nama', 'ASC');
            $query = $this->db->get('m_puskesmas');
            $output = '<option value="">Select Lokasi Puskesmas</option>';
            foreach ($query->result() as $row) {
                $output .= '<option value="' . $row->kode . '">' . $row->nama . '</option>';
            }
        } elseif ($fasyankes == '1') {
            if ($filter <= 2) {
                $id_provinsi = $this->session->userdata('id_provinsi');
                $this->db->where('id_provinsi', $id_provinsi);
            } else {
                $id_kabupaten = $this->session->userdata('id_kota_kabupaten');
                $this->db->where('id_kota_kabupaten', $id_kabupaten);
            }
            $this->db->order_by('nama_rs', 'ASC');
            $query = $this->db->get('m_rumah_sakit');
            $output = '<option value="">Select Lokasi RS</option>';
            foreach ($query->result() as $row) {
                $output .= '<option value="' . $row->kode_rs . '">' . $row->nama_rs . '</option>';
            }
        }
        return $output;
    }
    function fetch_instalasi($fasyankes)
    {

        $this->db->where('id_jenis_faskes', $fasyankes);
        $this->db->order_by('nama_instalasi', 'ASC');
        $query = $this->db->get('v_sarana_instalasi');
        $output = '<option value="">Select Pelayanan</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->kode_instalasi_gabungan . '">' . $row->nama_instalasi . '</option>';
        }
        return $output;
    }
    function fetch_ruangan($instalasi)
    {
        $this->db->where('kode_instalasi_gabungan', $instalasi);
        $this->db->order_by('nama_ruangan', 'ASC');
        $query = $this->db->get('v_sarana_ruangan');
        $output = '<option value="">Select Sub Pelayanan</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->kode_ruangan_gabungan . '">' . $row->nama_ruangan . '</option>';
        }

        return $output;
    }
    function fetch_sarana($ruangan)
    {
        $this->db->where('kode_ruangan_gabungan', $ruangan);
        $this->db->order_by('nama_sarana', 'ASC');
        $query = $this->db->get('v_sarana');
        $output = '<option value="">Select Ruangan</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->kode_sarana . '">' . $row->nama_sarana . '</option>';
        }

        return $output;
    }
    function fetch_alkes($sarana)
    {
        $this->db->where('kode_sarana', $sarana);
        $this->db->order_by('nama_alkes', 'ASC');
        $query = $this->db->get('m_alkes');
        $output = '<option value="">Select Alat Kesehatan</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_alkes . '">' . $row->nama_alkes . '</option>';
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

    function fetch_vrincian($id_dak_rincian)
    {
        $this->db->where('id_dak_rincian', $id_dak_rincian);
        $query = $this->db->get('v_dak_rincian');
        foreach ($query->result() as $row) {
            $hasil = array(
                'id_satuan' => $row->id_satuan,
                'satuan' => $row->satuan,
                'id_jenis_output' => $row->id_jenis_output,
                'nama_jenis_output' => $row->nama_jenis_output,
            );
        }
        return $hasil;
    }
    function get_alkes()
    {
        $this->db->order_by('nama_alkes', $this->order);
        return $this->db->get('m_alkes')->result();
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
        $this->db->select('a.*,b.nama_dak_rincian,b.nama_dak_komponen_sub,b.nama_dak_komponen,b.nama_jenis_output,IFNULL((SELECT realisasi_persen FROM t_realisasi WHERE id_rincian=a.id_rincian ORDER BY periode DESC LIMIT 1),0) AS persen');
        $this->db->from('v_rincian a');
        $this->db->join('v_dak_rincian b', 'a.id_dak_rincian=b.id_dak_rincian', 'left');
        $this->db->where('a.id_rincian', $id);
        return $this->db->get()->result();
    }
    function get_by_edit($id)
    {
        // $this->db->select('a.id_rincian,a.menu_kegiatan,a.kegiatan,a.harga_satuan,a.volume,a.total,a.sarana,a.created_by,a.created_date,a.nip_pengisi,a.nama_pengisi,a.jabatan_pengisi,b.nama_dak_rincian,b.nama_dak_komponen_sub,b.nama_dak_komponen,b.satuan,nama_jenis_output,c.nama_alkes');
        // $this->db->from('t_dak_rincian a');
        // $this->db->join('v_dak_rincian b', 'a.id_dak_rincian=b.id_dak_rincian', 'left');
        // $this->db->join('m_alkes c', 'a.id_alkes=c.id_alkes', 'left');
        $this->db->where('id_rincian', $id);
        return $this->db->get('t_dak_rincian')->row();
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
