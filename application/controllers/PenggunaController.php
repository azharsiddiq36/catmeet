<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 16/07/19
 * Time: 20:24
 */

class PenggunaController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
        $this->load->model('DataDiriModel');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        parent::template('dashboard/index', $data);
    }

    public function daftar()
    {
        $data['title'] = "Tabel Pengguna";
        $data['data'] = parent::model('PenggunaModel')->get_pengguna()->result();
        parent::template('pengguna/index', $data);
    }

    //Tambah Pengguna
    public function tambah()
    {
        if (isset($_POST['submit'])) {
            $nama = parent::post("pengguna_nama");
            $password = parent::post("pengguna_password");
            $jk = parent::post("pengguna_jk");
            $email = parent::post("pengguna_email");
            $hak_akses = parent::post("pengguna_hak_akses");
            $alamat = parent::post("pengguna_alamat");
            $nomor = parent::post("pengguna_nomor");
            $data = array("pengguna_email" => $email);
            if (parent::model("PenggunaModel")->checkMail($data)->num_rows() < 1) {
                $data = array(
                    "pengguna_status" => "nonaktif",
                    "pengguna_foto" => "user.png",
                    "pengguna_latitude" => "0",
                    "pengguna_longitude" => "0",
                    "pengguna_foto_ktp" => "belum",
                    "pengguna_provinsi" => "umum",
                    "pengguna_kabupaten" => "umum",
                    "pengguna_kecamatan" => "umum",
                    "pengguna_desa" => "umum",
                    "pengguna_nama" => $nama,
                    "pengguna_password" => md5($password),
                    "pengguna_email" => $email,
                    "pengguna_nomor" => $nomor,
                    "pengguna_alamat" => $alamat,
                    "pengguna_hak_akses" => $hak_akses,
                    "pengguna_jenis_kelamin" => $jk
                );
                parent::model("PenggunaModel")->post_pengguna($data);
                parent::alert("msg", "Berhasil Menambahkan Data !!!");
                redirect("administrator/pengguna");
            } else {
                $data['title'] = "Form Tambah Pengguna";
                parent::alert("msg", "Email Telah Tedaftar !!!");
                parent::template('pengguna/tambah_pengguna', $data);
            }
        } else {
            $data['title'] = "Form Tambah Pengguna";
            parent::template('pengguna/tambah_pengguna', $data);
        }
    }

    public function profile()
    {
        $data['title'] = "Profile Saya";
        $param = array('pengguna_id' => $this->session->userdata['pengguna_id']);
        $data['data'] = parent::model("PenggunaModel")->getOne($param);
        if (isset($_POST['submit'])) {
            $nama = parent::post("nama");
            $foto = parent::post("pengguna_foto");
            $nomor = parent::post("nomor");
            $email = parent::post("email");
            $password = parent::post("password");
            $alamat = parent::post("alamat");
            $param = null;

            $param = array(
                "pengguna_nama" => $nama,
                "pengguna_email" => $email,
                "pengguna_nomor" => $nomor,
                "pengguna_alamat" => $alamat,
            );

            parent::model("PenggunaModel")->editPengguna($this->session->userdata['pengguna_id'], $param);
            $config['upload_path'] = './assets/img/upload/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 204800;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
//
//                $error = array('error' => $this->upload->display_errors());
//                var_dump($error);
//                die;
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
                    "pengguna_foto" => $foto,
                );

                parent::model("PenggunaModel")->editPengguna($this->session->userdata['pengguna_id'], $param);

                $data['data'] = parent::model("PenggunaModel")->getOne($param);
                $sessData = array(
                    'pengguna_id' => $data['data']['pengguna_id'],
                    'pengguna_nama' => $data['data']['pengguna_nama'],
                    'pengguna_hak_akses' => $data['data']['pengguna_hak_akses'],
                    'pengguna_foto' => $data['data']['pengguna_foto'],
                );
                $this->session->set_userdata($sessData);
            }
            parent::alert("msg", "Berhasil Merubah Profile");
            redirect('administrator/profile');

        } else {
            parent::template('pengguna/profile', $data);
        }

    }

    public function changepassword()
    {
        $data['title'] = "Profile Saya";
        $param = array('pengguna_id' => $this->session->userdata['pengguna_id']);
        $data['data'] = parent::model("PenggunaModel")->getOne($param);
        if (isset($_POST['ubah'])) {
            $password = parent::post('password');
            $repassword = parent::post('repassword');
            if ($password == $repassword) {
                $param = array(
                    "pengguna_password" => md5($password)
                );
                parent::model("PenggunaModel")->editPengguna($this->session->userdata['pengguna_id'], $param);
                parent::alert("msg", "Berhasil Merubah Password");
                redirect('administrator/profile');
            } else {
                parent::alert("msgfail", "Pengulangan Kata Sandi Tidak Sesuai");
                redirect('administrator/profile');
            }
        } else {
            parent::template('pengguna/profile', $data);
        }
    }

    public function edit()
    {
        $data['title'] = "Pengguna";
        $id = $this->uri->segment(4);
        $data = array(
            "pengguna_status" => "aktif",
        );
        parent::model("PenggunaModel")->editPengguna($id, $data);
        parent::alert("msg", "Berhasil Mengaktifkan Akun !!!");
        redirect("administrator/pengguna");
    }

    public function detail()
    {
        $id = parent::post("pengguna_id");
        $cekid = parent::model("DataDiriModel")->checkid($id)->num_rows();
        $isi = null;
        if ($cekid > 0) {
            $isi['status'] = "sudah";
            $isi['data'] = parent::model("PenggunaModel")->get_one_join($id)->row_array();
        } else {
            $param = array("pengguna_id" => $id);
            $isi['status'] = "belum";
            $isi['data'] = parent::model("PenggunaModel")->getOne($param);
        }
        echo json_encode($isi);
    }

    public function delete()
    {
        $data['title'] = "Pengguna";
        $id = $this->uri->segment(4);
        $data = array(
            "pengguna_status" => "nonaktif",
        );
        parent::model("PenggunaModel")->editPengguna($id, $data);
        parent::alert("msg", "Berhasil Menonaktifkan Akun !!!");
        redirect("administrator/pengguna");

    }
    public function sendmail(){
        $from_email = "couplecatofficial@gmail.com";
        $to_email = "azharsiddiq36@gmail.com";

        $config = Array(
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => $from_email,
            'smtp_pass' => 'mengejarsarjana',
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        );
        $this->email->initialize($config);

        // Email dan nama pengirim
        $this->email->from($from_email, 'Couple Cat');

        // Email penerima
        $this->email->to($to_email); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Percobaan Pertama Couple Cat');

        // Isi email
        $this->email->message("Halaman Facebook.<br><br> Klik <strong><a href='www.facebook.com' target='_blank' rel='noopener'>disini</a></strong> Mantap");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
      }
}
