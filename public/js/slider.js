document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll('.slider-item');
    let currentSlide = 0;

    //l'autoslide
    function showSlide(index) {
        slides[currentSlide].classList.remove('active');
        currentSlide = (index + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');

        fadeIn(slides[currentSlide]);
    }

    function fadeIn(element)
    {
        element.style.opacity = 0;
        element.style.transition = 'opacity 1s';

        setTimeout(function ()
        {
            element.style.opacity = 1;
        }, 100);

        setTimeout(function ()
        {
            fadeOut(slides[currentSlide]);
        }, 4000);
    }

    function fadeOut(element)
    {
        element.style.transition = 'opacity 1s';
        element.style.opacity = 0;

        setTimeout(function () {
            element.style.transition = '';
        }, 1000);
    }

    //plus tard ajout d'un bouton slide suivante
    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    //plus tard ajout d'un bouton précédente slide
    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    //c'est un autoslide de 5s
    setInterval(nextSlide, 5000);
});