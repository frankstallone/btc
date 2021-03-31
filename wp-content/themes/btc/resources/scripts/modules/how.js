import anime from 'animejs/lib/anime.es.js';

export const how = {
  init: function () {
    // scripts here run on the DOM load event
    //   const howToSteps = document.querySelectorAll('.how-to-steps');
    //   anime({
    //     targets: howToSteps,
    //     scale: [1, 1.05, 1], // from 100 to 250
    //     delay: anime.stagger(500),
    //     direction: 'alternate',
    //     duration: 10000,
    //     loop: true,
    //   });
  },
  finalize() {
    // scripts here fire after init() runs
  },
};
