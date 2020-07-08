<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../helper/format.php';
?>

<?php
	/**
	 *
	 */
	class employee
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public function insert_employee($data, $files){

			$emName = mysqli_real_escape_string($this->db->link, $data['emName']);
			$emLocal = mysqli_real_escape_string($this->db->link, $data['emLocal']);
			$emBorn = mysqli_real_escape_string($this->db->link, $data['emBorn']);
			$emEmail = mysqli_real_escape_string($this->db->link, $data['emEmail']);
			$emDate = mysqli_real_escape_string($this->db->link, $data['emDate']);
			$emPosition = mysqli_real_escape_string($this->db->link, $data['emPosition']);
			$emZoom = mysqli_real_escape_string($this->db->link, $data['emZoom']);
			$emSalary = mysqli_real_escape_string($this->db->link, $data['emSalary']);


			// kiem tra hinh anh va lay hinh anh cho vao folder upload
			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['emImg']['name'];
			$file_size = $_FILES['emImg']['size'];
			$file_temp = $_FILES['emImg']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;

			if($emName=="" || $emLocal=="" || $emBorn=="" || $emEmail=="" || $emDate=="" || $emPosition=="" || $emZoom=="" || $emSalary =="" || $file_name==""){
				$alert = "<span class='success'>Thông tin không được để trống</span>";
				return $alert;
			}
			else {
				$queryT = "
				SELECT  nvName FROM tbl_nhanvien WHERE nvName = '$emName'";
				$resultT = $this->db->select($queryT);
				if ($resultT != NULL) {
					$alertT = "<span class='success'>Thông tin nhân viên đã có trong CSDL</span>";
					return $alertT;
				}
				else{
					move_uploaded_file($file_temp, $uploaded_image);
					$query = "INSERT INTO tbl_nhanvien(nvName, nvLocal, nvAge, nvEmail, nvYears, nvPosition, nvZoomId, nvSalaryId, nvImg) VALUES('$emName','$emLocal','$emBorn','$emEmail','$emDate','$emPosition','$emZoom', '$emSalary', '$unique_image')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm thông tin nhân viên thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Không thể thêm thông tin nhân viên</span>";
						return $alert;
					}
				}
			}
		}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public function show_employee(){
			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang employee
			// $query = "SELECT  * FROM  tbl_nhanvien order by nvId desc ";


			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang employee category va brand
			// $query = "
			// SELECT  tbl_nhanvien.*, tbl_phong.catName, tbl_luong.brandName
			// FROM tbl_nhanvien INNER JOIN tbl_phong ON tbl_nhanvien.catId = tbl_phong.catId
			// INNER JOIN tbl_luong ON tbl_nhanvien.brandId = tbl_luong.brandId
			// order by tbl_nhanvien.nvId desc
			// ";


			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang employee category va brand
			$query = "
			SELECT  e.*, z.zoomName, s.salValue, p.positionName
			FROM tbl_nhanvien as e, tbl_phong as z, tbl_luong as s, tbl_position as p WHERE e.nvZoomId = z.zoomId
			AND e.nvSalaryId = s.salId AND e.nvPosition = p.positionId order by e.nvId desc";
			$result = $this->db->select($query);
			return $result;
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		 public function update_employee($data,$files,$id){

			$emName = mysqli_real_escape_string($this->db->link, $data['emName']);
 			$emLocal = mysqli_real_escape_string($this->db->link, $data['emLocal']);
 			$emBorn = mysqli_real_escape_string($this->db->link, $data['emBorn']);
 			$emEmail = mysqli_real_escape_string($this->db->link, $data['emEmail']);
 			$emDate = mysqli_real_escape_string($this->db->link, $data['emDate']);
 			$emPosition = mysqli_real_escape_string($this->db->link, $data['emPosition']);
 			$emZoom = mysqli_real_escape_string($this->db->link, $data['emZoom']);
 			$emSalary = mysqli_real_escape_string($this->db->link, $data['emSalary']);

			// kiem tra hinh anh va lay hinh anh cho vao folder upload
			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['emImg']['name'];
			$file_size = $_FILES['emImg']['size'];
			$file_temp = $_FILES['emImg']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;

			if($emName=="" || $emLocal=="" || $emBorn=="" || $emEmail=="" || $emDate=="" || $emPosition=="" || $emZoom=="" || $emSalary =="" ){
				$alert = "<span class='success'>Thông tin không được để trống</span>";
				return $alert;
			}else if($file_name==""){

						move_uploaded_file($file_temp, $uploaded_image);
						$query = "UPDATE tbl_nhanvien SET
						nvName = '$emName',
						nvLocal = '$emLocal',
						nvAge = '$emBorn',
						nvEmail = '$emEmail',
						nvYears = '$emDate',
						nvPosition = '$emPosition',
						nvZoomId = '$emZoom',
						nvSalaryId = '$emSalary'
						WHERE nvId = '$id' ";
						$result = $this->db->update($query);
						if($result){
							$alert = "<span class='success'>Cập nhật thông tin thành công</span>";
							return $alert;
						}else{
							$alert = "<span class='error'>Không thể cập nhật thông tin</span>";
							return $alert;
						}
			}else {
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "UPDATE tbl_nhanvien SET
				nvName = '$emName',
				nvLocal = '$emLocal',
				nvAge = '$emBorn',
				nvEmail = '$emEmail',
				nvYears = '$emDate',
				nvPosition = '$emPosition',
				nvZoomId = '$emZoom',
				nvSalaryId = '$emSalary',
				nvImg = '$unique_image'
				WHERE nvId = '$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Cập nhật thông tin thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không thể cập nhật thông tin</span>";
					return $alert;
			}
		}
	}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public function delete_employee($id){

			$query = "DELETE   FROM  tbl_nhanvien WHERE nvID = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "<span class='success'>Xóa thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không thể xóa</span>";
					return $alert;
				}
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public function getemployeebyId($id){
			$query = "SELECT  * FROM  tbl_nhanvien WHERE nvId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// Fontend

	public function getemployee_feartheres(){
		$query = "SELECT  * FROM  tbl_nhanvien WHERE type = '0'";
		$result = $this->db->select($query);
		return $result;
	}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	public function getNewemployee(){
		$query = "SELECT  * FROM  tbl_nhanvien order by nvId desc";
		$result = $this->db->select($query);
		return $result;
	}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		public function employee_detail($id){

			$query = "SELECT tbl_nhanvien.*, tbl_phong.catName, tbl_luong.brandName
			FROM tbl_nhanvien INNER JOIN tbl_phong ON tbl_nhanvien.catId = tbl_phong.catId
			INNER JOIN tbl_luong ON tbl_nhanvien.brandId = tbl_luong.brandId
			WHERE nvId = '$id'";

			$result = $this->db->select($query);
			return $result;
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		public function show_employee_by_cat($id){
			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang employee
			// $query = "SELECT  * FROM  tbl_nhanvien order by nvId desc ";


			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang employee category va brand

			$query = "SELECT tbl_nhanvien.*, tbl_phong.catName, tbl_luong.brandName
			FROM tbl_nhanvien INNER JOIN tbl_phong ON tbl_nhanvien.catId = tbl_phong.catId
			INNER JOIN tbl_luong ON tbl_nhanvien.brandId = tbl_luong.brandId
			WHERE tbl_nhanvien.catId = '$id' ORDER BY nvId DESC";

			$result = $this->db->select($query);
			return $result;
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	public function get_lasted_lock(){
		$query = "SELECT  * FROM  tbl_nhanvien WHERE brandId = '14' order by nvId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		public function get_lasted_sukoi(){
			$query = "SELECT  * FROM  tbl_nhanvien WHERE brandId = '11' order by nvId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	public function get_lasted_yak(){
		$query = "SELECT  * FROM  tbl_nhanvien WHERE brandId = '15' order by nvId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	public function get_lasted_an(){
		$query = "SELECT  * FROM  tbl_nhanvien WHERE brandId = '13' order by nvId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
}
?>
