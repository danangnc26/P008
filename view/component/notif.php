	<?php
	Lib::logCheck();
	if($_SESSION['level_user'] == 'kalan'){
	?>
	<div>
	<span class="notif-text">
		<u><?php echo Lib::getNotif() ?> Surat untuk di disposisi</u>
	</span>
	<i style="font-size:2em" class="fa fa-envelope"></i>
	<span class="notif"><?php echo Lib::getNotif() ?></span>

	</div>
	<?php
	}else{
	?>
	<div>
	<span class="notif-text">
		<u><?php echo Lib::getNotif(true) ?> Surat proses disposisi selesai</u>
	</span>
	<i style="font-size:2em" class="fa fa-envelope"></i>
	<span class="notif"><?php echo Lib::getNotif(true) ?></span>
	</div>
	<?php
	}
	?>
