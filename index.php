<?php
	require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'function/route.php';
?>
<!doctype html>
<html lang=''>
<head>
	<title>Sistem Informasi Disposisi Surat Tata Naskah Dinas Elektronik</title>
	<meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   	<?php include "view/component/included-file.php" ?>
</head>
<body>
	<?php
	
	if(file_exists(dirname(__DIR__).DIRECTORY_SEPARATOR."public/lampiran")){
		echo "ada";
	}else{
		echo "tak";
	}
	
	?>
	<header>
		<div id="header-left">
			<div class="logo">
				<img src="assets/img/logo/bpk.png" height="130" alt="Logo BPK">
			</div>
			<div class="head-title">
					<h2>SISTEM INFORMASI DISPOSISI SURAT TATA NASKAH DINAS ELEKTRONIK</h2>
					<h3>Badan Pemeriksa Keuangan Republik Indonesia</h3>
					<h3>Perwakilan Jawa Tengah</h3>
			</div>
		</div>
		<div id="header-right">
			
		</div>
	</header>
	
	<?php include "view/component/menu.php"; ?>
<section id="main">
	<div id="content">
		<div id="container">
			<div class="row">
			<?php
				$page = (isset($_GET['page']))? $_GET['page'] : "main";
				route($page);
			?>		
			</div>
		</div>
	</div>
</section>
<footer>
	<div class="pull-left">
		Copyright &copy; <?php echo date("Y") ?> SISTEM INFORMASI DISPOSISI SURAT TATA NASKAH DINAS ELEKTRONIK 
	</div>
	<div class="pull-right">
		
	</div>
</footer>
</body>
</html>
