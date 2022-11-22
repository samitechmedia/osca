<div class="border-box" style="margin-top:0; padding-top:0;">
    <div class="sortingOptionsBox flRow">
        <div class="sortingOptionsHeader ralewaybold">SORTING OPTIONS</div>
        <div class="sortingOptionsBody">
            <div class="sortByProviderOptions">
                <span class="sortOptionsTitle flRow ralewaybold">ORDER BY</span>
                <div class="styledSelectBox">
                    <select class="styledSelect" name="providers" id="<?php echo $this->viewVariables['config']['orderby']['name']; ?>">
                        <option selected="selected" value="1">Most Popular</option>
                        <option value="2">A to Z</option>
                        <option value="3">Z to A</option>
                        <option value="4">Highest Rated</option>
                        <option value="5">Most Popular</option>
                    </select>
                    <div class="styledSelectText order">Order By</div>
                </div>
            </div>
                <div class="sortByProviderOptions">
                    <span class="sortOptionsTitle flRow ralewaybold">SORT BY GAME TYPE</span>
                    <div class="styledSelectBox">
                        <select class="styledSelect" name="providers" id="<?php echo $this->viewVariables['config']['game']['name']; ?>">
                            <option value="0" selected="selected">All</option>
                            <?php foreach($this->viewVariables['games'] as $key => $filter){  ?>
                                <option value="<?php echo $key; ?>"><?php echo  $filter; ?></option>
                            <?php } ?>
                        </select>
                        <div class="styledSelectText game">Select a Game Type</div>
                    </div>
                </div>
            <div class="sortByProviderOptions">
                <span class="sortOptionsTitle flRow ralewaybold">SORT BY PROVIDER</span>
                <div class="styledSelectBox">
                    <select class="styledSelect" name="providers" id="<?php echo $this->viewVariables['config']['provider']['name']; ?>">
                        <option value="0" selected="selected">All</option>
                        <?php foreach($this->viewVariables['providers'] as $key => $filter){  ?>
                        <option value="<?php echo $key; ?>"><?php echo  $filter; ?></option>
                        <?php } ?>
                    </select>
                    <div class="styledSelectText provider">Select a Provider</div>
                </div>
            </div>
            <div class="filterResultBox flRow">
                <span id="<?php echo $this->viewVariables['config']['filterinformationcount']['name']; ?>" class="filterResult ralewaybold"><span>Games Available: </span><span><?php echo $this->viewVariables['count']; ?></span></span>
                <span id="<?php echo $this->viewVariables['config']['filterinformationfilter']['name']; ?>" class="filterResult ralewaybold"><span>Current Filters: </span><span>None</span></span>
                  <span id="<?php echo $this->viewVariables['config']['filterinformationorderby']['name']; ?>" class="filterResult ralewaybold"><span>Current Order: </span><span>Most Popular</span></span>              
                
            </div>
        </div>
    </div>
<div class="clear"></div>








