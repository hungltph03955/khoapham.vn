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
    <td><h4>Quản lí loại tin</h4></td>
  </tr>
</table>

<table>
  <tr class="">
    <th>id</th>
    <th>Tên loại tin</th>
    <th>Thứ tự</th>
    <th>Ẩn Hiện</th>
    <th>Tên thể loại</th>
    <th><a href="themLoaiTin.php">Thêm</a></th>
  </tr>


  <?php 
    $loaitin = DanhSachLoaiTin();
    $stt = 1;
    while ($row_loaitin = mysql_fetch_array($loaitin)) 
    {
      ob_start();
  ?>
   <tr>
    <th><?php echo $stt ?></th>
    <th>{Ten}</th>
    <th>{ThuTu}</th>
    <th>{AnHien}</th>
    <th>{TenTL}</th>
    <th><a href="suaLoaiTin.php?idLT={idLT}">Sửa</a></th>
    <th><a onclick="return confirm('bạn có chắc chắn muốn xóa khay không ?')" href="xoaLoaiTin.php?idLT={idLT}">Xóa</a></th>
  </tr>
  <?php 
    $stt ++;
    $s = ob_get_clean();
    $s = str_replace("{idLT}",$row_loaitin['idLT'],$s);
    $s = str_replace("{Ten}",$row_loaitin['Ten'],$s);
    $s = str_replace("{ThuTu}",$row_loaitin['ThuTu'],$s);
    $s = str_replace("{AnHien}",$row_loaitin['AnHien'],$s);
    $s = str_replace("{TenTL}",$row_loaitin['TenTL'],$s);
    echo $s;
  }
  ?>


</table>



</body>
</html>