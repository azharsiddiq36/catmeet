<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Pengguna
    $route['administrator/profile'] = 'PenggunaController/profile';
	$route['administrator/dashboard'] = 'PenggunaController';
    $route['administrator/pengguna'] = 'PenggunaController/daftar';
    $route['administrator/pengguna/tambah'] = 'PenggunaController/tambah';
    $route['administrator/pengguna/edit/(:any)'] = 'PenggunaController/edit/$1';
    $route['administrator/pengguna/hapus/(:any)'] = 'PenggunaController/delete/$1';
    $route['detail_pengguna'] = 'PenggunaController/detail';
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
    //Kucing
    $route['administrator/kucing'] = 'KucingController/daftar';
    $route['administrator/kucing/tambah'] = 'KucingController/tambah';
    $route['administrator/kucing/edit/(:any)'] = 'KucingController/edit/$1';
    $route['administrator/kucing/hapus/(:any)'] = 'KucingController/delete/$1';
    //Postingan
    $route['administrator/postingan'] = 'PostinganController/daftar';
    $route['administrator/postingan/tambah'] = 'PostinganController/tambah';
    $route['administrator/postingan/edit/(:any)'] = 'PostinganController/edit/$1';
    $route['administrator/postingan/hapus/(:any)'] = 'PostinganController/delete/$1';
    //Toko
    $route['administrator/toko'] = 'TokoController/daftar';
    $route['administrator/toko/tambah'] = 'TokoController/tambah';
    $route['administrator/toko/aktif/(:any)'] = 'TokoController/aktif/$1';
    $route['administrator/toko/nonaktif/(:any)'] = 'TokoController/nonaktif/$1';

	// authentication
	$route['administrator/logout'] = 'AuthController/logout';
    $route['login'] = 'AuthController/login';
	$route['default_controller'] = 'AuthController';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

