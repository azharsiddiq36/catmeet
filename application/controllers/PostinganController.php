<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 16/07/19
 * Time: 20:24
 */

class PostinganController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PostinganModel');
        $this->load->model('ReportModel');
        $this->load->model('KomentarModel');
    }
    public function index(){
        $data['title'] = "Dashboard";
        parent::template('dashboard/index',$data);
    }
    public function daftar(){
        $data['title'] = "Tabel Postingan";
        $data['data'] = parent::model('PostinganModel')->get_postingan_join()->result();
        parent::template('postingan/index',$data);
    }
    //Tambah Postingan
    public function tambah(){
        if(isset($_POST['submit'])){
            $nama = parent::post("postingan_nama");
            $password = parent::post("postingan_password");
            $jk = parent::post("postingan_jk");
            $email = parent::post("postingan_email");
            $hak_akses = parent::post("postingan_hak_akses");
            $alamat = parent::post("postingan_alamat");
            $nomor = parent::post("postingan_nomor");
            $data = array("postingan_email"=>$email);
            if (parent::model("PostinganModel")->checkMail($data)->num_rows()<1){
                $data = array(
                    "postingan_status"=>"nonaktif",
                    "postingan_foto"=>"user.png",
                    "postingan_latitude"=>"0",
                    "postingan_longitude"=>"0",
                    "postingan_foto_ktp"=>"belum",
                    "postingan_provinsi"=>"umum",
                    "postingan_kabupaten"=>"umum",
                    "postingan_kecamatan"=>"umum",
                    "postingan_desa"=>"umum",
                    "postingan_nama"=>$nama,
                    "postingan_password"=>md5($password),
                    "postingan_email" =>$email,
                    "postingan_nomor" => $nomor,
                    "postingan_alamat" =>$alamat,
                    "postingan_hak_akses" =>$hak_akses,
                    "postingan_jenis_kelamin"=>$jk
                );
                parent::model("PostinganModel")->post_postingan($data);
                parent::alert("msg","Berhasil Menambahkan Data !!!");
                redirect("administrator/postingan");
            }
            else{
                $data['title'] = "Form Tambah Postingan";
                parent::alert("msg","Email Telah Tedaftar !!!");
                parent::template('postingan/tambah_postingan',$data);
            }
        }
        else{
            $data['title'] = "Form Tambah Postingan";
            parent::template('postingan/tambah_postingan',$data);
        }
    }
    public function profile(){
        $data['title'] = "Profile Saya";
        $param = array('postingan_id'=>$this->session->userdata['postingan_id']);
        $data['data'] =  parent::model("PostinganModel")->getOne($param);
        if (isset($_POST['submit'])){
            $nama = parent::post("nama");
            $nomor = parent::post("nomor");
            $email = parent::post("email");
            $password = parent::post("password");
            $alamat = parent::post("alamat");
            $param = null;
            if($password == $data['data']['postingan_password']){
                $param = array(
                    "postingan_nama"=>$nama,
                    "postingan_email" =>$email,
                    "postingan_nomor" => $nomor,
                    "postingan_alamat" =>$alamat,
                  );
            }
            else{
                $param = array(
                    "postingan_nama"=>$nama,
                    "postingan_email" =>$email,
                    "postingan_nomor" => $nomor,
                    "postingan_alamat" =>$alamat,
                    "postingan_password"=>md5($password)
                );
            }
            parent::model("PostinganModel")->editPostingan($this->session->userdata['postingan_id'],$param);
            parent::alert("msg","Berhasil Merubah Profile");
            redirect('profile');

        }
        else{
            parent::template('postingan/profile',$data);
        }
    }
    public function edit(){
        $data['title'] = "Postingan";
        $id = $this->uri->segment(4);
        $data = array(
            "postingan_status"=>"aktif",
        );
        parent::model("PostinganModel")->editPostingan($id,$data);
        parent::alert("msg","Berhasil Mengaktifkan Akun !!!");
        redirect("administrator/postingan");
    }
    public function komentar(){
        $id = parent::post("postingan_id");
        $isi = parent::model("KomentarModel")->get_komentar_join($id)->result();
        echo json_encode($isi);
    }
    public function report(){
        $id = parent::post("postingan_id");
        $isi = parent::model("ReportModel")->get_report_join($id)->result();
        echo json_encode($isi);
    }
    public function delete(){
        $data['title'] = "Postingan";
        $id = $this->uri->segment(4);
        $data = array(
            "postingan_status"=>"nonaktif",
        );
        parent::model("PostinganModel")->editPostingan($id,$data);
        parent::alert("msg","Berhasil Menonaktifkan Akun !!!");
        redirect("administrator/postingan");
    }
}
