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
	a{
		border: 1px solid #EBF8A4;
		background-color: #4F5D95;
		color: #0397E6;
		width: 10px;
		text-decoration: none;
	}
</style>	

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
</head>
<body>
<?php include("../../include/connecttion.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql="DELETE FROM news where id ='$id'";
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
  	<img src="<?php echo $row['image_link'];?>">
  	<div class="content"><?php echo $row['content']; ?></div>
  	<br/><b>Ngày tạo ( <?php echo date("m/d/Y", strtotime($row['created']))?> ) </b> - Lượt xem (<b><?php echo $row['count_view']; ?></b>) -- <a href="index.php?id=<?php echo $row['id'];?>" onclick="return sure();">xóa</a>-- <a href="update.php?id=<?php echo $row['id'];?>">Update</a>
  	<br/>
  </div>
  <hr/>
  <?php
	}
  ?>
</body>
</html>