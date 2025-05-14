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
                        <?php if (session()->get('userLevel') == 3): ?>
                            <div class="col-sm-6 mb-2">
                                <div class="card">
                                    <button class="btn btn-outline-success" onclick="location.href=('<?= base_url('aktifitas') ?>')">
                                        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/ski--v3.png" alt="ski--v3" />
                                        <span>Catatan Aktivitas</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="card">
                                    <button class="btn btn-outline-success" onclick="location.href=('<?= base_url('bb') ?>')">
                                        <img width="30" height="30" src="https://img.icons8.com/ios/50/scales--v1.png" alt="scales--v1" />
                                        <span>Catatan Berat Badan</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="card">
                                    <button class="btn btn-outline-primary" onclick="location.href=('<?= base_url('urine') ?>')">
                                        <img width="30" height="30" src="https://img.icons8.com/external-tanah-basah-basic-outline-tanah-basah/24/external-urine-healthcare-tanah-basah-basic-outline-tanah-basah.png" alt="external-urine-healthcare-tanah-basah-basic-outline-tanah-basah" />
                                        <span>Catatan Urine</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="card">
                                    <button class="btn btn-outline-primary" onclick="location.href=('<?= base_url('diet') ?>')">
                                        <img width="30" height="30" src="https://img.icons8.com/ios/50/healthy-eating.png" alt="healthy-eating" />
                                        <span>Catatan Diet</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="card">
                                    <button class="btn btn-outline-primary" onclick="location.href=('<?= base_url('diet') ?>')">
                                        <img width="30" height="30" src="https://img.icons8.com/ios/50/technical-fluid.png" alt="technical-fluid"/>
                                        <span>Catatan Asupan Cairan</span>
                                    </button>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($datajadwal)) { ?>
        <?php
        foreach ($datajadwal as $datajadwal) {
            $hari_ini = new DateTime(date('Y-m-d'));
            $jadwal = new DateTime($datajadwal['jadwal']);
            $selisih = (int)$hari_ini->diff($jadwal)->format('%r%a');
            if (session()->get('userLevel') == 3 && $selisih == 0) { ?>
                <script>
                    Swal.fire({
                        icon: 'info',
                        title: 'Jadwal Control Hari Ini',
                        html: "Hari : <?= date('d-m-Y', strtotime($datajadwal['jadwal'])) ?> <br> Waktu : <?= $datajadwal['waktu'] ?>",
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                </script>
            <?php } else if (session()->get('userLevel') == 3 && $selisih >= 0) { ?>
                <script>
                    Swal.fire({
                        icon: 'info',
                        title: 'Pengingat Jadwal',
                        html: "Hari : <?= date('d-m-Y', strtotime($datajadwal['jadwal'])) ?> <br> Waktu : <?= $datajadwal['waktu'] ?>",
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                </script>
        <?php }
        } ?>
    <?php } else {  ?>
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Jadwal Control Belum Tersedia',
                html: "Hari : - <br> Waktu : -",
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    <?php } ?>

    <?= $this->endSection(); ?>