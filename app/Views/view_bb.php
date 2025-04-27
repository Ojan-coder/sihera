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
                                    <h4>Data Kamar</h4>
                                    <span>This page is for managing "Kamar".</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Kamar</a>
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
                                    <button class="btn btn-mat btn-sm btn-inverse" data-toggle="modal" data-target="#myModal">Tambah Kamar</button>
                                    <a class="btn btn-mat btn-sm btn-success" href="<?= base_url('room/report'); ?>" target="__blank">Laporan Kamar</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" width="100%" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">No</th>
                                                    <th>Nama Kamar</th>
                                                    <th>Lokasi</th>
                                                    <th>Jenis Kamar</th>
                                                    <th>Description</th>
                                                    <th>Gambar</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;
                                                foreach ($room as $row) : $no++;
                                                    if ($row['idlokasi'] == "AT") {
                                                        $lokasi = "UNP Hotel & Convention Air Tawar";
                                                    } else {
                                                        $lokasi = "UNP Hotel & Convention BY Pass";
                                                    }
                                                    if ($row['jenis_kamar'] == '1') {
                                                        $filepatch = "meeting/";
                                                    } elseif ($row['jenis_kamar'] == '2') {
                                                        $filepatch = "kamar/";
                                                    } else {
                                                        $filepatch = "restaurant/";
                                                    }

                                                    if ($row['statusfavorit'] == 'Y') {
                                                        $warna = 'btn btn-outline-warning btn-mini';
                                                    } else {
                                                        $warna = 'btn btn-outline-success btn-mini';
                                                    }
                                                ?>
                                                    <tr>
                                                        <td width="8%"><?= $no; ?></td>
                                                        <td> <?= $row['namakamar']; ?></td>
                                                        <td> <?= $lokasi; ?></td>
                                                        <td> <?= $row['namaroom']; ?></td>
                                                        <td> <?= $row['desckamar']; ?></td>
                                                        <td> <img src="<?= base_url() . $filepatch . $row['gambarkamar'] ?>" alt="" width="50px" height="50px"></td>

                                                        <td class="text-center">
                                                            <?php if ($row['jenis_kamar'] == 2) { ?>
                                                                <button class="<?= $warna ?>" data-toggle="modal" data-target="#updateModal<?= $row['idkamar']; ?>" title="Ganti Best Room">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                                                    </svg>
                                                                </button>
                                                            <?php } ?>
                                                            <button class="btn btn-inverse btn-mini" data-toggle="modal" data-target="#editModal<?= $row['idkamar']; ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                                </svg>
                                                            </button>
                                                            <button class="btn btn-danger btn-mini" data-toggle="modal" data-target="#deleteModal<?= $row['idkamar']; ?>">
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
<form action="<?= base_url('room/save'); ?>" enctype="multipart/form-data" method="post">
    <?= csrf_field(); ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="myModalLabel">Tambah Kamar</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nama Kamar</label>
                                <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan nama" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Lokasi</label>
                                <select name="cblokasi" class="form-control" required>
                                    <option>-Pilih Lokasi-</option>
                                    <option value="AT">UNP Hotel & Convention Air Tawar</option>
                                    <option value="BY">UNP Hotel & Convention By Pass</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('cblokasi'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="cbjenis" class="form-control" required>
                                    <option>-Pilih Kategori-</option>
                                    <?php foreach ($jenis as $r) { ?>
                                        <option value="<?= $r['id'] ?>"><?= $r['namaroom'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('cbjenis'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Foto Kamar</label>
                                <input type="file" name="fotokamar" class="form-control <?= ($validation->hasError('fotokamar')) ? 'is-invalid' : ''; ?>" required />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fotokamar'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>Description</label>
                            <textarea name="keterangan" class="form-control" id="summernote"></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('keterangan'); ?>
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
<?php foreach ($room as $row) : ?>
    <form action="<?= base_url('room/edit'); ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="modal made" tabindex="-1" id="editModal<?= $row['idkamar']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Update room</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="kode" id="kode" value="<?= $row['idkamar']; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" value="<?= $row['namakamar']; ?>" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan nama" required />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select name="cblokasi" class="form-control" required>
                                        <option>-Pilih Lokasi-</option>
                                        <option value="AT" <?= $row['idlokasi'] == 'AT' ? 'selected' : '' ?>>UNP Hotel & Convention Air Tawar</option>
                                        <option value="BY" <?= $row['idlokasi'] == 'BY' ? 'selected' : '' ?>>UNP Hotel & Convention By Pass</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('cblokasi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="cbjenis" class="form-control" required>
                                        <option>-Pilih Kategori-</option>
                                        <?php foreach ($jenis as $r) { ?>
                                            <option value="<?= $r['id'] ?>" <?= $row['jenis_kamar'] == $r['id'] ? 'selected' : '' ?>><?= $r['namaroom'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('cbjenis'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Foto Kamar</label>
                                    <input type="file" name="fotokamar" class="form-control <?= ($validation->hasError('fotokamar')) ? 'is-invalid' : ''; ?>" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('fotokamar'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>Keterangan</label>
                                <div class="form-group">
                                    <textarea name="keterangan" class="form-control" id="summernote"><?= $row['desckamar'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan'); ?>
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

    <form action="<?= base_url('room/delete'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="deleteModal<?= $row['idkamar']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Hapus room</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['idkamar']; ?>" />
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

    <form action="<?= base_url('room/fvroom'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="updateModal<?= $row['idkamar']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Favorite room</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['idkamar']; ?>" />
                        <h6>Menjadikan Room Ini Sebagai Favorite?</h6>
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