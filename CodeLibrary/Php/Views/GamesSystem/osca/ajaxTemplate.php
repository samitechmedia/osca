<?php foreach($this->viewVariables['games'] as $freegame) {

    if($freegame['ratings_average'] > 0 && $freegame['ratings_average'] < 70){
        $freegame['ratings_average'] = mt_rand(70,90);
    }
    ?>
    <div class="indGameHolder" data-game-id="<?php echo $freegame['game_id']; ?>" >
        <a href="#" <?php if($this->viewVariables['deviceType'] == 'mobile'){?>rel="nofollow" target="_blank"<?php } ?> class="image_box" data-game-type="<?php echo $this->viewVariables['deviceType']; ?>">
            <div class="img-hover" ><span>Play Now</span></div>
            <?php if($freegame['new_game_status'] == '1') { ?>
                <span class="<?php echo $freegame['new_game_class']; ?>"></span>
            <?php } ?>
            <img alt="<?php echo $freegame['game_name']; ?>"
                 src="/images/uploads/<?php echo $freegame['image_url']; ?>"
                 width="174px" height="130px">
            <span><?php echo $freegame['game_name']; ?></span>
        <span class="freesGameRatingBox">
                        <span class="freesGameRating">
                        <span style="width: <?php echo $freegame['ratings_average']; ?>%"></span>
                    </span>
                </span>
        </a>
    </div>
    <?php
}
?>
