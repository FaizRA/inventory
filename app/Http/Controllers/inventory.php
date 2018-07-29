<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\admin;
use App\barang;
use App\gambar;
use App\jasa;
use App\gudang;
use App\keranjang;
use File;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Route;

class inventory extends Controller
{
    //


    public function login()
    {

        return view('adminlogin');
    }

    public function loginaksi(Request $request)
    {
      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'user' => 'required',
    ]);
      $this->validate($request, [
     'pass' => 'required',
    ]);

    if (admin::where('nama',$request->user)->count() > 0) {
      $login = admin::where('nama',$request->user)->first();
      if (Hash::check($request->pass, $login->pass )) {
        session(['nama' => $request->user]);
        return redirect('gudang');
      }
      return redirect('login');
    }

    return redirect('login');

    }

    public function barang()
    {
        $barang  = DB::table('barang')->orderBy('barang', 'asc')->paginate(100);
        return view('barang', ['barang' => $barang]);
    }

    public function aksitambahbarang(Request $request)
    {
      $this->validate($request, [
     'barang' => 'required',
    ]);
    $this->validate($request, [
   'harga' => 'required',
  ]);
      if (barang::where('barang',$request->barang)->count()<1) {

      $filesa = new barang;
      $filesa->barang = $request->barang;
      $filesa->harga = $request->harga;
      $filesa->save();
      return redirect('barang');
      }
      $filesa = barang::where('barang',$request->barang)->first();
      $filesa->barang = $request->barang;
      $filesa->harga = $request->harga;
      $filesa->save();

        return redirect('barang');
    }

    public function hapusbarang($id)
    {

      $clogs = barang::find($id);

      $clogs->delete();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('barang');
    }


    public function jasa()
    {
        $jasa  = DB::table('jasa')->orderBy('jasa', 'asc')->paginate(100);
        return view('jasa', ['jasa' => $jasa]);
    }

    public function aksitambahjasa(Request $request)
    {
      $this->validate($request, [
     'jasa' => 'required',
    ]);
    $this->validate($request, [
    'harga' => 'required',
    ]);
      if (jasa::where('jasa',$request->jasa)->count()<1) {

      $filesa = new jasa;
      $filesa->jasa = $request->jasa;
      $filesa->harga = $request->harga;
      $filesa->penggunaanttl = 0;
      $filesa->save();
      return redirect('jasa');
      }
      $filesa = jasa::where('jasa',$request->jasa)->first();
      $filesa->jasa = $request->jasa;
      $filesa->harga = $request->harga;


      $pemasukanttl= $filesa->penggunaanttl* $request->harga;
      $pemasukanbln=$pemasukanttl/30;


      $filesa->pemasukanttl = $pemasukanttl;

      $filesa->pemasukanbln = $pemasukanbln;

      $filesa->save();

        return redirect('jasa');
    }

    public function aksitambahpenggunaanjasa(Request $request)
    {
      $this->validate($request, [
     'id' => 'required',
    ]);
    $this->validate($request, [
    'jumlah' => 'required',
    ]);



      $filesa = jasa::where('id',$request->id)->first();

      $penggunaanttl= $request->jumlah+$filesa->penggunaanttl;
      $penggunaanbln=$penggunaanttl/30;
      $pemasukanttl= $filesa->harga*$penggunaanttl;
      $pemasukanbln=$pemasukanttl/30;

      $filesa->penggunaanttl = $penggunaanttl;
      $filesa->pemasukanttl = $pemasukanttl;
      $filesa->penggunaanbln = $penggunaanbln;
      $filesa->pemasukanbln = $pemasukanbln;



      $filesa->save();

        return redirect('jasa');
    }

    public function hapusjasa($id)
    {

      $clogs = jasa::find($id);

      $clogs->delete();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('jasa');
    }




    public function gudang()
    {
        $barang  = DB::table('barang')->orderBy('barang', 'asc')->get();
        $gudang  =DB::table('barang')
        ->join('gudang','gudang.id_barang','=','barang.id')
        ->select('gudang.*', 'barang.barang as barang')
        ->paginate(10);
        return view('gudang', ['barang' => $barang, 'gudang' => $gudang]);
    }

    public function aksitambahgudang(Request $request)
    {
      $this->validate($request, [
     'id' => 'required',
    ]);
      $this->validate($request, [
     'jumlah' => 'required',
    ]);
      if (gudang::where('id_barang',$request->id)->count() < 1) {
        $filesa = new gudang;
        $filesa->id_barang = $request->id;
        $filesa->jumlah = $request->jumlah;
        $filesa->save();
        return redirect('gudang');
      }


      $filesa = gudang::where('id_barang',$request->id)->first();
      $jumlah = $filesa->jumlah + $request->jumlah;
      $filesa->jumlah = $jumlah;
      $filesa->save();
        return redirect('gudang');
    }

    public function keranjang()
    {
        $barang  = DB::table('barang')
        ->join('gudang','gudang.id_barang','=','barang.id')
        ->where('gudang.jumlah','>',0)
        ->select('gudang.*', 'barang.barang as barang', 'barang.harga as harga')
        ->get();

        $gudang  =DB::table('barang')
        ->join('keranjang','keranjang.id_barang','=','barang.id')
        ->select('keranjang.*', 'barang.barang as barang', 'barang.harga as harga')
        ->get();

        $warning ='Silahkan Tambah Keranjang';
        return view('keranjang', ['barang' => $barang, 'gudang' => $gudang,'warning' => $warning]);
    }

    public function aksitambahkeranjang(Request $request)
    {
      $this->validate($request, [
      'id' => 'required',
      ]);
      $this->validate($request, [
      'jumlah' => 'required',
      ]);
      if (keranjang::where('id_barang',$request->id)->count() < 1) {

          $cok = gudang::where('id_barang',$request->id)->first();

          if ($cok->jumlah >= $request->jumlah ) {
            // code...


                $cek = DB::table('keranjang')->count();
                $filesa = new keranjang;
                $filesa->indeks = $cek+1;
                $filesa->id_barang = $request->id;
                $filesa->jumlah = $request->jumlah;
                $filesa->save();
                return redirect('keranjang');


          }else {
            $barang  = DB::table('barang')
            ->join('gudang','gudang.id_barang','=','barang.id')
            ->where('gudang.jumlah','>',0)
            ->select('gudang.*', 'barang.barang as barang', 'barang.harga as harga')
            ->get();

            $gudang  =DB::table('barang')
            ->join('keranjang','keranjang.id_barang','=','barang.id')
            ->select('keranjang.*', 'barang.barang as barang', 'barang.harga as harga')
            ->get();
            $warning ='Barang di gudang tidak Cukup';
            return view('keranjang', ['barang' => $barang, 'gudang' => $gudang,'warning' => $warning]);
          }




              }

              $cok = gudang::where('id_barang',$request->id)->first();
              $cek = keranjang::where('id_barang',$request->id)->first();
              $cuk = $request->jumlah +$cek->jumlah;

              if ($cok->jumlah >= $cuk  ) {

        $filesa = keranjang::where('id_barang',$request->id)->first();
        $jumlah = $filesa->jumlah + $request->jumlah;
        $filesa->jumlah = $jumlah;
        $filesa->save();


        return redirect('keranjang');
      }else {
        $barang  = DB::table('barang')
        ->join('gudang','gudang.id_barang','=','barang.id')
        ->where('gudang.jumlah','>',0)
        ->select('gudang.*', 'barang.barang as barang', 'barang.harga as harga')
        ->get();

        $gudang  =DB::table('barang')
        ->join('keranjang','keranjang.id_barang','=','barang.id')
        ->select('keranjang.*', 'barang.barang as barang', 'barang.harga as harga')
        ->get();
        $warning ='Barang di gudang tidak Cukup';
        return view('keranjang', ['barang' => $barang, 'gudang' => $gudang,'warning' => $warning]);
      }
    }



    public function hapuskeranjang($id)
    {

      $clogs = keranjang::find($id);

      $clogs->delete();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('keranjang');
    }

    public function proseskeranjang()
    {
      $keranjangs = DB::table('keranjang')->count();

      for ($i=1; $i <= $keranjangs ; $i++) {
        $k=keranjang::where('indeks',$i)->first();
        $s=gudang::where('id_barang',$k->id_barang)->first();
        $jumlah=$s->jumlah-$k->jumlah;
        $s->jumlah=$jumlah;
        $s->save();
        $k->delete();
      }
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('gudang');
    }

    public function foto()
    {
          $berandacarouselkiri=gambar::where('kategori',"berandacarouselkiri")->get();
          $berandaslidertengah=gambar::where('kategori',"berandaslidertengah")->get();
          $berandacarouselkanan=gambar::where('kategori',"berandacarouselkanan")->get();
          $groupcarouselkiri=gambar::where('kategori',"groupcarouselkiri")->get();
          $groupslidertengah=gambar::where('kategori',"groupslidertengah")->get();
          $groupcarouselkanan=gambar::where('kategori',"groupcarouselkanan")->get();
          $familycarouselkiri=gambar::where('kategori',"familycarouselkiri")->get();
          $familyslidertengah=gambar::where('kategori',"familyslidertengah")->get();
          $familycarouselkanan=gambar::where('kategori',"familycarouselkanan")->get();
          $couplecarouselkiri=gambar::where('kategori',"couplecarouselkiri")->get();
          $coupleslidertengah=gambar::where('kategori',"coupleslidertengah")->get();
          $couplecarouselkanan=gambar::where('kategori',"couplecarouselkanan")->get();
          $babycarouselkiri=gambar::where('kategori',"babycarouselkiri")->get();
          $babyslidertengah=gambar::where('kategori',"babyslidertengah")->get();
          $babycarouselkanan=gambar::where('kategori',"babycarouselkanan")->get();
          $weddingcarouselkiri=gambar::where('kategori',"weddingcarouselkiri")->get();
          $weddingslidertengah=gambar::where('kategori',"weddingslidertengah")->get();
          $weddingcarouselkanan=gambar::where('kategori',"weddingcarouselkanan")->get();
          $wisudacarouselkiri=gambar::where('kategori',"wisudacarouselkiri")->get();
          $wisudaslidertengah=gambar::where('kategori',"wisudaslidertengah")->get();
          $wisudacarouselkanan=gambar::where('kategori',"wisudacarouselkanan")->get();
          $othercarouselkiri=gambar::where('kategori',"othercarouselkiri")->get();
          $otherslidertengah=gambar::where('kategori',"otherslidertengah")->get();
          $othercarouselkanan=gambar::where('kategori',"othercarouselkanan")->get();
          $jasacarouselkiri=gambar::where('kategori',"jasacarouselkiri")->get();










      return view('foto',[
                        'berandacarouselkiri' => $berandacarouselkiri
                        ,'berandaslidertengah' => $berandaslidertengah
                        ,'berandacarouselkanan' => $berandacarouselkanan
                        ,'groupcarouselkiri' => $groupcarouselkiri
                        ,'groupslidertengah' => $groupslidertengah
                        ,'groupcarouselkanan' => $groupcarouselkanan
                        ,'familycarouselkiri' => $familycarouselkiri
                        ,'familyslidertengah' => $familyslidertengah
                        ,'familycarouselkanan' => $familycarouselkanan
                        ,'couplecarouselkiri' => $couplecarouselkiri
                        ,'coupleslidertengah' => $coupleslidertengah
                        ,'couplecarouselkanan' => $couplecarouselkanan
                        ,'babycarouselkiri' => $babycarouselkiri
                        ,'babyslidertengah' => $babyslidertengah
                        ,'babycarouselkanan' => $babycarouselkanan
                        ,'weddingcarouselkiri' => $weddingcarouselkiri
                        ,'weddingslidertengah' => $weddingslidertengah
                        ,'weddingcarouselkanan' => $weddingcarouselkanan
                        ,'wisudacarouselkiri' => $wisudacarouselkiri
                        ,'wisudaslidertengah' => $wisudaslidertengah
                        ,'wisudacarouselkanan' => $wisudacarouselkanan
                        ,'othercarouselkiri' => $othercarouselkiri
                        ,'otherslidertengah' => $otherslidertengah
                        ,'othercarouselkanan' => $othercarouselkanan
                        ,'jasacarouselkiri' => $jasacarouselkiri

                        ]);
    }



