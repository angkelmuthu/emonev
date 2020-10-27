<?php 
//print_r($record);
//echo $total_akumulasi_akhir;
$total_akumulasi_akhir = ($this->router->fetch_method() == 'update') ? ($total_akumulasi_akhir - $inputan_nilai) : $total_akumulasi_akhir ?>
<main id="js-page-content" role="main" class="page-content">
<div id="load_data"></div>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA REALISASI <?php echo ($jenis_input == 'kontrak') ? 'KONTRAK' : 'PEMBAYARAN'; ?></h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
            <form action="<?php echo $action; ?>" method="post">
            <input type="hidden" class="form-control" name="id_alokasi_covid" id="id_alokasi_covid" placeholder="Id Alokasi Covid" value="<?php echo $id_alokasi_covid; ?>" />
            <input type="hidden" class="form-control" name="jenis_input" id="jenis_input" placeholder="Jenis Input" value="<?php echo $jenis_input; ?>" />
<table class='table table-striped'>
        <?php /*
        <tr><td width='200'>Sub Kegiatan <?php echo form_error('id_sub_kegiatan') ?></td><td><?php echo select2_dinamis('id_sub_kegiatan', 'm_sub_kegiatan_anggaran_covid', 'nama_sub_kegiatan', 'id',(!empty($id_sub_kegiatan)) ? $id_sub_kegiatan : '' ); ?></td></tr>
        */ ?>
        <tr>
            <td>Kegiatan</td>
            <td><?php echo $record[0]['nama_kegiatan']; ?></td>
        </tr>
        <tr>
            <td>Output</td>
            <td><?php echo $record[0]['nama_sub_kegiatan']; ?></td>
        </tr>
        <tr>
            <td>Akun Belanja</td>
            <td><?php echo $record[0]['nama_output']; ?></td>
        </tr>
        <?php if($jenis_input == 'pembayaran'){ ?>
        <tr>
            <td>Kategori Kontrak</td>
            <td>
                <select name="kategori_kontrak" class="form-control">
                    <option value="kontraktual" <?php echo ($kategori_kontrak == 'kontraktual') ? 'selected' : '' ?>>Kontraktual</option>
                    <option value="non-kontraktual" <?php echo ($kategori_kontrak == 'non-kontraktual') ? 'selected' : '' ?>> Non Kontraktual</option>
                </select>
            </td>
        </tr>
        <?php }else{ echo '<input type="hidden" name="kategori_kontrak" value="kontraktual">'; } ?>
        <tr>
            <td width='200'>Total Akumulasi Akhir <?php echo form_error('total_akumulasi_akhir') ?></td>
            <td><input type="text" class="form-control" name="total_akumulasi_akhir" id="total_akumulasi_akhir" placeholder="Total Akumulasi Akhir" readonly="readonly" value="<?php echo (empty($total_akumulasi_akhir)) ? 0 : $total_akumulasi_akhir ; ?>" /></td>
        </tr>
	    <tr>
            <td width='200'>Inputan Nilai <?php echo form_error('inputan_nilai') ?></td>
            <td><input type="text" required="required" onchange="kalkulasi()" autocomplete="off" onkeyup="kalkulasi()" class="form-control" name="inputan_nilai" id="inputan_nilai" placeholder="Inputan Nilai" value="<?php echo $inputan_nilai; ?>" /></td>
        </tr>
	    <tr>
            <td width='200'>Alokasi Akhir <?php echo form_error('alokasi_akhir') ?></td>
            <td><input type="text" class="form-control" name="alokasi_akhir" id="alokasi_akhir" readonly="readonly" placeholder="Alokasi Akhir" value="<?php echo $alokasi_akhir; ?>" /></td>
        </tr>
	    <tr><td width='200'>Total Akumulasi Rp <?php echo form_error('total_akumulasi_rp') ?></td><td><input type="text" class="form-control" name="total_akumulasi_rp" readonly="readonly" id="total_akumulasi_rp" placeholder="Total Akumulasi Rp" value="<?php echo $total_akumulasi_rp; ?>" /></td></tr>
	    <tr><td width='200'>Total Akumulasi Percen <?php echo form_error('total_akumulasi_percen') ?></td><td><input type="text" class="form-control" name="total_akumulasi_percen" readonly="readonly" id="total_akumulasi_percen" placeholder="Total Akumulasi Percen" value="<?php echo $total_akumulasi_percen; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('realisasi_anggaran_covid') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
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
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
<script type="text/javascript">
    const total_akumulasi_akhir =  new AutoNumeric('#total_akumulasi_akhir', 'commaDecimalCharDotSeparator');
    const inputan_nilai =  new AutoNumeric('#inputan_nilai', 'commaDecimalCharDotSeparator');
    const alokasi_akhir =  new AutoNumeric('#alokasi_akhir', 'commaDecimalCharDotSeparator');
    

    $('#load_data').load('<?php echo base_url('Realisasi_anggaran_covid/index_child/'.$id_alokasi_covid.'/'.$jenis_input.'') ?>');
    function kalkulasi() {
        //var total_akumulasi_rp = Number($('#total_akumulasi_akhir').val()) + Number($('#inputan_nilai').val()); 
        const total_akumulasi_rp = Number(total_akumulasi_akhir.rawValue) + Number(inputan_nilai.rawValue);
        // var total_akumulasi_percen = ( (total_akumulasi_rp / Number($('#alokasi_akhir').val())) * 100 );
        const total_akumulasi_percen = ((Number(total_akumulasi_rp) / Number(alokasi_akhir.rawValue)) * 100);

        if(Number(total_akumulasi_rp) <= Number(alokasi_akhir.rawValue)){
         new AutoNumeric('#total_akumulasi_rp', Number(total_akumulasi_rp),'commaDecimalCharDotSeparator');
         $('#total_akumulasi_percen').val(total_akumulasi_percen.toFixed(2));
        }else{
        	//alert('nominal inputan melebih alokasi akhir');
        	$('#total_akumulasi_rp').val('');
            $('#total_akumulasi_percen').val('');
            $('#inputan_nilai').val('');
        }
    }
</script>