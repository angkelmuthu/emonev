<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_satker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_satker_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','m_satker/m_satker_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_satker_model->json();
    }

    public function read($id)
    {
        $row = $this->M_satker_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_satker' => $row->id_satker,
		'id_jenis_satker' => $row->id_jenis_satker,
		'id_provinsi' => $row->id_provinsi,
		'id_kota_kabupaten' => $row->id_kota_kabupaten,
		'id_rumah_sakit' => $row->id_rumah_sakit,
		'kode_satker' => $row->kode_satker,
		'nama' => $row->nama,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'isdeleted' => $row->isdeleted,
	    );
            $this->template->load('template','m_satker/m_satker_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_satker'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_satker/create_action'),
	    'id_satker' => set_value('id_satker'),
	    'id_jenis_satker' => set_value('id_jenis_satker'),
	    'id_provinsi' => set_value('id_provinsi'),
	    'id_kota_kabupaten' => set_value('id_kota_kabupaten'),
	    'id_rumah_sakit' => set_value('id_rumah_sakit'),
	    'kode_satker' => set_value('kode_satker'),
	    'nama' => set_value('nama'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'isdeleted' => set_value('isdeleted'),
	);
        $this->template->load('template','m_satker/m_satker_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_jenis_satker' => $this->input->post('id_jenis_satker',TRUE),
		'id_provinsi' => $this->input->post('id_provinsi',TRUE),
		'id_kota_kabupaten' => $this->input->post('id_kota_kabupaten',TRUE),
		'id_rumah_sakit' => $this->input->post('id_rumah_sakit',TRUE),
		'kode_satker' => $this->input->post('kode_satker',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_satker_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_satker'));
        }
    }

    public function update($id)
    {
        $row = $this->M_satker_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_satker/update_action'),
		'id_satker' => set_value('id_satker', $row->id_satker),
		'id_jenis_satker' => set_value('id_jenis_satker', $row->id_jenis_satker),
		'id_provinsi' => set_value('id_provinsi', $row->id_provinsi),
		'id_kota_kabupaten' => set_value('id_kota_kabupaten', $row->id_kota_kabupaten),
		'id_rumah_sakit' => set_value('id_rumah_sakit', $row->id_rumah_sakit),
		'kode_satker' => set_value('kode_satker', $row->kode_satker),
		'nama' => set_value('nama', $row->nama),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'isdeleted' => set_value('isdeleted', $row->isdeleted),
	    );
            $this->template->load('template','m_satker/m_satker_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_satker'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_satker', TRUE));
        } else {
            $data = array(
		'id_jenis_satker' => $this->input->post('id_jenis_satker',TRUE),
		'id_provinsi' => $this->input->post('id_provinsi',TRUE),
		'id_kota_kabupaten' => $this->input->post('id_kota_kabupaten',TRUE),
		'id_rumah_sakit' => $this->input->post('id_rumah_sakit',TRUE),
		'kode_satker' => $this->input->post('kode_satker',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdeleted' => $this->input->post('isdeleted',TRUE),
	    );

            $this->M_satker_model->update($this->input->post('id_satker', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_satker'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_satker_model->get_by_id($id);

        if ($row) {
            $this->M_satker_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_satker'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_satker'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_jenis_satker', 'id jenis satker', 'trim|required');
	$this->form_validation->set_rules('id_provinsi', 'id provinsi', 'trim|required');
	$this->form_validation->set_rules('id_kota_kabupaten', 'id kota kabupaten', 'trim|required');
	$this->form_validation->set_rules('id_rumah_sakit', 'id rumah sakit', 'trim|required');
	$this->form_validation->set_rules('kode_satker', 'kode satker', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

	$this->form_validation->set_rules('id_satker', 'id_satker', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_satker.xls";
        $judul = "m_satker";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenis Satker");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kota Kabupaten");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Rumah Sakit");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Satker");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Isdeleted");

	foreach ($this->M_satker_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jenis_satker);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_provinsi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kota_kabupaten);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_rumah_sakit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_satker);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isdeleted);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_satker.php */
/* Location: ./application/controllers/M_satker.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-15 15:34:44 */
/* http://harviacode.com */