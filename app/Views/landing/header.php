<header class="header_section">
    <div class="header_top">
        <div class="container">
            <div class="contact_nav">
                <a href="">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        Call : +62 81328173365
                    </span>
                </a>
                <a href="">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                        Email : sireha@gmail.com
                    </span>
                </a>
                <a href="">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>
                        Location
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div style="background-color : #0772bf;" class="header_bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>\assets\images\logo-sireha.png" alt="">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex mr-auto flex-column flex-lg-row align-items-center">
                        <ul class="navbar-nav  ">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('about') ?>"> About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('treatment') ?>">Edukasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('doktor') ?>">Teams</a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link" href="<?= base_url('testimonial') ?>">Testimonial</a>-->
                            <!--</li>-->
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link" href="<?= base_url('contact') ?>">Contact Us</a>-->
                            <!--</li>-->
                        </ul>
                    </div>
                    <div class="quote_btn-container">
                        <a href="<?= base_url('login') ?>">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                                Login
                            </span>
                        </a>
                        <a href="<?= base_url('register') ?>">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                                Sign Up
                            </span>
                        </a>
                        <form class="form-inline">
                            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>