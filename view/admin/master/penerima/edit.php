						<?php
						if($edit == null){

						}else{
						foreach ($edit as $key => $value2) {
						?>
						<form method="post" action="<?php echo app_base.'update_master_penerima' ?>">
						<h4>Edit Penerima</h4>
						<input type="hidden" name="id_penerima" value="<?php echo $value2['id_penerima'] ?>">
						<table id="form" width="100%">
							<tr>
								<td width="20%">
									Nama Penerima
								</td>
								<td width="5%">:</td>
								<td>
									<input type="text" name="nama" value="<?php echo $value2['nama'] ?>" required>
								</td>
							</tr>
							<tr>
								<td>
									Alamat Email
								</td>
								<td>:</td>
								<td>
									<input type="email" name="email" value="<?php echo $value2['email'] ?>" required>
								</td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<td>
									<button class="btn btn-success">
										<i class="fa fa-save"></i> Simpan
									</button>
									<a href="<?php echo app_base.'index_master_penerima' ?>">
										<button type="button" class="btn btn-danger">
											<i class="fa fa-arrow-left"></i> Kembali
										</button>
									</a>
								</td>
							</tr>
						</table>
						</form>
						<?php
						}}
						?>