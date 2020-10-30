<main id="js-page-content" role="main" class="page-content">
<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                        <h2>KELOLA DATA DATA RKA (RINCIAN KEGIATAN)</h2>
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
        <?php echo anchor(site_url('t_dak_rincian_rka/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?></div>
<div class="col-md-6">
            <form action="<?php echo site_url('t_dak_rincian_rka/index'); ?>" method="get">
                    <div class="input-group">
                        <div class="input-group">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <div class="input-group-prepend">
                                    <a href="<?php echo site_url('t_dak_rincian_rka'); ?>" class="btn btn-danger waves-effect waves-themed">Reset</a>
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
		<th>Id Satker</th>
		<th>Id Dak Alokasi</th>
		<th>Tahun Anggaran</th>
		<th>Id Dak Bidang</th>
		<th>Id Dak Sub Bidang</th>
		<th>Id Dak Komponen</th>
		<th>Id Dak Komponen Sub</th>
		<th>Menu Kegiatan</th>
		<th>Kegiatan</th>
		<th>Id Dak Rincian</th>
		<th>Id Alkes</th>
		<th>Id Jenis Output</th>
		<th>Harga Satuan</th>
		<th>Volume</th>
		<th>Volume Perubahan</th>
		<th>Id Satuan</th>
		<th>Total</th>
		<th>Kode Satker Lokasi</th>
		<th>Kode Nonsatker Lokasi</th>
		<th>Jenis Fasyankes</th>
		<th>Instalasi</th>
		<th>Ruangan</th>
		<th>Sarana</th>
		<th>Nip Pengisi</th>
		<th>Nama Pengisi</th>
		<th>Jabatan Pengisi</th>
		<th>Created By</th>
		<th>Created Date</th>
		<th>Updated By</th>
		<th>Updated Date</th>
		<th>Isdeleted</th>
		<th>Action</th>
            </tr></thead>
            <tbody><?php
            foreach ($t_dak_rincian_rka_data as $t_dak_rincian_rka)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $t_dak_rincian_rka->id_satker ?></td>
			<td><?php echo $t_dak_rincian_rka->id_dak_alokasi ?></td>
			<td><?php echo $t_dak_rincian_rka->tahun_anggaran ?></td>
			<td><?php echo $t_dak_rincian_rka->id_dak_bidang ?></td>
			<td><?php echo $t_dak_rincian_rka->id_dak_sub_bidang ?></td>
			<td><?php echo $t_dak_rincian_rka->id_dak_komponen ?></td>
			<td><?php echo $t_dak_rincian_rka->id_dak_komponen_sub ?></td>
			<td><?php echo $t_dak_rincian_rka->menu_kegiatan ?></td>
			<td><?php echo $t_dak_rincian_rka->kegiatan ?></td>
			<td><?php echo $t_dak_rincian_rka->id_dak_rincian ?></td>
			<td><?php echo $t_dak_rincian_rka->id_alkes ?></td>
			<td><?php echo $t_dak_rincian_rka->id_jenis_output ?></td>
			<td><?php echo $t_dak_rincian_rka->harga_satuan ?></td>
			<td><?php echo $t_dak_rincian_rka->volume ?></td>
			<td><?php echo $t_dak_rincian_rka->volume_perubahan ?></td>
			<td><?php echo $t_dak_rincian_rka->id_satuan ?></td>
			<td><?php echo $t_dak_rincian_rka->total ?></td>
			<td><?php echo $t_dak_rincian_rka->kode_satker_lokasi ?></td>
			<td><?php echo $t_dak_rincian_rka->kode_nonsatker_lokasi ?></td>
			<td><?php echo $t_dak_rincian_rka->jenis_fasyankes ?></td>
			<td><?php echo $t_dak_rincian_rka->instalasi ?></td>
			<td><?php echo $t_dak_rincian_rka->ruangan ?></td>
			<td><?php echo $t_dak_rincian_rka->sarana ?></td>
			<td><?php echo $t_dak_rincian_rka->nip_pengisi ?></td>
			<td><?php echo $t_dak_rincian_rka->nama_pengisi ?></td>
			<td><?php echo $t_dak_rincian_rka->jabatan_pengisi ?></td>
			<td><?php echo $t_dak_rincian_rka->created_by ?></td>
			<td><?php echo $t_dak_rincian_rka->created_date ?></td>
			<td><?php echo $t_dak_rincian_rka->updated_by ?></td>
			<td><?php echo $t_dak_rincian_rka->updated_date ?></td>
			<td><?php echo $t_dak_rincian_rka->isdeleted ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('t_dak_rincian_rka/read/'.$t_dak_rincian_rka->id_rincian),'<i class="fal fa-eye" aria-hidden="true"></i>','class="btn btn-info btn-xs waves-effect waves-themed"'); 
				echo '  '; 
				echo anchor(site_url('t_dak_rincian_rka/update/'.$t_dak_rincian_rka->id_rincian),'<i class="fal fa-pencil" aria-hidden="true"></i>','class="btn btn-warning btn-xs waves-effect waves-themed"'); 
				echo '  '; 
				echo
    '<button type="button" class="btn btn-danger btn-xs waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm'.$t_dak_rincian_rka->id_rincian.'"><i class="fal fa-trash" aria-hidden="true"></i></button>
    <div class="modal fade" id="default-example-modal-sm'.$t_dak_rincian_rka->id_rincian.'" tabindex="-1" role="dialog" aria-hidden="true">
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
                <a href="t_dak_rincian_rka/delete/'.$t_dak_rincian_rka->id_rincian.'" class="btn btn-primary">Ya, Hapus</a>
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
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>