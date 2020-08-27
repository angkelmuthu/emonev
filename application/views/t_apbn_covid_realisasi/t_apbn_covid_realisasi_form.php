<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA REALISAI APBN COVID-19</h2>
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
                                    <td width='200'>Volume <?php echo form_error('volume') ?></td>
                                    <td><input type="number" class="form-control" name="volume" id="volume" placeholder="Volume" value="<?php echo $volume; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Realisasi Persen <?php echo form_error('realisasi_persen') ?></td>
                                    <td><input type="number" class="form-control" name="realisasi_persen" id="realisasi_persen" placeholder="Realisasi Persen" value="<?php echo $realisasi_persen; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Realisasi Nilai <?php echo form_error('realisasi_nilai') ?></td>
                                    <td><input type="number" class="form-control" name="realisasi_nilai" id="realisasi_nilai" placeholder="Realisasi Nilai" value="<?php echo $realisasi_nilai; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Rincian Hambatan <?php echo form_error('id_rincian_hambatan') ?></td>
                                    <td><?php echo select2_dinamis('id_rincian_hambatan', 'v_hambatan', 'nama_hambatan', 'id_rincian_hambatan') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tindak Lanjut <?php echo form_error('tindak_lanjut') ?></td>
                                    <td><input type="text" class="form-control" name="tindak_lanjut" id="tindak_lanjut" placeholder="Tindak Lanjut" value="<?php echo $tindak_lanjut; ?>" /></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="hidden" name="created_by" value="<?php echo $this->session->userdata('nama') ?>" />

                                        <input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                        <input type="hidden" name="id_alokasi" value="<?php echo $this->uri->segment(3); ?>" />
                                        <input type="hidden" name="id_realisasi" value="<?php echo $id_realisasi; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_apbn_covid_realisasi') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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