<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Model_Barang extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function lihat_data(){
		$query = "select a.barang_id,a.nama_barang,a.harga,b.nama_kategori from barang as a, kategori_barang as b where a.kategori_id=b.kategori_id ";
		return $this->db->query($query);
	}

	function paging($page,$batas){
		$query = "select a.barang_id,a.nama_barang,a.harga,b.nama_kategori from barang as a, kategori_barang as b where a.kategori_id=b.kategori_id limit $page,$batas";
		return $this->db->query($query);	}

	function post($data){
		$this->db->insert('barang',$data);
	}

	function get_one($id){
		$param = array('barang_id'=>$id);
		return $this->db->get_where('barang',$param);	
	}

	function edit($data,$id){
		$this->db->where('barang_id',$id);
		$this->db->update('barang',$data);
	}

	function delete($id){
		$this->db->where('barang_id',$id);
		$this->db->delete('barang');
	}
}