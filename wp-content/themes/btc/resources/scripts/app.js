// import external dependencies
import 'jquery';

// Import everything from autoload
// import './autoload/**/*';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import singleLoanGallery from './routes/loanGallery';
import home from './routes/home';
// import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  // aboutUs,
  // Single Loan Gallery
  singleLoanGallery,
});

// Load Events
jQuery(() => {
  routes.loadEvents();
});
