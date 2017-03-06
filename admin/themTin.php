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
  if(isset($_POST["btnThem"])) 
  {
    $TieuDe           = $_POST["TieuDe"]  ;
    $TieuDe_KhongDau  = changeTitle($TieuDe);
    $TomTat           =  $_POST["TomTat"] ;
    $urlHinh          =  $_POST["urlHinh"] ;
    $Ngay             = date("Y-m-d");
    $idUser           =  $_SESSION["idUser"] ;
    $Content          =  $_POST["Content"] ;
    $idLT             =  $_POST["idLT"] ;
    $idTL             =  $_POST["idTL"] ;
    $SoLanXem         =   0;
    $TinNoiBat        =  $_POST["TinNoiBat"] ;
    $AnHien           =  $_POST["AnHien"] ;
    $qr = "
          INSERT INTO tin VALUES (
            null, '$TieuDe','$TieuDe_KhongDau','$TomTat','$urlHinh','$Ngay','$idUser','$Content','$idLT','$idTL','$SoLanXem','$TinNoiBat ','$AnHien'
          );
    ";
  mysql_query($qr);
  header("Location:listTin.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="layout.css">
  <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="ckfinder/ckfinder.js" type="text/javascript"></script>

  <script type="text/javascript">
      function BrowseServer( startupPath, functionData ){
        var finder = new CKFinder();
        finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
        finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
        finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
        finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
        //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn  
        finder.popup(); // Bật cửa sổ CKFinder
      } //BrowseServer

      function SetFileField( fileUrl, data ){
        document.getElementById( data["selectActionData"] ).value = fileUrl;
      }
      function ShowThumbnails( fileUrl, data ){ 
        var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
        document.getElementById( 'thumbnails' ).innerHTML +=
        '<div class="thumb">' +
        '<img src="' + fileUrl + '" />' +
        '<div class="caption">' +
        '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
        '</div>' +
        '</div>';
        document.getElementById( 'preview' ).style.display = "";
        return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
      }
  </script>
  <script src="../jquery-slider-master/js/jquery-2.1.0.min.js" type="text/javascript"></script>

  <script>
    $(document).ready(function() {
      $("#idTL").change(function() {
        var id = $(this).val();
        $.get("../loaitin.php",{idTL:id},function(data){
          $("#idLT").html(data);
        });
      });
    });
  </script>
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
    <td><h3>Thêm tin</h3></td>
  </tr>
</table>

<form id="contactform" name="contact" method="post" action="" >
  <div class="row">
    <label for="name">Tên tiêu đề :</label>
    <input type="text" name="TieuDe" id="name" class="txt" tabindex="1" required>
  </div>

  <div class="row">
    <label for="name">Tóm tắt :</label>
    <input type="text" name="TomTat" id="name" class="txt" tabindex="1" required>
  </div>

  <div class="row">
    <label for="name">Hình ảnh</label>
    <input type="text" name="urlHinh" id="urlHinh" class="txt" tabindex="1" required> <input onclick="BrowseServer('Images:/','urlHinh')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn file" />
  </div>

  <div class="row">
    <label for="name">content</label>
    <textarea type="text" name="Content" id="Content" class="txt" tabindex="1" required> </textarea>
    <script type="text/javascript">
      var editor = CKEDITOR.replace( 'Content',{
        uiColor : '#9AB8F3',
        language:'vi',
        skin:'v2',
        filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
        filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
        
        toolbar:[
        ['Source','-','Save','NewPage','Preview','-','Templates'],
        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Link','Unlink','Anchor'],
        ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
        ['Styles','Format','Font','FontSize'],
        ['TextColor','BGColor'],
        ['Maximize', 'ShowBlocks','-','About']
        ]
      });   
      </script>
  </div>
 
  <div class="row">
    <label for="email">Thể loại :</label>
    <br/>
      <select name="idTL" id="idTL" class="txt">
      <?php
        $theloai =  DanhSachTheLoai();
        while ($row_theloai = mysql_fetch_array($theloai)) {
      ?>
        <option value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
      <?php
      }
      ?>
      </select>
  </div> 

    <div class="row">
    <label for="email">Loại tin :</label>
    <br/>
      <select name="idLT" id="idLT" class="txt">
      <?php
      $loaitin = DanhSachLoaiTin();
      while ($row_loaitin = mysql_fetch_array($loaitin)) {
      ?>
        <option value="<?php echo $row_loaitin["idLT"] ?>"><?php echo $row_loaitin["Ten"] ?></option>
      <?php
      }
      ?>
      </select>
  </div> 

  <div class="row">
    <label for="email">Tin nổi bật</label>
    <br/>
    <input type="radio" name="TinNoiBat"  value="1" checked>Nổi bật
    <input type="radio" name="TinNoiBat"  value="0" >Bình thường<br>
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