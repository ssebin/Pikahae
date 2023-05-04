// homepage sliding pics

var counter = 2;
document.getElementById('radio1').checked = true;
setInterval(function () {
  document.getElementById('radio' + counter).checked = true;
  counter++;
  if (counter > 4) {
    counter = 1;
  }
}, 5000);

// review initialize swiper js

const swiper = new Swiper('.swiper', {
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    
});
