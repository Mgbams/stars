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

/***/ "./resources/js/stars-index.js":
/*!*************************************!*\
  !*** ./resources/js/stars-index.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function launchStarTabs() {
  document.querySelectorAll(".startabs_button").forEach(function (button) {
    button.addEventListener("click", function () {
      var startabsSidebar = button.parentElement;
      var starTabs = startabsSidebar.parentElement;
      var starTabsNumber = button.dataset.forTab; // obtenir l'identifiant de chaque star
      // sélectionnez le contenu avec data-tab = startTabsNumber. Il sélectionne un contenu avec le numéro de l'onglet de données correspondant

      var tabsToShow = starTabs.querySelector(".startabs_contents[data-tab=\"".concat(starTabsNumber, "\"]"));
      startabsSidebar.querySelectorAll(".startabs_button").forEach(function (button) {
        // Supprimez d'abord la classe active de tous les boutons en cliquant
        button.classList.remove("startabs_button_active");
      });
      starTabs.querySelectorAll(".startabs_contents").forEach(function (content) {
        // Supprimez d'abord la classe active de tout le contenu lorsqu'un bouton est cliqué
        content.classList.remove("startabs_contents_active");
      });
      button.classList.add("startabs_button_active"); //Réappliquez la classe active au bouton cliqué
      //Réappliquez la classe active au contenu correspondant afin qu'il puisse être affiché

      tabsToShow.classList.add("startabs_contents_active");
    });
  });
} // Appelez la fonction launchStarTabs


launchStarTabs(); // Faites un clic dynamiquement lors du chargement de la page pour attacher la classe .startabs_contents_active
// et la classe startabs_button_active au premier élément de starTabs div

document.querySelectorAll(".startabs").forEach(function (starTabs) {
  starTabs.querySelector(".startabs_sidebar .startabs_button").click();
});
/***
 * ==========================
 * Small scrren display code
 * ==========================
 *
 */

function accordionController(accordionElem) {
  // Lorsque le panneau est cliqué, handlePanelClick est appelé.
  function handlePanelClick(event) {
    showPanel(event.currentTarget);
  } //Masquer le panneau actuel et afficher le nouveau panneau.


  function showPanel(panel) {
    // Masquer le panneau actuel une fois cette fonction exécutée
    var expandedPanel = accordionElem.querySelector(".active");

    if (expandedPanel) {
      expandedPanel.classList.remove("active");
    } // Afficher le nouveau panneau correspondant au div cliqué


    panel.classList.add("active");
  }

  var allPanelElems = accordionElem.querySelectorAll(".panel");

  for (var i = 0, len = allPanelElems.length; i < len; i++) {
    allPanelElems[i].addEventListener("click", handlePanelClick);
  } // Afficher le premier panneau par défaut


  showPanel(allPanelElems[0]);
}

if (document.getElementById("stars-lists")) {
  // Appeler cette fonction lorsque l'élément star-lists apparaît
  accordionController(document.getElementById("stars-lists"));
}

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./resources/js/stars-index.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Utilisateur\Desktop\HelloCSE\star\resources\js\stars-index.js */"./resources/js/stars-index.js");


/***/ })

/******/ });