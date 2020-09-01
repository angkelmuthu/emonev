<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>T_dak_rincian Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Id Satker</td><td><?php echo $id_satker; ?></td></tr>
	    <tr><td>Id Dak Alokasi</td><td><?php echo $id_dak_alokasi; ?></td></tr>
	    <tr><td>Tahun Anggaran</td><td><?php echo $tahun_anggaran; ?></td></tr>
	    <tr><td>Id Dak Bidang</td><td><?php echo $id_dak_bidang; ?></td></tr>
	    <tr><td>Id Dak Sub Bidang</td><td><?php echo $id_dak_sub_bidang; ?></td></tr>
	    <tr><td>Id Dak Komponen</td><td><?php echo $id_dak_komponen; ?></td></tr>
	    <tr><td>Id Dak Komponen Sub</td><td><?php echo $id_dak_komponen_sub; ?></td></tr>
	    <tr><td>Menu Kegiatan</td><td><?php echo $menu_kegiatan; ?></td></tr>
	    <tr><td>Kegiatan</td><td><?php echo $kegiatan; ?></td></tr>
	    <tr><td>Id Dak Rincian</td><td><?php echo $id_dak_rincian; ?></td></tr>
	    <tr><td>Id Alkes</td><td><?php echo $id_alkes; ?></td></tr>
	    <tr><td>Id Jenis Output</td><td><?php echo $id_jenis_output; ?></td></tr>
	    <tr><td>Harga Satuan</td><td><?php echo $harga_satuan; ?></td></tr>
	    <tr><td>Volume</td><td><?php echo $volume; ?></td></tr>
	    <tr><td>Volume Perubahan</td><td><?php echo $volume_perubahan; ?></td></tr>
	    <tr><td>Satuan</td><td><?php echo $satuan; ?></td></tr>
	    <tr><td>Total</td><td><?php echo $total; ?></td></tr>
	    <tr><td>Sarana</td><td><?php echo $sarana; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Isdeleted</td><td><?php echo $isdeleted; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_dak_rincian') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>