<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_petugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_petugas_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    // public function index()
    // {
    //     $this->template->load('template', 'm_petugas/m_petugas_list');
    // }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_petugas_model->json();
    }

    public function read($id)
    {
        $row = $this->M_petugas_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_satker' => $row->id_satker,
                'nip' => $row->nip,
                'nama' => $row->nama,
                'jabatan' => $row->jabatan,
                'created_date' => $row->created_date,
            );
            $this->template->load('template', 'm_petugas/m_petugas_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_petugas'));
        }
    }

    public function index()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_petugas/create_action'),
            'id_satker' => set_value('id_satker'),
            'nip' => set_value('nip'),
            'nama' => set_value('nama'),
            'jabatan' => set_value('jabatan'),
            'created_date' => set_value('created_date'),
        );
        $this->template->load('template', 'm_petugas/m_petugas_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            //$this->create();
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Data yang anda masukkan tidak lengkap</strong></div>');
            redirect(site_url('m_petugas'));
        } else {
            $data = array(
                'id_satker' => $this->input->post('id_satker', TRUE),
                'nip' => $this->input->post('nip', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'jabatan' => $this->input->post('jabatan', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
            );
            $id_satker = $this->input->post('id_satker');
            $this->M_petugas_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_petugas/update/' . $id_satker));
        }
    }

    public function update($id)
    {
        $row = $this->M_petugas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_petugas/update_action'),
                'id_satker' => set_value('id_satker', $row->id_satker),
                'nip' => set_value('nip', $row->nip),
                'nama' => set_value('nama', $row->nama),
                'jabatan' => set_value('jabatan', $row->jabatan),
                'created_date' => set_value('created_date', $row->created_date),
            );
            $this->template->load('template', 'm_petugas/m_petugas_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_petugas'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_satker', TRUE));
        } else {
            $data = array(
                'id_satker' => $this->input->post('id_satker', TRUE),
                'nip' => $this->input->post('nip', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'jabatan' => $this->input->post('jabatan', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
            );
            $id_satker = $this->input->post('id_satker');
            $this->M_petugas_model->update($this->input->post('id_satker', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_petugas/update/' . $id_satker));
        }
    }

    public function delete($id)
    {
        $row = $this->M_petugas_model->get_by_id($id);

        if ($row) {
            $this->M_petugas_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_petugas'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_petugas'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_satker', 'id satker', 'trim|required');
        $this->form_validation->set_rules('nip', 'nip', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
        $this->form_validation->set_rules('created_date', 'created date', 'trim|required');

        $this->form_validation->set_rules('', '', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_petugas.php */
/* Location: ./application/controllers/M_petugas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-09 04:32:25 */
/* http://harviacode.com */
