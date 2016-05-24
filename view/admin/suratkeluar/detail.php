	<div class="col-md-12">
		<div class="pull-right">
			<?php include "view/component/notif.php"; ?>
		</div>
		<h3>Detail Surat Keluar</h3>
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
						<td style="vertical-align:top">
							Isi Ringkas
						</td>
						<td style="vertical-align:top">:</td>
						<td style="vertical-align:top">
							<?php echo $value['isi_ringkas'] ?>
						</td>
					</tr>
					<tr>
						<td style="vertical-align:top">
							Lampiran Surat
						</td>
						<td style="vertical-align:top">:</td>
						<td style="vertical-align:top">
							<a href="#">
								<ol>
								<?php
								if(Lib::getLampiran($value['id_surat_masuk']) == null){

								}else{
									foreach (Lib::getLampiran($value['id_surat_masuk']) as $key => $vl) {
								?>
								<a target="_blank" href="<?php echo base_url.'public/lampiran/'.$vl['nama_lampiran'] ?>">
									<li style="margin-left:18px;"><i class="fa  fa-paperclip"></i> <?php echo $vl['nama_lampiran'] ?></li>
								</a>
								<?php
								}}
								?>
								</ol>
							</a>
						</td>
					</tr>
					<tr>
						<td style="vertical-align:top">
							Instruksi
						</td>
						<td style="vertical-align:top">:</td>
						<td>
							<?php echo $value['instruksi']; ?>
						</td>
					</tr>
					<tr>
						<td style="vertical-align:top">
							Penerima
						</td>
						<td style="vertical-align:top">:</td>
						<td>
							<?php
							if(Lib::getListPenerima() == null){

							}else{
							foreach (Lib::getListPenerima() as $key2 => $value2) {
							?>
								<?php echo (Lib::selectedPenerima($value['id_surat_masuk'], $value2['id_penerima']) == true) ? '<li>'.$value2['nama'].'</li>' : '' ?>
							<?php
							}}
							?>
						</td>
					</tr>
					<tr>
						<td>
							Lembar Disposisi
						</td>
						<td>
							:
						</td>
						<td>
							<a target="_blank" href="<?php echo base_url.'public/lembar_disposisi/'.str_replace('/', '_', $value['no_agenda']).'.pdf' ?>">
								<i class="fa  fa-paperclip"></i> <?php echo str_replace('/', '_', $value['no_agenda']) ?>.pdf
							</a>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-md-12">
				<hr>
				<div class="pull-right">
					<a href="<?php echo app_base.'index_suratkeluar' ?>">
						<button type="button" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</button>
					</a>
				</div>
			</div>
		</div>
	</div>
	</form>
	<?php
	}}
	?>