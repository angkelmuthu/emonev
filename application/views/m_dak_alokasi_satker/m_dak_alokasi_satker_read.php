<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        DAK KOMPONEN KEGIATAN <span class="fw-300"><i>(<?php echo $satker; ?>)</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table">
                            <tr>
                                <td>Sub Bidang</td>
                                <td><b><?php echo $nama_dak_sub_bidang; ?></b></td>
                                <td>Dak Kelompok</td>
                                <td><b><?php echo $dak_kelompok; ?></b></td>
                            </tr>
                            <tr>
                                <td>Tahun Anggaran</td>
                                <td><b><?php echo $tahun; ?></b></td>
                                <td>Nilai Alokasi</td>
                                <td><b>Rp. <?php echo angka($nilai_alokasi); ?></b></td>
                            </tr>
                        </table>
                        <!-- datatable end -->
                        <table class="table table-bordered m-0">
                            <thead>
                                <tr class="bg-warning-400">
                                    <th width="60%" class="border-top-0">Komponen</th>
                                    <th width="15%">
                                        Pagu Alokasi
                                        <small class="d-block fs-sm text-muted">
                                            (Rupiah)
                                        </small>
                                    </th>
                                    <th width="15%">
                                        Total Alokasi
                                        <small class="d-block fs-sm text-muted">
                                            (Rupiah)
                                        </small>
                                    </th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-success-100">
                                    <td><b><?php echo $dak_kelompok; ?></b></td>
                                    <th class="text-right">
                                        <h5><b><?php echo angka($nilai_alokasi); ?></b></h5>
                                    </th>
                                    <?php
                                    $this->db->select('SUM(total) AS gtotal');
                                    $this->db->from('v_rincian');
                                    $this->db->where('id_dak_alokasi', $this->uri->segment(3));
                                    $dakttl = $this->db->get()->result();
                                    foreach ($dakttl as $dtdakttl) { ?>
                                        <th class="text-right">
                                            <h5><b><?php echo angka($dtdakttl->gtotal); ?></b></h5>
                                        </th>
                                    <?php } ?>
                                    <td></td>
                                </tr>
                                <?php
                                $this->db->select('a.id_dak_komponen, a.nama_dak_komponen, SUM(c.total) AS gtotal');
                                $this->db->from('m_dak_komponen a');
                                $this->db->join('m_dak_komponen_sub b', 'a.id_dak_komponen=b.id_dak_komponen', 'LEFT');
                                $this->db->join('v_rincian c', 'b.id_dak_komponen_sub=c.id_dak_komponen_sub and c.id_dak_alokasi=' . $this->uri->segment(3) . '', 'LEFT');
                                $this->db->where('a.id_dak_sub_bidang', $this->uri->segment(4));
                                $this->db->group_by('a.id_dak_komponen');
                                $komponen = $this->db->get()->result();
                                foreach ($komponen as $dtkomponen) { ?>
                                    <tr>
                                        <th style="text-transform: uppercase;"><i class="fal fa-angle-right"></i> <?php echo $dtkomponen->nama_dak_komponen ?></th>
                                        <td></td>
                                        <?php if (!empty($dtkomponen->gtotal)) { ?>
                                            <th class="text-right">
                                                <h5><b><?php echo angka($dtkomponen->gtotal) ?></b></h5>
                                            </th>
                                        <?php } else {
                                            echo '<td></td>';
                                        } ?>
                                        <td></td>
                                    </tr>
                                    <?php
                                    $this->db->select('a.id_dak_komponen_sub,a.nama_dak_komponen_sub,sum(b.total) AS gtotal ');
                                    $this->db->from('m_dak_komponen_sub a');
                                    $this->db->join('v_rincian b', 'a.id_dak_komponen_sub=b.id_dak_komponen_sub and b.id_dak_alokasi=' . $this->uri->segment(3) . '', 'LEFT');
                                    $this->db->where('a.id_dak_komponen', $dtkomponen->id_dak_komponen);
                                    //$this->db->where('b.id_dak_alokasi', $this->uri->segment(3));
                                    $this->db->group_by('a.id_dak_komponen_sub');
                                    $komponensub = $this->db->get()->result();
                                    foreach ($komponensub as $dtkomponensub) { ?>
                                        <tr>
                                            <td>
                                                <li style="margin-left: 15px;"><?php echo $dtkomponensub->nama_dak_komponen_sub ?></li>
                                            </td>
                                            <td></td>
                                            <?php if (!empty($dtkomponensub->gtotal)) { ?>
                                                <th class="text-right">
                                                    <h5><?php echo angka($dtkomponensub->gtotal) ?></h5>
                                                </th>
                                            <?php } else {
                                                echo '<td></td>';
                                            } ?>
                                            <td class="text-center"><a href="<?php echo base_url() . 't_dak_menu_kegiatan/list/' . $dtkomponensub->id_dak_komponen_sub . '/' . $id_dak_alokasi . '/' . $this->uri->segment(4) ?>" class="btn btn-xs btn-success"><i class="fal fa-eye"></i> Kegiatan</a></td>
                                        </tr>
                                <?php
                                    }
                                }
                                //echo $this->db->last_query();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<!-- <script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script> -->