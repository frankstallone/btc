/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunk"] = self["webpackChunk"] || []).push([["/scripts/customizer"],{

/***/ "./resources/scripts/customizer.js":
/*!*****************************************!*\
  !*** ./resources/scripts/customizer.js ***!
  \*****************************************/
/***/ (function(__unused_webpack_module, __unused_webpack_exports, __webpack_require__) {

eval("/* provided dependency */ var $ = __webpack_require__(/*! jquery */ \"jquery\");\n/**\n * This file allows you to add functionality to the Theme Customizer\n * live preview. jQuery is readily available.\n *\n * {@link https://codex.wordpress.org/Theme_Customization_API}\n */\n\n/**\n * Change the blog name value.\n *\n * @param {string} value\n */\nwp.customize('blogname', function (value) {\n  value.bind(function (to) {\n    return $('.brand').text(to);\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc2NyaXB0cy9jdXN0b21pemVyLmpzPzg0ODMiXSwibmFtZXMiOlsid3AiLCJ2YWx1ZSIsIiQiXSwibWFwcGluZ3MiOiI7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBQSxFQUFFLENBQUZBLHNCQUF5QixpQkFBVztBQUNsQ0MsT0FBSyxDQUFMQSxLQUFXO0FBQUEsV0FBUUMsQ0FBQyxDQUFEQSxRQUFDLENBQURBLE1BQVIsRUFBUUEsQ0FBUjtBQUFYRDtBQURGRCIsImZpbGUiOiIuL3Jlc291cmNlcy9zY3JpcHRzL2N1c3RvbWl6ZXIuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIFRoaXMgZmlsZSBhbGxvd3MgeW91IHRvIGFkZCBmdW5jdGlvbmFsaXR5IHRvIHRoZSBUaGVtZSBDdXN0b21pemVyXG4gKiBsaXZlIHByZXZpZXcuIGpRdWVyeSBpcyByZWFkaWx5IGF2YWlsYWJsZS5cbiAqXG4gKiB7QGxpbmsgaHR0cHM6Ly9jb2RleC53b3JkcHJlc3Mub3JnL1RoZW1lX0N1c3RvbWl6YXRpb25fQVBJfVxuICovXG5cbi8qKlxuICogQ2hhbmdlIHRoZSBibG9nIG5hbWUgdmFsdWUuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlXG4gKi9cbndwLmN1c3RvbWl6ZSgnYmxvZ25hbWUnLCAodmFsdWUpID0+IHtcbiAgdmFsdWUuYmluZCgodG8pID0+ICQoJy5icmFuZCcpLnRleHQodG8pKTtcbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/scripts/customizer.js\n");

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ (function(module) {

"use strict";
module.exports = window["jQuery"];

/***/ })

},
0,[["./resources/scripts/customizer.js","/scripts/manifest"]]]);