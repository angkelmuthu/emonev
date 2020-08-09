<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA DAK ALOKASI</h2>
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
                                    <td width='200'>Dak Jenis <?php echo form_error('id_dak_jenis') ?></td>
                                    <td><?php echo cmb_dinamis('id_dak_jenis', 'm_dak_jenis', 'nama', 'id_dak_jenis') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Dak Kelompok <?php echo form_error('id_dak_kelompok') ?></td>
                                    <td><?php echo cmb_dinamis('id_dak_kelompok', 'm_dak_kelompok', 'nama', 'id_dak_kelompok') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Satker <?php echo form_error('id_satker') ?></td>
                                    <td><?php echo select2_dinamis('id_satker', 'm_satker', 'nama', 'id_satker') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tahun <?php echo form_error('tahun') ?></td>
                                    <td><input type="number" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Nilai Alokasi <?php echo form_error('nilai_alokasi') ?></td>
                                    <td><input type="number" class="form-control" name="nilai_alokasi" id="nilai_alokasi" placeholder="Nilai Alokasi" value="<?php echo $nilai_alokasi; ?>" /></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="hidden" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $this->session->userdata('nama') ?>" readonly />
                                        <input type="hidden" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                        <input type="hidden" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By" value="<?php echo $this->session->userdata('nama') ?>" readonly />
                                        <input type="hidden" class="form-control" name="updated_date" id="updated_date" placeholder="Updated Date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                        <input type="text" class="form-control" name="isdeleted" id="isdeleted" placeholder="Isdeleted" value="0" />
                                        <input type="hidden" name="id_dak_alokasi" value="<?php echo $id_dak_alokasi; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_dak_alokasi') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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