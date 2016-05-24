<?php

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'route.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';


if($_SESSION['level_user'] == 'kalan'){
	$d = Lib::getNotif();
}else{
	$d = Lib::getNotif(true);
}
echo $d;