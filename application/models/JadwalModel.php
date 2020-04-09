<?php
	
	class JadwalModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_penjadwalan";
        }
        public function get_jadwal()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_jadwal($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editJadwal($id,$data){
            return parent::update_table($this->initTable(),"jadwal_id",$id,$data);
        }
        public function deleteJadwal($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function get_jadwal_join(){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_penjadwalan.penjadwalan_id_pengaju');
            //$this->db->where('penjadwalan_id_pengaju',$id);
            $query = $this->db->get();
            return $query;
        }
        public function get_jadwal_by_id($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->where('penjadwalan_id_pengaju',$id);
            $this->db->or_where('penjadwalan_id_penerima',$id);
            $query = $this->db->get();
            return $query;
        }

    }