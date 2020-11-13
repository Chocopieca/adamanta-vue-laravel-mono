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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(11);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

Nova.booting(function (Vue, router) {
    router.addRoutes([{
        name: 'site-menu',
        path: '/settings/site-menu',
        component: __webpack_require__(2)
    }]);
});

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(3)
}
var normalizeComponent = __webpack_require__(8)
/* script */
var __vue_script__ = __webpack_require__(9)
/* template */
var __vue_template__ = __webpack_require__(10)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/Tool.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-68ff5483", Component.options)
  } else {
    hotAPI.reload("data-v-68ff5483", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(4);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(6)("6e5db1d0", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-68ff5483\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Tool.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-68ff5483\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Tool.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(5)(false);
// imports


// module
exports.push([module.i, "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n/* Scoped Styles */\n", ""]);

// exports


/***/ }),
/* 5 */
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
  Modified by Evan You @yyx990803
*/

var hasDocument = typeof document !== 'undefined'

if (typeof DEBUG !== 'undefined' && DEBUG) {
  if (!hasDocument) {
    throw new Error(
    'vue-style-loader cannot be used in a non-browser environment. ' +
    "Use { target: 'node' } in your Webpack config to indicate a server-rendering environment."
  ) }
}

var listToStyles = __webpack_require__(7)

/*
type StyleObject = {
  id: number;
  parts: Array<StyleObjectPart>
}

type StyleObjectPart = {
  css: string;
  media: string;
  sourceMap: ?string
}
*/

var stylesInDom = {/*
  [id: number]: {
    id: number,
    refs: number,
    parts: Array<(obj?: StyleObjectPart) => void>
  }
*/}

var head = hasDocument && (document.head || document.getElementsByTagName('head')[0])
var singletonElement = null
var singletonCounter = 0
var isProduction = false
var noop = function () {}
var options = null
var ssrIdKey = 'data-vue-ssr-id'

// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
// tags it will allow on a page
var isOldIE = typeof navigator !== 'undefined' && /msie [6-9]\b/.test(navigator.userAgent.toLowerCase())

module.exports = function (parentId, list, _isProduction, _options) {
  isProduction = _isProduction

  options = _options || {}

  var styles = listToStyles(parentId, list)
  addStylesToDom(styles)

  return function update (newList) {
    var mayRemove = []
    for (var i = 0; i < styles.length; i++) {
      var item = styles[i]
      var domStyle = stylesInDom[item.id]
      domStyle.refs--
      mayRemove.push(domStyle)
    }
    if (newList) {
      styles = listToStyles(parentId, newList)
      addStylesToDom(styles)
    } else {
      styles = []
    }
    for (var i = 0; i < mayRemove.length; i++) {
      var domStyle = mayRemove[i]
      if (domStyle.refs === 0) {
        for (var j = 0; j < domStyle.parts.length; j++) {
          domStyle.parts[j]()
        }
        delete stylesInDom[domStyle.id]
      }
    }
  }
}

function addStylesToDom (styles /* Array<StyleObject> */) {
  for (var i = 0; i < styles.length; i++) {
    var item = styles[i]
    var domStyle = stylesInDom[item.id]
    if (domStyle) {
      domStyle.refs++
      for (var j = 0; j < domStyle.parts.length; j++) {
        domStyle.parts[j](item.parts[j])
      }
      for (; j < item.parts.length; j++) {
        domStyle.parts.push(addStyle(item.parts[j]))
      }
      if (domStyle.parts.length > item.parts.length) {
        domStyle.parts.length = item.parts.length
      }
    } else {
      var parts = []
      for (var j = 0; j < item.parts.length; j++) {
        parts.push(addStyle(item.parts[j]))
      }
      stylesInDom[item.id] = { id: item.id, refs: 1, parts: parts }
    }
  }
}

function createStyleElement () {
  var styleElement = document.createElement('style')
  styleElement.type = 'text/css'
  head.appendChild(styleElement)
  return styleElement
}

function addStyle (obj /* StyleObjectPart */) {
  var update, remove
  var styleElement = document.querySelector('style[' + ssrIdKey + '~="' + obj.id + '"]')

  if (styleElement) {
    if (isProduction) {
      // has SSR styles and in production mode.
      // simply do nothing.
      return noop
    } else {
      // has SSR styles but in dev mode.
      // for some reason Chrome can't handle source map in server-rendered
      // style tags - source maps in <style> only works if the style tag is
      // created and inserted dynamically. So we remove the server rendered
      // styles and inject new ones.
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  if (isOldIE) {
    // use singleton mode for IE9.
    var styleIndex = singletonCounter++
    styleElement = singletonElement || (singletonElement = createStyleElement())
    update = applyToSingletonTag.bind(null, styleElement, styleIndex, false)
    remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true)
  } else {
    // use multi-style-tag mode in all other cases
    styleElement = createStyleElement()
    update = applyToTag.bind(null, styleElement)
    remove = function () {
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  update(obj)

  return function updateStyle (newObj /* StyleObjectPart */) {
    if (newObj) {
      if (newObj.css === obj.css &&
          newObj.media === obj.media &&
          newObj.sourceMap === obj.sourceMap) {
        return
      }
      update(obj = newObj)
    } else {
      remove()
    }
  }
}

var replaceText = (function () {
  var textStore = []

  return function (index, replacement) {
    textStore[index] = replacement
    return textStore.filter(Boolean).join('\n')
  }
})()

function applyToSingletonTag (styleElement, index, remove, obj) {
  var css = remove ? '' : obj.css

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = replaceText(index, css)
  } else {
    var cssNode = document.createTextNode(css)
    var childNodes = styleElement.childNodes
    if (childNodes[index]) styleElement.removeChild(childNodes[index])
    if (childNodes.length) {
      styleElement.insertBefore(cssNode, childNodes[index])
    } else {
      styleElement.appendChild(cssNode)
    }
  }
}

function applyToTag (styleElement, obj) {
  var css = obj.css
  var media = obj.media
  var sourceMap = obj.sourceMap

  if (media) {
    styleElement.setAttribute('media', media)
  }
  if (options.ssrId) {
    styleElement.setAttribute(ssrIdKey, obj.id)
  }

  if (sourceMap) {
    // https://developer.chrome.com/devtools/docs/javascript-debugging
    // this makes source maps inside style tags work properly in Chrome
    css += '\n/*# sourceURL=' + sourceMap.sources[0] + ' */'
    // http://stackoverflow.com/a/26603875
    css += '\n/*# sourceMappingURL=data:application/json;base64,' + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + ' */'
  }

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = css
  } else {
    while (styleElement.firstChild) {
      styleElement.removeChild(styleElement.firstChild)
    }
    styleElement.appendChild(document.createTextNode(css))
  }
}


/***/ }),
/* 7 */
/***/ (function(module, exports) {

/**
 * Translates the list format produced by css-loader into something
 * easier to manipulate.
 */
module.exports = function listToStyles (parentId, list) {
  var styles = []
  var newStyles = {}
  for (var i = 0; i < list.length; i++) {
    var item = list[i]
    var id = item[0]
    var css = item[1]
    var media = item[2]
    var sourceMap = item[3]
    var part = {
      id: parentId + ':' + i,
      css: css,
      media: media,
      sourceMap: sourceMap
    }
    if (!newStyles[id]) {
      styles.push(newStyles[id] = { id: id, parts: [part] })
    } else {
      newStyles[id].parts.push(part)
    }
  }
  return styles
}


/***/ }),
/* 8 */
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),
/* 9 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_sl_vue_tree__ = __webpack_require__(30);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_sl_vue_tree___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_sl_vue_tree__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_sl_vue_tree_dist_sl_vue_tree_dark_css__ = __webpack_require__(31);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_sl_vue_tree_dist_sl_vue_tree_dark_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_sl_vue_tree_dist_sl_vue_tree_dark_css__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




Nova.booting(function (Vue, router) {
    Vue.use(__WEBPACK_IMPORTED_MODULE_0_sl_vue_tree___default.a);
});

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            nodes: [{ title: 'Item1', isLeaf: true }, { title: 'Item2', isLeaf: true, data: { visible: false } }, { title: 'Folder1' }, {
                title: 'Folder2', isExpanded: true, children: [{ title: 'Item3', isLeaf: true }, { title: 'Item4', isLeaf: true }]
            }]
        };
    },

    methods: {
        nodeClick: function nodeClick(node) {
            console.log(node);
        }
    }

});

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("heading", { staticClass: "mb-6" }, [_vm._v("Управление Меню")]),
      _vm._v(" "),
      _c("sl-vue-tree", {
        on: { nodeclick: _vm.nodeClick },
        scopedSlots: _vm._u([
          {
            key: "toggle",
            fn: function(ref) {
              var node = ref.node
              return [
                !node.isLeaf
                  ? _c(
                      "span",
                      [
                        !node.isExpanded
                          ? _c("icon", { attrs: { name: "caret-right" } })
                          : _vm._e(),
                        _vm._v(" "),
                        node.isExpanded
                          ? _c("icon", { attrs: { name: "caret-down" } })
                          : _vm._e()
                      ],
                      1
                    )
                  : _vm._e()
              ]
            }
          },
          {
            key: "title",
            fn: function(ref) {
              var node = ref.node
              return [
                node.isLeaf
                  ? _c("icon", { attrs: { name: "file" } })
                  : _vm._e(),
                _vm._v(" " + _vm._s(node.title) + " ")
              ]
            }
          },
          {
            key: "sidebar",
            fn: function(ref) {
              var node = ref.node
              return [
                node.data.isModified
                  ? _c("icon", { attrs: { name: "circle" } })
                  : _vm._e()
              ]
            }
          }
        ]),
        model: {
          value: _vm.nodes,
          callback: function($$v) {
            _vm.nodes = $$v
          },
          expression: "nodes"
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-68ff5483", module.exports)
  }
}

/***/ }),
/* 11 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 12 */,
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/

