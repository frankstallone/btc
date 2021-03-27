import { menu } from '../modules/menu';

export default {
  init() {
    // scripts here run on the DOM load event

    // Load drop down menu & mobile menu
    menu.init();
  },
  finalize() {
    // scripts here fire after init() runs
  },
};
