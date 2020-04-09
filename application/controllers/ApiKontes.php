<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiKontes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('KontesModel');
        $this->load->model('KucingModel');
        $this->load->model('JadwalModel');
    }

    public function tambah()
    {
        $response = null;
        $id = $this->input->post("kontes_pengguna_id");
        $nama = $this->input->post('kontes_nama');
        $latitude = $this->input->post('kontes_latitude');
        $longitude = $this->input->post('kontes_longitude');
        $deskripsi = $this->input->post('kontes_deskripsi');
        $nomor = $this->input->post('kontes_nomor');
        $kabupaten = $this->input->post('kontes_kabupaten');
        $provinsi = $this->input->post('kontes_provinsi');
        $desa = $this->input->post('kontes_desa');
        $kecamatan = $this->input->post('kontes_kecamatan');
        $kontes_status = 'menunggu';
        $kontes_alamat = $this->input->post('kontes_alamat');
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
            $param = array("kontes_nama" => $nama,
                "kontes_nomor" => $nomor,
                "kontes_status" => $kontes_status,
                "kontes_foto"=>$foto,
                "kontes_alamat"=>$kontes_alamat,
                "kontes_kecamatan"=>$kecamatan,
                "kontes_kabupaten"=>$kabupaten,
                "kontes_pengguna_id"=>$id,
                "kontes_provinsi"=>$provinsi,
                "kontes_desa"=>$desa,
                "kontes_latitude"=>$latitude,
                "kontes_longitude"=>$longitude,
                "kontes_deskripsi"=>$deskripsi);
            $this->KontesModel->post_kontes($param);
            $response['status'] = 200;
            $response['message'] = "Berhasil Mendaftarkan Kontes, Menunggu persetujuan dari admin";
        }
        echo json_encode($response);
    }
    public function updateKontes1(){
        $response = null;
        $id = $this->input->post("kontes_id");
        $nama = $this->input->post('kontes_nama');
        $latitude = $this->input->post('kontes_latitude');
        $longitude = $this->input->post('kontes_longitude');
        $deskripsi = $this->input->post('kontes_deskripsi');
        $nomor = $this->input->post('kontes_nomor');
        $kabupaten = $this->input->post('kontes_kabupaten');
        $provinsi = $this->input->post('kontes_provinsi');
        $desa = $this->input->post('kontes_desa');
        $kecamatan = $this->input->post('kontes_kecamatan');
        $kontes_alamat = $this->input->post('kontes_alamat');
        $param = array("kontes_nama" => $nama,
            "kontes_nomor" => $nomor,
            "kontes_alamat"=>$kontes_alamat,
            "kontes_kecamatan"=>$kecamatan,
            "kontes_kabupaten"=>$kabupaten,
            "kontes_provinsi"=>$provinsi,
            "kontes_desa"=>$desa,
            "kontes_latitude"=>$latitude,
            "kontes_longitude"=>$longitude,
            "kontes_deskripsi"=>$deskripsi);
        $this->KontesModel->editKontes($id,$param);
        $response['status'] = 201;
        $response['message'] = "Berhasil Memperbarui Kontes";
        echo json_encode($response);
    }
    public function updateKontes(){
        $response = null;
        $id = $this->input->post("kontes_id");
        $nama = $this->input->post('kontes_nama');
        $latitude = $this->input->post('kontes_latitude');
        $longitude = $this->input->post('kontes_longitude');
        $deskripsi = $this->input->post('kontes_deskripsi');
        $nomor = $this->input->post('kontes_nomor');
        $kabupaten = $this->input->post('kontes_kabupaten');
        $provinsi = $this->input->post('kontes_provinsi');
        $desa = $this->input->post('kontes_desa');
        $kecamatan = $this->input->post('kontes_kecamatan');
        $kontes_alamat = $this->input->post('kontes_alamat');
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
            $param = array("kontes_nama" => $nama,
                "kontes_nomor" => $nomor,
                "kontes_foto"=>$foto,
                "kontes_alamat"=>$kontes_alamat,
                "kontes_kecamatan"=>$kecamatan,
                "kontes_kabupaten"=>$kabupaten,
                "kontes_provinsi"=>$provinsi,
                "kontes_desa"=>$desa,
                "kontes_latitude"=>$latitude,
                "kontes_longitude"=>$longitude,
                "kontes_deskripsi"=>$deskripsi);
            $this->KontesModel->editKontes($id,$param);
            $response['status'] = 200;
            $response['message'] = "Berhasil Memperbarui Kontes";
        }
        echo json_encode($response);
    }
    public function getKontes(){
        $id = $this->input->post('kontes_pengguna_id');
        $data = $this->KontesModel->get_by_pengguna($id);
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
    public function getListKontes(){
        $response = null;
        $data = $this->KontesModel->get_acc_kontes_join();
        $response['status'] = 200;
        $response['message']="Berhasil Memuat Data";
        $response['data'] = $data->result_array();
        echo json_encode($response);
    }
    
}