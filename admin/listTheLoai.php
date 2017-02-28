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
    <td><h4>Quản lí thể loại</h4></td>
  </tr>
</table>

<table>
  <tr class="">
    <th>id</th>
    <th>Tên thể loại</th>
    <th>link thể loại</th>
    <th>Thứ tự</th>
    <th>AnHien</th>
    <th><a href="themTheLoai.php">Thêm</a></th>
  </tr>
  <?php 
    $theloai = DanhSachTheLoai();
    $stt = 1;
    while ($row_theloai = mysql_fetch_array($theloai)) 
    {
      ob_start();
  ?>
   <tr>
    <th><?php echo $stt ?></th>
    <th>{TenTL}</th>
    <th>{TenTL_KhongDau}</th>
    <th>{ThuTu}</th>
    <th>{AnHien}</th>
    <th><a href="suaTheLoai.php?idTL={idTL}">Sửa</a></th>
    <th><a onclick="return confirm('bạn có chắc chắn muốn xóa khay không ?')" href="xoaTheLoai.php?idTL={idTL}">Xóa</a></th>
  </tr>
  <?php 
    $stt ++;
    $s = ob_get_clean();
    $s = str_replace("{idTL}",$row_theloai['idTL'],$s);
    $s = str_replace("{TenTL}",$row_theloai['TenTL'],$s);
    $s = str_replace("{TenTL_KhongDau}",$row_theloai['TenTL_KhongDau'],$s);
    $s = str_replace("{ThuTu}",$row_theloai['ThuTu'],$s);
    $s = str_replace("{AnHien}",$row_theloai['AnHien'],$s);
    echo $s;
      }
  ?>

</table>



</body>
</html>