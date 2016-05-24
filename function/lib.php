<?php

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'route.php';

Class Lib{

	public static function redirect($loc)
	{
		header('Location:'.app_base.$loc);
	}

	public static function redirectjs($src = '', $msg = '')
	{
		$r 	= '<script>';
		$r .= (!empty($msg)) ? 'alert("'.$msg.'");' : '';
		$r .= 'location.replace("'.$src.'")';
		$r .= '</script>';
		return $r;
	}

	public static function logCheck()
	{
		$logged_in = false;
		//jika session username belum dibuat, atau session username kosong
		if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {	
			//redirect ke halaman login
			header("Location:login.php");
		} else {
			$logged_in = true;
		}
		
	}

	public static function genNoAgenda()
	{
		$surat = new SuratMasuk();
		$kd = 'DSP';
		$th = date('Y');
		$rm = Lib::roman(date('m'));
		$mx = $surat->raw("SELECT max(no_agenda) as agenda FROM tbl_surat_masuk");
		if($mx == null){
			$kode = '001'.'/'.$kd.'/'.$rm.'/'.$th;
		}else{
			$num = (int)substr($mx[0]['agenda'], 0,4);
			$one = $num+1;
			$leng = strlen($one);
			// $kode = $kd.$num+1;
			// $sub = substr($mx[0]['agenda'], 0,4);
			// $one = $sub+1;
			// $leng = strlen($one);
			if($leng == 1){
			$no = '000';
			}elseif($leng == 2){
			$no = '00';
			}elseif($leng == 3){
			$no = '0';
			}elseif($leng == 4){
			$no = '';
			}
			$kode = $no.$one.'/'.$kd.'/'.$rm.'/'.$th;
		}
		return $kode;
	}

	public static function roman($integer, $upcase = true) 
	{ 
	    $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
	    $return = ''; 
	    while($integer > 0) 
	    { 
	        foreach($table as $rom=>$arb) 
	        { 
	            if($integer >= $arb) 
	            { 
	                $integer -= $arb; 
	                $return .= $rom; 
	                break; 
	            } 
	        } 
	    } 

	    return $return; 
	} 

	public static function dateInd($str = '', $s = false) {
        setlocale (LC_TIME, 'id_ID');
        if($s == true){
        	$date = strftime( "%d/%m/%Y", strtotime($str));
        }else{
        	$dt = explode('/', $str);
        	$date = strftime( "%Y-%m-%d", strtotime($dt[0].'-'.$dt[1].'-'.$dt[2]));
        }

        return $date;
    }

    public static function getNotif($o = false)
    {
    	$surat = new SuratMasuk();
    	if($o){
    		$result = $surat->raw("SELECT COUNT(id_surat_masuk) as jml FROM tbl_surat_masuk WHERE status=1 and notif_readed=0");
    	}else{
    		$result = $surat->raw("SELECT COUNT(id_surat_masuk) as jml FROM tbl_surat_masuk WHERE status=0");
    	}
    	return $result[0]['jml'];
    }

    public static function setNotifReaded()
    {
    	$surat = new SuratMasuk();
    	$surat->raw_write("UPDATE tbl_surat_masuk SET notif_readed=1 where status=1");
    }

    public static function getListPenerima()
    {
    	$penerima = new Penerima();
    	return $penerima->findAll('order by nama asc');
    }

    public static function selectedPenerima($id_surat_masuk, $id_penerima)
    {
    	$penerima = new Penerima();
    	$result = $penerima->raw("SELECT * FROM tbl_pivot_surat_penerima where id_surat_masuk='".$id_surat_masuk."' and id_penerima='".$id_penerima."'");
    	if($result != null){
    		return true;
    	}else{
    		return false;
    	}
    }

    public static function nltxt($str = '')
    {
    	$breaks = array("<br />","<br>","<br/>");  
   		// $text = str_ireplace($breaks, "\r\n", $str);
   		$text = str_ireplace($breaks, "", $str);
   		return $text;
    }

    public static function genParaf($json, $width, $height)
    {
    	// $json = $; // From Signature Pad
    	$x = mt_rand(100000,999999).'.png';
		$img = sigJsonToImage($json, ['imageSize' => [$width, $height]]);
		// header('Content-Type: image/png');
		$z = imagepng($img, 'public/paraf/'.$x);

		if($z){
			return $x;
		}

		imagedestroy($img);

		
    }

    public static function getParafKalan($id)
    {
    	$u = new Users();
    	$r = $u->getParaf($id);
    	return $r;
    }

    public static function getLampiran($id)
    {
    	$s = new SuratMasuk();
    	$result = $s->raw("SELECT * FROM tbl_lampiran where id_surat_masuk='".$id."'");
    	return $result;
    }

    public static function upload($post)
	{
		if(isset($post) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$path = dirname(__DIR__).DIRECTORY_SEPARATOR."public/lampiran/";

			if($post['lampiran_surat_masuk'] == 'upload'){

				$name = $_FILES['file_upload']['name'];
				$size = $_FILES['file_upload']['size'];
				$tmp = $_FILES['file_upload']['tmp_name'];
				if(sizeof($_FILES['file_upload']['name']) > 1){
						foreach ($_FILES['file_upload']['name'] as $key => $value) {
							$d1[] = $value;
						}
						foreach ($_FILES['file_upload']['tmp_name'] as $key2 => $value2) {
							$d2[] = $value2;
						}
						$d3 = array_combine($d1, $d2);
						foreach ($d3 as $key3 => $value3) {
							move_uploaded_file($value3, $path.$key3);
						}
				}else{
					move_uploaded_file($tmp[0], $path.$name[0]); //Stores the image in the uploads folder	
				}

			}
			
			if($post['lampiran_surat_masuk'] == 'scan'){
				// $name = 'DOC_123456.pdf';
				if(sizeof($post['file_scan']) > 1){
					foreach ($post['file_scan'] as $nv) {
						copy(sys_get_temp_dir().'/'.$nv, $path.$nv);
						$name[] = $nv;
					}

				}else{
					copy(sys_get_temp_dir().'/'.$post['file_scan'][0], $path.$post['file_scan'][0]);
					$name[] = $post['file_scan'][0];
				}
			}
			
		}
		return ['status' => true, 'nama_file' => $name];
	}

    // public static function status($i)
    // {
    // 	switch ($i) {
    // 		case '0':
    // 			$st = '<div class="lbl warning">Proses</div>';
    // 			break;
    // 		case '1':
    // 			$st = '<div class="lbl success">Selesai</div>';
    // 			break;
    		
    // 		default:
    // 			$st = '<div class="lbl warning">Proses</div>';
    // 			break;
    // 	}
    // }

}