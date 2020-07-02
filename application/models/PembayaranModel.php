<?php
	
	class PembayaranModel extends GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_pembayaran";
        }
        public function get_pembayaran()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_pembayaran($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editPembayaran($id,$data){
            return parent::update_table($this->initTable(),"pembayaran_id",$id,$data);
        }
        public function deletePembayaran($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function getByPengguna($id){

            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->where('pembayaran_pengguna_id',$id);
            $this->db->join('tbl_kontes', 'tbl_kontes.kontes_id = tbl_pembayaran.pembayaran_kontes_id');
            $this->db->order_by('pembayaran_id','desc');
            $query = $this->db->get();
            return $query;
        }
        public function get_by_cat_name($id,$name){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->where('pembayaran_nama',$name);
            $this->db->where('pembayaran_pengguna_id',$id);
            $query = $this->db->get();
            return $query;
        }
        public function getpembayaran($id,$kontes){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->where('pembayaran_status','setuju');
            $this->db->where('pembayaran_kontes_id',$kontes);
            $this->db->where('pembayaran_pengguna_id',$id);
            $query = $this->db->get();
            return $query;
        }
        public function gettotal($id,$kontes){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->where('pembayaran_status','setuju');
            $this->db->where('pembayaran_kontes_id',$kontes);
            $query = $this->db->get();
            return $query;
        }
    }