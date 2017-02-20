<?php 
	$vitri = 1;
	$quangcao = QuangCao($vitri);
	while ($row_quangcao = mysql_fetch_array($quangcao)) {

?>
<img width="280" src="upload/quangcao/<?php echo $row_quangcao['urlHinh'] ?>" />
<div style="height:10px"></div>
<?php 
	}
?>