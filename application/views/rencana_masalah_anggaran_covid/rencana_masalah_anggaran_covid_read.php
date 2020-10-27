<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Rencana_masalah_anggaran_covid Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Id Alokasi</td><td><?php echo $id_alokasi; ?></td></tr>
	    <tr><td>Rencana Penarikan Dana</td><td><?php echo $rencana_penarikan_dana; ?></td></tr>
	    <tr><td>Rencana Penarikan Dana Sd</td><td><?php echo $rencana_penarikan_dana_sd; ?></td></tr>
	    <tr><td>Permasalahan</td><td><?php echo $permasalahan; ?></td></tr>
	    <tr><td>Rencana Tindak Lanjut</td><td><?php echo $rencana_tindak_lanjut; ?></td></tr>
	    <tr><td>Create Date</td><td><?php echo $create_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rencana_masalah_anggaran_covid/create/'.$id_alokasi.'') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>