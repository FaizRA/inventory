<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css')}}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{URL::asset('css/foot.css')}}"/>
        <link type="text/css" rel="stylesheet" href="{{URL::asset('css/app.css')}}"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <style>

        body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }
main {
    flex: 1 0 auto;
}




        .x-content-band.bg-image {
           -webkit-background-size: auto !important;
           background-size: auto !important;
        }
        .content{
          padding: 10px 10px 10px 10px;
        }
        .content{
          align:center;
        }
        </style>
      </head>

      <body background="{{ asset('image')}}/bg.jpg">
                    <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>

        <script type="text/javascript" src="{{URL::asset('js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/js/materialize.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>

        <script type="text/javascript" src="{{URL::asset('js/materialize.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/js/materializen.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/materialize.js') }}"></script>




    <body>

<!--NAVBAR-->
<header>
  <nav class="transparent">
    <div class="nav-wrapper">
      <a href="home" class="brand-logo">Fikri Photography</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="home"><h4>Home</h4></a></li>
        <li><a href="tentangkami"><h4>Tentang Kami</h4></a></li>
        <li><a href="portofolio"><h4>Portofolio</h4></a></li>
        <li><a href="jasakami"><h4>Jasa</h4></a></li>
        <li><a href="lowongan"><h4>Lowongan</h4></a></li>
        <li><a href="kontak"><h4>Kontak</h4></a></li>
      </ul>
    </div>
  </nav>
</header>
<!--NAVBAR-->
<main>
@yield('content')
</main>

<!--FOOTER-->


<footer class="grey darken-4">
         <div class="footer-copyright">
           <div class="container">
             <div class="center" style="color:#fff">
           © 2018 Copyright Fikri Photography
         </div>
           </div>
         </div>
       </footer>

<!--NO HTML BELOW-->

  <script type="text/javascript">

  document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.carousel');
   var instances = M.Carousel.init(elems, options);
 });
 document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems, options);
  });
  document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.materialboxed');
   var instances = M.Materialbox.init(elems, options);
 });

  $(document).ready(function(){
    $('.materialboxed').materialbox();
    $('.parallax').parallax();
  $('.carousel').carousel();
  setInterval(function() {
    $('.carousel').carousel('next');
  }, 5000); // every 2 seconds

  });
  </script>
    </body>
</html>