var stylesInDom = {};

var	memoize = function (fn) {
	var memo;

	return function () {
		if (typeof memo === "undefined") memo = fn.apply(this, arguments);
		return memo;
	};
};

var isOldIE = memoize(function () {
	// Test for IE <= 9 as proposed by Browserhacks
	// @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
	// Tests for existence of standard globals is to allow style-loader
	// to operate correctly into non-standard environments
	// @see https://github.com/webpack-contrib/style-loader/issues/177
	return window && document && document.all && !window.atob;
});

var getElement = (function (fn) {
	var memo = {};

	return function(selector) {
		if (typeof memo[selector] === "undefined") {
			memo[selector] = fn.call(this, selector);
		}

		return memo[selector]
	};
})(function (target) {
	return document.querySelector(target)
});

var singleton = null;
var	singletonCounter = 0;
var	stylesInsertedAtTop = [];

var	fixUrls = __webpack_require__(14);

module.exports = function(list, options) {
	if (typeof DEBUG !== "undefined" && DEBUG) {
		if (typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
	}

	options = options || {};

	options.attrs = typeof options.attrs === "object" ? options.attrs : {};

	// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
	// tags it will allow on a page
	if (!options.singleton) options.singleton = isOldIE();

	// By default, add <style> tags to the <head> element
	if (!options.insertInto) options.insertInto = "head";

	// By default, add <style> tags to the bottom of the target
	if (!options.insertAt) options.insertAt = "bottom";

	var styles = listToStyles(list, options);

	addStylesToDom(styles, options);

	return function update (newList) {
		var mayRemove = [];

		for (var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];

			domStyle.refs--;
			mayRemove.push(domStyle);
		}

		if(newList) {
			var newStyles = listToStyles(newList, options);
			addStylesToDom(newStyles, options);
		}

		for (var i = 0; i < mayRemove.length; i++) {
			var domStyle = mayRemove[i];

			if(domStyle.refs === 0) {
				for (var j = 0; j < domStyle.parts.length; j++) domStyle.parts[j]();

				delete stylesInDom[domStyle.id];
			}
		}
	};
};

