import anime from 'animejs/lib/anime.es.js';

export const how = {
  init: function () {
    // scripts here run on the DOM load event
    const howToSteps = document.querySelectorAll('.how-to-steps');
    anime({
      targets: howToSteps,
      keyframes: [
        { translateX: '75%', right: '75%' },
        { translateX: '50%', right: '50%' },
        { translateX: '25%', right: '25%' },
        { translateX: '50%', right: '50%' },
      ],
      delay: anime.stagger(500, {
        easing: 'linear',
      }),
      direction: 'alternate',
      easing: 'linear',
      duration: 15000,
      loop: true,
    });
  },
  finalize() {
    // scripts here fire after init() runs
  },
};
