<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 16/07/19
 * Time: 20:24
 */

class KucingController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KucingModel');
    }
    public function index(){
        $data['title'] = "Dashboard";
        parent::template('dashboard/index',$data);
    }
    public function daftar(){
        $data['title'] = "Tabel Kucing";
        $data['data'] = parent::model('KucingModel')->get_kucing()->result();
        parent::template('kucing/index',$data);
    }
    //Tambah Kucing
    public function tambah(){
        if(isset($_POST['submit'])){
            $nama = parent::post("kucing_nama");
            $password = parent::post("kucing_password");
            $jk = parent::post("kucing_jk");
            $email = parent::post("kucing_email");
            $hak_akses = parent::post("kucing_hak_akses");
            $alamat = parent::post("kucing_alamat");
            $nomor = parent::post("kucing_nomor");
            $data = array("kucing_email"=>$email);
            if (parent::model("KucingModel")->checkMail($data)->num_rows()<1){
                $data = array(
                    "kucing_status"=>"nonaktif",
                    "kucing_foto"=>"user.png",
                    "kucing_latitude"=>"0",
                    "kucing_longitude"=>"0",
                    "kucing_foto_ktp"=>"belum",
                    "kucing_provinsi"=>"umum",
                    "kucing_kabupaten"=>"umum",
                    "kucing_kecamatan"=>"umum",
                    "kucing_desa"=>"umum",
                    "kucing_nama"=>$nama,
                    "kucing_password"=>md5($password),
                    "kucing_email" =>$email,
                    "kucing_nomor" => $nomor,
                    "kucing_alamat" =>$alamat,
                    "kucing_hak_akses" =>$hak_akses,
                    "kucing_jenis_kelamin"=>$jk
                );
                parent::model("KucingModel")->post_kucing($data);
                parent::alert("msg","Berhasil Menambahkan Data !!!");
                redirect("administrator/kucing");
            }
            else{
                $data['title'] = "Form Tambah Kucing";
                parent::alert("msg","Email Telah Tedaftar !!!");
                parent::template('kucing/tambah_kucing',$data);
            }
        }
        else{
            $data['title'] = "Form Tambah Kucing";
            parent::template('kucing/tambah_kucing',$data);
        }
    }
    public function profile(){
        $data['title'] = "Profile Saya";
        $param = array('kucing_id'=>$this->session->userdata['kucing_id']);
        $data['data'] =  parent::model("KucingModel")->getOne($param);
        if (isset($_POST['submit'])){
            $nama = parent::post("nama");
            $nomor = parent::post("nomor");
            $email = parent::post("email");
            $password = parent::post("password");
            $alamat = parent::post("alamat");
            $param = null;
            if($password == $data['data']['kucing_password']){
                $param = array(
                    "kucing_nama"=>$nama,
                    "kucing_email" =>$email,
                    "kucing_nomor" => $nomor,
                    "kucing_alamat" =>$alamat,
                  );
            }
            else{
                $param = array(
                    "kucing_nama"=>$nama,
                    "kucing_email" =>$email,
                    "kucing_nomor" => $nomor,
                    "kucing_alamat" =>$alamat,
                    "kucing_password"=>md5($password)
                );
            }
            parent::model("KucingModel")->editKucing($this->session->userdata['kucing_id'],$param);
            parent::alert("msg","Berhasil Merubah Profile");
            redirect('profile');

        }
        else{
            parent::template('kucing/profile',$data);
        }

    }
    public function edit(){
        $id = $this->uri->segment(4);
        if(isset($_POST['submit'])){
            $nama = parent::post("kucing_nama");
            $jk = parent::post("kucing_jk");
            $email = parent::post("kucing_email");
            $hak_akses = parent::post("kucing_hak_akses");
            $alamat = parent::post("kucing_alamat");
            $nomor = parent::post("kucing_nomor");
            $data = array(
                "kucing_nama"=>$nama,
                "kucing_email" =>$email,
                "kucing_nomor" => $nomor,
                "kucing_alamat" =>$alamat,
                "kucing_hak_akses" =>$hak_akses,
                "kucing_jenis_kelamin"=>$jk
            );
            parent::model("KucingModel")->editKucing($id,$data);
            parent::alert("msg","Berhasil Memperbarui Data !!!");
            redirect("administrator/kucing");
        }
        else{
            $data['title'] = "Form Edit Kucing";
            $param = array('kucing_id'=>$id);
            $data['akses'] = array("administrator","kucing");
            $data['row'] = parent::model("KucingModel")->getOne($param);
            parent::template('kucing/edit_kucing',$data);
        }
    }
    public function detail(){
        $id = parent::post("kucing_id");

        $param = array("kucing_id"=>$id);
        $isi = parent::model("KucingModel")->getOne($param);
        echo json_encode($isi);
    }
    public function delete(){
        $data['title'] = "Kucing";
        $id = $this->uri->segment(4);
        $data = array("kucing_id"=>$id);
        parent::model("KucingModel")->deleteKucing($data);
        parent::alert("msg","Berhasil Menghapus Data !!!");
        redirect("administrator/kucing");
    }

}
