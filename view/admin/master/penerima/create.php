						<form method="post" action="<?php echo app_base.'save_master_penerima' ?>">
						<h4>Input Penerima</h4>
						<table id="form" width="100%">
							<tr>
								<td width="20%">
									Nama Penerima
								</td>
								<td width="5%">:</td>
								<td>
									<input type="text" name="nama" value="" required>
								</td>
							</tr>
							<tr>
								<td>
									Alamat Email
								</td>
								<td>:</td>
								<td>
									<input type="email" name="email" value="" required>
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