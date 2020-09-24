<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA M_DAK_RINCIAN</h2>
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
                                    <td width='200'>Id Dak Komponen Sub <?php echo form_error('id_dak_komponen_sub') ?></td>
                                    <td><?php echo select2_dinamis('id_dak_komponen_sub', 'm_dak_komponen_sub', 'nama_dak_komponen_sub', 'id_dak_komponen_sub') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kode Dak Rincian <?php echo form_error('kode_dak_rincian') ?></td>
                                    <td><input type="text" class="form-control" name="kode_dak_rincian" id="kode_dak_rincian" placeholder="Kode Dak Rincian" value="<?php echo $kode_dak_rincian; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Nama Dak Rincian <?php echo form_error('nama_dak_rincian') ?></td>
                                    <td><input type="text" class="form-control" name="nama_dak_rincian" id="nama_dak_rincian" placeholder="Nama Dak Rincian" value="<?php echo $nama_dak_rincian; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Satuan <?php echo form_error('id_satuan') ?></td>
                                    <td><?php echo select2_dinamis('id_satuan', 'm_satuan', 'satuan', 'kdsatuan') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Jenis Output <?php echo form_error('id_jenis_output') ?></td>
                                    <td><?php echo select2_dinamis('id_jenis_output', 'm_jenis_output', 'nama_jenis_output', 'id_jenis_output') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Created By <?php echo form_error('created_by') ?></td>
                                    <td><input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $this->session->userdata('nama') ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Created Date <?php echo form_error('created_date') ?></td>
                                    <td><input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo date('Y-m-d H:s:i'); ?>" /></td>
                                </tr>
                                <input type="hidden" name="updated_by" value="<?php echo $this->session->userdata('nama') ?>" />
                                <input type="hidden" name="updated_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                <input type="hidden" name="isdeleted" value="0" />
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_dak_rincian" value="<?php echo $id_dak_rincian; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_dak_rincian') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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