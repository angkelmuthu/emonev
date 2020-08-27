<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA ALOKASI APBN COVID-19</h2>
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


	    <tr><td width='200'>Id Kegiatan <?php echo form_error('id_kegiatan') ?></td><td><?php echo cmb_dinamis('id_kegiatan', 'm_apbn_covid_kegiatan', 'nama_kegiatan', 'id_kegiatan') ?></td></tr>
	    <tr><td width='200'>Kode Satker <?php echo form_error('kode_satker') ?></td><td><?php echo select2_dinamis('kode_satker', 'm_satker', 'nama', 'kode_satker') ?></td></tr>
	    <tr><td width='200'>Volume <?php echo form_error('volume') ?></td><td><input type="number" class="form-control" name="volume" id="volume" placeholder="Volume" value="<?php echo $volume; ?>" /></td></tr>
	    <tr><td width='200'>Alokasi <?php echo form_error('alokasi') ?></td><td><input type="number" class="form-control" name="alokasi" id="alokasi" placeholder="Alokasi" value="<?php echo $alokasi; ?>" /></td></tr>
	    <tr><td width='200'>Created By <?php echo form_error('created_by') ?></td><td><input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $this->session->userdata('nama') ?>" readonly/></td></tr>
	    <tr><td width='200'>Created Date <?php echo form_error('created_date') ?></td><td><input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo date('Y-m-d H:s:i'); ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_alokasi" value="<?php echo $id_alokasi; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_apbn_covid_alokasi') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
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