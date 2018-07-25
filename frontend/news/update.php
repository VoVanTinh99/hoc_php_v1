<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update</title>

</head>
<body>

<?php include("../../include/connecttion.php");
		$id=$_GET['id'];
		$sql= "SELECT * FROM news where id='$id'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
?>
<form action="" method="POST" enctype="multipart/form-data" name="fm" id="fm">
  <table width="484"  align="center">
    <tr>
      <td width="129">&nbsp;</td>
      <td width="264" style="color:red;"><h2>Update</h2></td>
    </tr>
    <tr>
      <td>id</td>
      <td><label for="id"></label>
        <input type="text" name="id" id="id" readonly="readonly" value="<?php echo $row['id'];?>"/></td>
    </tr>
    <tr>
      <td>title</td>
      <td><label for="title"></label>
        <input type="text" name="title" id="title"  value="<?php echo $row['title'];?>" /></td>
    </tr>
    <tr>
      <td>intro</td>
      <td><label for="intro"></label>
        <textarea name="intro" id="intro" cols="100" rows="10"><?php echo $row['intro'];?></textarea></td>
    </tr>
    <tr>
      <td>content</td>
      <td><label for="content"></label>
        <textarea name="content" id="content" cols="100" rows="10"><?php echo $row['content'];?></textarea></td>
    </tr>
    <tr>
      <td>meta_desc</td>
      <td><label for="meta_desc"></label>
        <input type="text" name="meta_desc" id="meta_desc"  value="<?php echo $row['meta_desc'];?>"/></td>
    </tr>
    <tr>
      <td>meta_key</td>
      <td><label for="meta_key"></label>
        <input type="text" name="meta_key" id="meta_key"  value="<?php echo $row['meta_key'];?>"/></td>
    </tr>
    <tr>
      <td>image_link</td>
      <td><label for="hinh"></label>
        <img src="Image/<?php echo $row['image_link']?>" width="175" height="175"/>
        <input type="file" name="hinh" id="hinh" /></td>
    </tr>
    <tr>
      <td>created</td>
      <td><label for="created"></label>
        <input type="date" name="created" id="created"  value="<?php echo $row['created'];?>"/></td>
        </td>
    </tr>
    <tr>
      <td>feature</td>
      <td><label for="feature"></label>
        <input type="text" name="feature" id="feature"  value="<?php echo $row['feature'];?>"/></td>
    </tr>
    <tr>
      <td>count_view</td>
      <td><label for="count_view"></label>
        <input type="text" name="count_view" id="count_view"  value="<?php echo $row['count_view'];?>"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btn_up" id="btn_up" value="Save" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['btn_up']))
{
	include("../../include/connecttion.php");
		$id=$_POST['id'];
		$title=$_POST['title'];
		$intro=$_POST['intro'];
		$content=$_POST['content'];
		$meta_desc=$_POST['meta_desc'];
		$meta_key=$_POST['meta_key'];
		$created=$_POST['created'];
		$feature=$_POST['feature'];
		$count_view=$_POST['count_view'];			
		$taptin =$_FILES['hinh'];
		$image_link=$taptin['name'];
		if($image_link=="")
			{
				$sq="UPDATE news SET id='$id',title='$title',intro='$intro',meta_desc='$meta_desc',meta_key='$meta_key'
				,created='$created',feature='$feature',count_view='$count_view' 
			WHERE id='$id'";
			mysql_query($sq);
			echo "<script>alert('Cap nhat thanh cong')</script>";
			echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
			
			}
		
		else
		{
			if($taptin['type']=="image/ipg"||$taptin['type']=="image/jpeg"||$taptin['type']=="image/png"||$taptin['type']=="image/gif")
		{
			if($taptin['size']<=614400)
			{
				copy($taptin['tmp_name'],"Image/".$taptin['name']);
				
		
			$sql="UPDATE news SET id='$id',title='$title',intro='$intro',meta_desc='$meta_desc',meta_key='$meta_key',
			created='$created',feature='$feature',count_view='$count_view',image_link='$image_link' 
			WHERE id='$id'";
			
			mysql_query($sql);
			echo "<script>alert('Cap nhat thanh cong')</script>";
			echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
			
			}		
		}
			else
			{
				echo "Hinh khong dung dinh dang";
			}
			
			}
		}
?>
</body>

</html>