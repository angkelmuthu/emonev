<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA DAK RINCIAN</h2>
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
                                <?php
                                $flag = $this->db->get_where('m_dak_komponen_sub', array('id_dak_komponen_sub' => $this->uri->segment(3)))->row();
                                if ($flag->isalkes == 0) {
                                ?>
                                    <tr>
                                        <td width='200'>Lokasi <?php echo form_error('sarana') ?></td>
                                        <td>
                                            <div class="form-group">
                                                <label for="sel1">Pilih Installasi:</label>
                                                <select class="form-control" name="instalasi" id="instalasi">
                                                    <?php
                                                    foreach ($instalasi as $value) {
                                                        echo "<option value='$value->kode_rs_instalasi'>$value->nama_rs_instalasi</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="sel1">Pilih ruangan:</label>
                                                <select class="form-control" name="ruangan" id="ruangan"></select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sel1">Pilih Sarana:</label>
                                                <select class="form-control" name="sarana" id="sarana"></select>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width='200'>Id Dak Rincian <?php echo form_error('id_dak_rincian') ?></td>
                                        <td>
                                            <select class="form-control" name="id_dak_rincian" id="id_dak_rincian">
                                                <?php
                                                $this->db->from('m_dak_rincian');
                                                $this->db->where('id_dak_komponen_sub', $this->uri->segment(3));
                                                $query2 = $this->db->get();
                                                foreach ($query2->result() as $dt) {
                                                    echo "<option value='$dt->id_dak_rincian'>$dt->nama_dak_rincian</option>";
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" name="alkes" value="">
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td width='200'>Fasyankes <?php echo form_error('sarana') ?></td>
                                        <td>
                                            <div class="form-group">
                                                <label for="sel1">Fasilitas Layanan Kesehatan:</label>
                                                <select class="form-control" name="faskes" id="faskes">
                                                    <option value="">Pilih Fasyankes</option>
                                                    <?php
                                                    foreach ($fasyankes as $value) {
                                                        echo "<option value='$value->id_jenis_faskes'>$value->jenis_alkes</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sel1">Installasi:</label>
                                                <select class="form-control" name="instalasi" id="instalasi_alkes"></select>
                                            </div>

                                            <div class="form-group">
                                                <label for="sel1">Ruangan:</label>
                                                <select class="form-control" name="ruangan" id="ruangan_alkes">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sel1">Sarana:</label>
                                                <select class="form-control" name="sarana" id="sarana_alkes"></select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sel1">Alat Kesehatan:</label>
                                                <select class="form-control" name="alkes" id="alkes"></select>
                                            </div>
                                            <input type="hidden" name="id_dak_rincian" value="">
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td width='200'>Volume <?php echo form_error('volume') ?></td>
                                    <td><input type="number" class="form-control" name="volume" id="volume" placeholder="Volume" value="<?php echo $volume; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Harga Satuan <?php echo form_error('harga_satuan') ?></td>
                                    <td><input type="number" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Satuan <?php echo form_error('satuan') ?></td>
                                    <td><?php echo cmb_dinamis('satuan', 'm_satuan', 'satuan', 'kdsatuan') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Total <?php echo form_error('total') ?></td>
                                    <td><input type="number" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Jenis Output <?php echo form_error('Jenis Output') ?></td>
                                    <td><?php echo select2_dinamis('output', 'm_jenis_output', 'nama', 'id_jenis_output') ?></td>
                                </tr>
                                <tr>
                                    <td>Puskesmas</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="select2 form-control" name="lokasi[]" multiple="multiple" id="multiple-basic">
                                                <?php
                                                $this->db->from('m_puskesmas');
                                                $this->db->where('provinsi', $this->session->userdata('nama'));
                                                $query3 = $this->db->get();
                                                foreach ($query3->result() as $dtlokasi) {
                                                    echo "<option value='$dtlokasi->id_puskesmas'>" . $dtlokasi->kode . " - " . $dtlokasi->nama . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="hidden" name="created_by" value="<?php echo $this->session->userdata('nama') ?>" />
                                        <input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                        <input type="hidden" name="updated_by" value="<?php echo $this->session->userdata('nama') ?>" /><input type="hidden" name="updated_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                        <input type="hidden" name="id_dak_sub_komponen" value="<?php echo $this->uri->segment(3); ?>" />
                                        <input type="hidden" name="id_dak_alokasi" value="<?php echo $this->uri->segment(4); ?>" />
                                        <input type="hidden" name="id_kegiatan" value="<?php echo $this->uri->segment(5); ?>" />
                                        <input type="hidden" name="id_dak_sub_bidang" value="<?php echo $this->uri->segment(6); ?>" />
                                        <input type="hidden" name="id_rincian" value="<?php echo $id_rincian; ?>" />
                                        <input type="hidden" name="isdeleted" value="0" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <!-- <a href="<?php echo site_url('t_dak_rincian') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td> -->
                                </tr>
                            </table>
                        </form>
                    </div>
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
    $(document).ready(function() {
        $("#volume, #harga_satuan").keyup(function() {
            var harga = $("#harga_satuan").val();
            var jumlah = $("#volume").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);
        });
    });
</script>
<script type="text/javascript">
    $("#instalasi").change(function() {

        // variabel dari nilai combo box kendaraan
        var kode_instalasi = $("#instalasi").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/t_dak_rincian/get_rs_ruangan",
            method: "POST",
            data: {
                kode_instalasi: kode_instalasi
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_rs_ruangan + '>' + data[i].nama_rs_ruangan + '</option>';
                }
                $('#ruangan').html(html);

            }
        });
    });

    $("#ruangan").change(function() {

        // variabel dari nilai combo box kendaraan
        var id_ruangan = $("#ruangan").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/t_dak_rincian/get_rs_sarana",
            method: "POST",
            data: {
                id_ruangan: id_ruangan
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_rs_sarana + '>' + data[i].nama_rs_sarana + '</option>';
                }
                $('#sarana').html(html);

            }
        });
    });
