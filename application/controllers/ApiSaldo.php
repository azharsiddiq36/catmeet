<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiSaldo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('PembayaranModel');
        $this->load->model('PemesananModel');
        $this->load->model('KontesModel');
        $this->load->model('SaldoModel');
        $this->load->model('PengisianModel');
        $this->load->model('PenarikanModel');
    }

    public function tambah()
    {
        $response = null;
        $id = $this->input->post("id");
        $jumlah = $this->input->post('jumlah');
        $status = "menunggu";
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
            $param = array("pengisian_pengaju_id" => $id,
                "pengisian_jumlah" => $jumlah,
                "pengisian_status" => $status,
                "pengisian_bukti" => $foto);
            $this->PengisianModel->post_pengisian($param);

            $response['status'] = 200;
            $response['message'] = "Berhasil Menambahkan saldo, saldo akan bertambah setelah disetujui admin";
        }

        echo json_encode($response);
    }

    public function getmycontest()
    {
        $response = null;
        $id = $this->input->post('id');
        $data = $this->KontesModel->getmylist($id);
        if ($data->num_rows() > 0) {
            $response['data'] = $data->result_array();
            $response['status'] = 200;
            $response['message'] = 'Berhasil Memuat Data';
        }
        else{
            $response['status'] = 403;
            $response['message'] = 'Data tidak ditemukan';
        }
        echo json_encode($response);
    }
    public function totalsaldo(){
        $response = null;
        $id = $this->input->post('id');
        $kontes = $this->input->post('kontes');
        $data = $this->PembayaranModel->gettotal($id,$kontes);
        if ($data->num_rows()>0){
            $total = 0;
            foreach ($data->result_array() as $k){
                $total += $k['pembayaran_jumlah'];
            }
            $response['total'] = $total;
            $response['status'] = 200;
            $response['message'] = 'Berhasil Memuat Data';
        }
        else{
            $response['status'] = 403;
            $response['message'] = 'Data tidak ditemukan';
        }
        echo json_encode($response);
    }
    public function tariksaldo(){
        $response = null;
        $id = $this->input->post('id');
        $norek = $this->input->post('norek');
        $bank = $this->input->post('bank');
        $jumlah = $this->input->post('jumlah');
        $param = array("penarikan_status"=>"menunggu",
            "penarikan_jumlah"=>$jumlah,
            "penarikan_bank"=>$bank,
            "penarikan_no_rek"=>$norek,
            "penarikan_pengaju"=>$id);
        $this->PenarikanModel->post_penarikan($param);
        $response['status'] = 200;
        $response['message'] = 'Menunggu Persetujuan Admin';
        echo json_encode($response);
    }
    public function transfer(){
        $response = null;
        $id = $this->input->post('id');
        $kontes = $this->input->post('kontes');
        $jumlah = $this->input->post('jumlah');
        $param = array('pengguna_id'=>$id);
        //get saldo awal pengguna
        $pengguna = $this->PenggunaModel->getOne($param);
        $saldo = $pengguna['pengguna_saldo']+$jumlah;
        //update saldo pengguna
        $param = array("pengguna_saldo"=>$saldo);
        $this->PenggunaModel->editPengguna($id,$param);
        //change status kontes
        $param = array("kontes_status"=>"selesai");
        $this->KontesModel->editKontes($kontes,$param);
        $response['status'] = 200;
        $response['message'] = "Berhasil Menambahkan Saldo";
        echo json_encode($response);
    }

}