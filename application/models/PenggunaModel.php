<?php
	
	class PenggunaModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_pengguna";
        }
        public function get_pengguna()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_pengguna($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editPengguna($id,$data){
            return parent::update_table($this->initTable(),"pengguna_id",$id,$data);
        }
        public function update_by_username($id,$data){
            return parent::update_table($this->initTable(),"pengguna_username",$id,$data);
        }
        public function update_by_email($id,$data){
            return parent::update_table($this->initTable(),"pengguna_email",$id,$data);
        }
        public function deletePengguna($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function checkMail($data){
            return parent::get_object_of_row($this->initTable(),$data);
        }
        public function check_username($data){
            return parent::get_object_of_row($this->initTable(),$data);
        }
        public function get_one_join($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_data_diri', 'tbl_data_diri.data_diri_pengguna_id = tbl_pengguna.pengguna_id');
            $this->db->where('pengguna_id',$id);
            $query = $this->db->get();
            return $query;
        }

    }