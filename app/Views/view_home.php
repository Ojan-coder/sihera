<?= $this->extend('main'); ?>

<?= $this->section('content'); ?>

<div class="pcoded-content bg-white">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Home Page</h4>
                                    <span>This page is home page.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="/"> <i class="feather icon-home"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12 mb-5">
                            <?php
                            $days7 = date('Y-m-d', strtotime('+7 days'));
                            foreach ($datajadwal as $r) {
                                if ($r['idpasien'] != '') {
                            ?>
                                    <script>
                                        Swal.fire({
                                            icon: 'info',
                                            title: 'Jadwal Control',
                                            html: "Hari : <?= date('d-m-Y', strtotime($r['jadwal'])) ?> <br> Waktu : <?= $r['waktu'] ?>",
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK'
                                        });
                                    </script>
                                <?php } else { ?>
                                    <script>
                                        Swal.fire({
                                            icon: 'info',
                                            title: 'Jadwal Control',
                                            html: "Hari : - <br> Waktu : -",
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK'
                                        });
                                    </script>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>