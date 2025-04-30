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
                                    <h4>Data Dokter</h4>
                                    <span>This page is for managing "Dokter".</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Dokter</a>
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
                                                <div class="alert alert-success border-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>
                                                    <strong>Success!</strong> <?php echo session()->getFlashdata('success'); ?>
                                                </div>
                                            <?php } else if (session()->getFlashdata('failed')) { ?>
                                                <div class="alert alert-warning border-warning">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>
                                                    <strong>Error!</strong> <?php echo session()->getFlashdata('failed'); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <button class="btn btn-mat btn-sm btn-inverse" data-toggle="modal" data-target="#myModal">Tambah Dokter</button>
                                    <a class="btn btn-mat btn-sm btn-success" href="<?= base_url('docter/report'); ?>" target="__blank">Laporan Dokter</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" width="100%" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">No</th>
                                                    <th>Nama Dokter</th>
                                                    <th>Spesialis</th>
                                                    <th>Alamat Dokter</th>
                                                    <th>No.Hp Dokter</th>
                                                    <th>Gambar</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;
                                                foreach ($dokter as $row) : $no++;

                                                ?>
                                                    <tr>
                                                        <td width="8%"><?= $no; ?></td>
                                                        <td> <?= $row['namadokter']; ?></td>
                                                        <td> <?= $row['spesialisdokter']; ?></td>
                                                        <td> <?= $row['alamatdokter']; ?></td>
                                                        <td> <?= $row['nohpdokter']; ?></td>
                                                        <td> <img src="<?= base_url('dokter/') . $row['gambardokter'] ?>" alt="" width="50px" height="50px"></td>

                                                        <td class="text-center">
                                                            <button class="btn btn-inverse btn-mini" data-toggle="modal" data-target="#editModal<?= $row['iddokter']; ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                                </svg>
                                                            </button>
                                                            <button class="btn btn-danger btn-mini" data-toggle="modal" data-target="#deleteModal<?= $row['iddokter']; ?>">
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

<!-- Form Tambah Data -->
<form action="<?= base_url('docter/save'); ?>" enctype="multipart/form-data" method="post">
    <?= csrf_field(); ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="myModalLabel">Tambah Dokter</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nama Dokter</label>
                                <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan nama" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Spesialis Dokter</label>
                                <input type="text" name="spesialis" class="form-control <?= ($validation->hasError('spesialis')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('spesialis'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgllahir" class="form-control <?= ($validation->hasError('tgllahir')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgllahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>No.Hp Dokter</label>
                                <input type="text" name="nohp" value="+62" class="form-control <?= ($validation->hasError('nohp')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nohp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Alamat Dokter</label>
                                <input type="text" name="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Foto Dokter</label>
                                <input type="file" name="fotodokter" class="form-control <?= ($validation->hasError('fotodokter')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fotodokter'); ?>
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
<?php foreach ($dokter as $row) : ?>
    <form action="<?= base_url('docter/edit'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal made" tabindex="-1" id="editModal<?= $row['iddokter']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Update Dokter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="kode" id="kode" value="<?= $row['iddokter']; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Nama Dokter</label>
                                    <input type="text" name="nama" value="<?= $row['namadokter'] ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan nama" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Spesialis Dokter</label>
                                    <input type="text" name="spesialis" value="<?= $row['spesialisdokter'] ?>" class="form-control <?= ($validation->hasError('spesialis')) ? 'is-invalid' : ''; ?>" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('spesialis'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tgllahir" value="<?= $row['tgllahirdokter'] ?>" class="form-control <?= ($validation->hasError('tgllahir')) ? 'is-invalid' : ''; ?>" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgllahir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>No.Hp Dokter</label>
                                    <input type="text" name="nohp" value="<?= $row['nohpdokter'] ?>" class="form-control <?= ($validation->hasError('nohp')) ? 'is-invalid' : ''; ?>" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nohp'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Alamat Dokter</label>
                                    <input type="text" name="alamat" value="<?= $row['alamatdokter'] ?>" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Foto Dokter</label>
                                    <input type="file" name="fotodokter" class="form-control <?= ($validation->hasError('fotodokter')) ? 'is-invalid' : ''; ?>" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('fotodokter'); ?>
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

    <form action="<?= base_url('docter/delete'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="deleteModal<?= $row['iddokter']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Hapus Dokter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['iddokter']; ?>" />
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