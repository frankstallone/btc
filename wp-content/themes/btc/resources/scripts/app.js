// import external dependencies
import 'jquery';

// Import everything from autoload
// import './autoload/**/*';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import singleLoanGallery from './routes/loanGallery';
import home from './routes/home';
import contact from './routes/contact';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  contact,
  home,
  singleLoanGallery,
});

// Load Events
jQuery(() => {
  routes.loadEvents();
});
