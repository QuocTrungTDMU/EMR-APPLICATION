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

    <!-- Top Specialization Section Start -->
    <div class="container style-one ptb-120">
        <div class="text-center">
            <h6
                class="section-subtitle fw-medium font-primary d-inline-block text_secondary position-relative mb-15"
                data-aos="fade-up"
                data-aos-duration="1100"
                data-aos-delay="200">
                CATEGORIES
            </h6>
            <h2
                class="section-title title-anim fw-black text-title mb-45 me-xxl-5"
                data-aos="fade-up"
                data-aos-duration="1100"
                data-aos-delay="300">
                Top Searched Specialities
            </h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-6">
                <div class="category-card style-four round-20 mb-30 transition">
                    <div class="category-title d-flex flex-wrap align-items-center">
                        <div
                            class="category-icon bg-yellow d-flex flex-column align-items-center justify-content-center rounded-circle">
                            <img src="assets/images/hospitals-search/icons/stethoscope-large.svg" alt="Icon" />
                        </div>
                        <h3 class="fs-24 fw-extrabold">
                            <a
                                href="doctors-search.html"
                                class="text-title link-hover-primary hover-text-primary">Primary Care</a>
                        </h3>
                    </div>
                    <p>
                        Our medical center we are committed to delivering exceptional
                        healthcare services tailored meet the needs every patient
                        technology and staffed
                    </p>
                    <a
                        href="about.html"
                        class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                        <span>Read More
                            <img
                                src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                                alt="Icon"
                                class="transition icon-left" />
                        </span>
                        <img
                            src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                            alt="Icon"
                            class="transition icon-right" />
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="category-card style-four round-20 mb-30 transition">
                    <div class="category-title d-flex flex-wrap align-items-center">
                        <div
                            class="category-icon bg-flower d-flex flex-column align-items-center justify-content-center rounded-circle">
                            <img src="assets/images/hospitals-search/icons/cardiogram-large.svg" alt="Icon" />
                        </div>
                        <h3 class="fs-24 fw-extrabold">
                            <a
                                href="doctors-search.html"
                                class="text-title link-hover-primary hover-text-primary">Cardiology</a>
                        </h3>
                    </div>
                    <p>
                        Our medical center we are committed to delivering exceptional
                        healthcare services tailored meet the needs every patient
                        technology and staffed
                    </p>
                    <a
                        href="about.html"
                        class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                        <span>Read More
                            <img
                                src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                                alt="Icon"
                                class="transition icon-left" />
                        </span>
                        <img
                            src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                            alt="Icon"
                            class="transition icon-right" />
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="category-card style-four round-20 mb-30 transition">
                    <div class="category-title d-flex flex-wrap align-items-center">
                        <div
                            class="category-icon bg-melanine d-flex flex-column align-items-center justify-content-center rounded-circle">
                            <img src="assets/images/hospitals-search/icons/kidney-large.svg" alt="Icon" />
                        </div>
                        <h3 class="fs-24 fw-extrabold">
                            <a
                                href="doctors-search.html"
                                class="text-title link-hover-primary hover-text-primary">Psychologist</a>
                        </h3>
                    </div>
                    <p>
                        Our medical center we are committed to delivering exceptional
                        healthcare services tailored meet the needs every patient
                        technology and staffed
                    </p>
                    <a
                        href="about.html"
                        class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                        <span>Read More
                            <img
                                src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                                alt="Icon"
                                class="transition icon-left" />
                        </span>
                        <img
                            src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                            alt="Icon"
                            class="transition icon-right" />
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="category-card style-four round-20 mb-30 transition">
                    <div class="category-title d-flex flex-wrap align-items-center">
                        <div
                            class="category-icon bg-mauve d-flex flex-column align-items-center justify-content-center rounded-circle">
                            <img src="assets/images/hospitals-search/icons/wheelchair-large.svg" alt="Icon" />
                        </div>
                        <h3 class="fs-24 fw-extrabold">
                            <a
                                href="doctors-search.html"
                                class="text-title link-hover-primary hover-text-primary">Posologist</a>
                        </h3>
                    </div>
                    <p>
                        Our medical center we are committed to delivering exceptional
                        healthcare services tailored meet the needs every patient
                        technology and staffed
                    </p>
                    <a
                        href="about.html"
                        class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                        <span>Read More
                            <img
                                src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                                alt="Icon"
                                class="transition icon-left" />
                        </span>
                        <img
                            src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                            alt="Icon"
                            class="transition icon-right" />
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="category-card style-four round-20 mb-30 transition">
                    <div class="category-title d-flex flex-wrap align-items-center">
                        <div
                            class="category-icon bg-jordyBlue d-flex flex-column align-items-center justify-content-center rounded-circle">
                            <img src="assets/images/hospitals-search/icons/microscope-large.svg" alt="Icon" />
                        </div>
                        <h3 class="fs-24 fw-extrabold">
                            <a
                                href="doctors-search.html"
                                class="text-title link-hover-primary hover-text-primary">Laboratory</a>
                        </h3>
                    </div>
                    <p>
                        Our medical center we are committed to delivering exceptional
                        healthcare services tailored meet the needs every patient
                        technology and staffed
                    </p>
                    <a
                        href="about.html"
                        class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                        <span>Read More
                            <img
                                src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                                alt="Icon"
                                class="transition icon-left" />
                        </span>
                        <img
                            src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                            alt="Icon"
                            class="transition icon-right" />
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="category-card style-four round-20 mb-30 transition">
                    <div class="category-title d-flex flex-wrap align-items-center">
                        <div
                            class="category-icon bg-morning d-flex flex-column align-items-center justify-content-center rounded-circle">
                            <img src="assets/images/hospitals-search/icons/eye-large.svg" alt="Icon" />
                        </div>
                        <h3 class="fs-24 fw-extrabold">
                            <a
                                href="doctors-search.html"
                                class="text-title link-hover-primary hover-text-primary">Chiropractor</a>
                        </h3>
                    </div>
                    <p>
                        Our medical center we are committed to delivering exceptional
                        healthcare services tailored meet the needs every patient
                        technology and staffed
                    </p>
                    <a
                        href="about.html"
                        class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                        <span>Read More
                            <img
                                src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                                alt="Icon"
                                class="transition icon-left" />
                        </span>
                        <img
                            src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                            alt="Icon"
                            class="transition icon-right" />
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="category-card style-four round-20 mb-30 transition">
                    <div class="category-title d-flex flex-wrap align-items-center">
                        <div
                            class="category-icon bg-berylGreen d-flex flex-column align-items-center justify-content-center rounded-circle">
                            <img src="assets/images/hospitals-search/icons/drugs-large.svg" alt="Icon" />
                        </div>
                        <h3 class="fs-24 fw-extrabold">
                            <a
                                href="doctors-search.html"
                                class="text-title link-hover-primary hover-text-primary">Pediatrician</a>
                        </h3>
                    </div>
                    <p>
                        Our medical center we are committed to delivering exceptional
                        healthcare services tailored meet the needs every patient
                        technology and staffed
                    </p>
                    <a
                        href="about.html"
                        class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                        <span>Read More
                            <img
                                src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                                alt="Icon"
                                class="transition icon-left" />
                        </span>
                        <img
                            src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                            alt="Icon"
                            class="transition icon-right" />
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="category-card style-four round-20 mb-30 transition">
                    <div class="category-title d-flex flex-wrap align-items-center">
                        <div
                            class="category-icon bg-chard d-flex flex-column align-items-center justify-content-center rounded-circle">
                            <img src="assets/images/hospitals-search/icons/syringe-large.svg" alt="Icon" />
                        </div>
                        <h3 class="fs-24 fw-extrabold">
                            <a
                                href="doctors-search.html"
                                class="text-title link-hover-primary hover-text-primary">Blood Test</a>
                        </h3>
                    </div>
                    <p>
                        Our medical center we are committed to delivering exceptional
                        healthcare services tailored meet the needs every patient
                        technology and staffed
                    </p>
                    <a
                        href="about.html"
                        class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                        <span>Read More
                            <img
                                src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                                alt="Icon"
                                class="transition icon-left" />
                        </span>
                        <img
                            src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                            alt="Icon"
                            class="transition icon-right" />
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="category-card style-four round-20 mb-30 transition">
                    <div class="category-title d-flex flex-wrap align-items-center">
                        <div
                            class="category-icon bg-mailbu d-flex flex-column align-items-center justify-content-center rounded-circle">
                            <img src="assets/images/hospitals-search/icons/endoscopy.svg" alt="Icon" />
                        </div>
                        <h3 class="fs-24 fw-extrabold">
                            <a
                                href="doctors-search.html"
                                class="text-title link-hover-primary hover-text-primary">Endoscopy</a>
                        </h3>
                    </div>
                    <p>
                        Our medical center we are committed to delivering exceptional
                        healthcare services tailored meet the needs every patient
                        technology and staffed
                    </p>
                    <a
                        href="about.html"
                        class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                        <span>Read More
                            <img
                                src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                                alt="Icon"
                                class="transition icon-left" />
                        </span>
                        <img
                            src="assets/images/hospitals-search/icons/long-arrow-right-blue.svg"
                            alt="Icon"
                            class="transition icon-right" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Specialization Section End -->

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