<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiToko extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('TokoModel');
        $this->load->model('KucingModel');
        $this->load->model('JadwalModel');
    }

    public function tambah()
    {
        $response = null;
        $id = $this->input->post("toko_pengguna_id");
        $nama = $this->input->post('toko_nama');
        $latitude = $this->input->post('toko_latitude');
        $longitude = $this->input->post('toko_longitude');
        $deskripsi = $this->input->post('toko_deskripsi');
        $nomor = $this->input->post('toko_nomor');
        $kabupaten = $this->input->post('toko_kabupaten');
        $provinsi = $this->input->post('toko_provinsi');
        $desa = $this->input->post('toko_desa');
        $kecamatan = $this->input->post('toko_kecamatan');
        $toko_status = 'menunggu';
        $toko_alamat = $this->input->post('toko_alamat');
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 204800;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            $response['status'] = 410;
            $response['message'] = "gagal mengupload foto";
        } else {
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/img/upload/' . $this->upload->data('file_name');
            $size=getimagesize(base_url().'/assets/img/upload/' .$this->upload->data('file_name'));
            //$size = getimagesize(base_url().'/assets/img/upload/' . $this->upload->data('file_name'));
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '50%';
            $config['width'] = $size[0]/2;
            $config['height'] = $size[1]/2;
            $config['new_image'] = './assets/img/upload/' . $this->upload->data('file_name');
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $foto = $this->upload->data('file_name');
            $param = array("toko_nama" => $nama,
                "toko_nomor" => $nomor,
                "toko_status" => $toko_status,
                "toko_foto"=>$foto,
                "toko_alamat"=>$toko_alamat,
                "toko_kecamatan"=>$kecamatan,
                "toko_kabupaten"=>$kabupaten,
                "toko_pengguna_id"=>$id,
                "toko_provinsi"=>$provinsi,
                "toko_desa"=>$desa,
                "toko_latitude"=>$latitude,
                "toko_longitude"=>$longitude,
                "toko_deskripsi"=>$deskripsi);
            $this->TokoModel->post_toko($param);
            $response['status'] = 200;
            $response['message'] = "Berhasil Mendaftarkan Toko, Menunggu persetujuan dari admin";
        }
        echo json_encode($response);
    }
    public function updateToko1(){
        $response = null;
        $id = $this->input->post("toko_id");
        $nama = $this->input->post('toko_nama');
        $latitude = $this->input->post('toko_latitude');
        $longitude = $this->input->post('toko_longitude');
        $deskripsi = $this->input->post('toko_deskripsi');
        $nomor = $this->input->post('toko_nomor');
        $kabupaten = $this->input->post('toko_kabupaten');
        $provinsi = $this->input->post('toko_provinsi');
        $desa = $this->input->post('toko_desa');
        $kecamatan = $this->input->post('toko_kecamatan');
        $toko_alamat = $this->input->post('toko_alamat');
        $param = array("toko_nama" => $nama,
            "toko_nomor" => $nomor,
            "toko_alamat"=>$toko_alamat,
            "toko_kecamatan"=>$kecamatan,
            "toko_kabupaten"=>$kabupaten,
            "toko_provinsi"=>$provinsi,
            "toko_desa"=>$desa,
            "toko_latitude"=>$latitude,
            "toko_longitude"=>$longitude,
            "toko_deskripsi"=>$deskripsi);
        $this->TokoModel->editToko($id,$param);
        $response['status'] = 201;
        $response['message'] = "Berhasil Memperbarui Toko";
        echo json_encode($response);
    }
    public function updateToko(){
        $response = null;
        $id = $this->input->post("toko_id");
        $nama = $this->input->post('toko_nama');
        $latitude = $this->input->post('toko_latitude');
        $longitude = $this->input->post('toko_longitude');
        $deskripsi = $this->input->post('toko_deskripsi');
        $nomor = $this->input->post('toko_nomor');
        $kabupaten = $this->input->post('toko_kabupaten');
        $provinsi = $this->input->post('toko_provinsi');
        $desa = $this->input->post('toko_desa');
        $kecamatan = $this->input->post('toko_kecamatan');
        $toko_alamat = $this->input->post('toko_alamat');
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 204800;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            $response['status'] = 410;
            $response['message'] = "gagal mengupload foto";

        } else {
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/img/upload/' . $this->upload->data('file_name');
            $size=getimagesize(base_url().'/assets/img/upload/' .$this->upload->data('file_name'));
            //$size = getimagesize(base_url().'/assets/img/upload/' . $this->upload->data('file_name'));
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '50%';
            $config['width'] = $size[0]/2;
            $config['height'] = $size[1]/2;
            $config['new_image'] = './assets/img/upload/' . $this->upload->data('file_name');
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $foto = $this->upload->data('file_name');
            $param = array("toko_nama" => $nama,
                "toko_nomor" => $nomor,
                "toko_foto"=>$foto,
                "toko_alamat"=>$toko_alamat,
                "toko_kecamatan"=>$kecamatan,
                "toko_kabupaten"=>$kabupaten,
                "toko_provinsi"=>$provinsi,
                "toko_desa"=>$desa,
                "toko_latitude"=>$latitude,
                "toko_longitude"=>$longitude,
                "toko_deskripsi"=>$deskripsi);
            $this->TokoModel->editToko($id,$param);
            $response['status'] = 200;
            $response['message'] = "Berhasil Memperbarui Toko";
        }
        echo json_encode($response);
    }
    public function getToko(){
        $id = $this->input->post('toko_pengguna_id');
        $data = $this->TokoModel->get_by_pengguna($id);
        $response = null;
        if ($data->num_rows()>0){
            $response['status'] = 200;
            $response['data'] = $data->row_array();
            $response['message'] = "Berhasil menemukan data";
        }
        else{
            $response['status'] =404;
            $response['message'] = "data tidak ditemukan";
        }
        echo json_encode($response);
    }
    public function getListToko(){
        $response = null;
        $data = $this->TokoModel->get_acc_toko_join();
        $response['status'] = 200;
        $response['message']="Berhasil Memuat Data";
        $response['data'] = $data->result_array();
        echo json_encode($response);
    }
    
}