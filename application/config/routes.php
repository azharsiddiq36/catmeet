<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Pengguna
    $route['administrator/profile'] = 'PenggunaController/profile';
    $route['administrator/changepassword'] = 'PenggunaController/changepassword';
	$route['administrator/dashboard'] = 'PenggunaController';
    $route['administrator/pengguna'] = 'PenggunaController/daftar';
    $route['administrator/pengguna/tambah'] = 'PenggunaController/tambah';
    $route['administrator/pengguna/edit/(:any)'] = 'PenggunaController/edit/$1';
    $route['administrator/pengguna/hapus/(:any)'] = 'PenggunaController/delete/$1';
    $route['detail_pengguna'] = 'PenggunaController/detail';
//    $route['load_data_diri'] = 'PenggunaController/load';
    //Jadwal
    $route['administrator/jadwal'] = 'JadwalController/daftar';
    $route['administrator/jadwal/tambah'] = 'JadwalController/tambah';
    $route['administrator/jadwal/edit/(:any)'] = 'JadwalController/edit/$1';
    $route['administrator/jadwal/hapus/(:any)'] = 'JadwalController/delete/$1';

    //Kategori
    $route['administrator/kategori'] = 'KategoriController/daftar';
    $route['administrator/kategori/tambah'] = 'KategoriController/tambah';
    $route['administrator/kategori/edit/(:any)'] = 'KategoriController/edit/$1';
    $route['administrator/kategori/hapus/(:any)'] = 'KategoriController/delete/$1';
    //Kontes
    $route['administrator/kontes'] = 'KontesController/daftar';
    $route['administrator/kontes/tambah'] = 'KontesController/tambah';
    $route['administrator/kontes/accept/(:any)'] = 'KontesController/accept/$1';
    $route['administrator/kontes/tolak/(:any)'] = 'KontesController/tolak/$1';
    $route['detail_kontes'] = 'KontesController/detail';
    //Kucing
    $route['administrator/kucing'] = 'KucingController/daftar';
    $route['administrator/kucing/tambah'] = 'KucingController/tambah';
    $route['administrator/kucing/edit/(:any)'] = 'KucingController/edit/$1';
    $route['administrator/kucing/hapus/(:any)'] = 'KucingController/delete/$1';
    //Informasi
    $route['administrator/informasi'] = 'InformasiController/daftar';
    $route['administrator/informasi/tambah'] = 'InformasiController/tambah';
    $route['administrator/informasi/edit/(:any)'] = 'InformasiController/edit/$1';
    $route['administrator/informasi/hapus/(:any)'] = 'InformasiController/delete/$1';
    //Postingan
    $route['administrator/postingan'] = 'PostinganController/daftar';
    $route['administrator/postingan/tambah'] = 'PostinganController/tambah';
    $route['administrator/postingan/edit/(:any)'] = 'PostinganController/edit/$1';
    $route['administrator/postingan/hapus/(:any)'] = 'PostinganController/delete/$1';
    $route['detail_komentar'] = 'PostinganController/komentar';
    $route['detail_report'] = 'PostinganController/report';
    //Toko
    $route['administrator/toko'] = 'TokoController/daftar';
    $route['administrator/toko/tambah'] = 'TokoController/tambah';
    $route['administrator/toko/aktif/(:any)'] = 'TokoController/aktif/$1';
    $route['administrator/toko/nonaktif/(:any)'] = 'TokoController/nonaktif/$1';
    $route['detail_toko'] = 'TokoController/detail';
    //foto
//    $route['administrator'] = ''
	// authentication
    $route['sendmail'] = 'PenggunaController/sendmail';
	$route['administrator/logout'] = 'AuthController/logout';
    $route['login'] = 'AuthController/login';
	$route['default_controller'] = 'AuthController';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

	//email
	$route['pengguna/validasi/(:any)'] = 'ApiPengguna/validation';
    $route['pengguna/reset/(:any)'] = 'ApiPengguna/reset';


	//api pengguna
    $route['api/login/pengguna'] = 'ApiPengguna/login';
    $route['api/updatelocation/pengguna'] = 'ApiPengguna/updateLocation';
    $route['api/forget/pengguna'] = 'ApiPengguna/forget';
    $route['api/register/pengguna'] = 'ApiPengguna/register';
    $route['api/validasi/pengguna'] = 'ApiPengguna/checkdatadiri';
    $route['api/detailaccount/pengguna'] = 'ApiPengguna/getDetailAccount';
    $route['api/ktp/pengguna'] = 'ApiPengguna/uploadKtp';
    $route['api/fotodiri/pengguna'] = 'ApiPengguna/uploadFotoDiri';
    $route['api/update1/pengguna'] = 'ApiPengguna/update1';
    $route['api/update2/pengguna'] = 'ApiPengguna/update2';
    //kucing api
    $route['api/kucing/tambah'] = 'ApiKucing/tambah';
    $route['api/kucing/mycat'] = 'ApiKucing/myListCat';
    //pasangan api
    $route['api/pasangan/tambah'] = 'ApiPasangan/tambah';
    $route['api/pasangan/list'] = 'ApiPasangan/getList';
    //chat api
    $route['api/pesan/getconversation'] = 'ApiPesan/getChat';
    $route['api/kontak/getkontak'] = 'ApiKontak/getKontak';
    $route['api/pesan/lastconversation'] = 'ApiPesan/getLastChat';
    //toko api
    $route['api/toko/get'] ='ApiToko/getToko';
    $route['api/toko/tambah'] ='ApiToko/tambah';
    $route['api/toko/update'] = 'ApiToko/updateToko';
    $route['api/toko/update1'] = 'ApiToko/updateToko1';
    $route['api/toko/getlisttoko'] = 'ApiToko/getListToko';
    //postingan
    $route['api/postingan/tambah'] = 'ApiPostingan/tambah';
    $route['api/postingan/get'] = 'ApiPostingan/getPostingan';
    //komentar
    $route['api/komentar/tambah'] = 'ApiKomentar/tambah';
    $route['api/komentar/get'] = 'ApiKomentar/getKomentar';
    //report
    $route['api/report/tambah'] = 'ApiReport/tambah';