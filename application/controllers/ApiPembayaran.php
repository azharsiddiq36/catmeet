<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiPembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('PembayaranModel');
        $this->load->model('PemesananModel');
        $this->load->model('KontesModel');
        $this->load->model('SaldoModel');
    }

    public function tambah()
    {
        $response = null;
        $pemesanan = $this->input->post("pemesanan_id");
        $pengguna = $this->input->post('pengguna_id');
        $jumlah = $this->input->post('pembayaran_jumlah');
        $jenis = $this->input->post('pembayaran_jenis');
        $kontes = $this->input->post('pembayaran_kontes');

        $status = "menunggu";
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 204800;
        $this->upload->initialize($config);
        if ($jenis === 'saldo'){
            $prm = array("pengguna_id"=>$pengguna);
            $user_bayar = $this->PenggunaModel->getOne($prm);
            $sldouser = $user_bayar['pengguna_saldo'] - $jumlah;
            if ($sldouser<0){
                $response['status'] = 200;
                $response['message'] = "Maaf Saldo Anda Kurang";
            }
            else{
                //kurangi saldo user
                $prm = array("pengguna_saldo"=>$sldouser);
                $this->PenggunaModel->editPengguna($pengguna,$prm);
                $param = array("pembayaran_pemesanan_id"=>$pemesanan,
                    "pembayaran_pengguna_id"=>$pengguna,
                    "pembayaran_jumlah"=>$jumlah,
                    "pembayaran_jenis"=>$jenis,
                    "pembayaran_status"=>"setuju",
                    "pembayaran_bukti"=>null,
                    "pembayaran_kontes_id"=>$kontes);
                $this->PembayaranModel->post_pembayaran($param);
                $response['status'] = 200;
                $response['message'] = "Berhasil Menambahkan Pembayaran";
                //update status pemesanan
                $prm = array("pemesanan_status"=>"setuju");
                $this->PemesananModel->editPemesanan($pemesanan,$prm);
                //get data kontes
                $prm= array("kontes_id"=>$kontes);
                $data_kontes = $this->KontesModel->getOne($prm);
                //get data pemesanan
                $prm = array("pemesanan_id"=>$pemesanan);
                $data_pemesnaan = $this->PemesananModel->getOne($prm);
                //init jumlah
                $jlh = $data_kontes['kontes_jumlah_pemesan']+$data_pemesnaan['pemesanan_jumlah'];
                //init kuota
                $kuota = $data_kontes['kontes_kuota']-$data_pemesnaan['pemesanan_jumlah'];
                //update kuota kontes
                $prm = array("kontes_kuota"=>$kuota,
                    "kontes_jumlah_pemesan"=>$jlh);
                $this->KontesModel->editKontes($kontes,$prm);
                //get data untuk admin saldo
                $prm =array("pengguna_hak_akses"=>"administrator");
                $pengguna = $this->PenggunaModel->getOne($prm);
                $ket = "pembayaran tiket untuk event ".$data_kontes['kontes_nama'];
                //tambah saldo admin
                $ttlsaldo = $pengguna['pengguna_saldo']+$jumlah;
                $prm = array("pengguna_saldo"=>$ttlsaldo);
                $this->PenggunaModel->editPengguna($pengguna['pengguna_id'],$prm);
                $prm = array("saldo_jenis"=>"debit",
                    "saldo_pengguna_id"=>$pengguna['pengguna_id'],
                    "saldo_jumlah"=>$jumlah,
                    "saldo_keterangan"=>$ket,
                    "saldo_bukti"=>null);
                $this->SaldoModel->post_saldo($prm);
            }

        }
        else{
            if (!$this->upload->do_upload('foto')) {
                $response['status'] = 410;
                $response['message'] = "gagal mengupload foto";
            } else {
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/upload/' . $this->upload->data('file_name');
                $size = getimagesize(base_url() . '/assets/img/upload/' . $this->upload->data('file_name'));
                //$size = getimagesize(base_url().'/assets/img/upload/' . $this->upload->data('file_name'));
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = $size[0] / 2;
                $config['height'] = $size[1] / 2;
                $config['new_image'] = './assets/img/upload/' . $this->upload->data('file_name');
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $foto = $this->upload->data('file_name');
                $param = array("pembayaran_pemesanan_id"=>$pemesanan,
                    "pembayaran_pengguna_id"=>$pengguna,
                    "pembayaran_jumlah"=>$jumlah,
                    "pembayaran_jenis"=>$jenis,
                    "pembayaran_status"=>$status,
                    "pembayaran_bukti"=>$foto,
                    "pembayaran_kontes_id"=>$kontes);
                $this->PembayaranModel->post_pembayaran($param);
                $prm = array("pemesanan_status"=>"setuju");
                $this->PemesananModel->editPemesanan($pemesanan,$prm);
                $response['status'] = 200;
                $response['message'] = "Berhasil Menambahkan Pembayaran";
            }
        }

        echo json_encode($response);
    }

    public function getmylist()
    {
        $response = null;
        $pembayaran_pengguna_id = $this->input->post("id");
        $data = $this->PembayaranModel->getByPengguna($pembayaran_pengguna_id);
        if ($data->num_rows() == 0 ){
            $response['status'] = 400;
            $response['message'] = "Daftar pembayaran anda belum ada";
        }
        else{
            $response['status'] = 200;
            $response['message'] = "Berhasil Memuat Data";
            $response['data'] = $data->result_array();
        }
        echo json_encode($response);
    }
}