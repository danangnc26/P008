<?php
	require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'function\route.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Elektronik Tata Naskah Dinas</title>
	<?php include "view/component/included-file.php" ?>
	
	<style type="text/css">
	body{
		width: 100%;
		height: 100%;
		padding-top: 2em;
		text-align: center;
	}
	h2, h3{
		margin: 0px;
		padding: 0px;
	}
	button{
		width: 100%;
	}
	/*FORM LOGIN*/
	.form-1 {
	    /* Size & position */
	    width: 350px;
	    margin: 20px auto;
	    padding: 25px;
	    position: relative; /* For the submit button positioning */

	    /* Styles */
	    border:1px solid #d2d6de;
	    border-radius: 3px;
	   	background: #fff;
	   	overflow: hidden;
	}

	.form-1 .field {
	    position: relative; /* For the icon positioning */
	}

	.form-1 .field i {
	    /* Size and position */
	    left: 0px;
	    top: 0px;
	    position: absolute;
	    height: 36px;
	    width: 36px;

	    /* Line */
	    border-right: 1px solid rgba(0, 0, 0, 0.1);
	    box-shadow: 1px 0 0 rgba(255, 255, 255, 0.7);

	    /* Styles */
	    color: #777777;
	    text-align: center;
	    line-height: 42px;
	    -webkit-transition: all 0.3s ease-out;
	    -moz-transition: all 0.3s ease-out;
	    -ms-transition: all 0.3s ease-out;
	    -o-transition: all 0.3s ease-out;
	    transition: all 0.3s ease-out;
	    pointer-events: none;
	}

	.form-1 input[type=text],
	.form-1 input[type=password] {
	    font-family: inherit;
	    font-size: 13px;
	    font-weight: 400;
	    text-shadow: 0 1px 0 rgba(255,255,255,0.8);
	    /* Size and position */
	    width: 100%;
	    padding: 10px 0px 10px 45px;

	    /* Styles */
	    border:1px solid #ccc;
	    border-radius: 3px;
	  	-webkit-box-sizing: border-box;
	    -moz-box-sizing: border-box;
	    -ms-box-sizing: border-box;
	    -o-box-sizing: border-box;
	    box-sizing: border-box;    
	}
	footer{
		border:none;
		font-size: 0.8em;
	}
	.alert{
		padding: 0.3em;
		font-size: 0.9em;
	}
	</style>
	<!-- STYLES -->
</head>
<body>
	<img src="assets/img/logo/bpk.png" height="180" alt="Logo BPK">
	<h2>SISTEM INFORMASI DISPOSISI SURAT <br>TATA NASKAH DINAS ELEKTRONIK</h2>
	<h4>Badan Pemeriksa Keuangan RI</h4>
	<h4>Perwakilan Jawa Tengah</h4>
	<form method="post" action="<?php echo app_base.'authenticate' ?>" class="form-1">
	<div class="spinner" role="spinner"><div class="spinner-icon"></div></div>
			<!-- <div class="alert alert-danger" id="alert">
			<button type="button" class="close" style="width:10%;" onclick="$('#alert').hide()">×</button>
			Username yang anda masukkan salah                    
            </div> -->
			<p class="field">
				<input type="text" name="username" placeholder="Username" autofocus>
				<i class="fa fa-user" style="font-size:25px;"></i>
			</p>
				<p class="field">
		  		<input type="password" name="password" placeholder="Password">
		  		<i class="fa fa-lock" style="font-size:25px;"></i>
			</p>        
			<p class="submit">
		    	<button class="btn btn-primary" type="submit"><i class="fa  fa-sign-in"></i> Masuk</button>
			</p>
	</form>
	<footer>Jl. Perintis Kemerdekaan, Pudak Payung Banyumanik Semarang
	<br>Copyright &copy; 2015 TNDE - Badan Pemeriksa Keuangan RI Perwakilan Jateng
<br>
Powered by - Digimedia
</footer>
</body>
</html>