const siteFinderModel = (() => {
  var data;
  if (siteLang === 'fr') {
    data = {
      current: 0,
      slides: [
        {
          question: "À quel type de jeux de machines à sous jouez-vous?",
          subtext: "PVeuillez en sélectionner un ou plusieurs",
          choices: [
            {
              name: "CLASSIQUE",
              img: "classic_icon.png"
            },
            {
              name: "MACHINES À SOUS 3D",
              img: "3d_slots_icon.png"
            },
            {
              name: "MACHINES À SOUS JACKPOT",
              img: "jackpot_slots_icon.png"
            },
            {
              name: "VIDÉO",
              img: "video_slots_icon.png"
            },
            {
              name: "VEGAS",
              img: "vegas_slots_icon.png"
            }]
        },
        {
          question: "Le jeu aura combien de rouleaux? ",
          subtext: "",
          choices: [
            {
              name: "3 ROULEAUX",
              img: "3_reels.png"
            },
            {
              name: "5 ROULEAUX",
              img: "5_reels.png"
            },
            {
              name: "7 ROULEAUX",
              img: "7_reels.png"
            },
            {
              name: "N'Y PENSEZ PAS",
              img: "question_icon.png"
            }]
        },
        {
          question: "Quelle est votre méthode de paiement préférée?",
          subtext: "",
          choices: [
            {
              name: "visa",
              img: "visa_icon.png"
            },
            {
              name: "mastercard",
              img: "mastercard_icon.png"
            },
            {
              name: "paysafe card",
              img: "paysafe_icon.png"
            },
            {
              name: "CARTE DE DÉBIT INSTA",
              img: "instadebit_icon.png"
            },
            {
              name: "skrill",
              img: "skrill.png"
            },
            {
              name: "neteller",
              img: "neteller.png"
            }]
        },
        {
          question: "Trouver les meilleures promotions avec les options de bonus",
          subtext: "",
          choices: [
            {
              name: "DÉPÔT MULTIPLICATEUR",
              img: "deposit_multiplier_icon.png"
            },
            {
              name: "PAS DE DÉPÔT",
              img: "no_deposit_icon.png"
            },
            {
              name: "RECHARGE MENSUEL",
              img: "monthly_reload_icon.png"
            },
            {
              name: "BONUS DE BIENVENUE",
              img: "welcome_bonus_icon.png"
            },
            {
              name: "PROGRAMME DE FIDÉLITÉ VIP",
              img: "vip_loyalty_icon.png"
            },
            {
              name: "TOUR GRATUIT DE JETONS",
              img: "free_chips_icon.png"
            }]
        }
      ],
      selectedOptions: []
    };
  } else {
    data = {
      current: 0,
      slides: [
        {
          question: "What type of Slots games do you play?",
          subtext: "Please select one or more",
          choices: [
            {
              name: "classic",
              img: "classic_icon.png",
              imgWidth: 110,
              imgHeight: 54
            },
            {
              name: "3d slots",
              img: "3d_slots_icon.png",
              imgWidth: 100,
              imgHeight: 73
            },
            {
              name: "jackpot slots",
              img: "jackpot_slots_icon.png",
              imgWidth: 105,
              imgHeight: 60
            },
            {
              name: "video",
              img: "video_slots_icon.png",
              imgWidth: 76,
              imgHeight: 70
            },
            {
              name: "vegas",
              img: "vegas_slots_icon.png",
              imgWidth: 163,
              imgHeight: 53
            }]
        },
        {
          question: "How many reels will the game consist of?",
          subtext: "",
          choices: [
            {
              name: "3 reels",
              img: "3_reels.png",
              imgWidth: 93,
              imgHeight: 82
            },
            {
              name: "5 reels",
              img: "5_reels.png",
              imgWidth: 136,
              imgHeight: 82
            },
            {
              name: "7 reels",
              img: "7_reels.png",
              imgWidth: 180,
              imgHeight: 82
            },
            {
              name: "Don&apos;t Mind",
              img: "question_icon.png",
              imgWidth: 126,
              imgHeight: 83
            }]
        },
        {
          question: "What is your preferred Payment Option?",
          subtext: "",
          choices: [
            {
              name: "visa",
              img: "visa_icon.png",
              imgWidth: 134,
              imgHeight: 44
            },
            {
              name: "mastercard",
              img: "mastercard_icon.png",
              imgWidth: 91,
              imgHeight: 57
            },
            {
              name: "paysafe card",
              img: "paysafe_icon.png",
              imgWidth: 183,
              imgHeight: 31
            },
            {
              name: "insta debit card",
              img: "instadebit_icon.png",
              imgWidth: 89,
              imgHeight: 47
            },
            {
              name: "skrill",
              img: "skrill.png",
              imgWidth: 147,
              imgHeight: 51
            },
            {
              name: "neteller",
              img: "neteller.png",
              imgWidth: 200,
              imgHeight: 38
            }]
        },
        {
          question: "Find the best promotions with the bonus options",
          subtext: "",
          choices: [
            {
              name: "deposit multiplier",
              img: "deposit_multiplier_icon.png",
              imgWidth: 91,
              imgHeight: 74
            },
            {
              name: "no deposit ",
              img: "no_deposit_icon.png",
              imgWidth: 79,
              imgHeight: 76
            },
            {
              name: "monthly reload",
              img: "monthly_reload_icon.png",
              imgWidth: 64,
              imgHeight: 68
            },
            {
              name: "welcome bonus",
              img: "welcome_bonus_icon.png",
              imgWidth: 91,
              imgHeight: 81
            },
            {
              name: "VIP Loyalty",
              img: "vip_loyalty_icon.png",
              imgWidth: 109,
              imgHeight: 67
            },
            {
              name: "free chips spin",
              img: "free_chips_icon.png",
              imgWidth: 99,
              imgHeight: 77
            }]
        }
      ],
      selectedOptions: []
    };


  }
  return {
    getData: () => {
      return data;
    }
  };
})();

