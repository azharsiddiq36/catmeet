<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiReport extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('ReportModel');
        $this->load->model('KucingModel');
        $this->load->model('JadwalModel');
    }

    public function tambah()
    {
        $response = null;
        $pengguna_id = $this->input->post("report_pengguna_id");
        $alasan = $this->input->post('report_alasan');
        $report_postingan_id = $this->input->post("report_postingan_id");
        $param = array("report_pengguna_id"=>$pengguna_id,
            "report_alasan"=>$alasan,
            "report_postingan_id"=>$report_postingan_id);
        $this->ReportModel->post_report($param);
         $response['status'] = 200;
        $response['message'] = "Berhasil melakukan report";
        echo json_encode($response);
    }
}