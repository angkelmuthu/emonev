<?php

$string = "<main id=\"js-page-content\" role=\"main\" class=\"page-content\">
<div class=\"row\">
    <div class=\"col-xl-12\">
        <div id=\"panel-1\" class=\"panel\">
            <div class=\"panel-hdr\">
                <h2>" . ucfirst($tombol) . " Read</h2>
                <div class=\"panel-toolbar\">
                    <button class=\"btn btn-panel\" data-action=\"panel-collapse\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Collapse\"></button>
                    <button class=\"btn btn-panel\" data-action=\"panel-fullscreen\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Fullscreen\"></button>
                    <button class=\"btn btn-panel\" data-action=\"panel-close\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Close\"></button>
                </div>
            </div>
            <div class=\"panel-container show\">
                <div class=\"panel-content\">
        <table class=\"table table-striped\">";
foreach ($iterator as list($non_pk, $kolom, $tmp, $array1, $array2, $array3)) {
    $string .= "\n\t    <tr><td>" . label($non_pk["column_name"]) . "</td><td><?php echo $" . $non_pk["column_name"] . "; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('" . $c_url . "') ?>\" class=\"btn btn-primary waves-effect waves-themed\">Kembali</a></td></tr>";
$string .= "\n\t</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src=\"<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js\"></script>
<script src=\"<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js\"></script>";



$hasil_view_read = createFile($string, $target . "views/" . $c_url . "/" . $v_read_file);
