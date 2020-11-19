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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
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
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(2);
module.exports = __webpack_require__(9);


/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

Nova.booting(function (Vue, router) {
    router.addRoutes([{
        name: 'access-tabs',
        path: '/access/tabs',
        component: __webpack_require__(3)
    }, {
        name: 'access-actions',
        path: '/access/actions',
        component: __webpack_require__(6)
    }]);
});

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(4)
/* template */
var __vue_template__ = __webpack_require__(5)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
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
Component.options.__file = "resources/js/components/Tabs.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6e9bbb69", Component.options)
  } else {
    hotAPI.reload("data-v-6e9bbb69", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 4 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            loading: true,
            data: {},
            currentType: 1,
            currentRole: 1,
            currentUser: 0
        };
    },
    created: function created() {
        var _this = this;

        Nova.request().get('/nova-vendor/access-control/tabs/get', { params: { role_id: 1, type_id: 1 } }).then(function (response) {
            _this.data = response.data;
            _this.loading = false;
        });
    },

    methods: {
        changeType: function changeType(e) {
            var _this2 = this;

            this.loading = true;
            Nova.request().get('/nova-vendor/access-control/tabs/get', {
                params: { type_id: e.target.value }
            }).then(function (response) {
                _this2.data.tabs = response.data.tabs;
                _this2.loading = false;
            });
        },
        changeRole: function changeRole(e) {
            var _this3 = this;

            this.loading = true;
            Nova.request().get('/nova-vendor/access-control/tabs/get', {
                params: { type_id: this.currentType, role_id: e.target.value }
            }).then(function (response) {
                _this3.data.tabs = response.data.tabs;
                _this3.loading = false;
            });
        },
        changeUser: function changeUser(e) {
            var _this4 = this;

            this.loading = true;
            Nova.request().get('/nova-vendor/access-control/tabs/get', {
                params: { type_id: this.currentType, role_id: this.currentRole, admin_id: e.target.value }
            }).then(function (response) {
                _this4.data.tabs = response.data.tabs;
                _this4.loading = false;
            });
        },
        changeAction: function changeAction(access, tabId) {
            var _this5 = this;

            this.loading = true;
            Nova.request().post('/nova-vendor/access-control/tabs/modify', {
                tab_id: tabId,
                role_id: this.currentRole,
                admin_id: this.currentUser,
                access: access
            }).then(function (response) {
                _this5.loading = false;
            });
        }
    }
});

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "loading-view",
    { attrs: { loading: _vm.loading } },
    [
      _c("heading", { staticClass: "mb-3" }, [_vm._v("Доступ в меню")]),
      _vm._v(" "),
      _c("loading-card", { attrs: { loading: _vm.loading } }, [
        _c("div", { staticClass: "flex" }, [
          _c(
            "div",
            { staticClass: "w-4/5 overflow-hidden overflow-x-auto relative" },
            [
              _c(
                "table",
                {
                  staticClass: "table w-full",
                  attrs: { "data-testid": "resource-table" }
                },
                [
                  _c("thead", [
                    _c("tr", [
                      _c("th", {}, [_c("span", [_vm._v("Название")])]),
                      _vm._v(" "),
                      _c("th")
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "tbody",
                    _vm._l(_vm.data.tabs, function(tab) {
                      return _c("tr", [
                        _c(
                          "td",
                          {
                            staticClass: "w-4/5",
                            style:
                              tab.parent_id != 0 ? "padding-left: 35px;" : ""
                          },
                          [
                            _c(
                              "i",
                              {
                                staticClass: "material-icons",
                                staticStyle: {
                                  position: "relative",
                                  top: "6px"
                                }
                              },
                              [_vm._v(_vm._s(tab.icon))]
                            ),
                            _vm._v(" "),
                            _c("span", [_vm._v(_vm._s(tab.name))])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "td",
                          { staticClass: "w-1/5" },
                          [
                            _c(
                              "el-radio-group",
                              {
                                staticStyle: { float: "right" },
                                attrs: { size: "mini" },
                                on: {
                                  change: function($event) {
                                    return _vm.changeAction($event, tab.id)
                                  }
                                },
                                model: {
                                  value: tab.permission,
                                  callback: function($$v) {
                                    _vm.$set(tab, "permission", $$v)
                                  },
                                  expression: "tab.permission"
                                }
                              },
                              [
                                _c("el-radio-button", { attrs: { label: 1 } }, [
                                  _vm._v("Да")
                                ]),
                                _vm._v(" "),
                                _c("el-radio-button", { attrs: { label: 0 } }, [
                                  _vm._v("Нет")
                                ])
                              ],
                              1
                            )
                          ],
                          1
                        )
                      ])
                    }),
                    0
                  )
                ]
              )
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "w-1/5 px-8" }, [
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "text-base text-80 font-bold py-3" }, [
                _vm._v("\n                        Роль\n                    ")
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c(
                "select",
                {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.currentRole,
                      expression: "currentRole"
                    }
                  ],
                  staticClass: "form-control form-select w-full",
                  attrs: { id: "language_select" },
                  on: {
                    change: [
                      function($event) {
                        var $$selectedVal = Array.prototype.filter
                          .call($event.target.options, function(o) {
                            return o.selected
                          })
                          .map(function(o) {
                            var val = "_value" in o ? o._value : o.value
                            return val
                          })
                        _vm.currentRole = $event.target.multiple
                          ? $$selectedVal
                          : $$selectedVal[0]
                      },
                      function($event) {
                        return _vm.changeRole($event)
                      }
                    ]
                  }
                },
                [
                  _c(
                    "option",
                    { attrs: { value: "", selected: "", disabled: "" } },
                    [
                      _vm._v(
                        "\n                            " +
                          _vm._s(_vm.__("Choose an option")) +
                          "\n                        "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _vm._l(_vm.data.roles, function(role) {
                    return _c(
                      "option",
                      {
                        domProps: {
                          value: role.id,
                          selected: role.id === _vm.currentRole
                        }
                      },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(role.title) +
                            "\n                        "
                        )
                      ]
                    )
                  })
                ],
                2
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row py-3" })
          ])
        ])
      ])
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
    require("vue-hot-reload-api")      .rerender("data-v-6e9bbb69", module.exports)
  }
}

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(7)
/* template */
var __vue_template__ = __webpack_require__(8)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
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
Component.options.__file = "resources/js/components/Actions.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-36eeabe2", Component.options)
  } else {
    hotAPI.reload("data-v-36eeabe2", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 7 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            loading: true,
            data: {},
            currentTab: 0,
            currentRole: 1,
            currentUser: 0
        };
    },
    created: function created() {
        var _this = this;

        Nova.request().get('/nova-vendor/access-control/actions/get', { params: { tab_id: 0 } }).then(function (response) {
            _this.data = response.data;
            _this.currentTab = response.data.tabs[0].id;
            _this.loading = false;
        });
    },

    methods: {
        changeTab: function changeTab(e) {
            var _this2 = this;

            this.loading = true;
            Nova.request().get('/nova-vendor/access-control/actions/get', {
                params: { tab_id: this.currentTab, role_id: e.target.value }
            }).then(function (response) {
                _this2.data.actions = response.data.actions;
                _this2.loading = false;
            });
        },
        changeRole: function changeRole(e) {
            var _this3 = this;

            this.loading = true;
            Nova.request().get('/nova-vendor/access-control/actions/get', {
                params: { tab_id: this.currentTab, role_id: e.target.value }
            }).then(function (response) {
                _this3.data.actions = response.data.actions;
                _this3.loading = false;
            });
        },
        changeUser: function changeUser(e) {
            var _this4 = this;

            this.loading = true;
            Nova.request().get('/nova-vendor/access-control/actions/get', {
                params: {
                    tab_id: this.currentTab,
                    role_id: this.currentRole,
                    admin_id: e.target.value
                }
            }).then(function (response) {
                _this4.data.actions = response.data.actions;
                _this4.loading = false;
            });
        },
        changeAction: function changeAction(access, actionId) {
            var _this5 = this;

            this.loading = true;
            Nova.request().post('/nova-vendor/access-control/actions/modify', {
                action_id: actionId,
                role_id: this.currentRole,
                admin_id: this.currentUser,
                access: access
            }).then(function (response) {
                _this5.loading = false;
            });
        }
    }
});

