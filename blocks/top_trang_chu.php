<div id="slide-left">


        	<div id="slideleft-main">
              <?php 
                $tinmoinha_mottin = TinMoiNhat_MotTin();
                $row_tinmoinha_mottin = mysql_fetch_array($tinmoinha_mottin);
              ?>
                <img src="upload/tintuc/<?php echo $row_tinmoinha_mottin['urlHinh']; ?>"  /><br />
                <h2 class="title"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinha_mottin['idTin']; ?>"><?php echo $row_tinmoinha_mottin['TieuDe']; ?></a> </h2>
                <div class="des">
                    <?php echo $row_tinmoinha_mottin['TomTat']; ?>
                </div>
        	</div>


            <div id="slideleft-scroll">
            	
              <div class="content_scoller width_common">
            <ul>

              <?php 
                  $bontinmoi = TinMoiNhat_BonTin();
                  while ( $rows_bontinmoi = mysql_fetch_array($bontinmoi)) {
              ?>
               <li>
                <div class="title_news">
               		<a href="index.php?p=chitiettin&idTin=<?php echo $rows_bontinmoi['idTin'] ?>" class="txt_link"><?php echo $rows_bontinmoi['TieuDe'] ?></a> 
                </div>
              </li>
              <?php 
                }
              ?>
              
            </ul>
            </div>			
            
			<div id="gocnhin">
                </a>
                <div class="title_news"></div>
            </div>
                
            </div>
</div>


     