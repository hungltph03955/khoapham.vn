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
 $idLT = $_GET['idLT'];
 settype($idLT , "integer");
 $row_loaitin = ChiTietLoaiTin($idLT);

?>

<?php
if(isset($_POST["btnSua"]))
{
 $TenLT = $_POST["TenLT"];
 $TenLT_KhongDau = changeTitle($TenLT);
 $ThuTu = $_POST["ThuTu"];
 settype($ThuTu,"integer");
 $AnHien = $_POST["AnHien"];
 settype($AnHien,"integer");
  $idTL = $_POST["idTL"]; 
  settype($idTL, "integer");
 $qr = "
        UPDATE loaitin SET 
        Ten = ' $TenLT',
        Ten_KhongDau = '$TenTL_KhongDau',
        ThuTu = '$ThuTu',
        AnHien = '$AnHien',
        idTL = '$idTL'
        WHERE idLT =  $idLT
 ";
 mysql_query($qr);
header("Location:listLoaiTin.php");
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
    <td><h3>Thêm loại tin</h3></td>
  </tr>
</table>

<form id="contactform" name="contact" method="post" action="" >
  <div class="row">
    <label for="name">Tên loai tin :</label>
    <input type="text" value="<?php echo  $row_loaitin['Ten']; ?>" name="TenLT" id="name" class="txt" tabindex="1" required>
  </div>
 
  <div class="row">
    <label for="email">Thứ tự</label>
    <input type="number" value="<?php echo  $row_loaitin['ThuTu']; ?>" name="ThuTu" id="email" class="txt" tabindex="2" required>
  </div>

   <div class="row">
    <label for="email">Ẩn hiện :</label>
    <br/>
    <input type="radio" <?php if ($row_loaitin['AnHien'] == 1) { echo "checked='checked'";} ?> name="AnHien" id="AnHien" value="1" checked>Hiện
    <input type="radio" <?php if ($row_loaitin['AnHien'] == 0) { echo "checked='checked'";} ?> name="AnHien" id="AnHien" value="0"  >Ẩn<br>
  </div>
   <div class="row">
    <label for="email">Thể loại :</label>
    <br/>
      <select name="idTL">
       <?php
        $theloai =  DanhSachTheLoai();
        while ($row_theloai = mysql_fetch_array($theloai)) {
      ?>
        <option <?php if($row_theloai["idTL"]==$row_loaitin["idTL"]){ echo "selected = 'selected'";} ?> value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
      <?php
      }
      ?>
      </select>
  </div> 
 
  <div class="center">
    <input type="submit" id="submitbtn" name="btnSua" tabindex="5" value="Thêm thể loại">
  </div>
</form>


</body>
</html>