<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Pos Application</title>
<?php echo link_tag('asset/css/bootstrap.css'); ?>
<link rel="shortcut icon" href="<?php echo base_url(); ?>asset/img/nicklahara.png">
<style type="text/css">
	.padding{
		padding: 10px;
	}
</style>
</head>
<body>
<div class="container-fluid navbar-default">
<div class="container padding">
<?php echo anchor('kategori','<div class="col-lg-2 text-center small padding">Kategori Barang</div>');?>
<?php echo anchor('barang','<div class="col-lg-2 text-center small padding">Data Barang</div>');?>
<?php echo anchor('operator','<div class="col-lg-2 text-center small padding">Operator</div>'); ?>
<?php echo anchor('transaksi','<div class="col-lg-2 text-center small padding">Transaksi</div>');?>
<?php echo anchor('front/logout','<div class="col-lg-2 text-center small padding">Logout</div>'); ?>
</div>
</div>
<div class="container">
	<?php echo $contents; ?>
</div>
</body>
</html>