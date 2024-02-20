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
                height: 300px;
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
                      <li class="menu-active"><a href="{{ url('/') }}"></a></li>
                    </ul>
                  </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
          </header><!-- #header -->



        <!-- Start video-sec Area -->
        <section class="video-sec-area section-gap" id="about">
            <div class="container">
                <div class="row justify-content-center align-items-center ">
                    <div class="col-lg-6 video-left">
                        <h1>Detail Lokasi:</h1>
                      
                       <table>
                            <tr>
                                <th>Alamat</th>
                                <th>:</th>
                                <td>{{ $lihat->alamat_lokasi }}, {{ $lihat->nama_provinsi }}, {{ $lihat->nama_kota }}</td>
                            </tr>
                            <tr>
                                <th>Kode</th>
                                <th>:</th>
                                <td>{{ $lihat->qr_lokasi }}</td>
                            </tr>
                       </table>
                    </div>
                    <div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
                       <div id="map"></div>
                    </div>
                </div>
            </div>	
        </section>
        <!-- End video-sec Area -->
        
        <section class="lokasi-area section-gap" id="lokasi">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-60 col-lg-10">
                        <div class="title text-center">
                            <h1 class="mb-10">Pengaduan Pinbox!</h1>
                            @if ($message = Session::get('Sukses'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message }}
                            </div>
                            @endif
                             @if (count($errors) > 0)
                             <div class="alert alert-danger">
                                 <ul>
                                     @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                     @endforeach
                                 </ul>
                             </div>
                             @endif
                        </div>
                        <form action="{{ route('laporpenuh') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="number" name="id_lokasi" class="form-control" value="{{ $lihat->id_lokasi }}" hidden>
                            <div class="form-group mb-2">
                                <label for="">Kode Pinbox</label>
                                <input type="text" class="form-control" value="{{ $lihat->qr_lokasi }}"readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama_lapor" value="{{ old('nama_lapor') }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">No. Hp</label>
                                <input type="number" name="no_hp_lapor" class="form-control" value="{{ old('no_hp_lapor') }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Jenis Laporan</label>
                                <input type="radio" name="jenis_laporan" value="Penuh"> Penuh 
                                <input type="radio" name="jenis_laporan" value="Rusak"> Rusak
                                <input type="radio" name="jenis_laporan" id="rad3" value="1" class="rad">  Lain-lain
                            </div>
                            <div id="form1" style="display: none">
                               <textarea name="isi_keterangan" class="form-control" rows="3">{{ old('isi_keterangan') }}</textarea>
                            </div>
                            <div class="title text-center mt-5">
                                <button type="submit" class="btn btn-dark">Buat Laporan</button>
                            </div>
                        </form>
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
        {{-- <script src="{{ asset('web/js/vendor/jquery-2.2.4.min.js') }}"></script> --}}
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
            center:[{{ $lihat->lat_lokasi }}, {{ $lihat->long_lokasi }}],
            zoom: 20
        }
        let map = new L.map('map' , mapOptions);
        
        let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);
        
        
        // let marker = null;
        let marker = L.marker([{{ $lihat->lat_lokasi }}, {{ $lihat->long_lokasi }}]).addTo(map);
        map.on('click', (event)=> {
        
            // if(marker !== null){
            //     map.removeLayer(marker);
            // }
            // marker = L.marker([event.latlng.lat , event.latlng.lng]).addTo(map);
            document.getElementById('latitude').value = event.latlng.lat;
            document.getElementById('longitude').value = event.latlng.lng;
            
        })
        </script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$(":radio.rad").click(function(){
					$("#form1").hide()
					if($(this).val() == "1"){
						$("#form1").show();
                    }else{
                        $("#form1").hide();
					}
				});
			});
		</script>
    </body>
</html>



