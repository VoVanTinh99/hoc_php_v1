<?php 
    include('../include/connecttion.php');
    if(isset($_POST['btn_submit']))
    {
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $sql="INSERT INTO admin VALUES('5','$username','$password','aa','1')";
        mysql_query($sql);
    }
?>
<form action="" method="POST" name="frmRegister" enctype="multipart/form-data" >
<lable style="color: red;">User Name</lable><br>
<input type="text" placeholder="nhập tên" max="6" name="username"><br>
Password <br>
 <input type="password" placeholder="password" name="password"> <br>


 <input type="submit" value="submit" name="btn_submit">
</form>