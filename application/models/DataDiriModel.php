<?php
	
	class DataDiriModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_data_diri";
        }
        public function get_data_diri()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_data_diri($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editdata_diri($id,$data){
            return parent::update_table($this->initTable(),"data_diri_id",$id,$data);
        }
        public function deletedata_diri($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function checkid($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->where('data_diri_pengguna_id',$id);
            $query = $this->db->get();
            return $query;
        }
    }