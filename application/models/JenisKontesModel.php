<?php
	
	class JenisKontesModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_jenis_kontes";
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
            return parent::update_table($this->initTable(),"jenis_kontes_id",$id,$data);
        }
        public function deleteKontes($data){
            return parent::delete_row($this->initTable(),$data);
        }

    }