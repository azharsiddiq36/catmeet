<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiPostingan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('PostinganModel');
        $this->load->model('KomentarModel');
        $this->load->model('JadwalModel');
    }

    public function tambah()
    {
        $response = null;
        $id = $this->input->post("postingan_id_pengguna");
        $deskripsi = $this->input->post('postingan_deskripsi');
        $postingan_status = "aktif";
        $param = array("postingan_id_pengguna"=>$id,
            "postingan_deskripsi"=>$deskripsi,
            "postingan_status"=>$postingan_status);
        $this->PostinganModel->post_postingan($param);
         $response['status'] = 200;
        $response['message'] = "Berhasil menambahkan data";
        echo json_encode($response);
    }
    public function getPostingan(){
        $response = null;
        $data = $this->PostinganModel->get_postingan_join_aktif();
        $response['status'] = 200;
        $response['message'] = "Berhasil memuat data";
        $response['data'] = $data->result_array();
        echo json_encode($response);
    }

    
}