<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_kategori');	
		check_session();
	}

	function index(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'kategori/index/';
		$config['total_rows'] = $this->model_kategori->tampil_data()->num_rows();
		$config['per_page'] = 2;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();
		$page = $this->uri->segment(3);
		$page = $page==''?0:$page;
		$data['record'] = $this->model_kategori->paging($page,$config['per_page']);
		$this->template->load('template','kategori/view',$data);
	}

	function post(){
		if(isset($_POST['submit'])){
			$this->model_kategori->post();
			redirect('kategori');
		}else{
			$this->template->load('template','kategori/form_input');
		}
	}

	function edit(){
		if(isset($_POST['submit'])){
			$this->model_kategori->edit();
			redirect('kategori');
		}else{
			$id = $this->uri->segment(3);
			$data['record'] = $this->model_kategori->get_one($id)->row_array();
			$this->template->load('template','kategori/form_edit',$data);
		}
	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->model_kategori->delete($id);
		redirect('kategori');
	}
}