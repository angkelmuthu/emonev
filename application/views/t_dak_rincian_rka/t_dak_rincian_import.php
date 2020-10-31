<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Data RKA (Rincian Kegiatan) Import</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <?php echo $this->session->flashdata('notif') ?>
                        <div class="text-center">
                            <a href="<?php echo base_url() ?>assets/template_dak_rka.xlsx" class="btn btn-info waves-effect waves-themed"> Dowload Template Import excel</a>
                        </div>
                        <br>
                        <form method="POST" action="<?php echo base_url() ?>t_dak_rincian_rka/upload" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">UNGGAH FILE EXCEL</label>
                                <input type="file" name="userfile" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">UPLOAD</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>