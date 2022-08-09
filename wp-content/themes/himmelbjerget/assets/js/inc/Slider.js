class Slider
{
    constructor(container, args = {})
    {
        this.container = container;
        this.args = args;
        this.createSlider();
    }

    createSlider()
    {
        if (!this.container) {
            return;
        }


        this.container.imagesLoaded(() => {
            this.container.on('initialized.owl.carousel', (event) => {
                setTimeout(() => this.container.removeClass('imageloaded'), 0);
            });

            var args = {
                items    : 1,
                loop     : true,
                autoplay : false,
                nav      : false,
                margin   : 10,
                autoWidth: true,
                dots     : true,
                ...this.args
            };
            this.container.owlCarousel(args);
        });
    }
}