</script>
<script type="text/javascript">
    $("#faskes").change(function() {

        // variabel dari nilai combo box kendaraan
        var kode_faskes = $("#faskes").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/t_dak_rincian/get_alkes_instalasi",
            method: "POST",
            data: {
                kode_faskes: kode_faskes
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_instalasi + '>' + data[i].nama_instalasi + '</option>';
                }
                $('#instalasi_alkes').html(html);

            }
        });
    });
    $("#instalasi_alkes").change(function() {

        // variabel dari nilai combo box kendaraan
        var kode_instalasi_alkes = $("#instalasi_alkes").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/t_dak_rincian/get_alkes_ruangan",
            method: "POST",
            data: {
                kode_instalasi_alkes: kode_instalasi_alkes
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_ruangan + '>' + data[i].nama_ruangan + '</option>';
                }
                $('#ruangan_alkes').html(html);

            }
        });
    });

    $("#ruangan_alkes").change(function() {

        // variabel dari nilai combo box kendaraan
        var kode_ruangan_alkes = $("#ruangan_alkes").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/t_dak_rincian/get_alkes_sarana",
            method: "POST",
            data: {
                kode_ruangan_alkes: kode_ruangan_alkes
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_sarana + '>' + data[i].nama_sarana + '</option>';
                }
                $('#sarana_alkes').html(html);

            }
        });
    });
    $("#sarana_alkes").change(function() {

        // variabel dari nilai combo box kendaraan
        var kode_sarana_alkes = $("#sarana_alkes").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/t_dak_rincian/get_alkes",
            method: "POST",
            data: {
                kode_sarana_alkes: kode_sarana_alkes
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_alkes + '>' + data[i].nama_alkes + '</option>';
                }
                $('#alkes').html(html);

            }
        });
    });
</script>