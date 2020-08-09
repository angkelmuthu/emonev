<?php

$string = "<main id=\"js-page-content\" role=\"main\" class=\"page-content\">
<div class=\"row\">
    <div class=\"col-xl-12\">
        <div id=\"panel-1\" class=\"panel\">
            <div class=\"panel-hdr\">
                <h2>INPUT DATA " .  strtoupper($tombol) . "</h2>
                <div class=\"panel-toolbar\">
                    <button class=\"btn btn-panel\" data-action=\"panel-collapse\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Collapse\"></button>
                    <button class=\"btn btn-panel\" data-action=\"panel-fullscreen\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Fullscreen\"></button>
                    <button class=\"btn btn-panel\" data-action=\"panel-close\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Close\"></button>
                </div>
            </div>
            <div class=\"panel-container show\">
                <div class=\"panel-content\">
            <form action=\"<?php echo \$action; ?>\" method=\"post\">

<table class='table table-striped'>

";
$kolom = $_POST['kolom'];
$tmp = $_POST['gen'];
$array1 = $_POST['tabel'];
$array2 = $_POST['tabel_ket'];
$array3 = $_POST['tabel_id'];
$iterator = new MultipleIterator();
$iterator->attachIterator(new ArrayIterator($non_pk));
$iterator->attachIterator(new ArrayIterator($kolom));
$iterator->attachIterator(new ArrayIterator($tmp));
$iterator->attachIterator(new ArrayIterator($array1));
$iterator->attachIterator(new ArrayIterator($array2));
$iterator->attachIterator(new ArrayIterator($array3));
foreach ($iterator as list($non_pk, $kolom, $tmp, $array1, $array2, $array3)) {
    if ($tmp['test'] == 'area') {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td> <textarea class=\"form-control\" non_pks=\"3\" name=\"" . $non_pk["column_name"] . "\" id=\"" . $non_pk["column_name"] . "\" placeholder=\"" . label($non_pk["column_name"]) . "\"><?php echo $" . $non_pk["column_name"] . "; ?></textarea></td></tr>";
    } elseif ($tmp['test'] == 'email') {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><input type=\"email\" class=\"form-control\" name=\"" . $non_pk["column_name"] . "\" id=\"" . $non_pk["column_name"] . "\" placeholder=\"" . label($non_pk["column_name"]) . "\" value=\"<?php echo $" . $non_pk["column_name"] . "; ?>\" /></td></tr>";
    } elseif ($tmp['test'] == 'date') {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><input type=\"date\" class=\"form-control\"  id=\"example-date\" name=\"" . $non_pk["column_name"] . "\" id=\"datepicker-1\" placeholder=\"" . label($non_pk["column_name"]) . "\" value=\"<?php echo $" . $non_pk["column_name"] . "; ?>\" /></td></tr>";
        // <input class="form-control" id="example-date" type="date" name="date" value="2023-07-23">
    } elseif ($tmp['test'] == 'datenow') {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><input type=\"text\" class=\"form-control\" name=\"" . $non_pk["column_name"] . "\" id=\"" . $non_pk["column_name"] . "\" placeholder=\"" . label($non_pk["column_name"]) . "\" value=\"<?php echo date('Y-m-d'); ?>\" /></td></tr>";
    } elseif ($tmp['test'] == 'datetime') {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><input type=\"datetime-local\" class=\"form-control\"  id=\"example-date\" name=\"" . $non_pk["column_name"] . "\" id=\"example-datetime-local-input\" value=\"<?php echo $" . $non_pk["column_name"] . "; ?>\" /></td></tr>";
        //<input class="form-control" type="datetime-local" value="2023-07-23T11:25:00" id="example-datetime-local-input">
    } elseif ($tmp['test'] == 'datetimenow') {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><input type=\"text\" class=\"form-control\" name=\"" . $non_pk["column_name"] . "\" id=\"" . $non_pk["column_name"] . "\" placeholder=\"" . label($non_pk["column_name"]) . "\" value=\"<?php echo date('Y-m-d H:s:i'); ?>\" /></td></tr>";
    } elseif ($tmp['test'] == 'number') {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><input type=\"number\" class=\"form-control\" name=\"" . $non_pk["column_name"] . "\" id=\"" . $non_pk["column_name"] . "\" placeholder=\"" . label($non_pk["column_name"]) . "\" value=\"<?php echo $" . $non_pk["column_name"] . "; ?>\" /></td></tr>";
    } elseif ($tmp['test'] == 'text') {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><input type=\"text\" class=\"form-control\" name=\"" . $non_pk["column_name"] . "\" id=\"" . $non_pk["column_name"] . "\" placeholder=\"" . label($non_pk["column_name"]) . "\" value=\"<?php echo $" . $non_pk["column_name"] . "; ?>\" /></td></tr>";
    } elseif ($tmp['test'] == 'select') {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><?php echo cmb_dinamis('" . $non_pk["column_name"] . "', '" . $array1['satu'] . "', '" . $array2['dua'] . "', '" . $array3['tiga'] . "') ?></td></tr>";
    } elseif ($tmp['test'] == 'select2') {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><?php echo select2_dinamis('" . $non_pk["column_name"] . "', '" . $array1['satu'] . "', '" . $array2['dua'] . "', '" . $array3['tiga'] . "') ?></td></tr>";
    } elseif ($tmp['test'] == 'radio') {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><?php echo radiobtn_dinamis('" . $non_pk["column_name"] . "', '" . $array1['satu'] . "', '" . $array2['dua'] . "', '" . $array3['tiga'] . "') ?></td></tr>";
    } elseif ($tmp['test'] == 'iduser') {
        $userss = "this->session->userdata('id_users')";
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><input type=\"text\" class=\"form-control\" name=\"" . $non_pk["column_name"] . "\" id=\"" . $non_pk["column_name"] . "\" placeholder=\"" . label($non_pk["column_name"]) . "\" value=\"<?php echo $" . $userss . " ?>\" readonly/></td></tr>";
    } elseif ($tmp['test'] == 'nmuser') {
        $userss = "this->session->userdata('nama')";
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><input type=\"text\" class=\"form-control\" name=\"" . $non_pk["column_name"] . "\" id=\"" . $non_pk["column_name"] . "\" placeholder=\"" . label($non_pk["column_name"]) . "\" value=\"<?php echo $" . $userss . " ?>\" readonly/></td></tr>";
        //$this->session->userdata('is_users')
    } else {
        $string .= "\n\t    <tr><td width='200'>" . label($non_pk["column_name"]) . " <?php echo form_error('" . $non_pk["column_name"] . "') ?></td><td><input type=\"text\" class=\"form-control\" name=\"" . $non_pk["column_name"] . "\" id=\"" . $non_pk["column_name"] . "\" placeholder=\"" . label($non_pk["column_name"]) . "\" value=\"<?php echo $" . $non_pk["column_name"] . "; ?>\" /></td></tr>";
    }
}
$string .= "\n\t    <tr><td></td><td><input type=\"hidden\" name=\"" . $pk . "\" value=\"<?php echo $" . $pk . "; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-warning waves-effect waves-themed\"><i class=\"fal fa-save\"></i> <?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('" . $c_url . "') ?>\" class=\"btn btn-info waves-effect waves-themed\"><i class=\"fal fa-sign-out\"></i> Kembali</a></td></tr>";
$string .= "\n\t</table></form>        </div>
</div>

            </div>
        </div>
    </div>
</main>
<script src=\"<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js\"></script>
<script src=\"<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js\"></script>
<script src=\"<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js\"></script>
<script src=\"<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js\"></script>
<script src=\"<?php echo base_url() ?>assets/smartadmin/js/kostum.js\"></script>";

$hasil_view_form = createFile($string, $target . "views/" . $c_url . "/" . $v_form_file);