function addStylesToDom (styles, options) {
	for (var i = 0; i < styles.length; i++) {
		var item = styles[i];
		var domStyle = stylesInDom[item.id];

		if(domStyle) {
			domStyle.refs++;

			for(var j = 0; j < domStyle.parts.length; j++) {
				domStyle.parts[j](item.parts[j]);
			}

			for(; j < item.parts.length; j++) {
				domStyle.parts.push(addStyle(item.parts[j], options));
			}
		} else {
			var parts = [];

			for(var j = 0; j < item.parts.length; j++) {
				parts.push(addStyle(item.parts[j], options));
			}

			stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
		}
	}
}

function listToStyles (list, options) {
	var styles = [];
	var newStyles = {};

	for (var i = 0; i < list.length; i++) {
		var item = list[i];
		var id = options.base ? item[0] + options.base : item[0];
		var css = item[1];
		var media = item[2];
		var sourceMap = item[3];
		var part = {css: css, media: media, sourceMap: sourceMap};

		if(!newStyles[id]) styles.push(newStyles[id] = {id: id, parts: [part]});
		else newStyles[id].parts.push(part);
	}

	return styles;
}

function insertStyleElement (options, style) {
	var target = getElement(options.insertInto)

	if (!target) {
		throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
	}

	var lastStyleElementInsertedAtTop = stylesInsertedAtTop[stylesInsertedAtTop.length - 1];

	if (options.insertAt === "top") {
		if (!lastStyleElementInsertedAtTop) {
			target.insertBefore(style, target.firstChild);
		} else if (lastStyleElementInsertedAtTop.nextSibling) {
			target.insertBefore(style, lastStyleElementInsertedAtTop.nextSibling);
		} else {
			target.appendChild(style);
		}
		stylesInsertedAtTop.push(style);
	} else if (options.insertAt === "bottom") {
		target.appendChild(style);
	} else {
		throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");
	}
}

function removeStyleElement (style) {
	if (style.parentNode === null) return false;
	style.parentNode.removeChild(style);

	var idx = stylesInsertedAtTop.indexOf(style);
	if(idx >= 0) {
		stylesInsertedAtTop.splice(idx, 1);
	}
}

function createStyleElement (options) {
	var style = document.createElement("style");

	options.attrs.type = "text/css";

	addAttrs(style, options.attrs);
	insertStyleElement(options, style);

	return style;
}

function createLinkElement (options) {
	var link = document.createElement("link");

	options.attrs.type = "text/css";
	options.attrs.rel = "stylesheet";

	addAttrs(link, options.attrs);
	insertStyleElement(options, link);

	return link;
}

function addAttrs (el, attrs) {
	Object.keys(attrs).forEach(function (key) {
		el.setAttribute(key, attrs[key]);
	});
}

function addStyle (obj, options) {
	var style, update, remove, result;

	// If a transform function was defined, run it on the css
	if (options.transform && obj.css) {
	    result = options.transform(obj.css);

	    if (result) {
	    	// If transform returns a value, use that instead of the original css.
	    	// This allows running runtime transformations on the css.
	    	obj.css = result;
	    } else {
	    	// If the transform function returns a falsy value, don't add this css.
	    	// This allows conditional loading of css
	    	return function() {
	    		// noop
	    	};
	    }
	}

	if (options.singleton) {
		var styleIndex = singletonCounter++;

		style = singleton || (singleton = createStyleElement(options));

		update = applyToSingletonTag.bind(null, style, styleIndex, false);
		remove = applyToSingletonTag.bind(null, style, styleIndex, true);

	} else if (
		obj.sourceMap &&
		typeof URL === "function" &&
		typeof URL.createObjectURL === "function" &&
		typeof URL.revokeObjectURL === "function" &&
		typeof Blob === "function" &&
		typeof btoa === "function"
	) {
		style = createLinkElement(options);
		update = updateLink.bind(null, style, options);
		remove = function () {
			removeStyleElement(style);

			if(style.href) URL.revokeObjectURL(style.href);
		};
	} else {
		style = createStyleElement(options);
		update = applyToTag.bind(null, style);
		remove = function () {
			removeStyleElement(style);
		};
	}

	update(obj);

	return function updateStyle (newObj) {
		if (newObj) {
			if (
				newObj.css === obj.css &&
				newObj.media === obj.media &&
				newObj.sourceMap === obj.sourceMap
			) {
				return;
			}

			update(obj = newObj);
		} else {
			remove();
		}
	};
}

var replaceText = (function () {
	var textStore = [];

	return function (index, replacement) {
		textStore[index] = replacement;

		return textStore.filter(Boolean).join('\n');
	};
})();

function applyToSingletonTag (style, index, remove, obj) {
	var css = remove ? "" : obj.css;

	if (style.styleSheet) {
		style.styleSheet.cssText = replaceText(index, css);
	} else {
		var cssNode = document.createTextNode(css);
		var childNodes = style.childNodes;

		if (childNodes[index]) style.removeChild(childNodes[index]);

		if (childNodes.length) {
			style.insertBefore(cssNode, childNodes[index]);
		} else {
			style.appendChild(cssNode);
		}
	}
}

