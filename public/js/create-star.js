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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/create-star.js":
/*!*************************************!*\
  !*** ./resources/js/create-star.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function formMonitor(formElements) {
  //nom field error text monitoring
  document.getElementById("nom").addEventListener("input", function () {
    if (this.value === "") {// faire rien
    } else {
      if (document.getElementsByClassName("nomError") && document.getElementById("nom").value !== "") {
        document.getElementsByClassName("nomError")[0].style.display = "none";
        document.getElementById("nom").style.border = "1px solid green";
        document.getElementById("nom").style.color = "black";
      }
    }
  }); //prenom field error text monitoring

  document.getElementById("prenom").addEventListener("input", function () {
    if (this.value === "") {// faire rien
    } else {
      if (document.getElementsByClassName("prenomError") && document.getElementById("prenom").value !== "") {
        document.getElementsByClassName("prenomError")[0].style.display = "none";
        document.getElementById("prenom").style.border = "1px solid green";
        document.getElementById("prenom").style.color = "black";
      }
    }
  }); //Description field error text monitoring

  document.getElementById("description").addEventListener("input", function () {
    if (this.value === "") {// faire rien
    } else {
      if (document.getElementsByClassName("descriptionError") && document.getElementById("description").value !== "") {
        document.getElementsByClassName("descriptionError")[0].style.display = "none";
        document.getElementById("description").style.border = "1px solid green";
        document.getElementById("description").style.color = "black";
      }
    }
  }); //image field error text monitoring

  document.getElementById("image").addEventListener("change", function () {
    if (this.value === "") {// faire rien
    } else {
      if (document.getElementsByClassName("fileError") && document.getElementById("image").value !== "") {
        document.getElementsByClassName("fileError")[0].style.display = "none";
        document.getElementById("image").style.border = "1px solid green";
        document.getElementById("image").style.color = "black";
      }
    }
  });
}

formMonitor(document.getElementById("form-container")); // invoke the function

/***/ }),

/***/ 3:
/*!*******************************************!*\
  !*** multi ./resources/js/create-star.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Utilisateur\Desktop\HelloCSE\star\resources\js\create-star.js */"./resources/js/create-star.js");


/***/ })

/******/ });