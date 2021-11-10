<h3>Kategori barang</h3>
<?php
echo anchor('kategori/post','tambah data',array('class'=>'btn btn-primary'));
?>
<hr>
<?php //echo $this->session->userdata('username'); ?>
<table class="table table-bordered">
	<tr><th width="10">No</th><th>Nama Kategori</th><th colspan="2" class="text-center">Option</th></tr>
	<?php
	$no = 1+$this->uri->segment(3);
	foreach ($record->result() as $r) {
		echo "
		<tr>
		<td>$no</td>
		<td>$r->nama_kategori</td>
		<td width=50>".anchor('kategori/edit/'.$r->kategori_id,'<span class="glyphicon glyphicon-edit"></span>',array('class'=>'btn btn-warning btn-sm'))."</td>
		<td width=50>".anchor('kategori/delete/'.$r->kategori_id,'<span class="glyphicon glyphicon-trash"></span>',array('class'=>'btn btn-danger btn-sm'))."</td>
		</tr>
		";
		$no++;
	}
	?>
</table>
<?php echo $paging ?>