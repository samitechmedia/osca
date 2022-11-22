<?php
    if (empty($excludeArcadeSingleGame)) {
?>
<m-demo-view>
    <div class="m-demo-view mb-8">
        <svg class="m-demo-view__img m-demo-view__img--holder" role="img" aria-labelledby="title" viewBox="0 0 500 375" xmlns="http://www.w3.org/2000/svg"><title><?php echo $slotName; ?> free game placeholder</title><path fill="#f1f1f1" d="M0 0h500v375H0z"/><text fill="#555555" font-size="20" x="50%" y="185" text-anchor="middle"><tspan font-weight="bold">Hold tight while we load up </tspan><tspan x="50%" y="210"><?php echo $slotName; ?></tspan></text></svg>
    </div>
</m-demo-view>
<?php
    }
?>
