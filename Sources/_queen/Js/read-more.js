class readMore {
    init() {
        this.readEvent();
    }
    readEvent() {
        const container = document.querySelectorAll(".js-more");
        const btnText = document.querySelectorAll(".js-more__trigger");
        btnText.forEach((btn, count) => {
            btn.addEventListener('click', (e) => {
                if (container[count].classList.contains('js-more--active')) {
                    e.currentTarget.innerHTML = "Read more";
                    container[count].classList.remove('js-more--active');
                } else {
                    let lessText = btn.dataset.lessText ? btn.dataset.lessText : 'Read less'
                    e.currentTarget.innerHTML = lessText;
                    container[count].classList.add('js-more--active');
                }
            });
        });
    }
}

const ReadMore = new readMore();
ReadMore.init();
