'use strict';

var windowWidth = window.innerWidth;

document.querySelector('.js__nav-toggle').addEventListener('click', function (e) {
    if (windowWidth > 1199) {
        return;
    }
    e.preventDefault();

    document.querySelector('.hamburger').classList.toggle("is-active");
    document.body.classList.toggle('js__nav-active');
});

/*nav panel*/
document.querySelectorAll('.js__menu-switch').forEach((el) => {
    el.addEventListener('click', function (e) {
        if (windowWidth > 1199) {
            return;
        }
        e.preventDefault();

        clickOnMenu(el);

        el.classList.toggle('item__active');
    });
});

closeAll();

window.onresize = function () {
    windowWidth = window.innerWidth;
    closeAll();
};

function clickOnMenu(element) {
    var elementToAction = element.closest('.js__menu-parent').querySelectorAll('.js__menu-list')[0];

    closeAll(elementToAction);

    elementToAction.classList.toggle('js__menu-list_active');
}

function closeAll(currentElement) {
    document.querySelectorAll('.js__menu-list').forEach(function (el) {
        if (el !== currentElement) {
            el.classList.remove('js__menu-list_active');
        }
    });
}

