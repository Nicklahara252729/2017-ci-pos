<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Model_Transaksi extends CI_Model{
	function simpan_barang(){
		$nama_barang = $this->input->post('barang');
		$qty 		 = $this->input->post('qty');
		$idbarang	 = $this->db->get_where('barang',array('nama_barang'=>$nama_barang))->row_array();
		$data 		 = array('barang_id'=>$idbarang['barang_id'],'qty'=>$qty,'harga'=>$idbarang['harga'],'status'=>'0');
		$this->db->insert('transaksi_detail',$data);
	}

	function tampil_transaksi(){
		$query = "select * from transaksi_detail join barang on (transaksi_detail.barang_id = barang.barang_id) where status='0'";
		return $this->db->query($query);
	}

	function hapus($id){
		$this->db->where('t_detail_id',$id);
		$this->db->delete('transaksi_detail');
	}

	function selesai_belanja($data){
		$this->db->insert('transaksi',$data);
		$last_id = $this->db->query("select transaksi_id from transaksi order by transaksi_id desc")->row_array();
		$this->db->query("update transaksi_detail set transaksi_id='".$last_id['transaksi_id']."'where status='0'");
		$this->db->query("update transaksi_detail set status='1' where status='0'");
	}

	function laporan_def(){
		$query = "select a.tanggal_transaksi, b.nama_lengkap, sum(c.harga * c.qty) as total from transaksi as a, transaksi_detail as 	   c, operator as b where c.transaksi_id=a.transaksi_id and b.operator_id=a.operator_id group by a.transaksi_id";
		return $this->db->query($query); 
	}

	function laporan_periode($tgl1,$tgl2){
		$query = "select a.tanggal_transaksi, b.nama_lengkap, sum(c.harga * c.qty) as total from transaksi as a, transaksi_detail as 	   c, operator as b where c.transaksi_id=a.transaksi_id and b.operator_id=a.operator_id  and 
					a.tanggal_transaksi between '$tgl1' and '$tgl2' group by a.transaksi_id";
		return $this->db->query($query); 
	}
}