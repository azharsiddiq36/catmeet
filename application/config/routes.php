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
$route['administrator/jeniskontes'] = 'JenisKontesController/index';
$route['administrator/jeniskontes/tambah'] = 'JenisKontesController/tambah';
$route['administrator/jeniskontes/edit/(:any)'] = 'JenisKontesController/edit/$1';
$route['administrator/jeniskontes/delete/(:any)'] = 'JenisKontesController/hapus/$1';
$route['kontes/cetak/(:any)'] = "KontesController/cetak/$1";
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
$route['api/kucing/getone'] = 'ApiKucing/getCat';
$route['api/kucing/tambah'] = 'ApiKucing/tambah';
$route['api/kucing/mycat'] = 'ApiKucing/myListCat';
//pasangan api
$route['api/pasangan/tambah'] = 'ApiPasangan/tambah';
$route['api/pasangan/list'] = 'ApiPasangan/getList';
//chat api
$route['api/pesan/getconversation'] = 'ApiPesan/getChat';
$route['api/pesan/check'] = 'ApiPesan/getStatus';
$route['api/kontak/getkontak'] = 'ApiKontak/getKontak';
$route['api/kontak/check'] = 'ApiKontak/checkKontak';
$route['api/kontak/addkontak'] = 'ApiKontak/addKontak';
$route['api/pesan/addconversation'] = 'ApiPesan/tambahChat';
$route['api/pesan/lastconversation'] = 'ApiPesan/getLastChat';
//toko api
$route['api/toko/get'] = 'ApiToko/getToko';
$route['api/toko/tambah'] = 'ApiToko/tambah';
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
//Jadwal
$route['api/jadwal/tambah'] = 'ApiPenjadwalan/addJadwal';
$route['api/jadwal/get'] = 'ApiPenjadwalan/getJadwal';
$route['api/jadwal/acc'] = 'ApiPenjadwalan/accJadwal';
$route['api/jadwal/reject'] = 'ApiPenjadwalan/rejectJadwal';

//api kontes
$route['api/kontes/getjenis'] = 'ApiKontes/getJenisKontes';
$route['api/kontes/add'] = 'ApiKontes/tambah';
$route['api/kontes/get'] = 'ApiKontes/getListKontes';
$route['api/kontes/detail'] = 'ApiKontes/detail';
$route['api/kontes/mycontes'] = 'ApiKontes/mycontest';
$route['api/kontes/mytiket'] = 'ApiKontes/tiket';
$route['api/kontes/getpreview'] = 'ApiKontes/preview';
$route['api/kontes/pesan'] = 'ApiKontes/pesan';
$route['api/kontes/bayar'] = 'ApiKontes/bayar';
$route['api/kontes/mylist'] = 'ApiKontes/getmylistkontes';

//api pemesanan
$route['api/pemesanan/add'] = 'ApiPemesanan/tambah';
$route['api/pemesanan/getorder'] = 'ApiPemesanan/getmyorder';
$route['api/pemesanan/getone'] = 'ApiPemesanan/getoneorder';

//api pembayaran
$route['api/pembayaran/add'] = 'ApiPembayaran/tambah';
$route['api/pembayaran/getmypayment'] = 'ApiPembayaran/getmylist';

//api saldo
$route['api/saldo/getmycontest'] = 'ApiSaldo/getmycontest';
$route['api/saldo/add'] = 'ApiSaldo/tambah';
$route['api/saldo/tarik'] = 'ApiSaldo/tariksaldo';
$route['api/saldo/transfer'] = 'ApiSaldo/transfer';
$route['api/saldo/totalsaldokontes'] = 'ApiSaldo/totalsaldo';