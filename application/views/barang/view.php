
<h3>Data Barang</h3>
<?php
echo anchor('barang/post','tambah data',array('class'=>'btn btn-primary'));
?>
<hr>
<table class="table table-bordered">
	<tr>
		<td width="10">No</td>
		<td>Nama Barang</td>
		<td>Kategori Barang</td>
		<td>Harga</td>
		<td colspan="2">Operasi</td>
	</tr>
	<?php
	$no=1+$this->uri->segment(3);
	foreach ($record->result() as $r){
		echo "<tr>
		<td>$no</td>
		<td>$r->nama_barang</td>
		<td>$r->nama_kategori</td>
		<td>$r->harga</td>
		<td width=50>".anchor('barang/edit/'.$r->barang_id,'<span class="glyphicon glyphicon-edit"></span>',array('class'=>'btn btn-warning btn-sm'))."</td>
		<td width=50>".anchor('barang/delete/'.$r->barang_id,'<span class="glyphicon glyphicon-trash"></span>',array('class'=>'btn btn-danger btn-sm'))."</td>
		</tr>";
		$no++;
	}
	?>
</table>
<?php echo $paging ?>