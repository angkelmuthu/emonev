<?php 
 $kegiatan_tmp = array();
 $alokasi_satker_tmp = array();
 foreach ($m_alokasi_anggaran_covid_data as $key => $value) {
     if($value->level == 2){
       $kegiatan_tmp[$value->id_satker.''.$value->kegiatan] += $value->alokasi_akhir;
       $alokasi_satker_tmp[$value->id_satker] += $value->alokasi_akhir;
     }
 }

 //print_r($alokasi_satker_tmp);
?>
<main id="js-page-content" role="main" class="page-content">
<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                        <h2>KELOLA DATA ALOKASI ANGGARAN COVID</h2>
                        <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <?php /*if($_SESSION['id_user_level'] < 3 ){ ?>
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('M_alokasi_anggaran_covid/unggahExcel'); ?>">
                        <table class="table table-bordered">
                            <tr style="background-color: #EAEAEA">
                                <td>Input dengan Upload Excel</td>
                                <td><button class="btn btn-info btn-xs waves-effect waves-themed" id="btnExport" >Download Template</button></td>
                            </tr>
                            <tr>
                                <td><input type="file" name="import" required="required"></td>
                                <td>
                                   <button class="btn btn-primary btn-xs waves-effect waves-themed" value="Unggah Data" name="getItem" type="submit"> Unggah Data </button>
                                    </td>
                            </tr>
                        </table>
                        </form>
                    <?php } */?>
                    <div class="row">
                    <div class="col-md-6">
        <?php 
        if($_SESSION['id_user_level'] < 3 ){
        echo anchor(site_url('m_alokasi_anggaran_covid/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); } ?>
        
        </div>
<div class="col-md-6">
            <form action="<?php echo site_url('m_alokasi_anggaran_covid/index'); ?>" method="get">
                    <div class="input-group">
                        <div class="input-group">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <div class="input-group-prepend">
                                    <a href="<?php echo site_url('m_alokasi_anggaran_covid'); ?>" class="btn btn-danger waves-effect waves-themed">Reset</a>
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
        <th>Kegiatan</th>
        <th>Output</th>
        <th>Akun Belanja</th>
		<th>Alokasi</th>
        <th>Alokasi Akhir</th>
        <th>Tahap</th>
		<th>Create Date</th>
		<th>Action</th>
            </tr></thead>
            <tbody><?php

            $satker = '';
            $kegiatan = '';
            $sub_kegiatan = '';
            $no = 0;
            $menuAdd = '';
            foreach ($m_alokasi_anggaran_covid_data as $m_alokasi_anggaran_covid)
            {
                if($m_alokasi_anggaran_covid->level == 0){
                    $bg = '';
                    $menuAdd = 'Kegiatan';
                    $no = $no+1;
                }elseif($m_alokasi_anggaran_covid->level == 1){
                    $bg = '#3183D7';
                    $menuAdd = 'Output';
                }elseif($m_alokasi_anggaran_covid->level == 2){
                    $bg = '#8DBBE9';
                    $menuAdd = 'Akun Belanja';
                }elseif($m_alokasi_anggaran_covid->level == 3){
                    $bg = '#DCEAF8';
                }
                
                ?>
                <tr style="background-color: <?php echo $bg; ?>">
			<td width="10px"><?php echo ($m_alokasi_anggaran_covid->level == 0) ? $no : ''; ?></td>
			<td><?php echo ($satker != $m_alokasi_anggaran_covid->id_satker) ? $m_alokasi_anggaran_covid->nama : '' ?></td>
            <td><?php echo ($kegiatan != $m_alokasi_anggaran_covid->id_satker.''.$m_alokasi_anggaran_covid->kegiatan) ? $m_alokasi_anggaran_covid->nama_kegiatan : ''; ?></td>
            <td><?php echo ($sub_kegiatan != $m_alokasi_anggaran_covid->id_satker.''.$m_alokasi_anggaran_covid->kegiatan.''.$m_alokasi_anggaran_covid->id_sub_kegiatan) ? $m_alokasi_anggaran_covid->nama_sub_kegiatan : ''; ?></td>
            <td><?php echo $m_alokasi_anggaran_covid->nama_output ?></td>
			<td align="right">
                <?php 
                      if($m_alokasi_anggaran_covid->level == 0)
                           echo angka($alokasi_satker_tmp[$m_alokasi_anggaran_covid->id_satker]);
                      else if($m_alokasi_anggaran_covid->level == 1)
                           echo angka($kegiatan_tmp[$m_alokasi_anggaran_covid->id_satker.''.$m_alokasi_anggaran_covid->kegiatan]);
                      else if($m_alokasi_anggaran_covid->level == 2)
                           echo angka($m_alokasi_anggaran_covid->alokasi);
                      else if($m_alokasi_anggaran_covid->level == 3)
                           echo angka($m_alokasi_anggaran_covid->alokasi);

                ?> 
            </td>
            <td align="right">
                <?php 
                      if($m_alokasi_anggaran_covid->level == 0)
                           echo angka($alokasi_satker_tmp[$m_alokasi_anggaran_covid->id_satker]);
                      else if($m_alokasi_anggaran_covid->level == 1)
                           echo angka($kegiatan_tmp[$m_alokasi_anggaran_covid->id_satker.''.$m_alokasi_anggaran_covid->kegiatan]);
                      else if($m_alokasi_anggaran_covid->level == 2)
                           echo angka($m_alokasi_anggaran_covid->alokasi_akhir);
                      else if($m_alokasi_anggaran_covid->level == 3)
                           echo angka($m_alokasi_anggaran_covid->alokasi_akhir);
                ?>
            </td>
            <td><?php echo (!empty($m_alokasi_anggaran_covid->tahap) && $m_alokasi_anggaran_covid->tahap > 0) ? $m_alokasi_anggaran_covid->tahap : ''?></td>
			<td><?php echo $m_alokasi_anggaran_covid->create_date ?></td>
			<td style="text-align:center" width="200px">
				<?php 
                if($_SESSION['id_user_level'] == 3 OR $_SESSION['id_user_level'] == 4 ){
                  if($m_alokasi_anggaran_covid->level == 2){
                   echo anchor(site_url('m_alokasi_anggaran_covid/create/'.$m_alokasi_anggaran_covid->id),'<i class="fal fa-plus-square" aria-hidden="true"></i> '.$menuAdd.'','class="btn btn-primary btn-xs waves-effect waves-themed"');
                  } 
                echo '  '; 
                /*
                echo anchor(site_url('m_alokasi_anggaran_covid/read/'.$m_alokasi_anggaran_covid->id),'<i class="fal fa-eye" aria-hidden="true"></i>','class="btn btn-info btn-xs waves-effect waves-themed"'); 
                echo '  '; 
                echo anchor(site_url('m_alokasi_anggaran_covid/update/'.$m_alokasi_anggaran_covid->id),'<i class="fal fa-pencil" aria-hidden="true"></i>','class="btn btn-warning btn-xs waves-effect waves-themed"'); 
                echo '  ';
                */ 
                if($m_alokasi_anggaran_covid->level > 2){
                echo
                    '<button type="button" class="btn btn-danger btn-xs waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm'.$m_alokasi_anggaran_covid->id.'"><i class="fal fa-trash" aria-hidden="true"></i></button>
                    <div class="modal fade" id="default-example-modal-sm'.$m_alokasi_anggaran_covid->id.'" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <a href="m_alokasi_anggaran_covid/delete/'.$m_alokasi_anggaran_covid->id.'" class="btn btn-primary">Ya, Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>';
                 }
                }else{
                if($m_alokasi_anggaran_covid->level != 3){
                echo anchor(site_url('m_alokasi_anggaran_covid/create/'.$m_alokasi_anggaran_covid->id),'<i class="fal fa-plus-square" aria-hidden="true"></i> '.$menuAdd.'','class="btn btn-primary btn-xs waves-effect waves-themed"');
                } 
                echo '  '; 
                /*
				echo anchor(site_url('m_alokasi_anggaran_covid/read/'.$m_alokasi_anggaran_covid->id),'<i class="fal fa-eye" aria-hidden="true"></i>','class="btn btn-info btn-xs waves-effect waves-themed"'); 
				echo '  '; 
				echo anchor(site_url('m_alokasi_anggaran_covid/update/'.$m_alokasi_anggaran_covid->id),'<i class="fal fa-pencil" aria-hidden="true"></i>','class="btn btn-warning btn-xs waves-effect waves-themed"'); 
				echo '  ';
                */ 
				echo
    '<button type="button" class="btn btn-danger btn-xs waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm'.$m_alokasi_anggaran_covid->id.'"><i class="fal fa-trash" aria-hidden="true"></i></button>
    <div class="modal fade" id="default-example-modal-sm'.$m_alokasi_anggaran_covid->id.'" tabindex="-1" role="dialog" aria-hidden="true">
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
                <a href="m_alokasi_anggaran_covid/delete/'.$m_alokasi_anggaran_covid->id.'" class="btn btn-primary">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>';
				
                }
                ?>
			</td>
		</tr>
                <?php
                $satker = $m_alokasi_anggaran_covid->id_satker;
                $kegiatan = $m_alokasi_anggaran_covid->id_satker.''.$m_alokasi_anggaran_covid->kegiatan;
                $sub_kegiatan = $m_alokasi_anggaran_covid->id_satker.''.$m_alokasi_anggaran_covid->kegiatan.''.$m_alokasi_anggaran_covid->id_sub_kegiatan;
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
<div style="display: none;">
<table id="tblExport" width="100%" border="1">
    <tr>
        <td>No</td>
        <td>Kode Satker</td>
        <td>Kode Kegiatan</td>
        <td>Tahap</td>
        <td>Alokasi</td>
    </tr>
</table>
</div>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.battatech.excelexport.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#btnExport").click(function () {
            $("#tblExport").btechco_excelexport({
                containerid: "tblExport"
               , datatype: $datatype.Table
            });
        });
    });
</script>