function applyToTag (style, obj) {
	var css = obj.css;
	var media = obj.media;

	if(media) {
		style.setAttribute("media", media)
	}

	if(style.styleSheet) {
		style.styleSheet.cssText = css;
	} else {
		while(style.firstChild) {
			style.removeChild(style.firstChild);
		}

		style.appendChild(document.createTextNode(css));
	}
}

function updateLink (link, options, obj) {
	var css = obj.css;
	var sourceMap = obj.sourceMap;

	/*
		If convertToAbsoluteUrls isn't defined, but sourcemaps are enabled
		and there is no publicPath defined then lets turn convertToAbsoluteUrls
		on by default.  Otherwise default to the convertToAbsoluteUrls option
		directly
	*/
	var autoFixUrls = options.convertToAbsoluteUrls === undefined && sourceMap;

	if (options.convertToAbsoluteUrls || autoFixUrls) {
		css = fixUrls(css);
	}

	if (sourceMap) {
		// http://stackoverflow.com/a/26603875
		css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
	}

	var blob = new Blob([css], { type: "text/css" });

	var oldSrc = link.href;

	link.href = URL.createObjectURL(blob);

	if(oldSrc) URL.revokeObjectURL(oldSrc);
}


/***/ }),
/* 14 */
/***/ (function(module, exports) {


/**
 * When source maps are enabled, `style-loader` uses a link element with a data-uri to
 * embed the css on the page. This breaks all relative urls because now they are relative to a
 * bundle instead of the current page.
 *
 * One solution is to only use full urls, but that may be impossible.
 *
 * Instead, this function "fixes" the relative urls to be absolute according to the current page location.
 *
 * A rudimentary test suite is located at `test/fixUrls.js` and can be run via the `npm test` command.
 *
 */

module.exports = function (css) {
  // get current location
  var location = typeof window !== "undefined" && window.location;

  if (!location) {
    throw new Error("fixUrls requires window.location");
  }

	// blank or null?
	if (!css || typeof css !== "string") {
	  return css;
  }

  var baseUrl = location.protocol + "//" + location.host;
  var currentDir = baseUrl + location.pathname.replace(/\/[^\/]*$/, "/");

	// convert each url(...)
	/*
	This regular expression is just a way to recursively match brackets within
	a string.

	 /url\s*\(  = Match on the word "url" with any whitespace after it and then a parens
	   (  = Start a capturing group
	     (?:  = Start a non-capturing group
	         [^)(]  = Match anything that isn't a parentheses
	         |  = OR
	         \(  = Match a start parentheses
	             (?:  = Start another non-capturing groups
	                 [^)(]+  = Match anything that isn't a parentheses
	                 |  = OR
	                 \(  = Match a start parentheses
	                     [^)(]*  = Match anything that isn't a parentheses
	                 \)  = Match a end parentheses
	             )  = End Group
              *\) = Match anything and then a close parens
          )  = Close non-capturing group
          *  = Match anything
       )  = Close capturing group
	 \)  = Match a close parens

	 /gi  = Get all matches, not the first.  Be case insensitive.
	 */
	var fixedCss = css.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(fullMatch, origUrl) {
		// strip quotes (if they exist)
		var unquotedOrigUrl = origUrl
			.trim()
			.replace(/^"(.*)"$/, function(o, $1){ return $1; })
			.replace(/^'(.*)'$/, function(o, $1){ return $1; });

		// already a full url? no change
		if (/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/)/i.test(unquotedOrigUrl)) {
		  return fullMatch;
		}

		// convert the url to a full url
		var newUrl;

		if (unquotedOrigUrl.indexOf("//") === 0) {
		  	//TODO: should we add protocol?
			newUrl = unquotedOrigUrl;
		} else if (unquotedOrigUrl.indexOf("/") === 0) {
			// path should be relative to the base url
			newUrl = baseUrl + unquotedOrigUrl; // already starts with '/'
		} else {
			// path should be relative to current directory
			newUrl = currentDir + unquotedOrigUrl.replace(/^\.\//, ""); // Strip leading './'
		}

		// send back the fixed url(...)
		return "url(" + JSON.stringify(newUrl) + ")";
	});

	// send back the fixed css
	return fixedCss;
};


/***/ }),
/* 15 */,
/* 16 */,
/* 17 */,
/* 18 */,
/* 19 */,
/* 20 */,
/* 21 */,
/* 22 */,
/* 23 */,
/* 24 */,
/* 25 */,
/* 26 */,
/* 27 */,
/* 28 */,
/* 29 */,
/* 30 */
/***/ (function(module, exports, __webpack_require__) {

!function(e,t){ true?module.exports=t():"function"==typeof define&&define.amd?define([],t):"object"==typeof exports?exports.SlVueTree=t():e.SlVueTree=t()}(window,function(){return function(e){var t={};function i(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,i),o.l=!0,o.exports}return i.m=e,i.c=t,i.d=function(e,t,n){i.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:n})},i.r=function(e){Object.defineProperty(e,"__esModule",{value:!0})},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="",i(i.s=0)}([function(e,t,i){"use strict";i.r(t);var n={name:"sl-vue-tree",props:{value:{type:Array,default:function(){return[]}},edgeSize:{type:Number,default:3},showBranches:{type:Boolean,default:!1},level:{type:Number,default:0},parentInd:{type:Number},allowMultiselect:{type:Boolean,default:!0},multiselectKey:{type:[String,Array],default:function(){return["ctrlKey","metaKey"]},validator:function(e){var t=["ctrlKey","metaKey","altKey"],i=Array.isArray(e)?e:[e];return!!(i=i.filter(function(e){return-1!==t.indexOf(e)})).length}},scrollAreaHeight:{type:Number,default:70},maxScrollSpeed:{type:Number,default:20}},data:function(){return{rootCursorPosition:null,scrollIntervalId:0,scrollSpeed:0,lastSelectedNode:null,mouseIsDown:!1,isDragging:!1,lastMousePos:{x:0,y:0},preventDrag:!1,currentValue:this.value}},mounted:function(){this.isRoot&&document.addEventListener("mouseup",this.onDocumentMouseupHandler)},beforeDestroy:function(){document.removeEventListener("mouseup",this.onDocumentMouseupHandler)},watch:{value:function(e){this.currentValue=e}},computed:{cursorPosition:function(){return this.isRoot?this.rootCursorPosition:this.getParent().cursorPosition},nodes:function(){if(this.isRoot){var e=this.copy(this.currentValue);return this.getNodes(e)}return this.getParent().nodes[this.parentInd].children},gaps:function(){var e=[],t=this.level-1;for(this.showBranches||t++;t-- >0;)e.push(t);return e},isRoot:function(){return!this.level},selectionSize:function(){return this.getSelected().length},dragSize:function(){return this.getDraggable().length}},methods:{setCursorPosition:function(e){this.isRoot?this.rootCursorPosition=e:this.getParent().setCursorPosition(e)},getNodes:function(e){var t=this,i=arguments.length>1&&void 0!==arguments[1]?arguments[1]:[],n=!(arguments.length>2&&void 0!==arguments[2])||arguments[2];return e.map(function(o,r){var s=i.concat(r);return t.getNode(s,o,e,n)})},getNode:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null,n=arguments.length>3&&void 0!==arguments[3]?arguments[3]:null,o=e.slice(-1)[0];if(i=i||this.getNodeSiblings(this.currentValue,e),t=t||i&&i[o]||null,null==n&&(n=this.isVisible(e)),!t)return null;var r=void 0==t.isExpanded||!!t.isExpanded,s=void 0==t.isDraggable||!!t.isDraggable,l=void 0==t.isSelectable||!!t.isSelectable;return{title:t.title,isLeaf:!!t.isLeaf,children:t.children?this.getNodes(t.children,e,r):[],isSelected:!!t.isSelected,isExpanded:r,isVisible:n,isDraggable:s,isSelectable:l,data:void 0!==t.data?t.data:{},path:e,pathStr:JSON.stringify(e),level:e.length,ind:o,isFirstChild:0==o,isLastChild:o===i.length-1}},isVisible:function(e){if(e.length<2)return!0;for(var t=this.currentValue,i=0;i<e.length-1;i++){var n=t[e[i]];if(!(void 0==n.isExpanded||!!n.isExpanded))return!1;t=n.children}return!0},emitInput:function(e){this.currentValue=e,this.getRoot().$emit("input",e)},emitSelect:function(e,t){this.getRoot().$emit("select",e,t)},emitDrop:function(e,t,i){this.getRoot().$emit("drop",e,t,i)},emitToggle:function(e,t){this.getRoot().$emit("toggle",e,t)},emitNodeClick:function(e,t){this.getRoot().$emit("nodeclick",e,t)},emitNodeDblclick:function(e,t){this.getRoot().$emit("nodedblclick",e,t)},emitNodeContextmenu:function(e,t){this.getRoot().$emit("nodecontextmenu",e,t)},onExternalDragoverHandler:function(e,t){t.preventDefault();var i=this.getRoot(),n=i.getCursorPositionFromCoords(t.clientX,t.clientY);i.setCursorPosition(n),i.$emit("externaldragover",n,t)},onExternalDropHandler:function(e,t){var i=this.getRoot(),n=i.getCursorPositionFromCoords(t.clientX,t.clientY);i.$emit("externaldrop",n,t),this.setCursorPosition(null)},select:function(e){var t=this,i=arguments.length>1&&void 0!==arguments[1]&&arguments[1],n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null,o=Array.isArray(this.multiselectKey)?this.multiselectKey:[this.multiselectKey],r=n&&!!o.find(function(e){return n[e]});i=(r||i)&&this.allowMultiselect;var s=this.getNode(e);if(!s)return null;var l=this.copy(this.currentValue),a=this.allowMultiselect&&n&&n.shiftKey&&this.lastSelectedNode,u=[],c=!1;return this.traverse(function(e,n){a?(e.pathStr!==s.pathStr&&e.pathStr!==t.lastSelectedNode.pathStr||(n.isSelected=e.isSelectable,c=!c),c&&(n.isSelected=e.isSelectable)):e.pathStr===s.pathStr?n.isSelected=e.isSelectable:i||n.isSelected&&(n.isSelected=!1),n.isSelected&&u.push(e)},l),this.lastSelectedNode=s,this.emitInput(l),this.emitSelect(u,n),s},onMousemoveHandler:function(e){if(this.isRoot){if(!this.preventDrag){var t=this.isDragging,i=this.isDragging||this.mouseIsDown&&(this.lastMousePos.x!==e.clientX||this.lastMousePos.y!==e.clientY),n=!1===t&&!0===i;if(this.lastMousePos={x:e.clientX,y:e.clientY},i){var o=this.getRoot().$el,r=o.getBoundingClientRect(),s=this.$refs.dragInfo,l=e.clientY-r.top+o.scrollTop-(0|s.style.marginBottom),a=e.clientX-r.left;s.style.top=l+"px",s.style.left=a+"px";var u=this.getCursorPositionFromCoords(e.clientX,e.clientY),c=u.node,d=u.placement;if(n&&!c.isSelected&&this.select(c.path,!1,e),this.getDraggable().length){this.isDragging=i,this.setCursorPosition({node:c,placement:d});var h=r.bottom-this.scrollAreaHeight,f=(e.clientY-h)/(r.bottom-h),g=r.top+this.scrollAreaHeight,v=(g-e.clientY)/(g-r.top);f>0?this.startScroll(f):v>0?this.startScroll(-v):this.stopScroll()}else this.preventDrag=!0}}}else this.getRoot().onMousemoveHandler(e)},getCursorPositionFromCoords:function(e,t){var i,n,o=document.elementFromPoint(e,t),r=o.getAttribute("path")?o:this.getClosetElementWithPath(o);if(r){if(!r)return;i=this.getNode(JSON.parse(r.getAttribute("path")));var s=r.offsetHeight,l=this.edgeSize,a=t-r.getBoundingClientRect().top;n=i.isLeaf?a>=s/2?"after":"before":a<=l?"before":a>=s-l?"after":"inside"}else{var u=this.getRoot().$el.getBoundingClientRect();t>u.top+u.height/2?(n="after",i=this.getLastNode()):(n="before",i=this.getFirstNode())}return{node:i,placement:n}},getClosetElementWithPath:function(e){return e?e.getAttribute("path")?e:this.getClosetElementWithPath(e.parentElement):null},onMouseleaveHandler:function(e){if(this.isRoot&&this.isDragging){var t=this.getRoot().$el.getBoundingClientRect();e.clientY>=t.bottom?this.setCursorPosition({node:this.nodes.slice(-1)[0],placement:"after"}):e.clientY<t.top&&this.setCursorPosition({node:this.getFirstNode(),placement:"before"})}},getNodeEl:function(e){this.getRoot().$el.querySelector('[path="'.concat(JSON.stringify(e),'"]'))},getLastNode:function(){var e=null;return this.traverse(function(t){e=t}),e},getFirstNode:function(){return this.getNode([0])},getNextNode:function(e){var t=this,i=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,n=null;return this.traverse(function(o){if(!(t.comparePaths(o.path,e)<1))return!i||i(o)?(n=o,!1):void 0}),n},getPrevNode:function(e,t){var i=this,n=[];this.traverse(function(t){if(i.comparePaths(t.path,e)>=0)return!1;n.push(t)});for(var o=n.length;o--;){var r=n[o];if(!t||t(r))return r}return null},comparePaths:function(e,t){for(var i=0;i<e.length;i++){if(void 0==t[i])return 1;if(e[i]>t[i])return 1;if(e[i]<t[i])return-1}return void 0==t[e.length]?0:-1},onNodeMousedownHandler:function(e,t){0===e.button&&(this.isRoot?this.mouseIsDown=!0:this.getRoot().onNodeMousedownHandler(e,t))},startScroll:function(e){var t=this,i=this.getRoot().$el;this.scrollSpeed!==e&&(this.scrollIntervalId&&this.stopScroll(),this.scrollSpeed=e,this.scrollIntervalId=setInterval(function(){i.scrollTop+=t.maxScrollSpeed*e},20))},stopScroll:function(){clearInterval(this.scrollIntervalId),this.scrollIntervalId=0,this.scrollSpeed=0},onDocumentMouseupHandler:function(e){this.isDragging&&this.onNodeMouseupHandler(e)},onNodeMouseupHandler:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;if(0===e.button)if(this.isRoot)if(this.mouseIsDown=!1,this.isDragging||!t||this.preventDrag||this.select(t.path,!1,e),this.preventDrag=!1,this.cursorPosition){var i=this.getDraggable(),n=!0,o=!1,r=void 0;try{for(var s,l=i[Symbol.iterator]();!(n=(s=l.next()).done);n=!0){var a=s.value;if(a.pathStr==this.cursorPosition.node.pathStr)return void this.stopDrag();if(this.checkNodeIsParent(a,this.cursorPosition.node))return void this.stopDrag()}}catch(e){o=!0,r=e}finally{try{n||null==l.return||l.return()}finally{if(o)throw r}}var u=this.copy(this.currentValue),c=[],d=!0,h=!1,f=void 0;try{for(var g,v=i[Symbol.iterator]();!(d=(g=v.next()).done);d=!0){var p=g.value,m=this.getNodeSiblings(u,p.path)[p.ind];c.push(this.copy(m)),m._markToDelete=!0}}catch(e){h=!0,f=e}finally{try{d||null==v.return||v.return()}finally{if(h)throw f}}var S=this.cursorPosition.node,y=this.getNodeSiblings(u,S.path),_=y[S.ind];if("inside"===this.cursorPosition.placement){var b;_.children=_.children||[],(b=_.children).unshift.apply(b,c)}else{var C="before"===this.cursorPosition.placement?S.ind:S.ind+1;y.splice.apply(y,[C,0].concat(c))}this.traverseModels(function(e,t,i){e._markToDelete&&t.splice(i,1)},u),this.lastSelectedNode=null,this.emitInput(u),this.emitDrop(i,this.cursorPosition,e),this.stopDrag()}else this.stopDrag();else this.getRoot().onNodeMouseupHandler(e,t)},onToggleHandler:function(e,t){this.updateNode(t.path,{isExpanded:!t.isExpanded}),this.emitToggle(t,e),e.stopPropagation()},stopDrag:function(){this.isDragging=!1,this.mouseIsDown=!1,this.setCursorPosition(null),this.stopScroll()},getParent:function(){return this.$parent},getRoot:function(){return this.isRoot?this:this.getParent().getRoot()},getNodeSiblings:function(e,t){return 1===t.length?e:this.getNodeSiblings(e[t[0]].children,t.slice(1))},updateNode:function(e,t){if(this.isRoot){var i=JSON.stringify(e),n=this.copy(this.currentValue);this.traverse(function(e,n){e.pathStr===i&&Object.assign(n,t)},n),this.emitInput(n)}else this.getParent().updateNode(e,t)},getSelected:function(){var e=[];return this.traverse(function(t){t.isSelected&&e.push(t)}),e},getDraggable:function(){var e=[];return this.traverse(function(t){t.isSelected&&t.isDraggable&&e.push(t)}),e},traverse:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:[];t||(t=this.currentValue);for(var n=!1,o=[],r=0;r<t.length;r++){var s=t[r],l=i.concat(r),a=this.getNode(l,s,t);if(n=!1===e(a,s,t),o.push(a),n)break;if(s.children&&(n=!1===this.traverse(e,s.children,l)))break}return!n&&o},traverseModels:function(e,t){for(var i=t.length;i--;){var n=t[i];n.children&&this.traverseModels(e,n.children),e(n,t,i)}return t},remove:function(e){var t=e.map(function(e){return JSON.stringify(e)}),i=this.copy(this.currentValue);this.traverse(function(e,i,n){var o=!0,r=!1,s=void 0;try{for(var l,a=t[Symbol.iterator]();!(o=(l=a.next()).done);o=!0){var u=l.value;e.pathStr===u&&(i._markToDelete=!0)}}catch(e){r=!0,s=e}finally{try{o||null==a.return||a.return()}finally{if(r)throw s}}},i),this.traverseModels(function(e,t,i){e._markToDelete&&t.splice(i,1)},i),this.emitInput(i)},checkNodeIsParent:function(e,t){var i=t.path;return JSON.stringify(i.slice(0,e.path.length))==e.pathStr},copy:function(e){return JSON.parse(JSON.stringify(e))}}},o=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticClass:"sl-vue-tree",class:{"sl-vue-tree-root":e.isRoot},on:{mousemove:e.onMousemoveHandler,mouseleave:e.onMouseleaveHandler,dragend:function(t){e.onDragendHandler(null,t)}}},[i("div",{ref:"nodes",staticClass:"sl-vue-tree-nodes-list"},[e._l(e.nodes,function(t,n){return i("div",{staticClass:"sl-vue-tree-node",class:{"sl-vue-tree-selected":t.isSelected}},[i("div",{staticClass:"sl-vue-tree-cursor sl-vue-tree-cursor_before",style:{visibility:e.cursorPosition&&e.cursorPosition.node.pathStr===t.pathStr&&"before"===e.cursorPosition.placement?"visible":"hidden"},on:{dragover:function(e){e.preventDefault()}}}),e._v(" "),i("div",{staticClass:"sl-vue-tree-node-item",class:{"sl-vue-tree-cursor-hover":e.cursorPosition&&e.cursorPosition.node.pathStr===t.pathStr,"sl-vue-tree-cursor-inside":e.cursorPosition&&"inside"===e.cursorPosition.placement&&e.cursorPosition.node.pathStr===t.pathStr,"sl-vue-tree-node-is-leaf":t.isLeaf,"sl-vue-tree-node-is-folder":!t.isLeaf},attrs:{path:t.pathStr},on:{mousedown:function(i){e.onNodeMousedownHandler(i,t)},mouseup:function(i){e.onNodeMouseupHandler(i,t)},contextmenu:function(i){e.emitNodeContextmenu(t,i)},dblclick:function(i){e.emitNodeDblclick(t,i)},click:function(i){e.emitNodeClick(t,i)},dragover:function(i){e.onExternalDragoverHandler(t,i)},drop:function(i){e.onExternalDropHandler(t,i)}}},[e._l(e.gaps,function(e){return i("div",{staticClass:"sl-vue-tree-gap"})}),e._v(" "),e.level&&e.showBranches?i("div",{staticClass:"sl-vue-tree-branch"},[e._t("branch",[t.isLastChild?e._e():i("span",[e._v("\n            "+e._s(String.fromCharCode(9500))+e._s(String.fromCharCode(9472))+" \n          ")]),e._v(" "),t.isLastChild?i("span",[e._v("\n            "+e._s(String.fromCharCode(9492))+e._s(String.fromCharCode(9472))+" \n          ")]):e._e()],{node:t})],2):e._e(),e._v(" "),i("div",{staticClass:"sl-vue-tree-title"},[t.isLeaf?e._e():i("span",{staticClass:"sl-vue-tree-toggle",on:{click:function(i){e.onToggleHandler(i,t)}}},[e._t("toggle",[i("span",[e._v("\n             "+e._s(t.isLeaf?"":t.isExpanded?"-":"+")+"\n            ")])],{node:t})],2),e._v(" "),e._t("title",[e._v(e._s(t.title))],{node:t}),e._v(" "),!t.isLeaf&&0==t.children.length&&t.isExpanded?e._t("empty-node",null,{node:t}):e._e()],2),e._v(" "),i("div",{staticClass:"sl-vue-tree-sidebar"},[e._t("sidebar",null,{node:t})],2)],2),e._v(" "),t.children&&t.children.length&&t.isExpanded?i("sl-vue-tree",{attrs:{value:t.children,level:t.level,parentInd:n,allowMultiselect:e.allowMultiselect,edgeSize:e.edgeSize,showBranches:e.showBranches},on:{dragover:function(e){e.preventDefault()}},scopedSlots:e._u([{key:"title",fn:function(t){var i=t.node;return[e._t("title",[e._v(e._s(i.title))],{node:i})]}},{key:"toggle",fn:function(t){var n=t.node;return[e._t("toggle",[i("span",[e._v("\n             "+e._s(n.isLeaf?"":n.isExpanded?"-":"+")+"\n          ")])],{node:n})]}},{key:"sidebar",fn:function(t){var i=t.node;return[e._t("sidebar",null,{node:i})]}},{key:"empty-node",fn:function(t){var i=t.node;return[!i.isLeaf&&0==i.children.length&&i.isExpanded?e._t("empty-node",null,{node:i}):e._e()]}}])}):e._e(),e._v(" "),i("div",{staticClass:"sl-vue-tree-cursor sl-vue-tree-cursor_after",style:{visibility:e.cursorPosition&&e.cursorPosition.node.pathStr===t.pathStr&&"after"===e.cursorPosition.placement?"visible":"hidden"},on:{dragover:function(e){e.preventDefault()}}})],1)}),e._v(" "),e.isRoot?i("div",{directives:[{name:"show",rawName:"v-show",value:e.isDragging,expression:"isDragging"}],ref:"dragInfo",staticClass:"sl-vue-tree-drag-info"},[e._t("draginfo",[e._v("\n        Items: "+e._s(e.selectionSize)+"\n      ")])],2):e._e()],2)])};o._withStripped=!0;var r=function(e,t,i,n,o,r,s,l){var a=typeof(e=e||{}).default;"object"!==a&&"function"!==a||(e=e.default);var u,c="function"==typeof e?e.options:e;if(t&&(c.render=t,c.staticRenderFns=i,c._compiled=!0),n&&(c.functional=!0),r&&(c._scopeId=r),s?(u=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(s)},c._ssrRegister=u):o&&(u=l?function(){o.call(this,this.$root.$options.shadowRoot)}:o),u)if(c.functional){c._injectStyles=u;var d=c.render;c.render=function(e,t){return u.call(t),d(e,t)}}else{var h=c.beforeCreate;c.beforeCreate=h?[].concat(h,u):[u]}return{exports:e,options:c}}(n,o,[],!1,null,null,null);r.options.__file="src\\sl-vue-tree.vue";t.default=r.exports}]).default});
//# sourceMappingURL=sl-vue-tree.js.map

