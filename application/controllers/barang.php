<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_barang');
		check_session();
	}

	function index(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'barang/index/';
		$config['total_rows'] = $this->model_barang->lihat_data()->num_rows();
		$config['per_page'] = 1;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();
		$page = $this->uri->segment(3);
		$page = $page==''?0:$page;
		$data['record'] = $this->model_barang->paging($page,$config['per_page']);
		//$data['record'] = $this->model_barang->lihat_data()->result();
		$this->template->load('template','barang/view',$data);
	}

	function post(){
		if(isset($_POST['submit'])){
			$nama = $this->input->post('nama_barang');
			$kategori =$this->input->post('kategori');
			$harga = $this->input->post('harga');
			$data = array('nama_barang'=>$nama,'kategori_id'=>$kategori,'harga'=>$harga);
			$this->model_barang->post($data);
			redirect('barang');
		}else{
			$this->load->model('model_kategori');
			$data['record']=$this->model_kategori->tampil_data()->result();
			$this->template->load('template','barang/form_input',$data);
		}
	}

	function edit(){
		if(isset($_POST['submit'])){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama_barang');
			$kategori = $this->input->post('kategori');
			$harga = $this->input->post('harga');
			$data = array('nama_barang'=>$nama, 'kategori_id'=>$kategori, 'harga'=>$harga);
			$this->model_barang->edit($data,$id);
			redirect('barang');
		}else{
			$id = $this->uri->segment(3);
			$this->load->model('model_kategori');
			$data['kategori'] = $this->model_kategori->tampil_data()->result();
			$data['record'] = $this->model_barang->get_one($id)->row_array();
			$this->template->load('template','barang/form_edit',$data);
		}
	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->model_barang->delete($id);
		redirect('barang');
	}
}