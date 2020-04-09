<?php
	
	class PostinganModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_postingan";
        }
        public function get_postingan()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_postingan($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editPostingan($id,$data){
            return parent::update_table($this->initTable(),"postingan_id",$id,$data);
        }
        public function deletePostingan($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function get_postingan_join(){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_postingan.postingan_id_pengguna');
            $this->db->order_by('postingan_id','desc');
            $query = $this->db->get();
            return $query;
        }
        public function get_postingan_join_aktif(){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_postingan.postingan_id_pengguna');
            $this->db->order_by('postingan_id','desc');
            $query = $this->db->get();
            return $query;
        }
    }