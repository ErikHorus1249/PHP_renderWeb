<?php
	include '../classes/adminlogin.php';
?>
<?php
	$class = new adminlogin();
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$adminUser = $_POST['adminUser'];
		$adminPass = $_POST['adminPass'];

		$login_check = $class->login_admin($adminUser, $adminPass);
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Đăng nhập</title>
</head>
<body>
    <!-- <div class="bg">
        <img src="./img/bg.png" alt="">
    </div> -->
    <form class="box" action="login.php" method="post">
    <span><?php
            if(isset($login_check)){
                echo $login_check;
            }
        ?></span>
        <dir class="container">
            <img src="./img/logo1.png" alt="green">
            <h1>Login</h1>
        </dir>

        <input type="text" name="adminUser" placeholder="Username">
        
        <input type="password" name="adminPass" placeholder="Password">

        <input type="submit" name="" value ="Login">


    </form>
</body>
</html>