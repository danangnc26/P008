<?php
session_start();
ob_start();
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'bootstrap.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';
require dirname(__FILE__).DIRECTORY_SEPARATOR.'class/plugin/signature/signature-to-image.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/Config.php';

function route($page)
{
	$p  = $_POST;
	$user = new Users();
	$suratmasuk = new SuratMasuk();
	$penerima = new Penerima();

	switch ($page) {
		case 'login':
			# code...
			break;
		case 'authenticate':
			$user->doLogin($p);
			break;
		case 'logout':
			$user->doLogout();
			break;

		#PENERIMA
		case 'home':
				include "view/admin/home.php";
			break;
		case 'index_master_penerima':
				$data = $penerima->index();
				include "view/admin/master/penerima/index.php";
			break;
		case 'create_master_penerima':
			# code...
			break;
		case 'save_master_penerima':
				$penerima->store($p);
			break;
		case 'edit_master_penerima':
				$data = $penerima->index();
				include "view/admin/master/penerima/index.php";
			break;
		case 'update_master_penerima':
				$penerima->updatePenerima($p);
			break;
		case 'delete_master_penerima':
				$penerima->deletePenerima($_GET['id_penerima']);
			break;

		#USER
		case 'index_master_user':
				$data = $user->getUser();
				include "view/admin/master/user/index.php";
			break;
		case 'create_master_user':
			# code...
			break;
		case 'save_master_user':
				$user->store($p);
			break;
		case 'edit_master_user':
			# code...
			break;
		case 'update_master_user':
			# code...
			break;
		case 'delete_master_user':
				$user->deleteUser($_GET['id_user']);
			break;


		#SURAT MASUK
		case 'index_suratmasuk':
				$data = $suratmasuk->indexSuratMasuk();
				include "view/admin/suratmasuk/index.php";
			break;
		case 'create_suratmasuk':
				include "view/admin/suratmasuk/create.php";
			break;
		case 'save_suratmasuk':
				$suratmasuk->saveSuratMasuk($p);
				// var_dump(Lib::upload($p));
			break;
		case 'delete_suratmasuk':
				$suratmasuk->deleteSuratMasuk($p);
			break;

		#SURAT KELUAR
		case 'index_suratkeluar':
				Lib::setNotifReaded();
				$data = $suratmasuk->indexSuratKeluar();
				include "view/admin/suratkeluar/index.php";
			break;
		case 'detail_suratkeluar':
				$data = $suratmasuk->findSuratMasuk($_GET['id_surat']);
				include "view/admin/suratkeluar/detail.php";
			break;


		#KALAN
		#Disposisi
		case 'index_disposisi':
				// $data = $suratmasuk->indexSuratMasukKalan();
				if(!isset($_GET['status'])){
					$data =	$suratmasuk->indexSuratMasukKalanByStatus('0');
				}else{
					$data =	$suratmasuk->indexSuratMasukKalanByStatus($_GET['status']);
				}
				include "view/kalan/disposisi/index.php";
			break;
		case 'disposisi':
				$data = $suratmasuk->findSuratMasuk($_GET['id_surat_masuk']);
				include "view/kalan/disposisi/disposisi.php";
			break;
		case 'send_disposisi':
				$suratmasuk->sendDisposisi($p);
			break;

		#LAPORAN
		case 'laporan':
				if(isset($_GET['tanggal_dari']) && isset($_GET['tanggal_sampai'])){
					$data = $suratmasuk->getLaporan($_GET['tanggal_dari'], $_GET['tanggal_sampai']);
				}else{
					$data = null;
				}
				include "view/admin/laporan/index.php";
			break;

		#PARAF
		case 'paraf':
				include "view/admin/paraf/index.php";
			break;
		case 'save_paraf':
				$user->saveParaf($p);
			// echo Lib::genParaf($p['output_paraf'], $p['width_paraf'], $p['height_paraf']);
			break;

		case 'get_real_notif':
				
			break;

		#PASSWORD
		case 'ubah_password':
				include "view/component/ubah_password.php";
			break;
		case 'save_password':
				$user->updatePassword($p);
			break;

		case 'main' :
				default : 
				Lib::redirect('home');
			break;
	}
}

define("index", "index.php");
define("base_url", server_name()."/".Config::getConfig('rootdir'));
define("app_base", index."?page=");

function server_name()
{
	  $serverport = (isset($_SERVER['SERVER_PORT'])) ? ':'.$_SERVER['SERVER_PORT'] : '';
	  return sprintf(
	    "%s://%s".$serverport,
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME'],
	    $_SERVER['REQUEST_URI']
	  );
}
