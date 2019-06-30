<style>
    @media(max-width:768px) {
    ul.nav li{
        border-bottom: 1px solid #fff;
    }
    }
</style>
<!-- PRELOADER -->
<div class="spn_hol">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<!-- END PRELOADER -->

<!-- =========================
    START ABOUT US SECTION
============================== -->
<section class="header parallax home-parallax page" id="HOME">
    <h2></h2>
    <div class="section_overlay">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="images/logo.png" alt="Logo">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" style="margin: 0px -15px !important;">
                        <!-- NAV -->
                        <li><a href="#HOME">HOME</a> </li>
                        <li><a href="#ABOUT">ABOUT </a> </li>
                        <li><a href="#FEATURES">FEATURES</a></li>
                        <li><a href="#SCREENS">SCREENS</a> </li>
                        <li><a href="#DOWNLOAD">DOWNLOAD </a> </li>
                        <li><a href="#CONTACT">CONTACT </a> </li>
                        <li><a href="#reg">SIGN UP</a> </li>
                        <li><a href="#login">SIGN IN</a> </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container- -->
        </nav>

        <div class="container home-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo text-center">
                        <!-- LOGO -->
<!--                        <img width="125" height="55" src="images/logo.png" alt="">-->
                        <img src="images/logo.png" height="250px" width="250px" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="home_text">
                        <!-- TITLE AND DESC -->
                        <h1>University Admission Test App</h1>
                        <p>ভর্তি যুদ্ধের অব্যর্থ অস্ত্র</p>  <!-- A complete solution of University Admission Test and alternative of coaching centers in Bangladesh. -->

                        <div class="download-btn">
                            <!-- BUTTON -->
                            <a class="btn home-btn wow fadeInLeft blink_me" href="<?php echo $this->Html->url("/app/files/APK/AdmissionNinja.apk", true) ?>">সরাসরি ডাউনলোড করুন</a>
                            <a class="tuor btn wow fadeInRight" href="#ABOUT">Take a tour <i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 col-sm-4">
                    <div class="home-iphone">
                        <img src="images/iPhone_Home.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- END HEADER SECTION -->
<style type="text/css">
    .blink_me {
  animation: blinker 2s linear infinite;
}

@keyframes blinker {  
  70% { opacity: 0; }
}
</style>