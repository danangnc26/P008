<?php
class Penerima extends Core{

	protected $table 		= 'tbl_penerima'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_penerima';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function index()
	{
		return $this->findAll();
	}

	public function edit($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function store($input)
	{
		try {
			$data = ['nama' => $input['nama'], 'email' => $input['email']];

			if($this->save($data)){
				Lib::redirect('index_master_penerima');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updatePenerima($input)
	{
		try {
			$data = ['nama' => $input['nama'], 'email' => $input['email']];

			if($this->update($data, $this->primaryKey, $input['id_penerima'])){
				Lib::redirect('index_master_penerima');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deletePenerima($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_master_penerima');
		}else{
			header($this->back);
		}
	}

	

}