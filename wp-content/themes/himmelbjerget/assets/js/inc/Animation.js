class Animation
{
    constructor(containerSelector, args, scrollSettings = {}, to = false)
    {
        this.containerSelector = containerSelector;
        this.args = args;
        this.scrollSettings = scrollSettings;
        this.to = to;
        this.createAnimation();
    }

    containerBySelector()
    {
        return document.querySelectorAll(this.containerSelector);
    }

    createAnimation()
    {
        if (!this.containerBySelector()) {
            return;
        }
        gsap.utils.toArray(this.containerSelector).forEach(el => {
            var tl = gsap.timeline({
                scrollTrigger: {
                    trigger: el,
                    start  : "top 80%",
                    ...this.scrollSettings
                }
            });

            if (this.to) {
                tl.to(el, this.args);
            } else {
                tl.from(el, this.args);
            }
        });
    }
}
