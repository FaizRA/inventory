@section('title')
Beranda
@endsection
@extends('template')
@section('content')

    <div class="container">
      <div class="content">

      <h3>MASUKAN PRODUK</h3>
      <form action="aksitambahbarang" method="post" enctype="multipart/form-data">
          <!--username start-->
          <table style="width:100%">
            <tr>
              <td>Nama Barang</td>
              <td><input placeholder="Nama Barang" id="Name" name="barang" type="text" class="validate" style="width:100%" ></td>
            </tr>
            <tr>
              <td>Harga Barang</td>
              <td><input placeholder="Harga Barang" id="Name" name="harga" type="text" class="validate" style="width:100%" >
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



      <h3>Daftar Barang</h3>
      <table class="table table-bordered" style="width:100%;">
        <tr>
          <th>Nama Barang</td>
          <th>Harga</td>
          <th>Hapus</td>
        </tr>
        @foreach ($barang as $barangs)
          <tr>
            <td>{{$barangs->barang}}</td>
            <td>{{$barangs->harga}}</td>
            <td><a href="hapusbarang/{{$barangs->id}}">Hapus</a></td>
          </tr>
        @endforeach

      </table>
</div>
</div>
<div style="text-align:center">
      {{ $barang->links() }}
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
