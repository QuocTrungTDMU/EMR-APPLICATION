<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Link of CSS files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css//hospitals-search/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/aos.css" />
    <link rel="stylesheet" href="assets/css/hospitals-search/remixicon.css" />
    <link rel="stylesheet" href="assets/css/hospitals-search/flaticon_hinton.css" />
    <link rel="stylesheet" href="assets/css//hospitals-search//header.css" />
    <link rel="stylesheet" href="assets/css/hospitals-search/style.css" />
    <link rel="stylesheet" href="assets/css/hospitals-search/responsive.css" />
    <link rel="stylesheet" href="assets/css/dark-theme.css" />

    <title>Hinton - Doctors & Hospital Directory HTML Template</title>
    <link rel="icon" type="image/png" href="assets/images/hospitals-search/favicon.png" />


    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/notifications.css'])
    @stack('styles')
    @yield('head')

</head>

<body>

    @include('partials.header')

    <!-- Breadcrumb Section Start -->
    <section class="relative text-center min-h-[300px] flex items-center justify-center">
        <!-- Background Image -->
        <div class="breadcrumb-wrap absolute inset-0 bg-black bg-opacity-50 z-1"></div>
        <img
            src="assets/images/hospitals-search/breadcrumb/br-shape-1.png"
            alt="Shape"
            class="br-shape-one position-absolute z-1 bounce"
            style="left: 20px;" />
        <img
            src="assets/images/hospitals-search/breadcrumb/br-shape-2.png"
            alt="Shape"
            class="br-shape-two position-absolute z-1 rotate"
            style="right: 20px;" />
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat bg-fixed "
            style="background-image: url('assets/images/hospitals-search/breadcrumb/br-bg-4.jpg');">
        </div>

        <!-- Content -->
        <div class="relative z-10 container mx-auto px-4 py-16 md:py-10 text-center">
            <!-- Main Title -->
            <div class="mb-6">
                <h1 class="text-4xl md:text-5xl font-bold text-white">Tìm kiếm bệnh viện</h1>
            </div>

            <!-- Breadcrumb -->
            <nav class="flex items-center justify-center space-x-2 text-white" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="text-white hover:text-blue-300 transition-colors duration-200">
                    Home
                </a>
                <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-gray-300">Tìm kiếm bệnh viện</span>
            </nav>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Top Specialization Details Section Start -->
    <div class="container style-one ptb-120">
        <div class="container style-one">
            <div class="row">
                <div class="col-xl-4 order-xl-1 order-2 pe-xxl-5">
                    <aside class="sidebar me-xxl-5">
                        <div class="sidebar-widget search-widget round-20">
                            <h3
                                class="sidebar-widget-title fs-24 fw-extrabold text-title mb-18">
                                Search Here
                            </h3>
                            <form
                                action="#"
                                class="search-form position-relative form-wrapper">
                                <input
                                    type="search"
                                    class="bg-ash w-100 border-0 text-para round-10"
                                    placeholder="Search" />
                                <button
                                    type="submit"
                                    class="position-absolute top-0 end-0 border-0 d-flex flex-column align-items-center justify-content-center h-100 transition text-white">
                                    <i class="ri-search-line"></i>
                                </button>
                            </form>
                        </div>
                        <div class="sidebar-widget category-widget round-20">
                            <h3
                                class="sidebar-widget-title fs-24 fw-extrabold text-title mb-18">
                                Categories
                            </h3>
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="top-specialization.html">Cardiology<img
                                            src="assets/images/hospitals-search/icons/right-arrow-black-2.svg"
                                            alt="Icon" /></a>
                                </li>
                                <li>
                                    <a href="top-specialization.html">Primary Care<img
                                            src="assets/images/hospitals-search/icons/right-arrow-black-2.svg"
                                            alt="Icon" /></a>
                                </li>
                                <li>
                                    <a href="top-specialization.html">Pediatrics<img
                                            src="assets/images/hospitals-search/icons/right-arrow-black-2.svg"
                                            alt="Icon" /></a>
                                </li>
                                <li>
                                    <a href="top-specialization.html">Physical Therapy<img
                                            src="assets/images/hospitals-search/icons/right-arrow-black-2.svg"
                                            alt="Icon" /></a>
                                </li>
                                <li>
                                    <a href="top-specialization.html">Dental Care<img
                                            src="assets/images/hospitals-search/icons/right-arrow-black-2.svg"
                                            alt="Icon" /></a>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-widget tags-widget round-20">
                            <h3
                                class="sidebar-widget-title fs-24 fw-extrabold text-title mb-18">
                                Popular Tags
                            </h3>
                            <ul class="list-unstyled mb-0">
                                <li><a href="top-specialization.html">Hospital</a></li>
                                <li><a href="top-specialization.html">Health</a></li>
                                <li><a href="top-specialization.html">Services</a></li>
                                <li><a href="top-specialization.html">Clinic</a></li>
                                <li><a href="top-specialization.html">Modern</a></li>
                                <li><a href="top-specialization.html">Doctor</a></li>
                                <li><a href="top-specialization.html">Telemedicine</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-xl-8 pe-xxl-4 order-xl-2 order-1 ps-xxl-0">
                    <div class="hospital-desc ms-xxl-n4">
                        <div class="single-para">
                            <h1>Primary Care</h1>
                            <p>
                                Praesent sapien massa convallis a pellentesque nec egestas non
                                nisi. curabitur arcu erat accumsan id imperdiet et porttitor
                                at sem.Lorem ipsum dolor sit amet consectetur adipiscing elit.
                                diam sit amet quam vehicula elementum sed sit amet dui.
                                curabitur non nulla sit amet nisl tempus convallis quis ac
                                lectus.
                            </p>
                        </div>
                        <div class="single-img round-20 mb-30">
                            <img
                                src="assets/images/hospitals-search/hospitals/single-hospital-3.jpg"
                                alt="Hospital"
                                class="round-20" /></noscript>
                        </div>
                        <div class="single-para">
                            <h2>Conditions treated</h2>
                            <p>
                                Praesent sapien massa convallis a pellentesque nec egestas non
                                nisi. curabitur arcu erat accumsan id imperdiet et porttitor
                                at sem.Lorem ipsum dolor sit amet consectetur adipiscing elit.
                                diam sit amet quam vehicula elementum sed sit amet dui.
                                curabitur non nulla sit amet nisl tempus vestibulum ac diam
                                sit amet quam vehicula elementum sed sit amet dui. quisque
                                velit nisi pretium ut lacinia in elementum id enim
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-xl-9">
                                <ul
                                    class="features-list style-one list-unstyled pe-xxl-5 me-xxl-5 mb-35">
                                    <li class="position-relative">
                                        <i class="ri-checkbox-circle-line"></i>Joint replacement
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-checkbox-circle-line"></i>Sports injuries
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-checkbox-circle-line"></i>Hand surgery
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-checkbox-circle-line"></i>Fracture care &
                                        trauma
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-checkbox-circle-line"></i>Foot & ankel
                                        injuries
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-checkbox-circle-line"></i>Spine surgery
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-checkbox-circle-line"></i>Hip surgery
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-checkbox-circle-line"></i>Knee surgery
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-checkbox-circle-line"></i>Pediatric
                                        orthopedic conditions
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-checkbox-circle-line"></i>Shoulder surgery
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="testimonial-card-wrap bg-berylGreen round-20 mb-30">
                            <div class="testimonial-card style-five">
                                <ul class="rating style-two text-center list-unstyled">
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                </ul>
                                <p class="text-center text-title mb-25">
                                    “Praesent sapien massa convallis a pellentesque nec egestas
                                    non nisi. curabitur arcu erat accumsan imperdiet et
                                    porttitor at sem.Lorem ipsum dolor sit amet consectetur
                                    adipiscing elit. diam sit amet quam vehicula elementum sed
                                    sit amet dui. curabitur non nulla sit amet.”
                                </p>
                                <div class="d-flex justify-content-center">
                                    <div
                                        class="client-info-wrap d-flex flex-wrap align-items-center justify-content-center">
                                        <div class="client-img rounded-circle">
                                            <img
                                                src="assets/images/hospitals-search/clients/client-1.jpg"
                                                alt="Client"
                                                class="rounded-circle" /></noscript>
                                        </div>
                                        <div class="client-info text-start ms-auto">
                                            <h6 class="fs-22 lh-1 mb-6 fw-extrabold text-title">
                                                Steven Borders
                                            </h6>
                                            <span class="d-block text-title">CEO & Founder</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-para">
                            <h2>Tests & Procedures</h2>
                            <p>
                                Praesent sapien massa convallis a pellentesque nec egestas non
                                nisi. curabitur arcu erat accumsan id imperdiet et porttitor
                                at sem.Lorem ipsum dolor sit amet consectetur adipiscing elit.
                                diam sit amet quam vehicula elementum sed sit amet dui.
                                curabitur non nulla sit amet nisl tempus convallis quis ac
                                lectus. Vestibulum ac diam sit amet quam vehicula elementum
                                sed sit amet dui. quisque velit nisi pretium ut lacinia in
                                elementum id enim
                            </p>
                            <p>
                                Vestibulum ac diam sit amet quam vehicula elementum sed sit
                                amet dui. quisque velit nisi pretium ut lacinia in elementum
                                id enim. cras ultricies ligula sed magna dictum porta. quisque
                                velit nisi pretium ut lacinia in elementumn. Nulla quis lorem
                                ut libero malesuada feugiat. praesent sapien massa convallis a
                                pellentesque nec egestas non nisi. nulla porttitor accumsan
                                tincidunt.
                            </p>
                        </div>
                        <div
                            class="promo-video style-three position-relative bg-f round-20">
                            <a
                                class="play-video d-flex flex-wrap flex-column align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                data-fslightbox=""
                                href="https://www.youtube.com/watch?v=u31qwQUeGuM">
                                <span class="ripple"></span>
                                <i class="ri-play-large-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Specialization Details Section End -->

    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <div id="progress-wrap" class="progress-wrap style-one">
        <svg
            class="progress-circle svg-content"
            width="100%"
            height="100%"
            viewBox="-1 -1 102 102">
            <path
                id="progress-path"
                d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- Link of JS files -->
    <script
        data-cfasync="false"
        src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/hospitals-search/bootstrap.bundle.min.js"></script>
    <script src="assets/js/hospitals-search/megamenu.js"></script>
    <script src="assets/js/hospitals-search/swiper-bundle.min.js"></script>
    <script src="assets/js/hospitals-search/fslightbox.js"></script>
    <script src="assets/js/hospitals-search/gsap.min.js"></script>
    <script src="assets/js/scrollTrigger.min.js"></script>
    <script src="assets/js/hospitals-search/SplitText.min.js"></script>
    <script src="assets/js/hospitals-search/customEase.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/hospitals-search/main.js"></script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement("script");
                    d.innerHTML =
                        "window.__CF$cv$params={r:'957ccb537dc14014',t:'MTc1MTI3NzM5Mi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName("head")[0].appendChild(d);
                }
            }
            if (document.body) {
                var a = document.createElement("iframe");
                a.height = 1;
                a.width = 1;
                a.style.position = "absolute";
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = "none";
                a.style.visibility = "hidden";
                document.body.appendChild(a);
                if ("loading" !== document.readyState) c();
                else if (window.addEventListener)
                    document.addEventListener("DOMContentLoaded", c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        "loading" !== document.readyState &&
                            ((document.onreadystatechange = e), c());
                    };
                }
            }
        })();
    </script>
</body>

</html>