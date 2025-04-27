<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Table Laporan</h4>
                                    <span>This page is for managing "Laporan".</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Laporan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" width="100%" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Laporan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>Laporan Donatur</td>
                                                    <td style="text-align: center;">
                                                        <a target="_blank" class="btn btn-mini  btn-success" href="<?= base_url('donatur/report'); ?>"><i class="feather icon-printer"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>2.</td>
                                                    <td>Laporan Pengurus</td>
                                                    <td style="text-align: center;">
                                                        <a target="_blank" class="btn btn-mini  btn-success" href="<?= base_url('pengurus/report'); ?>"><i class="feather icon-printer"></i></a>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>3.</td>
                                                    <td>Laporan Anak</td>
                                                    <td style="text-align: center;">
                                                        <a target="_blank" class="btn btn-mini  btn-success" href="<?= base_url('anak/report'); ?>"><i class="feather icon-printer"></i></a>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>Laporan Uang Masuk</td>
                                                    <td style="text-align: center;">
                                                        <button class="btn btn-mini btn-success" data-toggle="modal" data-target="#printUangMasuk"><i class="feather icon-printer"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5.</td>
                                                    <td>Laporan Uang Masuk Pertahun</td>
                                                    <td style="text-align: center;">
                                                        <button class="btn btn-mini btn-success" data-toggle="modal" data-target="#printUangMasukTahun"><i class="feather icon-printer"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6.</td>
                                                    <td>Laporan Uang Keluar</td>
                                                    <td style="text-align: center;">
                                                        <button class="btn btn-mini btn-success" data-toggle="modal" data-target="#printUangKeluar"><i class="feather icon-printer"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7.</td>
                                                    <td>Laporan Uang Keluar Tahun</td>
                                                    <td style="text-align: center;">
                                                        <button class="btn btn-mini btn-success" data-toggle="modal" data-target="#printUangKeluarTahun"><i class="feather icon-printer"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8.</td>
                                                    <td>Laporan Uang Kas</td>
                                                    <td style="text-align: center;">
                                                        <button class="btn btn-mini btn-success" data-toggle="modal" data-target="#printUangKas">
                                                            <i class="feather icon-printer"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Print Uang Masuk Tahun -->
