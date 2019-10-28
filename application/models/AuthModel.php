<?php
	
	class AuthModel extends  GLOBAL_Model {

        public function __construct()
        {
            parent::__construct();
        }

        public function get_pengguna($username,$password)
		{
			$user = array(
				'pengguna_email' => $username,
				'pengguna_password' => $password
			);
			return parent::get_object_of_row('tbl_pengguna',$user);
		}
        public function get_by_username($username,$password)
        {
            $user = array(
                'pengguna_username' => $username,
                'pengguna_password' => $password
            );
            return parent::get_object_of_row('tbl_pengguna',$user);
        }

    }