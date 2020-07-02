<?php
	
	class penarikanModel extends GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_penarikan";
        }
        public function get_penarikan()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_penarikan($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editpenarikan($id,$data){
            return parent::update_table($this->initTable(),"penarikan_id",$id,$data);
        }
        public function deletepenarikan($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function getByPengguna($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->where('penarikan_pengguna_id',$id);
            $query = $this->db->get();
            return $query;
        }
    }