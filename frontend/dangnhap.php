<?php
//Khai báo sử dụng session
session_start();
if (isset($_POST['btn_log'])) 
{
    //Kết nối tới database
    include('connection.php');
   	$username=$_POST['username'];
    // mã hóa pasword
    $password = md5($_POST['password']);  
     $sql="select * from admin where username='$username' and password ='$password'";
        // mysql_query là con trỏ trỏ đến chuổi truy vấn sql muốn thực thi( $sql)
    $result= mysql_query($sql);
    // mysql_num_rows là trả về số hàng($result) truyền vào
	if(mysql_num_rows($result)>0)
	{
		echo "<script>alert('login success');</script>";
		echo '<meta http-equiv="refresh" content="0;url=trangchu.php"/>';
		}
	else{
		echo "<script>alert('login not success');</script>";
		echo '<meta http-equiv="refresh" content="0;url=dangki.php"/>';
				} 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
</head>
<body>
<form id="form" name="form" method="post" action="">
  <p>Username 
    <label for="username"></label>
  <input type="text" name="username" id="username" />
  </p>
  <p>Password 
    <label for="password"></label>
    <input type="password" name="password" id="password" />
  </p>
    <input type="submit" name="btn_log" id="btn_log" value="Đăng Nhập" />
  </p>
</form>
</body>
</html>