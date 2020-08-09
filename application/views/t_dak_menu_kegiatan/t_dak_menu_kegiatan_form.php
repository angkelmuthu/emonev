<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA MENU KEGIATAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="<?php echo $action; ?>" method="post">

                            <table class='table table-striped'>
                                <tr>
                                    <td width='200'>Nama Menu Kegiatan <?php echo form_error('nama_menu_kegiatan') ?></td>
                                    <td><input type="text" class="form-control" name="nama_menu_kegiatan" id="nama_menu_kegiatan" placeholder="Nama Menu Kegiatan" value="<?php echo $nama_menu_kegiatan; ?>" /></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="hidden" name="id_dak_komponen_sub" value="<?php echo $this->uri->segment(3); ?>" />
                                        <input type="hidden" name="id_dak_alokasi" value="<?php echo $this->uri->segment(4); ?>" />
                                        <input type="hidden" name="id_dak_sub_bidang" value="<?php echo $this->uri->segment(5); ?>" />
                                        <input type="hidden" name="id_menu_kegiatan" value="<?php echo $id_menu_kegiatan; ?>" />
                                        <input type="hidden" name="created_by" value="<?php echo $this->session->userdata('nama') ?>" readonly />
                                        <input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                        <input type="hidden" name="updated_by" id="updated_by" value="<?php echo $this->session->userdata('nama') ?>" />
                                        <input type="hidden" name="updated_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                        <input type="hidden" name="isdeleted" value="0" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_dak_menu_kegiatan') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>