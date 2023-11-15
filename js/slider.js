const slides = document.querySelectorAll('.slide');
let curSlide = 0;

// Интервал переключения - 5 секунд
const interval = 5000; 

setInterval(() => {
// Скрываем текущий слайд
slides[curSlide].classList.remove('active');

// Переключаем на следующий по индексу
curSlide++;
if(curSlide >= slides.length) {
    curSlide = 0; 
}

// Показываем новый слайд
slides[curSlide].classList.add('active');

}, interval);



document.addEventListener('DOMContentLoaded', () => {
    if(!slides) return; 
    function initSlider()
    {
        function owl_carousel()
        {
            $('.slide').owl_carousel
            ({
                autoplay:true,
                responsiveClass:true,
                dots:true,
                items : 1, //10 items above 1000px browser width
                responsive:
                {
                    0:{
                        items:1,
                        nav:false
                    },
                    600:{
                        items:1,
                        nav:false
                    },
                    1000:{
                        items:1,
                        nav:false,
                    }
                }, loop: true
            });
        }
    }
    initSlider();
});