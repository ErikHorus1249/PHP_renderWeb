<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../helper/format.php';
?>


<?php
	/**
	 *
	 */
	class salary
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		// public function insert_salary($salValue, $salDesc){
		//
		// 	$salValue = $this->fm->validation($salValue);
		//
		// 	$salValue = mysqli_real_escape_string($this->db->link, $salValue);
		// 	$salDesc = mysqli_real_escape_string($this->db->link, $salDesc);
		//
		// 	if(empty($salValue) || empty($salDesc)){
		// 		$alert = "<span class='success'>Các trường thông tin không được trống</span>";
		// 		return $alert;
		// 	}else{
		// 		$query = "INSERT INTO tbl_luong(salaryName, salaryDescription) VALUES('$salValue', '$salDesc')";
		// 		$result = $this->db->insert($query);
		// 		if($result){
		// 			$alert = "<span class='success'> Thêm phòng thành công </span>";
		// 			return $alert;
		// 		}else{
		// 			$alert = "<span class='error'> Thêm không thành công</span>";
		// 			return $alert;
		// 		}
		// 	}
		// }

		public function show_salary(){
			$query = "SELECT  * FROM  tbl_luong order by salId desc ";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_salary($salValue,$salDesc, $id){

			$salValue = $this->fm->validation($salValue);

			$salValue = mysqli_real_escape_string($this->db->link, $salValue);
			$salDesc = mysqli_real_escape_string($this->db->link, $salDesc);

			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($salValue) || empty($salDesc)){
				$alert = "<span class='success'>Các trường thông tin không được trống</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_luong SET salValue = '$salValue', salDescription	 = '$salDesc' WHERE salId = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Sửa thông tin thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Sửa thông tin không thành công</span>";
					return $alert;
				}
			}
		}

		public function delete_salary($id){

			$query = "DELETE   FROM  tbl_luong WHERE salId = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "<span class='success'> Updtae salary successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Update salary not success</span>";
					return $alert;
				}

		}
		public function getsalarybyId($id){
			$query = "SELECT  * FROM  tbl_luong WHERE salId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}



	}

?>
