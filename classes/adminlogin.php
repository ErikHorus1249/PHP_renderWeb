<?php
	include '../lib/session.php';
	Session::checkLogin();
	include '../lib/database.php';
	include '../helper/format.php';
?>


<?php
	/**
	 *
	 */
	class adminlogin
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function login_admin($adminUser, $adminPass){

			$adminUser = $this->fm->validation($adminUser);
			$adminPass = $this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

			if(empty($adminUser) || empty($adminPass)){
				$alert = "User and pass must be not empty";// dua ra thong bao thieu thong tin dang nhap
				return $alert;
			}else{
				$query = "SELECT * FROM tbl_admin WHERE adminEmail = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
				$result = $this->db->select($query);

				if($result != false){

					$value = $result->fetch_assoc();
					// su ly session : Tao sessionId cho phien dang nhap cua Admin
					Session::set('adminlogin', true);
					Session::set('adminId', $value['adminId']);
					Session::set('adminUser', $value['adminUser']);
					Session::set('adminName', $value['adminName']);

					header('Location:index.php');
				}else{
					$alert = " ";
					return $alert;
				}
			}
		}
	}
?>
