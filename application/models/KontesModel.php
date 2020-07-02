<?php
	
	class KontesModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_kontes";
        }
        public function get_kontes()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_kontes($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editKontes($id,$data){
            return parent::update_table($this->initTable(),"kontes_id",$id,$data);
        }
        public function deleteKontes($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function get_kontes_join(){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_kontes.kontes_pengaju_id');
            $this->db->join('tbl_jenis_kontes', 'tbl_jenis_kontes.jenis_kontes_id = tbl_kontes.kontes_jenis');
            $query = $this->db->get();
            return $query;
        }
        public function get_acc_kontes_join(){
            $tgl = Date("Y-m-d");
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_kontes.kontes_pengaju_id');
            $this->db->join('tbl_jenis_kontes', 'tbl_jenis_kontes.jenis_kontes_id = tbl_kontes.kontes_jenis');
            $this->db->where('kontes_status','disetujui');
            $this->db->where('kontes_tanggal_selesai >=',$tgl);
            $this->db->order_by('kontes_tanggal_mulai','asc');
            $query = $this->db->get();
            return $query;
        }
        public function get_one_join($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_kontes.kontes_pengaju_id');
            $this->db->join('tbl_jenis_kontes', 'tbl_jenis_kontes.jenis_kontes_id = tbl_kontes.kontes_jenis');
            $this->db->where('kontes_id',$id);
            $query = $this->db->get();
            return $query;
        }
        public function get_pembayaran($id){
            $this->db->select('*');
            $this->db->from('tbl_pembayaran');
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_pembayaran.pembayaran_pengguna_id');
            $this->db->join('tbl_pemesanan', 'tbl_pemesanan.pemesanan_id = tbl_pembayaran.pembayaran_pemesanan_id');
            $this->db->where('pemesanan_kontes_id',$id);
            $query = $this->db->get();
            return $query;
        }
        public function get_pemesanan($id){
            $this->db->select('*');
            $this->db->form('tbl_pemesanan');
            $this->db->join('tbl_kontes', 'tbl_kontes.kontes_id = tbl_pemesanan.pemesanan_kontes_id');
            $this->db->where('pemesanan_pengguna_id',$id);
            $this->db->order_by('pemesanan_id','desc');
            $query = $this->db->get();
            return $query;
        }
        public function get_history($id){
            $this->db->select('*');
            $this->db->from('tbl_pembayaran');
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_pembayaran.pembayaran_pengguna_id');
            $this->db->join('tbl_pemesanan', 'tbl_pemesanan.pemesanan_id = tbl_pembayaran.pembayaran_pemesanan_id');
            $this->db->where('pembayaran_pengguna_id',$id);
            $this->db->where('pembayaran_status','setuju');
            $query = $this->db->get();
            return $query;
        }
        public function get_kontes_by_id($id,$status){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_kontes.kontes_pengaju_id');
            $this->db->join('tbl_jenis_kontes', 'tbl_jenis_kontes.jenis_kontes_id = tbl_kontes.kontes_jenis');
            $this->db->where('kontes_pengaju_id',$id);
            if($status !=null){
                $this->db->where('kontes_status',$status);
            }
            $query = $this->db->get();
            return $query;
        }
        public function getmylist($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->where('kontes_pengaju_id',$id);
            $this->db->where('kontes_status','disetujui');
            $query = $this->db->get();
            return $query;
        }


    }