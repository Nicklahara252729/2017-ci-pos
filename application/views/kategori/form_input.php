<div class="container">
<div class="col-lg-offset-4 col-lg-4 padding" style="border:solid 1px lightgray; border-radius: 3px;margin-top: 20px;">
<div class="col-lg-12 text-center" style="border-bottom:dashed 1px gray;"><h3>Tambah Data</h3></div>
<?php
echo form_open('kategori/post');
?>
<div class="col-lg-12 padding">
<input type="text" name="kategori" placeholder="kategori" class="form-control">
</div>
<div class="col-lg-12 padding">
<button type="submir" name="submit" class="btn btn-primary form-control">Tambah</button>
</div>
</div>
</div>