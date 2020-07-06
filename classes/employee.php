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

			$employeeName = mysqli_real_escape_string($this->db->link, $data['employeeName']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$employee_desc = mysqli_real_escape_string($this->db->link, $data['employee_desc']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);

			// kiem tra hinh anh va lay hinh anh cho vao folder upload
			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;

			if($employeeName=="" || $brand=="" || $category=="" || $employee_desc=="" || $price=="" || $type=="" || $file_name==""){
				$alert = "<span class='success'>content must be not empty</span>";
				return $alert;
			}
			else {
				$queryT = "
				SELECT  employeeName FROM tbl_employee WHERE employeeName = '$employeeName'";
				$resultT = $this->db->select($queryT);
				if ($resultT != NULL) {
					$alertT = "<span class='success'>Can't add new employee</span>";
					return $alertT;
				}
				else{
					move_uploaded_file($file_temp, $uploaded_image);
					$query = "INSERT INTO tbl_employee(employeeName, brandId, catId, employee_desc, price, type, image) VALUES('$employeeName','$brand','$category','$employee_desc','$price','$type', '$unique_image')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'> Insert employee successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'> Insert employee not success</span>";
						return $alert;
					}
				}
			}
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public function show_employee(){
			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang employee
			// $query = "SELECT  * FROM  tbl_employee order by employeeId desc ";


			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang employee category va brand
			// $query = "
			// SELECT  tbl_employee.*, tbl_category.catName, tbl_brand.brandName
			// FROM tbl_employee INNER JOIN tbl_category ON tbl_employee.catId = tbl_category.catId
			// INNER JOIN tbl_brand ON tbl_employee.brandId = tbl_brand.brandId
			// order by tbl_employee.employeeId desc
			// ";


			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang employee category va brand
			$query = "
			SELECT  p.*, c.catName, b.brandName
			FROM tbl_employee as p, tbl_category as c, tbl_brand as b WHERE p.catId = c.catId
			AND p.brandId = b.brandId order by p.employeeId desc";
			$result = $this->db->select($query);
			return $result;
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		 public function update_employee($data,$files,$id){

			$employeeName = mysqli_real_escape_string($this->db->link, $data['employeeName']);
 			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
 			$category = mysqli_real_escape_string($this->db->link, $data['category']);
 			$employee_desc = mysqli_real_escape_string($this->db->link, $data['employee_desc']);
 			$price = mysqli_real_escape_string($this->db->link, $data['price']);
 			$type = mysqli_real_escape_string($this->db->link, $data['type']);

			// kiem tra hinh anh va lay hinh anh cho vao folder upload
			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;

			if($employeeName=="" || $brand=="" || $category=="" || $employee_desc=="" || $price=="" || $type==""){
				$alert = "<span class='success'>content must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){// neu nguoi dung chon anh
					if ($file_size > 1085000) {
						$alert = "<span class'error' >Image size should be less than 2 MB</span>";
						return $alert;
					}elseif (in_array($file_ext, $permited) === false){
						$alert = "<span class='error'>You can upload only :-".implode(', ',$permited)."</span>";
						return $alert;
					}else{
						move_uploaded_file($file_temp, $uploaded_image);
						$query = "UPDATE tbl_employee SET
						employeeName = '$employeeName',
						brandId = '$brand',
						catId = '$category',
						employee_desc = '$employee_desc',
						price = '$price',
						image = '$unique_image',
						type = '$type'
						WHERE employeeId = '$id'";
						$result = $this->db->update($query);
						if($result){
							$alert = "<span class='success'> Insert employee successfully</span>";
							return $alert;
						}else{
							$alert = "<span class='error'> Insert employee not success</span>";
							return $alert;
						}
					}
				}else{
					$query = "UPDATE tbl_employee SET
					employeeName = '$employeeName',
					brandId = '$brand',
					catId = '$category',
					employee_desc = '$employee_desc',
					price = '$price',
					type = '$type'
					WHERE employeeId = '$id'";
					$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'> Insert employee successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'> Insert employee not success</span>";
						return $alert;
					}
				}
			}
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public function delete_employee($id){

			$query = "DELETE   FROM  tbl_employee WHERE employeeID = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "<span class='success'>employee war deleted successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>employee warn't deleted successfully</span>";
					return $alert;
				}
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public function getemployeebyId($id){
			$query = "SELECT  * FROM  tbl_employee WHERE employeeID = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// Fontend

	public function getemployee_feartheres(){
		$query = "SELECT  * FROM  tbl_employee WHERE type = '0'";
		$result = $this->db->select($query);
		return $result;
	}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	public function getNewemployee(){
		$query = "SELECT  * FROM  tbl_employee order by employeeId desc";
		$result = $this->db->select($query);
		return $result;
	}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		public function employee_detail($id){

			$query = "SELECT tbl_employee.*, tbl_category.catName, tbl_brand.brandName
			FROM tbl_employee INNER JOIN tbl_category ON tbl_employee.catId = tbl_category.catId
			INNER JOIN tbl_brand ON tbl_employee.brandId = tbl_brand.brandId
			WHERE employeeId = '$id'";

			$result = $this->db->select($query);
			return $result;
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		public function show_employee_by_cat($id){
			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang employee
			// $query = "SELECT  * FROM  tbl_employee order by employeeId desc ";


			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang employee category va brand

			$query = "SELECT tbl_employee.*, tbl_category.catName, tbl_brand.brandName
			FROM tbl_employee INNER JOIN tbl_category ON tbl_employee.catId = tbl_category.catId
			INNER JOIN tbl_brand ON tbl_employee.brandId = tbl_brand.brandId
			WHERE tbl_employee.catId = '$id' ORDER BY employeeId DESC";

			$result = $this->db->select($query);
			return $result;
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	public function get_lasted_lock(){
		$query = "SELECT  * FROM  tbl_employee WHERE brandId = '14' order by employeeId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		public function get_lasted_sukoi(){
			$query = "SELECT  * FROM  tbl_employee WHERE brandId = '11' order by employeeId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	public function get_lasted_yak(){
		$query = "SELECT  * FROM  tbl_employee WHERE brandId = '15' order by employeeId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	public function get_lasted_an(){
		$query = "SELECT  * FROM  tbl_employee WHERE brandId = '13' order by employeeId desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
}
?>
