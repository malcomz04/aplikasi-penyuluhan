<!DOCTYPE html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Informasi Manajemen Data Kelompok Tani Kecamatan Dolok Masagal</title>
    <meta name="description"
        content="Aplikasi web untuk manajemen data kelompok tani dan penyuluhan pertanian di Kecamatan Dolok Masagal, Kabupaten Simalungun.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="{{asset('depan/img/favicon.ico')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('depan/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('depan/venobox/venobox.css')}}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('depan/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('depan/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('depan/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('depan/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('depan/css/nivo-slider.css')}}">
    <link rel="stylesheet" href="{{asset('depan/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('depan/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('depan/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('depan/style.css')}}">
    <link rel="stylesheet" href="{{asset('depan/css/responsive.css')}}">

    <script src="{{asset('depan/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <style>
    /* CSS Tambahan untuk Responsif dan Keterbacaan yang Lebih Baik */
    .service_img iframe {
        max-width: 100%;
        height: auto;
        min-height: 300px;
        border: 0;
        /* Memastikan iframe merespons container dengan baik */
        display: block;
        margin: 0 auto;
    }

    .logo-area a {
        display: flex;
        align-items: center;
    }

    .logo-area img {
        margin-right: 10px;
    }

    .slide-text h1,
    .slide-text h2 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .map h3,
    .map p {
        text-align: center;
    }

    .contact-map {
        /* Memastikan div peta juga di tengah */
        margin: 0 auto;
    }
    </style>
</head>

<body>
    <header class="header_area">
        <div class="nav_area" id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-6">
                        <div class="logo-area">
                            <a href="index.html">
                                <img src="{{asset('depan/img/logo.png')}}" alt="Logo Aplikasi" width="80px" />
                                <span class="navid" style="font-weight: bold; font-size: 1.2em;">
                                    Aplikasi Penyuluhan Pertanian
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-7 col-sm-7 col-xs-6">
                        <nav class="menu hidden-xs">
                            <ul class="navid">
                                <li><a href="#home">Home</a></li>
                                <li><a href="#about">Tentang Kami</a></li>
                                <li><a href="#services">Manfaat</a></li>
                                <li><a href="#blogs">Berita</a></li>
                                <li><a href="#contact-info">Contact</a></li>
                                <li><a href="{{Route('login')}}">Login</a></li>
                            </ul>
                        </nav>

                        <div class="dropdown mabile_menu pull-right visible-xs">
                            <a data-toggle="dropdown" class="mobile-menu" href="#">
                                <span> MENU </span><i class="fa fa-bars"></i>
                            </a>
                            <ul class="dropdown-menu mobile_menus drop_mobile navid">
                                <li><a href="#home">Home</a></li>
                                <li><a href="#about">Tentang Kami</a></li>
                                <li><a href="#services">Manfaat</a></li>
                                <li><a href="#blogs">Berita</a></li>
                                <li><a href="#contact-info">Contact</a></li>
                                <li><a href="{{Route('login')}}">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="slider-wrap home-1-slider" id="home">
        <div id="mainSlider" class="nivoSlider slider-image">
            <img src="{{asset('depan/img/bg1.jpg')}}" alt="main slider 1" title="#htmlcaption1" />
            <img src="{{asset('depan/img/bg2.jpg')}}" alt="main slider 2" title="#htmlcaption2" />
        </div>

        <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slide1-text slide-text">
                            <div class="middle-text">
                                <div class="left_sidet1 col-md-6 col-sm-12">
                                    <div class="cap-title wow slideInRight" data-wow-duration=".9s" data-wow-delay="0s">
                                        <h1>SISTEM INFORMASI MANAJEMEN DATA KELOMPOK TANI KECAMATAN DOLOK MASAGAL</h1>
                                    </div>
                                    <div class="cap-dec wow slideInRight" data-wow-duration="1.1s" data-wow-delay="0s">
                                        <h2>Aplikasi Manajemen Data Pertanian Berbasis Web</h2>
                                    </div>
                                    <div class="cap-readmore animated fadeInUpBig" data-wow-duration="1.5s"
                                        data-wow-delay=".5s">
                                        <a href="#about" class="hover_slider_button">Tentang Kami</a>
                                    </div>
                                </div>
                                <div class="right_sidet1 col-md-6 col-sm-12 hidden-xs">
                                    <div class="slide-image1">
                                        <img class="wow slideInUp" data-wow-duration="1.5s" data-wow-delay="0s"
                                            src="{{asset('depan/img/head1.jpg')}}" alt="Ilustrasi Pertanian" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="htmlcaption2" class="nivo-html-caption slider-caption-2">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slide2-text slide-text">
                            <div class="middle-text">
                                <div class="left_sidet1 col-md-6 col-sm-12">
                                    <div class="cap-title wow bounceInDown" data-wow-duration=".9s" data-wow-delay="0s">
                                        <h1>SISTEM INFORMASI MANAJEMEN DATA KELOMPOK TANI KECAMATAN DOLOK MASAGAL</h1>
                                    </div>
                                    <div class="cap-dec wow slideInRight" data-wow-duration="1.1s" data-wow-delay="0s">
                                        <h2>Aplikasi Manajemen Data Pertanian Berbasis Web</h2>
                                    </div>
                                    <div class="cap-readmore animated fadeInUpBig" data-wow-duration="1.5s"
                                        data-wow-delay=".5s">
                                        <a href="#about" class="hover_slider_button">Tentang Kami</a>
                                    </div>
                                </div>
                                <div class="right_sidet1 col-md-6 col-sm-12 hidden-xs">
                                    <div class="slide-image2">
                                        <img class="wow slideInUp" data-wow-duration="1.5s" data-wow-delay="0s"
                                            src="{{asset('depan/img/head2.jpg')}}" alt="Ilustrasi Data Pertanian" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about_area" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_title text-center">
                        <img src="{{asset('depan/img/logo.png')}}" alt="Logo Kelompok Tani" width="150px">
                        <h2 class="title text-center"><span>Tentang Kami</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p class="text-center" style="font-size: 1.1em; margin-bottom: 15px;">
                        Di Kecamatan Dolok Masagal terdapat kelompok tani yang dinaungi langsung oleh dinas pertanian
                        setempat. Setiap kelompok tani umumnya terdiri dari 25 hingga 30 petani dan didampingi oleh
                        Penyuluh Pertanian yang membantu dalam progres pertanian mereka.
                    </p>
                    <h4 class="text-center" style="font-weight: bold; margin-bottom: 10px;">
                        Sistem Informasi ini diharapkan dapat membantu:
                    </h4>
                    <ul style="list-style: disc; max-width: 800px; margin: 0 auto; padding-left: 20px;">
                        <li>Membantu penyuluh dan dinas pertanian dalam mengorganisir informasi dan data para petani
                            dan kelompok tani.</li>
                        <li>Memfasilitasi dinas pertanian dalam memberikan informasi secara menyeluruh tentang bahan
                            baku seperti bibit benih, pupuk, kompos dan lain-lain.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="service_area service_color" id="services">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <br>
                    <br>
                    <br>
                    <div class="service_thum">

                        <div class="service_img"><iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47419.15110285578!2d98.77386581590511!3d2.8917813646251553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031bd5900000001%3A0x96e10d88e46aa6cf!2sKantor%20Camat%20Dolog%20Masagal!5e0!3m2!1sen!2sid!4v1764917706253!5m2!1sen!2sid"
                                width="500" height="350" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section_title">
                                <h2 class="title"><span>Manfaat Aplikasi</span></h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="icon"><i class="fa fa-bolt"></i></div>
                            <div class="about_content">
                                <p>Merancang dan membangun sistem informasi berbasis website yang mampu memfasilitasi
                                    ketua kelompok tani dalam mengelola data anggota secara digital.</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="icon"><i class="fa fa-laptop"></i></div>
                            <div class="about_content">
                                <p> Memudahkan pihak dari setiap kecamatan dalam merekomendasikan peserta pelatihan
                                    pertanian.</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="icon"><i class="fa fa-briefcase"></i></div>
                            <div class="about_content">
                                <p>Memudahkan pelaku agribisnis maupun masyarakat dalam mengakses informasi terkait
                                    dengan kegiatan pelatihan pertanian serta berita-berita tentang pemanfaatan
                                    teknologi di bidang pertanian. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog_area" id="blogs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_title text-center">
                        <h2 class="title"><span>Berita Kegiatan</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="team_own curosel-style">
                    @foreach($berita as $b)
                    <div class="col-md-12">
                        <div class="blog_content">
                            <div class="blog_img hover_effect blog_hover">
                                <a href="{{Route('beritaShow',['uuid'=>$b->uuid])}}">
                                    <img src="{{asset('berita/'. $b->foto)}}" alt="Foto Berita: {{$b->judul}}"
                                        width="270" height="205" class="img-responsive" />
                                </a>
                                <div class="bolg_date">
                                    <a href="{{Route('beritaShow',['uuid'=>$b->uuid])}}">
                                        <span>{{$b->created_at->format('d')}}</span>
                                        <span class="month">{{$b->created_at->format('M')}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="blog_comment fix">
                                <ul>
                                    <li><i class="fa fa-user"></i> Penulis: {{$b->user->nama}}</li>
                                </ul>
                            </div>
                            <div class="blog_text">
                                <h2><a href="{{Route('beritaShow',['uuid'=>$b->uuid])}}">{{$b->judul}}</a></h2>
                                <p>{{ \Illuminate\Support\Str::limit($b->isi, 150, $end='...') }}</p>
                                <a href="{{Route('beritaShow',['uuid'=>$b->uuid])}}">Baca Selengkapnya ...</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <footer class="footer_area" id="contact-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_title service_color text-center">
                        <h2 class="title"><span>Hubungi Kami</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="single_address fix">
                        <div class="address_icon"><span><i class="fa fa-map-marker"></i></span></div>
                        <div class="address_text">
                            <p><span>Alamat:</span> Bah Bolon, Dolok Huluan, Kec. Raya, Kabupaten Simalungun, Sumatera
                                Utara 21162</p>
                        </div>
                    </div>
                    <div class="single_address fix">
                        <div class="address_icon"><span><i class="fa fa-phone"></i></span></div>
                        <div class="address_text">
                            <p><span>Telepon:</span> (+62) 82990456781</p>
                        </div>
                    </div>
                    <div class="single_address fix">
                        <div class="address_icon"><span><i class="fa fa-envelope-o"></i></span></div>
                        <div class="address_text">
                            <p><span>Email: </span> dolokmasagal@liendo.com</p>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="service_thum">
                        <div class="service_img"><iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47419.15110285578!2d98.77386581590511!3d2.8917813646251553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031bd5900000001%3A0x96e10d88e46aa6cf!2sKantor%20Camat%20Dolog%20Masagal!5e0!3m2!1sen!2sid!4v1764917706253!5m2!1sen!2sid"
                                width="500" height="350" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="footer_bottom_area" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer_text text-center">
                        <p>Copyright © 2015 <a href="http://bootexperts.com/">bootexperts.com</a>. Hak Cipta Dilindungi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('depan/js/vendor/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('depan/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('depan/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('depan/js/plugins.js')}}"></script>
    <script src="{{asset('depan/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('depan/js/waypoints.min.js')}}"></script>
    <script src="{{asset('depan/js/jquery.mixitup.js')}}"></script>
    <script src="{{asset('depan/js/jquery.nivo.slider.pack.js')}}"></script>
    <script src="{{asset('depan/js/jquery.nav.js')}}"></script>
    <script src="{{asset('depan/js/wow.js')}}"></script>
    <script type="text/javascript">
    new WOW().init();
    </script>
    <script type="text/javascript" src="{{asset('depan/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('depan/js/main.js')}}"></script>

    <script src="http://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE&callback=initialize" async defer>
    </script>
    <script>
    function initialize() {
        // Koordinat yang digunakan (contoh: Dolok Masagal)
        var latLng = new google.maps.LatLng(2.8931551, 98.8032042);

        var mapOptions = {
            zoom: 15,
            scrollwheel: false,
            // Peta akan di-center ke koordinat ini
            center: latLng
        };

        var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

        var marker = new google.maps.Marker({
            // Marker juga diposisikan di tengah
            position: latLng,
            animation: google.maps.Animation.BOUNCE,
            icon: 'img/map-marker.png', // Pastikan path icon benar
            map: map
        });

    }

    // Memastikan initialize dipanggil setelah window selesai memuat
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body>

</html>