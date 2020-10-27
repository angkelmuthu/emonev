<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA RENCANA_MASALAH_ANGGARAN_COVID</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
            <form action="<?php echo $action; ?>" method="post">
            <input type="hidden" class="form-control" name="id_alokasi" id="id_alokasi" placeholder="Id Alokasi" value="<?php echo $id_alokasi; ?>" />
            <input type="hidden" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
<table class='table table-striped'>
	    <tr><td width='200'>Rencana Penarikan Dana Dalam Satu Minggu Kedepan <?php echo form_error('rencana_penarikan_dana') ?></td><td><input type="number" class="form-control" name="rencana_penarikan_dana" id="rencana_penarikan_dana" placeholder="Rencana Penarikan Dana" value="<?php echo $rencana_penarikan_dana; ?>" /></td></tr>
	    <tr><td width='200'>Rencana Penarikan Dana Sampai dengan 31 Desember <?php echo form_error('rencana_penarikan_dana_sd') ?></td><td><input type="number" class="form-control" name="rencana_penarikan_dana_sd" id="rencana_penarikan_dana_sd" placeholder="Rencana Penarikan Dana Sd" value="<?php echo ($aksi== 'create') ? $penarikan_akhir : $rencana_penarikan_dana_sd; ?>" /></td></tr>
	    <tr><td width='200'>Permasalahan <?php echo form_error('permasalahan') ?></td><td> <textarea class="form-control" non_pks="3" name="permasalahan" id="permasalahan" placeholder="Permasalahan"><?php echo $permasalahan; ?></textarea></td></tr>
	    <tr><td width='200'>Rencana Tindak Lanjut <?php echo form_error('rencana_tindak_lanjut') ?></td><td> <textarea class="form-control" non_pks="3" name="rencana_tindak_lanjut" id="rencana_tindak_lanjut" placeholder="Rencana Tindak Lanjut"><?php echo $rencana_tindak_lanjut; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo ($aksi == 'create') ? site_url('Realisasi_anggaran_covid') : site_url('rencana_masalah_anggaran_covid/create/'.$id_alokasi.'')  ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>

            </div>
        </div>
    </div>
    <div id="load_data"></div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>
<script type="text/javascript">
    <?php if($aksi == 'create'){ ?>
    $('#load_data').load('<?php echo base_url('Rencana_masalah_anggaran_covid/index/'.$id_alokasi.'') ?>');
    <?php } ?>
</script>