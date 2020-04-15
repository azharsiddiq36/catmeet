<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiPesan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('KucingModel');
        $this->load->model('KontakModel');
        $this->load->model('ChatModel');
    }

    public function tambahChat()
    {
        $response = null;
        $kontak_id = $this->input->post("chatting_kontak");
        $pengguna1 = $this->input->post('pengguna1');
        $pengguna2 = $this->input->post('pengguna2');
        $pesan = $this->input->post('pesan');
        $param = array("chatting_status"=>"delivered",
            "chatting_kontak_id"=>$kontak_id,
            "chatting_pengguna_id"=>$pengguna1,
            "chatting_pengguna_id2"=>$pengguna2,
        "chatting_text"=>$pesan);
        $tgl = date('Y-m-d h:i:s');
        $data = array("kontak_tanggal_update"=>$tgl);
        $this->KontakModel->editKontak($kontak_id,$data);
        $this->ChatModel->post_chat($param);
        $response['status'] = 200;
        $response['message'] = "Berhasil menambahkan data";
        echo json_encode($response);
    }
    public function getChat(){
        $response = null;
        $kontak = $this->input->post("chatting_kontak");
        $id = $this->input->post("pengguna_id");
        $param = array("chatting_status" => "read");
        $data = $this->ChatModel->getChat($kontak);
        if ($data->num_rows()>0){
            foreach ($data->result_array() as $k){
                if ($k['chatting_kontak_id'] == $kontak && $k['chatting_pengguna_id2'] == $id){
                   $this->ChatModel->editChat($k['chatting_id'],$param);
                }
            }
            $data = $this->ChatModel->getChat($kontak);
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
    public function getStatus(){
        $response = null;
        $kontak_id = $this->input->post("chatting_kontak");
        $data = $this->ChatModel->getChat($kontak_id);
        $read = 0;
        $delivered = 0;
        foreach ($data->result_array() as $k){
            if ($k['chatting_status'] == 'delivered'){
                $delivered +=1;
            }
            else if ($k['chatting_status'] == 'read'){
                $read +=1;
            }
        }
        $response['message'] = "berhasil memuat data";
        $response['status'] = 200;
        $response['total'] = $data->num_rows();
        $response['delivered'] = $delivered;
        $response['read'] = $read;
        echo json_encode($response);
    }
}