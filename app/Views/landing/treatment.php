<?= $this->extend('landing/index') ?>

<?= $this->section('content') ?>

<!-- treatment section -->

<section class="treatment_section layout_padding">
  <div class="side_img">
    <img src="images/treatment-side-img.jpg" alt="">
  </div>
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Hospital <span>Edukasi</span>
      </h2>
    </div>
    <div class="row">
      <?php foreach ($dataedukasi as $row): ?>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/t1.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                <?= $row['topik'] ?>
              </h4>
              <p>
                <?= $row['deskripsi'] ?>

                <?php if ($row['kategori'] == 'Doc') {
                  $path = base_url() . 'edukasi/' . $row['sumber'];
                } else {
                  $path = $row['sumber'];
                } ?>
              </p>
              <a href="<?= $path ?>">
                Read More
              </a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<!-- end treatment section -->

<?= $this->endSection() ?>