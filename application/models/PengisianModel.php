<?php
	
	class PengisianModel extends GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_pengisian";
        }
        public function get_pengisian()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_pengisian($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editPengisian($id,$data){
            return parent::update_table($this->initTable(),"pengisian_id",$id,$data);
        }
        public function deletePengisian($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function getAllJoin(){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_pengisian.pengisian_pengaju_id');
            $this->db->order_by('pengisian_id','desc');
            $query = $this->db->get();
            return $query;
        }
        public function getByPengguna($id){

            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->where('pengisian_pengaju_id',$id);
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_pengisian.pengisian_pengaju_id');
            $this->db->order_by('pengisian_id','desc');
            $query = $this->db->get();
            return $query;
        }
    }