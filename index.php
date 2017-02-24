<?php 
session_start();
require "lib/dbCon.php";
require "lib/trangchu.php";
    if ( isset($_GET["p"])) 
    {
        $p = $_GET["p"];
    }else
    {
        $p = "";
    }
?>
<?php 
    // kiểm tra dữ liệu đăng nhập
        if (isset($_POST["btlLogin"])) 
        {
            $un = $_POST["txtUn"];
            $pa = $_POST["txtPa"];
            $pa = md5($pa);
            $qr = "
                SELECT * 
                FROM users
                WHERE Username = '$un'
                AND Password = '$pa'
            ";
            $user = mysql_query($qr);
            if (mysql_num_rows($user)==1 ) 
            {
                $row = mysql_fetch_array($user);
                 $_SESSION["idUser"] = $row['idUser'];
                 $_SESSION["Username"] = $row['Username'];
                 $_SESSION["Password"] = $row['Password'];
                 $_SESSION["HoTen"] = $row['HoTen'];
                 $_SESSION["idGroup"] = $row['idGroup'];
            }
        }
        if (isset($_POST["btlLogout"]))
        {
            unset($_SESSION["idUser"]);
            unset($_SESSION["Username"]);
            unset($_SESSION["Password"]);
            unset($_SESSION["HoTen"]);
            unset($_SESSION["idGroup"]);
            /*session_unset();*/
        }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lap Trinh PHP</title>
<link rel="stylesheet" type="text/css" href="css/layout.css" />
</head>

<body>
<div id="wrap-vp">
	<div id="header-vp">
    	<div id="logo"><img src="images/logo.gif" /></div>
    </div>
    
    <div>
        <?php 
            require "blocks/menu.php";
        ?>
    	<!--block/menu.php-->
    </div>
      <div id="midheader-vp">
    	<div id="left">
        	<ul class="list_arrow_breakumb">
            	<li class="start">
                <a href="javascript:;">Trang nhất</a>
                <span class="arrow_breakumb">&nbsp;</span></li>
           </ul>
        </div>
        <div id="right">
            <?php 
                require "blocks/thongtinchung.php";
            ?>
			<!--blocks/thongtinchung.php-->
        </div>
    </div>
    <div class="clear"></div>

    <div id="slide-vp">
        <?php 
            require "blocks/top_trang_chu.php";
        ?>
    	<!--blocks/top_trang_chu.php-->

        <div id="slide-right">
        <?php 
            require "blocks/quangcao_top_phai.php";
        ?>
        <!--blocks/quangcao_top_phai.php-->
        </div>
    </div>

  	<div id="content-vp">
    	<div id="content-left">
        <?php
             require "blocks/cot_trai.php";
        ?>
		<!--blocks/cot_trai.php-->
        </div>
        <div id="content-main">
			<?php
            switch($p) 
                {
                    case("tintrongloai") : 
                        require "pages/tintrongloai.php";
                    break;
                    case("chitiettin") : 
                        require "pages/chitiettin.php";
                    break;
                     case("timkiem") : 
                        require "pages/timkiem.php";
                    break;
                    default:
                        require "pages/trangchu.php";
                }
            ?>
			<!--PAGES-->
            
        </div>
        <div id="content-right">
        <?php 
            if(!isset($_SESSION["idUser"])) {
                require "blocks/formLogin.php";
            }else{
                require "blocks/formHello.php";
            }
        ?>
        <?php
            require "blocks/cot_phai.php";
        ?>
		<!--blocks/cot_phai.php-->
        </div>

    <div class="clear"></div>
    	
    </div>
    
     <div id=" ">
        <?php
              require "blocks/thongtindoanhnghiep.php";
        ?>
    	<!--blocks/thongtindoanhnghiep.php-->
    </div>
    <div class="clear"></div>
    <div id="footer">
        <?php
            require "blocks/footer.php";
        ?>
    	<!--blocks/footer.php-->
        
        <div class="ft-bot">
            <div class="bot1"><img src="images/logo.gif" /></div>
            <div class="bot2">
                     <p>© <span>Copyright 1997 VnExpress.net,</span>  All rights reserved</p>
                     <p>® VnExpress giữ bản quyền nội dung trên website này.</p>
            </div>
            <div class="bot3">
                
                     <p><a href="http://fptad.net/qc/V/vnexpress/2014/07/">VnExpress tuyển dụng</a>   <a href="http://polyad.net/Polyad/Lien-he.htm">Liên hệ quảng cáo</a> / <a href="/contactus">Liên hệ Tòa soạn</a></p>
                     <p><a href="http://vnexpress.net/contact.htm" target="_blank" style="color: #686E7A;font: 11px arial;padding: 0 4px;text-decoration: none;">Thông tin Tòa soạn: </a><span>0123.888.0123</span> (HN) - <span>0129.233.3555</span> (TP HCM)</p>
                  
            </div>
        </div>
    </div>
    
    
    
    
</div>

</body>
</html>
