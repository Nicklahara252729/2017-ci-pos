<div class="container">
<div class="col-lg-offset-4 col-lg-4 padding" style="border:solid 1px lightgray; border-radius: 3px;margin-top: 20px;">
<div class="col-lg-12 text-center" style="border-bottom:dashed 1px gray;"><h3>Edit Data</h3></div>
<?php
echo form_open('barang/edit');
?>
<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
<div class="col-lg-12 padding">
<input type="text" name="nama_barang" value="<?php echo $record['nama_barang']; ?>" placeholder="Nama Barang" class="form-control">
</div>
<div class="col-lg-12 padding">
<select name="kategori" class="form-control" style="-moz-appearance:none;">
	<option selected disabled>- Pilih Kategori -</option>
	<?php
	foreach ($kategori as $r) {
		echo"<option value='$r->kategori_id'";
		echo $record['kategori_id']==$r->kategori_id?'selected':'';
		echo">$r->nama_kategori</option>";
	}
	?>
</select>
</div>
<div class="col-lg-12 padding">
<input type="text" name="harga" placeholder="Harga" value="<?php echo $record['harga']; ?>" class="form-control">
</div>
<div class="col-lg-12 padding">
<button type="submit" name="submit" class="btn btn-primary form-control">Edit</button>
</div>
</form>
</div>
</div>