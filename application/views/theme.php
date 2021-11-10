<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Pos Application</title>
<?php echo link_tag('asset/css/bootstrap.css'); ?>
<link rel="stylesheet" type="shortcut icon" href="<?php echo base_url(); ?>/asset/img/nicklahara.png">
<style type="text/css">
	.padding{
		padding: 10px;
	}body{
		background: #f8f8f8;
	}
</style>
</head>
<body>
<div class="container">
	<?php echo $contents; ?>
</div>
</body>
</html>