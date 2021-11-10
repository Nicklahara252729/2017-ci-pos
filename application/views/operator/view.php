<div class="container">
<h3>Liat Data Operator</h3>
<?php echo anchor('operator/post','tambah operator',array('class'=>'btn btn-primary')); ?>
<hr>
<table class="table table-bordered">
	<tr>
	<td width=10>NO</td>
	<td>Nama</td>
	<td>Username</td>
	<td>last login</td>
	<td colspan="2" class="text-center">Option</td>
	</tr>
	<?php
	$no =1+$this->uri->segment(3);
	foreach ($record->result() as $r) {
		echo"<tr>
	<td >$no</td>
	<td>$r->nama_lengkap</td>
	<td>$r->username</td>
	<td>$r->las_login</td>
	<td width=50>".anchor('operator/edit/'.$r->operator_id,'<span class="glyphicon glyphicon-edit"></span>',array('class'=>'btn btn-warning btn-sm'))."</td>
	<td width=50>".anchor('operator/delete/'.$r->operator_id,'<span class="glyphicon glyphicon-trash"></span>',array('class'=>'btn btn-danger btn-sm'))."</td>
	</tr>";
	$no++;
	}
	 ?>
</table>
<?php echo $paging; ?>
</div>