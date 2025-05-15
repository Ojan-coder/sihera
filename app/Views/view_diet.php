<?= $this->extend('main'); ?>

<?= $this->section('content');
$level = session()->get('userLevel');
?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Data Catatan Diet</h4>
                                    <span>This page is for managing "Catatan Diet".</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="/"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Master</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Catatan Diet</a>
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
                                <div class="card-header">
                                    <div class="row justify-content-end">
                                        <div class="col-lg-12">
                                            <?php if (session()->getFlashdata('success')) { ?>
                                                <script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Berhasil',
                                                        text: "<?= session()->getFlashdata('success') ?>",
                                                        confirmButtonColor: '#3085d6',
                                                        confirmButtonText: 'OK'
                                                    });
                                                </script>
                                            <?php } else if (session()->getFlashdata('failed')) { ?>
                                                <script>
                                                    Swal.fire({
                                                        icon: 'failed',
                                                        title: 'Gagal',
                                                        text: "<?= session()->getFlashdata('failed') ?>",
                                                        confirmButtonColor: '#3085d6',
                                                        confirmButtonText: 'OK'
                                                    });
                                                </script>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php if ($level != 3) { ?>
                                        <button class="btn btn-mat btn-sm btn-inverse" data-toggle="modal" data-target="#myModal">Tambah Catatan Diet</button>
                                    <?php } else { ?>
                                        <button class="btn btn-mat btn-sm btn-inverse" data-toggle="modal" data-target="#myModalP">Input Rekap Porsi </button>
                                    <?php } ?>
                                    <!--<a class="btn btn-mat btn-sm btn-success" href="<?= base_url('galeri/report'); ?>" target="__blank">Laporan Komentar</a>-->
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" width="100%" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">No</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Tanggal</th>
                                                    <th>Program Diet</th>
                                                    <?php if ($level != 3) { ?>
                                                        <th>Aksi</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;
                                                foreach ($databb as $row) : $no++;

                                                ?>
                                                    <tr>
                                                        <td width="8%"><?= $no; ?></td>
                                                        <td> <?= $row['nama']; ?></td>
                                                        <td> <?= date('Y-m-d', strtotime($row['diettanggal']));  ?></td>
                                                        <td> <?= $row['dietprogram']; ?></td>
                                                        <?php if ($level != 3) { ?>
                                                            <td class="text-center">
                                                                <button class="btn btn-inverse btn-mini" data-toggle="modal" data-target="#editModal<?= $row['iddiet']; ?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="btn btn-danger btn-mini" data-toggle="modal" data-target="#deleteModal<?= $row['iddiet']; ?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php endforeach; ?>
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

<!-- Form Tambah Data Perawat -->

<form action="<?= base_url('diet/save'); ?>" enctype="multipart/form-data" method="post">
    <?= csrf_field(); ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="myModalLabel">Tambah Catatan Diet</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="basic-url">Nama Pasien</label>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="idpasien" id="idpasien">
                                    <input type="text" name="nama" id="nama" value="<?= old('nama') ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama" required />
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                                            <i class="feather icon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" value="<?= old('tanggal') ?>" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" placeholder="Masukan nik" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Diet Program</label>
                                <select name="cbprogram[]" multiple id="cbprogram" class="form-control">
                                    <option value="">-Pilih Program-</option>
                                    <?php foreach ($dataprogramdiet as $r) { ?>
                                        <option value="<?= $r['jenis_diet'] ?>"><?= $r['jenis_diet'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-inverse btn-sm">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Tambah Data Pasien -->
<?php if ($level == 3) : ?>
    <form action="<?= base_url('diet/savedetail'); ?>" enctype="multipart/form-data" method="post">
        <?= csrf_field(); ?>
        <div class="modal fade" id="myModalP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="myModalLabel">Tambah Catatan Diet</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basic-url">Nama Pasien</label>
                                    <div class="input-group mb-3">
                                        <input type="hidden" value="<?= session()->get('userNama') ?>" name="idpasien" id="idpasien">
                                        <input type="text" name="nama" id="nama" value="<?= session()->get('nama') ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama" required />

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" value="<?= old('tanggal') ?>" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" placeholder="Masukan nik" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Diet Waktu</label>
                                    <select name="cbwaktu" id="cbwaktu" class="form-control">
                                        <option value="">-Pilih Waktu-</option>
                                        <option value="Pagi">Pagi</option>
                                        <option value="Siang">Siang</option>
                                        <option value="Malam">Malam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Diet Porsi</label>
                                    <select name="cbwaktu" id="cbwaktu" class="form-control">
                                        <option value="">-Pilih Waktu-</option>
                                        <option value="1 Porsi">1 Porsi</option>
                                        <option value="1/2 Porsi">1/2 Porsi</option>
                                        <option value="1/4 Porsi">1/4 Porsi</option>
                                        <option value="Tidak Mau Makan">Tidak Mau Makan</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-inverse btn-sm">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endif; ?>
<!-- Form Edit dan Delete -->
<?php foreach ($databb as $row) : ?>

    <form action="<?= base_url('diet/edit'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal made" tabindex="-1" id="editModal<?= $row['iddiet']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Update Jadwal</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="kode" id="kode" value="<?= $row['iddiet']; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basic-url">Nama Pasien</label>
                                    <div class="input-group mb-3">
                                        <input type="hidden" value="<?= $row['dietidpasien'] ?>" name="idpasien" id="idpasien">
                                        <input type="text" name="nama" value="<?= $row['nama'] ?>" id="nama" value="<?= old('nama') ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama" readonly />
                                        <div class="input-group-append">
                                            <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                                                <i class="feather icon-search"></i>
                                            </button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group" id="datetimepicker1">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" value="<?= date('Y-m-d', strtotime($row['diettanggal'])); ?>" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" placeholder="Masukan nik" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Diet Program</label>
                                    <input type="text" value="<?= $row['dietprogram'] ?>" name="protein" id="protein" class="form-control">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('protein'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-inverse btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="<?= base_url('diet/delete'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="deleteModal<?= $row['iddiet']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Hapus Catatan Diet</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['iddiet']; ?>" />
                        <h6>Yakin hapus data?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-inverse btn-sm">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php endforeach; ?>


<!-- Modal Data Pasien  -->

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="simpletablemodal" width="100%" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th>ID Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Usia</th>
                            <th>Alamat / No.Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($datapasien as $row) : $no++;

                        ?>
                            <tr>
                                <td width="8%"><?= $no; ?></td>
                                <td> <?= $row['nik']; ?></td>
                                <td> <?= $row['nama']; ?></td>
                                <td> <?= $row['usia']; ?></td>
                                <td> <?= $row['alamat'] . ' / ' . $row['nohp'] ?></td>

                                <td class="text-center">
                                    <button class="btn btn-outline-primary btn-mini" data-toggle="modal" onclick="return pilih('<?= $row['id'] ?>','<?= $row['nama'] ?>')">
                                        <i class="feather icon-check"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php if ($level == 3 && empty($notif)) { ?>
    <script>
        Swal.fire({
            title: "Catatan Diet",
            html: "<strong><?= session()->get('nama') ?></strong> Belum Menginputkan Catatan Diet Hari Ini !",
            icon: "warning"
        });
    </script>
<?php } else if ($level == 3 && !empty($notif)) { ?>
    <?php if (empty($waktu)) { ?>
        <script>
            Swal.fire({
                title: "Catatan Diet",
                html: "<strong><?= session()->get('nama') ?></strong> Program Diet Anda : <strong><?= $program ?></strong> <br> Belum Menginputkan Porsi Makan Pada Pagi Hari !",
                icon: "warning"
            });
        </script>
    <?php } else if ($waktu != "Pagi") { ?>
        <script>
            Swal.fire({
                title: "Catatan Diet",
                html: "<strong><?= session()->get('nama') ?></strong> Belum Menginputkan Porsi Makan Pada Siang Hari !",
                icon: "warning"
            });
        </script>
    <?php } else if ($waktu != "Pagi") { ?>
        <script>
            Swal.fire({
                title: "Catatan Diet",
                html: "<strong><?= session()->get('nama') ?></strong> Belum Menginputkan Porsi Makan Pada Siang Hari !",
                icon: "warning"
            });
        </script>
    <?php } ?>
<?php } else if ($level == 3 && !empty($notif) && !empty($waktu)) { ?>
    <script>
        Swal.fire({
            title: "Catatan Diet",
            html: "<strong><?= session()->get('nama') ?></strong> Terimakasih Telah Menginputkan Catatan Diet Hari Ini !",
            icon: "success"
        });
    </script>
<?php } ?>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });

    function pilih(kode, nm) {
        $('#idpasien').val(kode);
        $('#nama').val(nm);
        $('#exampleModal').modal('hide');
    }
</script>
<?= $this->endSection(); ?>