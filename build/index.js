/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/index.js"
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _css_style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css/style.scss */ "./css/style.scss");
/* harmony import */ var _modules_MobileMenu__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/MobileMenu */ "./src/modules/MobileMenu.js");
/* harmony import */ var _modules_Search__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/Search */ "./src/modules/Search.js");
/* harmony import */ var _modules_Notes__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/Notes */ "./src/modules/Notes.js");




const mobileMenu = new _modules_MobileMenu__WEBPACK_IMPORTED_MODULE_1__["default"]();
const search = new _modules_Search__WEBPACK_IMPORTED_MODULE_2__["default"]();
const notes = new _modules_Notes__WEBPACK_IMPORTED_MODULE_3__["default"]();

/***/ },

/***/ "./src/modules/MobileMenu.js"
/*!***********************************!*\
  !*** ./src/modules/MobileMenu.js ***!
  \***********************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class MobileMenu {
  constructor() {
    this.menu = document.querySelector(".site-header__menu");
    this.openButton = document.querySelector(".site-header__menu-trigger");
    this.openButtonIcon = this.openButton?.querySelector("i");
    if (!this.menu || !this.openButton || !this.openButtonIcon) return;
    this.events();
  }
  events() {
    this.openButton.addEventListener("click", () => this.openMenu());
    // Close menu when clicking a link
    const menuLinks = this.menu.querySelectorAll("a");
    menuLinks.forEach(link => {
      link.addEventListener("click", () => this.closeMenu());
    });
  }
  openMenu() {
    this.menu.classList.toggle("site-header__menu--active");
    if (this.menu.classList.contains("site-header__menu--active")) {
      this.openButtonIcon.classList.remove("fa-bars");
      this.openButtonIcon.classList.add("fa-times");
    } else {
      this.openButtonIcon.classList.remove("fa-times");
      this.openButtonIcon.classList.add("fa-bars");
    }
  }
  closeMenu() {
    this.menu.classList.remove("site-header__menu--active");
    this.openButtonIcon.classList.remove("fa-times");
    this.openButtonIcon.classList.add("fa-bars");
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (MobileMenu);

/***/ },

/***/ "./src/modules/Notes.js"
/*!******************************!*\
  !*** ./src/modules/Notes.js ***!
  \******************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class Notes {
  constructor() {
    this.addButton = document.querySelector('.note__add-button');
    this.editButton = document.querySelectorAll('.note__edit-button');
    this.deleteButton = document.querySelectorAll('.note__delete-button');
    this.saveButton = document.querySelectorAll('.note__save-button');
    this.url = roslinopediaData.root_url + '/wp-json/wp/v2/notatka/';
    this.events();
  }
  events() {
    this.deleteButton.forEach(button => button.addEventListener('click', e => this.deleteNote(e)));
    this.editButton.forEach(button => button.addEventListener('click', e => this.editNote(e)));
    this.saveButton.forEach(button => button.addEventListener('click', e => this.saveNote(e)));
    this.addButton?.addEventListener('click', () => this.addNote());
  }
  addNote() {
    const bindPlantId = document.querySelector('.new_note').getAttribute('plant-id');
    this.sendRequest(null, 'POST', {
      title: document.querySelector('.new_note__title').value,
      content: document.querySelector('.new_note__content').value,
      status: 'private',
      acf: {
        powiazana_roslina: [parseInt(bindPlantId, 10)]
      }
    });
  }
  editNote(e) {
    e.currentTarget.classList.add('btn--hidden');
    e.currentTarget.closest('.note').querySelector('.note__save-button').classList.remove('btn--hidden');
    const noteTitle = e.currentTarget.closest('.note').querySelector('.note__title');
    const noteContent = e.currentTarget.closest('.note').querySelector('.note__content');
    noteTitle.removeAttribute('readonly');
    noteContent.removeAttribute('readonly');
    noteTitle.classList.add('note__edit');
    noteContent.classList.add('note__edit');
  }
  saveNote(e) {
    e.currentTarget.classList.add('btn--hidden');
    e.currentTarget.closest('.note').querySelector('.note__edit-button').classList.remove('btn--hidden');
    const noteTitle = e.currentTarget.closest('.note').querySelector('.note__title');
    const noteContent = e.currentTarget.closest('.note').querySelector('.note__content');
    noteTitle.setAttribute('readonly', true);
    noteContent.setAttribute('readonly', true);
    noteTitle.classList.remove('note__edit');
    noteContent.classList.remove('note__edit');
    const noteId = e.target.closest('.note').getAttribute('note-id');
    this.sendRequest(noteId, 'PUT', {
      title: noteTitle.value,
      content: noteContent.value
    });
  }
  deleteNote(e) {
    const noteId = e.target.closest('.note').getAttribute('note-id');
    this.sendRequest(noteId, 'DELETE');
  }
  async sendRequest(id, method, body = null) {
    const url = id && method !== 'POST' ? this.url + id : this.url;
    try {
      const response = await fetch(url, {
        method: method,
        headers: {
          'Content-Type': 'application/json',
          'X-WP-Nonce': roslinopediaData.nonce
        },
        body: body ? JSON.stringify(body) : null
      });
      const data = await response.json();
      if (!response.ok) {
        throw new Error(data.message);
      }
      location.reload();
      return data;
    } catch (error) {
      console.error(error);
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Notes);

/***/ },

