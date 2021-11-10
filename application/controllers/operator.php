<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Operator extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_operator');
		check_session();
	}

	function index(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'operator/index/';
		$config['total_rows'] = $this->model_operator->tampil_data()->num_rows();
		$config['per_page'] = 1;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();
		$page = $this->uri->segment(3);
		$page = $page==''?0:$page;
		$data['record'] = $this->model_operator->paging($page,$config['per_page']);
		//$data['record'] = $this->model_operator->tampil_data()->result();
		$this->template->load('template','operator/view',$data);
	}

	function post(){
		if(isset($_POST['submit'])){
			$nama = $this->input->post('nama',true);
			$user = $this->input->post('username',true);
			$pass = $this->input->post('password',true);
			$data = array('nama_lengkap'=>$nama, 'username'=>$user, 'password'=>md5($pass));
			$this->db->insert('operator',$data);
			redirect('operator');
		}else{
			$this->template->load('template','operator/form_input');	
		}
	}

	function edit(){
		if(isset($_POST['submit'])){
			$id = $this->input->post('id',true);
			$nama = $this->input->post('nama',true);
			$username = $this->input->post('username',true);
			$pass = $this->input->post('password',true);
			if(empty($pass)){
				$data = array('nama_lengkap'=>$nama,'username'=>$username);
			}else{
				$data = array('nama_lengkap'=>$nama,'username'=>$username,'password'=>md5($pass));	
			}
			$this->db->where('operator_id',$id)
					 ->update('operator',$data);
			redirect('operator');
		}else{
			$id = $this->uri->segment(3);
			$data['record'] = $this->model_operator->get_one($id)->row_array();
			$this->template->load('template','operator/form_edit',$data);	
		}
		
	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->db->where('operator_id',$id)
				 ->delete('operator');
		redirect('operator');
	}
}