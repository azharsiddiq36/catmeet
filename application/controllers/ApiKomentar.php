<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiKomentar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('KomentarModel');
        $this->load->model('KucingModel');
        $this->load->model('JadwalModel');
    }

    public function tambah()
    {
        $response = null;
        $id = $this->input->post("komentar_pengguna_id");
        $deskripsi = $this->input->post('komentar_deskripsi');
        $postingan = $this->input->post("komentar_postingan_id");
        $param = array("komentar_pengguna_id"=>$id,
            "komentar_deskripsi"=>$deskripsi,
            "komentar_postingan_id"=>$postingan);
        $this->KomentarModel->post_komentar($param);
         $response['status'] = 200;
        $response['message'] = "Berhasil menambahkan data";
        echo json_encode($response);
    }
    public function getKomentar(){
        $response = null;
        $id = $this->input->post("postingan_id");
        $data = $this->KomentarModel->get_komentar_join($id);
        $response['status'] = 200;
        $response['message'] = "Berhasil memuat data";
        if ($data->num_rows()>0){
            $response['data'] = $data->result_array();
            $response['total'] = $data->num_rows();
        }
        else{
            $response['total'] = 0;
        }
        echo json_encode($response);
    }
    
    
}