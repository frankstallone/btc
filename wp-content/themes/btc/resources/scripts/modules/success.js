import anime from 'animejs/lib/anime.es.js';

export const success = {
  init: function () {
    // scripts here run on the DOM load event

    const stories = document.querySelectorAll('.success-story');

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting === true) animiateNumbers(entry.target);
        });
      },
      { threshold: [0.5] }
    );

    stories.forEach((story) => {
      observer.observe(story);
    });

    function animiateNumbers(story) {
      // Grab all DOM nodes with numbers
      const successNumbers = story.querySelectorAll('.success-number');
      // Animate each of those
      successNumbers.forEach((story) => {
        if (story === undefined) return;

        // Setting up Intl.NumberFormat to format strings to USD
        const formatter = new Intl.NumberFormat('en-US', {
          style: 'currency',
          currency: 'USD',
          maximumSignificantDigits: 3,
        });

        let updatedNumber = {
          progress: '0',
        };

        anime({
          targets: updatedNumber,
          progress: () => {
            // Remove "$" and "," from string
            const cleanNumber = story.innerHTML.slice(1).replace(/,/g, '');
            return cleanNumber;
          },
          update: () => {
            story.innerHTML = formatter.format(updatedNumber.progress);
          },
          easing: 'easeInOutSine',
          round: 10,
          duration: 1000,
        });
      });
    }
  },
  finalize() {
    // scripts here fire after init() runs
  },
};
