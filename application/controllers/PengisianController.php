<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 16/07/19
 * Time: 20:24
 */

class PengisianController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PengisianModel');
        $this->load->library('pdf');
    }
    public function index(){
        $data['title'] = "Dashboard";
        $data['data'] = parent::model('PengisianModel')->getAllJoin()->result();
        parent::template('pengisian/index',$data);
    }
    public function daftar(){
        $data['title'] = "Tabel Kontes";
        $data['data'] = parent::model('SaldoModel')->get_kontes_join()->result();
        parent::template('kontes/index',$data);
    }
    //Tambah Kontes

    public function accept(){
        $id = $this->uri->segment(4);
            $data = array(
                "pengisian_status"=>"diterima"
            );
            parent::model("PengisianModel")->editPengisian($id,$data);
            parent::alert("msg","Berhasil Menyetujui perimintaan !!!");
            redirect("administrator/pengisian");
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
    function cetak(){
        $id = $this->uri->segment(3);
        $kontes = $this->KontesModel->get_one_join($id)->row_array();
        $pembayaran = $this->KontesModel->get_pembayaran($kontes['kontes_id']);
        $namabulan = null;

        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('times','B',16);
        // mencetak string
        $pdf->Cell(190,7,'Laporan '.$kontes['kontes_nama'],0,1,'C');
        $pdf->SetFont('times','',12);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'Penyelenggara           : '.$kontes['pengguna_nama'], 0,1);
        $pdf->Cell(10,7,'Lokasi                        : '.$kontes['kontes_provinsi'].", ".$kontes['kontes_kabupaten'].", ".
            $kontes['kontes_kecamatan'].", ".$kontes["kontes_desa"].", ".$kontes['kontes_lokasi'],0,1);
        $pdf->Cell(10,7,'Tanggal Mulai           : '.date_indo($kontes['kontes_tanggal_mulai']), 0,1);
        $pdf->Cell(10,7,'Tanggal Selesai         : '.date_indo($kontes['kontes_tanggal_selesai']), 0,1);
        $pdf->Cell(10,7,'Harga Tiket                 : Rp. '.$kontes['kontes_biaya'], 0,1);
        $pdf->Cell(10,7,'',0,1);
        //$pdf->MultiCell(190,7,'Adalah '.strtoupper($id_user['nama']).' sebagai penjamin dari Narapidana '.strtoupper($napi['nama']).' yang sedang sedang menjalani pidana dilapas/Rutan Pekanbaru memberikan pernyataan apabila yang bersangkutan mendapatkan izin yang bersifat khusus maupun Assimilasi Cuti Menjelang Bebas (CMB), Cuti Bersyarat (CB) dan Pembebasan bersyarat dan Pembebasan Bersyarat (PB) maka :',0,'J',0,15);
        $pdf->SetFont('times','B',14);
        $pdf->Cell(10,7,'Deskripsi', 0,1);
        $pdf->SetFont('times','',12);
        $pdf->SetX(20);$pdf->MultiCell(190,7,''.$kontes['kontes_description']);
        $pdf->SetFont('times','B',14);
        $pdf->Cell(10,7,'Rincian', 0,1);
        $pdf->SetFont('times','',12);
        $pdf->SetX(20);$pdf->MultiCell(190,7,''.$kontes['kontes_details']);

        $pdf->Cell(190,7,'Riwayat Pembayaran',0,1,'C');

        $header = array(
            array("label"=>"No", "length"=>10, "align"=>"C"),
            array("label"=>"Nama Pembayar", "length"=>70, "align"=>"C"),
            array("label"=>"Tanggal", "length"=>30, "align"=>"C"),
            array("label"=>"Jenis", "length"=>30, "align"=>"C"),
            array("label"=>"Jumlah", "length"=>50, "align"=>"C"));

        //tabel
        $pdf->SetFont('times','','10');
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(128,0,0);
        foreach ($header as $kolom) {
            $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
        }
        $pdf->Ln();
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        $number = 1;
        $total = 0;
        foreach ($pembayaran->result_array() as $d){
            $header = array(
                array("label"=>$number, "length"=>10, "align"=>"L"),
                array("label"=>$d['pengguna_nama'], "length"=>70, "align"=>"L"),
                array("label"=>date_indo(date("Y-m-d",strtotime($d['pembayaran_tanggal']))), "length"=>30, "align"=>"R"),
                array("label"=>$d['pembayaran_jenis'], "length"=>30, "align"=>"C"),
                array("label"=>"Rp. ".$d['pembayaran_jumlah'], "length"=>50, "align"=>"R"));
            $number++;
            foreach ($header as $kolom) {
                $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
            }
            $pdf->Ln();
            $total += $d['pembayaran_jumlah'];
        }
        $pdf->Cell(190,7,'Total Pembayaran : Rp. '.$total,0,1,'R');
        $pdf->Output();
    }
}
