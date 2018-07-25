<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert</title>
<script>
function kt(){
	var id = document.fadd.id;
	var title = document.fadd.title;
	var intro = document.fadd.intro;
	var content = document.fadd.content;
	var meta_desc = document.fadd.meta_desc;
	var meta_key = document.fadd.meta_key;
	var image_link = document.fadd.image_link;
	var created = document.fadd.created;
	var feature = document.fadd.feature;
	var count_view = document.fadd.count_view;
	if(id.value=="")
	{
		document.getElementById('blid').innerHTML="<font color='#F7E683'>id khong duoc rong</font>";
		id.focus();
		return false;	
	}else{
		document.getElementById('blid').innerHTML="";
		}
	if(title.value=="")
	{
		document.getElementById('bltitle').innerHTML="<font color='#F7E683'>title khong duoc rong</font>";
		title.focus();	
		return false;	
	}else{
		document.getElementById('bltitle').innerHTML="";
		}
	if(intro.value=="" )
	{
		document.getElementById('blintro').innerHTML="<font color='#F7E683'>intro khong duoc rong</font>";
		intro.focus();	
		return false;	
	}else{
		document.getElementById('blintro').innerHTML="";
		}
	if(content.value=="")
	{
		document.getElementById('blcontent').innerHTML="<font color='#F7E683'>content khong duoc rong</font>";
		content.focus();	
		return false;	
	}else{
		document.getElementById('blcontent').innerHTML="";
		}
	if(meta_desc.value=="")
	{
		document.getElementById('blmeta_desc').innerHTML="<font color='#F7E683'>meta_desc khong duoc rong</font>";
		meta_desc.focus();	
		return false;	
	}else{
		document.getElementById('blmeta_desc').innerHTML="";
		}
	if(meta_key.value=="")
	{
		document.getElementById('blmeta_key').innerHTML="<font color='#F7E683'>meta_key khong duoc rong</font>";
		meta_key.focus();	
		return false;	
	}else{
		document.getElementById('blmeta_key').innerHTML="";
		}
	if(image_link.value=="")
	{
		document.getElementById('blimage_link').innerHTML="<font color='#F7E683'>image_link khong duoc rong</font>";
		image_link.focus();	
		return false;	
	}else{
		document.getElementById('blimage_link').innerHTML="";
		}
	if(created.value=="")
	{
		document.getElementById('blcreated').innerHTML="<font color='#F7E683'>created khong duoc rong</font>";
		created.focus();	
		return false;	
	}else{
		document.getElementById('blcreated').innerHTML="";
		}
	if(feature.value=="")
	{
		document.getElementById('blfeature').innerHTML="<font color='#F7E683'>feature khong duoc rong</font>";
		feature.focus();	
		return false;	
	}else{
		document.getElementById('blfeature').innerHTML="";
		}
	if(count_view.value=="")
	{
		document.getElementById('blcount_view').innerHTML="<font color='#F7E683'>count_view khong duoc rong</font>";
		count_view.focus();	
		return false;	
	}else{
		document.getElementById('blcount_view').innerHTML="";
		}
	}
	</script>
</head>
<body>
<?php include("../../include/connecttion.php");
if(isset($_POST['btnAdd']))
{
	
	$id=$_POST['id'];
	$title=$_POST['title'];
	$intro=$_POST['intro'];
	$content=$_POST['content'];
	$meta_desc=$_POST['meta_desc'];
	$meta_key=$_POST['meta_key'];
	$created=$_POST['created'];
	$feature=$_POST['feature'];
	$count_view=$_POST['count_view'];
	$taptin =$_FILES['image_link'];
	$image_link=$taptin['name'];
	//Upload hinh
	$taptin=$_FILES['image_link'];
if($taptin['type']=="image/jpg" || $taptin['type']=="image/jpeg" || $taptin['type']=="image/png" ||$taptin['type']=="image/gif")
	{
	  	if($taptin['size']<=614400)//bắt lổi hình ảnh
			{
	  			copy($taptin['tmp_name'],"Image/".$taptin['name']);
				$image_link=$taptin['name'];
				//kiem tra username co trung khong
				$sq="select * from news where id='$id'";//kiểm tra trong cơ sở dữ liệu đã tồn tại bài viết đó chưa, chưa có mới thêm , còn có rồi thì báo lổi trùng
				$result=mysql_query($sq);
				if(mysql_num_rows($result)>0)
						{
							echo "<script>alert('id is existed ')</script>";
							echo '<meta http-equiv="refresh" content="0;URL=add.php"/>';
						}
					else
						{
							//them du lieu moi vao bang khach hang
							$sql="insert into news values('$id','$title','$intro','$content','$meta_desc','$meta_key','$image_link','$created','$feature','$count_view')";
							mysql_query($sql);
							echo "<script>alert('Add is successful!')</script>";
							echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
						}
				}
				else
						{
							echo "hinh co kich thuoc qua lon";
						}
	  }

}
?>
<form action="" method="POST" enctype="multipart/form-data" name="fadd" id="fadd" onsubmit="return kt();">
  <div align="center">
    <p><h1 align="center"><font color="#0000FF">ADD</font></h1> </p>
    <table width="200" border="1">
      <tr>
        <th scope="row">ID:</th>
        <td><label for="id"></label>
          <input type="text" name="id" id="id" />
          <div id="blid"></div></td>
      </tr>
      <tr>
        <th scope="row">title:</th>
        <td><label for="title"></label>
          <input type="text" name="title" id="title" />
          <div id="bltitle"></div></td>
      </tr>
      <tr>
        <th scope="row">intro:</th>
        <td><label for="intro"></label>
          <input type="text" name="intro" id="intro" />
          <div id="blintro"></div></td>
      </tr>
      <tr>
        <th scope="row">content:</th>
        <td><label for="content"></label>
          <input type="text" name="content" id="content" /></td>
          <div id="blcontent"></div></td>
      </tr>
      <tr>
        <th scope="row">meta_desc:</th>
        <td><label for="meta_desc"></label>
          <input type="text" name="meta_desc" id="meta_desc" />
          <div id="blmeta_desc"></div></td>
      </tr>
      <tr>
        <th scope="row">meta_key:</th>
        <td><label for="meta_key"></label>
          <input type="text" name="meta_key" id="meta_key" />
          <div id="blmeta_key"></div></td>
      </tr>
     <tr>
        <th scope="row">image_link:</th>
        <td><label for="image_link"></label>
          <input type="file" name="image_link" id="image_link" /></td>
          <div id="blimage_link"></div></td>
      </tr>
      <tr>
        <th scope="row">created:</th>
        <td><label for="created"></label>
          <input type="date" name="created" id="created" />
          <div id="blcreated"></div></td>
      </tr>
      <tr>
        <th scope="row">feature:</th>
        <td><label for="feature"></label>
          <input type="text" name="feature" id="feature" />
          <div id="blfeature"></div></td>
      </tr>
      <tr>
        <th scope="row">count_view:</th>
        <td><label for="count_view"></label>
          <input type="text" name="count_view" id="count_view" />
          <div id="blcount_view"></div></td>
      </tr>
      <tr>
        <th colspan="2" scope="row"><input type="submit" name="btnAdd" id="btnAdd" value="Add" /></th>
      </tr>
    </table>
  </div>
</form>
</body>
</html>