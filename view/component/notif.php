	<?php
	Lib::logCheck();
	if($_SESSION['level_user'] == 'kalan'){
	?>
	<a href="<?php echo app_base.'index_disposisi' ?>">
		<div>
		<span class="notif-text">
			<u><span class="ntf-c"><?php echo Lib::getNotif() ?></span> Surat untuk di disposisi</u>
		</span>
		<i style="font-size:2em" class="fa fa-envelope"></i>
		<span class="notif"><?php echo Lib::getNotif() ?></span>
		</div>
	</a>
	<?php
	}else{
	?>
	<a href="<?php echo app_base.'index_suratkeluar' ?>">
		<div>
		<span class="notif-text">
			<u><span class="ntf-c"><?php echo Lib::getNotif(true) ?></span> Surat proses disposisi selesai</u>
		</span>
		<i style="font-size:2em" class="fa fa-envelope"></i>
		<span class="notif"><?php echo Lib::getNotif(true) ?></span>
		</div>
	</a>
	<?php
	}
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){ getRealNotif() }, 3000);
		});

		function getRealNotif()
		{
			$.get("<?php echo base_url.'function/notif.php' ?>", function(data){
				$('.notif').text(data);
				$('.ntf-c').text(data);
			});
		}
	</script>