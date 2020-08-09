<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA LAPORAN TRIWULAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="" method="post">

                            <table class='table'>
                                <tr>
                                    <td width='200'>Tahun Anggaran</td>
                                    <td>
                                        <select class="form-control" name="tahun" id="tahun">
                                            <option value=''>Pilih Tahun</option>
                                            <?php
                                            $this->db->from('m_dak_alokasi');
                                            $this->db->where('id_satker', $this->session->userdata('id_satker'));
                                            $this->db->group_by('tahun');
                                            $query2 = $this->db->get();
                                            foreach ($query2->result() as $dt) {
                                                echo "<option value='$dt->tahun'>$dt->tahun</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Komponen Alokasi</td>
                                    <td>
                                        <select class="form-control" name="idalokasi" id="idalokasi">
                                            <?php
                                            foreach ($instalasi as $value) {
                                                echo "<option value='$value->id_dak_sub_bidang'>$value->nama_dak_sub_bidang</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" name="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-search"></i> Submit</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            $this->db->select('*');
                            $this->db->where('id_dak_alokasi', $_POST['idalokasi']);
                            $query = $this->db->get('v_rincian');
                            $num = $query->num_rows();
                            if ($num > 0) {
                        ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped" id="example">
                                        <thead class="thead-themed">
                                            <tr>
                                                <th>Kegiatan</th>
                                                <th>Rincian</th>
                                                <th>Lokasi</th>
                                                <th>
                                                    Nilai Alokasi
                                                    <small class="d-block fs-sm text-muted">
                                                        (Rupiah)
                                                    </small>
                                                </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                                foreach ($query->result() as $dt) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $dt->nama_menu_kegiatan ?></td>
                                                    <td><?php if (!empty($dt->id_dak_rincian)) {
                                                            echo $dt->nama_dak_rincian;
                                                        } else {
                                                            echo $dt->nama_alkes;
                                                        } ?></td>
                                                    <td><?php echo $dt->nama_rs_instalasi  ?></td>
                                                    <?php if (!empty($dt->total)) : ?>
                                                        <td><?php echo angka($dt->total) ?></td>
                                                        <td style="text-align:center" width="200px">
                                                            <?php
                                                            echo anchor(site_url('T_realisasi/realisasi/' . $dt->id_rincian), '<i class="fal fa-eye" aria-hidden="true"></i> Input Realisasi', 'class="btn btn-success btn-sm waves-effect waves-themed"');
                                                            ?>
                                                        </td>
                                                    <?php else : ?>
                                                        <td></td>
                                                        <td>Rincian Kegitan Belum diisi.</td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                        <?php
                            }
                        } else {
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>
<script type="text/javascript">
    $("#tahun").change(function() {

        // variabel dari nilai combo box kendaraan
        var tahun = $("#tahun").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/t_realisasi/get_alokasi",
            method: "POST",
            data: {
                tahun: tahun
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_dak_alokasi + '>' + data[i].nama_dak_sub_bidang + '</option>';
                }
                $('#idalokasi').html(html);

            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 0
            }],
            order: [
                [0, 'asc']
            ],
            rowGroup: {
                dataSrc: 0
            }
        });
    });
</script>