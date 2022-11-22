<div class="block__info type-display-flex type-flex-justify-around">
    <?php echo $data->details ?>
</div>

<div class="excellent__container">
	<span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing">
	<div class="row row-margin-bottom type-flex-justify-between">
		<div class="col-12 col-lg-6">
			<!--<i class="sprite sprite-icon_green_circle">8</i>-->
			<div class="svg__circle">
				<svg id="count" version="1.1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 107 107"
                     style="enable-background:new 0 0 107 107;" xml:space="preserve">
					<path class="st0"
                          d="M86,12.3C78.7,6.5,69.8,2.6,60.1,1.4l-3.2,8.7c7.8,0.6,15,3.2,21.1,7.4L86,12.3z"></path>
					<path class="st0 texsttt st0__fill"
                          d="M94.7,39.5l9.6,0.5c-2.5-9.4-7.5-17.8-14.4-24.4l-7.8,5.1C87.8,25.8,92.2,32.2,94.7,39.5z"></path>
					<path class="st0" d="M95,66.7l7.4,6c2.3-5.9,3.6-12.4,3.6-19.2c0-2.9-0.2-5.7-0.7-8.4l-9.3-0.5c0.6,2.9,0.9,5.8,0.9,8.9
						C97,58.1,96.3,62.5,95,66.7z"></path>
					<path class="st0"
                          d="M93.1,71.6c-3.1,6.8-7.9,12.6-13.8,17l2.5,9.2c7.8-5,14.2-12,18.5-20.4L93.1,71.6z"></path>
					<path class="st0"
                          d="M53.7,97l-3.3,8.9c1,0.1,2.1,0.1,3.1,0.1c8.6,0,16.6-2.1,23.8-5.7l-2.4-8.9C68.6,94.9,61.4,97,53.7,97z"></path>
					<path class="st0"
                          d="M20.2,94.1c7.1,5.8,15.6,9.8,25.1,11.3l3.2-8.6C40.9,95.8,34,93,28.1,88.8L20.2,94.1z"></path>
					<path class="st0"
                          d="M13.1,69.5H3.5c2.6,8.1,7,15.3,12.9,21.1l7.7-5.1C19.3,81.1,15.5,75.6,13.1,69.5z"></path>
					<path class="st0" d="M11.4,42.5l-7.7-5.7C2,42,1,47.7,1,53.5c0,3.8,0.4,7.5,1.2,11h9.3c-0.9-3.5-1.4-7.2-1.4-11
						C10,49.7,10.5,46,11.4,42.5z"></path>
					<path class="st0"
                          d="M23.3,10.6C15.6,16,9.5,23.3,5.6,32l7.4,5.6c2.8-7,7.3-13.1,13-17.7L23.3,10.6z"></path>
					<path class="st0"
                          d="M30.3,16.7c6.2-3.9,13.5-6.3,21.2-6.7l3.3-9c-0.5,0-0.9,0-1.4,0c-9.4,0-18.2,2.5-25.8,6.8L30.3,16.7z"></path>
				</svg>
				<span class="excellent__count"><?php echo $data->total ?></span>
			</div>
			<span class="excellent__title start">Excellent</span>
		</div>
		<div class="col-12 col-lg-6">
			<a href="<?php echo $data->link ?>" target="_blank" rel="nofollow noreferrer"
               class="primary-btn primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green primary-btn--hover primary-btn--center">
				PLAY <?php echo $data->slotname ?> NOW
				<div class="white__inner-circle">
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</div>
			</a>
			<div class="under__text">Get <?php echo $data->bonus ?> Free Bonus to Play For Real Money</div>
		</div>
	</div>
    </span>
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="title rating__title">What players <span class="green-text">love</span> about this game <i
                    class="green-line"></i></div>
            <?php echo $data->hits ?>
        </div>
        <div class="col-12 col-lg-6" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
            <span class="title rating__title">Ratings Breakdown</span>
            <?php echo $data->rating ?>
            <meta itemprop="bestRating" content="10"/>
        </div>
    </div>
</div>