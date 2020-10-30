<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA DATA ALKES</h2>
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


	    <tr><td width='200'>Id Faskes <?php echo form_error('id_faskes') ?></td><td><?php echo select2_dinamis('id_faskes', 'm_faskes', 'nama_faskes', 'id_alkes') ?></td></tr>
	    <tr><td width='200'>Kode Alkes <?php echo form_error('kode_alkes') ?></td><td><input type="text" class="form-control" name="kode_alkes" id="kode_alkes" placeholder="Kode Alkes" value="<?php echo $kode_alkes; ?>" /></td></tr>
	    <tr><td width='200'>Nama Alkes <?php echo form_error('nama_alkes') ?></td><td><input type="text" class="form-control" name="nama_alkes" id="nama_alkes" placeholder="Nama Alkes" value="<?php echo $nama_alkes; ?>" /></td></tr>
	    <tr><td width='200'>Kode Sarana <?php echo form_error('kode_sarana') ?></td><td><?php echo select2_dinamis('kode_sarana', 'v_sarana', 'nama_sarana', 'kode_sarana') ?></td></tr>
	    <tr><td width='200'>Created By <?php echo form_error('created_by') ?></td><td><input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $this->session->userdata('id_users') ?>" readonly/></td></tr>
	    <tr><td width='200'>Created Date <?php echo form_error('created_date') ?></td><td><input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo date('Y-m-d H:s:i'); ?>" /></td></tr>
	    <tr><td width='200'>Updated By <?php echo form_error('updated_by') ?></td><td><input type="text" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By" value="<?php echo $this->session->userdata('id_users') ?>" readonly/></td></tr>
	    <tr><td width='200'>Updated Date <?php echo form_error('updated_date') ?></td><td><input type="text" class="form-control" name="updated_date" id="updated_date" placeholder="Updated Date" value="<?php echo date('Y-m-d H:s:i'); ?>" /></td></tr>
	    <tr><td width='200'>Isdeleted <?php echo form_error('isdeleted') ?></td><td><input type="text" class="form-control" name="isdeleted" id="isdeleted" placeholder="Isdeleted" value="<?php echo $isdeleted; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_alkes" value="<?php echo $id_alkes; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_alkes') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
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