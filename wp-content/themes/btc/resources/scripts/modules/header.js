import anime from 'animejs/lib/anime.es.js';

export const header = {
  init: function () {
    // scripts here run on the DOM load event
    const logo = document.querySelector('.brand');
    const mainNavigation = document.querySelector('#menu-primary').children;
    const items = Array.from([logo, mainNavigation]);

    anime({
      targets: items,
      translateY: [-100, 0],
      opacity: [0, 1],
      delay: anime.stagger(100),
      easing: 'easeInOutCirc',
      duration: 500,
    });
  },
  finalize() {
    // scripts here fire after init() runs
  },
};
