<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="<?php echo base_url() ?>assets/smartadmin/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">EMONEV</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="info-card">
            <!-- <img src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('images'); ?>" class="profile-image rounded-circle" alt="<?php echo $this->session->userdata('nama'); ?>"> -->
            <div class="info-card-text">
                <h5 class="d-flex align-items-center text-white">
                    <span class="d-inline-block">
                        <?php echo $this->session->userdata('nama_jenis_satker'); ?><br><?php echo $this->session->userdata('nama'); ?>
                    </span>
                </h5>
                <span class="d-inline-block text-truncate text-truncate-sm">Kode : <?php echo $this->session->userdata('kode_satker'); ?></span>
            </div>
            <img src="<?php echo base_url() ?>assets/smartadmin/img/card-backgrounds/cover-2-lg.png" class="cover" alt="cover">
            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fal fa-angle-down"></i>
            </a>
        </div>
        <ul id="js-nav-menu" class="nav-menu">
            <?php
            // chek settingan tampilan menu
            $setting = $this->db->get_where('tbl_setting', array('id_setting' => 1))->row_array();
            if ($setting['value'] == 'ya') {
                // cari level user
                $id_user_level = $this->session->userdata('id_user_level');
                $sql_menu = "SELECT *
            FROM tbl_menu
            WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu=0 and is_aktif='y' order by title ASC";
            } else {
                $sql_menu = "select * from tbl_menu where is_aktif='y' and is_main_menu=0 order by title ASC";
            }

            $main_menu = $this->db->query($sql_menu)->result();

            foreach ($main_menu as $menu) {
                // chek is have sub menu
                $this->db->where('is_main_menu', $menu->id_menu);
                $this->db->where('is_aktif', 'y');
                $this->db->ORDER_BY('title', 'asc');
                $submenu = $this->db->get('tbl_menu');
                // if ($submenu->num_rows() > 0) {
                //     // display sub menu
                //     echo '
                //             <li>
                //                 <a href="' . $menu->url . '" title="' . strtoupper($menu->title) . '" data-filter-tags="' . strtoupper($menu->title) . '">
                //                     <i class="' . $menu->icon . '"></i>
                //                     <span class="nav-link-text" data-i18n="nav.' . strtoupper($menu->url) . '">' . strtoupper($menu->title) . '</span>
                //                 </a>
                //                 <ul>';
                //     foreach ($submenu->result() as $sub) {
                //         echo '
                //                     <li>
                //                         <a href="' . $sub->url . '" title="' . strtoupper($sub->title) . '" data-filter-tags="' . strtoupper($sub->title) . '">
                //                             <i class="' . $sub->icon . '"></i>
                //                             <span class="nav-link-text" data-i18n="nav.' . $sub->url . '">' . strtoupper($sub->title) . '</span>
                //                         </a>
                //                     </li>';
                //     }
                //     echo '</ul>
                //     </li>';
                // } else {
                //     // display main menu
                //     echo '<li>
                //     <a href="' . $menu->url . '" title="' . strtoupper($menu->title) . '" data-filter-tags="' . strtoupper($menu->title) . '">
                //     <i class="' . $menu->icon . '"></i>
                //     <span class="nav-link-text" data-i18n="nav.' . strtoupper($menu->url) . '">' . strtoupper($menu->title) . '</span></a>
                //     </li>';
                // }
                if ($submenu->num_rows() > 0) {
                    // display sub menu
                    echo "<li>
                            <a href='#'>
                                <i class='$menu->icon'></i> <span class='nav-link-text' data-i18n='nav." . strtoupper($menu->url) . "'>" . strtoupper($menu->title) . "</span>
                            </a>
                            <ul>";
                    foreach ($submenu->result() as $sub) {
                        echo "<li>" . anchor($sub->url, "<i class='$sub->icon'></i><span class='nav-link-text' data-i18n='nav." . $sub->url . "'> " . strtoupper($sub->title)) . "</li>";
                    }
                    echo " </ul>
                        </li>";
                } else {
                    // display main menu
                    echo "<li>";
                    echo anchor($menu->url, "<i class='" . $menu->icon . "'></i><span class='nav-link-text' data-i18n='nav." . strtoupper($menu->url) . "'> " . strtoupper($menu->title));
                    echo "</li>";
                }
            }
            ?>

        </ul>
        <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>
    <!-- END PRIMARY NAVIGATION -->
    <!-- NAV FOOTER -->
    <!-- <div class="nav-footer shadow-top">
        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
            <i class="ni ni-chevron-right"></i>
            <i class="ni ni-chevron-right"></i>
        </a>
        <ul class="list-table m-auto nav-footer-buttons">
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                    <i class="fal fa-comments"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                    <i class="fal fa-life-ring"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                    <i class="fal fa-phone"></i>
                </a>
            </li>
        </ul>
    </div>  -->
    <!-- END NAV FOOTER -->
</aside>