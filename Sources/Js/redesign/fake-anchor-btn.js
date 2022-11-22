var btns = document.querySelectorAll('button[data-href]');
Array.prototype.forEach.call(btns, function (btn) {
    btn.addEventListener('click', function (e) {
        e.preventDefault();
        window.location.href = window.location.origin + this.dataset.href;
    });
});
