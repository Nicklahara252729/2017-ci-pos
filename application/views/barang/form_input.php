<div class="container">
<div class="col-lg-offset-4 col-lg-4 padding" style="border:solid 1px lightgray; border-radius: 3px;margin-top: 20px;">
<div class="col-lg-12 text-center" style="border-bottom:dashed 1px gray;"><h3>Tambah Data</h3></div>
<?php
echo form_open('barang/post');
?>
<div class="col-lg-12 padding">
<input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control">
</div>
<div class="col-lg-12 padding">
<select name="kategori" class="form-control" style="-moz-appearance:none;">
	<option selected disabled>- Pilih Kategori -</option>
	<?php
	foreach ($record as $r) {
		echo"<option value='$r->kategori_id'>$r->nama_kategori</option>";
	}
	?>
</select>
</div>
<div class="col-lg-12 padding">
<input type="text" name="harga" placeholder="Harga" class="form-control">
</div>
<div class="col-lg-12 padding">
<button type="submit" name="submit" class="btn btn-primary form-control">Tambah</button>
</div>
</form>
</div>
</div>