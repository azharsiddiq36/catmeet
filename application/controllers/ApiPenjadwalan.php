<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiPenjadwalan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('KucingModel');
        $this->load->model('JadwalModel');
    }

    public function addJadwal()
    {
        $response = null;
        $pengguna1 = $this->input->post("pengguna1");
        $pengguna2 = $this->input->post("pengguna2");
        $kucing1 = $this->input->post("kucing1");
        $kucing2 = $this->input->post("kucing2");
        $jadwal = $this->input->post("jadwal");
        $lokasi = $this->input->post("lokasi");
        $id_kucing2 = $this->KucingModel->get_by_cat_name($pengguna2,$kucing2)->row_array();
        if ($id_kucing2== null){
            $response['status'] = 403;
            $response['message'] = "Nama kucing anda tidak terdaftar";
        }
        else{
            $param = array("penjadwalan_deskripsi"=>"Perkawinan Kucing",
                "penjadwalan_status"=>"menunggu",
                "penjadwalan_lokasi"=>$lokasi,
                "penjadwalan_id_pengaju"=>$pengguna1,
                "penjadwalan_id_penerima"=>$pengguna2,
                "penjadwalan_tanggal"=>$jadwal,
                "penjadwalan_id_kucing_pengaju"=> $kucing1,
                "penjadwalan_id_kucing_penerima"=>$id_kucing2['kucing_id']);
            $this->JadwalModel->post_jadwal($param);
            $response['status'] = 200;
            $response['message'] = "Berhasil menambahkan data";
        }
         echo json_encode($response);
    }
    public function getJadwal(){
        $response = null;
        $pengguna_id = $this->input->post("pengguna_id");
        $status = $this->input->post("status");
        $data = $this->JadwalModel->get_jadwal_by_id($pengguna_id,$status);
        if ($data->num_rows()>0){
            $hasil = array();
            if ($status == null){
                $hasil = $data->result_array();
            }
            else{


            foreach ($data->result() as $k){
                if ($k->penjadwalan_status == $status){
                    array_push($hasil,$k);
                    }
                }
            }
            $response['status'] = 200;
            $response['message'] = "Berhasil Memuat Data";
            $response['data'] = $hasil;
            $response['total'] = count($hasil);
        }
        else{
            $response['status'] = 403;
            $response['message'] = "Data Tidak Ditemukan";
        }
        echo json_encode($response);
    }
    public function accJadwal(){
        $response = null;
        $jadwal_id = $this->input->post("jadwal_id");
        $tgl = date('Y-m-d h:i:s');
        $param = array("penjadwalan_status" => "setuju",
            "penjadwalan_tgl_terima"=>$tgl);
        $this->JadwalModel->editJadwal($jadwal_id,$param);
        $response['status'] = 200;
        $response['message'] = "Berhasil Menyetujui Data";
        echo json_encode($response);
    }
    public function rejectJadwal(){
        $response = null;
        $jadwal_id = $this->input->post("jadwal_id");
        $param = array("penjadwalan_status" => "batal");
        $this->JadwalModel->editJadwal($jadwal_id,$param);
        $response['status'] = 200;
        $response['message'] = "Berhasil Menyetujui Data";
        echo json_encode($response);
    }

}