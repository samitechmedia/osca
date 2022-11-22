<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 07/08/18
 * Time: 17:37
 */

// temporary fix for inactive class under `nextActive` and `nextPageSetActive`
// addressed under CL but need to await approval, merge and push

if(isset($this->viewVariables['nextActive']) === false){
    if($this->viewVariables['pagesToShow'] <= 1){
        $this->viewVariables['nextActive'] = 'inactive';
    }
}

if(isset($this->viewVariables['nextPageSetActive']) === false){
    $this->viewVariables['nextPageSetActive'] = $this->viewVariables['nextActive'];
}
?>

<div id="<?php echo $this->viewVariables['config']['paginator']['name']; ?>"
     data-total-games="<?php echo $this->viewVariables['totalCount']; ?>"
     data-pages-to-show="<?php echo $this->viewVariables['pagesToShow']; ?>"
     data-next-slice="<?php echo $this->viewVariables['nextSlice']; ?>"
     class="pagination js_visualGamesPaginationContainer">
    <nav data-pagination>
        <a data-pagination-type="prevPage" class="js_PaginationButtonPrev caret__left inactive">
            <i class="fa fa-caret-left"></i>
        </a>

        <div class="js_visualGamesPaginationRow">
        <?php for ($i = 1; $i <= $this->viewVariables['pagesToShow']; $i++): ?>
            <a class="<?php if ($i == 1) {echo "active";} ?>"
                <?= $this->viewVariables['pagesToShow'] < $i ? 'style="display:none"' : '' ?>
               data-pagination-type="pageNumber"
               data-slice="<?php echo $i * $this->viewVariables['onPage'] - $this->viewVariables['onPage']; ?>">
                <?php echo $i ?>
            </a>
        <?php endfor ?>
        </div>

        <a data-pagination-type="nextPage" class="js_PaginationButtonNext caret__right">
            <i class="fa fa-caret-right"></i>
        </a>
    </nav>
</div>
