<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Nhập</title>
</head>

<body>
<!-- câu lệnh mở đầu php -->
<?php
// include file để kết nối với mysql
include('Connection.php');
// Kiễm tra người dùng đã ấn nút Đăng Nhập thì mới xử lí
if(isset($_POST['btn_log']))
{
  // lấy thông tin của người dùng
	$username=$_POST['username'];
	$password=md5($_POST['password']);
        $sql="select * from customer where username='$username' and password ='$password'";
        // mysql_query là con trỏ trỏ đến chuổi truy vấn sql muốn thực thi( $sql)
    $result= mysql_query($sql);
    // mysql_num_rows là trả về số hàng($result) truyền vào
	if(mysql_num_rows($result)>0)
	{
		echo "<script>alert('login success');</script>";
		echo '<meta http-equiv="refresh" content="0;url=select_cus_del.php"/>';
		}
	else{
		echo "<script>alert('login not success');</script>";
		echo '<meta http-equiv="refresh" content="0;url=login.php"/>';
				}
	}?>
<form id="f" name="f" method="post" action="">
  <p>Username 
    <label for="username"></label>
  <input type="text" name="username" id="username" />
  </p>
  <p>Password 
    <label for="password"></label>
    <input type="password" name="password" id="password" />
  </p>
  <p>
    <input type="submit" name="btn_log" id="btn_log" value="Đăng Nhập" />
  </p>
</form>
</body>
</html>