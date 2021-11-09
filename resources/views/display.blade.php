<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    
    <title>Halaman Display</title>
  <style>
    .background{
      background: rgb(146,242,244);
      background: linear-gradient(0deg, rgba(146,242,244,1) 0%, rgba(214,246,197,1) 50%, rgba(255,220,143,1) 100%);
    }
    .size{
      font-size: 100px
    }
    .size2{
      font-size: 60px
    }
    .margin{
      margin-top:70px
    }
    </style>
  </head>
  <body >
  <div class="background" style="height:39rem; display:block;">
    <div class="container "><h3 class="text-lg-center size2 pt-5 pb-4 text-monospace font-weight-bold ">DISPLAY ANTRIAN</h3></div>
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-4  " style="height:20rem">
              <div class="card-body text-center shadow rounded border border-success  ">
                <p class="float-left h5" id="timestamp">{{ $hari_ini }}, {{ $tgl->format('d-m-Y') }}</p><p class="float-right h5">Jumlah Antrian : {{ $cekrow }}</p> 
                <p class="text-lg-center mt-5 h2">Nomor Antrian</p>
                @if($cekrow == 0)
                  <p class="text-center size pt-2 font-weight-bold">K0</p>
                @else
                  <p class="text-center size pt-2 font-weight-bold">K{{ $antrians }}</p>
                  @if ($antrians)
                    <p class="h5 mb-2">Silahkan menuju ke loket</p>
                  @endif
                @endif
              </div>
            </div>
        </div>
      </div>
    </div>

  
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function(){
        setInterval('refreshPage()', 5000);
      });

      function refreshPage() {
       location.reload();
      }
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>