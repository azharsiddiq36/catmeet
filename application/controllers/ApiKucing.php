<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiKucing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('PenggunaModel');
        $this->load->model('KucingModel');
        $this->load->model('DataDiriModel');
        $this->load->model('JadwalModel');
    }

    public function tambah()
    {
        $response = null;
        $nama = $this->input->post("kucing_nama");
        $jenis = $this->input->post('kucing_jenis');
        $pengguna_id = $this->input->post('kucing_pengguna_id');
        $jeniskelamin = $this->input->post('kucing_jk');
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
            $param = array("kucing_nama" => $nama,
                "kucing_jenis" => $jenis,
                "kucing_pengguna_id" => $pengguna_id,
                "kucing_jk" => $jeniskelamin,
                "kucing_foto" => $foto);
            $this->KucingModel->post_kucing($param);
            $response['status'] = 200;
            $response['message'] = "Berhasil Menambahkan Kucing";
        }
        echo json_encode($response);
    }

    public function myListCat()
    {
        $response = null;
        $kucing_pengguna_id = $this->input->post("kucing_pengguna_id");
        $data = $this->KucingModel->getByPengguna($kucing_pengguna_id);
        if ($data->num_rows() == 0 ){
            $response['status'] = 400;
            $response['message'] = "Daftar kucing anda belum ada";
        }
        else{
            $response['status'] = 200;
            $response['message'] = "Berhasil Memuat Data";
            $response['data'] = $data->result_array();
        }

        echo json_encode($response);
    }
}