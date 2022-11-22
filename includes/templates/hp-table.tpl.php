<div class="table-row">
	<a target="_blank" href="<?php echo $data->link?>" rel="nofollow noreferrer" class="row-lnk">
		<span class="col-hold">
			<span class="col1"><?php echo $current+1?>.</span>
		</span>
		<span class="col-hold">
			<span class="col2">
				<img src="<?php echo $data->logohp?>" alt="<?php echo $data->logoalt?>" /></span>
		</span>
		<span class="col-hold">
			<span class="col3"><?php echo $data->bonusv?></span>
		</span>
		<span class="col-hold">
			<span class="col4"><?php echo $data->payout?></span>
		</span>
		<span class="col-hold">
			<span class="col5">
				<span class="system-icons">
					<?php echo $data->systems?>
				</span>
			</span>
		</span>
		<span class="col-hold valign-top">
			<span class="col6">
				<span class="play-now"></span>
			</span>
		</span>
	</a>
	<a class="review-lnk" href="<?php echo $data->review?>">Read Review</a>
</div>
