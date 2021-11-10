<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller{
	
	function __construct(){
		parent::__construct();	
		$this->load->model('model_operator');	
		//check_session();	
	}
	function index(){
		$cookie = get_cookie('login');
		
		if(isset($_POST['submit'])){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$remember = $this->input->post('remember');
			//$this->simple_login->login($username,$password,base_url('Kategori'),base_url('Front'));
			$hasil = $this->model_operator->login($username,$password);
			if($hasil==1){
				$roe = $this->model_operator->login($username,$password)->row();
				if(isset($remember)){
					$key = random_string('alnum', 64);
					set_cookie('login', $key, 10); // set expired 30 hari kedepan
					
					// simpan key di database
					$update_key = array(
						'cookie' => $key
					);
					$this->model_operator->update_cookie($update_key, $row->operator_id);
				}
				$this->db->where('username',$username);
				$this->db->update('operator',array('las_login'=>date('Y-m-d')));
				/*$newdata = array(
        		'status_login'  => 'oke',
        		'user'     => 'nick',
				);
				$this->session->set_userdata('status_login','oke');*/
				//$this->session->mark_as_flash(array('status_login','user'));
				$this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
				//echo $this->session->userdata('status_login');
				redirect('Kategori');
				//echo $hasil;
			}else{

				redirect(site_url('front'));
			}
		}else{
			//$this->load->view('index');
			//check_session_login();
			$this->theme->load('theme','index');
		}
	}

	function logout(){
		 session_destroy();
		//$des = $this->session->sess_destroy();
		//if($des){
			redirect('front');
		//}else{
		//	echo"failed";
		//}
		//$this->session->unset_userdata('status_login');
		//$this->CI->session->unset_userdata('id_login');
		//$this->CI->session->unset_userdata('id');
		//$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		//redirect(site_url('front'));
	}
}