<?php
    $idLT = $_GET["idLT"];
    settype($idLT, "integer");
?>
<dir>
<?php 
    $bc = breadCrumb($idLT);
    $row_bc = mysql_fetch_array($bc);
?>
    Trang chủ >> <?php echo $row_bc['TenTL'] ?> >> <?php echo $row_bc['Ten'] ?>
</dir>
<?php
    $sotin1trang = 4;
    if ( isset($_GET["trang"]) )
    {
        $trang = $_GET["trang"];
        settype($trang, "integer");
    }else 
    {
        $trang = 1; 
    }
    $form = ($trang - 1) * $sotin1trang;

    $tin = TinTheoLoaiTin_PhanTrang($idLT,$form,$sotin1trang);
    while ($row_tin = mysql_fetch_array($tin)) {
?>
<div class="box-cat">
	<div class="cat1">
    	
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tin['idTin']  ?>"><?php echo $row_tin['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_tin['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row_tin['TomTat'] ?></div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            
        </div>
    </div>
</div>
<div class="clear"></div>
<?php
    }
?>
<div class="phantrang">
<?php 
    $t =  TinTheoLoaiTin($idLT);
    $tongsotin = mysql_num_rows($t);
    $tongsotrang = ceil($tongsotin/$sotin1trang);
    for($i=1; $i<=$tongsotrang; $i++) {
        ?>
        <a <?php if($i==$trang){ echo " style='background-color: #736666' " ;} ?> href="index.php?p=tintrongloai&idLT=<?php echo $idLT ?>&trang=<?php echo $i ?>"><?php echo $i ?></a>
<?php
    }
?>
</div>
<!-- box cat-->









