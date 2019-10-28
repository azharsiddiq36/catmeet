<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 16/07/19
 * Time: 20:24
 */

class KontesController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KontesModel');
    }
    public function index(){
        $data['title'] = "Dashboard";
        parent::template('dashboard/index',$data);
    }
    public function daftar(){
        $data['title'] = "Tabel Kontes";
        $data['data'] = parent::model('KontesModel')->get_kontes_join()->result();
        parent::template('kontes/index',$data);
    }
    //Tambah Kontes
    public function tambah(){
        if(isset($_POST['submit'])){
            $nama = parent::post("kontes_nama");
            $password = parent::post("kontes_password");
            $jk = parent::post("kontes_jk");
            $email = parent::post("kontes_email");
            $hak_akses = parent::post("kontes_hak_akses");
            $alamat = parent::post("kontes_alamat");
            $nomor = parent::post("kontes_nomor");
            $data = array("kontes_email"=>$email);
            if (parent::model("KontesModel")->checkMail($data)->num_rows()<1){
                $data = array(
                    "kontes_status"=>"nonaktif",
                    "kontes_foto"=>"user.png",
                    "kontes_latitude"=>"0",
                    "kontes_longitude"=>"0",
                    "kontes_foto_ktp"=>"belum",
                    "kontes_provinsi"=>"umum",
                    "kontes_kabupaten"=>"umum",
                    "kontes_kecamatan"=>"umum",
                    "kontes_desa"=>"umum",
                    "kontes_nama"=>$nama,
                    "kontes_password"=>md5($password),
                    "kontes_email" =>$email,
                    "kontes_nomor" => $nomor,
                    "kontes_alamat" =>$alamat,
                    "kontes_hak_akses" =>$hak_akses,
                    "kontes_jenis_kelamin"=>$jk
                );
                parent::model("KontesModel")->post_kontes($data);
                parent::alert("msg","Berhasil Menambahkan Data !!!");
                redirect("administrator/kontes");
            }
            else{
                $data['title'] = "Form Tambah Kontes";
                parent::alert("msg","Email Telah Tedaftar !!!");
                parent::template('kontes/tambah_kontes',$data);
            }
        }
        else{
            $data['title'] = "Form Tambah Kontes";
            parent::template('kontes/tambah_kontes',$data);
        }
    }
    public function profile(){
        $data['title'] = "Profile Saya";
        $param = array('kontes_id'=>$this->session->userdata['kontes_id']);
        $data['data'] =  parent::model("KontesModel")->getOne($param);
        if (isset($_POST['submit'])){
            $nama = parent::post("nama");
            $nomor = parent::post("nomor");
            $email = parent::post("email");
            $password = parent::post("password");
            $alamat = parent::post("alamat");
            $param = null;
            if($password == $data['data']['kontes_password']){
                $param = array(
                    "kontes_nama"=>$nama,
                    "kontes_email" =>$email,
                    "kontes_nomor" => $nomor,
                    "kontes_alamat" =>$alamat,
                  );
            }
            else{
                $param = array(
                    "kontes_nama"=>$nama,
                    "kontes_email" =>$email,
                    "kontes_nomor" => $nomor,
                    "kontes_alamat" =>$alamat,
                    "kontes_password"=>md5($password)
                );
            }
            parent::model("KontesModel")->editKontes($this->session->userdata['kontes_id'],$param);
            parent::alert("msg","Berhasil Merubah Profile");
            redirect('profile');

        }
        else{
            parent::template('kontes/profile',$data);
        }

    }
    public function accept(){
        $id = $this->uri->segment(4);
            $data = array(
                "kontes_status"=>"disetujui"
            );
            parent::model("KontesModel")->editKontes($id,$data);
            parent::alert("msg","Berhasil Menyetujui Kontes !!!");
            redirect("administrator/kontes");
    }
    public function detail(){
        $id = parent::post("kontes_id");
      //  $id = 2;
        $isi = null;
        $isi['data'] = parent::model("KontesModel")->get_one_join($id)->row_array();
        echo json_encode($isi);
    }
    public function tolak(){
        $id = $this->uri->segment(4);
        $data = array(
            "kontes_status"=>"ditolak"
        );
        parent::model("KontesModel")->editKontes($id,$data);
        parent::alert("msg","Berhasil Menolak Kontes !!!");
        redirect("administrator/kontes");
    }
}
