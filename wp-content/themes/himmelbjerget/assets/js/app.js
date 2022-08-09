document.addEventListener('DOMContentLoaded', function () {
    var menu = document.getElementById('main-menu');
    var burger = document.getElementById('menu-burger');
    var closeMenu = document.getElementById('menu-close');
    var menuItemHasChild = menu.querySelectorAll('.nav__list .menu-item-has-children > a');

    if (menu && burger && closeMenu && window.innerWidth <= 1024) {
        burger.addEventListener('click', function () {
            if (!menu.classList.contains('open')) {
                menu.classList.add('open');
                document.body.classList.add('no-scroll');
            }
        })

        window.addEventListener('click', function (e) {
            if (!menu.contains(e.target) && !burger.contains(e.target)) {
                menu.classList.remove('open');
                document.body.classList.remove('no-scroll');
            }
        })

        closeMenu.addEventListener('click', function () {
            menu.classList.remove('open');
            document.body.classList.remove('no-scroll');
        })

        menuItemHasChild.forEach((item) => {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                item.parentElement.classList.toggle('open');
            })
        })
    }

    var sliderContent = document.querySelector('.content-slider');
    if (sliderContent) {
        var BlockSlider = new Swiper(sliderContent, {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    }

    instFeedInit();
})

function instFeedInit()
{
    var feeds = document.getElementById('sbi_images');
    var feedsWrap = document.getElementById('insta-feeds');
    if (!feeds || !feedsWrap) {
        return;
    }

    var feedsList = feeds.querySelectorAll('.sbi_item .sbi_photo');
    var feedItem, i = 0;

    feedsList.forEach((feed) => {
        var feedBody = document.createElement('div');
        var feedImg = document.createElement('img');
        var img = feed.getAttribute('data-full-res');

        feedImg.setAttribute('src', img);
        feedBody.classList.add('feed-body');

        if (window.innerWidth > 800) {
            if (i === 5) {
                i = 0;
            }

            if (i === 4) {
                feedItem = document.createElement('div');
                feedItem.classList.add('feed-item');
                feedItem.classList.add('swiper-slide');
            }
        } else {
            if (i === 4) {
                i = 0;
            }
        }

        if (i === 0) {
            feedItem = document.createElement('div');
            feedItem.classList.add('feed-item');
            feedItem.classList.add('swiper-slide');
        }

        if (i > 0 && i <= 3) {
            feedItem = feedsWrap.lastChild;
        }

        if (i === 0) {
            feedItem.classList.add('item-group');
        }

        feedBody.appendChild(feedImg);
        feedItem.appendChild(feedBody);

        if (i === 0 || i === 4) {
            feedsWrap.appendChild(feedItem);
        }

        i++;
    })

    lightBoxEvents();

    var instaFeeds = new Swiper('.instagram-feeds__slider', {
        slidesPerView: 'auto',
        spaceBetween : 10,
        navigation   : {
            nextEl: ".swiper-btn-next",
            prevEl: ".swiper-btn-prev"
        },
        breakpoints  : {
            768: {
                spaceBetween : 20
            }
        }
    })

    instaFeeds.on('beforeSlideChangeStart', function () {
        if (!feedsWrap.classList.contains('start-position')) {
            return;
        }

        feedsWrap.classList.remove('start-position');
    });
}

function lightBoxEvents()
{
    var feedsWrap = document.getElementById('insta-feeds');
    var boxWrap = document.querySelector('.instagram-lightbox');
    
    if (!feedsWrap || !boxWrap) {
        return;
    }
    
    lightBoxShow(feedsWrap, boxWrap);
    lightBoxHide(feedsWrap, boxWrap);
}

function lightBoxShow(feedsWrap, boxWrap)
{
    var feeds = feedsWrap.querySelectorAll('.feed-body');
    var box = document.getElementById('insta-lbox');
    var image;

    feeds.forEach((feed) => {
        feed.addEventListener('click', function () {
            image = this.innerHTML;

            if (!image) {
                return;
            }

            box.innerHTML = image;
            boxWrap.classList.add('visible');
        })
    })
}

function lightBoxHide(feedsWrap, boxWrap)
{
    var boxClose = document.querySelector('.instagram-lightbox__close');
    if (!boxClose) {
        return;
    }

    boxClose.addEventListener('click', function () {
        if (!boxWrap.classList.contains('visible')) {
            return;
        }

        boxWrap.classList.remove('visible');
    })

    boxWrap.addEventListener('click', function (e) {
        if (e.target !== boxWrap || !boxWrap.classList.contains('visible')) {
            return;
        }

        boxWrap.classList.remove('visible');
    })
}