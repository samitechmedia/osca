<?php
    $links = array('/games/free-slots', '/');
    $page = $_SERVER['REQUEST_URI'];
    # code...
    if (!in_array($_SERVER['REQUEST_URI'], $links)) {
        //make a new breadcrumbs object
        $breadcrumb = new CodeLibrary\Php\Controllers\BreadcrumbSystem\BreadcrumbSystem(false);
       
        //surround it with goodness
        echo '<div class="breadcrumbs__block">
                 <div class="container"> ';

                 $breadcrumb->generateBreadcrumbs();

        echo   ' </div>
            </div>';
        return true;
    } else {
        return false;
    }
?>
