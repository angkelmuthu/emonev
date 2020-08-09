<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dak_alokasi_satker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_dak_alokasi_satker_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_dak_alokasi_satker/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_dak_alokasi_satker/index/';
            $config['first_url'] = base_url() . 'index.php/m_dak_alokasi_satker/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_dak_alokasi_satker_model->total_rows($q);
        $m_dak_alokasi = $this->M_dak_alokasi_satker_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_dak_alokasi_data' => $m_dak_alokasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'm_dak_alokasi_satker/m_dak_alokasi_satker_list', $data);
    }

    public function read($id, $id_sub_bidang)
    {
        //$id_sub_bidang = $this->uri->segment(4);
        $row = $this->M_dak_alokasi_satker_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_dak_alokasi' => $row->id_dak_alokasi,
                'nama_dak_sub_bidang' => $row->nama_dak_sub_bidang,
                'dak_kelompok' => $row->dak_kelompok,
                'satker' => $row->satker,
                'tahun' => $row->tahun,
                'nilai_alokasi' => $row->nilai_alokasi,
                'created_by' => $row->created_by,
                'created_date' => $row->created_date,
                'updated_by' => $row->updated_by,
                'updated_date' => $row->updated_date,
                'isdeleted' => $row->isdeleted,
                'komponen' => $this->M_dak_alokasi_satker_model->get_komponen($id_sub_bidang),
            );
            $this->template->load('template', 'm_dak_alokasi_satker/m_dak_alokasi_satker_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_alokasi_satker'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_dak_alokasi/create_action'),
            'id_dak_alokasi' => set_value('id_dak_alokasi'),
            'id_dak_jenis' => set_value('id_dak_jenis'),
            'id_dak_kelompok' => set_value('id_dak_kelompok'),
            'id_satker' => set_value('id_satker'),
            'tahun' => set_value('tahun'),
            'nilai_alokasi' => set_value('nilai_alokasi'),
            'created_by' => set_value('created_by'),
            'created_date' => set_value('created_date'),
            'updated_by' => set_value('updated_by'),
            'updated_date' => set_value('updated_date'),
            'isdeleted' => set_value('isdeleted'),
        );
        $this->template->load('template', 'm_dak_alokasi/m_dak_alokasi_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_dak_jenis' => $this->input->post('id_dak_jenis', TRUE),
                'id_dak_kelompok' => $this->input->post('id_dak_kelompok', TRUE),
                'id_satker' => $this->input->post('id_satker', TRUE),
                'tahun' => $this->input->post('tahun', TRUE),
                'nilai_alokasi' => $this->input->post('nilai_alokasi', TRUE),
                'created_by' => $this->input->post('created_by', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'updated_by' => $this->input->post('updated_by', TRUE),
                'updated_date' => $this->input->post('updated_date', TRUE),
                'isdeleted' => $this->input->post('isdeleted', TRUE),
            );

            $this->M_dak_alokasi_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_dak_alokasi'));
        }
    }

    public function update($id)
    {
        $row = $this->M_dak_alokasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_dak_alokasi/update_action'),
                'id_dak_alokasi' => set_value('id_dak_alokasi', $row->id_dak_alokasi),
                'id_dak_jenis' => set_value('id_dak_jenis', $row->id_dak_jenis),
                'id_dak_kelompok' => set_value('id_dak_kelompok', $row->id_dak_kelompok),
                'id_satker' => set_value('id_satker', $row->id_satker),
                'tahun' => set_value('tahun', $row->tahun),
                'nilai_alokasi' => set_value('nilai_alokasi', $row->nilai_alokasi),
                // 'created_by' => set_value('created_by', $row->created_by),
                // 'created_date' => set_value('created_date', $row->created_date),
                'updated_by' => set_value('updated_by', $row->updated_by),
                'updated_date' => set_value('updated_date', $row->updated_date),
                'isdeleted' => set_value('isdeleted', $row->isdeleted),
            );
            $this->template->load('template', 'm_dak_alokasi/m_dak_alokasi_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_alokasi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dak_alokasi', TRUE));
        } else {
            $data = array(
                'id_dak_jenis' => $this->input->post('id_dak_jenis', TRUE),
                'id_dak_kelompok' => $this->input->post('id_dak_kelompok', TRUE),
                'id_satker' => $this->input->post('id_satker', TRUE),
                'tahun' => $this->input->post('tahun', TRUE),
                'nilai_alokasi' => $this->input->post('nilai_alokasi', TRUE),
                // 'created_by' => $this->input->post('created_by', TRUE),
                // 'created_date' => $this->input->post('created_date', TRUE),
                'updated_by' => $this->input->post('updated_by', TRUE),
                'updated_date' => $this->input->post('updated_date', TRUE),
                'isdeleted' => $this->input->post('isdeleted', TRUE),
            );

            $this->M_dak_alokasi_model->update($this->input->post('id_dak_alokasi', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_dak_alokasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_dak_alokasi_model->get_by_id($id);

        if ($row) {
            $this->M_dak_alokasi_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_dak_alokasi'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_dak_alokasi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_dak_jenis', 'id dak jenis', 'trim|required');
        $this->form_validation->set_rules('id_dak_kelompok', 'id dak kelompok', 'trim|required');
        $this->form_validation->set_rules('id_satker', 'id satker', 'trim|required');
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
        $this->form_validation->set_rules('nilai_alokasi', 'nilai alokasi', 'trim|required|numeric');
        // $this->form_validation->set_rules('created_by', 'created by', 'trim|required');
        // $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        // $this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
        // $this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
        $this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

        $this->form_validation->set_rules('id_dak_alokasi', 'id_dak_alokasi', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_dak_alokasi.xls";
        $judul = "m_dak_alokasi";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Id Dak Jenis");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Dak Kelompok");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Satker");
        xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
        xlsWriteLabel($tablehead, $kolomhead++, "Nilai Alokasi");
        xlsWriteLabel($tablehead, $kolomhead++, "Created By");
        xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Isdeleted");

        foreach ($this->M_dak_alokasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_dak_jenis);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_dak_kelompok);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_satker);
            xlsWriteNumber($tablebody, $kolombody++, $data->tahun);
            xlsWriteNumber($tablebody, $kolombody++, $data->nilai_alokasi);
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

/* End of file M_dak_alokasi.php */
/* Location: ./application/controllers/M_dak_alokasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-16 16:43:44 */
/* http://harviacode.com */