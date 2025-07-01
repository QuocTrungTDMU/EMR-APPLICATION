<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Mediic - Health Care Doctor HTML5 Template</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="assets/images/fav-icon/icon.png" />

    @vite(['resources/css/app.css'])
    @stack('styles')

    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="all" />

    <!-- font-awesome CSS -->
    <link rel="stylesheet" href="assets/css/all.min.css" type="text/css" media="all" />
    <!-- font-flaticon CSS -->
    <link rel="stylesheet" href="assets/css/flaticon.css" type="text/css" media="all" />
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="assets/css/theme-default.css" type="text/css" media="all" />
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css" type="text/css" media="all" />
    <!-- venobox CSS -->
    <link rel="stylesheet" href="venobox/venobox.css" type="text/css" media="all" />
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css" type="text/css" media="all" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/odometer-theme-default.css" />
    <!-- responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/swiper.min.css" />
    <!-- modernizr js -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/clash-display" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/aos.css" />
</head>

<body>
    <!-- loder -->
    <div class="loader-wrapper">
        <div class="loader"></div>
        <div class="loder-section left-section"></div>
        <div class="loder-section right-section"></div>
    </div>

    <!-- Curser Pointer -->
    <div class="cursor"></div>
    <div class="cursor2"></div>

    <!--==================================================-->
    <!-- Start mediic Main Menu  -->
    <!--==================================================-->
    <div id="sticky-header" class="mediic_nav_manu">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo cursor-scale small">
                        <a class="logo_img" href="index.html" title="mediic">
                            <img src="assets/images/logo.png" alt="logo" />
                        </a>
                        <a class="main_sticky" href="index.html" title="mediic">
                            <img src="assets/images/logo2.png" alt="logo" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <nav class="mediic_menu">
                        <ul class="nav_scroll">
                            <li>
                                <a class="mdy-hover cursor-scale small" href="#">Home </a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home Version 01</a></li>
                                    <li><a href="index-2.html">Home Version 02</a></li>
                                    <li><a href="https://html.tf.dreamitsolution.net/mediic/">Home Version 03</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="mdy-hover cursor-scale small" href="about.html">About</a>
                            </li>
                            <li>
                                <a class="mdy-hover cursor-scale small" href="#">Pages </a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="service.html">Our Service</a></li>
                                    <li><a href="team.html">Our Team</a></li>
                                    <li><a href="team-details.html">Team Details</a></li>
                                    <li><a href="project.html">Project</a></li>
                                    <li><a href="project-details.html">Project Details</a></li>
                                    <li><a href="appointment.html">Appointment</a></li>
                                    <li><a href="testimonial.html">Testimonial</a></li>
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="faq.html">Faqs</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="mdy-hover cursor-scale small" href="#">Services </a>
                                <ul class="sub-menu">
                                    <li><a href="service.html">Our Service</a></li>
                                    <li><a href="service-details.html">Service Details</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="mdy-hover cursor-scale small" href="#">Blog </a>
                                <ul class="sub-menu">
                                    <li><a href="blog-grid.html">Blog Gird</a></li>
                                    <li><a href="blog-list.html">Blog List</a></li>
                                    <li><a href="blog-2colum.html">Blog 2Column</a></li>
                                    <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="mdy-hover cursor-scale small" href="contact.html">Contact Us</a>
                            </li>
                        </ul>
                        <div class="mediic-right-side cursor-scale small">
                            <!-- mediic Search -->
                            <div class="search-box-btn search-box-outer">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <!-- header button -->
                            <div class="header-button">
                                <a href="appointment.html">
                                    Get Appoinment
                                    <img src="assets/images/resource/arrow.png" alt="" />
                                    <div class="mediic-hover-btn hover-btn"></div>
                                    <div class="mediic-hover-btn hover-btn2"></div>
                                    <div class="mediic-hover-btn hover-btn3"></div>
                                    <div class="mediic-hover-btn hover-btn4"></div>
                                </a>
                            </div>
                            <div class="sidebar">
                                <div class="nav-btn navSidebar-button">
                                    <span><i class="bi bi-grid-3x3-gap-fill"></i></span>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- mediic Mobile Menu  -->
    <div class="mobile-menu-area sticky d-sm-block d-md-block d-lg-none">
        <div class="mobile-menu">
            <nav class="mediic_menu">
                <ul class="nav_scroll">
                    <li>
                        <a class="mdy-hover" href="#">Home </a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home Version 01</a></li>
                            <li><a href="index-2.html">Home Version 02</a></li>
                            <li><a href="https://html.tf.dreamitsolution.net/mediic/">Home Version 03</a></li>
                        </ul>
                    </li>
                    <li><a class="mdy-hover" href="about.html">About</a></li>
                    <li>
                        <a class="mdy-hover" href="#">Pages </a>
                        <ul class="sub-menu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="service.html">Our Service</a></li>
                            <li><a href="team.html">Our Team</a></li>
                            <li><a href="team-details.html">Team Details</a></li>
                            <li><a href="project.html">Project</a></li>
                            <li><a href="project-details.html">Project Details</a></li>
                            <li><a href="appointment.html">Appointment</a></li>
                            <li><a href="testimonial.html">Testimonial</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="faq.html">Faqs</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="mdy-hover" href="#">Services </a>
                        <ul class="sub-menu">
                            <li><a href="service.html">Our Service</a></li>
                            <li><a href="service-details.html">Service Details</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="mdy-hover" href="#">Blog </a>
                        <ul class="sub-menu">
                            <li><a href="blog-grid.html">Blog Gird</a></li>
                            <li><a href="blog-list.html">Blog List</a></li>
                            <li><a href="blog-2colum.html">Blog 2Column</a></li>
                            <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a class="mdy-hover" href="contact.html">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!--==================================================-->
    <!-- End mediic Main Menu  -->
    <!--==================================================-->

    <div id="smooth-wrapper">
        <div id="smooth-content">

            @include('partials.hero-section')

            @include('partials.counter-section')

            @include('partials.feature-section')

            @include('partials.about-section')

            @include('partials.marquee-section')

            @include('partials.service-section')

            @include('partials.appoiment-section')

            @include('partials.best-doctor-section')

            @include('partials.testimonial-section')

            @include('partials.brand-section')

            @include('partials.blog-section')

            @include('partials.subscribe-section')

        </div>
    </div>

    <!--==================================================-->
    <!-- Start scrollup section Area -->
    <!--==================================================-->
    <div id="progress" class="progress hide">
        <div id="progress-value"></div>
    </div>
    <!--==================================================-->
    <!-- Start scrollup section Area -->
    <!--==================================================-->

    <script src="assets/js/gsap.min.js"></script>

    <script src="assets/js/ScrollSmoother.min.js"></script>

    <script src="assets/js/ScrollToPlugin.min.js"></script>

    <script src="assets/js/ScrollTrigger.min.js"></script>

    <script src="assets/js/aos.js"></script>

    <script src="assets/js/vendor/jquery-3.6.2.min.js"></script>

    <script src="assets/js/odometer.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/imagesloaded.pkgd.min.js"></script>

    <script src="venobox/venobox.js"></script>

    <script src="venobox/venobox.min.js"></script>

    <script src="assets/js/jquery.meanmenu.js"></script>

    <script src="assets/js/jquery.scrollUp.js"></script>

    <script src="assets/js/appear.js"></script>

    <script src="assets/js/jquery.barfiller.js"></script>

    <script src="assets/js/theme.js"></script>

    <script src="assets/js/my.js"></script>
</body>

</html>