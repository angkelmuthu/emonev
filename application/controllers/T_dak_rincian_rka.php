<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class T_dak_rincian_rka extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('T_dak_rincian_rka_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->uri->segment(3));

		if ($q <> '') {
			$config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'index.php/t_dak_rincian_rka/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'index.php/t_dak_rincian_rka/index/';
			$config['first_url'] = base_url() . 'index.php/t_dak_rincian_rka/index/';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = FALSE;
		$config['total_rows'] = $this->T_dak_rincian_rka_model->total_rows($q);
		$t_dak_rincian_rka = $this->T_dak_rincian_rka_model->get_limit_data($config['per_page'], $start, $q);
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			't_dak_rincian_rka_data' => $t_dak_rincian_rka,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->template->load('template', 't_dak_rincian_rka/t_dak_rincian_list', $data);
	}

	public function read($id)
	{
		$row = $this->T_dak_rincian_rka_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_rincian' => $row->id_rincian,
				'id_satker' => $row->id_satker,
				'id_dak_alokasi' => $row->id_dak_alokasi,
				'tahun_anggaran' => $row->tahun_anggaran,
				'id_dak_bidang' => $row->id_dak_bidang,
				'id_dak_sub_bidang' => $row->id_dak_sub_bidang,
				'id_dak_komponen' => $row->id_dak_komponen,
				'id_dak_komponen_sub' => $row->id_dak_komponen_sub,
				'menu_kegiatan' => $row->menu_kegiatan,
				'kegiatan' => $row->kegiatan,
				'id_dak_rincian' => $row->id_dak_rincian,
				'id_alkes' => $row->id_alkes,
				'id_jenis_output' => $row->id_jenis_output,
				'harga_satuan' => $row->harga_satuan,
				'volume' => $row->volume,
				'volume_perubahan' => $row->volume_perubahan,
				'id_satuan' => $row->id_satuan,
				'total' => $row->total,
				'kode_satker_lokasi' => $row->kode_satker_lokasi,
				'kode_nonsatker_lokasi' => $row->kode_nonsatker_lokasi,
				'jenis_fasyankes' => $row->jenis_fasyankes,
				'instalasi' => $row->instalasi,
				'ruangan' => $row->ruangan,
				'sarana' => $row->sarana,
				'nip_pengisi' => $row->nip_pengisi,
				'nama_pengisi' => $row->nama_pengisi,
				'jabatan_pengisi' => $row->jabatan_pengisi,
				'created_by' => $row->created_by,
				'created_date' => $row->created_date,
				'updated_by' => $row->updated_by,
				'updated_date' => $row->updated_date,
				'isdeleted' => $row->isdeleted,
			);
			$this->template->load('template', 't_dak_rincian_rka/t_dak_rincian_read', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_dak_rincian_rka'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('t_dak_rincian_rka/create_action'),
			'id_rincian' => set_value('id_rincian'),
			'id_satker' => set_value('id_satker'),
			'id_dak_alokasi' => set_value('id_dak_alokasi'),
			'tahun_anggaran' => set_value('tahun_anggaran'),
			'id_dak_bidang' => set_value('id_dak_bidang'),
			'id_dak_sub_bidang' => set_value('id_dak_sub_bidang'),
			'id_dak_komponen' => set_value('id_dak_komponen'),
			'id_dak_komponen_sub' => set_value('id_dak_komponen_sub'),
			'menu_kegiatan' => set_value('menu_kegiatan'),
			'kegiatan' => set_value('kegiatan'),
			'id_dak_rincian' => set_value('id_dak_rincian'),
			'id_alkes' => set_value('id_alkes'),
			'id_jenis_output' => set_value('id_jenis_output'),
			'harga_satuan' => set_value('harga_satuan'),
			'volume' => set_value('volume'),
			'volume_perubahan' => set_value('volume_perubahan'),
			'id_satuan' => set_value('id_satuan'),
			'total' => set_value('total'),
			'kode_satker_lokasi' => set_value('kode_satker_lokasi'),
			'kode_nonsatker_lokasi' => set_value('kode_nonsatker_lokasi'),
			'jenis_fasyankes' => set_value('jenis_fasyankes'),
			'instalasi' => set_value('instalasi'),
			'ruangan' => set_value('ruangan'),
			'sarana' => set_value('sarana'),
			'nip_pengisi' => set_value('nip_pengisi'),
			'nama_pengisi' => set_value('nama_pengisi'),
			'jabatan_pengisi' => set_value('jabatan_pengisi'),
			'created_by' => set_value('created_by'),
			'created_date' => set_value('created_date'),
			'updated_by' => set_value('updated_by'),
			'updated_date' => set_value('updated_date'),
			'isdeleted' => set_value('isdeleted'),
		);
		$this->template->load('template', 't_dak_rincian_rka/t_dak_rincian_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'id_satker' => $this->input->post('id_satker', TRUE),
				'id_dak_alokasi' => $this->input->post('id_dak_alokasi', TRUE),
				'tahun_anggaran' => $this->input->post('tahun_anggaran', TRUE),
				'id_dak_bidang' => $this->input->post('id_dak_bidang', TRUE),
				'id_dak_sub_bidang' => $this->input->post('id_dak_sub_bidang', TRUE),
				'id_dak_komponen' => $this->input->post('id_dak_komponen', TRUE),
				'id_dak_komponen_sub' => $this->input->post('id_dak_komponen_sub', TRUE),
				'menu_kegiatan' => $this->input->post('menu_kegiatan', TRUE),
				'kegiatan' => $this->input->post('kegiatan', TRUE),
				'id_dak_rincian' => $this->input->post('id_dak_rincian', TRUE),
				'id_alkes' => $this->input->post('id_alkes', TRUE),
				'id_jenis_output' => $this->input->post('id_jenis_output', TRUE),
				'harga_satuan' => $this->input->post('harga_satuan', TRUE),
				'volume' => $this->input->post('volume', TRUE),
				'volume_perubahan' => $this->input->post('volume_perubahan', TRUE),
				'id_satuan' => $this->input->post('id_satuan', TRUE),
				'total' => $this->input->post('total', TRUE),
				'kode_satker_lokasi' => $this->input->post('kode_satker_lokasi', TRUE),
				'kode_nonsatker_lokasi' => $this->input->post('kode_nonsatker_lokasi', TRUE),
				'jenis_fasyankes' => $this->input->post('jenis_fasyankes', TRUE),
				'instalasi' => $this->input->post('instalasi', TRUE),
				'ruangan' => $this->input->post('ruangan', TRUE),
				'sarana' => $this->input->post('sarana', TRUE),
				'nip_pengisi' => $this->input->post('nip_pengisi', TRUE),
				'nama_pengisi' => $this->input->post('nama_pengisi', TRUE),
				'jabatan_pengisi' => $this->input->post('jabatan_pengisi', TRUE),
				'created_by' => $this->input->post('created_by', TRUE),
				'created_date' => $this->input->post('created_date', TRUE),
				'updated_by' => $this->input->post('updated_by', TRUE),
				'updated_date' => $this->input->post('updated_date', TRUE),
				'isdeleted' => $this->input->post('isdeleted', TRUE),
			);

			$this->T_dak_rincian_rka_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
			redirect(site_url('t_dak_rincian_rka'));
		}
	}

	public function update($id)
	{
		$row = $this->T_dak_rincian_rka_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('t_dak_rincian_rka/update_action'),
				'id_rincian' => set_value('id_rincian', $row->id_rincian),
				'id_satker' => set_value('id_satker', $row->id_satker),
				'id_dak_alokasi' => set_value('id_dak_alokasi', $row->id_dak_alokasi),
				'tahun_anggaran' => set_value('tahun_anggaran', $row->tahun_anggaran),
				'id_dak_bidang' => set_value('id_dak_bidang', $row->id_dak_bidang),
				'id_dak_sub_bidang' => set_value('id_dak_sub_bidang', $row->id_dak_sub_bidang),
				'id_dak_komponen' => set_value('id_dak_komponen', $row->id_dak_komponen),
				'id_dak_komponen_sub' => set_value('id_dak_komponen_sub', $row->id_dak_komponen_sub),
				'menu_kegiatan' => set_value('menu_kegiatan', $row->menu_kegiatan),
				'kegiatan' => set_value('kegiatan', $row->kegiatan),
				'id_dak_rincian' => set_value('id_dak_rincian', $row->id_dak_rincian),
				'id_alkes' => set_value('id_alkes', $row->id_alkes),
				'id_jenis_output' => set_value('id_jenis_output', $row->id_jenis_output),
				'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
				'volume' => set_value('volume', $row->volume),
				'volume_perubahan' => set_value('volume_perubahan', $row->volume_perubahan),
				'id_satuan' => set_value('id_satuan', $row->id_satuan),
				'total' => set_value('total', $row->total),
				'kode_satker_lokasi' => set_value('kode_satker_lokasi', $row->kode_satker_lokasi),
				'kode_nonsatker_lokasi' => set_value('kode_nonsatker_lokasi', $row->kode_nonsatker_lokasi),
				'jenis_fasyankes' => set_value('jenis_fasyankes', $row->jenis_fasyankes),
				'instalasi' => set_value('instalasi', $row->instalasi),
				'ruangan' => set_value('ruangan', $row->ruangan),
				'sarana' => set_value('sarana', $row->sarana),
				'nip_pengisi' => set_value('nip_pengisi', $row->nip_pengisi),
				'nama_pengisi' => set_value('nama_pengisi', $row->nama_pengisi),
				'jabatan_pengisi' => set_value('jabatan_pengisi', $row->jabatan_pengisi),
				'created_by' => set_value('created_by', $row->created_by),
				'created_date' => set_value('created_date', $row->created_date),
				'updated_by' => set_value('updated_by', $row->updated_by),
				'updated_date' => set_value('updated_date', $row->updated_date),
				'isdeleted' => set_value('isdeleted', $row->isdeleted),
			);
			$this->template->load('template', 't_dak_rincian_rka/t_dak_rincian_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_dak_rincian_rka'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_rincian', TRUE));
		} else {
			$data = array(
				'id_satker' => $this->input->post('id_satker', TRUE),
				'id_dak_alokasi' => $this->input->post('id_dak_alokasi', TRUE),
				'tahun_anggaran' => $this->input->post('tahun_anggaran', TRUE),
				'id_dak_bidang' => $this->input->post('id_dak_bidang', TRUE),
				'id_dak_sub_bidang' => $this->input->post('id_dak_sub_bidang', TRUE),
				'id_dak_komponen' => $this->input->post('id_dak_komponen', TRUE),
				'id_dak_komponen_sub' => $this->input->post('id_dak_komponen_sub', TRUE),
				'menu_kegiatan' => $this->input->post('menu_kegiatan', TRUE),
				'kegiatan' => $this->input->post('kegiatan', TRUE),
				'id_dak_rincian' => $this->input->post('id_dak_rincian', TRUE),
				'id_alkes' => $this->input->post('id_alkes', TRUE),
				'id_jenis_output' => $this->input->post('id_jenis_output', TRUE),
				'harga_satuan' => $this->input->post('harga_satuan', TRUE),
				'volume' => $this->input->post('volume', TRUE),
				'volume_perubahan' => $this->input->post('volume_perubahan', TRUE),
				'id_satuan' => $this->input->post('id_satuan', TRUE),
				'total' => $this->input->post('total', TRUE),
				'kode_satker_lokasi' => $this->input->post('kode_satker_lokasi', TRUE),
				'kode_nonsatker_lokasi' => $this->input->post('kode_nonsatker_lokasi', TRUE),
				'jenis_fasyankes' => $this->input->post('jenis_fasyankes', TRUE),
				'instalasi' => $this->input->post('instalasi', TRUE),
				'ruangan' => $this->input->post('ruangan', TRUE),
				'sarana' => $this->input->post('sarana', TRUE),
				'nip_pengisi' => $this->input->post('nip_pengisi', TRUE),
				'nama_pengisi' => $this->input->post('nama_pengisi', TRUE),
				'jabatan_pengisi' => $this->input->post('jabatan_pengisi', TRUE),
				'created_by' => $this->input->post('created_by', TRUE),
				'created_date' => $this->input->post('created_date', TRUE),
				'updated_by' => $this->input->post('updated_by', TRUE),
				'updated_date' => $this->input->post('updated_date', TRUE),
				'isdeleted' => $this->input->post('isdeleted', TRUE),
			);

			$this->T_dak_rincian_rka_model->update($this->input->post('id_rincian', TRUE), $data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
			redirect(site_url('t_dak_rincian_rka'));
		}
	}

	public function delete($id)
	{
		$row = $this->T_dak_rincian_rka_model->get_by_id($id);

		if ($row) {
			$this->T_dak_rincian_rka_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
			redirect(site_url('t_dak_rincian_rka'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_dak_rincian_rka'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_satker', 'id satker', 'trim|required');
		$this->form_validation->set_rules('id_dak_alokasi', 'id dak alokasi', 'trim|required');
		$this->form_validation->set_rules('tahun_anggaran', 'tahun anggaran', 'trim|required');
		$this->form_validation->set_rules('id_dak_bidang', 'id dak bidang', 'trim|required');
		$this->form_validation->set_rules('id_dak_sub_bidang', 'id dak sub bidang', 'trim|required');
		$this->form_validation->set_rules('id_dak_komponen', 'id dak komponen', 'trim|required');
		$this->form_validation->set_rules('id_dak_komponen_sub', 'id dak komponen sub', 'trim|required');
		$this->form_validation->set_rules('menu_kegiatan', 'menu kegiatan', 'trim|required');
		$this->form_validation->set_rules('kegiatan', 'kegiatan', 'trim|required');
		$this->form_validation->set_rules('id_dak_rincian', 'id dak rincian', 'trim|required');
		$this->form_validation->set_rules('id_alkes', 'id alkes', 'trim|required');
		$this->form_validation->set_rules('id_jenis_output', 'id jenis output', 'trim|required');
		$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required');
		$this->form_validation->set_rules('volume', 'volume', 'trim|required');
		$this->form_validation->set_rules('volume_perubahan', 'volume perubahan', 'trim|required');
		$this->form_validation->set_rules('id_satuan', 'id satuan', 'trim|required');
		$this->form_validation->set_rules('total', 'total', 'trim|required');
		$this->form_validation->set_rules('kode_satker_lokasi', 'kode satker lokasi', 'trim|required');
		$this->form_validation->set_rules('kode_nonsatker_lokasi', 'kode nonsatker lokasi', 'trim|required');
		$this->form_validation->set_rules('jenis_fasyankes', 'jenis fasyankes', 'trim|required');
		$this->form_validation->set_rules('instalasi', 'instalasi', 'trim|required');
		$this->form_validation->set_rules('ruangan', 'ruangan', 'trim|required');
		$this->form_validation->set_rules('sarana', 'sarana', 'trim|required');
		$this->form_validation->set_rules('nip_pengisi', 'nip pengisi', 'trim|required');
		$this->form_validation->set_rules('nama_pengisi', 'nama pengisi', 'trim|required');
		$this->form_validation->set_rules('jabatan_pengisi', 'jabatan pengisi', 'trim|required');
		$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
		$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
		$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
		$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
		$this->form_validation->set_rules('isdeleted', 'isdeleted', 'trim|required');

		$this->form_validation->set_rules('id_rincian', 'id_rincian', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function import()
	{
		$this->template->load('template', 't_dak_rincian_rka/t_dak_rincian_import');
	}

	public function upload()
	{
		error_reporting(0);
		date_default_timezone_set('Asia/Jakarta');
		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$config['upload_path'] = realpath('excel');
		$config['allowed_types'] = 'xlsx|xls|csv';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {

			//upload gagal
			$this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
			//redirect halaman
			redirect(site_url('t_dak_rincian_rka/import'));
		} else {

			$data_upload = $this->upload->data();

			$excelreader     = new PHPExcel_Reader_Excel2007();
			$loadexcel         = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
			$sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true);

			$data = array();

			$numrow = 1;
			foreach ($sheet as $row) {
				if ($numrow > 1) {
					array_push($data, array(
						'id_satker' => $row['A'], // Insert data nis dari kolom A di excel
						'id_dak_alokasi' => $row['B'], // Insert data nama dari kolom B di excel
						'tahun_anggaran' => $row['C'], // Insert data jenis kelamin dari kolom C di excel
						'id_dak_bidang' => $row['D'], // Insert data alamat dari kolom D di excel
						'id_dak_sub_bidang' => $row['E'],
						'id_dak_komponen' => $row['F'],
						'id_dak_komponen_sub' => $row['G'],
						'menu_kegiatan' => $row['H'],
						'kegiatan' => $row['I'],
						'id_dak_rincian' => $row['J'],
						'id_alkes' => $row['K'],
						'id_jenis_output' => $row['L'],
						'harga_satuan' => $row['M'],
						'volume' => $row['N'],
						'id_satuan' => $row['O'],
						'total' => $row['P'],
						'kode_satker_lokasi' => $row['Q'],
						'kode_nonsatker_lokasi' => $row['R'],
						'jenis_fasyankes' => $row['S'],
						'instalasi' => $row['T'],
						'ruangan' => $row['U'],
						'sarana' => '',
						'nip_pengisi' => '123456',
						'nama_pengisi' => 'Pusat',
						'jabatan_pengisi' => 'Import Data Krisna',
						'created_by' => 'import',
						'created_date' => date('Y-m-d H:i:s'),
						'updated_by' => 'import',
						'updated_date' => date('Y-m-d H:i:s'),
						'isdeleted' => '0',
					));
				}
				$numrow++;
			}
			$this->db->insert_batch('t_dak_rincian', $data);
			//delete file from server
			unlink(realpath('excel/' . $data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect(site_url('t_dak_rincian_rka/import'));
		}
	}
}

/* End of file T_dak_rincian_rka.php */
/* Location: ./application/controllers/T_dak_rincian_rka.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-31 05:51:36 */
/* http://harviacode.com */