<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        INPUT DATA MENU
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">



                        <form action="<?php echo $action; ?>" method="post">

                            <table class='table table-bordered>' <tr>
                                <td width='200'>Title <?php echo form_error('title') ?></td>
                                <td><input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Url <?php echo form_error('url') ?></td>
                                    <td><input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Icon <?php echo form_error('icon') ?></td>
                                    <td><input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" />
                                        <a href="<?php echo base_url() ?>assets/smartadmin/font-light.php" class="btn btn-success waves-effect waves-themed" target="_blank"> Font1</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Is Main Menu <?php echo form_error('is_main_menu') ?></td>
                                    <td> <select name="is_main_menu" class="form-control">
                                            <option value="0">MAIN MENU</option>
                                            <?php
                                            $menu = $this->db->get('tbl_menu')->result();
                                            foreach ($menu as $m) {
                                                echo "<option value='$m->id_menu' ";
                                                echo $m->id_menu == $is_main_menu ? 'selected' : '';
                                                echo ">" .  strtoupper($m->title) . "</option>";
                                            }
                                            ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td width='200'>Is Aktif <?php echo form_error('is_aktif') ?></td>
                                    <td><?php echo form_dropdown('is_aktif', array('y' => 'AKTIF', 'n' => 'TIDAK'), $is_aktif, array('class' => 'form-control')) ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" />
                                        <button type="submit" class="btn btn-info waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('kelolamenu') ?>" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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