/***/ }),
/* 31 */
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(32);
if(typeof content === 'string') content = [[module.i, content, '']];
// Prepare cssTransformation
var transform;

var options = {}
options.transform = transform
// add the styles to the DOM
var update = __webpack_require__(13)(content, options);
if(content.locals) module.exports = content.locals;
// Hot Module Replacement
if(false) {
	// When the styles change, update the <style> tags
	if(!content.locals) {
		module.hot.accept("!!../../css-loader/index.js!./sl-vue-tree-dark.css", function() {
			var newContent = require("!!../../css-loader/index.js!./sl-vue-tree-dark.css");
			if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
			update(newContent);
		});
	}
	// When the module is disposed, remove the <style> tags
	module.hot.dispose(function() { update(); });
}

/***/ }),
/* 32 */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(5)(false);
// imports


// module
exports.push([module.i, ".sl-vue-tree {\r\n    position: relative;\r\n    cursor: default;\r\n    -webkit-touch-callout: none; /* iOS Safari */\r\n    -webkit-user-select: none; /* Safari */\r\n    -khtml-user-select: none; /* Konqueror HTML */\r\n    -moz-user-select: none; /* Firefox */\r\n    -ms-user-select: none; /* Internet Explorer/Edge */\r\n    user-select: none;\r\n}\r\n\r\n.sl-vue-tree.sl-vue-tree-root {\r\n    border: 1px solid rgb(9, 22, 29);\r\n    background-color: rgb(9, 22, 29);\r\n    color: rgba(255, 255, 255, 0.5);\r\n    border-radius: 3px;\r\n}\r\n\r\n.sl-vue-tree-root > .sl-vue-tree-nodes-list {\r\n    overflow: hidden;\r\n    position: relative;\r\n    padding-bottom: 4px;\r\n}\r\n\r\n.sl-vue-tree-selected > .sl-vue-tree-node-item {\r\n    background-color: #13242d;\r\n    color: white;\r\n}\r\n\r\n.sl-vue-tree-node-item:hover,\r\n.sl-vue-tree-node-item.sl-vue-tree-cursor-hover {\r\n    color: white;\r\n}\r\n\r\n.sl-vue-tree-node-item {\r\n    position: relative;\r\n    display: flex;\r\n    flex-direction: row;\r\n\r\n    padding-left: 10px;\r\n    padding-right: 10px;\r\n    line-height: 28px;\r\n    border: 1px solid transparent;\r\n}\r\n\r\n\r\n.sl-vue-tree-node-item.sl-vue-tree-cursor-inside {\r\n    border: 1px solid rgba(255, 255, 255, 0.5);\r\n}\r\n\r\n.sl-vue-tree-gap {\r\n    width: 25px;\r\n    min-height: 1px;\r\n\r\n}\r\n\r\n.sl-vue-tree-toggle {\r\n    display: inline-block;\r\n    text-align: left;\r\n    width: 20px;\r\n}\r\n\r\n.sl-vue-tree-sidebar {\r\n    margin-left: auto;\r\n}\r\n\r\n.sl-vue-tree-cursor {\r\n    position: absolute;\r\n    border: 1px solid rgba(255, 255, 255, 0.5);\r\n    height: 1px;\r\n    width: 100%;\r\n}\r\n\r\n.sl-vue-tree-drag-info {\r\n    position: absolute;\r\n    background-color: rgba(0,0,0,0.5);\r\n    opacity: 0.5;\r\n    margin-left: 20px;\r\n    padding: 5px 10px;\r\n}\r\n", ""]);

// exports


/***/ })
/******/ ]);