<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../helper/format.php';
?>


<?php
	/**
	 *
	 */
	class position
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		// public function insert_position($posName, $salDesc){
		//
		// 	$posName = $this->fm->validation($posName);
		//
		// 	$posName = mysqli_real_escape_string($this->db->link, $posName);
		// 	$salDesc = mysqli_real_escape_string($this->db->link, $salDesc);
		//
		// 	if(empty($posName) || empty($salDesc)){
		// 		$alert = "<span class='success'>Các trường thông tin không được trống</span>";
		// 		return $alert;
		// 	}else{
		// 		$query = "INSERT INTO tbl_position(positionName, positionDescription) VALUES('$posName', '$salDesc')";
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

		public function show_position(){
			$query = "SELECT  * FROM  tbl_position order by positionId desc ";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_position($posName, $id){

			$posName = $this->fm->validation($posName);

			$posName = mysqli_real_escape_string($this->db->link, $posName);

			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($posName)){
				$alert = "<span class='success'>Các trường thông tin không được trống</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_position SET positionName = '$posName' WHERE 	positionId = '$id'";
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

		public function delete_position($id){

			$query = "DELETE   FROM  tbl_position WHERE positionId = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "<span class='success'> Updtae position successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Update position not success</span>";
					return $alert;
				}

		}
		public function getpositionbyId($id){
			$query = "SELECT  * FROM  tbl_position WHERE positionId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}



	}

?>
