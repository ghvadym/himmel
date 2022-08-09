document.addEventListener('DOMContentLoaded', function () {
    gsap.registerPlugin(ScrollTrigger);

    var startAnimation = "20% 5%";

    new Animation('.block-hero__body', {
        clipPath:'polygon(0 0,100% 0,100% 100%,0 100%)'
    },{ start: startAnimation, scrub: true},true);
})