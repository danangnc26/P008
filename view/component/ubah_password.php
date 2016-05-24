			<div class="col-md-12">
				<div class="pull-right">
					<?php include "view/component/notif.php" ?>
				</div>
				<h3>Ubah Password</h3>
				<hr class="two"></hr>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<form method="post" action="<?php echo app_base.'save_password' ?>">
									<div class="form-group">
										<label>Password Baru : </label>
										<input id="password1" type="password" name="password" value="" required>
									</div>
									<div class="form-group">
										<label>Konfirmasi Password Baru : </label>
										<input id="password2" type="password" name="password2" value="" required>
									</div>
									<div class="form-group">
										<button class="btn btn-success">
											<i class="fa fa-save"></i> Simpan
										</button>
									</div>
						
						</form>
					</div>
				</div>
			</div>
			<script type="text/javascript">
			$('#password2').change(function(){
				validatePassword();
			});
			// window.onload = function () {
			// 	document.getElementById("password1").onchange = validatePassword;
			// 	document.getElementById("password2").onchange = validatePassword;
			// }
			function validatePassword(){
			var pass2=$("#password2").val();
			var pass1=$("#password1").val();
			if(pass1!=pass2){
				// document.getElementById("password2").setCustomValidity("Passwords Don't Match");
				alert('Password tidak sama, silahkan ulangi lagi.');
			}}
			</script>