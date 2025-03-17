let $slides, interval, $selectors, $btns, currentIndex, nextIndex;
const baseURL = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/544318';
const data = [
    { title: 'Forest', imgLeft: baseURL + '/forest-left.jpg', imgRight: baseURL + '/forest-right.jpg' },
    { title: 'Mountain', imgLeft: baseURL + '/mountain-left.jpg', imgRight: baseURL + '/mountain-right.jpg' },
    { title: 'Ocean', imgLeft: baseURL + '/ocean-left.jpg', imgRight: baseURL + '/ocean-right.jpg' },
    { title: 'Canyon', imgLeft: baseURL + '/canyon-left.jpg', imgRight: baseURL + '/canyon-right.jpg' },
    { title: 'Lake', imgLeft: baseURL + '/lake-left.jpg', imgRight: baseURL + '/lake-right.jpg' }
];

const cycle = index => {
    let $currentSlide, $nextSlide, $currentSelector, $nextSelector;

    nextIndex = index !== undefined ? index : nextIndex;

    $currentSlide = $($slides.get(currentIndex));
    $currentSelector = $($selectors.get(currentIndex));

    $nextSlide = $($slides.get(nextIndex));
    $nextSelector = $($selectors.get(nextIndex));

    $currentSlide.removeClass("active").css("z-index", "0");
    $nextSlide.addClass("active").css("z-index", "1");

    $currentSelector.removeClass("current");
    $nextSelector.addClass("current");

    currentIndex = index !== undefined
        ? nextIndex
        : currentIndex < $slides.length - 1 
            ? currentIndex + 1 
            : 0;

    nextIndex = currentIndex + 1 < $slides.length ? currentIndex + 1 : 0;
};

$(document).ready(() => {
    currentIndex = 0;
    nextIndex = 1;

    // Dynamically create slides
    const $slideList = $('#slides');
    const $selectorList = $('#slide-select');
    data.forEach((item, index) => {
        $slideList.append(`
            <li class="slide">
                <div class="slide-partial slide-left">
                    <img src="${item.imgLeft}" />
                </div>
                <div class="slide-partial slide-right">
                    <img src="${item.imgRight}" />
                </div>
                <h1 class="title">
                    <span class="title-text">${item.title}</span>
                </h1>
            </li>
        `);
        $selectorList.append(`<li class="selector"></li>`);
    });

    // Set initial active slide and selector
    $slides = $(".slide");
    $selectors = $(".selector");
    $btns = $(".btn");

    $slides.first().addClass("active");
    $selectors.first().addClass("current");

    interval = setInterval(cycle, 6000);

    $selectors.on("click", e => {
        const target = $selectors.index(e.target);
        if (target !== currentIndex) {
            clearInterval(interval);
            cycle(target);
            interval = setInterval(cycle, 6000);
        }
    });

    $btns.on("click", e => {
        clearInterval(interval);
        if ($(e.target).hasClass("prev")) {
            let target = currentIndex > 0 ? currentIndex - 1 : $slides.length - 1;
            cycle(target);
        } else if ($(e.target).hasClass("next")) {
            cycle();
        }
        interval = setInterval(cycle, 6000);
    });
});
