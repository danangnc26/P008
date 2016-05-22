<?php
class SuratMasuk extends Core{

	protected $table 		= 'tbl_surat_masuk'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_surat_masuk';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function indexSuratMasuk()
	{
		return $this->findAll('where status=0');
	}

	public function findSuratMasuk($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function indexSuratMasukKalan()
	{
		return $this->findAll();
	}

	public function saveSuratMasuk($input)
	{
		try {
			$data = [
					'no_agenda'			 => $input['no_agenda'],
					'no_surat_masuk'	 => $input['no_surat_masuk'],
					'nama_pengirim'		 => $input['nama_pengirim'],
					'perihal'			 => $input['perihal'],
					'isi_ringkas'		 => $input['isi_ringkas'],
					'tanggal_diterima'	 => Lib::dateInd($input['tanggal_diterima']),
					'sifat_surat'		 => $input['sifat_surat']
					];
			if($this->save($data)){
				echo '<script>if(confirm("Data berhasil disimpan, input lagi?")){location.replace("'.app_base.'create_suratmasuk")}else{location.replace("'.app_base.'index_suratmasuk")}</script>';
				// Lib::redirect('index_suratmasuk');
			}else{
				echo "gagal";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteSuratMasuk($input)
	{
		$delete = $this->raw_write("DELETE FROM tbl_surat_masuk WHERE id_surat_masuk IN ('".implode("','", $input['chk'])."')");
		if($delete){
			Lib::redirect('index_suratmasuk');
		}else{
			header($this->back);
		}
	}


	#DISPOSISI

	public function sendDisposisi($input)
	{
		try {
			$data = [
					'instruksi'		=> nl2br($input['instruksi']),
					'paraf'			=> $input['paraf'],
					'id_kalan'		=> $_SESSION['id_user'],
					'status'		=> '1'
					];
			if($this->update($data, $this->primaryKey, $input['id_surat_masuk'])){
				if(isset($input['kirim_disposisi']) || $input['kirim_disposisi'] != 0){					
					$dl = $this->raw_write("DELETE FROM tbl_pivot_surat_penerima where id_surat_masuk='".$input['id_surat_masuk']."'");
					if($dl){
						foreach ($input['kirim_disposisi'] as $k2 => $v2) {
						$d2[] = "('".$input['id_surat_masuk']."', '".$v2."')";
						}
						$mins = $this->raw_write("INSERT INTO tbl_pivot_surat_penerima (id_surat_masuk, id_penerima) VALUES ".implode(',', $d2));
						if($mins){
							$pdf_url = base_url.'function/printout.php?id_surat='.$input['id_surat_masuk'];
							file_get_contents($pdf_url);
							$send_email = base_url.'function/sendemail.php?id_surat='.$input['id_surat_masuk'];
							file_get_contents($send_email);
							Lib::redirect('index_disposisi');
						}else{
							header($this->back);		
						}
					}else{
						header($this->back);		
					}
				}else{
					Lib::redirect('index_disposisi');
				}
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function indexSuratKeluar()
	{
		return $this->findAll('where status=1');
	}

}