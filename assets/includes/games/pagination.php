<?php
include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/games/config.php';
//$dbc = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

$tab = $_POST['tab'];

if (isSet($_POST['lastId'])) {
    $lastId = $_POST['lastId'];
    $currentPage = $_POST['currentPage'];
    $nextPage = $currentPage + 1;

    $cq = "SELECT g.id AS id, 
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
                      LEFT JOIN ratings r ON g.id=r.id
where type_id = 2 LIMIT 85";
    $cdata = $dbc->query($cq);
    if ($cdata) {
        $rowcount = $cdata->rowCount();
    }

    if ($currentPage == "1") {
        $where_clause = '';
        $where_clause1 = 'Where';
    } else {
        $where_clause = "where g.id < $lastId";
        $where_clause1 = "where g.id < $lastId &&";
    }

//$query = "SELECT * FROM games where type_id = 1 $order_clause";
//$query = "SELECT * FROM games where type_id = 1 $where_clause $order_clause";
    if ($tab == 'popular') {
        //915,625,792,33,25
        $offset = ($currentPage - 1) * 2;
        $query = "SELECT g.id AS id, 
                     r.id AS r_id, 
                     g.provider_id AS provider_id,
                     g.name AS name, 
                     g.gamelink AS gamelink, 
                     g.type_id AS type_id, 
                     g.image_url AS image_url, 
                     g.created AS created,
                     r.average AS average 
                  FROM games g
                  LEFT JOIN ratings r ON g.id=r.id
                  
                
                  ORDER BY g.id IN(915,625,792,33,25) DESC
                  LIMIT {$offset}, 5";
        //  g.id <> 915 && g.id <> 625 && g.id <> 792 && g.id <> 33 && g.id <> 25
//    }elseif($tab == 'payouts') {
//        //915,625,752,144,111
//        $offset = ($currentPage -1) *5;
//        $query = "SELECT g.id AS id,
//                     r.id AS r_id,
//                     g.provider_id AS provider_id,
//                     g.name AS name,
//                     g.gamelink AS gamelink,
//                     g.type_id AS type_id,
//                     g.image_url AS image_url,
//                     g.created AS created,
//                     r.average AS average
//                  FROM games g
//                  LEFT JOIN ratings r ON g.id=r.id
//
//
//                  ORDER BY g.id IN(915,625,752,144,111) DESC
//                  LIMIT {$offset}, 5";
//    }elseif($tab == 'jackpots') {
//        //915,625,620,133,113
//        $offset = ($currentPage -1) *5;
//        $query = "SELECT g.id AS id,
//                     r.id AS r_id,
//                     g.provider_id AS provider_id,
//                     g.name AS name,
//                     g.gamelink AS gamelink,
//                     g.type_id AS type_id,
//                     g.image_url AS image_url,
//                     g.created AS created,
//                     r.average AS average
//                  FROM games g
//                  LEFT JOIN ratings r ON g.id=r.id
//
//
//                  ORDER BY g.id IN(915,625,620,133,113) DESC
//                  LIMIT {$offset}, 5";
//    }else{
//        $query = "SELECT g.id AS id,
//                     r.id AS r_id,
//                     g.provider_id AS provider_id,
//                     g.name AS name,
//                     g.gamelink AS gamelink,
//                     g.type_id AS type_id,
//                     g.image_url AS image_url,
//                     g.created AS created,
//                     r.average AS average
//                  FROM games g
//                  LEFT JOIN ratings r ON g.id=r.id
//                  $where_clause
//                  ORDER BY id DESC
//                  LIMIT 5";
    }
//echo $query;
    $data = $dbc->query($query);

    if ($data) {

        echo '<div class="blockTabs">';

        while ($row = $data->fetch()) {

            $ratingquery = "SELECT average FROM ratings where id = $row[id]";
            $result = $dbc->query($ratingquery);
            $rating = $result->fetch();
            $id = $row['id'];

            if ($row['average'] < 70) {
                $row['average'] = mt_rand(70, 90);
            }

            if (strlen($row['name']) > 16) {
                $name = substr($row['name'], 0, 16);
                $name .= '...';
            } else {
                $name = $row['name'];
            }


            echo '

<div class="freeGame-block">
<a href="#" id="' . $row['id'] . '">
                                <div class="freeGame-block_img">
                                  <img src="/assets/games/uploads/' . $row['image_url'] . '" alt="' . $row['name'] . '" style="height:127px;" />
                                </div>
                                <div class="freeGame-block_title">' . $name . '</div>
                                <div class="freeGame-block_reiting">
                                  <div class="freeGame-block_reiting_line" style="width: ' . $row['average'] . '%;"></div>
                                </div>
                                <div class="freeGame-block_btn">
                                  <span class="image_box">Play free</span>
                                </div>
</a>
                              </div>
                ';
        }
        echo '
</div>
                                                    <div class="paginations-box" id="' . $id . '">
                                                            <ul> ';
        $last = ceil($rowcount / 4);
        $end = $currentPage + 3;
        $prev = $currentPage - 1;
        if ($currentPage > 1) {
            echo '   <li class="pagin_item' . $active . '" data-id="1"><<</li>';
            echo '   <li class="pagin_item last' . $active . '" data-id="' . $prev . '"><</li>';
        }
        for ($i = $currentPage; $i <= $end; $i++) {
            if ($i == $currentPage) {
                $active = ' pagin_active';
            }
            echo '  <li class="pagin_item' . $active . '" data-id="' . $i . '">' . $i . '</li>';
            if ($i == $currentPage) {
                $active = '';
            }
            if ($i == $last) {
                break;
            }
        }
        if ($i != $last) {
            echo '   <li class="pagin_item' . $active . '" data-id="' . $nextPage . '">></li>';
            echo '   <li class="pagin_item last' . $active . '" data-id="' . $last . '">>></li>';
        }
        echo '   </ul>
                                                        </div>';
        echo '
<div class="loader" style="display:none;">
<img class="loader-image" src="/images/lkimages/dots-loader.GIF" alt="Loading image">
</div>
';

    } else {
        echo "<p>There are no more games to load.</p>";
    }

}
