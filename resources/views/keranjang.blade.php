@section('title')
Beranda
@endsection
@extends('template')
@section('content')


    <div class="container">
      <div class="content">

      <h3>MASUKAN KERANJANG</h3>
      <form action="aksitambahkeranjang" method="post" enctype="multipart/form-data">
          <!--username start-->
          <table style="width:100%">
            <tr>
              <td>Nama Barang</td>
              <td>

                <select name=id style="width:100%">
                  <option value=''>Pilih Barang</option>
                  <@foreach ($barang as $clog)
                  <option value='{{$clog->id_barang}}'>{{$clog->barang}}</option>
                  @endforeach
                </select>


              </td>
            </tr>
            <tr>
              <td>Jumlah</td>
              <td><input placeholder="Jumlah Barang" id="Name" name="jumlah" type="text" class="validate" style="width:100%" >
            </tr>
          </table>


        <!--username end-->

      <!--password start-->

      <!--password start-->
          <!--password start-->

        <!--password end-->
        <!--username start-->



      <!--username end-->


      <div style="text-align:center">
      <input type="submit" name="Submit" value="Simpan" style="width:100%">
      </div>
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">
      </form>


      <h3>{{$warning}}!!!</h3>
      <br>
      <h3>Daftar Barang dikeranjang</h3>


      <table class="table table-bordered" style="width:100%;">
        <tr>
          <th>Nama Barang</td>
          <th>Jumlah</td>
          <th>Hapus</td>

        </tr>
        @foreach ($gudang as $barangs)
          <tr>
            <td>{{$barangs->barang}}</td>
            <td>{{$barangs->jumlah}}</td>
            <td><a href="hapuskeranjang/{{$barangs->id}}">Hapus</a></td>

          </tr>
        @endforeach

      </table>
      <a href="proseskeranjang"><button type="button" class="btn" style="width:100%">Proses Keranjang</button>
</div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



@endsection
