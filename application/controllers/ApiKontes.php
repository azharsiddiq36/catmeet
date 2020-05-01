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
        $nama = $this->input->post("kontes_nama");
        $id = $this->input->post("id");
        $p = $this->input->post("provinsi");
        $kab = $this->input->post("kabupaten");
        $kec = $this->input->post("kecamatan");
        $des = $this->input->post("desa");
        $nomor = $this->input->post("nomor");
        $jenis = $this->input->post("kontes_jenis");
        $kuota = $this->input->post("kuota");
        $durasi = $this->input->post("durasi");
        $biaya = $this->input->post("biaya");
        $status = "menunggu";
        $description = $this->input->post("description");
        $details = $this->input->post("details");
        $lokasi = parent:: post("lokasi");
        $tanggal = $this->input->post("tanggal");

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
            $data = array(
                "kontes_nama" => $nama,
                "kontes_lokasi" => $lokasi,
                "kontes_provinsi" => $p,
                "kontes_kabupaten" => $kab,
                "kontes_kecamatan" => $kec,
                "kontes_desa" => $des,
                "kontes_description" => $description,
                "kontes_jenis" => $jenis,
                "kontes_details" => $details,
                "kontes_kuota" => $kuota,
                "kontes_tanggal_mulai" => Date('Y-m-d', strtotime($tanggal)),
                "kontes_tanggal_selesai" => Date('Y-m-d', strtotime($tanggal . ' ' . ($durasi - 1) . ' days')),
                "kontes_status" => $status,
                "kontes_biaya" => $biaya,
                "kontes_jumlah_pemesan" => 0,
                "kontes_nomor" => $nomor,
                "kontes_foto" =>$foto,
                "kontes_pengaju_id" => $id,
            );
            $this->KontesModel->post_kontes($data);
            $response['status'] = 200;
            $response['message'] = "Berhasil Mendaftarkan Kontes, Menunggu persetujuan dari admin";
        }
        echo json_encode($response);
    }
    public function getListKontes(){
        $response = null;
        $data = $this->KontesModel->get_acc_kontes_join();
        if ($data->num_rows()>0){
            $response['status'] = 200;
            $response['message']="Berhasil Memuat Data";
            $response['data'] = $data->result_array();
            $response['total'] = $data->num_rows();
        }
        else{
            $response['total'] = 0;
            $response['status'] = 403;
            $response['message'] = "Berhasil memuat data";
        }

        echo json_encode($response);
    }
    public function detail(){
        $response = null;
        $id = $this->input->post('id');
        $data = $this->KontesModel->get_one_join($id);
        $response['status'] = 200;
        $response['message']="Berhasil Memuat Data";
        $response['data'] = $data->row_array();
        echo json_encode($response);
    }
    public function pesan(){
        $response = null;
        $id=$this->input->post('id');
        $data = $this->KontesModel->get_pemesanan($id);
        if ($data->num_rows()>0){
            $response['status'] = 200;
            $response['message']="Berhasil Memuat Data";
            $response['data'] = $data->result_array();
        }
        else{
            $response['status'] = 403;
            $response['message']="Pemesanan belum ada";
        }
        echo json_encode($response);
    }
    public function tiket(){
        $response = null;
        $id=$this->input->post('id');
        $data = $this->KontesModel->get_history($id);
        if ($data->num_rows()>0){
            $response['status'] = 200;
            $response['message']="Berhasil Memuat Data";
            $response['data'] = $data->result_array();
        }
        else{
            $response['status'] = 403;
            $response['message']="Pemesanan belum ada";
        }
        echo json_encode($response);
    }
    /*
     * belum
    */
    public function bayar(){
        $response = null;
        $id=$this->input->post('id');
        $data = $this->KontesModel->post_pembayaran($id);
        if ($data->num_rows()>0){
            $response['status'] = 200;
            $response['message']="Berhasil Memuat Data";
            $response['data'] = $data->result_array();
        }
        else{
            $response['status'] = 403;
            $response['message']="Pemesanan belum ada";
        }
        echo json_encode($response);
    }
    
}