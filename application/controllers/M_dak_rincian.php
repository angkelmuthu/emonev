<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dak_rincian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_dak_rincian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_dak_rincian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_dak_rincian/index/';
            $config['first_url'] = base_url() . 'index.php/m_dak_rincian/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_dak_rincian_model->total_rows($q);
        $m_dak_rincian = $this->M_dak_rincian_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_dak_rincian_data' => $m_dak_rincian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','m_dak_rincian/m_dak_rincian_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_dak_rincian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_dak_rincian' => $row->id_dak_rincian,
		'id_dak_komponen_sub' => $row->id_dak_komponen_sub,
		'kode_dak_rincian' => $row->kode_dak_rincian,
		'nama_dak_rincian' => $row->nama_dak_rincian,
		'id_satuan' => $row->id_satuan,
		'id_jenis_output' => $row->id_jenis_output,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'isdeleted' => $row->isdeleted,
	    );
            $this->template->load('template','m_dak_rincian/m_dak_rincian_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_rincian'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_dak_rincian/create_action'),
	    'id_dak_rincian' => set_value('id_dak_rincian'),
	    'id_dak_komponen_sub' => set_value('id_dak_komponen_sub'),
	    'kode_dak_rincian' => set_value('kode_dak_rincian'),
	    'nama_dak_rincian' => set_value('nama_dak_rincian'),
	    'id_satuan' => set_value('id_satuan'),
	    'id_jenis_output' => set_value('id_jenis_output'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'isdeleted' => set_value('isdeleted'),
	);
        $this->template->load('template','m_dak_rincian/m_dak_rincian_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_dak_komponen_sub' => $this->input->post('id_dak_komponen_sub',TRUE),
		'kode_dak_rincian' => $this->input->post('kode_dak_rincian',TRUE),
		'nama_dak_rincian' => $this->input->post('nama_dak_rincian',TRUE),
		'id_satuan' => $this->input->post('id_satuan',TRUE),
		'id_jenis_output' => $this->input->post('id_jenis_output',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_dak_rincian_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_dak_rincian'));
        }
    }

    public function update($id)
    {
        $row = $this->M_dak_rincian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_dak_rincian/update_action'),
		'id_dak_rincian' => set_value('id_dak_rincian', $row->id_dak_rincian),
		'id_dak_komponen_sub' => set_value('id_dak_komponen_sub', $row->id_dak_komponen_sub),
		'kode_dak_rincian' => set_value('kode_dak_rincian', $row->kode_dak_rincian),
		'nama_dak_rincian' => set_value('nama_dak_rincian', $row->nama_dak_rincian),
		'id_satuan' => set_value('id_satuan', $row->id_satuan),
		'id_jenis_output' => set_value('id_jenis_output', $row->id_jenis_output),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'isdeleted' => set_value('isdeleted', $row->isdeleted),
	    );
            $this->template->load('template','m_dak_rincian/m_dak_rincian_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_rincian'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dak_rincian', TRUE));
        } else {
            $data = array(
		'id_dak_komponen_sub' => $this->input->post('id_dak_komponen_sub',TRUE),
		'kode_dak_rincian' => $this->input->post('kode_dak_rincian',TRUE),
		'nama_dak_rincian' => $this->input->post('nama_dak_rincian',TRUE),
		'id_satuan' => $this->input->post('id_satuan',TRUE),
		'id_jenis_output' => $this->input->post('id_jenis_output',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_dak_rincian_model->update($this->input->post('id_dak_rincian', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_dak_rincian'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_dak_rincian_model->get_by_id($id);

        if ($row) {
            $this->M_dak_rincian_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_dak_rincian'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_rincian'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_dak_komponen_sub', 'id dak komponen sub', 'trim|required');
	$this->form_validation->set_rules('kode_dak_rincian', 'kode dak rincian', 'trim|required');
	$this->form_validation->set_rules('nama_dak_rincian', 'nama dak rincian', 'trim|required');
	$this->form_validation->set_rules('id_satuan', 'id satuan', 'trim|required');
	$this->form_validation->set_rules('id_jenis_output', 'id jenis output', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

	$this->form_validation->set_rules('id_dak_rincian', 'id_dak_rincian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_dak_rincian.php */
/* Location: ./application/controllers/M_dak_rincian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-02 10:54:57 */
/* http://harviacode.com */