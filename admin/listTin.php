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
    <td><h4>Quản lí tin</h4></td>
  </tr>
</table>

<table>
  <tr class="tintuc">
    <th>id</th>
    <th>Tiêu đề</th>
    <th>ngày</th>
    <th>Tóm tắt</th>
    <th>Hình ảnh</th>
    <th>Loại tin</th>
    <th>Thể loại</th>
    <th>số lần xem</th>
    <th>Tin nổi bật</th>
    <th>AnHien</th>
    <th><a href="themTin.php">Thêm</a></th>
  </tr>
  <?php 
  $tin = DanhSachTin();
  $stt = 1;
  while ($row_tin = mysql_fetch_array($tin))
  {
    ob_start();
  ?>
   <tr>
    <th><?php echo $stt ?></th>
    <th style="width: 20%;">{TieuDe}</th>
    <th>{Ngay}</th>
    <th style="width: 20%;">{TomTat}</th>
    <th><img src="../upload/tintuc/{urlHinh}" style="width: 100px;height: 129px;"></th>
    <th>{TenTL}</th>
    <th>{Ten}</th>
    <th>{SoLanXem}</th>
    <th>{TinNoiBat}</th>
    <th>{AnHien}</th>
    <th><a href="suaTin.php?idTL={idTin}">Sửa</a></th>
    <th><a onclick="return confirm('bạn có chắc chắn muốn xóa khay không ?')" href="xoaTin.php?idTL={idTin}">Xóa</a></th>
  </tr>
  <?php 
    $stt ++;
    $s = ob_get_clean();
    $s = str_replace("{idTin}",$row_tin['idTin'],$s);
    $s = str_replace("{TieuDe}",$row_tin['TieuDe'],$s);
    $s = str_replace("{Ngay}",$row_tin['Ngay'],$s);
    $s = str_replace("{TomTat}", $row_tin['TomTat'],$s);
    $s = str_replace("{urlHinh}", $row_tin['urlHinh'],$s);
    $s = str_replace("{TenTL}",$row_tin['TenTL'],$s);
    $s = str_replace("{Ten}",$row_tin['Ten'],$s);
    $s = str_replace("{SoLanXem}", $row_tin['SoLanXem'],$s);
    $s = str_replace("{TinNoiBat}",$row_tin['TinNoiBat'],$s);
    $s = str_replace("{AnHien}",$row_tin['AnHien'],$s);

    
    echo $s;
  }
  ?>

</table>



</body>
</html>