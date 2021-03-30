import anime from 'animejs/lib/anime.es.js';

export default {
  init() {
    // scripts here run on the DOM load event
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.hero');
    textWrapper.innerHTML = textWrapper.textContent.replace(
      /\S/g,
      "<span class='letter'>$&</span>"
    );
    anime.timeline().add({
      targets: '.hero .letter',
      opacity: [0, 1],
      easing: 'easeOutExpo',
      delay: (el, i) => 70 * i,
    });
  },
  finalize() {
    // scripts here fire after init() runs
  },
};
