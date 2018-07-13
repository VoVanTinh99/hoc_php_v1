<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../../include/connecttion.php");?>
<?php
if (isset($_GET['$username'])) {
	$username = $_GET['username'];
	$sql="DELETE FROM news where username ='$username'";
	mysql_query($sql);
}
?>
	<title>Document</title>
	
</head>
<body>
<?php 
	include("../../include/connecttion.php");
	$result=mysql_query("select * from news");
?>
<table width="694" border="1">
<tr>
	<td width="121">id</td>
	<td width="152">title</td>
	<td width="51">intro</td>
	<td width="135">content</td>
	<td width="100">meta_desc</td>
	<td width="83">meta_key</td>
	<td width="83">image_link</td>
	<td width="12">created</td>
	<td width="12">feature</td>
	<td width="12">count_view</td>
</tr>
<?php 
  	while($row=mysql_fetch_array($result))
	{
  ?>
<tr>
    <td><?php echo $row['id']; ?></td>    
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['intro']; ?></td>
    <td><?php echo $row['content']; ?>/></td>
    <td><?php echo $row['meta_desc']; ?></td>
    <td><?php echo $row['meta_key']; ?></td>
    <td><?php echo $row['image_link']; ?></td>
    <td><?php echo $row['created']; ?></td>
    <td><?php echo $row['feature']; ?></td>
    <td><?php echo $row['count_view']; ?></td>
  </tr>
  <?php
	}
  ?>
</table>
</body>
</html>