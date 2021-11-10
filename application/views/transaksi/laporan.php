<div class="container padding">
<div class="col-lg-12 text-center bg-success"><h3>Laporan</h3></div>
<div class="col-lg-12" style="margin-top: 20px;padding:0;">
<?php echo form_open('transaksi/laporan'); ?>
<table class="table table-bordered">
	<tr>
	<td>
	<input type="text" name="tgl1" placeholder="Tanggal 1" class="form-control">
	<td>
	<input type="text" name="tgl2" placeholder="Tanggal 2" class="form-control">
	</td>
	<td>
	<input type="submit" name="submit" value="proses" class="btn btn-primary btn-sm form-control">
	</tr>
</table>
<?php echo form_close(); ?>
<hr>
<table class="table table-bordered">
	<tr class="bg-success">
	<th width="10">NO</th>
	<th>Tanggal Transaksi</th>
	<th>Operator</th>
	<th>Total</th>
	</tr>
	<?php
	$no =1 ;
	$total =0;
	foreach ($record->result() as $r) {
		echo"<tr>
	<td>$no</td>
	<td>$r->tanggal_transaksi</td>
	<td>$r->nama_lengkap</td>
	<td>Rp ".number_format($r->total,0,',',',')."</td>
	</tr>";
	$no++;
	$total = $total+$r->total;
	}
	?>
	<tr>
	<th colspan="3" class="text-center">Total</th>
	<th><?php echo"Rp ".number_format($total,0,',',','); ?></th>
	</tr>
</table>
</div>
</div>