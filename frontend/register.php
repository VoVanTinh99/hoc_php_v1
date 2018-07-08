<!DOCTYPE html>
<html>
<head>
	<title>Học PHP</title>
</head>
<body>
<?php 
 include('connection.php');
    if(isset($_POST['btn_submit']))
    {
    	$id=$_POST['id'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $name=$_POST['Name'];
        $admin_group_id=$_POST['admin_group_id'];
        $sql="INSERT INTO admin VALUES('','$username','$password','','')";
        mysql_query($sql);
        echo '<meta http-equiv="refresh" content="0;url=dangnhap.php"/>';
    }
?>
<form action="" method="POST" name="frmRegister" enctype="multipart/form-data" >
Nhập ID<br>
<input type="number" name="id" placeholder="Nhập ID"><br>
<lable style="color: red;">User Name</lable><br>
<input type="text" placeholder="nhập tên" max="6" name="username"><br>
Password <br>
 <input type="password" placeholder="password" name="password"> <br>
 Name<br>
<input type="text" name="Name" placeholder="nhập tên"><br>
Admin_group_id <br>
<input type="number" name="admin_group_id" placeholder="admin_group_id"> <br>
 <input type="submit" value="submit" name="btn_submit">
</form>
</body>
</html>
