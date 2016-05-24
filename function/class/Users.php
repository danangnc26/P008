<?php
class Users extends Core{

	protected $table 		= 'tbl_users'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_user';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function doLogin($input)
	{
		try {
			$username = $this->con()->real_escape_string($input['username']);
			$password = $this->con()->real_escape_string($input['password']);

			$result = $this->findAll("where username='".$username."' and password='".md5($password)."'");
			if(!empty($result) or $result != false){
				foreach ($result as $key => $value) {
					$_SESSION['username'] = $value['username'];
					$_SESSION['id_user'] = $value['id_user'];
					$_SESSION['nama']	= $value['nama'];
					$_SESSION['level_user']		= $value['level_user'];
					$_SESSION['paraf']			= $value['paraf'];
				}
				if($_SESSION['level_user'] == 'admin'){
					Lib::redirect('home');
				}elseif($_SESSION['level_user'] == 'kalan'){
					Lib::redirect('home');
				}else{
					echo "default";
				}
			}else{
				
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function checkLevel()
	{

		if(isset($_SESSION)){
			if($_SESSION['level_user'] != 'admin'){
				header("Location:login.php");
			}
		}

	}

	public function doLogout()
	{
		session_destroy();
		header("Location:login.php");
	} 

	// // // // // // // // // // // // // 

	public function getUser()
	{
		return $this->findAll();
	}

	public function store($input)
	{
		try {
			$data = [
					'username'		=> $input['username'],
					'nama'			=> $input['nama'],
					'password'		=> md5(strtolower($input['password'])),
					'level_user'	=> $input['level_user']
					];
			if($this->save($data)){
				Lib::redirect('index_master_user');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			
		}
	}

	public function deleteUser($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_master_user');
		}else{
			header($this->back);
		}
	}

	public function updatePassword($input)
	{
		try {
			$data = ['password' => md5($input['password'])];
			if($this->update($data, $this->primaryKey, $_SESSION['id_user'])){
				echo Lib::redirectjs(app_base.'logout', 'Password Anda Berhasil diubah, silahkan login ulang.');
			}else{
				header($this->back);
			}

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function saveParaf($input)
	{
		try {
			$data = [
					'paraf'		=> Lib::genParaf($input['output_paraf'], $input['width_paraf'], $input['height_paraf'])
					];
			if($this->update($data, $this->primaryKey, $_SESSION['id_user'])){
				echo Lib::redirectjs(app_base.'logout', 'Paraf anda berhasil disimpan, silahkan login ulang agar paraf dapat muncul.');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getParaf($id)
	{
		$d = $this->findBy($this->primaryKey, $id);
		return $d[0]['paraf'];
	}

}
