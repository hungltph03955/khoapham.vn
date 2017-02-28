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
 $qr = "
 	DELETE FROM loaitin WHERE idLT = $idLT
 ";
  mysql_query($qr);
 header("Location:listLoaiTin.php");
?>

