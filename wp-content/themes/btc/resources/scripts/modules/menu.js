import anime from 'animejs/lib/anime.es.js';

export const menu = {
  init: function () {
    // Mobile navigation
    const mobileNavButtonOpen = document.querySelector(
      '.mobile-nav-button--open'
    );
    const mobileNavButtonClose = document.querySelector(
      '.mobile-nav-button--close'
    );

    mobileNavButtonOpen.addEventListener('click', animateHamburgerIn);
    mobileNavButtonClose.addEventListener('click', animateHamburgerOut);

    function animateHamburgerIn() {
      anime.timeline().add({
        targets: '.mobile-nav-button--open svg',
        easing: 'easeInOutCirc',
        scale: [0.75, 1.25, 1],
        duration: 400,
        rotate: [180, 0],
        complete: function () {
          openHamburger();
        },
      });
    }

    function animateHamburgerOut() {
      anime.timeline().add({
        targets: '.mobile-nav-button--close svg',
        easing: 'easeInOutCirc',
        scale: [0.75, 1.25, 1],
        duration: 400,
        rotate: [180, 0],
        complete: function () {
          openHamburger();
        },
      });
    }

    function openHamburger() {
      const mobileNavContainer = document.querySelector('.mobile-navigation');

      if (mobileNavContainer.classList.contains('mobile-nav--closed')) {
        mobileNavContainer.classList.remove('mobile-nav--closed', 'hidden');
        mobileNavContainer.classList.add('mobile-nav--open', 'flex');
        anime.timeline().add({
          targets: mobileNavContainer,
          easing: 'easeInOutCirc',
          opacity: [0, 1],
          duration: 400,
        });
      } else {
        anime.timeline().add({
          targets: mobileNavContainer,
          easing: 'easeInOutCirc',
          opacity: [1, 0],
          duration: 400,
          complete: function () {
            mobileNavContainer.classList.add('mobile-nav--closed', 'hidden');
            mobileNavContainer.classList.remove('mobile-nav--open', 'flex');
          },
        });
      }
    }

    // Toggle mobile navigation with escape key
    document.onkeydown = function (e) {
      e = e || window.event;
      var isEscape = false;
      if ('key' in e) {
        isEscape = e.key === 'Escape' || e.key === 'Esc';
      } else {
        isEscape = e.keyCode === 27;
      }
      if (isEscape) {
        openHamburger();
      }
    };

    // Dropdown menu
    const menuItemHasChildren = document.querySelector(
      '.menu-item-has-children a'
    );
    const showThisMenu = document.querySelector(
      '.menu-item-has-children .sub-menu'
    );

    menuItemHasChildren.addEventListener('click', animateDropDown);

    function animateDropDown(e) {
      e.preventDefault();

      if (
        !showThisMenu.getAttribute('aria-expanded') ||
        showThisMenu.getAttribute('aria-expanded') === 'false'
      ) {
        showThisMenu.setAttribute('aria-expanded', 'true');
        anime.timeline().add({
          targets: showThisMenu,
          easing: 'easeInOutCirc',
          translateY: [20, 0],
          opacity: [0, 1],
          begin: function () {
            showThisMenu.classList.toggle('grid');
          },
        });
      } else if (showThisMenu.getAttribute('aria-expanded') === 'true') {
        showThisMenu.setAttribute('aria-expanded', 'false');
        anime.timeline().add({
          targets: showThisMenu,
          easing: 'easeInOutCirc',
          translateY: [0, 20],
          opacity: [1, 0],
          complete: function () {
            showThisMenu.classList.toggle('grid');
          },
        });
      }
    }
  },
};
