<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiPasangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('PasanganModel');
        $this->load->model('KucingModel');
        $this->load->model('JadwalModel');
    }

    public function tambah()
    {
        $response = null;
        $id = $this->input->post("pasangan_pengguna_id");
        $kucing = $this->input->post('pasangan_kucing_id');
        $pasangan_hari = $this->input->post('pasangan_hari');
        $pasangan_status = "menunggu";
        $tgl = date('Y-m-d h:i:s');
        $expired = date('Y-m-d h:i:s',strtotime('+7 days',strtotime($tgl)));
        $pecah = explode(",",$pasangan_hari);
        $param = array("pasangan_pengguna_id"=>$id,
            "pasangan_kucing_id"=>$kucing,
            "pasangan_hari"=>$pasangan_hari,
            "pasangan_status"=>$pasangan_status,
        "pasangan_tanggal_expired"=>$expired);
        $this->PasanganModel->post_pasangan($param);
         $response['status'] = 200;
        $response['message'] = "Berhasil menambahkan data";
        echo json_encode($response);
    }
    public function getList(){
        $response = null;
        $provinsi = $this->input->post("pasangan_provinsi");
        $kabupaten = $this->input->post("pasangan_kabupaten");
        $kecamatan = $this->input->post("pasangan_kecamatan");
        $desa = $this->input->post("pasangan_desa");
        $kucing = $this->input->post("pasangan_kucing_jenis");
        $kab_baru = str_replace("KABUPATEN","",$kabupaten);
        $data = $this->PasanganModel->getLocation($kucing,$provinsi,$kab_baru,$kecamatan,$desa);
        if ($data->num_rows()>0){
            $response['status'] = 200;
            $response['message'] = "Berhasil Memuat Data";
            $response['data'] = $data->result_array();
        }
        else{
            $response['status'] = 403;
            $response['message'] = "Data Tidak Ditemukan".$provinsi.$kabupaten.$kecamatan.$desa.$kucing;

        }
        echo json_encode($response);
    }
}