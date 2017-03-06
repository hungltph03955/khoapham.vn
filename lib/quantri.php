<?php
// Quản lí thể loại 
function DanhSachTheLoai() 
{
	$qr = "
		SELECT * 
		FROM theloai
		ORDER BY idTL DESC
	";
	return mysql_query($qr);
}
function ChiTietTheLoai($idTL) 
{
	$qr = "
		SELECT * 
		FROM theloai 
		WHERE idTL = $idTL
	";
	return mysql_query($qr);
}
//quản lí loại tin 
function DanhSachLoaiTin() 
{
	$qr = "
		SELECT  loaitin.Ten, loaitin.Ten_KhongDau, theloai.TenTL, theloai.TenTL_KhongDau,  loaitin.idLT, loaitin.ThuTu, loaitin.AnHien
		FROM  loaitin,theloai
		WHERE  theloai.idTL = loaitin.idTL
		ORDER BY idLT DESC
	";
	return mysql_query($qr);
}
function ChiTietLoaiTin($idLT) 
{
	$qr = "
		SELECT * 
		FROM loaitin 
		WHERE idLT = $idLT
	";
	$loaitin = mysql_query($qr);
	return mysql_fetch_array($loaitin);
}


// quản lí tin 
function DanhSachTin() 
{
	$qr = "
		SELECT tin.*, TenTL,Ten
		FROM tin,theloai,loaitin
		WHERE  tin.idLT = loaitin.idLT
		AND tin.idTL = theloai.idTL
		ORDER BY idTin DESC 
	 	LIMIT 0,20
	";
	return mysql_query($qr);
}



function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
	  'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
	  'i'=>'í|ì|ỉ|ĩ|ị',	  
	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
foreach($unicode as $khongdau=>$codau) {
	$arr=explode("|",$codau);
	$str = str_replace($arr,$khongdau,$str);
}
return $str;
}
function changeTitle($str){
	$str=trim($str);
	if ($str=="") return "";
	$str =str_replace('"','',$str);
	$str =str_replace("'",'',$str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');
	// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str = str_replace(' ','-',$str);
	$str = preg_replace('~-+~', '-', $str);
/*	$temp =	NULL;
	for($i=10; $i >=1; $i--) $temp[] = str_repeat('-',$i);
	print_r($temp);die;
	$str = str_replace($temp,'-',$str);
	print_r($temp);die;*/
	return $str;
}
?>