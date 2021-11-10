<div class="container">
<div class="col-lg-offset-4 col-lg-4 padding" style="border:solid 1px lightgray; border-radius: 3px;margin-top: 20px;">
<div class="col-lg-12 text-center" style="border-bottom:dashed 1px gray;"><h3>Edit Data</h3></div>
<?php
echo form_open('kategori/edit');
?>
<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
<div class="col-lg-12 padding">
<input type="text" name="kategori" placeholder="kategori" value="<?php echo $record['nama_kategori']; ?>" class="form-control">
</div>
<div class="col-lg-12 padding">
<button type="submit" name="submit" class="btn btn-primary form-control">Ubah</button>
</div>
</div>
</div>