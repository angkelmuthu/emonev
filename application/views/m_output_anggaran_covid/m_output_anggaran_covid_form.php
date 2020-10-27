<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA MASTER AKUN BELANJA ANGGARAN COVID</h2>
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
 
        <tr><td width='200'>Kode Akun Belanja <?php echo form_error('kode_output') ?></td><td><input type="text" class="form-control" name="kode_output" id="kode_output" placeholder="kode Akun Belanja" value="<?php echo $kode_output; ?>" /></td></tr>
        <tr><td width='200'>Output <?php echo form_error('id_sub_kegiatan') ?></td><td><?php echo select2_dinamis('id_sub_kegiatan', 'm_sub_kegiatan_anggaran_covid', 'nama_sub_kegiatan', 'id',(!empty($id_sub_kegiatan)) ? $id_sub_kegiatan : ''); ?></td></tr>
	    <tr><td width='200'>Nama Akun Belanja <?php echo form_error('nama_output') ?></td><td><input type="text" class="form-control" name="nama_output" id="nama_output" placeholder="Nama Akun Belanja" value="<?php echo $nama_output; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_output_anggaran_covid') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
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