<?php
session_start();
if (isset($_SERVER['HTTP_AUTHORIZE']) && isset($_SESSION['AUTHORIZE']) && $_SERVER['HTTP_AUTHORIZE'] == $_SESSION['AUTHORIZE']) {
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/games/config.php");

    if (isset($_GET['game'])) {
        $dirty_id = $_GET['game'];
    }
    if (isset($_GET['rating'])) {
        $dirty_rating = $_GET['rating'];
    }

    $id = trim($dirty_id);
    $rating = trim($dirty_rating);

    $query = "SELECT id,num_count,average FROM ratings WHERE id = :id";
    $statement = $dbc->prepare($query);
    $statement->execute(compact('id'));
    $rowCount = $statement->rowCount();

    if ($rowCount > 0) {
        $query = "	UPDATE ratings
                SET average = :rating/(num_count+1) + average*(num_count/(num_count+1)),
                num_count = num_count + 1
                WHERE id = :id";


    } else {
        $query = "INSERT INTO ratings(id,num_count,average) VALUES (:id,'1',:rating)";
    }

    try {
        $statement = $dbc->prepare($query);
        $statement->execute(compact('rating', 'id'));
    } catch (Exception $e) {
        $error_message = $e->getMessage();
        echo '<p>' . $error_message . '</p>';
        exit();
    }
} else {
    echo 'access denied!!';
}
