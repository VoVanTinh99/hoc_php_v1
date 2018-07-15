<?php
	if(isset($_REQUEST["ID"]))
    {
 
        mysql_connect('localhost', 'root', ''); //Ket noi den MySQL
        mysql_set_charset('UTF8'); //Hien thi unicode
 
        if
        {
            mysql_select_db("php_data"); //Chon co so du lieu          
            $sql ="DELETE FROM news WHERE id='". $_REQUEST["ID"] . "'";          
 
            $sql = mysql_query($sql); //Thuc thi cau lenh
            if($sql)
            {
                header("location:index.php"); //Tro ve trang truoc
            }
        }
        else
        {      
            die("Khong ket noi duoc database: ". mysql_error());
        }  
    }
    else
    {
        header("location:index.php"); //Tro ve trang truoc
    }
?>