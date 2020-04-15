<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiKontak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('KucingModel');
        $this->load->model('JadwalModel');
        $this->load->model('KontakModel');
    }

    public function addKontak()
    {
        $response = null;
        $pengguna1 = $this->input->post("pengguna1");
        $pengguna2 = $this->input->post("pengguna2");
        $param = array("kontak_pengguna_id"=>$pengguna1,
            "kontak_pengguna_id2"=>$pengguna2);
        $this->KontakModel->post_kontak($param);
        $data = $this->KontakModel->get_one($pengguna1,$pengguna2);
        $response['status'] = 200;
        $response['message'] = "Berhasil menambahkan data";
        $response['data'] = $data->row_array();
        echo json_encode($response);
    }
    public function getKontak(){
        $response = null;
        $pengguna_id = $this->input->post("pengguna_id");
        $data = $this->KontakModel->getKontak($pengguna_id);
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
    public function checkKontak(){
        $response = null;
        $pengguna1 = $this->input->post("pengguna1");
        $pengguna2 = $this->input->post("pengguna2");
        $data1 = $this->KontakModel->get_one($pengguna1,$pengguna2);
        $data2 = $this->KontakModel->get_one($pengguna2,$pengguna1);
        $data = null;
        if ($data1->num_rows()>0){
            $data = $data1;
            $response['status'] = 200;
            $response['message'] = "Berhasil Memuat Data";
            $response['data'] = $data->result_array();
        }
        elseif($data2->num_rows()>0){
            $data = $data2;
            $response['status'] = 200;
            $response['message'] = "Berhasil Memuat Data";
            $response['data'] = $data->result_array();
        }
        else{
            $response['status'] = 403;
            $response['message'] = "Data tidak ditemukan";
        }
        echo json_encode($response);
    }
}