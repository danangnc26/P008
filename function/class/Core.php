<?php
include_once dirname(__DIR__).DIRECTORY_SEPARATOR.'..\config\Database.php';
Class Core{

	protected $_tableName;
	
	function __construct($tableName){
		$this->_tableName = $tableName;
	}

	public function con(){
		return Database::open();
	}
	
	public function cls(){
		Database::close();
	}

	public function save(array $data){
		$sql = "INSERT INTO `".$this->_tableName."` SET";
		foreach($data as $field => $value){
			$sql .= " `".$field."`='".mysql_real_escape_string($value)."',";
		}
		$sql = rtrim($sql, ',');
		if ($this->con()->query($sql) === TRUE) {
			
		    return true;

		} else {

			throw new Exception('Gagal menyimpan data ke table '.$this->_tableName.': '.mysql_error());
		    // return false;

		}
	}
	
	public function update(array $data, $where = '', $id = ''){
		$sql = "UPDATE `".$this->_tableName."` SET";
		foreach($data as $field => $value){
			$sql .= " `".$field."`='".mysql_real_escape_string($value)."',";
		}
		$sql = rtrim($sql, ',');
		if($where){
			$sql .= " WHERE ".$where;
			if($id){
				$sql .= "=".$id;
			}
		}
		if ($this->con()->query($sql) === TRUE) {
			
		    return true;

		} else {

			throw new Exception('Gagal mengupdate data table '.$this->_tableName.': '.mysql_error());

		}
	}
	
	public function updateBy($field, $value, array $data){
		$where = "`".$field."`='".mysql_real_escape_string($value)."'";
		$this->update($data, $where);
	}
	
	public function delete($where = '', $id = ''){
		$sql = "DELETE FROM `".$this->_tableName."`";
		if($where && $id){
			$sql .= " WHERE ".$where;
			if($id){
				$sql .= "=".$id;
			}
		}
		if ($this->con()->query($sql) === TRUE) {

			return true;

		}else{

			throw new Exception('Gagal menghapus data dari table '.$this->_tableName.': '.mysql_error());

		}
	}
	
	public function deleteBy($field, $value){
		$where = "`".$field."`='".mysql_real_escape_string($value)."'";
		$this->delete($where);
	}
	
	public function findAll($prop = ''){
		$sql = "SELECT * FROM `".$this->_tableName."`";
		if($prop){
			$sql .= " ".$prop;
		}
		$result = $this->con()->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc())
		        $data[] = $row;
		        return $data;
		} else {
		    return null;
		}
	}
	
	public function findBy($field, $value, $prop = ''){
		$sql = "SELECT * FROM `".$this->_tableName."`";
		$sql .=" WHERE `".$field."`='".mysql_real_escape_string($value)."'";
		if($prop){
			$sql .= " ".$prop;
		}

		$result = $this->con()->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc())
		        $data[] = $row;
		        return $data;
		} else {
		    return null;
		}
	}

	// FUNGSI UTAMA PENGAMBILAN DATA DARI SUATU TABEL DENGAN PERINTAH SQL YANG SUDAH DITENTUKAN SEBELUMNYA
	public function raw($state)
	{

		$sql = "$state";

		$result = $this->con()->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) 

		        $data[] = $row;

		        return $data;
		    

		} else {

		    return false;

		}

	}

	// FUNGSI UTAMA PENULISAN DATA KE DALAM TABEL DENGAN PERINTAH SQL YANG SUDAH DITENTUKAN SEBELUMNYA
	public function raw_write($query)
	{

		$sql = "$query";

		if ($this->con()->query($sql) === TRUE) {
		    
			return true;

		} else {
		    
			return false;

		}

	}

	public function close()
	{
		// $this->free_result();
	}

}