const UIController = (() => {

  const DOMStrings = {
    question: ".casino-finder__question",
    choice: ".casino-finder__choices__choice",
    choices: ".casino-finder__choices",
    slide: ".casino-finder__slide",
    next: ".casino-finder__btn--next",
    prev: ".casino-finder__btn--back",
    progress: ".casino-finder__progress__box",
    resultBtn: ".casino-finder__btn__result",
    toStart: ".casino-finder__btn__start",
    playNow: ".casino-finder__btn-playnow",
    results: ".casino-finder__results",
    container: ".casino-finder__container",
    path: "/images/site-finder/",
  };

  return {
    getDOMstrings: () => {
      return DOMStrings;
    }
  };
})();


const controller = ((M, UICtrl) => {

  const addClass = (target, hide) => {
    const targetElm = document.querySelector(target);
    targetElm.classList.add(hide);
  };

  const removeClass = (target, hide) => {
    const targetElm = document.querySelector(target);
    targetElm.classList.remove(hide);
  };

  const DOM = UICtrl.getDOMstrings();
  const data = M.getData();

  // display the slider
  const display = (current, slides) => {

    let slideHTML = "";
    // update the html to current slide
    for (let i = 0; i <= slides.length - 1; i++) {
      const slideChoices = slides[i].choices;
      // loop over all choices
      const allChoices = slideChoices
      .map(
        (item) =>
          `<div class="casino-finder__choices__choice" data-name='${item.name}'>
                        <img class="casino-finder__choices__img" src="${DOM.path}${item.img}" width="${item.imgWidth}" height="${item.imgHeight}">
                        <p class="casino-finder__choices__title">${item.name}</p>
                        </div>`
      )
      .join("");
      // Create the slide html
      slideHTML += `<div class="casino-finder__container">
                                  <div class="casino-finder__question">
                                    <h1>${slides[i].question}</h1>
                                    <span>${slides[i].subtext}</span>
                                  </div>
                            <div class="casino-finder__choices">
                                ${allChoices}
                                </div>
                            </div>
                          </div>`;
    }
    document.querySelector(DOM.slide).innerHTML = slideHTML;

  };
  // render to the screen with updated data
  display(data.current, data.slides);

  const choice = document.querySelectorAll(DOM.container);
  const option = document.querySelectorAll(DOM.choice);
  const resultBtn = document.querySelector(DOM.resultBtn);
  const progress = document.querySelectorAll(DOM.progress);
  let resultData;

  const activeCount = () => {
    // check all containers that do not have hidden class
    // and inside child element that have active (selected choice)
    const containerOnly = document.querySelectorAll('.casino-finder__container:not(.hide) .casino-finder__choices__choice.active');
    // only display next if one of the options have been selected
    if (containerOnly.length >= 1) {
      show(DOM.next);
      data.current === data.slides.length - 1 ? show(DOM.resultBtn) : "";
    } else {
      // use current to select the current prog box
      hide(DOM.next);
      hide(DOM.resultBtn);
      progress[data.current].classList.remove('tick');
    }
    // hide next as results btn is there
    data.current === data.slides.length - 1 ? hide(DOM.next) : "";
  };

  option.forEach(item => item.addEventListener('click', () => {
    item.classList.toggle('active');
    activeCount();

  }));

  const hideAtStart = (elem) => {
    data.current === 0 ? document.querySelector(elem).style.display = 'none' : document.querySelector(elem).style.display = 'inline-block';
  };

  const hide = (elem) => {
    document.querySelector(elem).style.display = 'none';
  };

  const show = (elem) => {
    document.querySelector(elem).style.display = 'inline-block';
  };

  // hide all apart from current number
  const hideShowSlides = (elem, hide) => {
    // hide all
    elem.forEach(item => (item.classList.add(hide)));
    // show first
    elem[data.current].classList.remove(hide);

    activeCount();
  };

  const hideResultBtn = () => {
    if (data.current === data.slides.length - 1) {
      show(DOM.resultBtn);
      hide(DOM.next);
    } else {
      hide(DOM.resultBtn);
      show(DOM.next);
    }
  };

  hideResultBtn();

  // add active data-name to array
  const getResults = () => {
    // clear results

    //Add tick to progress box
    progress[data.current].classList.add('tick');

    hide(DOM.prev);
    hide(DOM.resultBtn);
    show(DOM.toStart);
    show(DOM.playNow);

    // increase current for last box
    data.current++;
    // move active to last top box
    toggleProggress();

    // clear the selected options
    data.selectedOptions = [];

    option.forEach(item => {
      item.classList.contains('active') ? data.selectedOptions.push(item.dataset.name) : "";
    });

    // remove all slides
    choice.forEach(item => item.style.display = 'none');

    var translations;

    if (siteLang === 'fr') {
      translations = {
        theBestSlotsMatchForYou: 'Le meilleur match de machines à sous pour vous',
        bonusAmount: 'Montant du bonus',
        freeSpinsOffers: 'Offres de tours gratuits',
        readReview: 'Lire la revue',
        payoutOptions: 'Options de paiement',
        payoutSpeed: 'Rapidité des paiements',
        numberOfSlotsGameAvailable: 'Nombre de jeux de machines à sous disponibles',
        reelSlots: 'Machines à sous à rouleaux',
        multi: 'multi',
        freePlayYes: 'Jeu gratuit: Oui',
      };
    } else {
      translations = {
        theBestSlotsMatchForYou: 'The Best Slots Match for You',
        bonusAmount: 'Bonus Amount',
        freeSpinsOffers: 'FREE Spins Offers',
        readReview: 'Read Review',
        payoutOptions: 'Payout Options',
        payoutSpeed: 'Payout speed',
        numberOfSlotsGameAvailable: 'Number of Slots game available',
        reelSlots: 'Reel slots',
        multi: 'multi',
        freePlayYes: 'Free Play: Yes',
      };
    }


    resultData = `<div class="casino-finder__question"><h1>${translations.theBestSlotsMatchForYou}</h1></div>
                            <div class='casino-finder__results__content'>
                        <div class='casino-finder__results__content__box'>
                            <span>Jackpot City</span>
                            <span class='casino-finder__results__content__box-center'>
                                <a href="/go/jackpotcity/casino" target="_blank" rel="nofollow noreferrer">
                                    <img src="/images/logos/jackpotcity_large.png" alt="jackpot city logo" width="170" height="73">
                                 </a>
                            </span>
                        </div>
                        <div class='casino-finder__results__content__box'>
                            <span>${translations.bonusAmount} </span>
                            <span>$1600 </span>
                            <span>${translations.freeSpinsOffers}</span>
                            <span><img src="/images/site-finder/star_ratings.png" alt="ratings stars" width="98" height="17"></span>
                            <span><a href="https://www.onlineslots.ca/reviews/jackpot-city">${translations.readReview}</a></span>
                        </div>
                        <div class='casino-finder__results__content__box'>
                            <span>${translations.payoutOptions}: <img src="/images/site-finder/payment_options.png" alt="Payment Options" width="265" height="23"> </span>
                            <span>${translations.payoutSpeed}: 1-2 Days </span>
                            <span>${translations.numberOfSlotsGameAvailable}: 655+ </span>
                            <span>${translations.reelSlots}: 3, 5, 7, ${translations.multi} </span>
                            <span>${translations.freePlayYes}</span>
                        </div>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide"><img src="/images/site-finder/carousel_img1.png" width="252" height="158" alt="Screenshot of Starburst Reels"></div>
                              <div class="swiper-slide"><img src="/images/site-finder/carousel_img2.png" width="252" height="158">alt="Screenshot of Thunderstruck II Slot"></div>
                              <div class="swiper-slide"><img src="/images/site-finder/carousel_img3.png" width="252" height="158">alt="Screenshot of Gonzo's Quest Slot"></div>
                              <div class="swiper-slide"><img src="/images/site-finder/carousel_img4.png" width="252" height="158">alt="Screenshot of Jack Hammer Slot"></div>
                              <div class="swiper-slide"><img src="/images/site-finder/carousel_img5.png" width="252" height="158">alt="Screenshot of Pharaoh Slot"></div>
                              <div class="swiper-slide"><img src="/images/site-finder/carousel_img6.png" width="252" height="158">alt="Screenshot of Mega Moolah Slot"></div>
                              <div class="swiper-slide"><img src="/images/site-finder/carousel_img7.png" width="252" height="158">alt="Screenshot of Ariana Slot"></div>
                            </div>
                         </div>
                         <div class="swiper-button-next"></div>
                         <div class="swiper-button-prev"></div>
                         <div class="swiper-pagination"></div>`;

    // result html
    const ResultTemplate = `<div class="casino-finder__container results"><div class="casino-finder__results">${resultData}</div></div>`;
    // insert the results to the page
    document
    .querySelector(DOM.slide)
    .insertAdjacentHTML("beforeend", ResultTemplate);

    loadSlider();

  };

  const removeClasses = (elm, target) => {
    elm.forEach(item => item.classList.remove(target));
  };

  const toStart = () => {

    hideResultBtn();
    // remove results
    hide(DOM.results);
    // set data to 0
    data.current = 0;
    // display the side
    // remove all slides
    toggleProggress();

    choice.forEach(item => item.style.display = '');

    hideShowSlides(choice, 'hide');

    // display correct buttons
    hide(DOM.next, 'hide-btn');
    // display correct top box active
    hide(DOM.toStart, 'hide-btn');
    hide(DOM.playNow, 'hide-btn');

    // remove all active on choices
    removeClasses(option, 'active');

    // clear the result container
    document.querySelector('.casino-finder__container.results').outerHTML = '';

    // remove all tick classes
    removeClasses(progress, 'tick');
  };

  const loadSlider = () => {
    //Load swiper carousel with settings below
    const swiper = new Swiper('.casino-finder .swiper-container', {
      init: false,
      direction: 'horizontal',
      loop: true,
      spaceBetween: 10,
      slidesPerView: 5,
      pagination: '.swiper-pagination',
      paginationClickable: true,
      nextButton: '.swiper-button-next',
      prevButton: '.swiper-button-prev',
      preventClicks: true,
      preventClicksPropagation: false,
      breakpoints: {
        1024:
          {
            slidesPerView: 3,
          },
      },
    });

    setTimeout(() => {
      swiper.init();
    }, 300);

    swiper.on('init', () => {
      document.querySelector('.swiper-container').classList.add('active');
    });

  };

  document.querySelector(DOM.toStart).addEventListener('click', () => {
    toStart();
  });

  resultBtn.addEventListener('click', getResults);

  // toggle active for proggress based on current
  const toggleProggress = () => {
    progress.forEach(item => (item.classList.remove('active')));
    progress[data.current].classList.add('active');
  };

  // next slide
  const next = () => {

    const max = data.slides.length - 1;

    if (data.current < max) {
      progress[data.current].classList.add('tick');
      data.current++;
      hideShowSlides(choice, 'hide');
    } else if (data.current === max) {
      addClass(DOM.next, 'hide-btn');
    }

    hideAtStart(DOM.prev);
    hideResultBtn();
    toggleProggress();
    activeCount();

  };

  // prev slide
  const prev = () => {

    const max = data.slides.length - 1;

    if (data.current <= max && data.current > 0) {
      progress[data.current].classList.remove('tick');
      data.current--;
      hideShowSlides(choice, 'hide');
      toggleProggress();
      hide(DOM.resultBtn);
      removeClass(DOM.next, 'hide-btn');
    } else if (data.current === 0) {
      data.current = max;
      hideShowSlides(choice, 'hide');
      toggleProggress();
      removeClass(DOM.resultBtn, 'hide-btn');
    }
    hideAtStart(DOM.prev);

  };

  // next/prev func
  document.querySelector(DOM.next).addEventListener("click", next);
  document.querySelector(DOM.prev).addEventListener("click", prev);

  return {
    init: () => {
      toggleProggress();
      addClass(DOM.resultBtn, 'hide-btn');
      hideShowSlides(choice, 'hide');
      hideAtStart(DOM.prev);
    }
  };

})(siteFinderModel, UIController);

controller.init();
