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
        $this->load->model('JadwalModel');
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
        $nomor = $this->input->post('pengguna_nomor');
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
                        'pengguna_nomor' => $nomor,
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

    public function checkdatadiri()
    {
        $response = null;
        $id = $this->input->post("pengguna_id");
        $cek = $this->DataDiriModel->checkid($id)->num_rows();
        if ($cek > 0) {
            $response['status'] = 200;
        } else {
            $response['status'] = 401;
        }
        echo json_encode($response);

    }

    public function getDetailAccount()
    {
        $response = null;
        $id = $this->input->post("pengguna_id");
        $param = array("pengguna_id" => $id);
        $data = $this->PenggunaModel->getOne($param);
        if ($data) {
            $jadwal = $this->JadwalModel->get_jadwal_by_id($id)->num_rows();
            $response['status'] = 200;
            $response['message'] = $jadwal;
            $response['data'] = $data;
        } else {
            $response['status'] = 401;
            $response['message'] = "Gagal Memuat Data";
        }
        echo json_encode($response);
    }

    public function uploadKtp()
    {
        $response = null;
        $id = $this->input->post("pengguna_id");
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 204800;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            $response['status'] = 410;
            $response['message'] = "gagal mengupload foto";
        } else {
//            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/img/upload/' . $this->upload->data('file_name');
//            $config['create_thumb'] = FALSE;
//            $config['maintain_ratio'] = FALSE;
//            $config['quality'] = '100%';
//            $config['width'] = 100%;

//            $config['height'] = 100%;
            $config['new_image'] = './assets/img/upload/' . $this->upload->data('file_name');
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $foto = $this->upload->data('file_name');
            $param = array(
                "data_diri_pengguna_id" => $id,
                "data_diri_foto_ktp" => $foto,
            );
            $this->DataDiriModel->post_data_diri($param);
            $response['status'] = 200;
            $response['message'] = "Berhasil Upload Foto KTP";

        }
        echo json_encode($response);
    }

    public function uploadFotoDiri()
    {
        $response = null;
        $id = $this->input->post("pengguna_id");
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 204800;

        if (!$this->upload->do_upload('foto')) {
            $response['status'] = 410;
            $response['message'] = "gagal mengupload foto";
        } else {
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/img/upload/' . $this->upload->data('file_name');
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '50%';
            $config['width'] = 1024;
            $config['height'] = 768;
            $config['new_image'] = './assets/img/upload/' . $this->upload->data('file_name');
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $foto = $this->upload->data('file_name');
            $param = array(
                "data_diri_foto_pengguna" => $foto,
            );
            $this->DataDiriModel->editby_pengguna($id, $param);
            $response['status'] = 200;
            $response['message'] = "Berhasil Upload Foto Diri";

        }
        echo json_encode($response);
    }

    public function update1()
    {
        $response = null;
        $id = $this->input->post("pengguna_id");
        $nama = $this->input->post('pengguna_nama');
        $nomor = $this->input->post('pengguna_nomor');
        $email = $this->input->post('pengguna_email');

        $param = array("pengguna_nama" => $nama,
            "pengguna_nomor" => $nomor,
            "pengguna_email" => $email);
        $this->PenggunaModel->editPengguna($id, $param);
        $response['status'] = 200;
        $response['message'] = "Berhasil Memperbarui Profile";

        echo json_encode($response);
    }

    public function update2()
    {
        $response = null;
        $id = $this->input->post("pengguna_id");
        $nama = $this->input->post('pengguna_nama');
        $nomor = $this->input->post('pengguna_nomor');
        $email = $this->input->post('pengguna_email');
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
            $param = array("pengguna_nama" => $nama,
                "pengguna_nomor" => $nomor,
                "pengguna_email" => $email,
                "pengguna_foto"=>$foto);
            $this->PenggunaModel->editPengguna($id, $param);
            $response['status'] = 200;
            $response['width'] = $size[0];
            $response['height'] = $size[1];
            $response['message'] = "Berhasil Memperbarui Profile";
        }
        echo json_encode($response);
    }
    public function updateLocation(){
        $response = null;
        $id = $this->input->post("pengguna_id");
        $provinsi = $this->input->post("pengguna_provinsi");
        $kabupaten = $this->input->post("pengguna_kabupaten");
        $kecamatan = $this->input->post("pengguna_kecamatan");
        $desa = $this->input->post("pengguna_desa");
        $latitude = $this->input->post("pengguna_latitude");
        $longitude = $this->input->post("pengguna_longitude");
        $param = array("pengguna_provinsi"=>$provinsi,
            "pengguna_kecamatan"=>$kecamatan,
            "pengguna_kabupaten"=>$kabupaten,
            "pengguna_desa"=>$desa,
            "pengguna_latitude"=>$latitude,
            "pengguna_longitude"=>$longitude);
        $this->PenggunaModel->editPengguna($id,$param);
        $response['status'] = 200;
        $response['message'] = "Berhasil mendapatkan lokasi";
        echo json_encode($response);
    }
}