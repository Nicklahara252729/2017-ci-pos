<div class="container padding">
<?php echo anchor('transaksi/laporan','Laporan',array('class'=>'btn btn-warning'))."&nbsp;";
echo anchor('transaksi/excel','Export to Excel',array('class'=>'btn btn-primary'))."&nbsp;";
echo anchor('transaksi/pdf','Export to PDF',array('class'=>'btn btn-danger')); ?>
<hr>
<div class="rows">
<div class="col-lg-12 padding text-center bg-success"> Form Transaksi</div>
<?php echo form_open('transaksi/'); ?>
<div class="col-lg-12 padding" style="background: #f8f8f8;">
	<div class="col-lg-8">
	<input list="barang" name="barang" placeholder="Masukkan Nama Barang" class="form-control">
	</div>
	<div class="col-lg-1" style="border-right: solid 1px lightgray;">
	<input type="text" name="qty" placeholder="QTY" class="form-control">
	</div>
	<div class="col-lg-3">
	<div class="col-lg-6">
	<button type="submit" name="submit" class="btn btn-primary form-control">simpan</button>
	</div>
	<div class="col-lg-6">
	<?php
	echo anchor('transaksi/selesai_belanja','<button type="button" class="btn btn-default form-control">selesai</button>');
	?>
	</div>
	</div>
	</form>
</div>
</div>

<div class="rows">
<div class="col-lg-12" style="margin-top: 50px;padding:0;">
<table class="table table-bordered">
<tr>
<th colspan="6" class="padding bg-success text-center">Detail Transaksi</th>
</tr>
	<tr>
	<th width="10">No</th>
	<th>Nama barang</th>
	<th>Qty</th>
	<th>Harga</th>
	<th>Subtotal</th>
	<th>Option</th>
	</tr>
	<?php
	$no=1;
	$total = 0;
	foreach ($detail as $d) {
	echo "<tr>
	<td width=10>$no</td>
	<td>$d->nama_barang</td>
	<td>$d->qty</td>
	<td>"."Rp. ".number_format($d->harga,0,',',',')."</td>
	<td>"."Rp. ".number_format($d->harga * $d->qty,0,',','.')."</td>
	<td>".anchor('transaksi/hapus/'.$d->t_detail_id,'<span class="glyphicon glyphicon-trash"></span>',array('class'=>'btn btn-danger btn-sm'))."</td>
	</tr>";
	$total = $total+($d->qty * $d->harga);
	$no++;
}
	?>
	<tr>
	<th colspan="4" class="text-center">Total</th>
	<th colspan="2"><?php echo"Rp. ".number_format($total,0,',',','); ?></th>
	</tr>
</table>
</div>
</div>

<datalist id="barang">
	<?php 
	foreach ($barang as $k) {
		echo "<option value='$k->nama_barang'></option>";
	}
	 ?>
</datalist>
</div>