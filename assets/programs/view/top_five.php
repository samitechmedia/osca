<?php
$row_count=1;
foreach ($sites_five as $fname){
?>


  <div class="border-box game-block">
      <a class="lnk" href="<?php echo $output[$fname]['link']; ?>" target="_blank" rel="nofollow noreferrer">
          <img src="<?php echo $output[$fname]['logo']; ?>" alt="<?php echo $output[$fname]['sitename']; ?>">
          <span class="btn-play green"><span><span>PLAY NOW</span></span></span>
          <span class="join"><span><?php echo $output[$fname]['cta']; ?></span></span>
      </a>
                      <div class="review">
          <div class="rating">
              <span class="img">RATING:</span>
              <ul>
                  <?php 
				  for($c=0; $c<=9; $c++){
				      if($c < $output[$fname]['rating']){
						echo '<li class="active">
						        <span></span>
							  </li>'; 
					  }
					  else{
						echo '<li>
						        <span></span>
							  </li>'; 
					  }
				  }
				  ?>
              </ul>
          </div>
          <span class="read-review <?php echo $output[$fname]['sitecode']; ?>">
          <?php if(isset($output[$fname]['reviewurl'])){?>
                    <a href="<?php echo $output[$fname]['reviewurl']; ?>">Read Review</a>
          <?php }?>
          </span>
      </div><div class="text-holder"><p class="game-name"><a href="<?php echo $output[$fname]['link']; ?>" target="_blank" rel="nofollow noreferrer"><?php echo $output[$fname]['sitename']; ?></a></p>
          <p class="bonus"><span class="img">BONUS:</span><strong><?php echo $output[$fname]['bonuspercent']; ?></strong> up to <strong><?php echo $output[$fname]['bonusvalue']; ?></strong></p>
          <p class="note">Accepts Canadian Players</p>
          <p><?php echo $output[$fname]['description']; ?></p>
      </div>
  </div>


<?php
$row_count++;
}
?>
