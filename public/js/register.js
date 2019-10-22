/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/components/formValidation.js":
/*!***************************************************!*\
  !*** ./resources/js/components/formValidation.js ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return formValidation; });
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

function formValidation() {
  var form = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '.needs-validation';
  var el = document.querySelector('form');
  var actions = el.querySelectorAll('[data-action]');
  el.addEventListener('submit', function (event) {
    var _this = this;

    actions.forEach(function (el) {
      if (el.dataset.action === 'change') {
        el.setCustomValidity(el.value === "" ? el.dataset.text : "");
      } else if (el.dataset.action === 'input') {
        if (el.dataset.condition) {
          var condition = _this.querySelector("[name=\"".concat(el.dataset.condition, "\"]"));

          el.setCustomValidity(el.value != condition.value ? el.dataset.text : "");
        } else {
          el.setCustomValidity(el.value === "" ? el.dataset.text : "");
        }
      }
    });

    if (el.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    } else {
      $(this).unbind('submit').submit();
    }

    el.classList.add('was-validated');
  }, false);

  var inputCount = _toConsumableArray(actions).reduce(function (a, b) {
    return b.dataset.action === 'input' ? a + 1 : a;
  }, 0);

  if (inputCount) {
    el.addEventListener('input', function () {
      var _this2 = this;

      actions.forEach(function (el) {
        if (el.dataset.condition) {
          var condition = _this2.querySelector("[name=\"".concat(el.dataset.condition, "\"]"));

          el.setCustomValidity(el.value != condition.value ? el.dataset.text : "");
        } else {
          el.setCustomValidity(el.value === "" ? el.dataset.text : "");
        }
      });
    }, false);
  }

  var changeCount = _toConsumableArray(actions).reduce(function (a, b) {
    return b.dataset.action === 'change' ? a + 1 : a;
  }, 0);

  if (changeCount) {
    el.addEventListener('change', function () {
      actions.forEach(function (el) {
        el.setCustomValidity(el.value === "" ? el.dataset.text : "");
      });
    }, false);
  }
}

/***/ }),

/***/ "./resources/js/register.js":
/*!**********************************!*\
  !*** ./resources/js/register.js ***!
  \**********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_formValidation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/formValidation */ "./resources/js/components/formValidation.js");

Object(_components_formValidation__WEBPACK_IMPORTED_MODULE_0__["default"])('.needs-validation');

/***/ }),

/***/ 1:
/*!****************************************!*\
  !*** multi ./resources/js/register.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/kamlig/Projects/kredo-career/resources/js/register.js */"./resources/js/register.js");


/***/ })

/******/ });