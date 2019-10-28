<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 16/07/19
 * Time: 20:24
 */

class InformasiController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('InformasiModel');
    }
    public function index(){
        $data['title'] = "Dashboard";
        parent::template('dashboard/index',$data);
    }
    public function daftar(){
        $data['title'] = "Tabel Informasi";
        $data['data'] = parent::model('InformasiModel')->get_informasi()->result();
        parent::template('informasi/index',$data);
    }
    //Tambah Informasi
    public function tambah(){
        if(isset($_POST['submit'])){
            $nama = parent::post("informasi_nama");
            $jenis = parent::post("informasi_jenis");
            $deskripsi = parent::post("informasi_deskripsi");
            $temperamen = parent::post("informasi_temperamen");
            $rentang = parent::post("informasi_rentang");
            $url = parent::post("informasi_url");
            $berat = parent::post("informasi_berat");
            $asal = parent::post("informasi_asal");
                $data = array(
                    "informasi_nama"=>$nama,
                    "informasi_jenis_kucing"=>$jenis,
                    "informasi_deskripsi"=>$deskripsi,
                    "informasi_temperamen"=>$temperamen,
                    "informasi_rentang_hidup"=>$rentang,
                    "informasi_wikipedia_url"=>$url,
                    "informasi_berat"=>$berat,
                    "informasi_asal"=>$asal,
                );
                parent::model("InformasiModel")->post_informasi($data);
                parent::alert("msg","Berhasil Menambahkan Data !!!");
                redirect("administrator/informasi");
            }

        else{
            $data['title'] = "Form Tambah Informasi";
            parent::template('informasi/tambah',$data);
        }
    }

    public function edit(){
        $id = $this->uri->segment(4);
        if(isset($_POST['submit'])){
            $nama = parent::post("informasi_nama");
            $jenis = parent::post("informasi_jenis");
            $deskripsi = parent::post("informasi_deskripsi");
            $temperamen = parent::post("informasi_temperamen");
            $rentang = parent::post("informasi_rentang");
            $url = parent::post("informasi_url");
            $berat = parent::post("informasi_berat");
            $asal = parent::post("informasi_asal");
            $data = array(
                "informasi_nama"=>$nama,
                "informasi_jenis_kucing"=>$jenis,
                "informasi_deskripsi"=>$deskripsi,
                "informasi_temperamen"=>$temperamen,
                "informasi_rentang_hidup"=>$rentang,
                "informasi_wikipedia_url"=>$url,
                "informasi_berat"=>$berat,
                "informasi_asal"=>$asal,
            );
            parent::model("InformasiModel")->editInformasi($id,$data);
            parent::alert("msg","Berhasil Memperbarui Data !!!");
            redirect("administrator/informasi");
        }
        else{
            $data['title'] = "Form Edit Informasi";
            $param = array('informasi_id'=>$id);
            $data['akses'] = array("administrator","informasi");
            $data['row'] = parent::model("InformasiModel")->getOne($param);
            parent::template('informasi/edit',$data);
        }
    }
    public function detail(){
        $id = parent::post("informasi_id");

        $param = array("informasi_id"=>$id);
        $isi = parent::model("InformasiModel")->getOne($param);
        echo json_encode($isi);
    }
    public function delete(){
        $data['title'] = "Informasi";
        $id = $this->uri->segment(4);
        $data = array("informasi_id"=>$id);
        parent::model("InformasiModel")->deleteInformasi($data);
        parent::alert("msg","Berhasil Menghapus Data !!!");
        redirect("administrator/informasi");
    }

}
