	<div class="col-md-12">
		<div class="pull-right">
			<?php include "view/component/notif.php"; ?>
		</div>
		<h3>Halaman Disposisi</h3>
		<hr>
	</div>
	<?php
	if($data == null){

	}else{
	foreach ($data as $key => $value) {
	?>
	<form method="post" action="<?php echo app_base.'send_disposisi' ?>">
	<input type="hidden" name="id_surat_masuk" value="<?php echo $value['id_surat_masuk'] ?>">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6">
			<h4>Preview Surat Masuk</h4>
				<table id="form" width="100%">
					<tr>
						<td width="30%">
							No. Agenda
						</td>
						<td width="2%">:</td>
						<td>
						<?php echo $value['no_agenda'] ?>
						</td>
					</tr>
					<tr>
						<td>
							No. Surat Masuk
						</td>
						<td>:</td>
						<td>
							<?php echo $value['no_surat_masuk'] ?>
						</td>
					</tr>
					<tr>
						<td>
							Nama / Bag. Pengirim
						</td>
						<td>:</td>
						<td>
							<?php echo $value['nama_pengirim'] ?>
						</td>
					</tr>
					<tr>
						<td>
							Perihal
						</td>
						<td>:</td>
						<td>
							<?php echo $value['perihal'] ?>
						</td>
					</tr>
					<tr>
						<td>
							Sifat Surat
						</td>
						<td>:</td>
						<td>
							<?php echo $value['sifat_surat'] ?>
						</td>
					</tr>
					<tr>
						<td>
							Tanggal Diterima
						</td>
						<td>:</td>
						<td>
							<?php echo Lib::dateInd($value['tanggal_diterima'], true) ?>
						</td>
					</tr>
					<tr>
						<td>
							Isi Ringkas
						</td>
						<td>:</td>
						<td>
							<?php echo $value['isi_ringkas'] ?>
						</td>
					</tr>
					<tr>
						<td>
							Lampiran Surat
						</td>
						<td>:</td>
						<td>
							<a href="#">
								<i class="fa  fa-paperclip"></i> Lampiran.pdf
							</a>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
			<h4>Instruksi Surat Masuk</h4>
			<textarea name="instruksi" rows="4" placeholder="Tulis Instruksi Surat Masuk"><?php echo Lib::nltxt($value['instruksi']); ?></textarea>
			<h4>Kirim Disposisi</h4>
			<div class="row">
					<?php
					if(Lib::getListPenerima() == null){

					}else{
					foreach (Lib::getListPenerima() as $key2 => $value2) {
					?>
					<div class="col-md-4">
						<label style="font-weight:normal">
							<input <?php echo (Lib::selectedPenerima($value['id_surat_masuk'], $value2['id_penerima']) == true) ? 'checked' : '' ?> type="checkbox" name="kirim_disposisi[]" value="<?php echo $value2['id_penerima'] ?>" /> <?php echo $value2['nama'] ?>
						</label>
					</div>
					<?php
					}}
					?>
			</div>
			<h4>Paraf</h4>
			<div class="row">
				<div class="col-md-2">
					<label style="font-weight:normal">
						<input <?php echo ($value['paraf'] == '1') ? 'checked' : '' ?> type="radio" name="paraf" value="1" /> Ya
					</label>
				</div>
				<div class="col-md-3">
					<label style="font-weight:normal">
						<input <?php echo ($value['paraf'] == '0') ? 'checked' : '' ?> type="radio" name="paraf" value="0" /> Tidak
					</label>
				</div>
			</div>
			</div>
			<div class="col-md-12">
				<hr>
				<div class="pull-right">
					<a href="<?php echo app_base.'index_disposisi' ?>">
						<button type="button" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</button>
					</a>
					<button class="btn btn-success"><i class="fa fa-send"></i> Kirim Disposisi</button>
				</div>
			</div>
		</div>
	</div>
	</form>
	<?php
	}}
	?>