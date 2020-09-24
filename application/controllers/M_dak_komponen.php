<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dak_komponen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_dak_komponen_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_dak_komponen/m_dak_komponen_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_dak_komponen_model->json();
    }

    public function read($id)
    {
        $row = $this->M_dak_komponen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_dak_komponen' => $row->id_dak_komponen,
		'id_dak_sub_bidang' => $row->id_dak_sub_bidang,
		'kode_dak_komponen' => $row->kode_dak_komponen,
		'nama_dak_komponen' => $row->nama_dak_komponen,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'isdeleted' => $row->isdeleted,
	    );
            $this->template->load('template','m_dak_komponen/m_dak_komponen_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_komponen'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_dak_komponen/create_action'),
	    'id_dak_komponen' => set_value('id_dak_komponen'),
	    'id_dak_sub_bidang' => set_value('id_dak_sub_bidang'),
	    'kode_dak_komponen' => set_value('kode_dak_komponen'),
	    'nama_dak_komponen' => set_value('nama_dak_komponen'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'isdeleted' => set_value('isdeleted'),
	);
        $this->template->load('template','m_dak_komponen/m_dak_komponen_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_dak_sub_bidang' => $this->input->post('id_dak_sub_bidang',TRUE),
		'kode_dak_komponen' => $this->input->post('kode_dak_komponen',TRUE),
		'nama_dak_komponen' => $this->input->post('nama_dak_komponen',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_dak_komponen_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_dak_komponen'));
        }
    }

    public function update($id)
    {
        $row = $this->M_dak_komponen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_dak_komponen/update_action'),
		'id_dak_komponen' => set_value('id_dak_komponen', $row->id_dak_komponen),
		'id_dak_sub_bidang' => set_value('id_dak_sub_bidang', $row->id_dak_sub_bidang),
		'kode_dak_komponen' => set_value('kode_dak_komponen', $row->kode_dak_komponen),
		'nama_dak_komponen' => set_value('nama_dak_komponen', $row->nama_dak_komponen),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'isdeleted' => set_value('isdeleted', $row->isdeleted),
	    );
            $this->template->load('template','m_dak_komponen/m_dak_komponen_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_komponen'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dak_komponen', TRUE));
        } else {
            $data = array(
		'id_dak_sub_bidang' => $this->input->post('id_dak_sub_bidang',TRUE),
		'kode_dak_komponen' => $this->input->post('kode_dak_komponen',TRUE),
		'nama_dak_komponen' => $this->input->post('nama_dak_komponen',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_dak_komponen_model->update($this->input->post('id_dak_komponen', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_dak_komponen'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_dak_komponen_model->get_by_id($id);

        if ($row) {
            $this->M_dak_komponen_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_dak_komponen'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_komponen'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_dak_sub_bidang', 'id dak sub bidang', 'trim|required');
	$this->form_validation->set_rules('kode_dak_komponen', 'kode dak komponen', 'trim|required');
	$this->form_validation->set_rules('nama_dak_komponen', 'nama dak komponen', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

	$this->form_validation->set_rules('id_dak_komponen', 'id_dak_komponen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_dak_komponen.php */
/* Location: ./application/controllers/M_dak_komponen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-24 09:43:15 */
/* http://harviacode.com */