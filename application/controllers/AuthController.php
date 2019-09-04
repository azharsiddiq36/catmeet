<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class AuthController extends GLOBAL_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AuthModel');
		}
        public function index()
        {
            $data['title'] = 'Admin Index';
            $data['page_title'] = '';
            $data['menu'] = '';
            //$this->load->view('templates/template_header');
            $this->load->view('auth/login');
        }
		
		public function login()
		{
			$data['title'] = 'Masuk ke CatMeet';
			if (isset($_POST['submit'])){
				$username = parent::post('email');
				$password = parent::post('password');
				$loginData = parent::model('AuthModel')->get_pengguna($username,md5($password));
				$existsStatus = $loginData->num_rows();
				$existsData   = $loginData->row_array();
				if ($existsStatus > 0)
				{
					$sessData = array(
                        'pengguna_id' => $existsData['pengguna_id'],
						'pengguna_nama' => $existsData['pengguna_nama'],
						'pengguna_hak_akses' => $existsData['pengguna_hak_akses'],
                        'pengguna_foto' => $existsData['pengguna_foto'],
					);
                    $this->session->set_userdata($sessData);
					if ($existsData['pengguna_hak_akses'] == "administrator"){
                        redirect(site_url('administrator/dashboard'));
                    }
                    else{
                        parent::alert('msg','Hak Akses Kamu Tidak Terdaftar');
					    redirect("login");
                    }
				}else{
					parent::alert('msg','Email atau Password Salah');
					redirect(site_url());
				}
			}else{
				parent::authPage('auth/login',$data);
			}
		}
		public function logout(){
		    session_destroy();
		    redirect('login');
        }
		
		
	}