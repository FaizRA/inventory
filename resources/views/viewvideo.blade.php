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



  </div>
       <div class="col s6" style="align:center">


               <div class="video-container">
                 <iframe width="853" height="480" src="{{ asset('image')}}/photogroup (1).jpg" frameborder="0" allowfullscreen></iframe>
               </div>


       </div>
  <div class="col s3">



  </div>
  </div>





@endsection