<div class="modal fade" id="printUangMasukTahun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="myModalLabel">Filter data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tahun</label>
                            <select name="tanggalawalmasuk" id="tanggalawalmasuk" class="form-control tanggalawalmasuk" required>
                                <option value="">-Pilih Tahun-</option>
                                <?php
                                $now = date('Y');
                                for ($a = 2020; $a <= $now; $a++) { ?>
                                    <option value="<?= $a ?>"><?= $a ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-inverse btn-sm" onclick="cetakUangMasukTahun()">Print</button>
            </div>
        </div>
    </div>
</div>

<!-- Print Uang Keluar Tahun -->
<div class="modal fade" id="printUangKeluarTahun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="myModalLabel">Filter data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tahun</label>
                            <select name="tanggalawalkeluar" id="tanggalawalkeluar" class="form-control tanggalawalkeluar" required>
                                <option value="">-Pilih Tahun-</option>
                                <?php
                                $now = date('Y');
                                for ($a = 2020; $a <= $now; $a++) { ?>
                                    <option value="<?= $a ?>"><?= $a ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-inverse btn-sm" onclick="cetakUangKeluarTahun()">Print</button>
            </div>
        </div>
    </div>
</div>


<!-- Print Uang Masuk -->
<div class="modal fade" id="printUangMasuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="myModalLabel">Filter data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="<?= base_url('LaporanController/uangmasuk') ?>" target="_blank">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" class="form-control tanggalawalmasuk" id="tanggalawalmasuk" name="tanggalawalmasuk" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" class="form-control tanggalakhirmasuk" id="tanggalakhirmasuk" name="tanggalakhirmasuk" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-inverse btn-sm">Print</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Print Uang Keluar -->
<div class="modal fade" id="printUangKeluar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="myModalLabel">Filter data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="<?= base_url('LaporanController/uangkeluar') ?>" target="_blank">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" class="form-control tanggalawalkeluar" id="tanggalawalkeluar" name="tanggalawalkeluar" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" class="form-control tanggalakhirkeluar" id="tanggalakhirkeluar" name="tanggalakhirkeluar" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-inverse btn-sm">Print</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Print Agenda -->
<div class="modal fade" id="printKegiatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="myModalLabel">Filter data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" class="form-control tanggalawalmasuk" id="tanggalawalmasuk" name="tanggalawalmasuk" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" class="form-control tanggalakhirmasuk" id="tanggalakhirmasuk" name="tanggalakhirmasuk" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-inverse btn-sm" onclick="cetakKegiatan()">Print</button>
            </div>
        </div>
    </div>
</div>

<!-- Print Uang Kas -->
<div class="modal fade" id="printUangKas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="myModalLabel">Filter data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" class="form-control tanggalawalkeluar" id="tanggalawalkeluar" name="tanggalawalkeluar" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" class="form-control tanggalakhirkeluar" id="tanggalakhirkeluar" name="tanggalakhirkeluar" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-inverse btn-sm" onclick="cetakUangkas()">Print</button>
            </div>
        </div>
    </div>
</div>

<script>
    function cetakUangMasukTahun() {
        let tanggalawalmasuk = $('.tanggalawalmasuk').val()
        window.open("<?= base_url() ?>laporan/uang-masuk-tahun/" + tanggalawalmasuk, "_blank");
    }

    function cetakUangMasuk() {
        let tanggalawalmasuk = $('.tanggalawalmasuk').val()
        let tanggalakhirmasuk = $('.tanggalakhirmasuk').val()

        if (tanggalawalmasuk.length == 0) {
            window.open("<?= base_url() ?>laporan/uang-masuk-periode", "_blank");
        } else if (tanggalakhirkeluar.length == 0) {
            window.open("<?= base_url() ?>laporan/uang-masuk-periode", "_blank");
        } else {
            window.open("<?= base_url() ?>laporan/uang-masuk-periode/" + tanggalawalmasuk + "/" + tanggalakhirmasuk, "_blank");
        }
    }

    function cetakUangKeluarTahun() {
        let tanggalawalkeluar = $('.tanggalawalkeluar').val()

        if (tanggalawalkeluar.length == 0) {
            window.open("<?= base_url() ?>laporan/uang-keluar-tahun", "_blank");
        } else if (tanggalakhirkeluar.length == 0) {
            window.open("<?= base_url() ?>laporan/uang-keluar-tahun", "_blank");
        } else {
            window.open("<?= base_url() ?>laporan/uang-keluar-tahun/" + tanggalawalkeluar, "_blank");
        }
    }

    function cetakUangKeluar() {
        let tanggalawalkeluar = $('.tanggalawalkeluar').val()
        let tanggalakhirkeluar = $('.tanggalakhirkeluar').val()

        if (tanggalawalkeluar.length == 0) {
            window.open("<?= base_url() ?>laporan/uang-keluar", "_blank");
        } else if (tanggalakhirkeluar.length == 0) {
            window.open("<?= base_url() ?>laporan/uang-keluar", "_blank");
        } else {
            window.open("<?= base_url() ?>laporan/uang-keluar/" + tanggalawalkeluar + "/" + tanggalakhirkeluar, "_blank");
        }
    }

    function cetakKegiatan() {
        let tanggalawalmasuk = $('.tanggalawalmasuk').val()
        let tanggalakhirmasuk = $('.tanggalakhirmasuk').val()

        if (tanggalawalmasuk.length == 0) {
            window.open("<?= base_url() ?>/laporan/kegiatan", "_blank");
        } else if (tanggalakhirmasuk.length == 0) {
            window.open("<?= base_url() ?>/laporan/kegiatan", "_blank");
        } else {
            window.open("<?= base_url() ?>/laporan/kegiatan" + tanggalawalmasuk + "/" + tanggalakhirmasuk, "_blank");
        }
    }

    function cetakUangkas() {
        let tanggalawalmasuk = $('.tanggalawalmasuk').val()
        let tanggalakhirmasuk = $('.tanggalakhirmasuk').val()

        if (tanggalawalmasuk.length == 0) {
            window.open("<?= base_url() ?>kas/report", "_blank");
        } else if (tanggalakhirmasuk.length == 0) {
            window.open("<?= base_url() ?>kas/report", "_blank");
        } else {
            window.open("<?= base_url() ?>kas/report/" + tanggalawalmasuk + "/" + tanggalakhirmasuk, "_blank");
        }
    }

    function cetakAktif() {
        window.open("<?= base_url() ?>/anggota/aktif", "_blank");
        window.open("<?= base_url() ?>/anggota/aktif", "_blank");
    }
</script>

<?= $this->endSection(); ?>