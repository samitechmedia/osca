<script type="text/javascript">

    var freeGamesConfigVars={
        start: function(){
            var gamesConfig = {
            <?php
            foreach($this->viewVariables['config'] as $key => $value){
            $api=false;
            if(array_key_exists('api', $value)){
                $api = true;
            }
            ?>

            <?php echo $value['jsname']?>:{
                type:'<?php echo $value['type']?>',
                    name:'<?php echo $value['name']?>'<?php if($api){echo','.PHP_EOL;}else{echo PHP_EOL;}?>
                <?php if($api){echo 'api:';?>'<?php echo $value['api']?>'
                <?php } ?>
            },

            <?php } ?>

        }
            return gamesConfig;
        },

        classInstanceVars: function(){

            var classConfig= {
                <?php
                foreach ($this->viewVariables['classInstance'] as $key =>$value) {
                    echo $key.': \''.$this->viewVariables['classInstance'][$key].'\','.PHP_EOL;
                }
                ?>
            }
            return classConfig;
        }

    }
</script>
<script src="/Sources/Js/games.js"></script>