//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    public function tambahberandacarouselkiri(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"berandacarouselkiri")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "berandacarouselkiri";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("berandacarouselkiri/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusberandacarouselkiri($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('berandacarouselkiri/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }







    public function tambahberandaslidertengah(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"berandaslidertengah")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "berandaslidertengah";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("berandaslidertengah/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusberandaslidertengah($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('berandaslidertengah/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }

    public function tambahberandacarouselkanan(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"berandacarouselkanan")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "berandacarouselkanan";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("berandacarouselkanan/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusberandacarouselkanan($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('berandacarouselkanan/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    public function tambahgroupcarouselkiri(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"groupcarouselkiri")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "groupcarouselkiri";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("groupcarouselkiri/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusgroupcarouselkiri($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('groupcarouselkiri/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }







    public function tambahgroupslidertengah(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"groupslidertengah")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "groupslidertengah";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("groupslidertengah/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusgroupslidertengah($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('groupslidertengah/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }

    public function tambahgroupcarouselkanan(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"groupcarouselkanan")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "groupcarouselkanan";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("groupcarouselkanan/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusgroupcarouselkanan($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('groupcarouselkanan/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    public function tambahfamilycarouselkiri(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"familycarouselkiri")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "familycarouselkiri";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("familycarouselkiri/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusfamilycarouselkiri($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('familycarouselkiri/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }







    public function tambahfamilyslidertengah(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"familyslidertengah")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "familyslidertengah";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("familyslidertengah/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusfamilyslidertengah($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('familyslidertengah/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }

    public function tambahfamilycarouselkanan(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"familycarouselkanan")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "familycarouselkanan";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("familycarouselkanan/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusfamilycarouselkanan($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('familycarouselkanan/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    public function tambahcouplecarouselkiri(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"couplecarouselkiri")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "couplecarouselkiri";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("couplecarouselkiri/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapuscouplecarouselkiri($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('couplecarouselkiri/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }







    public function tambahcoupleslidertengah(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"coupleslidertengah")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "coupleslidertengah";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("coupleslidertengah/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapuscoupleslidertengah($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('coupleslidertengah/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }

    public function tambahcouplecarouselkanan(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"couplecarouselkanan")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "couplecarouselkanan";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("couplecarouselkanan/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapuscouplecarouselkanan($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('couplecarouselkanan/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    public function tambahbabycarouselkiri(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"babycarouselkiri")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "babycarouselkiri";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("babycarouselkiri/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusbabycarouselkiri($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('babycarouselkiri/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }







    public function tambahbabyslidertengah(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"babyslidertengah")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "babyslidertengah";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("babyslidertengah/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusbabyslidertengah($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('babyslidertengah/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }

    public function tambahbabycarouselkanan(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"babycarouselkanan")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "babycarouselkanan";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("babycarouselkanan/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusbabycarouselkanan($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('babycarouselkanan/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    public function tambahweddingcarouselkiri(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"weddingcarouselkiri")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "weddingcarouselkiri";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("weddingcarouselkiri/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusweddingcarouselkiri($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('weddingcarouselkiri/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }







    public function tambahweddingslidertengah(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"weddingslidertengah")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "weddingslidertengah";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("weddingslidertengah/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusweddingslidertengah($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('weddingslidertengah/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }

    public function tambahweddingcarouselkanan(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"weddingcarouselkanan")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "weddingcarouselkanan";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("weddingcarouselkanan/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusweddingcarouselkanan($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('weddingcarouselkanan/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    public function tambahwisudacarouselkiri(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"wisudacarouselkiri")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "wisudacarouselkiri";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("wisudacarouselkiri/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapuswisudacarouselkiri($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('wisudacarouselkiri/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }







    public function tambahwisudaslidertengah(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"wisudaslidertengah")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "wisudaslidertengah";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("wisudaslidertengah/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapuswisudaslidertengah($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('wisudaslidertengah/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }

    public function tambahwisudacarouselkanan(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"wisudacarouselkanan")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "wisudacarouselkanan";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("wisudacarouselkanan/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapuswisudacarouselkanan($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('wisudacarouselkanan/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    public function tambahothercarouselkiri(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"othercarouselkiri")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "othercarouselkiri";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("othercarouselkiri/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusothercarouselkiri($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('othercarouselkiri/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }







    public function tambahotherslidertengah(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"otherslidertengah")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "otherslidertengah";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("otherslidertengah/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusotherslidertengah($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('otherslidertengah/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }

    public function tambahothercarouselkanan(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"othercarouselkanan")->count();
        $jumlah = $baru + $lama;

        if ($jumlah > 5) {

          return redirect('foto');
        }


      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "othercarouselkanan";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("othercarouselkanan/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusothercarouselkanan($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('othercarouselkanan/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//DIVIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    public function tambahjasacarouselkiri(Request $request)
    {


      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'gambar' => 'required',
    ]);
      $files = $request->file('gambar');
      if(!empty($files)):

        $baru = count($files);
        $lama =gambar::where('kategori',"jasacarouselkiri")->count();
        $jumlah = $baru + $lama;




      foreach($files as $file):
        $gambars = new gambar;
        $gambars->kategori       = "jasacarouselkiri";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("jasacarouselkiri/", $fileName);
                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

      endif;

      return redirect('foto');
    }

    public function hapusjasacarouselkiri($id)
    {
      $Filepdf = gambar::find($id);
      $filelokasi = $Filepdf->gambar;
      File::delete('jasacarouselkiri/' . $filelokasi);
      $Filepdf->delete();
      return redirect('foto');
    }



}
