<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiPesan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('KucingModel');
        $this->load->model('JadwalModel');
        $this->load->model('ChatModel');
    }

    public function tambahChat()
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
        $this->ChatModel->post_pasangan($param);
         $response['status'] = 200;
        $response['message'] = "Berhasil menambahkan data";
        echo json_encode($response);
    }
    public function getChat(){
        $response = null;
        $kontak = $this->input->post("chatting_kontak");
        $data = $this->ChatModel->getChat($kontak);
        if ($data->num_rows()>0){
            $response['status'] = 200;
            $response['message'] = "Berhasil Memuat Data";
            $response['data'] = $data->result_array();
        }
        else{
            $response['status'] = 403;
            $response['message'] = "Data Tidak Ditemukan";
        }
        echo json_encode($response);
    }
    public function getLastChat(){
        $kontak_id = $this->input->post('kontak_id');
        $data = $this->ChatModel->getLastChat($kontak_id);
        if ($data->num_rows()>0){
            $response['status'] = 200;
            $response['message'] = "Berhasil Memuat Data";
            $response['data'] = $data->row_array();
        }
        else{
            $response['status'] = 403;
            $response['message'] = "Data Tidak Ditemukan";
        }
        echo json_encode($response);
    }
}