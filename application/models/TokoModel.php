<?php
	
	class TokoModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_toko";
        }
        public function get_toko()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_toko($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editToko($id,$data){
            return parent::update_table($this->initTable(),"toko_id",$id,$data);
        }
        public function deleteToko($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function get_toko_join(){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_toko.toko_pengguna_id');
            $query = $this->db->get();
            return $query;
        }
        public function get_one_join($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_toko.toko_pengguna_id');
            $this->db->where('toko_id',$id);

            $query = $this->db->get();
            return $query;
        }
        public function get_by_pengguna($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_toko.toko_pengguna_id');
            $this->db->where('toko_pengguna_id',$id);
            $query = $this->db->get();
            return $query;
        }
        public function get_acc_toko_join(){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_toko.toko_pengguna_id');
            $this->db->where('toko_status',"aktif");
            $this->db->order_by('toko_nama','asc');
            $query = $this->db->get();
            return $query;
        }
    }