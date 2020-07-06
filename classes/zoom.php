<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../helper/format.php';
?>


<?php
	/**
	 *
	 */
	class zoom
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_zoom($zoomName, $zoomDesc){

			$zoomName = $this->fm->validation($zoomName);

			$zoomName = mysqli_real_escape_string($this->db->link, $zoomName);
			$zoomDesc = mysqli_real_escape_string($this->db->link, $zoomDesc);

			if(empty($zoomName) || empty($zoomDesc)){
				$alert = "<span class='success'>Các trường thông tin không được trống</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_phong(zoomName, zoomDescription) VALUES('$zoomName', '$zoomDesc')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'> Thêm phòng thành công </span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Thêm không thành công</span>";
					return $alert;
				}
			}
		}

		public function show_zoom(){
			$query = "SELECT  * FROM  tbl_phong order by zoomId desc ";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_zoom($zoomName,$zoomDesc, $id){

			$zoomName = $this->fm->validation($zoomName);

			$zoomName = mysqli_real_escape_string($this->db->link, $zoomName);
			$zoomDesc = mysqli_real_escape_string($this->db->link, $zoomDesc);

			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($zoomName) || empty($zoomDesc)){
				$alert = "<span class='success'>Các trường thông tin không được trống</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_phong SET zoomName = '$zoomName', zoomDescription = '$zoomDesc' WHERE zoomId = '$id'";
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

		public function delete_zoom($id){

			$query = "DELETE   FROM  tbl_phong WHERE zoomId = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "<span class='success'> Updtae zoom successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Update zoom not success</span>";
					return $alert;
				}

		}
		public function getzoombyId($id){
			$query = "SELECT  * FROM  tbl_phong WHERE zoomId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}



	}

?>
