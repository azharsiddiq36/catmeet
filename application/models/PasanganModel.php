<?php
	
	class PasanganModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }
        public function initTable(){
            return "tbl_pasangan";
        }
        public function get_pasangan()
		{
			return parent::get_object_of_table($this->initTable());
		}
		public function post_pasangan($data){
            return parent::insert_data($this->initTable(),$data);
        }
        public function getOne($param){
            return parent::get_array_of_row($this->initTable(),$param);
        }
        public function editPasangan($id,$data){
            return parent::update_table($this->initTable(),"pasangan_id",$id,$data);
        }
        public function deletePasangan($data){
            return parent::delete_row($this->initTable(),$data);
        }
        public function getLocation($kucing,$provinsi,$kabupaten,$kecamatan,$desa){
            $this->db->select('*');
            $this->db->from($this->initTable());
            $this->db->join('tbl_pengguna', 'tbl_pengguna.pengguna_id = tbl_pasangan.pasangan_pengguna_id');
            $this->db->join('tbl_kucing','tbl_kucing.kucing_id = tbl_pasangan.pasangan_kucing_id');
            if ($kucing != null){
                $this->db->like('kucing_jenis',$kucing);
            }
            if ($provinsi != null){
                $this->db->like('pengguna_provinsi',$provinsi);
            }
            if ($kabupaten != null){
                $this->db->like('pengguna_kabupaten',$kabupaten);
            }
            if ($kecamatan != null){
                $this->db->like('pengguna_kecamatan',$kecamatan);
            }
            if ($desa != null){
                $this->db->like('pengguna_desa',$desa);
            }
            $this->db->order_by('pasangan_id','desc');
            $query = $this->db->get();
            return $query;
        }
    }