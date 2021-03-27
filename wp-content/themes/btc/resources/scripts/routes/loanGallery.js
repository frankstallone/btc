import Cocoen from 'cocoen';

export default {
  init() {
    // scripts here run on the DOM load event
    new Cocoen(document.querySelector('.cocoen'));
  },
  finalize() {
    // scripts here fire after init() runs
  },
};
