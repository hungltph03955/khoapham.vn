<?php 
	function TinMoiNhat_MotTin() 
	{
	 $qr = "
		 	SELECT * FROM tin 
			ORDER BY idTin DESC
			LIMIT 0,1
		";
		return mysql_query($qr);
	}

	function TinMoiNhat_BonTin() 
	{
	 $qr = "
	 		SELECT idTin, TieuDe FROM tin 
	 		ORDER BY idTin DESC 
	 		LIMIT 1,10
	 	";
		return mysql_query($qr);
	}
	function TinXemNhieuNhat() 
	{
		$qr = "
			SELECT * FROM tin 
			ORDER BY SoLanXem DESC
			LIMIT 0,6
		";
		return mysql_query($qr);
	}

?>