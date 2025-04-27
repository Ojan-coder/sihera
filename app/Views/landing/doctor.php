<?= $this->extend('landing/index') ?>

<?= $this->section('content') ?>

<!-- team section -->

<section class="team_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Our <span>Doctors</span>
      </h2>
    </div>
    <div class="carousel-wrap ">
      <div class="owl-carousel team_carousel">
        <?php foreach ($data as $r) { ?>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="<?= base_url('dokter/').$r['gambardokter'] ?>" alt="" />
              </div>
              <div class="detail-box">
                <h5>
                  <?= $r['namadokter'] ?>
                </h5>
                <h6>
                  <?= $r['spesialisdokter'] ?>
                </h6>
                <div class="social_box">
                  <a href="https://api.whatsapp.com/send/?phone=%2B<?= $r['nohpdokter'] ?>&text=Halo%2C+Saya+Ingin+Konsultasi+Dengan+Dokter+%3F&type=phone_number&app_absent=0">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<!-- end team section -->

<?= $this->endSection() ?>