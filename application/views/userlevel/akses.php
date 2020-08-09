<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        KELOLA HAK AKSES UNTUK LEVEL : <b><?php echo $level['nama_level'] ?></b>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="panel-tag">
                            <?php echo 'Silahkan Cheklist Pada Menu Yang Akan Diberikan Akses'; ?>
                        </div>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Nama Modul</th>
                                    <th width="100px">Beri Akses</th>
                                </tr>
                                <?php
                                $no = 1;
                                foreach ($menu as $m) {
                                    echo "<tr>
                        <td>$no</td>
                        <td>$m->title</td>
                        <td align='center'><input type='checkbox' " .  checked_akses($this->uri->segment(3), $m->id_menu) . " onClick='kasi_akses($m->id_menu)'></td>
                        </tr>";
                                    $no++;
                                }
                                ?>
                            </thead>
                            <!--<tr><td></td><td colspan="2">
                                        <button type="submit" class="btn btn-danger btn-sm">Simpan Perubahan</button>
                                    </td></tr>-->

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>

<script type="text/javascript">
    function kasi_akses(id_menu) {
        //alert(id_menu);
        var id_menu = id_menu;
        var level = '<?php echo $this->uri->segment(3); ?>';
        //alert(level);
        $.ajax({
            url: "<?php echo base_url() ?>index.php/userlevel/kasi_akses_ajax",
            data: "id_menu=" + id_menu + "&level=" + level,
            success: function(html) {
                //load();
                //alert('sukses');
            }
        });
    }
</script>