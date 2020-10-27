<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA OUTPUT ANGGARAN_COVID</h2>
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

        <tr><td width='200'>Kode <?php echo form_error('kode') ?></td><td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" /></td></tr>
        <tr>
            <td width='200'>Kegiatan <?php echo form_error('id_kegiatan') ?></td>
            <td><?php echo select2_dinamis('id_kegiatan', 'm_kegiatan_anggaran_covid', 'nama_kegiatan', 'id',(!empty($id_kegiatan)) ? $id_kegiatan : ''); ?></td>
        </tr>
	    <tr><td width='200'>Nama Output <?php echo form_error('nama_sub_kegiatan') ?></td><td><input type="text" class="form-control" name="nama_sub_kegiatan" id="nama_sub_kegiatan" placeholder="Nama Output" value="<?php echo $nama_sub_kegiatan; ?>" /></td></tr>
	    <tr><td width='200'>Create Date <?php echo form_error('create_date') ?></td><td><input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo date('Y-m-d H:s:i'); ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_sub_kegiatan_anggaran_covid') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
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