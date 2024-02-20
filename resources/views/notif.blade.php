<?php 
    $konf = DB::table('setting')->first();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $konf->instansi_setting }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body >
    <div class="container">
      <div class="row g-0">
        <div class="col-12 mt-5" style="margin-top: 200px; padding-top: 100px;">
          <div class="text-center">
             <img src="{{ asset('ini.png') }}" class="img-fluid" style="width:200px;">   
          </div>
        </div>
      </div>
      <div class="row g-0">
        <div class="col-12 mt-5">
            <div class="text-center">
                <h3>Terima Kasih, Laporan Anda Segera Kami Proses</h3>
              </div>
              <div class="text-center">
                <a href="{{ url('/') }}">Klik Disini untuk kembali ke website</a>
              </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>