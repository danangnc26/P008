						<form method="post" action="<?php echo app_base.'save_master_user' ?>">
						<h4>Input User</h4>
						<table id="form" width="100%">
							<tr>
								<td width="30%">
									Username
								</td>
								<td width="5%">:</td>
								<td>
									<input type="text" name="username" value="" required>
								</td>
							</tr>
							<tr>
								<td>
									Nama
								</td>
								<td>:</td>
								<td>
									<input type="text" name="nama" value="" required>
								</td>
							</tr>
							<tr>
								<td>
									Password
								</td>
								<td>:</td>
								<td>
									<div class="row">
										<div class="col-md-8">
											<input type="text" name="password" value="" required>
										</div>
										<div class="col-md-4">
											<button id="genpass" type="button" style="padding-left:22px;padding-right:22px; padding-top:3px; padding-bottom:3px" class="btn btn-primary">Generate</button>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									Bagian Pengguna
								</td>
								<td>:</td>
								<td>
									<select name="level_user" required>
										<option value="">-- Pilih Bagian Pengguna --</option>
										<option value="admin">Administrator</option>
										<option value="kalan">TU KALAN</option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<td>
										<button class="btn btn-success">
											<i class="fa fa-save"></i> Simpan
										</button>
								</td>
							</tr>
						</table>
						</form>
						<script type="text/javascript">
						$('#genpass').click(function(){
							$('input[name=password]').val(makeid());
							$('#genpass').attr('disabled', true);
						});
						function makeid()
						{
						    var text = "";
						    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

						    for( var i=0; i < 6; i++ )
						        text += possible.charAt(Math.floor(Math.random() * possible.length));

						    return text;
						}
						</script>