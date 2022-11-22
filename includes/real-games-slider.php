<!-- New block Free Games -->
<div class="free-slot__panel row">
    <?php
        $dbc = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
        $query = "SELECT g.id AS id,
        c.id AS c_id,
        g.provider_id AS provider_id,
        g.name AS name,
        g.gamelink AS gamelink,
        g.type_id AS type_id,
        g.image_url AS image_url,
        g.created AS created,
        c.clicks AS c_clicks,
        r.average AS average
        FROM games g
        LEFT JOIN clicks c ON g.id=c.id
        LEFT JOIN ratings r ON g.id=r.id ORDER BY g.id IN(18,45,84,83,32) DESC
            LIMIT 0, 4";
        //where g.id IN(915,625,792,33,25) ORDER by FIELD(g.id, 915,625,792,33,25)
        $data = mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($data)){
            $id = $row['id'];
            if($row['average'] < 70){
                $row['average'] = mt_rand(70,90);
            }
            if(strlen($row['name'])>16){
                $name = substr($row['name'], 0, 16);
                $name.='...';
            }
            else{
                $name = $row['name'];
            }

            echo '
                <div class="free-slot__panel-item col-12 col-lg-6">
                    <a href="#" class="type-display-flex type-flex-justify-center">
                    <div class="free-slot__panel-holder">
                        <img class="lazy" data-src="/assets/games/uploads/'.$row['image_url'].'" src="/images/rings.svg" alt="'.$row['name'].'" style="height:127px;" />
                    </div>
                    <div class="free-slot__info">
                        <span class="free__slot-title">'.$row['name'].'</span>
                        <div class="primary-btn primary-btn--border-orange primary-btn--background-orange primary-btn--box-shadow-orange primary-btn--hover">
                            PLAY NOW
                            <div class="white__inner-circle">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>  ';

            $new_marker = false;
        }
    ?>
</div>
