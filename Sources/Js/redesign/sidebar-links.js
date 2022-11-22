var sidebarLinks = Array.prototype.slice.call(document.querySelectorAll('.aside-links .aside-links__link'));

sidebarLinks.forEach(function (link) {
    link.addEventListener('click', function (e) {
        if (e.target.classList.contains('aside-links__link')) {
            sidebarLinks.forEach(function (link) { link.classList.remove('active'); });
            e.target.classList.add('active');
        }
    })
})