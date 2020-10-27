<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                        <h2>KELOLA DATA RENCANA MASALAH ANGGARAN COVID</h2>
                        <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                    <div class="row">
                    <div class="col-md-6">
        <?php /* echo anchor(site_url('rencana_masalah_anggaran_covid/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"');*/ ?></div>
<div class="col-md-6">
            <?php /*
            <form action="<?php echo site_url('rencana_masalah_anggaran_covid/index'); ?>" method="get">
                    <div class="input-group">
                        <div class="input-group">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <div class="input-group-prepend">
                                    <a href="<?php echo site_url('rencana_masalah_anggaran_covid'); ?>" class="btn btn-danger waves-effect waves-themed">Reset</a>
                                    </div>
                                    <?php
                                }
                            ?>
                            <input id="button-addon3" type="text" name="q" value="<?php echo $q; ?>" class="form-control" placeholder="Search for anything..." aria-label="Example text with two button addons" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-primary waves-effect waves-themed" type="submit">Search</button>
                            </div>
                    </div>
                </form>
            <?php */ ?>
                </div>
                </div>
            </div>
        </div>
                <div class="panel-container show">
                    <div class="panel-content">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="thead-themed">
            <tr>
                <th>No</th>
		<!-- <th>Id Alokasi</th> -->
		<th>Rencana Penarikan Dana</th>
		<th>Rencana Penarikan Dana Sd</th>
		<th>Permasalahan</th>
		<th>Rencana Tindak Lanjut</th>
		<th>Create Date</th>
		<th>Action</th>
            </tr></thead>
            <tbody><?php
            $no = 0;
            foreach ($rencana_masalah_anggaran_covid_data as $rencana_masalah_anggaran_covid)
            {
                $no = $no + 1;
                ?>
                <tr>
			<td width="10px"><?php echo $no; ?></td>
			<?php /* <td><?php echo $rencana_masalah_anggaran_covid->id_alokasi ?></td> */ ?>
			<td><?php echo angka($rencana_masalah_anggaran_covid->rencana_penarikan_dana,2) ?></td>
			<td><?php echo angka($rencana_masalah_anggaran_covid->rencana_penarikan_dana_sd,2)?></td>
			<td><?php echo $rencana_masalah_anggaran_covid->permasalahan ?></td>
			<td><?php echo $rencana_masalah_anggaran_covid->rencana_tindak_lanjut ?></td>
			<td><?php echo $rencana_masalah_anggaran_covid->create_date ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('rencana_masalah_anggaran_covid/read/'.$rencana_masalah_anggaran_covid->id),'<i class="fal fa-eye" aria-hidden="true"></i>','class="btn btn-info btn-xs waves-effect waves-themed"'); 
				echo '  '; 
				echo anchor(site_url('rencana_masalah_anggaran_covid/update/'.$rencana_masalah_anggaran_covid->id),'<i class="fal fa-pencil" aria-hidden="true"></i>','class="btn btn-warning btn-xs waves-effect waves-themed"'); 
				echo '  '; 
				echo
    '<button type="button" class="btn btn-danger btn-xs waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm'.$rencana_masalah_anggaran_covid->id.'"><i class="fal fa-trash" aria-hidden="true"></i></button>
    <div class="modal fade" id="default-example-modal-sm'.$rencana_masalah_anggaran_covid->id.'" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">INFO!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="'.base_url('rencana_masalah_anggaran_covid/delete/'.$rencana_masalah_anggaran_covid->id.'/'.$rencana_masalah_anggaran_covid->id_alokasi.'').'" class="btn btn-primary">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>';
				?>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
            </table>
                
	<?php echo $pagination ?>
                </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>