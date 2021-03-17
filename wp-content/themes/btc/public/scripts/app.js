/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunk"] = self["webpackChunk"] || []).push([["/scripts/app"],{

/***/ "./resources/scripts/app.js":
/*!**********************************!*\
  !*** ./resources/scripts/app.js ***!
  \**********************************/
/***/ (function() {

eval("// Roughed in mobile nav\n// https://dev.to/linhtch90/responsive-navigation-menu-with-plain-javascript-1fn4\nvar mobileNavButton = document.querySelector('#nav-mobile-toggle');\nvar primaryNav = document.querySelector('.nav-primary');\nvar mobileNavCloseButton = document.querySelector('.nav-mobile-close');\nmobileNavButton.addEventListener('click', openHamberger);\nmobileNavCloseButton.addEventListener('click', openHamberger);\n\nfunction openHamberger() {\n  primaryNav.classList.toggle('showNav');\n  primaryNav.classList.toggle('nav-primary');\n  console.log(\"ran\");\n} // Toggle menu on escape key\n\n\ndocument.onkeydown = function (evt) {\n  evt = evt || window.event;\n  var isEscape = false;\n\n  if ('key' in evt) {\n    isEscape = evt.key === 'Escape' || evt.key === 'Esc';\n  } else {\n    isEscape = evt.keyCode === 27;\n  }\n\n  if (isEscape) {\n    openHamberger();\n  }\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc2NyaXB0cy9hcHAuanM/Y2U0YyJdLCJuYW1lcyI6WyJtb2JpbGVOYXZCdXR0b24iLCJkb2N1bWVudCIsInByaW1hcnlOYXYiLCJtb2JpbGVOYXZDbG9zZUJ1dHRvbiIsImNvbnNvbGUiLCJldnQiLCJ3aW5kb3ciLCJpc0VzY2FwZSIsIm9wZW5IYW1iZXJnZXIiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQSxJQUFNQSxlQUFlLEdBQUdDLFFBQVEsQ0FBUkEsYUFBQUEsQ0FBeEIsb0JBQXdCQSxDQUF4QjtBQUNBLElBQU1DLFVBQVUsR0FBR0QsUUFBUSxDQUFSQSxhQUFBQSxDQUFuQixjQUFtQkEsQ0FBbkI7QUFDQSxJQUFNRSxvQkFBb0IsR0FBR0YsUUFBUSxDQUFSQSxhQUFBQSxDQUE3QixtQkFBNkJBLENBQTdCO0FBRUFELGVBQWUsQ0FBZkEsZ0JBQUFBLENBQUFBLE9BQUFBLEVBQUFBLGFBQUFBO0FBQ0FHLG9CQUFvQixDQUFwQkEsZ0JBQUFBLENBQUFBLE9BQUFBLEVBQUFBLGFBQUFBOztBQUVBLFNBQUEsYUFBQSxHQUF5QjtBQUN2QkQsRUFBQUEsVUFBVSxDQUFWQSxTQUFBQSxDQUFBQSxNQUFBQSxDQUFBQSxTQUFBQTtBQUNBQSxFQUFBQSxVQUFVLENBQVZBLFNBQUFBLENBQUFBLE1BQUFBLENBQUFBLGFBQUFBO0FBQ0FFLEVBQUFBLE9BQU8sQ0FBUEEsR0FBQUEsQ0FBQUEsS0FBQUE7RUFHRjs7O0FBQ0FILFFBQVEsQ0FBUkEsU0FBQUEsR0FBcUIsVUFBQSxHQUFBLEVBQWU7QUFDbENJLEVBQUFBLEdBQUcsR0FBR0EsR0FBRyxJQUFJQyxNQUFNLENBQW5CRCxLQUFBQTtBQUNBLE1BQUlFLFFBQVEsR0FBWixLQUFBOztBQUNBLE1BQUksU0FBSixHQUFBLEVBQWtCO0FBQ2hCQSxJQUFBQSxRQUFRLEdBQUdGLEdBQUcsQ0FBSEEsR0FBQUEsS0FBQUEsUUFBQUEsSUFBd0JBLEdBQUcsQ0FBSEEsR0FBQUEsS0FBbkNFLEtBQUFBO0FBREYsR0FBQSxNQUVPO0FBQ0xBLElBQUFBLFFBQVEsR0FBR0YsR0FBRyxDQUFIQSxPQUFBQSxLQUFYRSxFQUFBQTtBQUNEOztBQUNELE1BQUEsUUFBQSxFQUFjO0FBQ1pDLElBQUFBLGFBQWE7QUFDZDtBQVZIUCxDQUFBQSIsInNvdXJjZXNDb250ZW50IjpbIi8vIFJvdWdoZWQgaW4gbW9iaWxlIG5hdlxuLy8gaHR0cHM6Ly9kZXYudG8vbGluaHRjaDkwL3Jlc3BvbnNpdmUtbmF2aWdhdGlvbi1tZW51LXdpdGgtcGxhaW4tamF2YXNjcmlwdC0xZm40XG5jb25zdCBtb2JpbGVOYXZCdXR0b24gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjbmF2LW1vYmlsZS10b2dnbGUnKTtcbmNvbnN0IHByaW1hcnlOYXYgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcubmF2LXByaW1hcnknKTtcbmNvbnN0IG1vYmlsZU5hdkNsb3NlQnV0dG9uID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLm5hdi1tb2JpbGUtY2xvc2UnKTtcblxubW9iaWxlTmF2QnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgb3BlbkhhbWJlcmdlcik7XG5tb2JpbGVOYXZDbG9zZUJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIG9wZW5IYW1iZXJnZXIpO1xuXG5mdW5jdGlvbiBvcGVuSGFtYmVyZ2VyKCkge1xuICBwcmltYXJ5TmF2LmNsYXNzTGlzdC50b2dnbGUoJ3Nob3dOYXYnKTtcbiAgcHJpbWFyeU5hdi5jbGFzc0xpc3QudG9nZ2xlKCduYXYtcHJpbWFyeScpO1xuICBjb25zb2xlLmxvZyhgcmFuYCk7XG59XG5cbi8vIFRvZ2dsZSBtZW51IG9uIGVzY2FwZSBrZXlcbmRvY3VtZW50Lm9ua2V5ZG93biA9IGZ1bmN0aW9uIChldnQpIHtcbiAgZXZ0ID0gZXZ0IHx8IHdpbmRvdy5ldmVudDtcbiAgdmFyIGlzRXNjYXBlID0gZmFsc2U7XG4gIGlmICgna2V5JyBpbiBldnQpIHtcbiAgICBpc0VzY2FwZSA9IGV2dC5rZXkgPT09ICdFc2NhcGUnIHx8IGV2dC5rZXkgPT09ICdFc2MnO1xuICB9IGVsc2Uge1xuICAgIGlzRXNjYXBlID0gZXZ0LmtleUNvZGUgPT09IDI3O1xuICB9XG4gIGlmIChpc0VzY2FwZSkge1xuICAgIG9wZW5IYW1iZXJnZXIoKTtcbiAgfVxufTtcbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvc2NyaXB0cy9hcHAuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/scripts/app.js\n");

/***/ }),

/***/ "./resources/styles/app.scss":
/*!***********************************!*\
  !*** ./resources/styles/app.scss ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc3R5bGVzL2FwcC5zY3NzP2EwZDIiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IjtBQUFBIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL3N0eWxlcy9hcHAuc2Nzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/styles/app.scss\n");

/***/ }),

/***/ "./resources/styles/editor.scss":
/*!**************************************!*\
  !*** ./resources/styles/editor.scss ***!
  \**************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc3R5bGVzL2VkaXRvci5zY3NzPzYxN2IiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IjtBQUFBIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL3N0eWxlcy9lZGl0b3Iuc2Nzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/styles/editor.scss\n");

/***/ })

},
0,[["./resources/scripts/app.js","/scripts/manifest"],["./resources/styles/app.scss","/scripts/manifest"],["./resources/styles/editor.scss","/scripts/manifest"]]]);