<div id="slide-left">


        	<div id="slideleft-main">
              <?php 
                $tinmoinha_mottin = TinMoiNhat_MotTin();
                $row_tinmoinha_mottin = mysql_fetch_array($tinmoinha_mottin);
              ?>
                <img src="upload/tintuc/<?php echo $row_tinmoinha_mottin['urlHinh']; ?>"  /><br />
                <h2 class="title"><a href="#"><?php echo $row_tinmoinha_mottin['TieuDe']; ?></a> </h2>
                <div class="des">
                    <?php echo $row_tinmoinha_mottin['TomTat']; ?>
                </div>
        	</div>


            <div id="slideleft-scroll">
            	
              <div class="content_scoller width_common">
            <ul>


               <li>
                <div class="title_news">
               		<a href="#" class="txt_link"> Bị bắt vì chụp ảnh selfie với váy ăn trộm </a> 
                </div>
              </li>
              


            </ul>
            </div>			
            
			<div id="gocnhin">
                </a>
                <div class="title_news"></div>
            </div>
                
            </div>
</div>


     