/***/ "./src/modules/Search.js"
/*!*******************************!*\
  !*** ./src/modules/Search.js ***!
  \*******************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class Search {
  constructor() {
    this.modal = document.querySelector('.search-modal');
    this.openButton = document.querySelector('.search-modal__trigger');
    this.closeButton = document.querySelector('.search-modal__close');
    this.input = document.querySelector('.search-modal__input');
    this.overlay = document.querySelector('.search-modal__overlay');
    this.typingTimeout;
    this.results = document.querySelector('.search-modal__results');
    this.spinnerLoader = document.querySelector('.spinner-loader');
    this.searchUrl = roslinopediaData.root_url + '/wp-json/roslinopedia/v1/get';
    if (this.openButton && this.modal) this.events();
  }
  events() {
    this.openButton?.addEventListener('click', () => this.openModal());
    this.closeButton?.addEventListener('click', () => this.closeModal());
    this.overlay?.addEventListener('click', () => this.closeModal());
    this.input?.addEventListener('input', () => this.handleSearch());
  }
  openModal() {
    this.modal?.classList.add('search-modal--active');
    document.documentElement.classList.add('body-no-scroll');
    setTimeout(() => this.input?.focus(), 400);
  }
  closeModal() {
    this.modal?.classList.remove('search-modal--active');
    document.documentElement.classList.remove('body-no-scroll');
    if (this.results) this.results.innerHTML = '';
    if (this.input) this.input.value = '';
  }
  handleSearch() {
    this.spinnerLoader?.classList.add('spinner-loader--active');
    if (this.results) this.results.innerHTML = '';
    clearTimeout(this.typingTimeout);
    this.typingTimeout = setTimeout(() => this.showResults(), 1000);
  }
  showResults() {
    if (this.input?.value) {
      this.fetchResults();
    } else {
      this.spinnerLoader.classList.remove('spinner-loader--active');
    }
  }
  async fetchResults() {
    const term = encodeURIComponent(this.input?.value || '');
    try {
      const response = await fetch(this.searchUrl + '?search=' + term);
      const data = await response.json();
      const {
        plants = [],
        posts = []
      } = data;
      if (plants.length === 0 && posts.length === 0) {
        this.showResultsHeading('Nie znaleziono wyników');
        return;
      }

      // Rośliny
      if (plants.length > 0) {
        this.showResultsHeading('Rośliny');
        this.showResultsItems(plants);
      }

      // Wpisy blogowe
      if (posts.length > 0) {
        this.showResultsHeading('Wpisy blogowe');
        this.showResultsItems(posts);
      }
    } catch (error) {
      console.error(error);
      this.showResultsHeading('Wystąpił błąd podczas ładowania wyników');
    } finally {
      this.spinnerLoader?.classList.remove('spinner-loader--active');
    }
  }
  showResultsHeading(heading) {
    const resultsHeading = document.createElement('h2');
    resultsHeading.className = 'search-modal__results-heading';
    resultsHeading.textContent = heading;
    this.results.appendChild(resultsHeading);
  }
  showResultsItems(items) {
    items.forEach(item => {
      const resultsItem = document.createElement('div');
      resultsItem.classList.add('search-modal__results-item');
      resultsItem.innerHTML = `
      <div class="search-modal__results-content">
        <a href="${item.permalink}"><h3>${item.title}</h3></a>
        ${item.content?.substring(0, 100)}...
      </div>
      <img class="search-modal__results-image" src="${item.featuredImageUrl}" alt="${item.title}">`;
      this.results.appendChild(resultsItem);
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Search);

/***/ },

/***/ "./css/style.scss"
/*!************************!*\
  !*** ./css/style.scss ***!
  \************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Check if module exists (development only)
/******/ 		if (__webpack_modules__[moduleId] === undefined) {
/******/ 			var e = new Error("Cannot find module '" + moduleId + "'");
/******/ 			e.code = 'MODULE_NOT_FOUND';
/******/ 			throw e;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"index": 0,
/******/ 			"./style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkroslinopedia_projekt"] = globalThis["webpackChunkroslinopedia_projekt"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], () => (__webpack_require__("./src/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map