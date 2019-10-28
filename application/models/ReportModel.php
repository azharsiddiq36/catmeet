<?php
	
	class ReportModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_report";
        }
        public function get_report()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_report($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editReport($id,$data){
            return parent::update_table($this->initTable(),"report_id",$id,$data);
        }
        public function deleteReport($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function get_report_join($id){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_report.report_pengguna_id');
            $this->db->where('report_postingan_id', $id);
            $query = $this->db->get();
            return $query;
        }
    }