<main id="js-page-content" role="main" class="page-content">
    <div class="h-alt-hf d-flex flex-column align-items-center justify-content-center text-center">
        <div class="alert alert-danger bg-white pt-4 pr-5 pb-3 pl-5" id="demo-alert">
            <img class="profile-image rounded-circle bg-danger-700 mr-1 p-1" src="<?php echo base_url() ?>assets/smartadmin/img/demo/gembok.png" alt="SmartAdmin WebApp Logo">
            <h1 class="fs-xxl fw-700 color-fusion-500 d-flex align-items-center justify-content-center m-0">
                <span class="color-danger-700">AKSES DITOLAK</span>
            </h1>
            <h3 class="fw-500 mb-0 mt-3">
                Anda tidak dapat mengakses halaman ini.
            </h3>
            <p class="container container-sm mb-0 mt-1">
                Untuk informasi lebih lanjut silahkan hubungin Installasi SIMRS.
            </p>
            <div class="mt-4">
                <a href="#" onclick="goBack()" class="btn btn-primary">
                    <span class="fw-700">KEMBALI</span>
                </a>
            </div>
        </div>
    </div>
</main>
<script>
    function goBack() {
        window.history.back();
    }
</script>