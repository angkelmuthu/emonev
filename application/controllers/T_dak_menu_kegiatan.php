<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_dak_menu_kegiatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_dak_menu_kegiatan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_dak_menu_kegiatan/t_dak_menu_kegiatan_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_dak_menu_kegiatan_model->json();
    }
    public function list()
    {
        $idsubkomponen = $this->uri->segment(3);
        $idalokasi = $this->uri->segment(4);
        $data = array(
            'rincian' => $this->T_dak_menu_kegiatan_model->get_rincian($idsubkomponen, $idalokasi),
        );
        $this->template->load('template', 't_dak_menu_kegiatan/t_dak_menu_kegiatan_list', $data);
    }
    public function read($id)
    {
        $row = $this->T_dak_menu_kegiatan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_menu_kegiatan' => $row->id_menu_kegiatan,
                'id_dak_komponen_sub' => $row->id_dak_komponen_sub,
                'id_dak_alokasi' => $row->id_dak_alokasi,
                'nama_menu_kegiatan' => $row->nama_menu_kegiatan,
                'created_by' => $row->created_by,
                'created_date' => $row->created_date,
                'updated_by' => $row->updated_by,
                'updated_date' => $row->updated_date,
                'isdeleted' => $row->isdeleted,
            );
            $this->template->load('template', 't_dak_menu_kegiatan/t_dak_menu_kegiatan_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_dak_menu_kegiatan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_dak_menu_kegiatan/create_action'),
            'id_menu_kegiatan' => set_value('id_menu_kegiatan'),
            'id_dak_komponen_sub' => set_value('id_dak_komponen_sub'),
            'id_dak_alokasi' => set_value('id_dak_alokasi'),
            'nama_menu_kegiatan' => set_value('nama_menu_kegiatan'),
            'created_by' => set_value('created_by'),
            'created_date' => set_value('created_date'),
            'updated_by' => set_value('updated_by'),
            'updated_date' => set_value('updated_date'),
            'isdeleted' => set_value('isdeleted'),
        );
        $this->template->load('template', 't_dak_menu_kegiatan/t_dak_menu_kegiatan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_dak_komponen_sub' => $this->input->post('id_dak_komponen_sub', TRUE),
                'id_dak_alokasi' => $this->input->post('id_dak_alokasi', TRUE),
                'nama_menu_kegiatan' => $this->input->post('nama_menu_kegiatan', TRUE),
                'created_by' => $this->input->post('created_by', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'updated_by' => $this->input->post('updated_by', TRUE),
                'updated_date' => $this->input->post('updated_date', TRUE),
                'isdeleted' => $this->input->post('isdeleted', TRUE),
            );
            $id_dak_komponen_sub = $this->input->post('id_dak_komponen_sub');
            $id_dak_alokasi = $this->input->post('id_dak_alokasi');
            $id_dak_sub_bidang = $this->input->post('id_dak_sub_bidang');
            $this->T_dak_menu_kegiatan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_dak_menu_kegiatan/list/' . $id_dak_komponen_sub . '/' . $id_dak_alokasi . '/' . $id_dak_sub_bidang));
        }
    }

    public function update($id)
    {
        $row = $this->T_dak_menu_kegiatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_dak_menu_kegiatan/update_action'),
                'id_menu_kegiatan' => set_value('id_menu_kegiatan', $row->id_menu_kegiatan),
                'id_dak_komponen_sub' => set_value('id_dak_komponen_sub', $row->id_dak_komponen_sub),
                'id_dak_alokasi' => set_value('id_dak_alokasi', $row->id_dak_alokasi),
                'nama_menu_kegiatan' => set_value('nama_menu_kegiatan', $row->nama_menu_kegiatan),
                'created_by' => set_value('created_by', $row->created_by),
                'created_date' => set_value('created_date', $row->created_date),
                'updated_by' => set_value('updated_by', $row->updated_by),
                'updated_date' => set_value('updated_date', $row->updated_date),
                'isdeleted' => set_value('isdeleted', $row->isdeleted),
            );
            $this->template->load('template', 't_dak_menu_kegiatan/t_dak_menu_kegiatan_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_dak_menu_kegiatan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_menu_kegiatan', TRUE));
        } else {
            $data = array(
                'id_dak_komponen_sub' => $this->input->post('id_dak_komponen_sub', TRUE),
                'id_dak_alokasi' => $this->input->post('id_dak_alokasi', TRUE),
                'nama_menu_kegiatan' => $this->input->post('nama_menu_kegiatan', TRUE),
                'created_by' => $this->input->post('created_by', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'updated_by' => $this->input->post('updated_by', TRUE),
                'updated_date' => $this->input->post('updated_date', TRUE),
                'isdeleted' => $this->input->post('isdeleted', TRUE),
            );

            $this->T_dak_menu_kegiatan_model->update($this->input->post('id_menu_kegiatan', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_dak_menu_kegiatan'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_dak_menu_kegiatan_model->get_by_id($id);

        if ($row) {
            $this->T_dak_menu_kegiatan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_dak_menu_kegiatan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_dak_menu_kegiatan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_dak_komponen_sub', 'id dak komponen sub', 'trim|required');
        $this->form_validation->set_rules('id_dak_alokasi', 'id dak alokasi', 'trim|required');
        $this->form_validation->set_rules('nama_menu_kegiatan', 'nama menu kegiatan', 'trim|required');
        $this->form_validation->set_rules('created_by', 'created by', 'trim|required');
        $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        $this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
        $this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
        $this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

        $this->form_validation->set_rules('id_menu_kegiatan', 'id_menu_kegiatan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file T_dak_menu_kegiatan.php */
/* Location: ./application/controllers/T_dak_menu_kegiatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-22 16:23:50 */
/* http://harviacode.com */