<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_output_anggaran_covid extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_output_anggaran_covid_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_output_anggaran_covid/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_output_anggaran_covid/index/';
            $config['first_url'] = base_url() . 'index.php/m_output_anggaran_covid/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_output_anggaran_covid_model->total_rows($q);
        $m_output_anggaran_covid = $this->M_output_anggaran_covid_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_output_anggaran_covid_data' => $m_output_anggaran_covid,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','m_output_anggaran_covid/m_output_anggaran_covid_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_output_anggaran_covid_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
        'kode_outpur' => $row->kode_output,
		'nama_output' => $row->nama_output,
	    );
            $this->template->load('template','m_output_anggaran_covid/m_output_anggaran_covid_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_output_anggaran_covid'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_output_anggaran_covid/create_action'),
	    'id' => set_value('id'),
        'kode_output' => set_value('kode_output'),
        'id_sub_kegiatan' => set_value('id_sub_kegiatan'),
	    'nama_output' => set_value('nama_output'),
	);
        $this->template->load('template','m_output_anggaran_covid/m_output_anggaran_covid_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'kode_output' => $this->input->post('kode_output',TRUE),
        'id_sub_kegiatan' => $this->input->post('id_sub_kegiatan',TRUE),
		'nama_output' => $this->input->post('nama_output',TRUE),
	    );

            $this->M_output_anggaran_covid_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_output_anggaran_covid'));
        }
    }

    public function update($id)
    {
        $row = $this->M_output_anggaran_covid_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_output_anggaran_covid/update_action'),
		'id' => set_value('id', $row->id),
        'kode_output' => set_value('kode_output', $row->kode_output),
        'id_sub_kegiatan' => set_value('id_sub_kegiatan', $row->id_sub_kegiatan),
		'nama_output' => set_value('nama_output', $row->nama_output),
	    );
            $this->template->load('template','m_output_anggaran_covid/m_output_anggaran_covid_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_output_anggaran_covid'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        'kode_output' => $this->input->post('kode_output',TRUE),
        'id_sub_kegiatan' => $this->input->post('id_sub_kegiatan',TRUE),
		'nama_output' => $this->input->post('nama_output',TRUE),
	    );

            $this->M_output_anggaran_covid_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_output_anggaran_covid'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_output_anggaran_covid_model->get_by_id($id);

        if ($row) {
            $this->M_output_anggaran_covid_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_output_anggaran_covid'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_output_anggaran_covid'));
        }
    }

    public function _rules()
    {
    $this->form_validation->set_rules('kode_output', 'Kode output', 'trim|required');
	$this->form_validation->set_rules('nama_output', 'nama output', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_output_anggaran_covid.php */
/* Location: ./application/controllers/M_output_anggaran_covid.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-21 21:04:02 */
/* http://harviacode.com */