<?php
	
	class SaldoModel extends GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_saldo";
        }
        public function get_saldo()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_saldo($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editSaldo($id,$data){
            return parent::update_table($this->initTable(),"saldo_id",$id,$data);
        }
        public function deleteSaldo($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function getByPengguna($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->where('saldo_pengguna_id',$id);
            $query = $this->db->get();
            return $query;
        }
    }