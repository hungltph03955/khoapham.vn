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
 $idTL = $_GET['idTL'];
 settype($idTL , "integer");
 $chitiettheloai = ChiTietTheLoai($idTL);
 $row_chitiettheloai = mysql_fetch_array($chitiettheloai);
?>

<?php
if(isset($_POST["btnSua"]))
{
 $TenTL = $_POST["TenTL"];
 $TenTL_KhongDau = changeTitle($TenTL);
 $ThuTu = $_POST["ThuTu"];
 settype($ThuTu,"integer");
 $AnHien = $_POST["AnHien"];
 settype($AnHien,"integer");
 $qr = "
        UPDATE theloai SET 
        TenTL = ' $TenTL',
        TenTL_KhongDau = '$TenTL_KhongDau',
        ThuTu = '$ThuTu',
        AnHien = '$AnHien' 
        WHERE idTL =  $idTL
 ";
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
    <td><h3>Sửa thể loại</h3></td>
  </tr>
</table>

<form id="contactform" name="contact" method="post" action="" >
  <div class="row">
    <label for="name">Tên thể loai :</label>
    <input type="text" name="TenTL" id="name" class="txt" tabindex="1" value="<?php echo $row_chitiettheloai['TenTL'] ?>" required>
  </div>
 
  <div class="row">
    <label for="email">Thứ tự</label>
    <input type="number" name="ThuTu" id="email" class="txt" tabindex="2" value="<?php echo $row_chitiettheloai['ThuTu'] ?>" required>
  </div>

   <div class="row">
    <label for="email">Ẩn hiện :</label>
    <br/>
    <input type="radio" <?php if ($row_chitiettheloai['AnHien'] == 1) { echo "checked='checked'";} ?> name="AnHien" id="AnHien" value="1">Hiện
    <input type="radio" <?php if ($row_chitiettheloai['AnHien'] == 0) { echo "checked='checked'";} ?> name="AnHien" id="AnHien" value="0" >Ẩn<br>
  </div>
 
 
  <div class="center">
    <input type="submit" id="submitbtn" name="btnSua" tabindex="5" value="Sửa thể loại">
  </div>
</form>


</body>
</html>