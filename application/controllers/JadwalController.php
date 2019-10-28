<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 16/07/19
 * Time: 20:24
 */

class JadwalController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JadwalModel');
        $this->load->model('PenggunaModel');
    }
    public function index(){
        $data['title'] = "Dashboard";
        parent::template('dashboard/index',$data);
    }
    public function daftar(){
        $data['title'] = "Tabel Jadwal";
        $data['data'] = parent::model('JadwalModel')->get_jadwal_join()->result();
        parent::template('jadwal/index',$data);
    }

    public function profile(){
        $data['title'] = "Profile Saya";
        $param = array('jadwal_id'=>$this->session->userdata['jadwal_id']);
        $data['data'] =  parent::model("JadwalModel")->getOne($param);
        if (isset($_POST['submit'])){
            $nama = parent::post("nama");
            $nomor = parent::post("nomor");
            $email = parent::post("email");
            $password = parent::post("password");
            $alamat = parent::post("alamat");
            $param = null;
            if($password == $data['data']['jadwal_password']){
                $param = array(
                    "jadwal_nama"=>$nama,
                    "jadwal_email" =>$email,
                    "jadwal_nomor" => $nomor,
                    "jadwal_alamat" =>$alamat,
                  );
            }
            else{
                $param = array(
                    "jadwal_nama"=>$nama,
                    "jadwal_email" =>$email,
                    "jadwal_nomor" => $nomor,
                    "jadwal_alamat" =>$alamat,
                    "jadwal_password"=>md5($password)
                );
            }
            parent::model("JadwalModel")->editJadwal($this->session->userdata['jadwal_id'],$param);
            parent::alert("msg","Berhasil Merubah Profile");
            redirect('profile');

        }
        else{
            parent::template('jadwal/profile',$data);
        }

    }
    public function edit(){
        $id = $this->uri->segment(4);
        if(isset($_POST['submit'])){
            $nama = parent::post("jadwal_nama");
            $jk = parent::post("jadwal_jk");
            $email = parent::post("jadwal_email");
            $hak_akses = parent::post("jadwal_hak_akses");
            $alamat = parent::post("jadwal_alamat");
            $nomor = parent::post("jadwal_nomor");
            $data = array(
                "jadwal_nama"=>$nama,
                "jadwal_email" =>$email,
                "jadwal_nomor" => $nomor,
                "jadwal_alamat" =>$alamat,
                "jadwal_hak_akses" =>$hak_akses,
                "jadwal_jenis_kelamin"=>$jk
            );
            parent::model("JadwalModel")->editJadwal($id,$data);
            parent::alert("msg","Berhasil Memperbarui Data !!!");
            redirect("administrator/jadwal");
        }
        else{
            $data['title'] = "Form Edit Jadwal";
            $param = array('jadwal_id'=>$id);
            $data['akses'] = array("administrator","jadwal");
            $data['row'] = parent::model("JadwalModel")->getOne($param);
            parent::template('jadwal/edit_jadwal',$data);
        }
    }
    public function detail(){
        $id = parent::post("jadwal_id");

        $param = array("jadwal_id"=>$id);
        $isi = parent::model("JadwalModel")->getOne($param);
        echo json_encode($isi);
    }
    public function delete(){
        $data['title'] = "Jadwal";
        $id = $this->uri->segment(4);
        $data = array("jadwal_id"=>$id);
        parent::model("JadwalModel")->deleteJadwal($data);
        parent::alert("msg","Berhasil Menghapus Data !!!");
        redirect("administrator/jadwal");
    }
}
