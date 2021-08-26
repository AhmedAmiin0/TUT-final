
new WOW().init();

var typed = new Typed('.text-animation', {
    /**
     * @property {array} strings strings to be typed
     * @property {string} stringsElement ID of element containing string children
     */
    strings: [
      'Chill with the mummies',
      'Chill with the mummies',
      'Visit Egypt'
    ],
    loop:true,
    typeSpeed: 200,
    startDelay: 100,
    backSpeed: 50,
    showCursor: false,
    cursorChar: '',
    autoInsertCss: false,
})

window.onscroll = function() {myFunction()};
let sticky = $('#navbar').offsetTop;
function myFunction()
{
  if (window.pageYOffset >= 50)
  {

    $('.navbar').classList.add('scroll')

    
  } else 
  {
    $('.navbar').classList.remove('scroll')

  }
}



if($('#swiper1')){

let swiper1 = new Swiper('#swiper1', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

   // If we need pagination
   // pagination: {
   //   el: '.swiper-pagination',
   // },
   autoplay: {
     delay: 4000,
   },
});
}
if($('#mySwiper1')){

 var swiper = new Swiper("#mySwiper1", {
  loop: true,

  // If we need pagination
  // pagination: {
  //   el: '.swiper-pagination',
  // },
  autoplay: {
    delay: 3000,
  },
  slidesPerView: 1,
  spaceBetween: 10,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 50,
    },

  },
  
});
}


