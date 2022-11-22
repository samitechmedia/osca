//tabs
// Show the first tab by default
$('.tabs__item').hide();
$('.tabs__item:first').show();
$('.tabs__nav li:first').addClass('.tabs-nav__item--active');

// Change tab class and display content
$('.tabs__nav a').on('click', function(event){
    event.preventDefault();
    $('.tabs__nav li').removeClass('tabs-nav__item--active');
    $(this).parent().addClass('tabs-nav__item--active');
    $('.tabs__item').hide();
    $($(this).attr('href')).show();
});
