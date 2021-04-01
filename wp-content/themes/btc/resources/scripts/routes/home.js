import anime from 'animejs/lib/anime.es.js';

export default {
  init() {
    // scripts here run on the DOM load event
    // Wrap every letter in a span
    const letterWrapper = document.querySelector('.hero');
    letterWrapper.innerHTML = letterWrapper.textContent.replace(
      /\S/g,
      "<span class='letter'>$&</span>"
    );
    anime({
      targets: '.hero .letter',
      opacity: [0, 1],
      easing: 'easeOutExpo',
      delay: (el, i) => 70 * i,
    });

    const heroPattern = document.querySelector('.btc-pattern-hero');
    anime({
      targets: heroPattern,
      translateX: ['-50%', '-60%'],
      direction: 'alternate',
      easing: 'linear',
      duration: 4000,
      loop: true,
    });
  },
  finalize() {
    // scripts here fire after init() runs
  },
};
