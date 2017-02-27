<?php
ob_start();
session_start();
	if ( !isset($_SESSION["idUser"]) && $_SESSION["idGroup"] != 1) 
	{
		header('Location:../index.php');
	}
require "../lib/dbCon.php";
require "../lib/quantri.php";
?>
<?php
 if (isset($_POST["btnThem"]) ) {
   $TenTL = $_POST["TenTL"];
   $TenTL_KhongDau = changeTitle($TenTL) ;
   $ThuTu = $_POST["ThuTu"];
   settype($ThuTu, "integer");
   $AnHien = $_POST["AnHien"];
   settype($AnHien, "integer");
  $qr = "INSERT INTO theloai VALUES (null,'$TenTL','$TenTL_KhongDau','$ThuTu','$AnHien')"; 
  mysql_query($qr);
  header("Location:listTheLoai.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<table>
  <tr>
    <th><h2>Quản trị website <?php echo $_SESSION["HoTen"]; ?></h2>
    </th>
  </tr>
  <tr>
    <td class="td-menu"><?php require "menu.php"; ?></td>
  </tr>
   <tr>
    <td><h3>Thêm thể loại</h3></td>
  </tr>
</table>

<form id="contactform" name="contact" method="post" action="" >
  <div class="row">
    <label for="name">Tên thể loai :</label>
    <input type="text" name="TenTL" id="name" class="txt" tabindex="1" required>
  </div>
 
  <div class="row">
    <label for="email">Thứ tự</label>
    <input type="number" name="ThuTu" id="email" class="txt" tabindex="2" required>
  </div>

   <div class="row">
    <label for="email">Ẩn hiện :</label>
    <br/>
    <input type="radio" name="AnHien" id="AnHien" value="1" checked>Hiện
    <input type="radio" name="AnHien" id="AnHien" value="0" >Ẩn<br>
  </div>
 
 
  <div class="center">
    <input type="submit" id="submitbtn" name="btnThem" tabindex="5" value="Thêm thể loại">
  </div>
</form>


</body>
</html>