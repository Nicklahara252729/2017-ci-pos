<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Transaksi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('model_barang','model_transaksi'));
		check_session();
	}

	function index(){	

	if(isset($_POST['submit'])){
		$this->model_transaksi->simpan_barang();
		redirect('transaksi');
	}else{
		$data['barang'] = $this->model_barang->lihat_data()->result();
		$data['detail'] = $this->model_transaksi->tampil_transaksi()->result();
		$this->template->load('template','transaksi/form_transaksi',$data);
	}
	}

	function hapus(){
		$id = $this->uri->segment(3);
		$this->model_transaksi->hapus($id);
		redirect('transaksi');
	}

	function selesai_belanja(){
		$tgl = date('Y-m-d');
		$user= $this->session->userdata('username');
		$id_op = $this->db->get_where('operator',array('username'=>$user))->row_array();
		$data = array('operator_id'=>$id_op['operator_id'],'tanggal_transaksi'=>$tgl);
		$this->model_transaksi->selesai_belanja($data);
		redirect(site_url('transaksi'));
	}

	function laporan(){
		if(isset($_POST['submit'])){
			$tgl1 = $this->input->post('tgl1');
			$tgl2 = $this->input->post('tgl2');
			$data['record'] = $this->model_transaksi->laporan_periode($tgl1,$tgl2);
			$this->template->load('template','transaksi/laporan',$data);
		}else{
			$data['record'] = $this->model_transaksi->laporan_def();
			$this->template->load('template','transaksi/laporan',$data);	
		}
	}

	function excel(){
		header("Content-type=application/vnd.ms-excel");
		header("Content-disposition:attachment;filename=laporantransaksi.xls");
		$data['record'] = $this->model_transaksi->laporan_def();
		$this->load->view('transaksi/laporan_excel',$data);
	}

	function pdf(){
		$this->load->library('cfpdf');
		$pdf = new FPDF('P','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B','L');
		$pdf->SetFontSize(14);
		$pdf->Text(10,10,'LAPORAN TRANSAKSI');
		$pdf->SetFont('Arial','B','L');
		$pdf->SetFontSize(10);
		$pdf->Cell(10,10,'','',1);
		$pdf->Cell(10,7,'No',1,0);
		$pdf->Cell(27,7,'Tanggal',1,0);
		$pdf->Cell(30,7,'Operator',1,0);
		$pdf->Cell(38,7,'Total Transaksi',1,1);

		$pdf->SetFont('Arial','','L');
		$data = $this->model_transaksi->laporan_def();
		$no = 1;
		$total=0;
		foreach ($data->result() as $r) {
			$pdf->Cell(10,7,$no,1,0);
			$pdf->Cell(10,7,$r->tanggal_transaksi,1,0);
			$pdf->Cell(10,7,$r->nama_lengkap,1,0);
			$pdf->Cell(10,7,$r->total,1,0);
			$no++;
			$total = $total+$r->total;
		}

		$pdf->Cell(67,7,'Total',1,0,'C');
		$pdf->Cell(38,7,$total,1,0);
		$pdf->Output();
	}
}