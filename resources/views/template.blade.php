<!DOCTYPE html>
<html>

  <head>
    <title>Inventory</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/w3.css')}}"  media="screen,projection"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style>



    div.content {
        padding : 10px 10px 10px 10px;
    }



    </style>
  </head>

  <body>

    <!-- Sidebar -->
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%">
      <h3 class="w3-bar-item">Menu</h3>

      <a href="{{URL::route('barang')}}" class="w3-bar-item w3-button">Daftarkan Produk</a>
      <a href="{{URL::route('gudang')}}" class="w3-bar-item w3-button">Masukan Stok</a>
      <a href="{{URL::route('keranjang')}}" class="w3-bar-item w3-button">Keranjang Belanja</a>
      <a href="{{URL::route('jasa')}}" class="w3-bar-item w3-button">Jasa</a>
      <a href="{{URL::route('foto')}}" class="w3-bar-item w3-button">Foto</a>


    </div>

    <!-- Page Content -->
    <div style="margin-left:15%">
      <div class="w3-container w3-teal">
        <h3>Inventory</h3>
      </div>


      <main>
      @yield('content')
      </main>






    </div>



    <script type="text/javascript">

        $(document).ready(function(){
          $('.collapsible').collapsible();
          $(".dropdown-button").dropdown();
          $('select').material_select();
          $('persediaan').material_select();
          $('warna').material_select();
          $('model').material_select();
          $('ukuran').material_select();
          $('kota').material_select();
      $('.carousel').carousel();
      $('.slider').slider({height: 400} );
      $('.materialboxed').materialbox();
      $('.carousel.carousel-slider').carousel({full_width: true});
           $('.carousel.carousel-slider').carousel({fullWidth: true});


         });

    </script>

  </body>
</html>
