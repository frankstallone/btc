import { menu } from '../modules/menu';
import { success } from '../modules/success';

export default {
  init() {
    // scripts here run on the DOM load event

    // Load drop down menu & mobile menu
    menu.init();
    // Load success stories animation
    success.init();
  },
  finalize() {
    // scripts here fire after init() runs
  },
};
