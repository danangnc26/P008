	<div class="col-md-12">
		<div class="pull-right">
			<?php include "view/component/notif.php"; ?>
		</div>
		<h3>Buat Paraf</h3>
		<hr>
	</div>
	<form method="post" action="<?php echo app_base.'save_paraf' ?>">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-4" id="par">
			<div class="sigPad col-md-12" id="smoothed-variableStrokeWidth">
			<ul class="sigNav">
			<li class="pull-left">
				<small>Silahkan buat paraf pada kotak dibawah ini.</small>
			</li>
			<li class="clearButton"><a href="#clear">Clear</a></li>
			</ul>
			<div class="sig sigWrapper" style="height:auto; widht:100%; border:1px solid #ddd">
			<div class="typed"></div>
			<canvas class="pad"  height="250"></canvas>
			<input type="hidden" name="output_paraf" class="output">
			<input type="hidden" name="width_paraf">
			<input type="hidden" name="height_paraf">
			</div>
			</div>
			</div>
			<div class="col-md-12">
				<hr>
				<div class="pull-right">
					<button class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
				</div>
			</div>
		</div>
	</div>
	</form>
	<script type="text/javascript">

		var x = $('#par').css('width');
		z = x.substring(0,3) - 45+'px';
		z2 = x.substring(0,3) - 50;

		$('.sigPad').css('width', z);
		$('.pad').attr('width', z2);

		$('input[name=width_paraf]').val(z2);
		$('input[name=height_paraf]').val($('.pad').attr('height'));

	</script>