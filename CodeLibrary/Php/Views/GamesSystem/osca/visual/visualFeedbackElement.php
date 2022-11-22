<?php
    $feedbackOptions = $this->viewVariables;
?>

<div id="js_visualFeedbackElement" class="games-feedback">

    <div class="games-feedback__top">
        <p class="games-feedback__title">Give feedback</p>
        <span id="js_visualFeedbackClose" class="games-feedback__close js_actionDismiss"></span>
    </div>

    <div class="games-feedback__body">
        <div>
            <div class="games-feedback__options">
                <?php
                    $optionsRender = array();

                    foreach ($feedbackOptions as $feedbackObject) {
                        switch ($feedbackObject['value']) {
                            case 'brokengame':
                                $feedbackObject['icon'] = '<i class="games-feedback__sprite games-feedback__sprite--spinner"></i>';
                                $optionsRender[0] = $feedbackObject;
                                break;

                            case 'notlikegame':
                                $feedbackObject['icon'] = '<i class="games-feedback__sprite games-feedback__sprite--heart"></i>';
                                $optionsRender[1] = $feedbackObject;
                                break;

                            case 'georestricted':
                                $feedbackObject['icon'] = '<i class="games-feedback__sprite games-feedback__sprite--lock"></i>';
                                $optionsRender[2] = $feedbackObject;
                                break;

                            case 'other':
                                $feedbackObject['icon'] = '<i class="games-feedback__sprite games-feedback__sprite--chat"></i>';
                                $optionsRender[3] = $feedbackObject;
                                break;

                            default:
                                break;
                        }
                    }

                    foreach ($optionsRender as $feedbackObject) {
                        // Check if is callback defined
                        $callback = $feedbackObject['callback'] ? $feedbackObject['callback'] : '';
                        //
                        echo '<div class="js_feedbackContainer games-feedback__options__item">'.
                                '<div class="js_feedbackContainerOption" data-feedback-value="' . $feedbackObject['value'] . '" data-callback="' . $callback . '">'
                                    . $feedbackObject['icon']
                                    . '<span>'. $feedbackObject['label']. '</span>'
                                . '</div>'
                            . '</div>';
                    }
                    unset($feedbackObject);
                ?>
            </div>
        </div>

        <div class="games-feedback__ctas">
            <a class="js_actionSubmit games-feedback__submit-button primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover"
               rel="nofollow">
                Send Response
            </a>
            <!--            <a class="js_actionDismiss games-feedback__back-game-button">-->
            <!--                Back to Game-->
            <!--            </a>-->
        </div>
    </div>
</div>