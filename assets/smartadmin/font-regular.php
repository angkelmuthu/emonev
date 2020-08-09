<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="http://localhost/smartrs/assets/smartadmin/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">SmartRS WebApp</span>
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
            <img src="http://localhost/smartrs/assets/foto_profil/atomix_user31.png" class="profile-image rounded-circle" alt="Super Admin">
            <div class="info-card-text">
                <a href="#" class="d-flex align-items-center text-white">
                    <span class="text-truncate text-truncate-sm d-inline-block">
                        Super Admin </span>
                </a>
                <span class="d-inline-block text-truncate text-truncate-sm">superadmin@gmail.com</span>
            </div>
            <img src="http://localhost/smartrs/assets/smartadmin/img/card-backgrounds/cover-2-lg.png" class="cover" alt="cover">
            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fal fa-angle-down"></i>
            </a>
        </div>
        <ul id="js-nav-menu" class="nav-menu">
            <li>
                <a href="M_Pasien_dt" title="MASTER PASIEN DATATABLES" data-filter-tags="MASTER PASIEN DATATABLES">
                    <i class="fal fa-users"></i>
                    <span class="nav-link-text" data-i18n="nav.M_PASIEN_DT">MASTER PASIEN DATATABLES</span></a>
            </li>
            <li>
                <a href="M_Pasien_rt" title="MASTER PASIEN REGULAR TABLE" data-filter-tags="MASTER PASIEN REGULAR TABLE">
                    <i class="fal fa-users"></i>
                    <span class="nav-link-text" data-i18n="nav.M_PASIEN_RT">MASTER PASIEN REGULAR TABLE</span></a>
            </li>
            <li>
                <a href="m_pasien" title="M_PASIEN" data-filter-tags="M_PASIEN">
                    <i class="fal fa-user-circle"></i>
                    <span class="nav-link-text" data-i18n="nav.M_PASIEN">M_PASIEN</span></a>
            </li>
            <li>
                <a href="#" title="SETTING" data-filter-tags="SETTING">
                    <i class="fal fa-cogs"></i>
                    <span class="nav-link-text" data-i18n="nav.#">SETTING</span>
                </a>
                <ul>
                    <li>
                        <a href="kelolamenu" title="KELOLA MENU" data-filter-tags="KELOLA MENU">
                            <i class="fal fa-server"></i>
                            <span class="nav-link-text" data-i18n="nav.kelolamenu">KELOLA MENU</span>
                        </a>
                    </li>
                    <li>
                        <a href="user" title="KELOLA PENGGUNA" data-filter-tags="KELOLA PENGGUNA">
                            <i class="fal fa-users"></i>
                            <span class="nav-link-text" data-i18n="nav.user">KELOLA PENGGUNA</span>
                        </a>
                    </li>
                    <li>
                        <a href="userlevel" title="LEVEL PENGGUNA" data-filter-tags="LEVEL PENGGUNA">
                            <i class="fal fa-users"></i>
                            <span class="nav-link-text" data-i18n="nav.userlevel">LEVEL PENGGUNA</span>
                        </a>
                    </li>
                    <li>
                        <a href="welcome/form" title="CONTOH FORM" data-filter-tags="CONTOH FORM">
                            <i class="fal fa-id-card"></i>
                            <span class="nav-link-text" data-i18n="nav.welcome/form">CONTOH FORM</span>
                        </a>
                    </li>
                    <li>
                        <a href="Crudgen" title="CRUD GEN" data-filter-tags="CRUD GEN">
                            <i class="fal fa-users"></i>
                            <span class="nav-link-text" data-i18n="nav.Crudgen">CRUD GEN</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>
    <!-- END PRIMARY NAVIGATION -->
    <!-- NAV FOOTER -->
    <div class="nav-footer shadow-top">
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
    </div> <!-- END NAV FOOTER -->
</aside> <!-- END Left Aside -->