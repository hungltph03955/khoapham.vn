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
   $qr = "
      DELETE FROM theloai WHERE idTL = $idTL
 ";
 mysql_query($qr);
 header("Location:listTheLoai.php");
?>
