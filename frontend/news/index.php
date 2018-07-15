<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document</title>
	<link type="text/css" href="../../include/custom.css">
<style type="text/css">
	tr td p img {
		height:100px !important;
	}
	.thumb{
		height:  100px !important;
	}
	tr td div span img {
		height: 100px !important;
	}
	button{
		background-color: yellow;
	}
</style>	
</head>
<body>
<?php include("../../include/connecttion.php");
if (isset($_GET['$username'])) {
	$username = $_GET['username'];
	$sql="DELETE FROM news where username ='$id'";
	mysql_query($sql);

}
?>
<?php 
	$result=mysql_query("select * from news");
?>
<h2>Danh Sách Bài Viết</h2>
<?php 
  	while($row=mysql_fetch_array($result))
	{
  ?>
  <div class="container">
  	<div class="title">
  		<h3><i><?php echo $row['id']; ?></i> -  <?php echo $row['title']; ?></h3>
  	</div>	
  	<span class="intro"><?php echo $row['intro']; ?></span>
  	<div class="content"><?php echo $row['content']; ?></div>
  	<br/><b>Ngày tạo ( <?php echo date("m/d/Y", strtotime($row['created']))?> ) </b> - Lượt xem (<b><?php echo $row['count_view']; ?></b>) -- xóa <button href="index.php?username= <?php echo $row['id']; ?>" onclick="return sure();">Delete</button>
  	<br/>
  </div>
  <hr/>
  <?php
	}
  ?>
</body>
<script>
	function sure()
	{
		if( confirm("Are you sure?"))
		{
		return true;
		}
		else{
			return false;
		}
			}// dành cho xóa
</script>
</html>