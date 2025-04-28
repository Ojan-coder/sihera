<?php
$request = \Config\Services::request();
$uri = $request->getUri();
$id = $uri->getSegment(1) ?? '';
// dd($id);
?>
<!-- /**
* 1 = Ketua
* 2 = Sekretaris
* 3 = Bendahara
* 4 = Donatur
*/ -->
<ul class="pcoded-item pcoded-left-item">
    <li class="<?= ($id == 'Home') ? 'active' : '' ?>">
        <a href="<?= base_url('/Home'); ?>">
            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
            <span class="pcoded-mtext">Dashboard</span>
        </a>
    </li>
    <?php if (session()->get('userLevel') != 3) { ?>
        <li class="pcoded-hasmenu <?= ($id == 'jadwal' | $id == 'patient' | $id == 'docter' | $id == 'edukasi') ? 'active' : '' ?> pcoded-trigger">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                <span class="pcoded-mtext">Master</span>
            </a>
            <?php if (session()->get('userLevel') != 3) { ?>
                <!-- Menu Master -->
                <ul class="pcoded-submenu">
                    <li class="<?= ($id == 'jadwal') ? 'active' : '' ?>">
                        <a href="<?= base_url('/jadwal'); ?>">
                            <span class="pcoded-mtext">Jadwal Hemodialisa</span>
                        </a>
                    </li>
                    <li class="<?= ($id == 'patient') ? 'active' : '' ?>">
                        <a href="<?= base_url('/patient'); ?>">
                            <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                            <span class="pcoded-mtext">Pasien</span>
                        </a>
                    </li>
                    <li class="<?= ($id == 'docter') ? 'active' : '' ?>">
                        <a href="<?= base_url('/docter'); ?>">
                            <span class="pcoded-micon"><i class="feather icon-doctor"></i></span>
                            <span class="pcoded-mtext">Dokter</span>
                        </a>
                    </li>
                    <li class="<?= ($id == 'edukasi') ? 'active' : '' ?>">
                        <a href="<?= base_url('/edukasi'); ?>">
                            <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
                            <span class="pcoded-mtext">Edukasi</span>
                        </a>
                    </li>
                </ul>
        <li class="<?= ($id == 'konsultasi') ? 'active' : '' ?>">
            <a href="<?= base_url('/konsultasi'); ?>">
                <span class="pcoded-micon"><i class="feather icon-activity"></i></span>
                <span class="pcoded-mtext">Konsultasi</span>
            </a>
        </li>
        <li class="<?= ($id == 'aktifitas') ? 'active' : '' ?>">
            <a href="<?= base_url('/aktifitas'); ?>">
                <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                <span class="pcoded-mtext">Aktifitas Fisik</span>
            </a>
        </li>
        <li class="<?= ($id == 'bb') ? 'active' : '' ?>">
            <a href="<?= base_url('/bb'); ?>">
                <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                <span class="pcoded-mtext">Catatan Berat Badan</span>
            </a>
        </li>
        <li class="<?= ($id == 'diet') ? 'active' : '' ?>">
            <a href="<?= base_url('/diet'); ?>">
                <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                <span class="pcoded-mtext">Catatan Diet</span>
            </a>
        </li>
        <li class="<?= ($id == 'urine') ? 'active' : '' ?>">
            <a href="<?= base_url('/coment'); ?>">
                <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                <span class="pcoded-mtext">Catatan Urine</span>
            </a>
        </li>
        <li class="<?= ($id == 'cairan') ? 'active' : '' ?>">
            <a href="<?= base_url('/coment'); ?>">
                <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                <span class="pcoded-mtext">Pembatasan Cairan</span>
            </a>
        </li>
    <?php } ?>
    </li>
<?php } else { ?>
    <li class="<?= ($id == 'jadwal') ? 'active' : '' ?>">
        <a href="<?= base_url('/jadwal') ?>">
            <span class="pcoded-micon"><i class="feather icon-bell"></i></span>
            <span class="pcoded-mtext">Jadwal Hemodialisa</span>
        </a>
    </li>
    <li class="<?= ($id == 'konsultasi') ? 'active' : '' ?>">
        <a href="<?= base_url('/konsultasi'); ?>">
            <span class="pcoded-micon"><i class="feather icon-activity"></i></span>
            <span class="pcoded-mtext">Konsultasi</span>
        </a>
    </li>
    <li class="<?= ($id == 'aktifitas') ? 'active' : '' ?>">
        <a href="<?= base_url('/aktifitas'); ?>">
            <span class="pcoded-micon"><i class="feather icon-book"></i></span>
            <span class="pcoded-mtext">Aktifitas Fisik</span>
        </a>
    </li>
    <li class="<?= ($id == 'bb') ? 'active' : '' ?>">
        <a href="<?= base_url('/bb'); ?>">
            <span class="pcoded-micon"><i class="feather icon-book"></i></span>
            <span class="pcoded-mtext">Catatan Berat Badan</span>
        </a>
    </li>
    <li class="<?= ($id == 'diet') ? 'active' : '' ?>">
        <a href="<?= base_url('/diet'); ?>">
            <span class="pcoded-micon"><i class="feather icon-book"></i></span>
            <span class="pcoded-mtext">Catatan Diet</span>
        </a>
    </li>
    <li class="<?= ($id == 'urine') ? 'active' : '' ?>">
        <a href="<?= base_url('/coment'); ?>">
            <span class="pcoded-micon"><i class="feather icon-book"></i></span>
            <span class="pcoded-mtext">Catatan Urine</span>
        </a>
    </li>
    <li class="<?= ($id == 'cairan') ? 'active' : '' ?>">
        <a href="<?= base_url('/coment'); ?>">
            <span class="pcoded-micon"><i class="feather icon-book"></i></span>
            <span class="pcoded-mtext">Pembatasan Cairan</span>
        </a>
    </li>
    <li class="<?= ($id == 'profile') ? 'active' : '' ?>">
        <a href="#">
            <span class="pcoded-micon"><i class="feather icon-user"></i></span>
            <span class="pcoded-mtext">Profile</span>
        </a>
    </li>
<?php } ?>
</ul>