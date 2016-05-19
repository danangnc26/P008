	<div class="col-md-12">
		<div class="pull-right">
			<?php include "view/component/notif.php" ?>
		</div>
		<h3>Input Agenda Surat Masuk</h3>
		<hr>
	</div>
	<div class="col-md-12">
		<ol class="progtrckr" data-progtrckr-steps="3">
		    <li id="line-step-1" class="progtrckr-current">Input Surat Masuk</li>
		    <li id="line-step-2" class="progtrckr-todo">Scan Dokumen</li>
		    <!-- <li id="line-step-" class="progtrckr-todo">Disposisi</li> -->
		    <li id="line-step-3" class="progtrckr-todo">Kirim Surat</li>
		</ol>
	</div>
	<form method="post" action="<?php echo app_base.'save_suratmasuk' ?>">
		<div id="surat-step-1">
			<?php include "view/admin/suratmasuk/addon/step-1.php" ?>
		</div>
		<div id="surat-step-2" style="display:none">
			<?php include "view/admin/suratmasuk/addon/step-2.php" ?>
		</div>
		<div id="surat-step-3" style="display:none">
			<?php include "view/admin/suratmasuk/addon/step-3.php" ?>
		</div>
		<div class="col-md-12">
			<hr>
			<div class="pull-right">
					<div class="button-next-1">
						<a href="<?php echo app_base.'index_suratmasuk' ?>">
							<button type="button" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</button>
						</a>
						<button type="button" id="next-1" class="btn btn-success">Lanjutkan <i class="fa fa-arrow-right"></i></button>
					</div>
					<div class="button-next-2" style="display:none">
						<button type="button" id="back-1" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</button>
						<button type="button" id="next-2" class="btn btn-success">Lanjutkan <i class="fa fa-arrow-right"></i></button>
					</div>
					<div class="button-next-3" style="display:none">
						<button type="button" id="back-2" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</button>
						<button id="next-3" class="btn btn-success">Lanjutkan <i class="fa fa-arrow-right"></i></button>
					</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">
		$('button#next-1').click(function(){
			$('#surat-step-3').hide();
			$('#surat-step-2').show();
			$('#surat-step-1').hide();
			$('li#line-step-1').attr('class', 'progtrckr-done');
			$('li#line-step-2').attr('class', 'progtrckr-current');
			$('li#line-step-3').attr('class', 'progtrckr-todo');
			$('.button-next-2').show();
			$('.button-next-1').hide();
			$('.button-next-3').hide();
			// $('button#next-1').attr('id', 'next-2');

			$('td#text-no_agenda').text($('input[name=no_agenda]').val());
			$('td#text-no_surat_masuk').text($('input[name=no_surat_masuk]').val());
			$('td#text-nama_pengirim').text($('input[name=nama_pengirim]').val());
			$('td#text-perihal').text($('input[name=perihal]').val());
			$('td#text-sifat_surat').text($('select[name=sifat_surat] option:selected').val());
			$('td#text-tanggal_diterima').text($('input[name=tanggal_diterima]').val());
			$('td#text-isi_ringkas').text($('textarea[name=isi_ringkas]').val());
		});
		$('button#back-1').click(function(){
			$('#surat-step-1').show();
			$('#surat-step-2').hide();
			$('#surat-step-3').hide();
			$('li#line-step-1').attr('class', 'progtrckr-current');
			$('li#line-step-2').attr('class', 'progtrckr-todo');
			$('li#line-step-3').attr('class', 'progtrckr-todo');
			$('.button-next-1').show();
			$('.button-next-2').hide();
			$('.button-next-3').hide();
		});



		$('button#next-2').click(function(){
			$('#surat-step-3').show();
			$('#surat-step-2').hide();
			$('#surat-step-1').hide();
			$('li#line-step-1').attr('class', 'progtrckr-done');
			$('li#line-step-2').attr('class', 'progtrckr-done');
			$('li#line-step-3').attr('class', 'progtrckr-current');
			// $('button#next-2').attr('id', 'next-3');
			$('.button-next-3').show();
			$('.button-next-2').hide();
			$('.button-next-1').hide();

			$('td#text2-no_agenda').text($('input[name=no_agenda]').val());
			$('td#text2-no_surat_masuk').text($('input[name=no_surat_masuk]').val());
			$('td#text2-nama_pengirim').text($('input[name=nama_pengirim]').val());
			$('td#text2-perihal').text($('input[name=perihal]').val());
			$('td#text2-sifat_surat').text($('select[name=sifat_surat] option:selected').val());
			$('td#text2-tanggal_diterima').text($('input[name=tanggal_diterima]').val());
			$('td#text2-isi_ringkas').text($('textarea[name=isi_ringkas]').val());
		});
		$('button#back-2').click(function(){
			$('#surat-step-1').hide();
			$('#surat-step-2').show();
			$('#surat-step-3').hide();
			$('li#line-step-1').attr('class', 'progtrckr-done');
			$('li#line-step-2').attr('class', 'progtrckr-current');
			$('li#line-step-3').attr('class', 'progtrckr-todo');
			$('.button-next-2').show();
			$('.button-next-1').hide();
			$('.button-next-3').hide();
		});


	</script>
