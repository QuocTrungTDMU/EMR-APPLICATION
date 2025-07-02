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

    <!-- Hospital Section Start -->
    <div class="container style-one ptb-120">
        <div class="filter-box style-one round-20">
            <form action="#" class="form-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="form-group mb-25">
                            <label
                                for="name"
                                class="text-title fw-medium fs-xx-14 d-block mb-13">Name</label>
                            <input
                                type="text"
                                placeholder="Type A Name"
                                class="fs-xx-14 w-100 ht-56 round-10 bg-ash text-para border-0"
                                name="name"
                                id="name" />
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="form-group mb-25">
                            <label
                                for="service_name"
                                class="text-title fs-xx-14 fw-medium d-block mb-13">Services</label>
                            <select
                                name="service_name"
                                id="service_name"
                                class="fs-xx-14 w-100 ht-56 round-10 bg-ash text-para border-0">
                                <option value="0">Select Services</option>
                                <option value="1">Cardiology</option>
                                <option value="2">Oncology</option>
                                <option value="3">Gastrology</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="form-group mb-25">
                            <label
                                for="facility_name"
                                class="text-title fs-xx-14 fw-medium d-block mb-13">Facility</label>
                            <select
                                name="facility_name"
                                id="facility_name"
                                class="fs-xx-14 w-100 ht-56 round-10 bg-ash text-para border-0">
                                <option value="0">Select Facility</option>
                                <option value="1">Cardiology</option>
                                <option value="2">Oncology</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="form-group mb-25">
                            <label
                                for="location"
                                class="text-title fs-xx-14 fw-medium d-block mb-13">Location</label>
                            <input
                                type="text"
                                placeholder="Type City Name"
                                class="fs-xx-14 w-100 ht-56 round-10 bg-ash text-para border-0"
                                name="location"
                                id="location" />
                        </div>
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col-lg-9">
                        <ul class="search-tag list-unstyled mb-0">
                            <li class="position-relative fs-xx-14">
                                <input type="radio" id="test1" name="radio-group" checked />
                                <label for="test1">Family Medicine</label>
                            </li>
                            <li class="position-relative fs-xx-14">
                                <input type="radio" id="test2" name="radio-group" />
                                <label for="test2">Nerusurgery</label>
                            </li>
                            <li class="position-relative fs-xx-14">
                                <input type="radio" id="test3" name="radio-group" />
                                <label for="test3">Dentist</label>
                            </li>
                            <li class="position-relative fs-xx-14">
                                <input type="radio" id="test4" name="radio-group" />
                                <label for="test4">Pediatrics</label>
                            </li>
                            <li class="position-relative fs-xx-14">
                                <input type="radio" id="test5" name="radio-group" />
                                <label for="test5">Chief Surgeon</label>
                            </li>
                            <li class="position-relative fs-xx-14">
                                <input type="radio" id="test6" name="radio-group" />
                                <label for="test6">Cardiologist</label>
                            </li>
                            <li class="position-relative fs-xx-14">
                                <input type="radio" id="test7" name="radio-group" />
                                <label for="test7">Dermatologist</label>
                            </li>
                            <li class="position-relative fs-xx-14">
                                <input type="radio" id="test1" name="radio-group" />
                                <label for="test1">Neurologist</label>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 text-lg-end">
                        <button
                            href="about.html"
                            class="btn style-two d-inline-block font-secondary fw-bold position-relative z-1 round-10 mt-2">
                            <span>Search Now
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
                    </div>
                </div>
            </form>
        </div>
        <div class="row justify-content-center pt-120">
            <div class="col-xxl-6">
                <div
                    class="hospital-card style-four bg-white d-flex flex-wrap align-items-center round-20 mb-30 transition"
                    data-aos="fade-up"
                    data-aos-duration="1100"
                    data-aos-delay="200">
                    <div class="hospital-img position-relative round-10">
                        <img
                            src="assets/images/hospitals-search/hospitals/hospital-24.jpg"
                            alt="Doctor"
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
                        <div
                            class="d-flex flex-wrap align-items-center justify-content-between mb-23">
                            <a
                                href="doctors-list.html"
                                class="hospital-category style-two bg_secondary d-inline-block text-white fw-medium round-5 transition">Hospital</a>
                            <div class="ratings d-flex align-items-center">
                                <i class="ri-star-fill"></i>
                                <span class="ms-2">1k+ Rating</span>
                            </div>
                        </div>
                        <h3 class="fs-24 fw-extrabold mb-15">
                            <a
                                href="hospital-details.html"
                                class="text-title hover-text-primary link-hover-primary transition">Elite Urology Specialists</a>
                        </h3>
                        <p class="hospital-location position-relative ps-4">
                            <img
                                src="assets/images/hospitals-search/icons/pin-black.svg"
                                alt="Icon"
                                class="position-absolute start-0" />1409 Girilaya Madya Stree
                        </p>
                        <div
                            class="hospital-action-btn position-relative d-flex flex-wrap align-items-center justify-content-between">
                            <a
                                href="appointment-booking.html"
                                class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                                <span>Book Today
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
                            <span class="position-relative booking-link fs-xx-14 text-para"><img
                                    src="assets/images/hospitals-search/icons/stethoscope.svg"
                                    alt="Icon"
                                    class="position-absolute start-0" />60 Doctors</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6">
                <div
                    class="hospital-card style-four bg-white d-flex flex-wrap align-items-center round-20 mb-30 transition"
                    data-aos="fade-up"
                    data-aos-duration="1100"
                    data-aos-delay="200">
                    <div class="hospital-img position-relative round-10">
                        <img
                            src="assets/images/hospitals-search/hospitals/hospital-25.jpg"
                            alt="Doctor"
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
                        <div
                            class="d-flex flex-wrap align-items-center justify-content-between mb-23">
                            <a
                                href="doctors-list.html"
                                class="hospital-category style-two bg_secondary d-inline-block text-white fw-medium round-5 transition">Hospital</a>
                            <div class="ratings d-flex align-items-center">
                                <i class="ri-star-fill"></i>
                                <span class="ms-2">3k+ Rating</span>
                            </div>
                        </div>
                        <h3 class="fs-24 fw-extrabold mb-15">
                            <a
                                href="hospital-details.html"
                                class="text-title hover-text-primary link-hover-primary transition">Rejuvenete Wellness Center</a>
                        </h3>
                        <p class="hospital-location position-relative ps-4">
                            <img
                                src="assets/images/hospitals-search/icons/pin-black.svg"
                                alt="Icon"
                                class="position-absolute start-0" />56 North Decota, Texas, USA
                        </p>
                        <div
                            class="hospital-action-btn position-relative d-flex flex-wrap align-items-center justify-content-between">
                            <a
                                href="appointment-booking.html"
                                class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                                <span>Book Today
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
                            <span class="position-relative booking-link fs-xx-14 text-para"><img
                                    src="assets/images/hospitals-search/icons/stethoscope.svg"
                                    alt="Icon"
                                    class="position-absolute start-0" />34 Doctors</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6">
                <div
                    class="hospital-card style-four bg-white d-flex flex-wrap align-items-center round-20 mb-30 transition"
                    data-aos="fade-up"
                    data-aos-duration="1100"
                    data-aos-delay="200">
                    <div class="hospital-img position-relative round-10">
                        <img
                            src="assets/images/hospitals-search/hospitals/hospital-26.jpg"
                            alt="Doctor"
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
                        <div
                            class="d-flex flex-wrap align-items-center justify-content-between mb-23">
                            <a
                                href="doctors-list.html"
                                class="hospital-category style-two bg_secondary d-inline-block text-white fw-medium round-5 transition">Hospital</a>
                            <div class="ratings d-flex align-items-center">
                                <i class="ri-star-fill"></i>
                                <span class="ms-2">2k+ Rating</span>
                            </div>
                        </div>
                        <h3 class="fs-24 fw-extrabold mb-15">
                            <a
                                href="hospital-details.html"
                                class="text-title hover-text-primary link-hover-primary transition">Percision Pain Management</a>
                        </h3>
                        <p class="hospital-location position-relative ps-4">
                            <img
                                src="assets/images/hospitals-search/icons/pin-black.svg"
                                alt="Icon"
                                class="position-absolute start-0" />23rd St Street, Florida, USA
                        </p>
                        <div
                            class="hospital-action-btn position-relative d-flex flex-wrap align-items-center justify-content-between">
                            <a
                                href="appointment-booking.html"
                                class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                                <span>Book Today
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
                            <span class="position-relative booking-link fs-xx-14 text-para"><img
                                    src="assets/images/hospitals-search/icons/stethoscope.svg"
                                    alt="Icon"
                                    class="position-absolute start-0" />30 Doctors</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6">
                <div
                    class="hospital-card style-four bg-white d-flex flex-wrap align-items-center round-20 mb-30 transition"
                    data-aos="fade-up"
                    data-aos-duration="1100"
                    data-aos-delay="200">
                    <div class="hospital-img position-relative round-10">
                        <img
                            src="assets/images/hospitals-search/hospitals/hospital-27.jpg"
                            alt="Doctor"
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
                        <div
                            class="d-flex flex-wrap align-items-center justify-content-between mb-23">
                            <a
                                href="doctors-list.html"
                                class="hospital-category style-two bg_secondary d-inline-block text-white fw-medium round-5 transition">Hospital</a>
                            <div class="ratings d-flex align-items-center">
                                <i class="ri-star-fill"></i>
                                <span class="ms-2">4k+ Rating</span>
                            </div>
                        </div>
                        <h3 class="fs-24 fw-extrabold mb-15">
                            <a
                                href="hospital-details.html"
                                class="text-title hover-text-primary link-hover-primary transition">Wellness Path Chiropractor</a>
                        </h3>
                        <p class="hospital-location position-relative ps-4">
                            <img
                                src="assets/images/hospitals-search/icons/pin-black.svg"
                                alt="Icon"
                                class="position-absolute start-0" />123 St Luis Ave, Osaka, Canada
                        </p>
                        <div
                            class="hospital-action-btn position-relative d-flex flex-wrap align-items-center justify-content-between">
                            <a
                                href="appointment-booking.html"
                                class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                                <span>Book Today
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
                            <span class="position-relative booking-link fs-xx-14 text-para"><img
                                    src="assets/images/hospitals-search/icons/stethoscope.svg"
                                    alt="Icon"
                                    class="position-absolute start-0" />80 Doctors</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6">
                <div
                    class="hospital-card style-four bg-white d-flex flex-wrap align-items-center round-20 mb-30 transition"
                    data-aos="fade-up"
                    data-aos-duration="1100"
                    data-aos-delay="200">
                    <div class="hospital-img position-relative round-10">
                        <img
                            src="assets/images/hospitals-search/hospitals/hospital-28.jpg"
                            alt="Doctor"
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
                        <div
                            class="d-flex flex-wrap align-items-center justify-content-between mb-23">
                            <a
                                href="doctors-list.html"
                                class="hospital-category style-two bg_secondary d-inline-block text-white fw-medium round-5 transition">Hospital</a>
                            <div class="ratings d-flex align-items-center">
                                <i class="ri-star-fill"></i>
                                <span class="ms-2">5k+ Rating</span>
                            </div>
                        </div>
                        <h3 class="fs-24 fw-extrabold mb-15">
                            <a
                                href="hospital-details.html"
                                class="text-title hover-text-primary link-hover-primary transition">Future Care Medical Center</a>
                        </h3>
                        <p class="hospital-location position-relative ps-4">
                            <img
                                src="assets/images/hospitals-search/icons/pin-black.svg"
                                alt="Icon"
                                class="position-absolute start-0" />65 Osland Ave, Texas, USA
                        </p>
                        <div
                            class="hospital-action-btn position-relative d-flex flex-wrap align-items-center justify-content-between">
                            <a
                                href="appointment-booking.html"
                                class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                                <span>Book Today
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
                            <span class="position-relative booking-link fs-xx-14 text-para"><img
                                    src="assets/images/hospitals-search/icons/stethoscope.svg"
                                    alt="Icon"
                                    class="position-absolute start-0" />50 Doctors</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6">
                <div
                    class="hospital-card style-four bg-white d-flex flex-wrap align-items-center round-20 mb-30 transition"
                    data-aos="fade-up"
                    data-aos-duration="1100"
                    data-aos-delay="200">
                    <div class="hospital-img position-relative round-10">
                        <img
                            src="assets/images/hospitals-search/hospitals/hospital-29.jpg"
                            alt="Doctor"
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
                        <div
                            class="d-flex flex-wrap align-items-center justify-content-between mb-23">
                            <a
                                href="doctors-list.html"
                                class="hospital-category style-two bg_secondary d-inline-block text-white fw-medium round-5 transition">Hospital</a>
                            <div class="ratings d-flex align-items-center">
                                <i class="ri-star-fill"></i>
                                <span class="ms-2">3k+ Rating</span>
                            </div>
                        </div>
                        <h3 class="fs-24 fw-extrabold mb-15">
                            <a
                                href="hospital-details.html"
                                class="text-title hover-text-primary link-hover-primary transition">Quantam Care Hospital</a>
                        </h3>
                        <p class="hospital-location position-relative ps-4">
                            <img
                                src="assets/images/hospitals-search/icons/pin-black.svg"
                                alt="Icon"
                                class="position-absolute start-0" />64 Luis Ave, Osaka, Canada
                        </p>
                        <div
                            class="hospital-action-btn position-relative d-flex flex-wrap align-items-center justify-content-between">
                            <a
                                href="appointment-booking.html"
                                class="btn style-three font-secondary fw-semibold position-relative z-1 round-10">
                                <span>Book Today
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
                            <span class="position-relative booking-link fs-xx-14 text-para"><img
                                    src="assets/images/hospitals-search/icons/stethoscope.svg"
                                    alt="Icon"
                                    class="position-absolute start-0" />45 Doctors</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="page-nav pagination justify-content-center mb-0 mt-4">
            <li class="page-item">
                <a
                    class="page-link d-flex flex-column align-items-center justify-content-center rounded-circle"
                    href="hospitals-search.html"
                    aria-label="Previous">
                    <i class="ri-arrow-left-s-line"></i>
                </a>
            </li>
            <li class="page-item">
                <a
                    class="page-link d-flex flex-column align-items-center justify-content-center rounded-circle active"
                    href="hospitals-search.html">1</a>
            </li>
            <li class="page-item">
                <a
                    class="page-link d-flex flex-column align-items-center justify-content-center rounded-circle"
                    href="hospitals-search.html">2</a>
            </li>
            <li class="page-item">
                <a
                    class="page-link d-flex flex-column align-items-center justify-content-center rounded-circle"
                    href="hospitals-search.html">3</a>
            </li>
            <li class="page-item">
                <a
                    class="page-link d-flex flex-column align-items-center justify-content-center rounded-circle"
                    href="hospitals-search.html"
                    aria-label="Next">
                    <i class="ri-arrow-right-s-line"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- Hospital Section End -->

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