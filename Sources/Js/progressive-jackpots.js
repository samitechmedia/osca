$(document).ready(function() {

    $('.filter-clear').on('click', function() {
        $('.list-casino .item').removeClass('selected');			
        $('.switch-light input').prop('checked', false); 	
    });

    $('.choose-casinos').on('click', function() {
        $('.select-casino').slideToggle(1000);
        $(this).toggleClass('open');
        
    });
});