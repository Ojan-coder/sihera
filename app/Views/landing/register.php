<?=
$this->extend('landing/index') ?>
<?= $this->section('content') ?>

<section class="book_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php csrf_field() ?>
                <form method="POST" action="<?= base_url('pasien/regis') ?>">
                    <h4>
                        REGISTER <span> PASIEN</span>
                    </h4>

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

                    <?php
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                        <div class="alert alert-danger border-danger">
                            <h5><i class="bi bi-exclamation-circle"></i> Error !! .</h5>
                            <h6><b>Ada Kesalahan Input Data :</b></h6>
                            <ul>
                                <?php foreach ($errors as $key => $error) { ?>
                                    <li><?= esc($error) ?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    <?php } ?>


                    <div class="form-row ">
                        <div class="form-group col-lg-4">
                            <label for="inputPatientName">NIK Pasien </label>
                            <input type="text" maxlength="16" class="form-control" value="<?= old('nik') ?>" name="nik" placeholder="">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputPatientName">Nama Pasien </label>
                            <input type="text" class="form-control" name="nama" value="<?= old('nama') ?>" placeholder="">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputUmurPasien">Umur Pasien</label>
                            <input type="text" class="form-control" name="umur" value="<?= old('umur') ?>" placeholder="">
                            <!--<input type="number" class="form-control" value="<?= old('umur') ?>" name="umur" placeholder="Inputkan Umur Disini" id="inputUmurPasien">-->
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-lg-4">
                            <label for="inputDate">Tanggal Lahir Pasien </label>
                            <div class="input-group date" data-date-format="mm-dd-yyyy">
                                <input type="date" name="tgllahir" value="<?= old('tgllahir') ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputDepartmentName">Jenis Kelamin Pasien</label>
                            <select name="jenkel" class="form-control wide" >
                                <option value="">-Pilih Jenis Kelamin-</option>
                                <option value="Laki-Laki" <?= old('jenkel') == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
                                <option value="Perempuan" <?= old('jenkel') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputPhone">Tinggi Badan Pasien (Cm)</label>
                            <input type="text" class="form-control" value="<?= old('tinggibadan') ?>" name="tinggibadan" placeholder="">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-lg-4">
                            <label for="inputPhone">Berat Badan Pasien</label>
                            <input type="text" class="form-control" name="beratbadan" value="<?= old('beratbadan') ?>" id="inputPhone">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputSymptoms">Alamat Pasien</label>
                            <input type="text" class="form-control" name="alamat" value="<?= old('alamat') ?>" id="inputSymptoms" placeholder="">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputPhone">No.Hp Pasien</label>
                            <input type="text" class="form-control" name="nohp" value="+62<?= old('nohp') ?>" id="inputPhone">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-lg-4">
                            <label for="inputPhone">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= old('email') ?>" id="inputPhone">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputSymptoms">Password</label>
                            <input type="password" class="form-control" name="password" id="inputSymptoms" placeholder="">
                        </div>
                    </div>
                    <div class="btn-box">
                        <button type="submit" class="btn">Submit Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>