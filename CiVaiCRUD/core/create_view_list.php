<?php

$string = "<main id=\"js-page-content\" role=\"main\" class=\"page-content\">
<?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
<div class=\"row\">
    <div class=\"col-xl-12\">
        <div id=\"panel-1\" class=\"panel\">
            <div class=\"panel-hdr\">
                        <h2>KELOLA DATA " .  strtoupper($tombol) . "</h2>
                        <div class=\"panel-toolbar\">
                        <button class=\"btn btn-panel\" data-action=\"panel-collapse\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Collapse\"></button>
                        <button class=\"btn btn-panel\" data-action=\"panel-fullscreen\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Fullscreen\"></button>
                        <button class=\"btn btn-panel\" data-action=\"panel-close\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Close\"></button>
                    </div>
                </div>
                <div class=\"panel-container show\">
                    <div class=\"panel-content\">
                    <div class=\"row\">
                    <div class=\"col-md-6\">
        <?php echo anchor(site_url('" . $c_url . "/create'), '<i class=\"fal fa-plus-square\" aria-hidden=\"true\"></i> Tambah Data', 'class=\"btn btn-primary btn-sm waves-effect waves-themed\"'); ?>";

if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/excel'), '<i class=\"fal fa-file-excel\" aria-hidden=\"true\"></i> Export Ms Excel', 'class=\"btn btn-outline-success btn-sm waves-effect waves-themed\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/word'), '<i class=\"fal fa-file-word\" aria-hidden=\"true\"></i> Export Ms Word', 'class=\"btn btn-outline-primary btn-sm waves-effect waves-themed\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/pdf'), 'PDF', 'class=\"btn btn-outline-danger btn-sm waves-effect waves-themed\"'); ?>";
}
$string .= "</div>
<div class=\"col-md-6\">
            <form action=\"<?php echo site_url('$c_url/index'); ?>\" method=\"get\">
                    <div class=\"input-group\">
                        <div class=\"input-group\">
                            <?php
                                if (\$q <> '')
                                {
                                    ?>
                                    <div class=\"input-group-prepend\">
                                    <a href=\"<?php echo site_url('$c_url'); ?>\" class=\"btn btn-danger waves-effect waves-themed\">Reset</a>
                                    </div>
                                    <?php
                                }
                            ?>
                            <input id=\"button-addon3\" type=\"text\" name=\"q\" value=\"<?php echo \$q; ?>\" class=\"form-control\" placeholder=\"Search for anything...\" aria-label=\"Example text with two button addons\" aria-describedby=\"button-addon3\">
                            <div class=\"input-group-append\">
                                <button class=\"btn btn-primary waves-effect waves-themed\" type=\"submit\">Search</button>
                            </div>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
                <div class=\"panel-container show\">
                    <div class=\"panel-content\">

                    <div class=\"table-responsive\">
                        <table class=\"table table-bordered table-hover table-striped\">
                            <thead class=\"thead-themed\">
            <tr>
                <th>No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th>Action</th>
            </tr></thead>
            <tbody>";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t\t<td width=\"10px\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?php echo $" . $c_url . "->" . $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
    . "\n\t\t\t\t<?php "
    . "\n\t\t\t\techo anchor(site_url('" . $c_url . "/read/'.$" . $c_url . "->" . $pk . "),'<i class=\"fal fa-eye\" aria-hidden=\"true\"></i>','class=\"btn btn-info btn-xs waves-effect waves-themed\"'); "
    . "\n\t\t\t\techo '  '; "
    . "\n\t\t\t\techo anchor(site_url('" . $c_url . "/update/'.$" . $c_url . "->" . $pk . "),'<i class=\"fal fa-pencil\" aria-hidden=\"true\"></i>','class=\"btn btn-warning btn-xs waves-effect waves-themed\"'); "
    . "\n\t\t\t\techo '  '; "
    . "\n\t\t\t\techo
    '<button type=\"button\" class=\"btn btn-danger btn-xs waves-effect waves-themed\" data-toggle=\"modal\" data-target=\"#default-example-modal-sm'.$" . $c_url . "->" . $pk . ".'\"><i class=\"fal fa-trash\" aria-hidden=\"true\"></i></button>
    <div class=\"modal fade\" id=\"default-example-modal-sm'.$" . $c_url . "->" . $pk . ".'\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-sm\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header bg-info\">
                <h5 class=\"modal-title\">INFO!</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\"><i class=\"fal fa-times\"></i></span>
                </button>
            </div>
            <div class=\"modal-body\">
                <p>Apakah Anda Yakin Ingin Menghapus?</p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Batal</button>
                <a href=\"" . $c_url . "/delete/'.$" . $c_url . "->" . $pk . ".'\" class=\"btn btn-primary\">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>';"
    . "\n\t\t\t\t?>"
    . "\n\t\t\t</td>";

$string .=  "\n\t\t</tr>
                <?php
            }
            ?>
            </tbody>
            </table>
                ";
/*
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
}
 *
 */
$string .= "\n\t<?php echo \$pagination ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src=\"<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js\"></script>
<script src=\"<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js\"></script>";


$hasil_view_list = createFile($string, $target . "views/" . $c_url . "/" . $v_list_file);
