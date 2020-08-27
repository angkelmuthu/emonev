<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_apbn_covid_alokasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_apbn_covid_alokasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_apbn_covid_alokasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_apbn_covid_alokasi/index/';
            $config['first_url'] = base_url() . 'index.php/m_apbn_covid_alokasi/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_apbn_covid_alokasi_model->total_rows($q);
        $m_apbn_covid_alokasi = $this->M_apbn_covid_alokasi_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_apbn_covid_alokasi_data' => $m_apbn_covid_alokasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'm_apbn_covid_alokasi/m_apbn_covid_alokasi_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_apbn_covid_alokasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_alokasi' => $row->id_alokasi,
                'nama_kegiatan' => $row->nama_kegiatan,
                'nama_satker' => $row->nama_satker,
                'volume' => $row->volume,
                'alokasi' => $row->alokasi,
                'created_by' => $row->created_by,
                'created_date' => $row->created_date,
            );
            $this->template->load('template', 'm_apbn_covid_alokasi/m_apbn_covid_alokasi_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_apbn_covid_alokasi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_apbn_covid_alokasi/create_action'),
            'id_alokasi' => set_value('id_alokasi'),
            'id_kegiatan' => set_value('id_kegiatan'),
            'kode_satker' => set_value('kode_satker'),
            'volume' => set_value('volume'),
            'alokasi' => set_value('alokasi'),
            'created_by' => set_value('created_by'),
            'created_date' => set_value('created_date'),
        );
        $this->template->load('template', 'm_apbn_covid_alokasi/m_apbn_covid_alokasi_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_kegiatan' => $this->input->post('id_kegiatan', TRUE),
                'kode_satker' => $this->input->post('kode_satker', TRUE),
                'volume' => $this->input->post('volume', TRUE),
                'alokasi' => $this->input->post('alokasi', TRUE),
                'created_by' => $this->input->post('created_by', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
            );

            $this->M_apbn_covid_alokasi_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_apbn_covid_alokasi'));
        }
    }

    public function update($id)
    {
        $row = $this->M_apbn_covid_alokasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_apbn_covid_alokasi/update_action'),
                'id_alokasi' => set_value('id_alokasi', $row->id_alokasi),
                'id_kegiatan' => set_value('id_kegiatan', $row->id_kegiatan),
                'kode_satker' => set_value('kode_satker', $row->kode_satker),
                'volume' => set_value('volume', $row->volume),
                'alokasi' => set_value('alokasi', $row->alokasi),
                'created_by' => set_value('created_by', $row->created_by),
                'created_date' => set_value('created_date', $row->created_date),
            );
            $this->template->load('template', 'm_apbn_covid_alokasi/m_apbn_covid_alokasi_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_apbn_covid_alokasi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_alokasi', TRUE));
        } else {
            $data = array(
                'id_kegiatan' => $this->input->post('id_kegiatan', TRUE),
                'kode_satker' => $this->input->post('kode_satker', TRUE),
                'volume' => $this->input->post('volume', TRUE),
                'alokasi' => $this->input->post('alokasi', TRUE),
                'created_by' => $this->input->post('created_by', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
            );

            $this->M_apbn_covid_alokasi_model->update($this->input->post('id_alokasi', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_apbn_covid_alokasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_apbn_covid_alokasi_model->get_by_id($id);

        if ($row) {
            $this->M_apbn_covid_alokasi_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_apbn_covid_alokasi'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_apbn_covid_alokasi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_kegiatan', 'id kegiatan', 'trim|required');
        $this->form_validation->set_rules('kode_satker', 'kode satker', 'trim|required');
        //$this->form_validation->set_rules('volume', 'volume', 'trim|required');
        $this->form_validation->set_rules('alokasi', 'alokasi', 'trim|required');
        $this->form_validation->set_rules('created_by', 'created by', 'trim|required');
        $this->form_validation->set_rules('created_date', 'created date', 'trim|required');

        $this->form_validation->set_rules('id_alokasi', 'id_alokasi', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_apbn_covid_alokasi.xls";
        $judul = "m_apbn_covid_alokasi";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Id Kegiatan");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Satker");
        xlsWriteLabel($tablehead, $kolomhead++, "Volume");
        xlsWriteLabel($tablehead, $kolomhead++, "Alokasi");
        xlsWriteLabel($tablehead, $kolomhead++, "Created By");
        xlsWriteLabel($tablehead, $kolomhead++, "Created Date");

        foreach ($this->M_apbn_covid_alokasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_kegiatan);
            xlsWriteLabel($tablebody, $kolombody++, $data->kode_satker);
            xlsWriteNumber($tablebody, $kolombody++, $data->volume);
            xlsWriteLabel($tablebody, $kolombody++, $data->alokasi);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_by);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_date);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file M_apbn_covid_alokasi.php */
/* Location: ./application/controllers/M_apbn_covid_alokasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-27 16:23:12 */
/* http://harviacode.com */