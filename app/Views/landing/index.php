<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Si-Reha</title>
  <link rel="icon" href="<?= base_url(); ?>\assets\images\logo-sireha.png" type="image/x-icon">


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('landing/') ?>css/bootstrap.css" />

  <!-- fonts style -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> -->

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('landing/') ?>owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="<?= base_url('landing/') ?>css/font-awesome.min.css" rel="stylesheet" />
  <!-- nice select -->
  <!-- <link rel="stylesheet" href="<?= base_url('landing/') ?>nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" /> -->
  <!-- datepicker -->
  <link rel="stylesheet" href="<?= base_url('landing/') ?>datepicker.css">
  <!-- Custom styles for this template -->
  <link href="<?= base_url('landing/') ?>css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?= base_url('landing/') ?>css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">

    <?= $this->include('landing/header') ?>

    <!-- slider section -->
    <section class="slider_section ">
      <div class="dot_design">
        <img src="<?= base_url('landing/') ?>images/dots.png" alt="">
      </div>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <div class="play_btn">
                      <button>
                        <i class="fa fa-play" aria-hidden="true"></i>
                      </button>
                    </div>
                    <h1>
                      Si
                      <span>
                        Reha
                      </span>
                    </h1>
                    <p>
                      Chronic Kidney Disease (CKD) adalah gangguan fungsi ginjal yang berlangsung dalam jangka waktu yang panjang dan bersifat progresif. Banyak pasien CKD harus menjalani terapi hemodialisa secara rutin untuk menggantikan fungsi ginjalnya.
                    </p>
                    <a href="">
                      Contact Us
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img width="100px" height="600px" src="<?= base_url('landing/') ?>images/sireha_bersama_keluarga_1.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <div class="play_btn">
                      <button>
                        <i class="fa fa-play" aria-hidden="true"></i>
                      </button>
                    </div>
                    <h1>
                      Si
                      <span>
                        Reha
                      </span>
                    </h1>
                    <p>
                      SIREHA adalah sistem informasi yang dirancang untuk membantu pasien CKD dalam menjalani hemodialisa secara teratur, memantau asupan cairan, diit dan aktivitas harian secara mandiri serta meningkatkan pemahaman melalui edukasi dan konsultasi dengan tujuan meningkatkan kualitas hidup pasien
                    </p>
                    <a href="">
                      Contact Us
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img width="100px" height="600px" src="<?= base_url('landing/') ?>images/gambar_yang_buat_gantungan_kunci.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <div style="background-color : #0772bf;" class="play_btn">
                      <button>
                        <i class="fa fa-play" aria-hidden="true"></i>
                      </button>
                    </div>
                    <h1>
                      Si
                      <span>
                        Reha
                      </span>
                    </h1>
                    <p>
                      Manfaat menggunakan SIREHA <br>
                      1. Meningkatkan kepatuhan terhadap terapi hemodialisa <br>
                      2. Menghindari komplikasi akibat kelebihan volume cairan <br>
                      3. Memperbaiki kualitas hidup pasien CKD <br>
                      4. Memfasilitasi komunikasi antara pasien dengan tenaga kesehatan
                    </p>
                    <a href="">
                      Contact Us
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img width="100px" height="600px" src="<?= base_url('landing/') ?>images/pasien_hd.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <img src="<?= base_url('landing/') ?>images/prev.png" alt="">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <img src="<?= base_url('landing/') ?>images/next.png" alt="">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <?= $this->renderSection('content') ?>

  <section class="info_section ">
    <div class="container">
      <div class="info_top">
        <div class="info_logo">
          <a href="">
            <img src="images/logo.png" alt="">
          </a>
        </div>
        <div class="info_form">

        </div>
      </div>
      <div class="info_bottom layout_padding2">
        <div class="row info_main_row">
          <div class="col-md-6 col-lg-3">
            <div class="info_links">
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
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
          <div class="col-md-6 col-lg-3">
            <div class="info_links">

              <div class="info_contact">
                <a href="">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span>
                    Call +01 1234567890
                  </span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_post">

              <div class="info_contact">
                <a>
                  <i class="fa fa-envelope"></i>
                  <span>
                    sireha@gmail.com
                  </span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_post">

              <div class="info_contact">
                <a>
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <span>
                    Location
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="#">Si Reha</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="<?= base_url('landing/') ?>js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="<?= base_url('landing/') ?>js/bootstrap.js"></script>
  <!-- nice select -->
  <script src="<?= base_url('landing/') ?>jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- owl slider -->
  <script src="<?= base_url('landing/') ?>owl.carousel.min.js"></script>
  <!-- datepicker -->
  <script src="<?= base_url('landing/') ?>bootstrap-datepicker.js"></script>
  <!-- custom js -->
  <script src="<?= base_url('landing/') ?>js/custom.js"></script>
</body>

</html>