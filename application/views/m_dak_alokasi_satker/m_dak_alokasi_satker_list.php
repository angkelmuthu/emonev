<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA DAK ALOKASI</h2>
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
                                <?php echo anchor(site_url('m_dak_alokasi_satker/excel'), '<i class="fal fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-outline-success btn-sm waves-effect waves-themed"'); ?></div>
                            <div class="col-md-6">
                                <form action="<?php echo site_url('m_dak_alokasi_satker/index'); ?>" method="get">
                                    <div class="input-group">
                                        <div class="input-group">
                                            <?php
                                            if ($q <> '') {
                                                ?>
                                                <div class="input-group-prepend">
                                                    <a href="<?php echo site_url('m_dak_alokasi_satker'); ?>" class="btn btn-danger waves-effect waves-themed">Reset</a>
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
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Sub Bidang</th>
                                        <th rowspan="2">Dak Kelompok</th>
                                        <th rowspan="2">Satker</th>
                                        <th rowspan="2">Tahun</th>
                                        <th rowspan="2">
                                            Nilai Anggaran
                                            <small class="d-block fs-sm text-muted">
                                                (Rupiah)
                                            </small>
                                        </th>
                                        <th colspan="2">Alokasi</th>
                                        <th colspan="2">Realisasi</th>
                                        <th rowspan="2">Action</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nilai
                                            <small class="d-block fs-sm text-muted">
                                                (Rupiah)
                                            </small>
                                        </th>
                                        <th>
                                            Persentase
                                            <small class="d-block fs-sm text-muted">
                                                (%)
                                            </small>
                                        </th>
                                        <th>
                                            Nilai
                                            <small class="d-block fs-sm text-muted">
                                                (Rupiah)
                                            </small>
                                        </th>
                                        <th>
                                            Persentase
                                            <small class="d-block fs-sm text-muted">
                                                (%)
                                            </small>
                                        </th>
                                        <!-- <th>Updated By</th>
                                        <th>Updated Date</th> -->

                                    </tr>
                                </thead>
                                <tbody><?php
                                        //print_r($this->db->last_query());
                                        foreach ($m_dak_alokasi_data as $m_dak_alokasi) {
                                            ?>
                                        <tr>
                                            <td width="10px"><?php echo ++$start ?></td>
                                            <td><?php echo $m_dak_alokasi->nama_dak_sub_bidang ?></td>
                                            <td><?php echo $m_dak_alokasi->dak_kelompok ?></td>
                                            <td><?php echo $m_dak_alokasi->satker ?></td>
                                            <td><?php echo $m_dak_alokasi->tahun ?></td>
                                            <td>Rp. <?php echo angka($m_dak_alokasi->nilai_alokasi) ?></td>
                                            <td>Rp. <?php echo angka($m_dak_alokasi->ttl_rincian) ?></td>
                                            <td><?php if ($m_dak_alokasi->ttl_rincian > 0) {
                                                        echo round($m_dak_alokasi->ttl_rincian / $m_dak_alokasi->nilai_alokasi * 100, 2);
                                                    } else {
                                                        echo '0';
                                                    } ?> %</td>
                                            <td>Rp. <?php echo angka($m_dak_alokasi->ttl_realisasi) ?></td>
                                            <td><?php if ($m_dak_alokasi->ttl_rincian > 0) {
                                                        echo round($m_dak_alokasi->ttl_realisasi / $m_dak_alokasi->nilai_alokasi * 100, 2);
                                                    } else {
                                                        echo '0';
                                                    } ?> %</td>
                                            <!-- <td><?php echo $m_dak_alokasi->updated_by ?></td>
                                            <td><?php echo $m_dak_alokasi->updated_date ?></td> -->
                                            <td style="text-align:center" width="200px">
                                                <?php
                                                    echo anchor(site_url('t_dak_rincian/rincian/' . $m_dak_alokasi->id_dak_alokasi), '<i class="fal fa-eye" aria-hidden="true"></i> Rincian Alokasi', 'class="btn btn-info btn-sm waves-effect waves-themed"');
                                                    ?>
                                                <button type="button" class="btn btn-sm btn-warning waves-effect waves-themed" data-toggle="modal" data-target="#modal-petugas">Upload BA Bersih</button>
                                                <div class="modal fade" id="modal-petugas" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">
                                                                    Upload File DAK RKA Berita Acara Bersih
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                                </button>
                                                            </div>

                                                            <?php
                                                                $this->db->where('id_satker', $m_dak_alokasi->id_satker);
                                                                $this->db->where('id_dak_sub_bidang', $m_dak_alokasi->id_dak_sub_bidang);
                                                                $this->db->where('tahun', $m_dak_alokasi->tahun);
                                                                $query = $this->db->get('t_upload_ba');
                                                                //$num = $query->num_rows();
                                                                if ($query->num_rows() > 0) { ?>

                                                                <div class="modal-body">
                                                                    <div class="alert alert-warning" role="alert">
                                                                        <strong>Perhatian!</strong> File yang dapat diupload maksimal 1 sub bidang 1 file, jika ingin mengganti file,silahkan hapus dahulu file yang lama.
                                                                    </div>
                                                                    <table>
                                                                        <tr>
                                                                            <td>Nama File</td>
                                                                            <td>Lihat</td>
                                                                            <td>Hapus</td>
                                                                        </tr>

                                                                        <?php foreach ($query->result() as $row) {
                                                                                    echo '<tr><td>' . $row->file_ba . '</td><td><a href="' . base_url() . 'upload_ba/' . $row->file_ba . '" class="btn btn-xs btn-primary" target="_blank">lihat</a></td><td><a href="' . base_url() . 'm_dak_alokasi_satker/delete_file/' . $row->id_file . '/' . $row->file_ba . '" class="btn btn-xs btn-danger">hapus</a></td></tr>';
                                                                                } ?>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>

                                                            <?php } else { ?>
                                                                <form action="<?php echo base_url(); ?>m_dak_alokasi_satker/upload" method="post" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <div class="alert alert-warning" role="alert">
                                                                            <strong>Perhatian!</strong> Besar file yang dapat diupload maksimal 1MB dengan extensi PDF/JPG/PNG.
                                                                        </div>
                                                                        <input type="hidden" name="tahun" value="<?php echo $m_dak_alokasi->tahun ?>">
                                                                        <input type="hidden" name="id_dak_sub_bidang" value="<?php echo $m_dak_alokasi->id_dak_sub_bidang ?>">
                                                                        <input type="hidden" name="id_satker" value="<?php echo $m_dak_alokasi->id_satker ?>">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="example-fileinput">Upload File</label>
                                                                            <input type="file" id="example-fileinput" class="form-control-file" name="gambar">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                                    </div>
                                                                </form>
                                                            <?php } ?>



                                                        </div>
                                                    </div>
                                                </div>
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