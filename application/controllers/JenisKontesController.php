<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 16/07/19
 * Time: 20:24
 */

class JenisKontesController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KontesModel');
        $this->load->model('JenisKontesModel');
    }
    public function index(){
        $data['title'] = "Jenis Kontes";
        $data['data'] = parent::model('JenisKontesModel')->get_kontes();
        parent::template('jeniskontes/index',$data);
    }
    public function tambah(){
        $data['title'] = "Tambah Jenis KOntes";
        if (isset($_POST['submit'])){
            $nama = parent::post("nama");
            $param = array("jenis_kontes_nama"=>$nama);
            $this->JenisKontesModel->post_kontes($param);
            parent::alert("msg", "Berhasil Menambah Jenis");
            redirect('administrator/jeniskontes');
        }
        else{
            parent::template('jeniskontes/tambah',$data);
        }
    }
    public function edit(){
        $data['title'] = "Edit Jenis Kontes";
        $id = $this->uri->segment(4);
        if(isset($_POST['submit'])){
            $nama = parent::post("nama");
            $data = array(
                "jenis_kontes_nama"=>$nama,

            );
            parent::model("JenisKontesModel")->editKontes($id,$data);
            parent::alert("msg","Berhasil Memperbarui Data !!!");
            redirect("administrator/jeniskontes");
        }
        else{
        $param = array('jenis_kontes_id'=>$id);
        $data['row'] = parent::model("JenisKontesModel")->getOne($param);
        parent::template('jeniskontes/edit',$data);
        }
    }
    public function hapus(){
        $data['title'] = "Delete Jenis Kontes";
        $id = $this->uri->segment(4);
        $data = array("jenis_kontes_id"=>$id);
        parent::model("JenisKontesModel")->deleteKontes($data);
        parent::alert("msg","Berhasil Menghapus Data !!!");
        redirect("administrator/jeniskontes");
        parent::template('jeniskontes/index',$data);
    }
}
