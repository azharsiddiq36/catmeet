<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiPengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('PenggunaModel');
        $this->load->model('DataDiriModel');
    }

    public function login()
    {
        $responses = null;
        $username = $this->input->post('pengguna_username');
        $password = md5($this->input->post('pengguna_password'));
        $loginData = $this->AuthModel->get_by_username($username, $password);
        if ($loginData->num_rows() > 0) {
            $data = $loginData->row_array();
            if ($data['pengguna_status'] == 'nonaktif') {
                $responses['status'] = 401;
                $responses['message'] = "Akun Kamu Belum di Validasi, Harap Periksa Email Kamu Terlebih Dahulu";
            } else {
                $responses['status'] = 200;
                $responses['data'] = $loginData->row_array();
                $responses['message'] = "Login Berhasil";
            }

        } else {
            $loginData = $this->AuthModel->get_pengguna($username, $password);
            if ($loginData->num_rows() > 0) {
                $data = $loginData->row_array();
                if ($data['pengguna_status'] == 'nonaktif') {
                    $responses['status'] = 401;
                    $responses['message'] = "Akun Kamu Belum di Validasi, Harap Periksa Email Kamu Terlebih Dahulu";
                } else {
                    $responses['status'] = 200;
                    $responses['data'] = $loginData->row_array();
                    $responses['message'] = "Login Berhasil";
                }
            } else {
                $responses['status'] = 401;
                $responses['message'] = "Username Atau Password Salah";
            }
        }
        echo json_encode($responses);
    }

    public function register()
    {
        $response = null;
        $username = $this->input->post('pengguna_username');
        $nama = $this->input->post('pengguna_nama');
        $email = $this->input->post('pengguna_email');
        $password = $this->input->post('pengguna_password');
        $data = array('pengguna_username' => $username);
        $cekuser = $this->PenggunaModel->check_username($data)->num_rows();
        if ($cekuser > 0) {
            $responses['status'] = 403;
            $responses['message'] = "Username Telah Terdaftar";
        } else {
            $data = array('pengguna_email' => $email);
            $cekuser = $this->PenggunaModel->checkMail($data)->num_rows();
            if ($cekuser > 0) {
                $responses['status'] = 403;
                $responses['message'] = "Email Telah Terdaftar";
            } else {
                $from_email = "couplecatofficial@gmail.com";
                $config = array(
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => $from_email,
                    'smtp_pass' => 'mengejarsarjana',
                    'smtp_crypto' => 'ssl',
                    'smtp_port' => 465,
                    'smtp_timeout' => 20,
                    'wordwrap' => TRUE,
                    'crlf' => "\r\n",
                    'newline' => "\r\n"
                );
                $this->email->initialize($config);
                $this->email->from($from_email, 'Couple Cat');
                $this->email->to($email);
                //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
                $this->email->subject('Verifikasi Akun');
                $this->email->message("Halo " . $nama . " Terimakasih Telah Melakukan Pendaftaran, <br><br> Harap Klik <strong>
                    <a href='" . base_url('pengguna/validasi/' . $username) . "' target='_blank' rel='noopener'>disini</a></strong> Untuk Mengaktifkan Akun Kamu");
                if ($this->email->send()) {
                    $data = array('pengguna_nama' => $nama,
                        'pengguna_password' => md5($password),
                        'pengguna_email' => $email,
                        'pengguna_username' => $username,
                        'pengguna_status' => 'nonaktif',
                        'pengguna_hak_akses' => 'pengguna',
                        'pengguna_alamat' => 'belum',
                        'pengguna_provinsi' => 'belum',
                        'pengguna_kabupaten' => 'belum',
                        'pengguna_kecamatan' => 'belum',
                        'pengguna_desa' => 'belum',
                        'pengguna_nomor' => 'belum',
                        'pengguna_foto' => 'belum',
                        'pengguna_latitude' => 'belum',
                        'pengguna_longitude' => 'belum',
                        'pengguna_saldo' => '0');
                    $this->PenggunaModel->post_pengguna($data);
                    $responses['status'] = 200;
                    $responses['message'] = "Berhasil Melakukan Pendaftaran, Harap Cek Email Untuk Verifikasi Akun";
                } else {
                    $responses['status'] = 500;
                    $responses['message'] = "Terjadi Kesalahan";
                }
            }
        }
        echo json_encode($responses);
    }

    public function validation()
    {
        $id = $this->uri->segment(3);
        $data = array(
            "pengguna_status" => "aktif",
        );
        $this->PenggunaModel->update_by_username($id, $data);
        $this->load->view('pengguna/validation');
    }

    public function forget()
    {
        $email = $this->input->post('pengguna_email');
        $data = array('pengguna_email' => $email);
        $cekuser = $this->PenggunaModel->checkMail($data);
        if ($cekuser->num_rows() > 0) {
            $from_email = "couplecatofficial@gmail.com";
            $config = array(
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => $from_email,
                'smtp_pass' => 'mengejarsarjana',
                'smtp_crypto' => 'ssl',
                'smtp_port' => 465,
                'smtp_timeout' => 20,
                'wordwrap' => TRUE,
                'crlf' => "\r\n",
                'newline' => "\r\n"
            );
            $this->email->initialize($config);
            $this->email->from($from_email, 'Couple Cat');
            $this->email->to($email);
            $this->email->subject('Verifikasi Akun');
            $data = $cekuser->row_array();
            $this->email->message("<br><br> Harap Klik <strong>
                    <a href='" . base_url('pengguna/reset/' . $data['pengguna_username']) . "' target='_blank' rel='noopener'>disini</a></strong> Untuk Mereset Password");
            if ($this->email->send()) {
                $responses['status'] = 200;
                $responses['message'] = "Link Untuk Reset Password Telah dikirim Ke Email Kamu";
            } else {
                $responses['status'] = 500;
                $responses['message'] = "Terjadi Kesalahan";
            }
        } else {
            $responses['status'] = 401;
            $responses['message'] = "Email Yang Kamu Masukkan Tidak Terdaftar";
        }
        echo json_encode($responses);
    }
    public function reset()
    {
        $username = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
            $password = $this->input->post('pengguna_password');
            $data = array(
                "pengguna_password" => md5($password),
            );
            $this->PenggunaModel->update_by_username($username, $data);
            $this->load->view('pengguna/success');
        } else {
            $data['data'] = $username;
            $this->load->view('pengguna/reset', $data);
        }

    }
    public function checkdatadiri(){
        $response = null;
        $id = $this->input->post("pengguna_id");
        $cek = $this->DataDiriModel->checkid($id)->num_rows();
        if ($cek>0){
            $response['status'] = 200;
        }
        else{
            $response['status'] = 401;
        }
        echo json_encode($response);

    }
}