/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.l = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };

/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};

/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};

/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

"use strict";
eval("\"use strict\";\n\n/**\n * First we will load all of this project's JavaScript dependencies which\n * include Vue and Vue Resource. This gives a great starting point for\n * building robust, powerful web applications using Vue and Laravel.\n */\n\n//require('./bootstrap');\n\n/**\n * Next, we will create a fresh Vue application instance and attach it to\n * the body of the page. From here, you may begin adding components to\n * the application, or feel free to tweak this setup for your needs.\n */\n\n//Vue.component('example', require('./components/Example.vue'));\n/*\nconst app = new Vue({\n    el: 'body'\n});\n*/\n\n$(document).ready(function () {\n    $(\".list-clickable li\").click(function () {\n        $(this).addClass(\"list-item-clicked\").delay(1000).queue(function () {\n            $(this).removeClass(\"list-item-clicked\").dequeue();\n        });\n    });\n    $(\".modal-hover-add-button\").click(function () {\n        $(this).closest(\"li\").addClass(\"list-item-clicked\").delay(1000).queue(function () {\n            $(this).removeClass(\"list-item-clicked\").dequeue();\n        });\n    });\n    $(document).on(\"click\", \".list-item-buttons\", function () {\n        if ($(window).width() < 736) {\n            $(this).parent(\"li\").toggleClass(\"list-item-menu-active\");\n        }\n    });\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC5qcz84YjY3Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xuXG4vKipcbiAqIEZpcnN0IHdlIHdpbGwgbG9hZCBhbGwgb2YgdGhpcyBwcm9qZWN0J3MgSmF2YVNjcmlwdCBkZXBlbmRlbmNpZXMgd2hpY2hcbiAqIGluY2x1ZGUgVnVlIGFuZCBWdWUgUmVzb3VyY2UuIFRoaXMgZ2l2ZXMgYSBncmVhdCBzdGFydGluZyBwb2ludCBmb3JcbiAqIGJ1aWxkaW5nIHJvYnVzdCwgcG93ZXJmdWwgd2ViIGFwcGxpY2F0aW9ucyB1c2luZyBWdWUgYW5kIExhcmF2ZWwuXG4gKi9cblxuLy9yZXF1aXJlKCcuL2Jvb3RzdHJhcCcpO1xuXG4vKipcbiAqIE5leHQsIHdlIHdpbGwgY3JlYXRlIGEgZnJlc2ggVnVlIGFwcGxpY2F0aW9uIGluc3RhbmNlIGFuZCBhdHRhY2ggaXQgdG9cbiAqIHRoZSBib2R5IG9mIHRoZSBwYWdlLiBGcm9tIGhlcmUsIHlvdSBtYXkgYmVnaW4gYWRkaW5nIGNvbXBvbmVudHMgdG9cbiAqIHRoZSBhcHBsaWNhdGlvbiwgb3IgZmVlbCBmcmVlIHRvIHR3ZWFrIHRoaXMgc2V0dXAgZm9yIHlvdXIgbmVlZHMuXG4gKi9cblxuLy9WdWUuY29tcG9uZW50KCdleGFtcGxlJywgcmVxdWlyZSgnLi9jb21wb25lbnRzL0V4YW1wbGUudnVlJykpO1xuLypcbmNvbnN0IGFwcCA9IG5ldyBWdWUoe1xuICAgIGVsOiAnYm9keSdcbn0pO1xuKi9cblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuICAgICQoXCIubGlzdC1jbGlja2FibGUgbGlcIikuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICAgICAkKHRoaXMpLmFkZENsYXNzKFwibGlzdC1pdGVtLWNsaWNrZWRcIikuZGVsYXkoMTAwMCkucXVldWUoZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmVDbGFzcyhcImxpc3QtaXRlbS1jbGlja2VkXCIpLmRlcXVldWUoKTtcbiAgICAgICAgfSk7XG4gICAgfSk7XG4gICAgJChcIi5tb2RhbC1ob3Zlci1hZGQtYnV0dG9uXCIpLmNsaWNrKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgJCh0aGlzKS5jbG9zZXN0KFwibGlcIikuYWRkQ2xhc3MoXCJsaXN0LWl0ZW0tY2xpY2tlZFwiKS5kZWxheSgxMDAwKS5xdWV1ZShmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAkKHRoaXMpLnJlbW92ZUNsYXNzKFwibGlzdC1pdGVtLWNsaWNrZWRcIikuZGVxdWV1ZSgpO1xuICAgICAgICB9KTtcbiAgICB9KTtcbiAgICAkKGRvY3VtZW50KS5vbihcImNsaWNrXCIsIFwiLmxpc3QtaXRlbS1idXR0b25zXCIsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKCQod2luZG93KS53aWR0aCgpIDwgNzM2KSB7XG4gICAgICAgICAgICAkKHRoaXMpLnBhcmVudChcImxpXCIpLnRvZ2dsZUNsYXNzKFwibGlzdC1pdGVtLW1lbnUtYWN0aXZlXCIpO1xuICAgICAgICB9XG4gICAgfSk7XG59KTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9hcHAuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFzQkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);