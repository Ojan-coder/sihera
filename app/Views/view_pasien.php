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
                                    <h4>Data Pasien</h4>
                                    <span>This page is for managing "Pasien".</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Pasien</a>
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
                                    <button class="btn btn-mat btn-sm btn-inverse" data-toggle="modal" data-target="#myModal">Tambah Pasien</button>
                                    <!--<a class="btn btn-mat btn-sm btn-success" href="<?= base_url('galeri/report'); ?>" target="__blank">Laporan Komentar</a>-->
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" width="100%" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">No</th>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Usia</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Berat Badan</th>
                                                    <th>Tinggi Badan</th>
                                                    <th>Alamat</th>
                                                    <th>Nohp</th>
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
                                                        <td> <?= date('d-m-Y', strtotime($row['tgllahir'])); ?></td>
                                                        <td> <?= $row['jenkel']; ?></td>
                                                        <td> <?= $row['beratbadan']; ?></td>
                                                        <td> <?= $row['tinggibadan']; ?></td>
                                                        <td> <?= $row['alamat']; ?></td>
                                                        <td> <?= $row['nohp']; ?></td>

                                                        <td class="text-center">
                                                            <button class="btn btn-inverse btn-mini" data-toggle="modal" data-target="#editModal<?= $row['id']; ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                                </svg>
                                                            </button>
                                                            <button class="btn btn-danger btn-mini" data-toggle="modal" data-target="#deleteModal<?= $row['id']; ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                </svg>
                                                            </button>
                                                        </td>
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

<!-- Form Tambah Data Pasien -->

<form action="<?= base_url('patient/save'); ?>" enctype="multipart/form-data" method="post">
    <?= csrf_field(); ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="myModalLabel">Tambah Pasien</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>NIK Pasien</label>
                                <input type="text" name="nik" value="<?= old('nik') ?>" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" placeholder="Masukan nik" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nama Pasien</label>
                                <input type="text" name="nama" value="<?= old('nama') ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan nama" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Usia Pasien</label>
                                <input type="number" name="umur" value="<?= old('umur') ?>" class="form-control <?= ($validation->hasError('umur')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('umur'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgllahir" value="<?= old('tgllahir') ?>" class="form-control <?= ($validation->hasError('tgllahir')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgllahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenkel" id="" class="form-control">
                                    <option value="">-Pilih Jenis Kelamin-</option>
                                    <option value="Laki-Laki" <?= old('jenkel') == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?= old('jenkel') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenkel'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Berat Badan Pasien</label>
                                <input type="number" name="beratbadan" value="<?= old('beratbadan') ?>" class="form-control <?= ($validation->hasError('beratbadan')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('beratbadan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tinggi Badan Pasien</label>
                                <input type="number" name="tinggibadan" value="<?= old('tinggibadan') ?>" class="form-control <?= ($validation->hasError('tinggibadan')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tinggibadan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>No.Hp Pasien</label>
                                <input type="text" name="nohp" value="+62<?= old('') ?>" class="form-control <?= ($validation->hasError('nohp')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nohp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Alamat Pasien</label>
                                <input type="text" name="alamat" value="<?= old('alamat') ?>" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Email Pasien</label>
                                <input type="email" name="email" value="<?= old('email') ?>" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
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

<!-- Form Edit dan Delete -->
<?php foreach ($datapasien as $row) : ?>

    <form action="<?= base_url('patient/edit'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal made" tabindex="-1" id="editModal<?= $row['id']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Update Dokter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="kode" id="kode" value="<?= $row['id']; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>NIK Pasien</label>
                                    <input type="text" name="nik" value="<?= $row['nik'] ?>" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" placeholder="Masukan nik" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Nama Pasien</label>
                                    <input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan nama" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Usia Pasien</label>
                                    <input type="number" name="umur" value="<?= $row['usia'] ?>" class="form-control <?= ($validation->hasError('umur')) ? 'is-invalid' : ''; ?>" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('umur'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tgllahir" value="<?= date('Y-m-d', strtotime($row['tgllahir'])) ?>" class="form-control <?= ($validation->hasError('tgllahir')) ? 'is-invalid' : ''; ?>" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgllahir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenkel" id="" class="form-control">
                                        <option value="">-Pilih Jenis Kelamin-</option>
                                        <option value="Laki-Laki" <?= $row['jenkel'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?= $row['jenkel'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenkel'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Berat Badan Pasien</label>
                                    <input type="number" name="beratbadan" value="<?= $row['beratbadan'] ?>" class="form-control <?= ($validation->hasError('beratbadan')) ? 'is-invalid' : ''; ?>" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('beratbadan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tinggi Badan Pasien</label>
                                    <input type="number" name="tinggibadan" value="<?= $row['tinggibadan'] ?>" class="form-control <?= ($validation->hasError('tinggibadan')) ? 'is-invalid' : ''; ?>" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tinggibadan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>No.Hp Pasien</label>
                                    <input type="text" name="nohp" value="<?= $row['nohp'] ?>" class="form-control <?= ($validation->hasError('nohp')) ? 'is-invalid' : ''; ?>" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nohp'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Alamat Pasien</label>
                                    <input type="text" name="alamat" value="<?= $row['alamat'] ?>" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
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

    <form action="<?= base_url('patient/delete'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="deleteModal<?= $row['id']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Hapus galeri</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['id']; ?>" />
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


<?= $this->endSection(); ?>