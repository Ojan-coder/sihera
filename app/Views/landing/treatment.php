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
                Nephrologist Care
              </h4>
              <p>
                alteration in some form, by injected humour, or randomised words which don't look even slightly e sure there isn't anything
              </p>
              <a href="">
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