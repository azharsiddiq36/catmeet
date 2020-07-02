<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 07/05/20
 * Time: 15:20
 */

class ApiPemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PemesananModel');
        $this->load->model('KontesModel');
    }

    public function index()
    {

    }

    public function tambah()
    {
        $response = null;
        $pengguna = $this->input->post("id");
        $jumlah = $this->input->post("jumlah");
        $total = $this->input->post("total");
        $status = "menunggu";
        $kontes = $this->input->post("kontes");
        $param = array("pemesanan_pengguna_id" => $pengguna,
            "pemesanan_status" => $status,
            "pemesanan_kontes_id" => $kontes,
            "pemesanan_total" => $total,
            "pemesanan_jumlah" => $jumlah);
        $this->PemesananModel->post_pemesanan($param);
        $response['status'] = 200;
        $response['message'] = "Pemesanan Berhasil, segera lakukan pembayaran hari ini";
        echo json_encode($response);
    }

    public function getmyorder(){
        $response = null;
        $pengguna_id = $this->input->post("id");
        $data = $this->PemesananModel->get_by_id($pengguna_id);
//        $data = $this->KontesModel->get_kontes_by_id($pengguna_id,"menunggu");
        if ($data->num_rows()==0){
            $response['status'] = 403;
            $response['message'] = "Data Tidak Ditemukan";
        }
        else{
            $id_list = null;
            foreach ($data->result_array() as $k){
                if ($id_list == null){
                    $id_list = $k['pemesanan_id'];
                }
                else{
                    $id_list .= ",".$k['pemesanan_id'];
                }
            }
            $response['status'] = 200;
            $response['message'] = "Berhasil Memuat Data";
            $response['id_list'] = $id_list;
        }
        echo json_encode($response);
    }
    public function getoneorder(){
        $response = null;
        $id = $this->input->post('id');
        $data = $this->PemesananModel->get_one_join($id)->row_array();
        
        $response['status'] = 200;
        $response['message'] = "Berhasil memuat data";
        $response['id'] = $data['pemesanan_id'];
        $response['foto'] = $data['kontes_foto'];
        $response['tanggal'] =$data['kontes_tanggal_mulai'];
        $response['judul'] = $data['kontes_nama'];
        $response['jumlah'] = $data['pemesanan_total'];
        $response['kontes'] = $data['kontes_id'];
        echo json_encode($response);
    }
}