/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "loading-view",
    { attrs: { loading: false } },
    [
      _c("heading", { staticClass: "mb-3" }, [_vm._v("Действия")]),
      _vm._v(" "),
      _c("loading-card", { attrs: { loading: _vm.loading } }, [
        _c("div", { staticClass: "flex" }, [
          _c(
            "div",
            { staticClass: "w-4/5 overflow-hidden overflow-x-auto relative" },
            [
              _c(
                "table",
                {
                  staticClass: "table w-full",
                  attrs: {
                    cellpadding: "0",
                    cellspacing: "0",
                    "data-testid": "resource-table"
                  }
                },
                [
                  _c("thead", [
                    _c("tr", [
                      _c("th", {}, [_c("span", [_vm._v("Название")])]),
                      _vm._v(" "),
                      _c("th")
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "tbody",
                    _vm._l(_vm.data.actions, function(action) {
                      return _c("tr", [
                        _c("td", { staticClass: "w-4/5" }, [
                          _c("span", [_vm._v(_vm._s(action.title))])
                        ]),
                        _vm._v(" "),
                        _c(
                          "td",
                          { staticClass: "w-1/5" },
                          [
                            _c(
                              "el-radio-group",
                              {
                                staticStyle: { float: "right" },
                                attrs: { size: "mini" },
                                on: {
                                  change: function($event) {
                                    return _vm.changeAction($event, action.id)
                                  }
                                },
                                model: {
                                  value: action.permission,
                                  callback: function($$v) {
                                    _vm.$set(action, "permission", $$v)
                                  },
                                  expression: "action.permission"
                                }
                              },
                              [
                                _c("el-radio-button", { attrs: { label: 1 } }, [
                                  _vm._v("Да")
                                ]),
                                _vm._v(" "),
                                _c("el-radio-button", { attrs: { label: 0 } }, [
                                  _vm._v("Нет")
                                ])
                              ],
                              1
                            )
                          ],
                          1
                        )
                      ])
                    }),
                    0
                  )
                ]
              )
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "w-1/5 px-8" }, [
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "text-base text-80 font-bold py-3" }, [
                _vm._v("\n                        Таб\n                    ")
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c(
                "select",
                {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.currentTab,
                      expression: "currentTab"
                    }
                  ],
                  staticClass: "form-control form-select w-full",
                  on: {
                    change: [
                      function($event) {
                        var $$selectedVal = Array.prototype.filter
                          .call($event.target.options, function(o) {
                            return o.selected
                          })
                          .map(function(o) {
                            var val = "_value" in o ? o._value : o.value
                            return val
                          })
                        _vm.currentTab = $event.target.multiple
                          ? $$selectedVal
                          : $$selectedVal[0]
                      },
                      function($event) {
                        return _vm.changeTab($event)
                      }
                    ]
                  }
                },
                [
                  _c(
                    "option",
                    { attrs: { value: "", selected: "", disabled: "" } },
                    [
                      _vm._v(
                        "\n                            " +
                          _vm._s(_vm.__("Choose an option")) +
                          "\n                        "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _vm._l(_vm.data.tabs, function(tab) {
                    return _c(
                      "option",
                      {
                        domProps: {
                          value: tab.id,
                          selected: tab.id === _vm.currentTab
                        }
                      },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(tab.name) +
                            "\n                        "
                        )
                      ]
                    )
                  })
                ],
                2
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row py-3" }),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "text-base text-80 font-bold py-3" }, [
                _vm._v("\n                        Роле\n                    ")
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c(
                "select",
                {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.currentRole,
                      expression: "currentRole"
                    }
                  ],
                  staticClass: "form-control form-select w-full",
                  on: {
                    change: [
                      function($event) {
                        var $$selectedVal = Array.prototype.filter
                          .call($event.target.options, function(o) {
                            return o.selected
                          })
                          .map(function(o) {
                            var val = "_value" in o ? o._value : o.value
                            return val
                          })
                        _vm.currentRole = $event.target.multiple
                          ? $$selectedVal
                          : $$selectedVal[0]
                      },
                      function($event) {
                        return _vm.changeRole($event)
                      }
                    ]
                  }
                },
                [
                  _c(
                    "option",
                    { attrs: { value: "", selected: "", disabled: "" } },
                    [
                      _vm._v(
                        "\n                            " +
                          _vm._s(_vm.__("Choose an option")) +
                          "\n                        "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _vm._l(_vm.data.roles, function(role) {
                    return _c(
                      "option",
                      {
                        domProps: {
                          value: role.id,
                          selected: role.id === _vm.currentRole
                        }
                      },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(role.title) +
                            "\n                        "
                        )
                      ]
                    )
                  })
                ],
                2
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row py-3" }),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "text-base text-80 font-bold py-3" }, [
                _vm._v(
                  "\n                        Пользаватель\n                    "
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c(
                "select",
                {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.currentUser,
                      expression: "currentUser"
                    }
                  ],
                  staticClass: "form-control form-select w-full",
                  attrs: { id: "language_select" },
                  on: {
                    change: [
                      function($event) {
                        var $$selectedVal = Array.prototype.filter
                          .call($event.target.options, function(o) {
                            return o.selected
                          })
                          .map(function(o) {
                            var val = "_value" in o ? o._value : o.value
                            return val
                          })
                        _vm.currentUser = $event.target.multiple
                          ? $$selectedVal
                          : $$selectedVal[0]
                      },
                      function($event) {
                        return _vm.changeUser($event)
                      }
                    ]
                  }
                },
                [
                  _c("option", { attrs: { value: "0", selected: "" } }, [
                    _vm._v(
                      "\n                            Выберите пользователя\n                        "
                    )
                  ]),
                  _vm._v(" "),
                  _vm._l(_vm.data.users, function(user) {
                    return _c(
                      "option",
                      {
                        domProps: {
                          value: user.id,
                          selected: user.id === _vm.currentUser
                        }
                      },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(user.first_name) +
                            " " +
                            _vm._s(user.last_name) +
                            "\n                        "
                        )
                      ]
                    )
                  })
                ],
                2
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row py-3" })
          ])
        ])
      ])
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
    require("vue-hot-reload-api")      .rerender("data-v-36eeabe2", module.exports)
  }
}

/***/ }),
/* 9 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);