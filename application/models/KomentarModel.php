<?php
	
	class KomentarModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_komentar";
        }
        public function get_komentar()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_komentar($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editKomentar($id,$data){
            return parent::update_table($this->initTable(),"komentar_id",$id,$data);
        }
        public function deleteKomentar($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function get_komentar_join($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_komentar.komentar_pengguna_id');
            $this->db->where('komentar_postingan_id', $id);
            $query = $this->db->get();
            return $query;
        }
    }