<main id="js-page-content" role="main" class="page-content">
<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                        <h2>REKAP DATA REALISASI ANGGARAN COVID</h2>
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
            
                </div>
                </div>
            </div>
        </div>
                <div class="panel-container show">
                    <div class="panel-content">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="tblExport">
                            <thead class="thead-themed">
                            <tr>
                                <th>No</th>
                        		<th>Satker</th>
                        		<th>Kegiatan</th>
                                <th>Output</th>
                                <th>Akun Belanja</th>
                        		<th>Volume</th>
                        		<th>Alokasi Awal</th>
                        		<th>Alokasi Akhir</th>
                        		<th>Realisasi Pengadaan (sudah ttd kontrak) (Rp)</th>
                                <th>Realisasi (% berdasarkan ttd Kontrak)</th>
                                <th>REALISASI Pembayaran (SP2D) (Rp)</th>
                                <th>Realisasi (% berdasarkan SP2D) </th>
                                <th>Sisa Anggaran</th>
                                <th>Rencana Penarikan Dana (Rp)</th>
                                <th>Rencana Penarikan Dana (Rp) (s/d 31 des  Rp) </th>
                                <th>Permasalahan</th>
                                <th>Rencana Tindak Lanjut</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $key => $value) {
                                  $x = explode('#$#', $value['keterangan_masalah']);
                                ?>
                                <tr>
                                    <td><?php echo ($key+1) ?></td>
                                    <td><?php echo $value['nama']; ?></td>
                                    <td><?php echo ''.$value['nama_kegiatan'].'<br>'; ?></td>
                                    <td><?php echo $value['nama_sub_kegiatan'] ?></td>
                                    <td><?php echo $value['nama_output'] ?></td>
                                    <td></td>
                                    <td><?php echo angka($value['alokasi'],2); ?></td>
                                    <td><?php echo angka($value['alokasi_akhir'],2); ?></td>
                                    <td><?php echo angka($value['r_kontrak'],2); ?></td>
                                    <td><?php echo (!empty($value['r_kontrak'])) ? angka(($value['r_kontrak'] / $value['alokasi_akhir']) * 100,2) : 0; ?></td>
                                    <td><?php echo angka($value['r_pembayaran'],2); ?></td>
                                    <td><?php echo (!empty($value['r_pembayaran'])) ? angka(($value['r_pembayaran'] / $value['alokasi_akhir']) * 100,2) : 0;; ?></td>
                                    <td><?php echo (!empty($value['r_pembayaran'])) ? angka(($value['alokasi_akhir'] - $value['r_pembayaran']),2) : 0; ?></td>
                                    <td><?php echo (!empty($x[0])) ? angka($x[0],2) : 0 ?></td>
                                    <td><?php echo (!empty($x[1])) ? angka($x[1],2) : 0 ?></td>
                                    <td><?php echo (!empty($x[2])) ? $x[2] : 0; ?></td>
                                    <td><?php echo (!empty($x[3])) ? $x[3] : 0; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
            
            </table>
                <button class="btn btn-info btn-xs waves-effect waves-themed" id="btnExport" >Excel</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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