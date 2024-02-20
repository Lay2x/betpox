<?php 
    $konf = DB::table('setting')->first();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('logo/'.$konf->favicon_setting) }}">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="{{ $konf->tentang_setting }}">
    <!-- Meta Keyword -->
    <meta name="keywords" content="{{ $konf->keyword_setting }}">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>{{ $konf->instansi_setting }}</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="{{ asset('web/css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/nice-select.css') }}">					
        <link rel="stylesheet" href="{{ asset('web/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/main.css') }}">

        <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

        <style>
            #map{
                width: 100%;
                height: 500px;
                }
        </style>
    </head>
    <body>

          <header id="header" id="home">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                  <div id="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('logo/'.$konf->logo_setting) }}" alt="" style="width: 100px;" /></a>
                  </div>
                  <nav id="nav-menu-container">
                    <ul class="nav-menu">
                      <li class="menu-active"><a href="#home">Home</a></li>
                      <li><a href="#about">Tentang</a></li>
                      <li><a href="#keunggulan">Keunggulan</a></li>
                      <li><a href="#review">Review</a></li>
                      <li><a href="#faq">Faq</a></li>
                      <li><a href="#lokasi">Lokasi</a></li>
                    </ul>
                  </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
          </header><!-- #header -->


        <!-- start banner Area -->
        <section class="banner-area" id="home" style="background: url({{ asset('background/'.$konf->background_setting) }}) center; background-size: cover;  background-repeat: no-repeat; max-width: 100%; ">	
            <div class="container">
                <div class="row fullscreen d-flex align-items-center justify-content-center">
                    <div class="banner-content col-lg-10">
                        <h5 class="text-white text-uppercase">Yuk dukung program ambon bersih dengan</h5>
                        <h1>
                            Pinbox
                            {{-- <img src="{{ asset('logo/'.$konf->logo_setting) }}" alt="" width="300pxpx;">				 --}}
                        </h1>
                        <a href="#" class="primary-btn text-uppercase">Pesan Sekarang</a>
                    </div>											
                </div>
            </div>
        </section>
        <!-- End banner Area -->	

        <!-- Start video-sec Area -->
        <section class="video-sec-area section-gap" id="about">
            <div class="container">
                <div class="row justify-content-center align-items-center ">
                    <div class="col-lg-6 video-left">
                        <h6>Tentang</h6>
                        <h1>Mengapa harus Pinbox?</h1>
                        <p>
                           {{ $konf->tentang_setting }}
                        </p>
                        <a class="primary-btn" href="#">Pesan Sekarang !</a>
                    </div>
                    <div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
                        <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/{{ $video->link_video }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                    </div>
                </div>
            </div>	
        </section>
        <!-- End video-sec Area -->
        
        <!-- Start top-course Area -->
        <section class="top-course-area section-gap" id="keunggulan">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-60 col-lg-10">
                        <div class="title text-center">
                            <h1 class="mb-10">Keunggulan Pinbox</h1>
                            <p>Pinbox, tempat sampah kekinian dengan teknologi digital.</p>
                        </div>
                    </div>
                </div>					
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 course-left">
                        @foreach ($keunggulan as $row)
                        <div class="single-course">
                            <img src="{{ asset('file/keunggulan/'.$row->icon_keunggulan) }}" alt="" style="width: 60px; height: 60px;">
                            <a href="#"><h4>{{ $row->judul_keunggulan }}</h4></a>
                            {!! $row->deskripsi_keunggulan !!}
                        </div>
                        @endforeach		
                    </div>
                    <div class="col-lg-6 course-right">
                        <img class="img-fluid mx-auto d-block" src="{{ asset('background/'.$konf->background_setting) }}" alt="" style="width: 75%; max-width: 100%">
                    </div>
                </div>
            </div>	
        </section>
        <!-- End top-course Area -->
    
        <!-- Start review Area -->
        <section class="review-area section-gap" id="review">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-60 col-lg-10">
                        <div class="title text-center">
                            <h1 class="mb-10">Testimoni</h1>
                            <p>Apa kata mereka tentang Pinbox?.</p>
                        </div>
                    </div>
                </div>						
                <div class="row">
                    @foreach ($testimoni as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-review">
                            <div class="row">
                                <img src="{{ asset('file/testimoni/'.$row->logo_instansi_testimoni) }}" alt="" style="width: 150px;  display: block; margin-left: auto; margin-right: auto;">
                            </div>
                            <h4>{{ $row->instansi_testimoni }}</h4>
                            {!! $row->isi_testimoni !!}
                        </div>
                    </div>
                    @endforeach					
                </div>
            </div>	
        </section>
        <!-- End review Area -->

        <!-- Start faq Area -->
        <section class="faq-area section-gap" id="faq" style=" background: url(web/img/faq.png) center; background-size: cover; max-width: 100%;">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-60 col-lg-10">
                        <div class="title text-center">
                            <h1 class="mb-10">Frequently Asked Questions</h1>
                            <p>Kumpulan pertanyaan umum tentang Pinbox.</p>
                        </div>
                    </div>
                </div>						
                <div class="row justify-content-start">
                    <div class="col-lg-6 faq-left">
                        <div id="accordion">
                            @foreach ($faq as $row)
                            <div class="card">
                                <div class="card-header" id="heading{{ $row->id_faq }}">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $row->id_faq }}" aria-expanded="true" aria-controls="collapse{{ $row->id_faq }}">
                                      {{ $row->judul_faq }}
                                    </button>
                                  </h5>
                                </div>
    
                                <div id="collapse{{ $row->id_faq }}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                  <div class="card-body">
                                        {!! $row->isi_faq !!}
                                  </div>
                                </div>
                              </div>
                            @endforeach						  
                        </div>							
                    </div>	
                </div>
            </div>	
        </section>

        <section class="lokasi-area section-gap" id="lokasi">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-60 col-lg-10">
                        <div class="title text-center">
                            <h1 class="mb-10">Lokasi</h1>
                            <p>Dimana saja anda bisa menemukan Pinbox?.</p>
                        </div>
                    </div>
                </div>						
                <div class="row">
                    <div class="col-12">
                        <div id="map"></div>
                    </div>
                </div>
            </div>	
        </section>

        <!-- End faq Area -->
        <!-- start footer Area -->		
        <footer class="footer-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <img src="img/Pinbox.png" alt="" style="width: 200px;;">
                            <p>
                                Pinbox merupakan tempat sampah digital dan dapat mengatasi permasalah sampah di Kota Ambon
                            </p>
                            <p class="footer-text">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Website ini dibuat dengan  <i class="fa fa-heart-o" aria-hidden="true"></i> Oleh <a href="https://Pinbox.pintukotakita.org" target="_blank">Pintu Kota Kita</a>
                            </p>								
                        </div>
                    </div>
                    <div class="col-lg-5  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Newsletter</h6>
                            <p>Stay update with our latest</p>
                            <div class="" id="mc_embed_signup">
                                <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                    <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                        <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                        </div>

                                    <div class="info"></div>
                                </form>
                            </div>
                        </div>
                    </div>						
                    <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                        <div class="single-footer-widget">
                            <h6>Follow Us</h6>
                            <p>Let us be social</p>
                            <div class="footer-social d-flex align-items-center">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                        </div>
                    </div>							
                </div>
            </div>
        </footer>	
        <!-- End footer Area -->	
        <script src="{{ asset('web/js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{ asset('web/js/vendor/bootstrap.min.js') }}"></script>			
        <script src="{{ asset('web/js/easing.min.js') }}"></script>			
        <script src="{{ asset('web/js/hoverIntent.js') }}"></script>
        <script src="{{ asset('web/js/superfish.min.js') }}"></script>	
        <script src="{{ asset('web/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('web/js/jquery.magnific-popup.min.js') }}"></script>	
        <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>			
        <script src="{{ asset('web/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('web/js/jquery.nice-select.min.js') }}"></script>			
        <script src="{{ asset('web/js/parallax.min.js') }}"></script>	
        <script src="{{ asset('web/js/mail-script.js') }}"></script>	
        <script src="{{ asset('web/js/main.js') }}"></script>	
        <script>
            let mapOptions = {
            center:[-3.694430, 128.181305],
            zoom: 14
        }
        let map = new L.map('map' , mapOptions);
        
        let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);
        
        var myIcon = L.icon({
    iconUrl: '{{ asset('map.png') }}',
    iconSize: [25, 40],

});
        @foreach($lokasi as $row)
        L.marker([{{ $row->lat_lokasi }}, {{ $row->long_lokasi }}],{icon: myIcon}).addTo(map).bindPopup(' <b>ID Pinbox:{{ $row->qr_lokasi }}</b><br> {{ $row->alamat_lokasi }} <br> {{ $row->nama_provinsi }}, {{ $row->nama_kota }}');
        @endforeach
        </script>
    </body>
</html>



