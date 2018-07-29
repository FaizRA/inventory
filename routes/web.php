<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('login', ['as' => 'login', 'uses' => 'inventory@login']);
Route::put('/aksilogin', 'inventory@loginaksi');


Route::get('/', function () {
    return view('viewhome');
});
Route::get('home', function () {
    return view('viewhome');
});
Route::get('tentangkami', function () {
    return view('viewtentangkami');
});
Route::get('portofolio', function () {
    return view('viewportofolio');
});
Route::get('jasakami', function () {
    return view('viewjasa');
});
Route::get('lowongan', function () {
    return view('viewlowongan');
});
Route::get('kontak', function () {
    return view('viewkontak');
});


Route::get('home', ['as' => 'home', 'uses' => 'inventory@home']);
Route::get('barang', ['as' => 'barang', 'uses' => 'inventory@barang']);
Route::put('/aksitambahbarang', 'inventory@aksitambahbarang');
Route::get('hapusbarang/{id}', 'Inventory@hapusbarang');
Route::get('jasa', ['as' => 'jasa', 'uses' => 'inventory@jasa']);
Route::put('/aksitambahjasa', 'inventory@aksitambahjasa');
Route::put('/aksitambahpenggunaanjasa', 'inventory@aksitambahpenggunaanjasa');
Route::get('hapusjasa/{id}', 'Inventory@hapusjasa');

Route::get('gudang', ['as' => 'gudang', 'uses' => 'inventory@gudang']);
Route::put('/aksitambahgudang', 'inventory@aksitambahgudang');

Route::get('keranjang', ['as' => 'keranjang', 'uses' => 'inventory@keranjang']);
Route::put('/aksitambahkeranjang', 'inventory@aksitambahkeranjang');
Route::get('hapuskeranjang/{id}', 'Inventory@hapuskeranjang');
Route::get('proseskeranjang', ['as' => 'proseskeranjang', 'uses' => 'inventory@proseskeranjang']);

Route::get('foto', ['as' => 'foto', 'uses' => 'inventory@foto']);


Route::put('/tambahberandacarouselkiri', 'inventory@tambahberandacarouselkiri');
Route::get('hapusberandacarouselkiri/{id}', 'inventory@hapusberandacarouselkiri');

Route::put('/tambahberandaslidertengah', 'inventory@tambahberandaslidertengah');
Route::get('hapusberandaslidertengah/{id}', 'inventory@hapusberandaslidertengah');

Route::put('/tambahberandacarouselkanan', 'inventory@tambahberandacarouselkanan');
Route::get('hapusberandacarouselkanan/{id}', 'inventory@hapusberandacarouselkanan');


Route::put('/tambahgroupcarouselkiri', 'inventory@tambahgroupcarouselkiri');
Route::get('hapusgroupcarouselkiri/{id}', 'inventory@hapusgroupcarouselkiri');

Route::put('/tambahgroupslidertengah', 'inventory@tambahgroupslidertengah');
Route::get('hapusgroupslidertengah/{id}', 'inventory@hapusgroupslidertengah');

Route::put('/tambahgroupcarouselkanan', 'inventory@tambahgroupcarouselkanan');
Route::get('hapusgroupcarouselkanan/{id}', 'inventory@hapusgroupcarouselkanan');


Route::put('/tambahfamilycarouselkiri', 'inventory@tambahfamilycarouselkiri');
Route::get('hapusfamilycarouselkiri/{id}', 'inventory@hapusfamilycarouselkiri');

Route::put('/tambahfamilyslidertengah', 'inventory@tambahfamilyslidertengah');
Route::get('hapusfamilyslidertengah/{id}', 'inventory@hapusfamilyslidertengah');

Route::put('/tambahfamilycarouselkanan', 'inventory@tambahfamilycarouselkanan');
Route::get('hapusfamilycarouselkanan/{id}', 'inventory@hapusfamilycarouselkanan');


Route::put('/tambahcouplecarouselkiri', 'inventory@tambahcouplecarouselkiri');
Route::get('hapuscouplecarouselkiri/{id}', 'inventory@hapuscouplecarouselkiri');

Route::put('/tambahcoupleslidertengah', 'inventory@tambahcoupleslidertengah');
Route::get('hapuscoupleslidertengah/{id}', 'inventory@hapuscoupleslidertengah');

Route::put('/tambahcouplecarouselkanan', 'inventory@tambahcouplecarouselkanan');
Route::get('hapuscouplecarouselkanan/{id}', 'inventory@hapuscouplecarouselkanan');

Route::put('/tambahbabycarouselkiri', 'inventory@tambahbabycarouselkiri');
Route::get('hapusbabycarouselkiri/{id}', 'inventory@hapusbabycarouselkiri');

Route::put('/tambahbabyslidertengah', 'inventory@tambahbabyslidertengah');
Route::get('hapusbabyslidertengah/{id}', 'inventory@hapusbabyslidertengah');

Route::put('/tambahbabycarouselkanan', 'inventory@tambahbabycarouselkanan');
Route::get('hapusbabycarouselkanan/{id}', 'inventory@hapusbabycarouselkanan');

Route::put('/tambahweddingcarouselkiri', 'inventory@tambahweddingcarouselkiri');
Route::get('hapusweddingcarouselkiri/{id}', 'inventory@hapusweddingcarouselkiri');

Route::put('/tambahweddingslidertengah', 'inventory@tambahweddingslidertengah');
Route::get('hapusweddingslidertengah/{id}', 'inventory@hapusweddingslidertengah');

Route::put('/tambahweddingcarouselkanan', 'inventory@tambahweddingcarouselkanan');
Route::get('hapusweddingcarouselkanan/{id}', 'inventory@hapusweddingcarouselkanan');

Route::put('/tambahwisudacarouselkiri', 'inventory@tambahwisudacarouselkiri');
Route::get('hapuswisudacarouselkiri/{id}', 'inventory@hapuswisudacarouselkiri');

Route::put('/tambahwisudaslidertengah', 'inventory@tambahwisudaslidertengah');
Route::get('hapuswisudaslidertengah/{id}', 'inventory@hapuswisudaslidertengah');

Route::put('/tambahwisudacarouselkanan', 'inventory@tambahwisudacarouselkanan');
Route::get('hapuswisudacarouselkanan/{id}', 'inventory@hapuswisudacarouselkanan');

Route::put('/tambahothercarouselkiri', 'inventory@tambahothercarouselkiri');
Route::get('hapusothercarouselkiri/{id}', 'inventory@hapusothercarouselkiri');

Route::put('/tambahotherslidertengah', 'inventory@tambahotherslidertengah');
Route::get('hapusotherslidertengah/{id}', 'inventory@hapusotherslidertengah');

Route::put('/tambahothercarouselkanan', 'inventory@tambahothercarouselkanan');
Route::get('hapusothercarouselkanan/{id}', 'inventory@hapusothercarouselkanan');

Route::put('/tambahjasacarouselkiri', 'inventory@tambahjasacarouselkiri');
Route::get('hapusjasacarouselkiri/{id}', 'inventory@hapusjasacarouselkiri');
