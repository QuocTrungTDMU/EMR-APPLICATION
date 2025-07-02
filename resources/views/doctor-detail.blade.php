<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Medically | Health &amp; Medical Next Js Template</title>
    <meta name="next-head-count" content="3" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin="true" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        rel="preload"
        href="/assets/css/doctor-detail/17ce6531140dca3c.css"
        as="style" />
    <link
        rel="stylesheet"
        href="/assets/css/doctor-detail/17ce6531140dca3c.css"
        data-n-g="" />
    <noscript data-n-css=""></noscript>

    <!-- ✅ FontAwesome 6.0 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- font-flaticon CSS -->
    <script src="
https://cdn.jsdelivr.net/npm/@flaticon/flaticon-uicons@3.3.1/license.min.js
"></script>
    <link href="
https://cdn.jsdelivr.net/npm/@flaticon/flaticon-uicons@3.3.1/css/all/all.min.css
" rel="stylesheet">


    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css" type="text/css" media="all" />


    <!-- modernizr js -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/clash-display" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/aos.css" />

    <style>
        .fixed-navbar {
            position: fixed;
            /* Cố định navbar trên cùng */
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            /* Đảm bảo navbar luôn nằm trên các phần tử khác */
            background-color: #fff;
            /* Nền trắng để không bị trong suốt */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Tùy chọn để tạo độ nổi */
        }
    </style>


    <style
        data-href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiAyp8kv8JHgFVrJJLmE3tG.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 200;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmv1plEw.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLm21llEw.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiGyp8kv8JHgFVrJJLedA.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmg1hlEw.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmr19lEw.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmy15lEw.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 800;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLm111lEw.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLm81xlEw.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiGyp8kv8JHgFVrLPTedA.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 200;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLFj_V1g.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLDz8V1g.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiEyp8kv8JHgFVrFJM.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLGT9V1g.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLEj6V1g.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLCz7V1g.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 800;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLDD4V1g.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLBT5V1g.woff) format("woff");
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiAyp8kv8JHgFVrJJLmE0tMMPKhSkFEkm8.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiAyp8kv8JHgFVrJJLmE0tCMPKhSkFE.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 200;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmv1pVGdeOYktMqlap.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 200;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmv1pVF9eOYktMqg.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLm21lVGdeOYktMqlap.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLm21lVF9eOYktMqg.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiGyp8kv8JHgFVrJJLufntAOvWDSHFF.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiGyp8kv8JHgFVrJJLucHtAOvWDSA.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmg1hVGdeOYktMqlap.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmg1hVF9eOYktMqg.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmr19VGdeOYktMqlap.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmr19VF9eOYktMqg.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmy15VGdeOYktMqlap.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLmy15VF9eOYktMqg.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 800;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLm111VGdeOYktMqlap.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 800;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLm111VF9eOYktMqg.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLm81xVGdeOYktMqlap.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: italic;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiDyp8kv8JHgFVrJJLm81xVF9eOYktMqg.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiGyp8kv8JHgFVrLPTufntAOvWDSHFF.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiGyp8kv8JHgFVrLPTucHtAOvWDSA.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 200;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLFj_Z1JlFd2JQEl8qw.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 200;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLFj_Z1xlFd2JQEk.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLDz8Z1JlFd2JQEl8qw.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLDz8Z1xlFd2JQEk.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiEyp8kv8JHgFVrJJnecnFHGPezSQ.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiEyp8kv8JHgFVrJJfecnFHGPc.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLGT9Z1JlFd2JQEl8qw.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLGT9Z1xlFd2JQEk.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLEj6Z1JlFd2JQEl8qw.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLEj6Z1xlFd2JQEk.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLCz7Z1JlFd2JQEl8qw.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLCz7Z1xlFd2JQEk.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 800;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLDD4Z1JlFd2JQEl8qw.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 800;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLDD4Z1xlFd2JQEk.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLBT5Z1JlFd2JQEl8qw.woff2) format("woff2");
            unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7,
                U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F,
                U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F,
                U+A720-A7FF;
        }

        @font-face {
            font-family: "Poppins";
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v22/pxiByp8kv8JHgFVrLBT5Z1xlFd2JQEk.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122,
                U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/notifications.css'])
    @stack('styles')
    @yield('head')


<body class="flex flex-col min-h-screen">
    <main class="flex-grow min-h-[calc(100vh-100px)]">
        <div id="__next">
            <div>
                <div class="fixed-navbar">
                    @include('partials.header')
                </div>
                <section class="hero_section">
                    <div class="bg_shape"><svg viewBox="0 0 1920 1075" fill="none">
                            <path d="M0 0H1920V1000C1920 1000 1632 619 962 917C292 1215 0 1000 0 1000V0Z" fill="#EBF7FF"></path>
                        </svg></div>
                    <div class="content">
                        <h2>We are Here for You</h2>
                        <h3>Helping People Lead Healthy &amp; Happy Lives</h3>
                        <p>Nisi molestie fusce quis eget vitae. Aliquam senectus id placerat egestas sed sed venenatis nisl. Tincidunt faucibus facilisi vestibulum et ut congue in eget. Augue purus hendrerit tempus consequat ut sit.</p><a class="theme-btn" href="/about">Make Appointment</a>
                    </div>
                    <div class="image_content">
                        <div class="video">
                            <div class="video-btn"><i class="flaticon-play"></i></div>
                        </div>
                        <div class="image"><img alt="" src="assets/images/our-doctor/doc-1.png" width="753" height="928" decoding="async" data-nimg="1" style="color: transparent;">
                            <div class="bg_shape_2"><img alt="" srcset="/assets/images/our-doctor/shape.783b5b36.svg 1x, /assets/images/our-doctor/shape.783b5b36.svg 2x" src="/_next/static/media/shape.783b5b36.svg" width="753" height="752" decoding="async" data-nimg="1" style="color: transparent;"></div>
                        </div>
                    </div>
                </section>
                <section class="appointment_section">
                    <h1 class="d-none">title</h1>
                    <div class="container">
                        <form>
                            <div class="wrapper">
                                <div class="form_item"><label>Your Name</label><input type="text" name="name" placeholder="Name" class="form_control" value=""></div>
                                <div class="form_item"><label>Your Email</label><input type="email" name="email" placeholder="Email" class="form_control" value=""></div>
                                <div class="form_item"><label>Select Department</label><select name="department" class="form_control">
                                        <option value="">Department</option>
                                        <option value="subject1">Subject 1</option>
                                        <option value="subject2">Subject 2</option>
                                        <option value="subject3">Subject 3</option>
                                    </select></div>
                                <div class="form_item"><label>Choose Doctor</label><select name="doctor" class="form_control">
                                        <option value="">Doctor</option>
                                        <option value="subject1">Subject 1</option>
                                        <option value="subject2">Subject 2</option>
                                        <option value="subject3">Subject 3</option>
                                    </select></div>
                                <div class="form_item"><input class="form_btn" type="submit" value="Send"></div>
                            </div>
                        </form>
                    </div>
                </section>
                <section class="service_section section-padding">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-12">
                                <div class="section_title">
                                    <h2>Departmental Services</h2>
                                    <h3>Our Medical Services</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service_card">
                                    <div class="icon"><i class="flaticon-tooth"></i></div>
                                    <div class="content">
                                        <h2>Dental Care</h2>
                                        <p>We have more doctor for your dental illness. We are here for your better treatment</p><a href="/service-single/Dental-Care"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service_card">
                                    <div class="icon"><i class="flaticon-mortar"></i></div>
                                    <div class="content">
                                        <h2>Pharmacology</h2>
                                        <p>We have more doctor for your dental illness. We are here for your better treatment</p><a href="/service-single/Pharmacology"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service_card">
                                    <div class="icon"><i class="flaticon-bone"></i></div>
                                    <div class="content">
                                        <h2>Orthopedic</h2>
                                        <p>We have more doctor for your dental illness. We are here for your better treatment</p><a href="/service-single/Orthopedic"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="btn"><a class="theme-btn" href="/services">See All Services</a></div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="about_section section-padding">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-12">
                                <div class="about_left">
                                    <div class="image"><img alt="" src="assets/images/our-doctor/about.webp" width="1210" height="644" decoding="async" data-nimg="1" style="color: transparent;"><span class="round-on"></span><span class="round-two"></span>
                                        <div class="award">
                                            <div class="icon"><i class="flaticon-cup"></i></div>
                                            <div class="text">
                                                <h2><span>25</span>+</h2>
                                                <p>Years Of Experience</p>
                                            </div>
                                        </div>
                                        <div class="doctors">
                                            <ul>
                                                <li><img alt="" src="assets/images/our-doctor/available-doctors/ava-doc-1.webp" width="70" height="70" decoding="async" data-nimg="1" style="color: transparent;"></li>
                                                <li><img alt="" src="assets/images/our-doctor/available-doctors/ava-doc-2.webp" width="70" height="70" decoding="async" data-nimg="1" style="color: transparent;"></li>
                                                <li><img alt="" src="assets/images/our-doctor/available-doctors/ava-doc-3.webp" width="70" height="70" decoding="async" data-nimg="1" style="color: transparent;"></li>
                                                <li><img alt="" src="assets/images/our-doctor/available-doctors/ava-doc-4.webp" width="70" height="70" decoding="async" data-nimg="1" style="color: transparent;"></li>
                                                <li><span>95+</span></li>
                                            </ul>
                                            <h4>Available Doctors</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="content">
                                    <h2>About Medically</h2>
                                    <h3>Your Smile &amp; Happiness Is Our Mission</h3>
                                    <p>Our health and hospital policy encompasses the strategies, guidelines, and practices that technology companies use to achieve their goals and objectives. The policies may vary depending on the company's size, market position, and competitive landscape. Commodo erat amet vitae consectetur consectetur feugiat.</p>
                                    <p>Tellus viverra eu risus ut ipsum magna sed odio elit. Sed sem purus tincidunt condimentum amet condimentum massa. Nunc vel nascetur id cras.</p>
                                    <div class="ceo">
                                        <div>
                                            <h4>Savannah Nguyen</h4><span>CEO &amp; Founder of Madically</span>
                                        </div>
                                        <div><img alt="" src="assets/images/our-doctor/signeture.webp" width="277" height="58" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="work_section section-padding">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-12">
                                <div class="section_title">
                                    <h2>Our Working Process</h2>
                                    <h3>How We Work</h3>
                                </div>
                            </div>
                        </div>
                        <div class="work_wrapper">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                    <div class="work_card">
                                        <div class="image"><img alt="" src="assets/images/our-doctor/working-process/01.webp" width="251" height="251" decoding="async" data-nimg="1" style="color: transparent;"><span class="number">01</span></div>
                                        <div class="text">
                                            <h3>Make Appointment</h3>
                                            <p>Amet usem turpis vestm hendrerit vestibulum molestie quis. Egestas ultricies at placerat.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                    <div class="work_card">
                                        <div class="image"><img alt="" src="assets/images/our-doctor/working-process/02.webp" width="251" height="251" decoding="async" data-nimg="1" style="color: transparent;"><span class="number">02</span></div>
                                        <div class="text">
                                            <h3>Get Consultant</h3>
                                            <p>Amet usem turpis vestm hendrerit vestibulum molestie quis. Egestas ultricies at placerat.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                    <div class="work_card">
                                        <div class="image"><img alt="" src="assets/images/our-doctor/working-process/03.webp" width="251" height="251" decoding="async" data-nimg="1" style="color: transparent;"><span class="number">03</span></div>
                                        <div class="text">
                                            <h3>Take Treatment</h3>
                                            <p>Amet usem turpis vestm hendrerit vestibulum molestie quis. Egestas ultricies at placerat.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                    <div class="work_card">
                                        <div class="image"><img alt="" src="assets/images/our-doctor/working-process/04.webp" width="251" height="251" decoding="async" data-nimg="1" style="color: transparent;"><span class="number">04</span></div>
                                        <div class="text">
                                            <h3>Get Relief</h3>
                                            <p>Amet usem turpis vestm hendrerit vestibulum molestie quis. Egestas ultricies at placerat.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shape"><img alt="" src="assets/images/our-doctor/shape.6b5929ba.svg" width="1655" height="310" decoding="async" data-nimg="1" style="color: transparent;"></div>
                        </div>
                    </div>
                </section>
                <section class="project_section section-padding">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-12">
                                <div class="section_title">
                                    <h2>Our Portfolio</h2>
                                    <h3>All The Great Work That We Done</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="project_btn"><a class="theme-btn" href="/project">See All Cases </a></div>
                            </div>
                        </div>
                        <div class="project_wrapper">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="project_card"><img alt="" src="/assets/images/our-doctor/portfolio/01.webp" width="415" height="550" decoding="async" data-nimg="1" style="color: transparent;">
                                        <div class="text">
                                            <h2><a href="/project-single/Heart-Institure">Heart Institure</a></h2><span>Treatment</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="project_card"><img alt="" src="/assets/images/our-doctor/portfolio/02.webp" width="415" height="550" decoding="async" data-nimg="1" style="color: transparent;">
                                        <div class="text">
                                            <h2><a href="/project-single/Orthopaedics-Center">Orthopaedics Center</a></h2><span>Treatment</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="project_card"><img alt="" src="/assets/images/our-doctor/portfolio/03.webp" width="415" height="550" decoding="async" data-nimg="1" style="color: transparent;">
                                        <div class="text">
                                            <h2><a href="/project-single/Neurology-Services">Neurology Services</a></h2><span>Treatment</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="testimonial_section testimonial_section_slider">
                    <div class="container">
                        <div class="row justify-content-left">
                            <div class="col-12">
                                <div class="section_title">
                                    <h2>Testimonial</h2>
                                    <h3>Our Patients Say About Us</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row testimonial_slider">
                            <div class="slick-slider slick-initialized" dir="ltr">
                                <div class="slick-list">
                                    <div class="slick-track" style="width: 3752px; opacity: 1; transform: translate3d(-938px, 0px, 0px);">
                                        <div data-index="-2" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width: 469px;">
                                            <div>
                                                <div class="testimonial_card" tabindex="-1" style="width: 100%; display: inline-block;">
                                                    <div class="icon"><i class="flaticon-quote"></i></div>
                                                    <ul>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                    </ul>
                                                    <p>Purus egeto consectur massa amert. Hactor bodiam suspendie faucibus posuere dignissim amet to atthe. Vitaer of sollicitudin mauris erat odio maecenas mattis praesent.Eget vitaoe.</p>
                                                    <div class="ath">
                                                        <div class="image"><img alt="" src="assets/images/our-doctor/avatar-writer/1.jpg" width="80" height="80" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                                        <div class="text">
                                                            <h3>Armani Fisher</h3><span>Content Writer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-index="-1" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width: 469px;">
                                            <div>
                                                <div class="testimonial_card" tabindex="-1" style="width: 100%; display: inline-block;">
                                                    <div class="icon"><i class="flaticon-quote"></i></div>
                                                    <ul>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                    </ul>
                                                    <p>Purus egeto consectur massa amert. Hactor bodiam suspendie faucibus posuere dignissim amet to atthe. Vitaer of sollicitudin mauris erat odio maecenas mattis praesent.Eget vitaoe.</p>
                                                    <div class="ath">
                                                        <div class="image"><img alt="" src="assets/images/our-doctor/avatar-writer/2.webp" width="80" height="80" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                                        <div class="text">
                                                            <h3>Rebeca Connelly</h3><span>Content Writer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-index="0" class="slick-slide slick-active slick-current" tabindex="-1" aria-hidden="false" style="outline: none; width: 469px;">
                                            <div>
                                                <div class="testimonial_card" tabindex="-1" style="width: 100%; display: inline-block;">
                                                    <div class="icon"><i class="flaticon-quote"></i></div>
                                                    <ul>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                    </ul>
                                                    <p>Purus egeto consectur massa amert. Hactor bodiam suspendie faucibus posuere dignissim amet to atthe. Vitaer of sollicitudin mauris erat odio maecenas mattis praesent.Eget vitaoe.</p>
                                                    <div class="ath">
                                                        <div class="image"><img alt="" src="assets/images/our-doctor/avatar-writer/3.webp" width="80" height="80" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                                        <div class="text">
                                                            <h3>Kristin Watson</h3><span>Content Writer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-index="1" class="slick-slide slick-active" tabindex="-1" aria-hidden="false" style="outline: none; width: 469px;">
                                            <div>
                                                <div class="testimonial_card" tabindex="-1" style="width: 100%; display: inline-block;">
                                                    <div class="icon"><i class="flaticon-quote"></i></div>
                                                    <ul>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                    </ul>
                                                    <p>Purus egeto consectur massa amert. Hactor bodiam suspendie faucibus posuere dignissim amet to atthe. Vitaer of sollicitudin mauris erat odio maecenas mattis praesent.Eget vitaoe.</p>
                                                    <div class="ath">
                                                        <div class="image"><img alt="" src="assets/images/our-doctor/avatar-writer/2.webp" width="80" height="80" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                                        <div class="text">
                                                            <h3>Armani Fisher</h3><span>Content Writer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-index="2" class="slick-slide" tabindex="-1" aria-hidden="true" style="outline: none; width: 469px;">
                                            <div>
                                                <div class="testimonial_card" tabindex="-1" style="width: 100%; display: inline-block;">
                                                    <div class="icon"><i class="flaticon-quote"></i></div>
                                                    <ul>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                    </ul>
                                                    <p>Purus egeto consectur massa amert. Hactor bodiam suspendie faucibus posuere dignissim amet to atthe. Vitaer of sollicitudin mauris erat odio maecenas mattis praesent.Eget vitaoe.</p>
                                                    <div class="ath">
                                                        <div class="image"><img alt="" src="assets/images/our-doctor/avatar-writer/1.jpg" width="80" height="80" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                                        <div class="text">
                                                            <h3>Rebeca Connelly</h3><span>Content Writer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-index="3" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width: 469px;">
                                            <div>
                                                <div class="testimonial_card" tabindex="-1" style="width: 100%; display: inline-block;">
                                                    <div class="icon"><i class="flaticon-quote"></i></div>
                                                    <ul>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                    </ul>
                                                    <p>Purus egeto consectur massa amert. Hactor bodiam suspendie faucibus posuere dignissim amet to atthe. Vitaer of sollicitudin mauris erat odio maecenas mattis praesent.Eget vitaoe.</p>
                                                    <div class="ath">
                                                        <div class="image"><img alt="" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.e49ea02a.jpg&amp;w=96&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.e49ea02a.jpg&amp;w=256&amp;q=75 2x" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.e49ea02a.jpg&amp;w=256&amp;q=75" width="80" height="80" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                                        <div class="text">
                                                            <h3>Kristin Watson</h3><span>Content Writer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-index="4" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width: 469px;">
                                            <div>
                                                <div class="testimonial_card" tabindex="-1" style="width: 100%; display: inline-block;">
                                                    <div class="icon"><i class="flaticon-quote"></i></div>
                                                    <ul>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                    </ul>
                                                    <p>Purus egeto consectur massa amert. Hactor bodiam suspendie faucibus posuere dignissim amet to atthe. Vitaer of sollicitudin mauris erat odio maecenas mattis praesent.Eget vitaoe.</p>
                                                    <div class="ath">
                                                        <div class="image"><img alt="" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.986ac81b.jpg&amp;w=96&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.986ac81b.jpg&amp;w=256&amp;q=75 2x" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.986ac81b.jpg&amp;w=256&amp;q=75" width="80" height="80" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                                        <div class="text">
                                                            <h3>Armani Fisher</h3><span>Content Writer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-index="5" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width: 469px;">
                                            <div>
                                                <div class="testimonial_card" tabindex="-1" style="width: 100%; display: inline-block;">
                                                    <div class="icon"><i class="flaticon-quote"></i></div>
                                                    <ul>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                        <li><i class="flaticon-star"></i></li>
                                                    </ul>
                                                    <p>Purus egeto consectur massa amert. Hactor bodiam suspendie faucibus posuere dignissim amet to atthe. Vitaer of sollicitudin mauris erat odio maecenas mattis praesent.Eget vitaoe.</p>
                                                    <div class="ath">
                                                        <div class="image"><img alt="" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F3.b3683df3.jpg&amp;w=96&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F3.b3683df3.jpg&amp;w=256&amp;q=75 2x" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F3.b3683df3.jpg&amp;w=256&amp;q=75" width="80" height="80" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                                        <div class="text">
                                                            <h3>Rebeca Connelly</h3><span>Content Writer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="cta_section">
                    <div class="container">
                        <div class="cta_wrapper">
                            <div class="content">
                                <div class="icon"><i class="flaticon-phone-call"></i></div>
                                <div class="text">
                                    <h2>Available 24/7</h2>
                                    <h3>(208) 555-0112</h3>
                                </div>
                            </div>
                            <div class="shape-icon"><i class="flaticon-24-7"></i></div>
                            <div class="image"><img alt="" src="assets/images/our-doctor/cta.webp" width="364" height="511" decoding="async" data-nimg="1" style="color: transparent;"></div>
                        </div>
                    </div>
                </section>
                <section class="team_section section-padding">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-12">
                                <div class="section_title">
                                    <h2>Our Team</h2>
                                    <h3>Meet Our Specialists</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="team_card">
                                    <div class="image"><img alt="" src="assets/images/our-doctor/doc-1.webp" width="364" height="547" decoding="async" data-nimg="1" style="color: transparent;">
                                        <div class="border-shape"><img alt="" srcset="/_next/static/media/border-shape.eafa9c72.svg 1x, /_next/static/media/border-shape.eafa9c72.svg 2x" src="/_next/static/media/border-shape.eafa9c72.svg" width="396" height="396" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                    </div>
                                    <div class="content">
                                        <h3><a href="/team-single/Marlene-Henry">Marlene Henry</a></h3><span>Surgeon</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="team_card">
                                    <div class="image"><img alt="" src="assets/images/our-doctor/doc-2.webp" width="364" height="547" decoding="async" data-nimg="1" style="color: transparent;">
                                        <div class="border-shape"><img alt="" src="asstes/images/our-doctor/border-shape.eafa9c72.svg" width="396" height="396" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                    </div>
                                    <div class="content">
                                        <h3><a href="/team-single/Dianne-Russell">Dianne Russell</a></h3><span>Cardiologist</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="team_card">
                                    <div class="image"><img alt="" src="assets/images/our-doctor/doc-3.webp" width="364" height="547" decoding="async" data-nimg="1" style="color: transparent;">
                                        <div class="border-shape"><img alt="" src="asstes/images/our-doctor/border-shape.eafa9c72.svg" width="396" height="396" decoding="async" data-nimg="1" style="color: transparent;"></div>
                                    </div>
                                    <div class="content">
                                        <h3><a href="/team-single/Jerome-Bell">Jerome Bell</a></h3><span>Pet Specialist</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="funfact_section">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="item"><i class="flaticon-doctor"></i>
                                    <h3><span>250</span>+</h3>
                                    <p>Qualified Doctors</p>
                                </div>
                            </div>
                            <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="item"><i class="flaticon-businesswoman"></i>
                                    <h3><span>3,020</span>+</h3>
                                    <p> Satisfied Clients</p>
                                </div>
                            </div>
                            <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="item"><i class="flaticon-award"></i>
                                    <h3><span>25</span>+</h3>
                                    <p>Award Winning</p>
                                </div>
                            </div>
                            <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="item"><i class="flaticon-customer-care"></i>
                                    <h3><span>24</span>/<span>7</span></h3>
                                    <p>Client Support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="blog_section section-padding">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-12">
                                <div class="section_title">
                                    <h2>Our Blog</h2>
                                    <h3>Latest Post &amp; Article</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="blog_card"><img alt="" src="assets/images/our-doctor/about.webp" width="415" height="340" decoding="async" data-nimg="1" style="color: transparent;"><span>Surgery</span>
                                    <div class="content">
                                        <ul>
                                            <li>Sep 03, 2025</li>
                                            <li>Anne William</li>
                                        </ul>
                                        <h3>Tips for Orthopedic Surgery Patients</h3><a href="/blog-single/Why-Industry-Are-A-Juicy-Target-For-Cyberattack"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="blog_card"><img alt="" src="assets/images/our-doctor/about.webp" width="415" height="340" decoding="async" data-nimg="1" style="color: transparent;"><span>Orthopedic</span>
                                    <div class="content">
                                        <ul>
                                            <li>Sep 03, 2025</li>
                                            <li>Anne William</li>
                                        </ul>
                                        <h3>Transfusion strategy and heart surgery</h3><a href="/blog-single/Why-Industry-Are-A-Juicy-Target-For"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="blog_card"><img alt="" src="assets/images/our-doctor/about.webp" width="415" height="340" decoding="async" data-nimg="1" style="color: transparent;"><span>Surgery</span>
                                    <div class="content">
                                        <ul>
                                            <li>Sep 03, 2025</li>
                                            <li>Anne William</li>
                                        </ul>
                                        <h3>Get the Exercise for Limited Mobility</h3><a href="/blog-single/Why-Industry-Are-A-Juicy"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="ctafrom_section">
                    <div class="container">
                        <div class="cta_wrap">
                            <div class="content">
                                <h2>Get A Free Consultation</h2>
                                <p>Drop us a line! We are here to answer your questions 24/7</p>
                            </div>
                            <form class="cta_form">
                                <div class="input_filled"><input type="text" name="name" placeholder="Your Name*" value=""></div>
                                <div class="input_filled"><input type="text" name="email" placeholder="Your Email*" value=""></div>
                                <div class="input_filled"><input type="text" name="company" placeholder="Your Company*" value=""></div>
                                <div class="input_filled"><button type="submit">Free Consultancy</button></div>
                            </form>
                        </div>
                    </div>
                </section>
    </main>


    @include('partials.footer')





    <div class="Toastify"></div>
    </div>
    </div>



    <div id="__next">
        <div>
            <div class="Toastify"></div>
        </div>
    </div>
    <script id="__NEXT_DATA__" type="application/json">
        {
            "props": {
                "pageProps": {}
            },
            "page": "/home",
            "query": {},
            "buildId": "6NuDX25qagd2P5uWXQS8m",
            "nextExport": true,
            "autoExport": true,
            "isFallback": false,
            "scriptLoader": []
        }
    </script>


    <!-- ✅ JavaScript Libraries -->
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/ScrollSmoother.min.js"></script>
    <script src="assets/js/ScrollToPlugin.min.js"></script>
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery.meanmenu.js"></script>
    <script src="assets/js/jquery.scrollUp.js"></script>


</body>

</html>