@section('title')
Home
@endsection
@extends('viewtemplate')
@section('content')
  <div class="row">
    <div class="col s4"></div>
    <div class="col s4">
      <div class="center">
        <h1 style="color:#fff">
          Fikri Photography
        </h1>
      </div>
    </div>
    <div class="col s4"></div>
  </div>

  <div class="row">
  <div class="col s3">

    <div class="carousel">

          <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/baby/photo (1).jpg">
          <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/baby/photo (2).jpg">
          <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/familly/photo (4).jpg">
          <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/familly/photo (5).jpg">
          <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/group/photo (6).jpg">
          <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/group/photo (7).jpg">
          <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/group/photo (8).jpg">

    </div>


  </div>
       <div class="col s6" style="align:center">

         <div class="carousel carousel-slider">

           <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/couple/photo (1).jpg">
           <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/couple/photo (2).jpg">
           <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/group/photo (4).jpg">
           <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/group/photo (5).jpg">
           <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/baby/photo (6).jpg">
           <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/baby/photo (7).jpg">
           <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/baby/photo (8).jpg">

         </div>

       </div>
  <div class="col s3">

    <div class="carousel">

      <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/group/photo (1).jpg">
      <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/group/photo (2).jpg">
      <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/couple/photo (4).jpg">
      <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/couple/photo (5).jpg">
      <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/familly/photo (6).jpg">
      <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/familly/photo (7).jpg">
      <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/familly/photo (8).jpg">

    </div>


  </div>
  </div>





@endsection
