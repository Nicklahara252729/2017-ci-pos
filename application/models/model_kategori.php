<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Model_Kategori extends CI_Model{
	function tampil_data(){
		return $this->db->get('kategori_barang');
	}

	function post(){
		$data = array('nama_kategori'=>$this->input->post('kategori'));
		$this->db->insert('kategori_barang',$data);
	}

	function get_one($id){
		$param = array('kategori_id'=>$id);
		return $this->db->get_where('kategori_barang',$param);
	}

	function edit(){
		$data =array('nama_kategori'=>$this->input->post('kategori'));
		$this->db->where('kategori_id',$this->input->post('id'))
				 ->update('kategori_barang',$data);
	}

	function delete($id){
		$this->db->where('kategori_id',$id);
		$this->db->delete('kategori_barang');
	}

	function paging($page,$batas){
		return $this->db->query("select * from kategori_barang limit $page,$batas");
	}
}