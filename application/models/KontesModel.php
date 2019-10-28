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
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_kontes.kontes_id_pengguna');
            $this->db->join('tbl_jenis_kontes', 'tbl_jenis_kontes.jenis_kontes_id = tbl_kontes.kontes_jenis');
            $query = $this->db->get();
            return $query;
        }
        public function get_one_join($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_kontes.kontes_id_pengguna');
            $this->db->join('tbl_jenis_kontes', 'tbl_jenis_kontes.jenis_kontes_id = tbl_kontes.kontes_jenis');
            $this->db->where('kontes_id',$id);
            $query = $this->db->get();
            return $query;
        }

    }