			<div class="col-md-12">
				<div class="pull-right">
					<?php include "view/component/notif.php" ?>
				</div>
				<h3>Laporan Surat Keluar</h3>
				<hr class="two"></hr>
			</div>
			<div class="col-md-12">
			<form method="get" action="<?php echo app_base.'laporan' ?>">
				<input type="hidden" name="page" value="laporan">
				<table>
					<tr>
						<td>
							Dari tanggal (dd/mm/yyyy)	
						</td>
						<td>
							:
						</td>
						<td>
							<div class='input-group date datepicker' style="padding-left:0px; padding-right:0px;">
			                    <input type='text' name="tanggal_dari" value="<?php echo (isset($_GET['tanggal_dari'])) ? $_GET['tanggal_dari'] : date('d/m/Y') ?>" class="form-control" style="border-radius:2px; box-shadow:none; padding-left:none; padding-right:none;"/>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
						</td>
						<td>
							-
						</td>
						<td>
							<div class='input-group date datepicker' style="padding-left:0px; padding-right:0px;">
			                    <input type='text' name="tanggal_sampai" value="<?php echo (isset($_GET['tanggal_sampai'])) ? $_GET['tanggal_sampai'] : date('d/m/Y') ?>" class="form-control" style="border-radius:2px; box-shadow:none; padding-left:none; padding-right:none;"/>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
						</td>
						<td>
							<button name="opt" value="show" class="btn btn-success"><i class="fa fa-eye"></i> Tampilkan</button>
							<!-- <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download PDF</button> -->
						</td>
					</tr>
				</table>
				<?php
				if($data == null){

				}else{
				?>
				<table class="master" border="1" width="100%">
					<thead>
						<tr>
							<th width="2%">No.</th>
							<th width="15%">No. Agenda</th>
							<th>No. Surat</th>
							<th>Perihal</th>
							<th width="15%">Lembar Disposisi</th>
						</tr>
					</thead>
					<tbody>
					<?php
					foreach ($data as $key => $value) {
					?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['no_agenda'] ?></td>
							<td><?php echo $value['no_surat_masuk'] ?></td>
							<td><?php echo $value['perihal'] ?></td>
							<td>
								<a target="_blank" href="<?php echo base_url.'public/lembar_disposisi/'.str_replace('/', '_', $value['no_agenda']).'.pdf' ?>">
									<i class="fa  fa-paperclip"></i> <?php echo str_replace('/', '_', $value['no_agenda']) ?>.pdf
								</a>
							</td>
						</tr>
					<?php
					}
					?>
					</tbody>
				</table>
				<?php
				}
				?>
			</form>
			</div>
			<script type="text/javascript">
				$('.datepicker').datepicker({
					format : 'dd/mm/yyyy'
				});
			</script>