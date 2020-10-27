<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Realisasi_anggaran_covid Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Id Alokasi Covid</td><td><?php echo $id_alokasi_covid; ?></td></tr>
	    <tr><td>Inputan Nilai</td><td><?php echo $inputan_nilai; ?></td></tr>
	    <tr><td>Jenis Input</td><td><?php echo $jenis_input; ?></td></tr>
	    <tr><td>Alokasi Akhir</td><td><?php echo $alokasi_akhir; ?></td></tr>
	    <tr><td>Total Akumulasi Rp</td><td><?php echo $total_akumulasi_rp; ?></td></tr>
	    <tr><td>Total Akumulasi Percen</td><td><?php echo $total_akumulasi_percen; ?></td></tr>
	    <tr><td></td><td>
            <a href="<?php echo site_url('realisasi_anggaran_covid')//site_url('realisasi_anggaran_covid/create/'.$id_alokasi_covid.'/'.$jenis_input.'') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a>
        </td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>