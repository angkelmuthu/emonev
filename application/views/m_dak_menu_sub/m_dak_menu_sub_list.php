<main id="js-page-content" role="main" class="page-content">
<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                        <h2>KELOLA DATA M_DAK_MENU_SUB</h2>
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
        <?php echo anchor(site_url('m_dak_menu_sub/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?></div>
<div class="col-md-6">
            <form action="<?php echo site_url('m_dak_menu_sub/index'); ?>" method="get">
                    <div class="input-group">
                        <div class="input-group">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <div class="input-group-prepend">
                                    <a href="<?php echo site_url('m_dak_menu_sub'); ?>" class="btn btn-danger waves-effect waves-themed">Reset</a>
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
		<th>Dak</th>
		<th>Id Dak Menu Group</th>
		<th>Nama</th>
		<th>Created By</th>
		<th>Created Date</th>
		<th>Updated By</th>
		<th>Updated Date</th>
		<th>Isdeleted</th>
		<th>Action</th>
            </tr></thead>
            <tbody><?php
            foreach ($m_dak_menu_sub_data as $m_dak_menu_sub)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $m_dak_menu_sub->dak ?></td>
			<td><?php echo $m_dak_menu_sub->id_dak_menu_group ?></td>
			<td><?php echo $m_dak_menu_sub->nama ?></td>
			<td><?php echo $m_dak_menu_sub->created_by ?></td>
			<td><?php echo $m_dak_menu_sub->created_date ?></td>
			<td><?php echo $m_dak_menu_sub->updated_by ?></td>
			<td><?php echo $m_dak_menu_sub->updated_date ?></td>
			<td><?php echo $m_dak_menu_sub->isdeleted ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('m_dak_menu_sub/read/'.$m_dak_menu_sub->id_dak_menu_sub),'<i class="fal fa-eye" aria-hidden="true"></i>','class="btn btn-info btn-xs waves-effect waves-themed"'); 
				echo '  '; 
				echo anchor(site_url('m_dak_menu_sub/update/'.$m_dak_menu_sub->id_dak_menu_sub),'<i class="fal fa-pencil" aria-hidden="true"></i>','class="btn btn-warning btn-xs waves-effect waves-themed"'); 
				echo '  '; 
				echo
    '<button type="button" class="btn btn-danger btn-xs waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm'.$m_dak_menu_sub->id_dak_menu_sub.'"><i class="fal fa-trash" aria-hidden="true"></i></button>
    <div class="modal fade" id="default-example-modal-sm'.$m_dak_menu_sub->id_dak_menu_sub.'" tabindex="-1" role="dialog" aria-hidden="true">
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
                <a href="m_dak_menu_sub/delete/'.$m_dak_menu_sub->id_dak_menu_sub.'" class="btn btn-primary">Ya, Hapus</a>
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