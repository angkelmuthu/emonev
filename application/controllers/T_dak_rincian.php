<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_dak_rincian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_dak_rincian_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $id_dak_alokasi = $this->uri->segment(2);
        $id_dak_menu_sub = $this->uri->segment(3);
        $data = array(
            'dt_rincian' => $this->T_dak_rincian_model->get_all($id_dak_alokasi, $id_dak_menu_sub),
        );
        $this->template->load('template', 't_dak_rincian/t_dak_rincian_list');
    }
    public function list()
    {
        $id_dak_alokasi = $this->uri->segment(3);
        $id_dak_menu_sub = $this->uri->segment(4);
        $data = array(
            'dt_rincian' => $this->T_dak_rincian_model->get_all($id_dak_alokasi, $id_dak_menu_sub),
        );
        $this->template->load('template', 't_dak_rincian/t_dak_rincian_list', $data);
    }
    public function json()
    {

        header('Content-Type: application/json');
        echo $this->T_dak_rincian_model->json();
    }

    public function read($id)
    {
        $row = $this->T_dak_rincian_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_rincian' => $row->id_rincian,
                'id_menu_sub' => $row->id_menu_sub,
                'id_dak_alokasi' => $row->id_dak_alokasi,
                'id_dak_rincian' => $row->id_dak_rincian,
                'volume' => $row->volume,
                'harga_satuan' => $row->harga_satuan,
                'satuan' => $row->satuan,
                'total' => $row->total,
                'created_by' => $row->created_by,
                'created_date' => $row->created_date,
                'updated_by' => $row->updated_by,
                'updated_date' => $row->updated_date,
                'isdeleted' => $row->isdeleted,
            );
            $this->template->load('template', 't_dak_rincian/t_dak_rincian_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_dak_rincian'));
        }
    }

    function get_rs_ruangan()
    {
        $kode_instalasi = $this->input->post('kode_instalasi');
        $data = $this->T_dak_rincian_model->get_ruangan($kode_instalasi);
        echo json_encode($data);
    }

    function get_rs_sarana()
    {
        $id_ruangan = $this->input->post('id_ruangan');
        $data = $this->T_dak_rincian_model->get_sarana($id_ruangan);
        echo json_encode($data);
    }

    ///////////////////////////////////////////////
    function get_alkes_instalasi()
    {
        $kode_faskes = $this->input->post('kode_faskes');
        $data = $this->T_dak_rincian_model->get_instalasi_alkes($kode_faskes);
        echo json_encode($data);
    }
    function get_alkes_ruangan()
    {
        $kode_instalasi_alkes = $this->input->post('kode_instalasi_alkes');
        $data = $this->T_dak_rincian_model->get_ruangan_alkes($kode_instalasi_alkes);
        echo json_encode($data);
    }
    function get_alkes_sarana()
    {
        $kode_ruangan_alkes = $this->input->post('kode_ruangan_alkes');
        $data = $this->T_dak_rincian_model->get_sarana_alkes($kode_ruangan_alkes);
        echo json_encode($data);
    }
    function get_alkes()
    {
        $kode_sarana_alkes = $this->input->post('kode_sarana_alkes');
        $data = $this->T_dak_rincian_model->get_alkes($kode_sarana_alkes);
        echo json_encode($data);
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_dak_rincian/create_action'),
            'id_rincian' => set_value('id_rincian'),
            'id_kegiatan' => set_value('id_kegiatan'),
            'id_dak_alokasi' => set_value('id_dak_alokasi'),
            'id_dak_rincian' => set_value('id_dak_rincian'),
            'id_alkes' => set_value('alkes'),
            'volume' => set_value('volume'),
            'harga_satuan' => set_value('harga_satuan'),
            'satuan' => set_value('satuan'),
            'total' => set_value('total'),
            'sarana' => set_value('sarana'),
            'created_by' => set_value('created_by'),
            'created_date' => set_value('created_date'),
            'updated_by' => set_value('updated_by'),
            'updated_date' => set_value('updated_date'),
            'isdeleted' => set_value('isdeleted'),
            'instalasi' => $this->T_dak_rincian_model->get_instalasi(),
            'fasyankes' => $this->T_dak_rincian_model->get_fasyankes(),
        );
        $this->template->load('template', 't_dak_rincian/t_dak_rincian_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_kegiatan' => $this->input->post('id_kegiatan', TRUE),
                'id_dak_alokasi' => $this->input->post('id_dak_alokasi', TRUE),
                'id_dak_rincian' => $this->input->post('id_dak_rincian', TRUE),
                'id_alkes' => $this->input->post('alkes', TRUE),
                'volume' => $this->input->post('volume', TRUE),
                'harga_satuan' => $this->input->post('harga_satuan', TRUE),
                'satuan' => $this->input->post('satuan', TRUE),
                'total' => $this->input->post('total', TRUE),
                'sarana' => $this->input->post('sarana', TRUE),
                'created_by' => $this->input->post('created_by', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'updated_by' => $this->input->post('updated_by', TRUE),
                'updated_date' => $this->input->post('updated_date', TRUE),
                'isdeleted' => $this->input->post('isdeleted', TRUE),
            );
            $id_dak_alokasi = $this->input->post('id_dak_alokasi');
            $id_dak_sub_komponen = $this->input->post('id_dak_sub_komponen');
            $id_dak_sub_bidang = $this->input->post('id_dak_sub_bidang');
            $this->T_dak_rincian_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_dak_menu_kegiatan/list/' . $id_dak_sub_komponen . '/' . $id_dak_alokasi . '/' . $id_dak_sub_bidang));
        }
    }

    public function update($id)
    {
        $row = $this->T_dak_rincian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_dak_rincian/update_action'),
                'id_rincian' => set_value('id_rincian', $row->id_rincian),
                'id_kegiatan' => set_value('id_kegiatan', $row->id_menu_sub),
                'id_dak_alokasi' => set_value('id_dak_alokasi', $row->id_dak_alokasi),
                'id_dak_rincian' => set_value('id_dak_rincian', $row->id_dak_rincian),
                'volume' => set_value('volume', $row->volume),
                'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
                'satuan' => set_value('satuan', $row->satuan),
                'total' => set_value('total', $row->total),
                'created_by' => set_value('created_by', $row->created_by),
                'created_date' => set_value('created_date', $row->created_date),
                'updated_by' => set_value('updated_by', $row->updated_by),
                'updated_date' => set_value('updated_date', $row->updated_date),
                'isdeleted' => set_value('isdeleted', $row->isdeleted),
            );
            $this->template->load('template', 't_dak_rincian/t_dak_rincian_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_dak_rincian'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rincian', TRUE));
        } else {
            $data = array(
                'id_kegiatan' => $this->input->post('id_kegiatan', TRUE),
                'id_dak_alokasi' => $this->input->post('id_dak_alokasi', TRUE),
                //'id_dak_rincian' => $this->input->post('id_dak_rincian', TRUE),
                //'id_alkes' => $this->input->post('alkes', TRUE),
                'volume' => $this->input->post('volume', TRUE),
                'harga_satuan' => $this->input->post('harga_satuan', TRUE),
                'satuan' => $this->input->post('satuan', TRUE),
                'total' => $this->input->post('total', TRUE),
                'created_by' => $this->input->post('created_by', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'updated_by' => $this->input->post('updated_by', TRUE),
                'updated_date' => $this->input->post('updated_date', TRUE),
                'isdeleted' => $this->input->post('isdeleted', TRUE),
            );

            $this->T_dak_rincian_model->update($this->input->post('id_rincian', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_dak_rincian'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_dak_rincian_model->get_by_id($id);

        if ($row) {
            $this->T_dak_rincian_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_dak_rincian'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_dak_rincian'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_kegiatan', 'id menu kegiatan', 'trim|required');
        $this->form_validation->set_rules('id_dak_alokasi', 'id dak alokasi', 'trim|required');
        //$this->form_validation->set_rules('id_dak_rincian', 'id dak rincian', 'trim|required');
        $this->form_validation->set_rules('volume', 'volume', 'trim|required');
        $this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required|numeric');
        $this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
        $this->form_validation->set_rules('total', 'total', 'trim|required|numeric');
        $this->form_validation->set_rules('sarana', 'sarana', 'trim|required|numeric');
        $this->form_validation->set_rules('created_by', 'created by', 'trim|required');
        $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        $this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
        $this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
        $this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

        $this->form_validation->set_rules('id_rincian', 'id_rincian', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file T_dak_rincian.php */
/* Location: ./application/controllers/T_dak_rincian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-18 18:17:16 */
/* http://harviacode.com */