			<div class="border-box game-block">
				<a class="lnk" href="<?php echo $data->link?>" target="_blank" rel="nofollow noreferrer">
					<img src="<?php echo $data->logo?>" alt="<?php echo $data->logoalt?>">
					<span class="btn-play green"><span><span>PLAY NOW</span></span></span>
					<span class="join"><span><?php echo $data->cta?></span></span>
				</a>
								<div class="review">
					<div class="rating">
						<span class="img">RATING:</span>
						<ul>
							<?php echo $data->rating?>
						</ul>
					</div>
					<?php echo $data->reviewUrl?>
				</div><div class="text-holder"><p class="game-name"><a href="<?php echo $data->link?>" target="_blank" rel="nofollow noreferrer"><?php echo $data->sitename?></a></p>
					<p class="bonus"><span class="img">BONUS:</span><strong><?php echo $data->bonusp?></strong> up to <strong><?php echo $data->bonusv?></strong></p>
					<p class="note">Accepts Canadian Players</p>
					<p><?php echo $data->text?></p>
				</div>
			</div>
