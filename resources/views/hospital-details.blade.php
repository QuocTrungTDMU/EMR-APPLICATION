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
    <section class="relative text-center">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-black bg-opacity-50 z-1" style="opacity: 0.5 !important;"></div>
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat bg-fixed "
            style="background-image: url('http://medik.wpenginepowered.com/wp-content/uploads/2020/02/breadcrumb-bg.jpg');">
        </div>

        <!-- Content -->
        <div class="relative z-10 container mx-auto px-4 py-16 md:py-10">
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

    <!-- Hospital Details Section Start -->
    <div class="container style-one ptb-120">
        <div class="row">
            <div class="col-xl-8 pe-xxl-4">
                <div class="hospital-desc">
                    <div
                        class="hospital-info-card d-md-flex flex-wrap align-items-center round-20 mb-30">
                        <div class="hospital-img position-relative round-10">
                            <img
                                src="assets/images/hospitals-search/hospitals/hospital-card.jpg"
                                alt="Image"
                                class="round-10" />
                            <div class="share-action d-flex flex-wrap position-absolute">
                                <div class="share-btn position-relative">
                                    <span
                                        class="d-flex flex-column align-items-center justify-content-center round-5 bg-white text-title fs-22"><i class="ri-share-line"></i></span>
                                    <ul class="social-profile list-unstyled mb-0 transition">
                                        <li>
                                            <a
                                                href="https://www.facebook.com/"
                                                target="_blank"
                                                class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-facebook-fill"></i></a>
                                        </li>
                                        <li>
                                            <a
                                                href="https://x.com/?lang=en"
                                                target="_blank"
                                                class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-twitter-x-line"></i></a>
                                        </li>
                                        <li>
                                            <a
                                                href="https://www.instagram.com/"
                                                target="_blank"
                                                class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-instagram-fill"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <button
                                    class="add-to-wishlist border-0 d-flex flex-column align-items-center justify-content-center round-5 bg-white text-title fs-22 transition">
                                    <i class="ri-heart-3-line"></i>
                                </button>
                            </div>
                        </div>
                        <div class="hospital-info">
                            <div class="ratings d-flex align-items-center">
                                <ul class="rating style-two list-unstyled mb-0">
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                </ul>
                                <span class="d-inline-block position-relative ms-2 lh-1">1K+ Rating</span>
                            </div>
                            <h3 class="fs-24 fw-extrabold text-title">
                                Trust Care Medical Group
                            </h3>
                            <p class="text-title fs-xxl-18 fw-medium mb-18">
                                Obstetrics & Genecology
                            </p>
                            <ul class="contact-info list-unstyled mb-0">
                                <li class="position-relative">
                                    <i class="ri-phone-line"></i><a
                                        href="tel:990055522233"
                                        class="text-para hover-text-primary">+99 00 555 222 33</a>
                                </li>
                                <li class="position-relative">
                                    <i class="ri-mail-line"></i><a
                                        href="/cdn-cgi/l/email-protection#ef8c80819b8e8c9baf828e9d868396819f868a9d8c8ac18c8082"
                                        class="text-para hover-text-primary"><span
                                            class="__cf_email__"
                                            data-cfemail="7615191802171502361b17041f1a0f18061f130415135815191b">[email&#160;protected]</span></a>
                                </li>
                                <li class="position-relative">
                                    <i class="ri-map-pin-line"></i>245 Street, Torento, Canada
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-para">
                        <h1>Overview Of Trust Care Medical Group</h1>
                        <p>
                            Our medical center is dedicated to providing comprehensive
                            patient centered healthcare with a commitment to excellence We
                            offer a broad range of medical services from preventive care and
                            routine check ups to specialized treatments across cardiology
                            orthopedics pediatrics and more our team of experienced doctors
                            nurses and support staff
                        </p>
                        <p>
                            Here to guide and care for you every step of the way using the
                            latest advancements in medical technology to ensure the highest
                            quality of care. With a focus on compassionate and personalized
                            treatment we strive to create a welcoming environment where
                            patients feel valued respected and well informed about their
                            health at our center
                        </p>
                    </div>
                    <div class="hospital-Image-slider swiper position-relative mb-30">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="hospital-img round-20">
                                    <img
                                        src="assets/images/hospitals-search/hospitals/single-hospital-1.jpg"
                                        alt="Hospital"
                                        class="round-20" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hospital-img round-20">
                                    <img
                                        src="assets/images/hospitals-search/hospitals/single-hospital-2.jpg"
                                        alt="Hospital"
                                        class="round-20" />
                                </div>
                            </div>
                        </div>
                        <div
                            class="slider-btn style-two d-flex flex-wrap align-items-center justify-content-end">
                            <button
                                class="prev-btn hospital-prev d-flex flex-column align-items-center justify-content-center border-0 rounded-circle transition">
                                <i class="ri-arrow-left-s-line"></i>
                            </button>
                            <button
                                class="next-btn hospital-next d-flex flex-column align-items-center justify-content-center border-0 rounded-circle transition">
                                <i class="ri-arrow-right-s-line"></i>
                            </button>
                        </div>
                    </div>
                    <div class="single-para">
                        <h2>Specialities</h2>
                        <p>
                            We offer a wide range of services including preventive care
                            diagnostics and specialized treatments in fields like
                            orthopedics and pediatric ensuring comprehensive care for the
                            whole family each member of our team is focused supporting
                            patients with personalized our goal is to create a welcoming
                            environment where patients feel empowered and supported
                        </p>
                        <ul class="feature-item-list style-one list-unstyled mt-4">
                            <li class="position-relative text-title fs-xxl-18 fw-semibold">
                                <img src="assets/images/hospitals-search/icons/check.svg" alt="Icon" />Qualified
                                Doctors
                            </li>
                            <li class="position-relative text-title fs-xxl-18 fw-semibold">
                                <img src="assets/images/hospitals-search/icons/check.svg" alt="Icon" />Lab
                                facilities
                            </li>
                            <li class="position-relative text-title fs-xxl-18 fw-semibold">
                                <img src="assets/images/hospitals-search/icons/check.svg" alt="Icon" />Emergency
                                Services
                            </li>
                            <li class="position-relative text-title fs-xxl-18 fw-semibold">
                                <img src="assets/images/hospitals-search/icons/check.svg" alt="Icon" />Advanced
                                Treatments
                            </li>
                            <li class="position-relative text-title fs-xxl-18 fw-semibold">
                                <img src="assets/images/hospitals-search/icons/check.svg" alt="Icon" />All
                                Advanced Equipment
                            </li>
                            <li class="position-relative text-title fs-xxl-18 fw-semibold">
                                <img src="assets/images/hospitals-search/icons/check.svg" alt="Icon" />Advanced
                                Medicine
                            </li>
                        </ul>
                    </div>
                    <div class="single-para">
                        <h3>Frequently Asked Questions</h3>
                        <p>
                            We offer a wide range of services including preventive care
                            diagnostics and specialized treatments in fields like
                            orthopedics and pediatric ensuring comprehensive care for the
                            whole family each member of our team is focused supporting
                            patients with personalized
                        </p>
                    </div>
                    <div class="accordion style-two" id="accordionExample_one">
                        <div
                            class="accordion-item round-10"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseFour"
                            aria-expanded="true"
                            aria-controls="collapseFour"
                            role="button">
                            <div class="accordion-header" id="headingFour">
                                <div class="accordion-button">
                                    <span class="accord-arrow">
                                        <i class="ri-add-line plus"></i>
                                        <i class="ri-subtract-line minus"></i>
                                    </span>
                                    <span class="text-para me-1">01.</span>What Happens If I
                                    Need To Go To A Hospital?
                                </div>
                            </div>
                            <div
                                id="collapseFour"
                                class="accordion-collapse collapse show"
                                aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample_one">
                                <div class="accordion-body">
                                    <p>
                                        Our medical center is dedicated to providing comprehensive
                                        patient centered healthcare with a commitment to
                                        excellence. We offer a broad range of medical services
                                        from preventive care and routine check ups to specialized
                                        support staff is here to guide and care for you every step
                                        of the way
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="accordion-item collapsed round-10"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseFive"
                            aria-expanded="false"
                            aria-controls="collapseFive"
                            role="button">
                            <div class="accordion-header" id="headingFive">
                                <div class="accordion-button">
                                    <span class="accord-arrow">
                                        <i class="ri-add-line plus"></i>
                                        <i class="ri-subtract-line minus"></i>
                                    </span>
                                    <span class="text-para me-1">02.</span>Can I Make Payment
                                    Arrangements On My Account?
                                </div>
                            </div>
                            <div
                                id="collapseFive"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample_one">
                                <div class="accordion-body">
                                    <p>
                                        Our medical center is dedicated to providing comprehensive
                                        patient centered healthcare with a commitment to
                                        excellence. We offer a broad range of medical services
                                        from preventive care and routine check ups to specialized
                                        support staff is here to guide and care for you every step
                                        of the way
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="accordion-item collapsed round-10"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseSix"
                            aria-expanded="false"
                            aria-controls="collapseSix"
                            role="button">
                            <div class="accordion-header" id="headingSix">
                                <div class="accordion-button">
                                    <span class="accord-arrow">
                                        <i class="ri-add-line plus"></i>
                                        <i class="ri-subtract-line minus"></i>
                                    </span>
                                    <span class="text-para me-1">03.</span>How Do I Request An
                                    Appointment?
                                </div>
                            </div>
                            <div
                                id="collapseSix"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample_one">
                                <div class="accordion-body">
                                    <p>
                                        Our medical center is dedicated to providing comprehensive
                                        patient centered healthcare with a commitment to
                                        excellence. We offer a broad range of medical services
                                        from preventive care and routine check ups to specialized
                                        support staff is here to guide and care for you every step
                                        of the way
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <aside class="sidebar">
                    <div
                        class="sidebar-widget style-two hospital-contact-widget round-20">
                        <div class="hospital-bg bg-f"></div>
                        <div class="hospital-info bg-title text-center">
                            <img
                                src="assets/images/hospitals-search/hospitals/hospital-logo.png"
                                alt="Image"
                                class="d-block mx-auto mb-25" />
                            <h4 class="fs-24 fw-extrabold text-white mb-12">
                                For Any Service to Contact us
                            </h4>
                            <p class="text-white px-xl-5 mx-xl-5 mb-25">
                                If you need any help please feel free to contact us
                            </p>
                            <a
                                href="contact.html"
                                class="btn style-one font-secondary fw-semibold position-relative z-1 round-10">
                                <span>Contact Us
                                    <img
                                        src="assets/images/hospitals-search/icons/right-arrow-white.svg"
                                        alt="Icon"
                                        class="transition icon-left" />
                                </span>
                                <img
                                    src="assets/images/hospitals-search/icons/right-arrow-white.svg"
                                    alt="Icon"
                                    class="transition icon-right" />
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-widget category-widget round-20">
                        <h3
                            class="sidebar-widget-title fs-24 fw-extrabold text-title mb-22">
                            Get In Touch
                        </h3>
                        <form action="#" class="form-wrapper">
                            <div class="form-group position-relative mb-25">
                                <input
                                    type="text"
                                    required
                                    class="fs-xx-14 w-100 h-60 round-10 bg-ash text-para border-0"
                                    placeholder="Name" />
                                <img src="assets/images/hospitals-search/icons/person-gray.svg" alt="Icon" />
                            </div>
                            <div class="form-group position-relative mb-25">
                                <input
                                    type="email"
                                    placeholder="Email"
                                    required
                                    class="fs-xx-14 w-100 h-60 round-10 bg-ash text-para border-0" />
                                <img src="assets/images/hospitals-search/icons/mail-gray.svg" alt="Icon" />
                            </div>
                            <div class="form-group mb-25">
                                <textarea
                                    name="messages"
                                    id="messages"
                                    cols="30"
                                    rows="10"
                                    placeholder="Message"
                                    class="fs-xx-14 w-100 ht-150 round-10 bg-ash text-para resize-0 border-0"></textarea>
                            </div>
                            <button
                                type="submit"
                                class="btn style-two font-secondary fw-medium position-relative z-1 round-6 d-block w-100">
                                <span>Send Message
                                    <img
                                        src="assets/images/hospitals-search/icons/right-arrow-white.svg"
                                        alt="Icon"
                                        class="transition icon-left" />
                                </span>
                                <img
                                    src="assets/images/hospitals-search/icons/right-arrow-white.svg"
                                    alt="Icon"
                                    class="transition icon-right" />
                            </button>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- Hospital Details Section End -->

    <!-- Doctor Section Start -->
    <div class="container style-one pb-90">
        <div class="row align-items-center mb-25">
            <div class="col-md-7 mb-sm-10">
                <h2 class="section-title title-anim fw-black text-title mb-0">
                    Hospital Doctors
                </h2>
            </div>
            <div class="col-md-5">
                <div
                    class="slider-btn style-one d-flex flex-wrap align-items-center justify-content-md-end">
                    <button
                        class="prev-btn doctor-prev border-0 me-2 d-flex flex-column align-items-center justify-content-center rounded-circle transition">
                        <i class="ri-arrow-left-s-line"></i>
                    </button>
                    <button
                        class="next-btn doctor-next border-0 ms-2 d-flex flex-column align-items-center justify-content-center rounded-circle transition">
                        <i class="ri-arrow-right-s-line"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="doctor-slider-one swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="doctor-card style-three mt-2 mb-30 round-20">
                        <div class="doctor-img position-relative round-10 mb-32">
                            <img
                                src="assets/images/hospitals-search/doctors/doctor-6.jpg"
                                alt="Image"
                                class="round-10" />
                            <ul
                                class="social-profile list-unstyled mb-0 position-absolute transition">
                                <li>
                                    <a
                                        href="https://www.facebook.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-facebook-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://x.com/?lang=en"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-twitter-x-line"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.instagram.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-instagram-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.linkedin.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-linkedin-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="doctor-info text-center">
                            <h3 class="fs-24 fw-extrabold mb-13">
                                <a
                                    href="doctor-details.html"
                                    class="text-title hover-text-primary">Dr. Robert Schrock</a>
                            </h3>
                            <span>Cardiologist</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="doctor-card style-three mt-2 mb-30 round-20">
                        <div class="doctor-img position-relative round-10 mb-32">
                            <img
                                src="assets/images/hospitals-search/doctors/doctor-2.jpg"
                                alt="Image"
                                class="round-10" />
                            <ul
                                class="social-profile list-unstyled mb-0 position-absolute transition">
                                <li>
                                    <a
                                        href="https://www.facebook.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-facebook-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://x.com/?lang=en"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-twitter-x-line"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.instagram.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-instagram-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.linkedin.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-linkedin-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="doctor-info text-center">
                            <h3 class="fs-24 fw-extrabold mb-13">
                                <a
                                    href="doctor-details.html"
                                    class="text-title hover-text-primary">Dr. Patrick Smith</a>
                            </h3>
                            <span>Neurosurgery</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="doctor-card style-three mt-2 mb-30 round-20">
                        <div class="doctor-img position-relative round-10 mb-32">
                            <img
                                src="assets/images/hospitals-search/doctors/doctor-3.jpg"
                                alt="Image"
                                class="round-10" />
                            <ul
                                class="social-profile list-unstyled mb-0 position-absolute transition">
                                <li>
                                    <a
                                        href="https://www.facebook.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-facebook-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://x.com/?lang=en"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-twitter-x-line"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.instagram.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-instagram-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.linkedin.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-linkedin-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="doctor-info text-center">
                            <h3 class="fs-24 fw-extrabold mb-13">
                                <a
                                    href="doctor-details.html"
                                    class="text-title hover-text-primary">Dr. Patrick Smith</a>
                            </h3>
                            <span>Neurology</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="doctor-card style-three mt-2 mb-30 round-20">
                        <div class="doctor-img position-relative round-10 mb-32">
                            <img
                                src="assets/images/hospitals-search/doctors/doctor-4.jpg"
                                alt="Image"
                                class="round-10" />
                            <ul
                                class="social-profile list-unstyled mb-0 position-absolute transition">
                                <li>
                                    <a
                                        href="https://www.facebook.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-facebook-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://x.com/?lang=en"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-twitter-x-line"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.instagram.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-instagram-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.linkedin.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-linkedin-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="doctor-info text-center">
                            <h3 class="fs-24 fw-extrabold mb-13">
                                <a
                                    href="doctor-details.html"
                                    class="text-title hover-text-primary">Dr. Brenton Ottinger</a>
                            </h3>
                            <span>Dentristy</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="doctor-card style-three mt-2 mb-30 round-20">
                        <div class="doctor-img position-relative round-10 mb-32">
                            <img
                                src="assets/images/hospitals-search/doctors/doctor-5.jpg"
                                alt="Image"
                                class="round-10" />
                            <ul
                                class="social-profile list-unstyled mb-0 position-absolute transition">
                                <li>
                                    <a
                                        href="https://www.facebook.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-facebook-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://x.com/?lang=en"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-twitter-x-line"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.instagram.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-instagram-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.linkedin.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-linkedin-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="doctor-info text-center">
                            <h3 class="fs-24 fw-extrabold mb-13">
                                <a
                                    href="doctor-details.html"
                                    class="text-title hover-text-primary">Dr. Elaine Maloni</a>
                            </h3>
                            <span>Cheif Surgeon</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="doctor-card style-three mt-2 mb-30 round-20">
                        <div class="doctor-img position-relative round-10 mb-32">
                            <img
                                src="assets/images/hospitals-search/doctors/doctor-7.jpg"
                                alt="Image"
                                class="round-10" />
                            <ul
                                class="social-profile list-unstyled mb-0 position-absolute transition">
                                <li>
                                    <a
                                        href="https://www.facebook.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-facebook-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://x.com/?lang=en"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-twitter-x-line"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.instagram.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-instagram-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.linkedin.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-linkedin-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="doctor-info text-center">
                            <h3 class="fs-24 fw-extrabold mb-13">
                                <a
                                    href="doctor-details.html"
                                    class="text-title hover-text-primary">Dr. Joshua Searle</a>
                            </h3>
                            <span>Neurologist</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="doctor-card style-three mt-2 mb-30 round-20">
                        <div class="doctor-img position-relative round-10 mb-32">
                            <img
                                src="assets/images/hospitals-search/doctors/doctor-8.jpg"
                                alt="Image"
                                class="round-10" />
                            <ul
                                class="social-profile list-unstyled mb-0 position-absolute transition">
                                <li>
                                    <a
                                        href="https://www.facebook.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-facebook-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://x.com/?lang=en"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-twitter-x-line"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.instagram.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-instagram-fill"></i></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.linkedin.com/"
                                        target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center round-5 transition"><i class="ri-linkedin-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="doctor-info text-center">
                            <h3 class="fs-24 fw-extrabold mb-13">
                                <a
                                    href="doctor-details.html"
                                    class="text-title hover-text-primary">Dr. Benita James</a>
                            </h3>
                            <span>Dermatologist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Doctor Section End -->

    <!-- Brand Section Start -->
    <div class="bg-ash ptb-120">
        <div class="container style-one">
            <h3 class="fs-20 fw-semibold text-title text-center mb-55">
                TRUSTED BY MORE THAN <span class="text_primary">100+</span> COMPANIES
                WORLDWIDE
            </h3>
            <div class="brand-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide">
                        <div class="brand-logo">
                            <img
                                src="assets/images/hospitals-search/brand/brand-1.svg"
                                alt="Brand Logo"
                                class="d-block mx-auto" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-logo">
                            <img
                                src="assets/images/hospitals-search/brand/brand-2.svg"
                                alt="Brand Logo"
                                class="d-block mx-auto" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-logo">
                            <img
                                src="assets/images/hospitals-search/brand/brand-3.svg"
                                alt="Brand Logo"
                                class="d-block mx-auto" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-logo">
                            <img
                                src="assets/images/hospitals-search/brand/brand-4.svg"
                                alt="Brand Logo"
                                class="d-block mx-auto" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-logo">
                            <img
                                src="assets/images/hospitals-search/brand/brand-5.svg"
                                alt="Brand Logo"
                                class="d-block mx-auto" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-logo">
                            <img
                                src="assets/images/hospitals-search/brand/brand-6.svg"
                                alt="Brand Logo"
                                class="d-block mx-auto" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-logo">
                            <img
                                src="assets/images/hospitals-search/brand/brand-1.svg"
                                alt="Brand Logo"
                                class="d-block mx-auto" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-logo">
                            <img
                                src="assets/images/hospitals-search/brand/brand-2.svg"
                                alt="Brand Logo"
                                class="d-block mx-auto" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-logo">
                            <img
                                src="assets/images/hospitals-search/brand/brand-3.svg"
                                alt="Brand Logo"
                                class="d-block mx-auto" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Section End -->

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