<?php //print_r($data);
 $falokasi = ''; 
 if($level == 0){
    $dsatker='';
    $dkegiatan='readonly';
    $dsubkegiatan='readonly';
    $doutput='readonly';
    $falokasi = 'readonly';
 }else if($level == 1){
    $dsatker='id_satker';
    $dkegiatan='';
    $dsubkegiatan='readonly';
    $doutput='readonly';
 }else if($level == 2){
    $dsatker='id_satker';
    $dkegiatan='id';
    $dsubkegiatan='';
    $doutput='readonly';
 }else if($level == 3){
    $dsatker='id_satker';
    $dkegiatan='id';
    $dsubkegiatan='id';
    $doutput='';
 }
?>
<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA M_ALOKASI_ANGGARAN_COVID</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
            <form action="<?php echo $action; ?>" method="post">
                <input type="hidden" name="level" value="<?php echo $level; ?>">
                <input type="hidden" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
<table class='table table-striped'>

        <?php //echo $level; ?>
	    <tr>
            <td width='200'>Id Satker <?php echo form_error('id_satker') ?></td><td><?php echo select2_dinamis('id_satker', 'm_satker', 'nama', 'id_satker',(!empty($id_satker)) ? $id_satker : '',$dsatker); ?></td>
        </tr>
        <?php if($level != 0){ ?>
        <tr>
            <td width='200'>Kegiatan <?php echo form_error('kegiatan') ?></td>
            <td><?php echo select2_dinamis('id_kegiatan', 'm_kegiatan_anggaran_covid', 'nama_kegiatan', 'id',(!empty($kegiatan)) ? $kegiatan : '' ,$dkegiatan); ?></td>
        </tr>
        <?php }else { echo '<input type="hidden" value="0" name="id_kegiatan">'; } ?>
        <?php if($level >= 2){ //echo 'sss'.$level; ?>
        <tr><td width='200'>Output <?php echo form_error('id_sub_kegiatan') ?></td><td><?php echo select2_dinamis('id_sub_kegiatan', 'm_sub_kegiatan_anggaran_covid', 'nama_sub_kegiatan', 'id',(!empty($id_sub_kegiatan)) ? $id_sub_kegiatan : '' ,$dsubkegiatan,'id_kegiatan = '.$kegiatan.'','kode'); ?></td></tr>
        <?php }else{ echo '<input type="hidden" value="0" name="id_sub_kegiatan">'; } ?>
        <?php if($level == 3){ ?>
        <tr><td width='200'>Akun Belanja <?php echo form_error('id_output') ?></td><td><?php echo select2_dinamis('id_output', 'm_output_anggaran_covid', 'nama_output', 'id',(!empty($id_output)) ? $id_output : '' ,$doutput,null,'kode_output'); ?></td></tr>
        <?php }else { echo '<input type="hidden" name="id_output" value="0">'; } ?>
        <?php if($level > 2){ ?>
        <tr>
            <td width='200'>Sisa Pagu yang bisa dialokasikan</td>
            <td><input type="text" readonly="readonly" name="sisa_pagu_yg_bisa_dialokasikan" id="sisa_pagu_yg_bisa_dialokasikan" class="form-control" value="<?php echo angka($alokasi_akhir - $pagu_digunakan) ?>"></td>
        </tr>
        <?php } ?>
        <?php if($level > 1){ ?>
	    <tr>
            <td width='200'>Alokasi <?php echo form_error('alokasi') ?></td><td><input type="text" class="form-control" name="alokasi" id="alokasi" placeholder="Alokasi" onchange="filter()" onkeyup="filter()" value="<?php echo ($level == 0) ? 0 : $alokasi; ?>" <?php echo $falokasi; ?> /></td>
        </tr>
        <?php }else { echo '<input type="hidden" name="alokasi" value="0">'; }  ?>
        <?php if($this->router->fetch_method() == 'update') { ?>
        <tr><td width='200'>Alokasi Akhir <?php echo form_error('alokasi_akhir') ?></td><td><input type="text" class="form-control" name="alokasi_akhir" id="alokasi_akhir" placeholder="Alokasi akhir" value="<?php echo $alokasi_akhir; ?>" /></td></tr>
        <?php } ?>
        <?php if($level == 2){ ?>
        <tr>
            <td width='200'>Tahap <?php echo form_error('tahap') ?></td>
            <td>
                <select name="tahap" class="select2">
                    <option value="1" <?php echo ($tahap == 1) ? 'selected' : ''; ?>>Tahap 1</option>
                    <option value="2" <?php echo ($tahap == 2) ? 'selected' : ''; ?>>Tahap 2</option>
                    <option value="3" <?php echo ($tahap == 3) ? 'selected' : ''; ?>>Tahap 3</option>
                    <option value="4" <?php echo ($tahap == 4) ? 'selected' : ''; ?>>Tahap 4</option>
                    <option value="5" <?php echo ($tahap == 5) ? 'selected' : ''; ?>>Tahap 5</option>
                </select>
            </td>
        </tr>
        <?php } ?>
        <?php if($level == 2){ ?>
        <tr>
            <td width='200'>Sumber Dana <?php echo form_error('sumber_dana') ?></td>
            <td>
                <select name="sumber_dana" class="select2">
                    <option value="Babun" <?php echo ($sumber_dana == 'Babun') ? 'selected' : ''; ?>>Babun</option>
                    <option value="DSP" <?php echo ($sumber_dana == 'DSP') ? 'selected' : ''; ?>>DSP</option>
                </select>
            </td>
        </tr>
        <?php } ?>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="hidden" name="id_parent" value="<?php echo $id_parent; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_alokasi_anggaran_covid') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
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
<script type="text/javascript">
</script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
<script type="text/javascript">
    new AutoNumeric('#alokasi', 'commaDecimalCharDotSeparator');
    new AutoNumeric('#alokasi_akhir', 'commaDecimalCharDotSeparator');
    new AutoNumeric('#sisa_pagu_yg_bisa_dialokasikan', 'commaDecimalCharDotSeparator');

function filter(){
    console.log('s');
}

</script>