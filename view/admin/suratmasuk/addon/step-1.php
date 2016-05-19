		<div class="col-md-6">
			<table id="form" width="100%">
				<tr>
					<td width="30%">
						No. Agenda
					</td>
					<td width="2%">:</td>
					<td>
						<input name="no_agenda" type="text" value="<?php echo Lib::genNoAgenda() ?>" readonly style="background:#dfdfdf">
					</td>
				</tr>
				<tr>
					<td>
						No. Surat Masuk
					</td>
					<td>:</td>
					<td>
						<input name="no_surat_masuk" type="text" value="">
					</td>
				</tr>
				<tr>
					<td>
						Nama / Bag. Pengirim
					</td>
					<td>:</td>
					<td>
						<input name="nama_pengirim" type="text" value="">
					</td>
					<!-- <td width="10%">
						 / Sifat Surat
					</td>
					<td width="15%">
						<select>
							<option>Umum</option>
						</select>
					</td> -->
				</tr>
				<tr>
					<td>
						Perihal
					</td>
					<td>:</td>
					<td>
						<input name="perihal" type="text" value="">
					</td>
				</tr>
				<tr>
					<td>
						Sifat Surat
					</td>
					<td>:</td>
					<td>
						<!-- <input name="sifat_surat" type="text" value=""> -->
						<select name="sifat_surat">
							<option value="Umum">Umum</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Tanggal Diterima
					</td>
					<td>:</td>
					<td>
					<div class='input-group date datepicker' style="padding-left:0px; padding-right:0px;">
	                    <input type='text' name="tanggal_diterima" value="<?php echo date('d/m/Y') ?>" class="form-control" style="border-radius:2px; box-shadow:none; padding-left:none; padding-right:none;"/>
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
						<!-- <input class="datepicker" name="tanggal_diterima" type="text" value=""> -->
					</td>
				</tr>
				<tr>
					<td>
						Isi Ringkas
					</td>
					<td>:</td>
					<td>
						<textarea name="isi_ringkas" style="resize:none"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td>
						<!-- <a href="scan_suratmasuk.html">
							<button class="btn btn-success"><i class="fa"></i>Simpan</button>
						</a>
						<button class="btn btn-default"><i class="icon ion-reply"></i>Bersihkan</button> -->
					</td>
				</tr>
			</table>
		</div>
		<script type="text/javascript">
			$('.datepicker').datepicker({
				format : 'dd/mm/yyyy'
			});
		</script>