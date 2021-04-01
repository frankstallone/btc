import { menu } from '../modules/menu';
import { header } from '../modules/header';
import { how } from '../modules/how';
import { success } from '../modules/success';

export default {
  init() {
    // scripts here run on the DOM load event

    // Load drop down menu & mobile menu
    menu.init();
    // Load header anmiation
    header.init();
    // Load How-to section anmiation
    how.init();
    // Load success stories sectionanimation
    success.init();
  },
  finalize() {
    // scripts here fire after init() runs
  },
};
