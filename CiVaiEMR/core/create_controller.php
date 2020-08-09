<?php

$string = "<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class " . $c . " extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        \$this->load->model('$m');
        \$this->load->library('form_validation');";

if ($jenis_tabel <> 'reguler_table') {
    $string .= "        \n\t\$this->load->library('datatables');";
}

$string .= "
    }";

if ($jenis_tabel == 'reguler_table') {

    $string .= "\n\n    public function index()
    {

    }";
} else {

    $string .= "\n\n    public function index()
    {
        \$this->template->load('template','$c_url/$v_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo \$this->" . $m . "->json();
    }";
}

$string .= "\n\n    public function read(\$id)
    {
        \$row = \$this->" . $m . "->get_by_id(\$id);
        if (\$row) {
            \$data = array('id' => \$row->$pk,";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$row->" . $row['column_name'] . ",";
}
$string .= "\n\t    );
            \$this->template->load('template','$c_url/$v_read', \$data);
        } else {
            \$this->session->set_flashdata('message', '<div class=\"alert bg-warning-500\" role=\"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\"><i class=\"fal fa-times\"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('$c_url'));
        }
    }

    public function list(\$NOMR,\$IDXDAFTAR)
    {
        \$data = array(
            'datalist' => \$this->" . $m . "->get_datalist(\$NOMR,\$IDXDAFTAR),
        );
        \$this->template->load('template', '$c_url/$v_list', \$data);
    }

    public function create()
    {
        \$data = array(
            'button' => 'Create',
            'action' => site_url('$c_url/create_action'),";
foreach ($all as $row) {
    $string .= "\n\t    '" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "'),";
}
$string .= "\n\t);
        \$this->template->load('template','$c_url/$v_form', \$data);
    }

    public function create_action()
    {
        \$this->_rules();
        \$NOMR=\$this->input->post('NOMR');
        \$IDXDAFTAR=\$this->input->post('IDXDAFTAR');
        if (\$this->form_validation->run() == FALSE) {
            \$this->create();
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
//$oke = alert('alert-info', 'Selamat', 'Data Berhasil Diperbaharui');
$string .= "\n\t    );

            \$this->" . $m . "->insert(\$data);
            \$this->session->set_flashdata('message', '<div class=\"alert bg-info-500\" role=\"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\"><i class=\"fal fa-times\"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('$c_url/list/'.\$NOMR.'/'.\$IDXDAFTAR));
        }
    }

    public function update(\$NOMR,\$IDXDAFTAR,\$id)
    {
        \$row = \$this->" . $m . "->get_by_id(\$id);

        if (\$row) {
            \$data = array(
                'button' => 'Update',
                'action' => site_url('$c_url/update_action'),";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "', \$row->" . $row['column_name'] . "),";
}
$string .= "\n\t    );
            \$this->template->load('template','$c_url/$v_form', \$data);
        } else {
            \$this->session->set_flashdata('message', '<div class=\"alert bg-warning-500\" role=\"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\"><i class=\"fal fa-times\"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('$c_url'));
        }
    }

    public function update_action()
    {
        \$this->_rules();
        \$NOMR=\$this->input->post('NOMR');
        \$IDXDAFTAR=\$this->input->post('IDXDAFTAR');
        if (\$this->form_validation->run() == FALSE) {
            \$this->update(\$this->input->post('$pk', TRUE));
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );

            \$this->" . $m . "->update(\$this->input->post('$pk', TRUE), \$data);
            \$this->session->set_flashdata('message', '<div class=\"alert bg-info-500\" role=\"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\"><i class=\"fal fa-times\"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('$c_url/list/'.\$NOMR.'/'.\$IDXDAFTAR));
        }
    }

    public function delete(\$id,\$NOMR,\$IDXDAFTAR)
    {
        \$row = \$this->" . $m . "->get_by_id(\$id);

        if (\$row) {
            \$this->" . $m . "->delete(\$id);
            \$this->session->set_flashdata('message', '<div class=\"alert bg-info-500\" role=\"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\"><i class=\"fal fa-times\"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('$c_url/list/'.\$NOMR.'/'.\$IDXDAFTAR));
        } else {
            \$this->session->set_flashdata('message', '<div class=\"alert bg-warning-500\" role=\"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\"><i class=\"fal fa-times\"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('$c_url/list/'.\$NOMR.'/'.\$IDXDAFTAR));
        }
    }

    public function _rules()
    {";
foreach ($non_pk as $row) {
    $int = $row3['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? '|numeric' : '';
    $string .= "\n\t\$this->form_validation->set_rules('" . $row['column_name'] . "', '" .  strtolower(label($row['column_name'])) . "', 'trim|required$int');";
}
$string .= "\n\n\t\$this->form_validation->set_rules('$pk', '$pk', 'trim');";
$string .= "\n\t\$this->form_validation->set_error_delimiters('<span class=\"text-danger\">', '</span>');
    }";

if ($export_excel == '1') {
    $string .= "\n\n    public function excel()
    {
        \$this->load->helper('exportexcel');
        \$namaFile = \"$table_name.xls\";
        \$judul = \"$table_name\";
        \$tablehead = 0;
        \$tablebody = 1;
        \$nourut = 1;
        //penulisan header
        header(\"Pragma: public\");
        header(\"Expires: 0\");
        header(\"Cache-Control: must-revalidate, post-check=0,pre-check=0\");
        header(\"Content-Type: application/force-download\");
        header(\"Content-Type: application/octet-stream\");
        header(\"Content-Type: application/download\");
        header(\"Content-Disposition: attachment;filename=\" . \$namaFile . \"\");
        header(\"Content-Transfer-Encoding: binary \");

        xlsBOF();

        \$kolomhead = 0;
        xlsWriteLabel(\$tablehead, \$kolomhead++, \"No\");";
    foreach ($non_pk as $row) {
        $column_name = label($row['column_name']);
        $string .= "\n\txlsWriteLabel(\$tablehead, \$kolomhead++, \"$column_name\");";
    }
    $string .= "\n\n\tforeach (\$this->" . $m . "->get_all() as \$data) {
            \$kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber(\$tablebody, \$kolombody++, \$nourut);";
    foreach ($non_pk as $row) {
        $column_name = $row['column_name'];
        $xlsWrite = $row['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? 'xlsWriteNumber' : 'xlsWriteLabel';
        $string .= "\n\t    " . $xlsWrite . "(\$tablebody, \$kolombody++, \$data->$column_name);";
    }
    $string .= "\n\n\t    \$tablebody++;
            \$nourut++;
        }

        xlsEOF();
        exit();
    }";
}

if ($export_word == '1') {
    $string .= "\n\n    public function word()
    {
        header(\"Content-type: application/vnd.ms-word\");
        header(\"Content-Disposition: attachment;Filename=$table_name.doc\");

        \$data = array(
            '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
            'start' => 0
        );

        \$this->load->view('" . $c_url . "/" . $v_doc . "',\$data);
    }";
}

if ($export_pdf == '1') {
    $string .= "\n\n    function pdf()
    {
        \$data = array(
            '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '32M');
        \$html = \$this->load->view('" . $c_url . "/" . $v_pdf . "', \$data, true);
        \$this->load->library('pdf');
        \$pdf = \$this->pdf->load();
        \$pdf->WriteHTML(\$html);
        \$pdf->Output('" . $table_name . ".pdf', 'D');
    }";
}

$string .= "\n\n}\n\n/* End of file $c_file */
/* Location: ./application/controllers/$c_file */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator " . date('Y-m-d H:i:s') . " */
/* http://harviacode.com */";




$hasil_controller = createFile($string, $target . "controllers/" . $c_file);
