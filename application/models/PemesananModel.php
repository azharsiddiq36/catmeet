<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 07/05/20
 * Time: 15:28
 */

class PemesananModel extends  GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function initTable(){
        return "tbl_pemesanan";
    }
    public function post_pemesanan($data){
        return parent::insert_data($this->initTable(),$data);
    }
    public function getOne($param){
        return parent::get_array_of_row($this->initTable(),$param);
    }
    public function editPemesanan($id,$data){
        return parent::update_table($this->initTable(),"pemesanan_id",$id,$data);
    }
    public function get_by_id($id){
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        $this->db->select('pemesanan_id');
        $this->db->from($this->initTable());
//        $this->db->join('tbl_kontes', 'tbl_kontes.kontes_id = tbl_pemesanan.pemesanan_kontes_id');
        $this->db->where('pemesanan_pengguna_id',$id);
        $this->db->where('DATE(pemesanan_tanggal)',$curr_date);
        $this->db->where('pemesanan_status','menunggu');
        $query = $this->db->get();
        return $query;
    }
    public function get_one_join($id){
        $this->db->select('kontes_foto,pemesanan_total,pemesanan_id,kontes_nama,kontes_tanggal_mulai,kontes_id');
        $this->db->from($this->initTable());
        $this->db->join('tbl_kontes', 'tbl_kontes.kontes_id = tbl_pemesanan.pemesanan_kontes_id');
//        $this->db->join('tbl_jenis_kontes', 'tbl_jenis_kontes.jenis_kontes_id = tbl_kontes.kontes_jenis');
        $this->db->where('pemesanan_id',$id);
        $query = $this->db->get();
        return $query;
    }

}