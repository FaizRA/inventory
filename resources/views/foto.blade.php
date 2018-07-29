@section('title')
Beranda
@endsection
@extends('template')
@section('content')

    <div class="container">
      <div class="content">
        <h1>Atur Gambar</h1>
          <table border="1px">

            <tr>
              <th><h5><b>HOME BERANDA</b></h5></th>
              <td colspan="5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <b>LIMIT MASING-MASING BAGIAN ADALAH 5</b>
                </div>
              </td>

            </tr>


            <tr>
              <th><h6>Carousel Kiri</h6>
                <form action="tambahberandacarouselkiri" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($berandacarouselkiri as $gambars)
                <td style="width:150px;height:150px">
                  <img  style="width:100%;height:80%" src="{{ asset('berandacarouselkiri')}}/{{$gambars->gambar}}">
                    <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                      <a href="hapusberandacarouselkiri/{{$gambars->id}}"><b>Hapus</b></a>
                    </div>
                </td>
              @endforeach


            </tr>

            <tr>
              <th><h6>Slider Tengah</h6>
                <form action="tambahberandaslidertengah" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
            @foreach ($berandaslidertengah as $gambars)
              <td style="width:150px;height:150px">
                <img  style="width:100%;height:80%" src="{{ asset('berandaslidertengah')}}/{{$gambars->gambar}}">
                  <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                    <a href="hapusberandaslidertengah/{{$gambars->id}}"><b>Hapus</b></a>
                  </div>
              </td>
            @endforeach


          </tr>

          <tr>
            <th><h6>Carousel Kanan</h6>
              <form action="tambahberandacarouselkanan" method="post" enctype="multipart/form-data">
                  <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                  <div style="text-align:left">
                        <input type="submit"  name="Submit" value="Tambah" >
                      </div>

                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                      </form>
            </th>
          @foreach ($berandacarouselkanan as $gambars)
            <td style="width:150px;height:150px">
              <img  style="width:100%;height:80%" src="{{ asset('berandacarouselkanan')}}/{{$gambars->gambar}}">
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <a href="hapusberandacarouselkanan/{{$gambars->id}}"><b>Hapus</b></a>
                </div>
            </td>
          @endforeach


        </tr>
            <!--DIVIDER-->
            <tr>
              <th><h5><b>GROUP PHOTO</b></h5></th>
              <td colspan="5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <b>LIMIT MASING-MASING BAGIAN ADALAH 5</b>
                </div>
              </td>

              </tr>


              <tr>
              <th><h6>Carousel Kiri</h6>
                <form action="tambahgroupcarouselkiri" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($groupcarouselkiri as $gambars)
                <td style="width:150px;height:150px">
                  <img  style="width:100%;height:80%" src="{{ asset('groupcarouselkiri')}}/{{$gambars->gambar}}">
                    <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                      <a href="hapusgroupcarouselkiri/{{$gambars->id}}"><b>Hapus</b></a>
                    </div>
                </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Slider Tengah</h6>
                <form action="tambahgroupslidertengah" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($groupslidertengah as $gambars)
              <td style="width:150px;height:150px">
                <img  style="width:100%;height:80%" src="{{ asset('groupslidertengah')}}/{{$gambars->gambar}}">
                  <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                    <a href="hapusgroupslidertengah/{{$gambars->id}}"><b>Hapus</b></a>
                  </div>
              </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Carousel Kanan</h6>
              <form action="tambahgroupcarouselkanan" method="post" enctype="multipart/form-data">
                  <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                  <div style="text-align:left">
                        <input type="submit"  name="Submit" value="Tambah" >
                      </div>

                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                      </form>
              </th>
              @foreach ($groupcarouselkanan as $gambars)
              <td style="width:150px;height:150px">
              <img  style="width:100%;height:80%" src="{{ asset('groupcarouselkanan')}}/{{$gambars->gambar}}">
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <a href="hapusgroupcarouselkanan/{{$gambars->id}}"><b>Hapus</b></a>
                </div>
              </td>
              @endforeach


              </tr>
            <!--DIVIDER-->
            <tr>
              <th><h5><b>FAMILY PHOTO</b></h5></th>
              <td colspan="5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <b>LIMIT MASING-MASING BAGIAN ADALAH 5</b>
                </div>
              </td>

              </tr>


              <tr>
              <th><h6>Carousel Kiri</h6>
                <form action="tambahfamilycarouselkiri" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($familycarouselkiri as $gambars)
                <td style="width:150px;height:150px">
                  <img  style="width:100%;height:80%" src="{{ asset('familycarouselkiri')}}/{{$gambars->gambar}}">
                    <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                      <a href="hapusfamilycarouselkiri/{{$gambars->id}}"><b>Hapus</b></a>
                    </div>
                </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Slider Tengah</h6>
                <form action="tambahfamilyslidertengah" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($familyslidertengah as $gambars)
              <td style="width:150px;height:150px">
                <img  style="width:100%;height:80%" src="{{ asset('familyslidertengah')}}/{{$gambars->gambar}}">
                  <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                    <a href="hapusfamilyslidertengah/{{$gambars->id}}"><b>Hapus</b></a>
                  </div>
              </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Carousel Kanan</h6>
              <form action="tambahfamilycarouselkanan" method="post" enctype="multipart/form-data">
                  <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                  <div style="text-align:left">
                        <input type="submit"  name="Submit" value="Tambah" >
                      </div>

                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                      </form>
              </th>
              @foreach ($familycarouselkanan as $gambars)
              <td style="width:150px;height:150px">
              <img  style="width:100%;height:80%" src="{{ asset('familycarouselkanan')}}/{{$gambars->gambar}}">
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <a href="hapusfamilycarouselkanan/{{$gambars->id}}"><b>Hapus</b></a>
                </div>
              </td>
              @endforeach


              </tr>
            <!--DIVIDER-->
            <tr>
              <th><h5><b>COUPLE PHOTO</b></h5></th>
              <td colspan="5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <b>LIMIT MASING-MASING BAGIAN ADALAH 5</b>
                </div>
              </td>

              </tr>


              <tr>
              <th><h6>Carousel Kiri</h6>
                <form action="tambahcouplecarouselkiri" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($couplecarouselkiri as $gambars)
                <td style="width:150px;height:150px">
                  <img  style="width:100%;height:80%" src="{{ asset('couplecarouselkiri')}}/{{$gambars->gambar}}">
                    <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                      <a href="hapuscouplecarouselkiri/{{$gambars->id}}"><b>Hapus</b></a>
                    </div>
                </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Slider Tengah</h6>
                <form action="tambahcoupleslidertengah" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($coupleslidertengah as $gambars)
              <td style="width:150px;height:150px">
                <img  style="width:100%;height:80%" src="{{ asset('coupleslidertengah')}}/{{$gambars->gambar}}">
                  <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                    <a href="hapuscoupleslidertengah/{{$gambars->id}}"><b>Hapus</b></a>
                  </div>
              </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Carousel Kanan</h6>
              <form action="tambahcouplecarouselkanan" method="post" enctype="multipart/form-data">
                  <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                  <div style="text-align:left">
                        <input type="submit"  name="Submit" value="Tambah" >
                      </div>

                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                      </form>
              </th>
              @foreach ($couplecarouselkanan as $gambars)
              <td style="width:150px;height:150px">
              <img  style="width:100%;height:80%" src="{{ asset('couplecarouselkanan')}}/{{$gambars->gambar}}">
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <a href="hapuscouplecarouselkanan/{{$gambars->id}}"><b>Hapus</b></a>
                </div>
              </td>
              @endforeach


              </tr>
            <!--DIVIDER-->
            <tr>
              <th><h5><b>BABY PHOTO</b></h5></th>
              <td colspan="5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <b>LIMIT MASING-MASING BAGIAN ADALAH 5</b>
                </div>
              </td>

              </tr>


              <tr>
              <th><h6>Carousel Kiri</h6>
                <form action="tambahbabycarouselkiri" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($babycarouselkiri as $gambars)
                <td style="width:150px;height:150px">
                  <img  style="width:100%;height:80%" src="{{ asset('babycarouselkiri')}}/{{$gambars->gambar}}">
                    <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                      <a href="hapusbabycarouselkiri/{{$gambars->id}}"><b>Hapus</b></a>
                    </div>
                </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Slider Tengah</h6>
                <form action="tambahbabyslidertengah" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($babyslidertengah as $gambars)
              <td style="width:150px;height:150px">
                <img  style="width:100%;height:80%" src="{{ asset('babyslidertengah')}}/{{$gambars->gambar}}">
                  <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                    <a href="hapusbabyslidertengah/{{$gambars->id}}"><b>Hapus</b></a>
                  </div>
              </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Carousel Kanan</h6>
              <form action="tambahbabycarouselkanan" method="post" enctype="multipart/form-data">
                  <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                  <div style="text-align:left">
                        <input type="submit"  name="Submit" value="Tambah" >
                      </div>

                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                      </form>
              </th>
              @foreach ($babycarouselkanan as $gambars)
              <td style="width:150px;height:150px">
              <img  style="width:100%;height:80%" src="{{ asset('babycarouselkanan')}}/{{$gambars->gambar}}">
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <a href="hapusbabycarouselkanan/{{$gambars->id}}"><b>Hapus</b></a>
                </div>
              </td>
              @endforeach


              </tr>
            <!--DIVIDER-->
            <tr>
              <th><h5><b>WEDDING PHOTO</b></h5></th>
              <td colspan="5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <b>LIMIT MASING-MASING BAGIAN ADALAH 5</b>
                </div>
              </td>

              </tr>


              <tr>
              <th><h6>Carousel Kiri</h6>
                <form action="tambahweddingcarouselkiri" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($weddingcarouselkiri as $gambars)
                <td style="width:150px;height:150px">
                  <img  style="width:100%;height:80%" src="{{ asset('weddingcarouselkiri')}}/{{$gambars->gambar}}">
                    <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                      <a href="hapusweddingcarouselkiri/{{$gambars->id}}"><b>Hapus</b></a>
                    </div>
                </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Slider Tengah</h6>
                <form action="tambahweddingslidertengah" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($weddingslidertengah as $gambars)
              <td style="width:150px;height:150px">
                <img  style="width:100%;height:80%" src="{{ asset('weddingslidertengah')}}/{{$gambars->gambar}}">
                  <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                    <a href="hapusweddingslidertengah/{{$gambars->id}}"><b>Hapus</b></a>
                  </div>
              </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Carousel Kanan</h6>
              <form action="tambahweddingcarouselkanan" method="post" enctype="multipart/form-data">
                  <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                  <div style="text-align:left">
                        <input type="submit"  name="Submit" value="Tambah" >
                      </div>

                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                      </form>
              </th>
              @foreach ($weddingcarouselkanan as $gambars)
              <td style="width:150px;height:150px">
              <img  style="width:100%;height:80%" src="{{ asset('weddingcarouselkanan')}}/{{$gambars->gambar}}">
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <a href="hapusweddingcarouselkanan/{{$gambars->id}}"><b>Hapus</b></a>
                </div>
              </td>
              @endforeach


              </tr>
            <!--DIVIDER-->
            <tr>
              <th><h5><b>WISUDA PHOTO</b></h5></th>
              <td colspan="5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <b>LIMIT MASING-MASING BAGIAN ADALAH 5</b>
                </div>
              </td>

              </tr>


              <tr>
              <th><h6>Carousel Kiri</h6>
                <form action="tambahwisudacarouselkiri" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($wisudacarouselkiri as $gambars)
                <td style="width:150px;height:150px">
                  <img  style="width:100%;height:80%" src="{{ asset('wisudacarouselkiri')}}/{{$gambars->gambar}}">
                    <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                      <a href="hapuswisudacarouselkiri/{{$gambars->id}}"><b>Hapus</b></a>
                    </div>
                </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Slider Tengah</h6>
                <form action="tambahwisudaslidertengah" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($wisudaslidertengah as $gambars)
              <td style="width:150px;height:150px">
                <img  style="width:100%;height:80%" src="{{ asset('wisudaslidertengah')}}/{{$gambars->gambar}}">
                  <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                    <a href="hapuswisudaslidertengah/{{$gambars->id}}"><b>Hapus</b></a>
                  </div>
              </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Carousel Kanan</h6>
              <form action="tambahwisudacarouselkanan" method="post" enctype="multipart/form-data">
                  <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                  <div style="text-align:left">
                        <input type="submit"  name="Submit" value="Tambah" >
                      </div>

                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                      </form>
              </th>
              @foreach ($wisudacarouselkanan as $gambars)
              <td style="width:150px;height:150px">
              <img  style="width:100%;height:80%" src="{{ asset('wisudacarouselkanan')}}/{{$gambars->gambar}}">
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <a href="hapuswisudacarouselkanan/{{$gambars->id}}"><b>Hapus</b></a>
                </div>
              </td>
              @endforeach


              </tr>
            <!--DIVIDER-->
            <tr>
              <th><h5><b>OTHER</b></h5></th>
              <td colspan="5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <b>LIMIT MASING-MASING BAGIAN ADALAH 5</b>
                </div>
              </td>

              </tr>


              <tr>
              <th><h6>Carousel Kiri</h6>
                <form action="tambahothercarouselkiri" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($othercarouselkiri as $gambars)
                <td style="width:150px;height:150px">
                  <img  style="width:100%;height:80%" src="{{ asset('othercarouselkiri')}}/{{$gambars->gambar}}">
                    <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                      <a href="hapusothercarouselkiri/{{$gambars->id}}"><b>Hapus</b></a>
                    </div>
                </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Slider Tengah</h6>
                <form action="tambahotherslidertengah" method="post" enctype="multipart/form-data">
                    <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                    <div style="text-align:left">
                          <input type="submit"  name="Submit" value="Tambah" >
                        </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">
                        </form>
              </th>
              @foreach ($otherslidertengah as $gambars)
              <td style="width:150px;height:150px">
                <img  style="width:100%;height:80%" src="{{ asset('otherslidertengah')}}/{{$gambars->gambar}}">
                  <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                    <a href="hapusotherslidertengah/{{$gambars->id}}"><b>Hapus</b></a>
                  </div>
              </td>
              @endforeach


              </tr>

              <tr>
              <th><h6>Carousel Kanan</h6>
              <form action="tambahothercarouselkanan" method="post" enctype="multipart/form-data">
                  <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                  <div style="text-align:left">
                        <input type="submit"  name="Submit" value="Tambah" >
                      </div>

                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                      </form>
              </th>
              @foreach ($othercarouselkanan as $gambars)
              <td style="width:150px;height:150px">
              <img  style="width:100%;height:80%" src="{{ asset('othercarouselkanan')}}/{{$gambars->gambar}}">
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <a href="hapusothercarouselkanan/{{$gambars->id}}"><b>Hapus</b></a>
                </div>
              </td>
              @endforeach


              </tr>
              <!--DIVIDER-->
              <tr>
                <th><h5><b>JASA</b></h5></th>
                <td colspan="5">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                    <b>NO LIMIT</b>
                  </div>
                </td>

                </tr>




          </table>
          <table border="1px">
          <tr>
          <th><h6>Jasa</h6>
            <form action="tambahjasacarouselkiri" method="post" enctype="multipart/form-data">
                <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
                <div style="text-align:left">
                      <input type="submit"  name="Submit" value="Tambah" >
                    </div>

                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="PUT">
                    </form>
            </th>
            @foreach ($jasacarouselkiri as $gambars)
            <td style="width:150px;height:150px">
              <img  style="width:100%;height:80%" src="{{ asset('jasacarouselkiri')}}/{{$gambars->gambar}}">
                <div style="height:20%;color:red;text-align:center; padding: 5px 5px 5px 5px">
                  <a href="hapusjasacarouselkiri/{{$gambars->id}}"><b>Hapus</b></a>
                </div>
            </td>
            @endforeach


          </tr>
          </table>
      </div>
    </div>


@endsection
