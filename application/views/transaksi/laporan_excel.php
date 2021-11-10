<table border="1">
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