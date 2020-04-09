<?php
	
	class KontakModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_kontak";
        }
        public function get_kontak()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_kontak($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editKontak($id,$data){
            return parent::update_table($this->initTable(),"kontak_id",$id,$data);
        }
        public function deleteKontak($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function getKontak($id){
            $kontak = array($id);
            $this->db->select('*');
            $this->db->from("tbl_kontak");
            $this->db->where_in('kontak_pengguna_id',$kontak);
            $this->db->or_where_in('kontak_pengguna_id2',$kontak);
            $this->db->order_by('kontak_tanggal_update','desc');
            $query = $this->db->get();
            return $query;
        }
    }