@section('title')
Beranda
@endsection
@extends('template')
@section('content')

    <div class="container">
      <div class="content">

      <h3>MASUKAN JASA</h3>
      <form action="aksitambahjasa" method="post" enctype="multipart/form-data">
          <!--username start-->
          <table style="width:100%">
            <tr>
              <td style="width:30%">Nama Barang</td>
              <td><input placeholder="Nama Jasa" id="Name" name="jasa" type="text" class="validate" style="width:100%" ></td>
            </tr>
            <tr>
              <td>Harga Barang</td>
              <td><input placeholder="Harga Jasa" id="Name" name="harga" type="text" class="validate" style="width:100%" >
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
      <h3>MASUKAN JUMLAH PENGGUNAAN</h3>
      <form action="aksitambahpenggunaanjasa" method="post" enctype="multipart/form-data">
          <!--username start-->
          <table style="width:100%">
            <tr>
              <td style="width:30%">Nama Jasa</td>
              <td>

                <select name=id style="width:100%">
                  <option value=''>Pilih Jasa</option>
                  <@foreach ($jasa as $clog)
                  <option value='{{$clog->id}}'>{{$clog->jasa}}</option>
                  @endforeach
                </select>


              </td>
            </tr>
            <tr>
              <td>Jumlah</td>
              <td><input placeholder="Penggunaan" id="Name" name="jumlah" type="text" class="validate" style="width:100%" >
            </tr>
          </table>

      <div style="text-align:center">
      <input type="submit" name="Submit" value="Simpan" style="width:100%">
      </div>
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">
      </form>


      <h3>Daftar Barang</h3>
      <table class="table table-bordered" style="width:100%;">
        <tr>
          <th>Nama Jasa</td>
          <th>Harga</td>
          <th>Penggunaan</td>
          <th>Pemasukan</td>
          <th>Penggunaan/bln</td>
          <th>Pemasukan/bln</td>
          <th>Hapus</td>
        </tr>
        @foreach ($jasa as $barangs)
          <tr>
            <td>{{$barangs->jasa}}</td>
            <td>{{$barangs->harga}}</td>
            <td>{{$barangs->penggunaanttl}}</td>
            <td>{{$barangs->pemasukanttl}}</td>
            <td>{{$barangs->penggunaanbln}}</td>
            <td>{{$barangs->pemasukanbln}}</td>
            <td><a href="hapusjasa/{{$barangs->id}}">Hapus</a></td>
          </tr>
        @endforeach

      </table>
</div>
</div>
<div style="text-align:center">
      {{ $jasa->links() }}
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
