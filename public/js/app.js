webpackJsonp([1],[
/* 0 */,
/* 1 */
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// this module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
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
/* 2 */,
/* 3 */,
/* 4 */,
/* 5 */,
/* 6 */,
/* 7 */,
/* 8 */,
/* 9 */,
/* 10 */,
/* 11 */,
/* 12 */,
/* 13 */,
/* 14 */,
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
/* 30 */,
/* 31 */,
/* 32 */,
/* 33 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(133),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/single/SetlistSong.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1467f2ed", Component.options)
  } else {
    hotAPI.reload("data-v-1467f2ed", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 34 */
/***/ (function(module, exports) {

module.exports = [{"name":"C","value":"C"},{"name":"D","value":"D"},{"name":"E","value":"E"},{"name":"F","value":"F"},{"name":"G","value":"G"},{"name":"A","value":"A"},{"name":"B","value":"B"},{"name":"Cm","value":"Cm"},{"name":"Dm","value":"Dm"},{"name":"Em","value":"Em"},{"name":"Fm","value":"Fm"},{"name":"Gm","value":"Gm"},{"name":"Am","value":"Am"},{"name":"Bm","value":"Bm"},{"name":"C♯","value":"C♯"},{"name":"D♯","value":"D♯"},{"name":"F♯","value":"F♯"},{"name":"G♯","value":"G♯"},{"name":"A♯","value":"A♯"},{"name":"C♯m","value":"C♯m"},{"name":"D♯m","value":"D♯m"},{"name":"F♯m","value":"F♯m"},{"name":"G♯m","value":"G♯m"},{"name":"A♯m","value":"A♯m"},{"name":"D♭","value":"D♭"},{"name":"E♭","value":"E♭"},{"name":"G♭","value":"G♭"},{"name":"A♭","value":"A♭"},{"name":"B♭♯","value":"B♭"},{"name":"D♭m","value":"D♭m"},{"name":"E♭m","value":"E♭m"},{"name":"G♭m","value":"G♭m"},{"name":"A♭m","value":"A♭m"},{"name":"B♭m","value":"B♭m"}]

/***/ }),
/* 35 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(178),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/modals/EditSetlistSong.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-b5bb18be", Component.options)
  } else {
    hotAPI.reload("data-v-b5bb18be", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 36 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(37);
module.exports = __webpack_require__(234);


/***/ }),
/* 37 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _vue = __webpack_require__(12);

var _vue2 = _interopRequireDefault(_vue);

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
window.axios = __webpack_require__(6);

window.axios.defaults.headers.common = {
  'X-CSRF-TOKEN': window.Laravel.csrfToken,
  'X-Requested-With': 'XMLHttpRequest'
};

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* Single */
_vue2.default.component('Gig', __webpack_require__(130));
_vue2.default.component('SetlistSong', __webpack_require__(33));
_vue2.default.component('Song', __webpack_require__(135));
_vue2.default.component('Invitation', __webpack_require__(138));

/* Lists */
_vue2.default.component('BandMembers', __webpack_require__(141));
_vue2.default.component('BandNavigation', __webpack_require__(144));
_vue2.default.component('Bands', __webpack_require__(147));
_vue2.default.component('Gigs', __webpack_require__(153));
_vue2.default.component('Invitations', __webpack_require__(159));
_vue2.default.component('Repertoire', __webpack_require__(166));
_vue2.default.component('Setlist', __webpack_require__(172));
_vue2.default.component('Setlists', __webpack_require__(180));
_vue2.default.component('Songs', __webpack_require__(186));

/* Grid items */
_vue2.default.component('BandCard', __webpack_require__(192));

/* Modals */
_vue2.default.component('CreateSetlist', __webpack_require__(194));
_vue2.default.component('AddSetlistSong', __webpack_require__(197));
_vue2.default.component('EditSetlistSong', __webpack_require__(35));

_vue2.default.component('Breadcrumbs', __webpack_require__(200));
_vue2.default.component('CustomButton', __webpack_require__(203));
_vue2.default.component('CustomButtonRow', __webpack_require__(206));
_vue2.default.component('MainFooter', __webpack_require__(209));
_vue2.default.component('MainNavigation', __webpack_require__(213));
_vue2.default.component('WelcomeScreen', __webpack_require__(217));

var app = new _vue2.default({
  el: '#app'
});

quark.Init.default();

/***/ }),
/* 38 */,
/* 39 */,
/* 40 */,
/* 41 */,
/* 42 */,
/* 43 */,
/* 44 */,
/* 45 */,
/* 46 */,
/* 47 */,
/* 48 */,
/* 49 */,
/* 50 */,
/* 51 */,
/* 52 */,
/* 53 */,
/* 54 */,
/* 55 */,
/* 56 */,
/* 57 */,
/* 58 */,
/* 59 */,
/* 60 */,
/* 61 */,
/* 62 */,
/* 63 */,
/* 64 */,
/* 65 */,
/* 66 */,
/* 67 */,
/* 68 */,
/* 69 */,
/* 70 */,
/* 71 */,
/* 72 */,
/* 73 */,
/* 74 */,
/* 75 */,
/* 76 */,
/* 77 */,
/* 78 */,
/* 79 */,
/* 80 */,
/* 81 */,
/* 82 */,
/* 83 */,
/* 84 */,
/* 85 */,
/* 86 */,
/* 87 */,
/* 88 */,
/* 89 */,
/* 90 */,
/* 91 */,
/* 92 */,
/* 93 */,
/* 94 */,
/* 95 */,
/* 96 */,
/* 97 */,
/* 98 */,
/* 99 */,
/* 100 */,
/* 101 */,
/* 102 */,
/* 103 */,
/* 104 */,
/* 105 */,
/* 106 */,
/* 107 */,
/* 108 */,
/* 109 */,
/* 110 */,
/* 111 */,
/* 112 */,
/* 113 */,
/* 114 */,
/* 115 */,
/* 116 */,
/* 117 */,
/* 118 */,
/* 119 */,
/* 120 */,
/* 121 */,
/* 122 */,
/* 123 */,
/* 124 */,
/* 125 */,
/* 126 */,
/* 127 */,
/* 128 */,
/* 129 */,
/* 130 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(131),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/single/Gig.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-5496f506", Component.options)
  } else {
    hotAPI.reload("data-v-5496f506", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 131 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _GigTemplate = __webpack_require__(132);

var _GigTemplate2 = _interopRequireDefault(_GigTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Gig',
    props: ['url', 'method', 'values'],
    template: _GigTemplate2.default,
    data: function data() {
        return {
            data: {
                values: this.values != undefined ? this.values : {}
            }
        };
    }
};

/***/ }),
/* 132 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var InputField = quark.Molecules.FormElements.InputField;
var DatePicker = quark.Molecules.FormElements.DatePicker;
var Checkbox = quark.Molecules.FormElements.Checkbox;
var Button = quark.Atoms.Buttons.Button;

function createReadOnlyFormElement(formElement) {
    if (formElement.attributes == undefined) formElement.attributes = [];
    formElement.attributes.push("readonly");
    return formElement;
}

var formElements = {
    name: {
        id: "name",
        name: "name",
        label: "Name",
        type: "text",
        placeholder: "Name of the gig",
        attributes: ["required", "v-model='data.values.name'"]
    },
    venue: {
        id: "venue",
        name: "venue",
        label: "Venue",
        type: "text",
        placeholder: "Venue the gig takes place",
        attributes: ["v-model='data.values.venue'"]
    },
    location: {
        id: "location",
        name: "location",
        label: "Location",
        type: "text",
        placeholder: "Location of the gig",
        attributes: ["v-model='data.values.location'"]
    },
    date: {
        id: "date",
        name: "date",
        label: "Date",
        type: "datetime",
        clockOptions: {
            required: false
        },
        attributes: ["v-model='data.values.date'"]
    },
    confirmed: {
        id: "confirmed",
        name: "confirmed",
        label: "Confirmed",
        value: "",
        vueBindings: {
            value: "data.values.confirmed"
        }
    },
    public: {
        id: "public",
        name: "public",
        label: "Public",
        value: "",
        vueBindings: {
            value: "data.values.public"
        }
    },
    actionButton: {
        create: {
            submit: true,
            theme: 'primary',
            content: 'Create'
        },
        update: {
            submit: true,
            theme: 'primary',
            content: 'Update'
        },
        edit: {
            submit: false,
            theme: 'primary',
            content: 'Edit',
            attributes: ["v-bind:href='url'"]
        }
    }
};

var formHtmlElements = {
    name: {
        editable: InputField.getModule(formElements.name),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.name))
    },
    venue: {
        editable: InputField.getModule(formElements.venue),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.venue))
    },
    location: {
        editable: InputField.getModule(formElements.location),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.location))
    },
    date: {
        editable: DatePicker.getModule(formElements.date),
        readOnly: DatePicker.getModule(createReadOnlyFormElement(formElements.date))
    },
    confirmed: {
        editable: Checkbox.getModule(formElements.confirmed),
        readOnly: Checkbox.getModule(createReadOnlyFormElement(formElements.confirmed))
    },
    public: {
        editable: Checkbox.getModule(formElements.public),
        readOnly: Checkbox.getModule(createReadOnlyFormElement(formElements.public))
    },
    actionButton: {
        create: Button.getModule(formElements.actionButton.create),
        update: Button.getModule(formElements.actionButton.update),
        edit: Button.getModule(formElements.actionButton.edit)
    }
};

var template = "\n<form method=\"POST\" v-bind:action=\"url\">\n    <input v-if=\"method !== 'GET'\" type=\"hidden\" name=\"_token\" value=\"" + window.Laravel.csrfToken + "\" />\n    <input v-if=\"method == 'PUT'\" type=\"hidden\" name=\"_method\" value=\"PUT\" />\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.name.readOnly + "</div><div v-else>" + formHtmlElements.name.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.venue.readOnly + "</div><div v-else>" + formHtmlElements.venue.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.location.readOnly + "</div><div v-else>" + formHtmlElements.location.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.date.readOnly + "</div><div v-else>" + formHtmlElements.date.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.confirmed.readOnly + "</div><div v-else>" + formHtmlElements.confirmed.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.public.readOnly + "</div><div v-else>" + formHtmlElements.public.editable + "</div>\n    <div class=\"input-group float-right\">\n        <div v-if=\"method == 'POST'\">" + formHtmlElements.actionButton.create + "</div>\n        <div v-else-if=\"method == 'PUT'\">" + formHtmlElements.actionButton.update + "</div>\n        <div v-else-if=\"method == 'GET'\">" + formHtmlElements.actionButton.edit + "</div>\n    </div>\n    <div class=\"clearfix\"></div> \n</form>\n";

exports.default = template;

/***/ }),
/* 133 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _SetlistSongTemplate = __webpack_require__(134);

var _SetlistSongTemplate2 = _interopRequireDefault(_SetlistSongTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'SetlistSong',
    props: ['method', 'values'],
    template: _SetlistSongTemplate2.default,
    data: function data() {
        return {
            data: {
                values: this.values != undefined ? this.values : {}
            }
        };
    }
    /*   data () {
            let setlistSong = {
               key: {
                   id: "setlist-song-modal-key-" + this.formData.savedValues.id,
                   value: this.formData.savedValues !== undefined && this.formData.savedValues.key !== undefined ? this.formData.savedValues.key : ''
               },
               bpm: {
                   id: "setlist-song-modal-bpm-" + this.formData.savedValues.id,
                   value: this.formData.savedValues !== undefined && this.formData.savedValues.bpm !== undefined ? this.formData.savedValues.bpm : ''
               },
               duration: {
                   id: "setlist-song-modal-duration-" + this.formData.savedValues.id,
                   value: this.formData.savedValues !== undefined && this.formData.savedValues.duration !== undefined ? this.formData.savedValues.duration : ''
               },
               intensity: {
                   id: "setlist-song-modal-intensity-" + this.formData.savedValues.id,
                   value: this.formData.savedValues !== undefined && this.formData.savedValues.intensity !== undefined ? this.formData.savedValues.intensity : ''
               },
               comment: {
                   id: "setlist-song-modal-comment-" + this.formData.savedValues.id,
                   value: this.formData.savedValues !== undefined && this.formData.savedValues.comment !== undefined ? this.formData.savedValues.comment : ''
               }
           };
            return {
               setlistSong: setlistSong,
               formElements: {
                   key: quark.Molecules.FormElements.SelectList.getModule({
                       id: setlistSong.key.id,
                       name: "key",
                       label: "Key",
                       searchable: true,
                       placeholder: "E.g. F, Am, or C#",
                       value: setlistSong.key.value,
                       options: require("../../data/musicalKeys.json"),
                       attributes: this.formData.viewType == 'show' ? ["readonly"] : []
                   }),
                   bpm: quark.Molecules.FormElements.InputField.getModule({
                       id: setlistSong.bpm.id,
                       name: "bpm",
                       label: "BPM",
                       type: "number",
                       placeholder: "Beats Per Minute",
                       value: setlistSong.bpm.value,
                       attributes: this.formData.viewType == 'show' ? ["readonly"] : ["min='0'"]
                   }),
                   duration: quark.Molecules.FormElements.DatePicker.getModule({
                       id: setlistSong.duration.id,
                       name: "duration",
                       label: "Duration",
                       type: "time",
                       placeholder: "03:25",
                       value: setlistSong.duration.value,
                       attributes: this.formData.viewType == 'show' ? ["readonly"] : [],
                       clockOptions: {
                           showHours: false
                       }
                   }),
                   intensity: quark.Molecules.FormElements.InputField.getModule({
                       id: setlistSong.intensity.id,
                       name: "intensity",
                       label: "Intensity",
                       type: "number",
                       placeholder: "1&ndash;10 (Ballad&ndash;Bebop)",
                       value: setlistSong.intensity.value,
                       attributes: this.formData.viewType == 'show' ? ["readonly"] : ["min='0'", "max='10'"]
                   }),
                   comment: quark.Molecules.FormElements.InputField.getModule({
                       id: setlistSong.comment.id,
                       name: "comment",
                       label: "Comment",
                       value: setlistSong.comment.value,
                       attributes: this.formData.viewType == 'show' ? ["readonly"] : []
                   })
               },
               csrfToken: window.Laravel.csrfToken
           }
       },*/
    /*created: function () {
        this.$parent.setlistSongModalButtons[this.setlistSongId] = this.createModalElement();
    },*/
    /*  methods: {
          getActionButtonText: function () {
              let actionButtonText = '';
              if (this.formData.viewType == 'create') actionButtonText = 'Create';
              else if (this.formData.viewType == 'edit') actionButtonText = 'Update';
              else if (this.formData.viewType == 'show') actionButtonText = 'Edit';
              return actionButtonText;
          },
          createModalContent: function () {
              let tokenInputElement = '';
              let methodInputElement = '';
              if (this.formData.viewType !== 'show') {
                  tokenInputElement = `<input type="hidden" name="_token" value="${this.csrfToken}"/>`;
              }
              if (this.formData.viewType == 'edit') {
                  methodInputElement = `<input type="hidden" name="_method" value="PUT">`;
              }
              let inputElements = `${tokenInputElement}${methodInputElement}${this.formElements.key}${this.formElements.bpm}${this.formElements.duration}${this.formElements.intensity}${this.formElements.comment}`;
              return `<div class="content-container"><form method="POST" action="${this.formData.postUrl}">${inputElements}<div class="clearfix"></div></form></div>`;
          },
           createModalElement: function () {
               let actionButton = {
                  id: "setlist-song-action-button-" + this.formData.savedValues.id,
                  theme: 'primary',
                  content: this.getActionButtonText(),
                  ajaxOptions: {
                      method: 'put',
                      url: '/setlistsongs/' + this.formData.savedValues.id,
                      data: {
                          setlist_id: this.formData.savedValues.setlist_id,
                          song_id: this.formData.savedValues.song.id,
                          number_in_list: this.formData.savedValues.number_in_list
                      },
                      getDataFromElements: true,
                      dataFromElements: [
                          {
                              name: 'key',
                              elementId: this.setlistSong.key.id + '-input'
                          },
                          {
                              name: 'bpm',
                              elementId: this.setlistSong.bpm.id
                          },
                          {
                              name: 'duration',
                              elementId: this.setlistSong.duration.id + '-input'
                          },
                          {
                              name: 'intensity',
                              elementId: this.setlistSong.intensity.id
                          },
                          {
                              name: 'comment',
                              elementId: this.setlistSong.comment.id
                          }
                      ],
                  }
              };
              return quark.Molecules.Messaging.Modal.getModule({
                      id: 'setlist-song-modal-' + this.formData.savedValues.id,
                      triggerElement: quark.Atoms.Buttons.Button.getModule({
                          iconClass: 'fa fa-pencil',
                          type: 'minimal',
                          theme: 'primary'
                      }),
                      modalElement: {
                          title: 'Setlist song',
                          content: this.createModalContent(),
                          scrollable: true,
                          footerButtons: {
                              buttonRow: {
                                  buttons: [
                                      actionButton
                                  ]
                              }
                          }
                      }
                  }
              );
          }
      }*/

};

/***/ }),
/* 134 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var InputField = quark.Molecules.FormElements.InputField;
var SelectList = quark.Molecules.FormElements.SelectList;
var DatePicker = quark.Molecules.FormElements.DatePicker;
var Button = quark.Atoms.Buttons.Button;

function createReadOnlyFormElement(formElement) {
    formElement.attributes.push("readonly");
    return formElement;
}

var formElements = {
    key: {
        id: "key",
        name: "key",
        label: "Key",
        searchable: true,
        placeholder: "E.g. F, Am, or C#",
        options: __webpack_require__(34),
        attributes: ["v-model='data.values.key'"],
        vueBindings: {
            id: '"key-" + data.values.number_in_list'
        }
    },
    bpm: {
        name: "bpm",
        label: "BPM",
        type: "number",
        placeholder: "Beats Per Minute",
        attributes: ["min='0'", "v-model='data.values.bpm'"],
        vueBindings: {
            id: '"bpm-" + data.values.number_in_list'
        }
    },
    duration: {
        id: "duration",
        name: "duration",
        label: "Duration",
        type: "time",
        placeholder: "03:25",
        attributes: ["v-model='data.values.duration'"],
        clockOptions: {
            showHours: false
        }
    },
    intensity: {
        name: "intensity",
        label: "Intensity",
        type: "number",
        placeholder: "1–10 (Ballad–Bebop)",
        attributes: ["min='0'", "max='10'", "v-model='data.values.intensity'"],
        vueBindings: {
            id: '"intensity-" + data.values.number_in_list'
        }
    },
    actionButton: {
        create: {
            submit: true,
            theme: 'primary',
            content: 'Create'
        },
        update: {
            submit: true,
            theme: 'primary',
            content: 'Update'
        },
        edit: {
            submit: false,
            theme: 'primary',
            content: 'Edit'
            /* attributes: [
                 "v-bind:href='this.formData.editLink'"
             ]*/
        }
    }
};

var formHtmlElements = {
    key: {
        editable: SelectList.getModule(formElements.key),
        readOnly: SelectList.getModule(createReadOnlyFormElement(formElements.key))
    },
    bpm: {
        editable: InputField.getModule(formElements.bpm),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.bpm))
    },
    duration: {
        editable: DatePicker.getModule(formElements.duration),
        readOnly: DatePicker.getModule(createReadOnlyFormElement(formElements.duration))
    },
    intensity: {
        editable: InputField.getModule(formElements.intensity),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.intensity))
    },
    actionButton: {
        create: Button.getModule(formElements.actionButton.create),
        update: Button.getModule(formElements.actionButton.update),
        edit: Button.getModule(formElements.actionButton.edit)
    }
};

var template = "\n<!--<form method=\"POST\" v-bind:action=\"formData.postUrl\"> -->\n<div>\n    <input v-if=\"method !== 'GET'\" type=\"hidden\" name=\"_token\" value=\"" + window.Laravel.csrfToken + "\" />\n    <input v-if=\"method == 'PUT'\" type=\"hidden\" name=\"_method\" value=\"PUT\" />\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.key.readOnly + "</div><div v-else>" + formHtmlElements.key.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.bpm.readOnly + "</div><div v-else>" + formHtmlElements.bpm.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.duration.readOnly + "</div><div v-else>" + formHtmlElements.duration.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.intensity.readOnly + "</div><div v-else>" + formHtmlElements.intensity.editable + "</div>\n    <div class=\"input-group float-right\">\n        <div v-if=\"method == 'POST'\">" + formHtmlElements.actionButton.create + "</div>\n        <div v-else-if=\"method == 'PUT'\">" + formHtmlElements.actionButton.update + "</div>\n        <div v-else-if=\"method == 'GET'\">" + formHtmlElements.actionButton.edit + "</div>\n    </div>\n    <div class=\"clearfix\"></div> \n    </div>\n<!--</form>-->\n";

exports.default = template;

/***/ }),
/* 135 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(136),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/single/Song.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0bc41b8d", Component.options)
  } else {
    hotAPI.reload("data-v-0bc41b8d", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 136 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _SongTemplate = __webpack_require__(137);

var _SongTemplate2 = _interopRequireDefault(_SongTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Song',
    props: ['url', 'method', 'values', 'links'],
    template: _SongTemplate2.default,
    data: function data() {
        return {
            data: {
                values: this.values != undefined ? this.values : {}
            }
        };
    }
};

/***/ }),
/* 137 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var InputField = quark.Molecules.FormElements.InputField;
var SelectList = quark.Molecules.FormElements.SelectList;
var DatePicker = quark.Molecules.FormElements.DatePicker;
var Button = quark.Atoms.Buttons.Button;

function createReadOnlyFormElement(formElement) {
    formElement.attributes.push("readonly");
    return formElement;
}

var formElements = {
    title: {
        id: "title",
        name: "title",
        label: "Title",
        type: "text",
        placeholder: "The song title",
        attributes: ["required", "v-model='data.values.title'"]
    },
    artist: {
        id: "artist",
        name: "artist",
        label: "Artist",
        type: "text",
        placeholder: "The original artist/band",
        attributes: ["v-model='data.values.artist'"]
    },
    lyricsBy: {
        id: "lyrics-by",
        name: "lyrics_by",
        label: "Lyrics by",
        type: "text",
        placeholder: "The lyrics author",
        attributes: ["v-model='data.values.lyrics_by'"]
    },
    musicBy: {
        id: "music-by",
        name: "music_by",
        label: "Music by",
        type: "text",
        placeholder: "The music composer",
        attributes: ["v-model='data.values.music_by'"]
    },
    key: {
        id: "key",
        name: "key",
        label: "Key",
        searchable: true,
        placeholder: "E.g. F, Am, or C#",
        options: __webpack_require__(34),
        attributes: ["v-model='data.values.key'"]
    },
    bpm: {
        id: "bpm",
        name: "bpm",
        label: "BPM",
        type: "number",
        placeholder: "Beats Per Minute",
        attributes: ["min='0'", "v-model='data.values.bpm'"]
    },
    duration: {
        id: "duration",
        name: "duration",
        label: "Duration",
        type: "time",
        placeholder: "03:25",
        attributes: ["v-model='data.values.duration'"],
        clockOptions: {
            showHours: false
        }
    },
    intensity: {
        id: "intensity",
        name: "intensity",
        label: "Intensity",
        type: "number",
        placeholder: "1–10 (Ballad–Bebop)",
        attributes: ["min='0'", "max='10'", "v-model='data.values.intensity'"]
    },
    actionButton: {
        create: {
            submit: true,
            theme: 'primary',
            content: 'Create'
        },
        update: {
            submit: true,
            theme: 'primary',
            content: 'Update'
        },
        edit: {
            submit: false,
            theme: 'primary',
            content: 'Edit',
            attributes: ["v-bind:href='url'"]
        }
    }
};

var formHtmlElements = {
    title: {
        editable: InputField.getModule(formElements.title),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.title))
    },
    artist: {
        editable: InputField.getModule(formElements.artist),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.artist))
    },
    lyricsBy: {
        editable: InputField.getModule(formElements.lyricsBy),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.lyricsBy))
    },
    musicBy: {
        editable: InputField.getModule(formElements.musicBy),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.musicBy))
    },
    key: {
        editable: SelectList.getModule(formElements.key),
        readOnly: SelectList.getModule(createReadOnlyFormElement(formElements.key))
    },
    bpm: {
        editable: InputField.getModule(formElements.bpm),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.bpm))
    },
    duration: {
        editable: DatePicker.getModule(formElements.duration),
        readOnly: DatePicker.getModule(createReadOnlyFormElement(formElements.duration))
    },
    intensity: {
        editable: InputField.getModule(formElements.intensity),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.intensity))
    },
    actionButton: {
        create: Button.getModule(formElements.actionButton.create),
        update: Button.getModule(formElements.actionButton.update),
        edit: Button.getModule(formElements.actionButton.edit)
    }
};

var template = "\n<form method=\"POST\" v-bind:action=\"url\">\n    <input v-if=\"method !== 'GET'\" type=\"hidden\" name=\"_token\" value=\"" + window.Laravel.csrfToken + "\" />\n    <input v-if=\"method == 'PUT'\" type=\"hidden\" name=\"_method\" value=\"PUT\" />\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.title.readOnly + "</div><div v-else>" + formHtmlElements.title.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.artist.readOnly + "</div><div v-else>" + formHtmlElements.artist.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.lyricsBy.readOnly + "</div><div v-else>" + formHtmlElements.lyricsBy.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.musicBy.readOnly + "</div><div v-else>" + formHtmlElements.musicBy.editable + "</div>\n    <p v-if=\"method == 'GET'\">\n        The following properties are defaults which may be set different for each instance of this song in setlists\n    </p>\n    <p v-else>\n        You may set the following values different every time you add this song to a setlist, but values entered here will be used as default\n    </p>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.key.readOnly + "</div><div v-else>" + formHtmlElements.key.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.bpm.readOnly + "</div><div v-else>" + formHtmlElements.bpm.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.duration.readOnly + "</div><div v-else>" + formHtmlElements.duration.editable + "</div>\n    <div v-if=\"method == 'GET'\">" + formHtmlElements.intensity.readOnly + "</div><div v-else>" + formHtmlElements.intensity.editable + "</div>\n    <div class=\"input-group float-right\">\n        <div v-if=\"method == 'POST'\">" + formHtmlElements.actionButton.create + "</div>\n        <div v-else-if=\"method == 'PUT'\">" + formHtmlElements.actionButton.update + "</div>\n        <div v-else-if=\"method == 'GET'\">" + formHtmlElements.actionButton.edit + "</div>\n    </div>\n    <div class=\"clearfix\"></div> \n</form>\n";

exports.default = template;

/***/ }),
/* 138 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(139),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/single/Invitation.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0bba7411", Component.options)
  } else {
    hotAPI.reload("data-v-0bba7411", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 139 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _InvitationTemplate = __webpack_require__(140);

var _InvitationTemplate2 = _interopRequireDefault(_InvitationTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Invitation',
    props: ['formData'],
    template: _InvitationTemplate2.default,
    data: function data() {
        return {
            form: {
                data: this.formData.viewType == 'create' ? {} : this.formData.savedValues,
                readOnly: this.formData.viewType == 'show',
                selectedInvitee: {
                    id: '',
                    email: ''
                }
            },
            selectedInviteeValue: '',
            csrfToken: window.Laravel.csrfToken
        };
    },

    computed: {
        userOptions: function userOptions() {
            var userOptions = [];
            this.formData.savedValues.users.forEach(function (user) {
                userOptions.push({
                    name: user.name,
                    value: JSON.stringify(user) // Until quarkGUI support objects as values
                });
            });
            return userOptions;
        },
        messagePlaceholder: function messagePlaceholder() {
            var bandName = this.formData.savedValues.bandName;
            return 'Awesome if you\'ll join ' + bandName + '!\'';
        }
    },
    methods: {
        updateSelectedInvitee: function updateSelectedInvitee() {
            console.log("invitee updated");
        }
    },
    watch: {
        selectedInviteeValue: function selectedInviteeValue() {
            this.form.selectedInvitee = JSON.parse(this.selectedInviteeValue);
        }
    }
};

/***/ }),
/* 140 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var InputField = quark.Molecules.FormElements.InputField;
var SelectList = quark.Molecules.FormElements.SelectList;
var Button = quark.Atoms.Buttons.Button;

function createReadOnlyFormElement(formElement) {
    if (formElement.attributes == undefined) formElement.attributes = [];
    formElement.attributes.push("readonly");
    return formElement;
}

var formElements = {
    inviteeSelect: {
        id: "invitee_select",
        label: "Existing FlowGig user",
        searchable: true,
        placeholder: "Search for existing FlowGig user",
        vueBindings: {
            options: 'userOptions',
            value: 'selectedInviteeValue'
        }
    },
    inviteeId: {
        id: "invitee_id",
        name: "invitee_id",
        type: "hidden",
        vueBindings: {
            value: 'form.selectedInvitee.id'
        }
    },
    inviteeEmail: {
        id: "invitee_email",
        name: "invitee_email",
        label: "E-mail address for the invited",
        placeholder: "invited@flowgig.com",
        attributes: ["v-on:keydown='updateSelectedInvitee'", "readonly=readonly"],
        vueBindings: {
            value: 'form.selectedInvitee.email'
        }
    },
    message: {
        id: "message",
        name: "message",
        label: "A message to the invited",
        type: "text",
        attributes: ["v-bind:value='formData.savedValues.message'"],
        vueBindings: {
            placeholder: 'messagePlaceholder'
        }
    },
    actionButton: {
        create: {
            submit: true,
            theme: 'primary',
            content: 'Invite'
        },
        edit: {
            submit: true,
            theme: 'primary',
            content: 'Update'
        },
        show: {
            submit: false,
            theme: 'primary',
            content: 'Edit',
            attributes: ["v-bind:href='this.formData.editLink'"]
        }
    }
};

var formHtmlElements = {
    inviteeSelect: {
        editable: SelectList.getModule(formElements.inviteeSelect),
        readOnly: SelectList.getModule(createReadOnlyFormElement(formElements.inviteeSelect))
    },
    inviteeId: {
        editable: InputField.getModule(formElements.inviteeId),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.inviteeId))
    },
    inviteeEmail: {
        editable: InputField.getModule(formElements.inviteeEmail),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.inviteeEmail))
    },
    message: {
        editable: InputField.getModule(formElements.message),
        readOnly: InputField.getModule(createReadOnlyFormElement(formElements.message))
    },
    actionButton: {
        create: Button.getModule(formElements.actionButton.create),
        edit: Button.getModule(formElements.actionButton.edit),
        show: Button.getModule(formElements.actionButton.show)
    }
};

var template = "\n<form method=\"POST\" v-bind:action=\"formData.postUrl\">\n    <input v-if=\"!form.readOnly\" type=\"hidden\" name=\"_token\" v-bind:value=\"csrfToken\" />\n    <input v-if=\"formData.viewType == 'edit'\" type=\"hidden\" name=\"_method\" value=\"PUT\" />\n    <div v-if=\"form.readOnly\">" + formHtmlElements.inviteeSelect.readOnly + "</div><div v-else>" + formHtmlElements.inviteeSelect.editable + "</div>\n    <div v-if=\"form.readOnly\">" + formHtmlElements.inviteeId.readOnly + "</div><div v-else>" + formHtmlElements.inviteeId.editable + "</div>\n    <div v-if=\"form.readOnly\">" + formHtmlElements.inviteeEmail.readOnly + "</div><div v-else>" + formHtmlElements.inviteeEmail.editable + "</div>\n    <div v-if=\"form.readOnly\">" + formHtmlElements.message.readOnly + "</div><div v-else>" + formHtmlElements.message.editable + "</div>\n    <div class=\"input-group float-right\">\n        <div v-if=\"formData.viewType == 'create'\">" + formHtmlElements.actionButton.create + "</div>\n        <div v-else-if=\"formData.viewType == 'edit'\">" + formHtmlElements.actionButton.edit + "</div>\n        <div v-else-if=\"formData.viewType == 'show'\">" + formHtmlElements.actionButton.show + "</div>\n    </div>\n    <div class=\"clearfix\"></div> \n</form>\n";

exports.default = template;

/***/ }),
/* 141 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(142),
  /* template */
  __webpack_require__(143),
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/lists/BandMembers.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] BandMembers.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-42ccfe8a", Component.options)
  } else {
    hotAPI.reload("data-v-42ccfe8a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 142 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'BandMembers',
    props: ['bandMembers', 'authUser'],
    data: function data() {
        return {
            htmlContent: ""
        };
    },

    created: function created() {
        this.htmlContent = this.createListMenuElement();
    },
    methods: {
        createListMenuElement: function createListMenuElement() {
            return quark.Organisms.Lists.List.getModule({
                id: 'band-members-list',
                hover: false,
                listItems: this.getListItems()
            });
        },
        getListItems: function getListItems() {
            var listItems = [];
            this.bandMembers.forEach(function (bandMember) {
                var listItem = {
                    title: bandMember.user.name,
                    buttonRow: this.getButtonRow(bandMember)
                };
                listItems.push(listItem);
            }.bind(this));
            return listItems;
        },
        getButtonRow: function getButtonRow(bandMember) {
            var buttonRow = {
                buttons: [{
                    iconClass: 'fa fa-trash',
                    submit: true //TODO add function for delete
                }]
            };
            return buttonRow;
        },
        validateDelete: function validateDelete(userId) {
            if (this.bandMembers.length == 1) {
                alert('You are the last member and cannot be removed.\n(You\'ll have to delete the band)');
                return false;
            } else if (userId == this.authUser.id) {
                return confirm('This completely removes your access to the band {{ $band->name }}');
            }
            return confirm('This removes ' + userName);
        }
    }
}; //
//
//
//

/***/ }),
/* 143 */
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.htmlContent)
    }
  })
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-42ccfe8a", module.exports)
  }
}

/***/ }),
/* 144 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(145),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/lists/BandNavigation.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-452974e2", Component.options)
  } else {
    hotAPI.reload("data-v-452974e2", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 145 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _BandNavigationTemplate = __webpack_require__(146);

var _BandNavigationTemplate2 = _interopRequireDefault(_BandNavigationTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'BandNavigation',
    props: ['bandId', 'counter'],
    template: _BandNavigationTemplate2.default,
    computed: {
        links: function links() {
            return {
                songs: '/bands/' + this.bandId + '/songs',
                gigs: '/bands/' + this.bandId + '/gigs',
                members: '/bands/' + this.bandId + '/band-memberships'
            };
        }
    }
};

/***/ }),
/* 146 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var ListItem = quark.Molecules.Lists.ListItem;

var listItemElements = {
    songs: ListItem.getModule({
        vueBindings: {
            link: 'links.songs'
        },
        title: 'Songs',
        iconClass: 'fa fa-music',
        buttonRow: {
            buttonElements: ["<span class='list-item-counter' v-html='counter.songs'></span>"]
        }
    }),
    gigs: ListItem.getModule({
        vueBindings: {
            link: 'links.gigs'
        },
        title: 'Gigs',
        iconClass: 'fa fa-calendar',
        buttonRow: {
            buttonElements: ["<span class='list-item-counter' v-html='counter.gigs'></span>"]
        }
    }),
    members: ListItem.getModule({
        vueBindings: {
            link: 'links.members'
        },
        title: 'Members',
        iconClass: 'fa fa-group',
        buttonRow: {
            buttonElements: ["<span class='list-item-counter' v-html='counter.members'></span>"]
        }
    })
};

var template = '\n     <div>\n        ' + listItemElements.songs + '\n        ' + listItemElements.gigs + '\n        ' + listItemElements.members + '\n     </div>\n';

exports.default = template;

/***/ }),
/* 147 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(148),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/lists/Bands.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-cf9a4a96", Component.options)
  } else {
    hotAPI.reload("data-v-cf9a4a96", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 148 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _Band = __webpack_require__(149);

var _Band2 = _interopRequireDefault(_Band);

var _BandsTemplate = __webpack_require__(152);

var _BandsTemplate2 = _interopRequireDefault(_BandsTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Bands',
    props: ['listItems'],
    template: _BandsTemplate2.default,
    components: {
        Band: _Band2.default
    }
};

/***/ }),
/* 149 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(150),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/list-items/Band.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-c85c8e78", Component.options)
  } else {
    hotAPI.reload("data-v-c85c8e78", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 150 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _BandTemplate = __webpack_require__(151);

var _BandTemplate2 = _interopRequireDefault(_BandTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Band',
    props: ['listItem'],
    template: _BandTemplate2.default,
    computed: {
        links: function links() {
            return {
                show: '/bands/' + this.listItem.id,
                edit: '/bands/' + this.listItem.id + '/edit'
            };
        }
    },
    data: function data() {
        return {
            csrfToken: window.Laravel.csrfToken
        };
    }
};

/***/ }),
/* 151 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var ListItem = quark.Molecules.Lists.ListItem;

var listItem = ListItem.getModule({
    vueBindings: {
        title: 'listItem.name',
        link: 'links.show'
    },
    hiddenButtonRow: true,
    buttonRow: {
        buttons: [{
            iconClass: 'fa fa-pencil',
            type: 'minimal',
            theme: 'primary',
            vueBindings: {
                link: 'links.edit'
            }
        }, {
            iconClass: 'fa fa-trash',
            submit: true,
            type: 'minimal',
            theme: 'primary',
            formWrapper: {
                formMethod: 'POST',
                vueBindings: {
                    formAction: 'links.show'
                },
                hiddenFields: [{
                    name: '_token',
                    vueBindings: {
                        value: 'csrfToken'
                    }
                }, {
                    name: '_method',
                    value: 'DELETE'
                }]
            }
        }]
    }
});

var template = '' + listItem;

exports.default = template;

/***/ }),
/* 152 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
   value: true
});
var template = "\n     <div>\n        <band v-for=\"band in listItems\" v-bind:list-item=\"band\" v-bind:key=\"band.id\"></band>\n     </div>\n";

exports.default = template;

/***/ }),
/* 153 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(154),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/lists/Gigs.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-f1890a72", Component.options)
  } else {
    hotAPI.reload("data-v-f1890a72", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 154 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _Gig = __webpack_require__(155);

var _Gig2 = _interopRequireDefault(_Gig);

var _GigsTemplate = __webpack_require__(158);

var _GigsTemplate2 = _interopRequireDefault(_GigsTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Gigs',
    props: ['listItems'],
    template: _GigsTemplate2.default,
    components: {
        Gig: _Gig2.default
    }
};

/***/ }),
/* 155 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(156),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/list-items/Gig.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-4ebbeaf4", Component.options)
  } else {
    hotAPI.reload("data-v-4ebbeaf4", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 156 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _GigTemplate = __webpack_require__(157);

var _GigTemplate2 = _interopRequireDefault(_GigTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Gig',
    props: ['listItem'],
    template: _GigTemplate2.default,
    computed: {
        statusIconClass: function statusIconClass() {
            var statusIconClass = '';
            if (this.listItem.status !== undefined) {
                //TODO add title attribute for icons
                if (this.listItem.status == 'Proposed') {
                    statusIconClass = 'fa fa-question-circle-o';
                } //Title: Status: Proposed
                if (this.listItem.status == 'Settled') {
                    statusIconClass = 'fa fa-check-circle-o';
                } //Title: Status: Settled
                if (this.listItem.status == 'Public') {
                    statusIconClass = 'fa fa-globe';
                } //Title: Status: Public
            }
            return statusIconClass;
        },
        subTitle: function subTitle() {
            var subTitle = this.listItem.date + ' - ' + this.listItem.venue + ' - ' + this.listItem.location;
            return subTitle;
        },
        links: function links() {
            return {
                show: '/gigs/' + this.listItem.id,
                edit: '/gigs/' + this.listItem.id + '/edit'
            };
        }
    },
    data: function data() {
        return {
            csrfToken: window.Laravel.csrfToken
        };
    }
};

/***/ }),
/* 157 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var ListItem = quark.Molecules.Lists.ListItem;

var listItem = ListItem.getModule({
    vueBindings: {
        title: 'listItem.name',
        subTitle: 'subTitle',
        link: 'links.show',
        iconClass: 'statusIconClass'
    },
    hiddenButtonRow: true,
    buttonRow: {
        buttons: [{
            iconClass: 'fa fa-pencil',
            type: 'minimal',
            theme: 'primary',
            vueBindings: {
                link: 'links.edit'
            }
        }, {
            iconClass: 'fa fa-trash',
            submit: true,
            type: 'minimal',
            theme: 'primary',
            formWrapper: {
                formMethod: 'POST',
                vueBindings: {
                    formAction: 'links.show'
                },
                hiddenFields: [{
                    name: '_token',
                    vueBindings: {
                        value: 'csrfToken'
                    }
                }, {
                    name: '_method',
                    value: 'DELETE'
                }]
            }
        }]
    }
});

var template = '' + listItem;

exports.default = template;

/***/ }),
/* 158 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
   value: true
});
var template = "\n     <div>\n        <gig v-for=\"gig in listItems\" v-bind:list-item=\"gig\" v-bind:key=\"gig.id\"></gig>\n     </div>\n";

exports.default = template;

/***/ }),
/* 159 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(160),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/lists/Invitations.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3350bc91", Component.options)
  } else {
    hotAPI.reload("data-v-3350bc91", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 160 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _Invitation = __webpack_require__(161);

var _Invitation2 = _interopRequireDefault(_Invitation);

var _InvitationsTemplate = __webpack_require__(165);

var _InvitationsTemplate2 = _interopRequireDefault(_InvitationsTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Invitations',
    props: ['listItems'],
    template: _InvitationsTemplate2.default,
    components: {
        Invitation: _Invitation2.default
    }
};

/***/ }),
/* 161 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(162)
}
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(163),
  /* template */
  null,
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/list-items/Invitation.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-11303a30", Component.options)
  } else {
    hotAPI.reload("data-v-11303a30", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 162 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 163 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _InvitationTemplate = __webpack_require__(164);

var _InvitationTemplate2 = _interopRequireDefault(_InvitationTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Invitation',
    props: ['listItem'],
    template: _InvitationTemplate2.default,
    computed: {
        statusIconClass: function statusIconClass() {
            var statusIconClass = '';
            if (this.listItem.status !== undefined) {
                //TODO add title attribute for icons
                if (this.listItem.status == 'pending') {
                    statusIconClass = 'fa fa-hourglass-half';
                } //Title: Status: Pending
                if (this.listItem.status == 'expired') {
                    statusIconClass = 'fa fa-hourglass-end';
                } //Title: Status: Expired
                if (this.listItem.status == 'accepted') {
                    statusIconClass = 'fa fa-check';
                } //Title: Status: Accepted
            }
            return statusIconClass;
        },
        subTitle: function subTitle() {
            var subTitle = this.listItem.invitee.email;
            return subTitle;
        },
        links: function links() {
            return {
                setExpired: '/band-invitations/' + this.listItem.id + '/set-expired'
            };
        }
    },
    data: function data() {
        return {
            csrfToken: window.Laravel.csrfToken
        };
    }
};

/***/ }),
/* 164 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var ListItem = quark.Molecules.Lists.ListItem;

var listItem = {
    vueBindings: {
        title: 'listItem.invitee.name',
        subTitle: 'subTitle',
        iconClass: 'statusIconClass'
    },
    hiddenButtonRow: true
};

function addExpiredButton(listItem) {
    listItem.buttonRow = {
        buttons: [{
            submit: true,
            type: 'minimal',
            theme: 'primary',
            content: 'Set expired',
            formWrapper: {
                formMethod: 'POST',
                vueBindings: {
                    formAction: 'links.setExpired'
                },
                hiddenFields: [{
                    name: '_token',
                    vueBindings: {
                        value: 'csrfToken'
                    }
                }, {
                    name: '_method',
                    value: 'PUT'
                }]
            }
        }]
    };
    return listItem;
}

var listItemHtmlElements = {
    defaultListItem: ListItem.getModule(listItem),
    listItemWithExpiredButton: ListItem.getModule(addExpiredButton(listItem))
};

var template = '\n    <div v-if="listItem.status == \'pending\'" class="list-item">' + listItemHtmlElements.listItemWithExpiredButton + '</div><div v-else class="list-item">' + listItemHtmlElements.defaultListItem + '</div>\n';

exports.default = template;

/***/ }),
/* 165 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
   value: true
});
var template = "\n     <div>\n        <invitation v-for=\"invitation in listItems\" v-bind:list-item=\"invitation\" v-bind:key=\"invitation.id\"></invitation>\n     </div>\n";

exports.default = template;

/***/ }),
/* 166 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(167),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/lists/Repertoire.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6e3bbf20", Component.options)
  } else {
    hotAPI.reload("data-v-6e3bbf20", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 167 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _RepertoireSong = __webpack_require__(168);

var _RepertoireSong2 = _interopRequireDefault(_RepertoireSong);

var _RepertoireTemplate = __webpack_require__(171);

var _RepertoireTemplate2 = _interopRequireDefault(_RepertoireTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Repertoire',
    props: ['listItems'],
    template: _RepertoireTemplate2.default,
    components: {
        RepertoireSong: _RepertoireSong2.default
    }
};

/***/ }),
/* 168 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(169),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/list-items/RepertoireSong.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7d93378a", Component.options)
  } else {
    hotAPI.reload("data-v-7d93378a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 169 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _RepertoireSongTemplate = __webpack_require__(170);

var _RepertoireSongTemplate2 = _interopRequireDefault(_RepertoireSongTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'RepertoireSong',
    props: ['listItem'],
    template: _RepertoireSongTemplate2.default,
    computed: {
        subTitle: function subTitle() {
            var subTitle = this.listItem.artist;
            return subTitle;
        },
        links: function links() {
            return {
                show: '/songs/' + this.listItem.id,
                edit: '/songs/' + this.listItem.id + '/edit'
            };
        }
    },
    data: function data() {
        return {
            csrfToken: window.Laravel.csrfToken
        };
    }
};

/***/ }),
/* 170 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var ListItem = quark.Molecules.Lists.ListItem;

var listItem = ListItem.getModule({
    vueBindings: {
        title: 'listItem.title',
        subTitle: 'subTitle',
        link: 'links.show'
    },
    hiddenButtonRow: true,
    buttonRow: {
        buttons: [{
            iconClass: 'fa fa-pencil',
            type: 'minimal',
            theme: 'primary',
            attributes: ['v-on:click="$parent.$parent.$parent.addToSetlist(listItem)"']
        }, {
            iconClass: 'fa fa-trash',
            submit: true,
            type: 'minimal',
            theme: 'primary',
            formWrapper: {
                formMethod: 'POST',
                vueBindings: {
                    formAction: 'links.show'
                },
                hiddenFields: [{
                    name: '_token',
                    value: '${window.Laravel.csrfToken}'
                }, {
                    name: '_method',
                    value: 'DELETE'
                }]
            }
        }]
    }
});

var template = '' + listItem;

exports.default = template;

/***/ }),
/* 171 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
   value: true
});
var template = "\n     <div>\n        <repertoire-song v-for=\"song in listItems\" v-bind:list-item=\"song\" v-bind:key=\"song.id\"></repertoire-song>\n     </div>\n";

exports.default = template;

/***/ }),
/* 172 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(173),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/lists/Setlist.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-28649117", Component.options)
  } else {
    hotAPI.reload("data-v-28649117", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 173 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _SetlistTemplate = __webpack_require__(174);

var _SetlistTemplate2 = _interopRequireDefault(_SetlistTemplate);

var _SetlistSong = __webpack_require__(175);

var _SetlistSong2 = _interopRequireDefault(_SetlistSong);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var dragula = __webpack_require__(10);

exports.default = {
    name: 'Setlist',
    props: ['repertoire', 'method', 'values'],
    template: _SetlistTemplate2.default,
    data: function data() {
        return {
            data: {
                values: this.values != undefined ? this.values : {}
            },
            setlistSongs: this.values.setlist_songs,
            dragula: null
        };
    },

    mounted: function mounted() {
        this.dragula = dragula([document.querySelector('#setlist-songs-list')]);
        var from = null;
        this.dragula.on('drag', function (element, source) {
            var index = [].indexOf.call(element.parentNode.children, element);
            console.log('drag from', index, element, source);
            from = index;
        }.bind(this));
        this.dragula.on('drop', function (element, target, source, sibling) {
            var index = [].indexOf.call(element.parentNode.children, element);
            console.log('drop to', index, element, target, source, sibling);
            this.setlistSongs.splice(index, 0, this.setlistSongs.splice(from, 1)[0]);
            this.updateNumberInListForAllSetlistSongs();
            setTimeout(function () {
                quark.LazyInit();
            }, 100);
        }.bind(this));
    },
    components: {
        SetlistSong: _SetlistSong2.default
    },
    events: {
        'reordered': function reordered(reorderedList) {
            this.reOrderSetlistSongs(reorderedList);
        }
    },
    methods: {
        addToSetlist: function addToSetlist(repertoireSong) {
            console.log('add to setlist');
            console.log(repertoireSong);
            var setlistSong = {
                song_id: repertoireSong.id,
                setlist_id: this.data.values.id,
                number_in_list: this.setlistSongs.length + 1,
                key: repertoireSong.key,
                bpm: repertoireSong.bpm ? repertoireSong.bpm : null,
                intensity: repertoireSong.intensity ? repertoireSong.intensity : null,
                duration: repertoireSong.duration ? repertoireSong.duration : null,
                comment: '',
                song: repertoireSong
            };
            this.setlistSongs.push(setlistSong);
        },
        isAdded: function isAdded(repertoireSong) {
            var isAdded = false;
            this.setlistSongs.forEach(function (setlistSong) {
                if (repertoireSong.id == setlistSong.song.id) {
                    isAdded = true;
                    return;
                }
            });
            return isAdded;
        },
        updateNumberInListForAllSetlistSongs: function updateNumberInListForAllSetlistSongs() {
            this.setlistSongs.forEach(function (setlistSong, index) {
                setlistSong.number_in_list = index + 1;
            });
        }
    }
};

/***/ }),
/* 174 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
        value: true
});
var template = "\n        <div>\n            <div id=\"setlist-songs-list\">\n                <div v-show=\"values.setlist_songs.length\" v-for=\"setlistSong in values.setlist_songs\">\n                    <setlist-song\n                            v-bind:method=\"method\"\n                            v-bind:values=\"setlistSong\">\n                    </setlist-song> \n                </div>  \n            </div>\n            \n            \n            <div v-show=\"!values.setlist_songs.length\">\n            no songs\n            </div>\n           <div class=\"content-container-footer list-footer-button-row\">\n                            <add-setlist-song\n                                    v-bind:values=\"repertoire\"\n                                    method=\"PUT\"\n                            >\n                            </add-setlist-song>\n                        </div>\n        </div>\n";

exports.default = template;

/***/ }),
/* 175 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(176),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/list-items/SetlistSong.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-c32f4214", Component.options)
  } else {
    hotAPI.reload("data-v-c32f4214", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 176 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _SetlistSongTemplate = __webpack_require__(177);

var _SetlistSongTemplate2 = _interopRequireDefault(_SetlistSongTemplate);

var _EditSetlistSong = __webpack_require__(35);

var _EditSetlistSong2 = _interopRequireDefault(_EditSetlistSong);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'SetlistSong',
    props: ['method', 'values'],
    template: _SetlistSongTemplate2.default,
    components: {
        EditSetlistSong: _EditSetlistSong2.default
    },
    data: function data() {
        return {
            data: {
                values: this.values != undefined ? this.values : {}
            }
        };
    },

    methods: {
        removeSetlistSong: function removeSetlistSong() {
            console.log('remove setlist song');
        }
    }
};

/***/ }),
/* 177 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var ListItem = quark.Molecules.Lists.ListItem;

var editSetlistSongModal = "<edit-setlist-song v-bind:method=\"method\" v-bind:values=\"data.values\"></edit-setlist-song>";

var listItem = ListItem.getModule({
    vueBindings: {
        title: "data.values.song.title",
        subTitle: "data.values.song.artist"
    },
    hiddenButtonRow: true,
    buttonRow: {
        buttonElementsFirst: true,
        buttons: [{
            iconClass: "fa fa-trash",
            type: 'minimal',
            theme: "primary",
            attributes: ["v-on:click='removeSetlistSong()'"]
        }],
        buttonElements: [editSetlistSongModal]
    }
});

var template = "" + listItem;

exports.default = template;

/***/ }),
/* 178 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _EditSetlistSongTemplate = __webpack_require__(179);

var _EditSetlistSongTemplate2 = _interopRequireDefault(_EditSetlistSongTemplate);

var _SetlistSong = __webpack_require__(33);

var _SetlistSong2 = _interopRequireDefault(_SetlistSong);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'EditSetlistSong',
    props: ['method', 'values'],
    template: _EditSetlistSongTemplate2.default,
    components: {
        SetlistSong: _SetlistSong2.default
    },
    data: function data() {
        return {
            data: {
                values: this.values != undefined ? this.values : {}
            }
        };
    },

    mounted: function mounted() {
        quark.LazyInit();
    },
    computed: {
        modalId: function modalId() {
            return 'setlist-song-modal-' + this.values.number_in_list;
        }
    }
};

/***/ }),
/* 179 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var Button = quark.Atoms.Buttons.Button;
var Modal = quark.Molecules.Messaging.Modal;
var SelectList = quark.Molecules.FormElements.SelectList;
var RadioButton = quark.Molecules.FormElements.RadioButton;
var InputField = quark.Molecules.FormElements.InputField;

var modalTriggerButton = Button.getModule({
    iconClass: 'fa fa-pencil',
    type: 'minimal',
    theme: "primary"
});

var modalContent = '\n<div class="modal-content">\n    <p>the setlist song</p>\n    <p>{{ data.values.song.title }}</p>\n    <setlist-song v-bind:method="method" v-bind:values="data.values"></setlist-song>\n</div>\n';

var modalElement = Modal.getModule({
    triggerElement: modalTriggerButton,
    modalElement: {
        title: 'Edit song',
        scrollable: true,
        fullscreen: false,
        content: modalContent
    },
    vueBindings: {
        id: 'modalId'
    }
});

var template = '<div style="display: inline-block">' + modalElement + '</div>';

exports.default = template;

/***/ }),
/* 180 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(181),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/lists/Setlists.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-304d9a28", Component.options)
  } else {
    hotAPI.reload("data-v-304d9a28", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 181 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _Setlist = __webpack_require__(182);

var _Setlist2 = _interopRequireDefault(_Setlist);

var _SetlistsTemplate = __webpack_require__(185);

var _SetlistsTemplate2 = _interopRequireDefault(_SetlistsTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Setlists',
    props: ['listItems', 'gig'],
    template: _SetlistsTemplate2.default,
    components: {
        Setlist: _Setlist2.default
    }
};

/***/ }),
/* 182 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(183),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/list-items/Setlist.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7351d4c1", Component.options)
  } else {
    hotAPI.reload("data-v-7351d4c1", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 183 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _SetlistTemplate = __webpack_require__(184);

var _SetlistTemplate2 = _interopRequireDefault(_SetlistTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Setlist',
    props: ['listItem', 'gig'],
    template: _SetlistTemplate2.default,
    computed: {
        links: function links() {
            return {
                show: '/setlists/' + this.listItem.id,
                edit: '/setlists/' + this.listItem.id + '/edit'
            };
        },
        setlistName: function setlistName() {
            return this.gig.date + ' at ' + this.gig.venue + ', ' + this.gig.location;
        }
    },
    data: function data() {
        return {
            csrfToken: window.Laravel.csrfToken
        };
    }
};

/***/ }),
/* 184 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var ListItem = quark.Molecules.Lists.ListItem;

var listItem = ListItem.getModule({
    vueBindings: {
        title: 'setlistName',
        link: 'links.show'
    },
    hiddenButtonRow: true,
    buttonRow: {
        buttons: [{
            iconClass: 'fa fa-pencil',
            type: 'minimal',
            theme: 'primary',
            vueBindings: {
                link: 'links.edit'
            }
        }, {
            iconClass: 'fa fa-trash',
            submit: true,
            type: 'minimal',
            theme: 'primary',
            formWrapper: {
                formMethod: 'POST',
                vueBindings: {
                    formAction: 'links.show'
                },
                hiddenFields: [{
                    name: '_token',
                    vueBindings: {
                        value: 'csrfToken'
                    }
                }, {
                    name: '_method',
                    value: 'DELETE'
                }]
            }
        }]
    }
});

var template = '' + listItem;

exports.default = template;

/***/ }),
/* 185 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
   value: true
});
var template = "\n     <div v-if=\"Array.isArray(listItems)\">\n        <setlist v-if=\"Array.isArray(listItems)\" v-for=\"setlist in listItems\" v-bind:list-item=\"setlist\" v-bind:gig=\"gig\" v-bind:key=\"setlist.id\"></setlist>\n     </div>\n     <div v-else>\n        <setlist v-bind:list-item=\"listItems\" v-bind:gig=\"gig\" v-bind:key=\"listItems.id\"></setlist>\n    </div>\n";

exports.default = template;

/***/ }),
/* 186 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(187),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/lists/Songs.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-242d37d5", Component.options)
  } else {
    hotAPI.reload("data-v-242d37d5", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 187 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _Song = __webpack_require__(188);

var _Song2 = _interopRequireDefault(_Song);

var _SongsTemplate = __webpack_require__(191);

var _SongsTemplate2 = _interopRequireDefault(_SongsTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Songs',
    props: ['listItems'],
    template: _SongsTemplate2.default,
    components: {
        Song: _Song2.default
    }
};

/***/ }),
/* 188 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(189),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/list-items/Song.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-668737a4", Component.options)
  } else {
    hotAPI.reload("data-v-668737a4", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 189 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _SongTemplate = __webpack_require__(190);

var _SongTemplate2 = _interopRequireDefault(_SongTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Song',
    props: ['listItem'],
    template: _SongTemplate2.default,
    computed: {
        subTitle: function subTitle() {
            var subTitle = this.listItem.artist;
            return subTitle;
        },
        links: function links() {
            return {
                show: '/songs/' + this.listItem.id,
                edit: '/songs/' + this.listItem.id + '/edit'
            };
        }
    },
    data: function data() {
        return {
            csrfToken: window.Laravel.csrfToken
        };
    }
};

/***/ }),
/* 190 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var ListItem = quark.Molecules.Lists.ListItem;

var listItem = ListItem.getModule({
    vueBindings: {
        title: 'listItem.title',
        subTitle: 'subTitle',
        link: 'links.show'
    },
    hiddenButtonRow: true,
    buttonRow: {
        buttons: [{
            iconClass: 'fa fa-pencil',
            type: 'minimal',
            theme: 'primary',
            vueBindings: {
                link: 'links.edit'
            }
        }, {
            iconClass: 'fa fa-trash',
            submit: true,
            type: 'minimal',
            theme: 'primary',
            formWrapper: {
                formMethod: 'POST',
                vueBindings: {
                    formAction: 'links.show'
                },
                hiddenFields: [{
                    name: '_token',
                    vueBindings: {
                        value: 'csrfToken'
                    }
                }, {
                    name: '_method',
                    value: 'DELETE'
                }]
            }
        }]
    }
});

var template = '' + listItem;

exports.default = template;

/***/ }),
/* 191 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
   value: true
});
var template = "\n     <div>\n        <song v-for=\"song in listItems\" v-bind:list-item=\"song\" v-bind:key=\"song.id\"></song>\n     </div>\n";

exports.default = template;

/***/ }),
/* 192 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(193),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/grid-items/BandCard.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1fb7a368", Component.options)
  } else {
    hotAPI.reload("data-v-1fb7a368", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 193 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'BandCard',
    props: ['band', 'counter'],
    template: '<div v-html="gridElement"></div>',
    computed: {
        gridElement: function gridElement() {
            return quark.Atoms.Sections.GridItem.getModule({
                sizes: {
                    phone: 12,
                    tablet: 6,
                    tabletLandscape: 6,
                    screen: 6
                },
                content: this.getCardElement()
            });
        }
    },
    methods: {
        getCardElement: function getCardElement() {
            return quark.Organisms.Cards.Card.getModule({
                title: this.band.name,
                theme: 'primary',
                content: quark.Organisms.Lists.List.getModule({
                    id: 'band-card-list-' + this.band.id,
                    listItems: this.getListItems()
                })
            });
        },
        getListItems: function getListItems() {
            return [{
                title: 'Songs',
                iconClass: 'fa fa-music',
                link: '/bands/' + this.band.id + '/songs',
                buttonRow: {
                    buttonElements: ["<span class='list-item-counter'>" + this.counter.songs + "</span>"]
                }
            }, {
                title: 'Gigs',
                iconClass: 'fa fa-calendar',
                link: '/bands/' + this.band.id + '/gigs',
                buttonRow: {
                    buttonElements: ["<span class='list-item-counter'>" + this.counter.gigs + "</span>"]
                }
            }, {
                title: 'Members',
                iconClass: 'fa fa-group',
                link: '/bands/' + this.band.id + '/band-memberships',
                buttonRow: {
                    buttonElements: ["<span class='list-item-counter'>" + this.counter.members + "</span>"]
                }
            }];
        }
    }
};

/***/ }),
/* 194 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(195),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/modals/CreateSetlist.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-57bca13a", Component.options)
  } else {
    hotAPI.reload("data-v-57bca13a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 195 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _CreateSetlistTemplate = __webpack_require__(196);

var _CreateSetlistTemplate2 = _interopRequireDefault(_CreateSetlistTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'CreateSetlist',
    props: ['formData'],
    template: _CreateSetlistTemplate2.default,
    data: function data() {
        return {
            form: {
                data: this.formData.viewType == 'create' ? {} : this.formData.savedValues,
                readOnly: this.formData.viewType == 'show'
            },
            csrfToken: window.Laravel.csrfToken,
            selectedOption: 'new',
            useTemplate: false,
            selectedTemplate: ''
        };
    },

    computed: {
        copyFromOptions: function copyFromOptions() {
            var copyFromOptions = [];
            this.formData.savedValues.gigsWithSetlist.forEach(function (gigWithSetlist) {
                copyFromOptions.push({
                    name: gigWithSetlist.name + ', ' + gigWithSetlist.date,
                    value: gigWithSetlist.id
                });
            });
            return copyFromOptions;
        }
    },
    watch: {
        useTemplate: function useTemplate() {
            if (!this.useTemplate || this.useTemplate == 'false' || !this.selectedTemplate) {
                this.selectedOption = 'new';
            } else {
                this.selectedOption = this.selectedTemplate;
            }
        },
        selectedTemplate: function selectedTemplate() {
            if (this.selectedTemplate) {
                this.selectedOption = this.selectedTemplate;
            }
        }
    }
};

/***/ }),
/* 196 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var Button = quark.Atoms.Buttons.Button;
var Modal = quark.Molecules.Messaging.Modal;
var SelectList = quark.Molecules.FormElements.SelectList;
var RadioButton = quark.Molecules.FormElements.RadioButton;
var InputField = quark.Molecules.FormElements.InputField;

var modalTriggerButton = Button.getModule({
    content: "Create setlist",
    theme: "primary"
});

var createSetlistButton = {
    content: "Create setlist",
    theme: "primary",
    submit: true
};

var copyFromListElement = SelectList.getModule({
    label: 'Copy from',
    vueBindings: {
        options: 'copyFromOptions',
        value: 'selectedTemplate'
    }
});

var sourceGigId = InputField.getModule({
    id: "sourceGigId",
    name: "sourceGigId",
    type: "hidden",
    attributes: ["v-model='selectedOption'"]
});

var radioButtonBlankSetlist = RadioButton.getModule({
    id: 'sourceGigId-new',
    label: 'Create blank setlist',
    value: false,
    attributes: ['v-model="useTemplate"']
});

var radioButtonCopyFrom = RadioButton.getModule({
    id: 'sourceGigId-copy',
    label: 'Copy from existing setlist',
    value: true,
    attributes: ['v-model="useTemplate"']
});

var modalContent = "\n<div class=\"modal-content\">\n    <p>Create a new blank setlist or copy from an existing setlist</p>\n    " + sourceGigId + "\n    " + radioButtonBlankSetlist + "\n    " + radioButtonCopyFrom + "\n    <div v-show=\"useTemplate == 'true'\">" + copyFromListElement + "</div>\n</div>\n";

var modalElement = Modal.getModule({
    triggerElement: modalTriggerButton,
    id: 'create-new-setlist',
    modalElement: {
        title: 'Create setlist',
        scrollable: true,
        fullscreen: false,
        content: modalContent,
        footerButtons: {
            buttonRow: {
                buttons: [createSetlistButton]
            }
        }
    }
});

var template = "\n<div>\n<form method=\"POST\" v-bind:action=\"formData.postUrl\">\n<input v-if=\"!form.readOnly\" type=\"hidden\" name=\"_token\" v-bind:value=\"csrfToken\" />\n    " + modalElement + "\n    </form>\n</div>\n";

exports.default = template;

/***/ }),
/* 197 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(198),
  /* template */
  null,
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/modals/AddSetlistSong.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-cdc1b624", Component.options)
  } else {
    hotAPI.reload("data-v-cdc1b624", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 198 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

var _AddSetlistSongTemplate = __webpack_require__(199);

var _AddSetlistSongTemplate2 = _interopRequireDefault(_AddSetlistSongTemplate);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'AddSetlistSong',
    props: ['method', 'values'],
    template: _AddSetlistSongTemplate2.default,
    data: function data() {
        return {

            setlistSongs: [],
            selectedTemplate: ''
        };
    },

    watch: {
        selectedTemplate: function selectedTemplate() {
            if (this.selectedTemplate) {
                this.selectedOption = this.selectedTemplate;
            }
        }
    },
    computed: {
        repertoire: function repertoire() {
            var repertoire = [];
            this.values.forEach(function (repertoireSong) {
                repertoireSong.isAdded = this.$parent.isAdded(repertoireSong);
                repertoire.push(repertoireSong);
            }.bind(this));
            return repertoire;
        }
    },
    methods: {}
};

/***/ }),
/* 199 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

var Button = quark.Atoms.Buttons.Button;
var Modal = quark.Molecules.Messaging.Modal;
var SelectList = quark.Molecules.FormElements.SelectList;
var RadioButton = quark.Molecules.FormElements.RadioButton;
var InputField = quark.Molecules.FormElements.InputField;

var modalTriggerButton = Button.getModule({
    content: "Add song",
    theme: "primary"
});

var createSetlistButton = {
    content: "Add song",
    theme: "primary",
    submit: false
};

var modalContent = "\n<div class=\"modal-content\">\n    <repertoire v-bind:list-items=\"repertoire\" v-bind:list-type=\"'addToSetlist'\"></repertoire>\n</div>\n";

var modalElement = Modal.getModule({
    triggerElement: modalTriggerButton,
    id: 'add-song',
    modalElement: {
        title: 'Add song',
        scrollable: true,
        fullscreen: false,
        content: modalContent
        /*footerButtons: {
            buttonRow: {
                buttons: [
                    createSetlistButton
                ]
            }
        }*/
    }
});

var template = "\n<div>\n<input v-if=\"method !== 'GET'\" type=\"hidden\" name=\"_token\" value=\"" + window.Laravel.csrfToken + "\" />\n    " + modalElement + "\n</div>\n";

exports.default = template;

/***/ }),
/* 200 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(201),
  /* template */
  __webpack_require__(202),
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/Breadcrumbs.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Breadcrumbs.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-757270be", Component.options)
  } else {
    hotAPI.reload("data-v-757270be", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 201 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'Breadcrumbs',
    props: ['breadcrumbItems'],
    data: function data() {
        return {
            htmlContent: ""
        };
    },

    created: function created() {
        this.htmlContent = this.createBreadcrumbsElement();
    },
    methods: {
        createBreadcrumbsElement: function createBreadcrumbsElement() {
            return quark.Molecules.Navigation.Breadcrumbs.getModule({
                breadcrumbItems: this.breadcrumbItems
            });
        },
        createDummyListItems: function createDummyListItems() {
            return [{
                title: 'Lunch Gig',
                subTitle: '2017-10-28 - Johnny Walk Concert House - Morrisburgh',
                iconClass: 'fa fa-globe',
                link: "#",
                buttonRow: {
                    buttons: [{
                        iconClass: 'fa fa-pencil'
                    }, {
                        iconClass: 'fa fa-trash'
                    }]
                }
            }, {
                title: 'Student event',
                subTitle: '2017-08-19 - Wisozk Lodge Stadium - North Lonport',
                iconClass: 'fa fa-check-circle-o',
                link: "#",
                buttonRow: {
                    buttons: [{
                        iconClass: 'fa fa-pencil'
                    }, {
                        iconClass: 'fa fa-trash'
                    }]
                }
            }, {
                title: 'Summer Music Fest',
                subTitle: '2012-12-06 - Shanel Alley Park - Leannonchester',
                iconClass: 'fa fa-question-circle-o',
                link: "#",
                buttonRow: {
                    buttons: [{
                        iconClass: 'fa fa-pencil'
                    }, {
                        iconClass: 'fa fa-trash'
                    }]
                }
            }];
        }
    }
}; //
//
//
//

/***/ }),
/* 202 */
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.htmlContent)
    }
  })
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-757270be", module.exports)
  }
}

/***/ }),
/* 203 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(204),
  /* template */
  __webpack_require__(205),
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/CustomButton.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] CustomButton.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-77724bfc", Component.options)
  } else {
    hotAPI.reload("data-v-77724bfc", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 204 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'CustomButton',
    props: ['button'],
    data: function data() {
        return {
            htmlContent: ""
        };
    },

    created: function created() {
        this.htmlContent = quark.Atoms.Buttons.Button.getModule(this.button);
    }
}; //
//
//
//

/***/ }),
/* 205 */
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.htmlContent)
    }
  })
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-77724bfc", module.exports)
  }
}

/***/ }),
/* 206 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(207),
  /* template */
  __webpack_require__(208),
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/CustomButtonRow.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] CustomButtonRow.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-55872fa8", Component.options)
  } else {
    hotAPI.reload("data-v-55872fa8", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 207 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'CustomButtonRow',
    props: ['buttonRow'],
    data: function data() {
        return {
            htmlContent: ""
        };
    },

    created: function created() {
        this.htmlContent = quark.Molecules.Buttons.ButtonRow.getModule(this.buttonRow);
    }
}; //
//
//
//

/***/ }),
/* 208 */
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.htmlContent)
    }
  })
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-55872fa8", module.exports)
  }
}

/***/ }),
/* 209 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(210),
  /* template */
  __webpack_require__(212),
  /* styles */
  null,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/MainFooter.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] MainFooter.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-e66c4c1a", Component.options)
  } else {
    hotAPI.reload("data-v-e66c4c1a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 210 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'MainFooter',
    props: ['appVersion'],
    data: function data() {
        return {
            htmlContent: this.createFooterElement()
        };
    },

    methods: {
        createFooterElement: function createFooterElement() {
            var footerElement = quark.Organisms.Global.Footer.getModule({
                logo: {
                    image: {
                        src: __webpack_require__(211),
                        alt: 'quarkGUI logo'
                    },
                    url: '/'
                },
                content: '\n                        <div class="text-center">\n                            <p>FlowGig licensed under <a href="https://github.com/flowgig/flowgig/blob/master/LICENSE">GNU General Public License</a></p>\n                            <p><a href="#">About</a> - <a href="#">Developers</a> - <a href="#">Send feedback</a></p>\n                            <small>' + this.appVersion + '</small>\n                        </div>\n\t\t\t        '
            });
            return footerElement;
        }
    }
}; //
//
//
//

/***/ }),
/* 211 */
/***/ (function(module, exports) {

module.exports = "/fonts/flowgig-logo-gray.svg?413772836746db575069063b35a2d033";

/***/ }),
/* 212 */
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.htmlContent)
    }
  })
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-e66c4c1a", module.exports)
  }
}

/***/ }),
/* 213 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(262)
}
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(214),
  /* template */
  __webpack_require__(216),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/MainNavigation.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] MainNavigation.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-dcbaac28", Component.options)
  } else {
    hotAPI.reload("data-v-dcbaac28", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 214 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'MainNavigation',
    props: ['currentBand', 'currentUser', 'availableBands'],
    data: function data() {
        return {
            htmlContent: "",
            header: {},
            gravatarImageSrc: 'https://www.gravatar.com/avatar/' + this.currentUser.gravatarId + '?s=190&d=robohash'
        };
    },

    created: function created() {
        var _this = this;

        var header = {
            id: 'main-header',
            theme: 'dark',
            logo: {
                image: {
                    src: __webpack_require__(215),
                    alt: 'FlowGig logo'
                },
                url: "/dashboard"
            },
            primaryNavigationLeft: {
                id: "primary-navigation-left",
                listItems: []
            },
            primaryNavigationRight: {
                id: "primary-navigation-right",
                listItems: []
            },
            sidebar: {
                sidebarNavigation: {
                    listItems: [{
                        name: "About",
                        link: "",
                        iconClass: "fa fa-info-circle"
                    }, {
                        name: "Developers",
                        link: "",
                        iconClass: "fa fa-code"
                    }, {
                        name: "Send feedback",
                        link: "",
                        iconClass: "fa fa-comment"
                    }]
                }
            }
        };
        if (this.currentBand !== undefined) {
            (function () {

                var bandNavigation = [{
                    name: "Songs",
                    link: "/bands/" + _this.currentBand.id + "/songs",
                    iconClass: "fa fa-music"
                }, {
                    name: "Gigs",
                    link: "/bands/" + _this.currentBand.id + "/gigs",
                    iconClass: "fa fa-calendar"
                }, {
                    name: "Members",
                    link: "/bands/" + _this.currentBand.id + "/band-memberships",
                    iconClass: "fa fa-group"
                }];

                var listItemBand = {
                    name: _this.currentBand.name,
                    iconClass: "fa fa-group",
                    responsive: {
                        showIcon: true,
                        showText: false
                    },
                    dropdownContent: {
                        listItems: []
                    }
                };

                _this.availableBands.forEach(function (availableBand) {
                    listItemBand.dropdownContent.listItems.push({
                        name: availableBand.name,
                        link: "/bands/" + availableBand.id
                    });
                });

                header.primaryNavigationRight.listItems.push(listItemBand);
                header.sidebar.sidebarNavigation.listItems = bandNavigation;
            })();
        }

        if (this.currentUser !== undefined) {
            var profileImageElement = '<div class="main-navigation-profile-image"><img src="' + this.gravatarImageSrc + '"/></div>';
            var listItemUser = {
                name: '', //this.currentUser.name,
                iconElement: profileImageElement,
                responsive: {
                    showIcon: true,
                    showText: false
                },
                dropdownContent: {
                    listItems: [{
                        name: "Dashboard",
                        link: "/",
                        iconClass: "fa fa fa-dashboard"
                    }, {
                        name: "My account",
                        link: "/account",
                        iconClass: "fa fa-user"
                    }, {
                        name: "Log out",
                        link: "#",
                        iconClass: "fa fa-sign-out"
                    }]
                }
            };
            header.primaryNavigationRight.listItems.push(listItemUser);
        }

        this.header = header;
        this.htmlContent = quark.Organisms.Global.Header.getModule(this.header);
    }
}; //
//
//
//

/***/ }),
/* 215 */
/***/ (function(module, exports) {

module.exports = "/fonts/flowgig-beta-logo-white.svg?59e89767169b8b9e25aacaddc2115866";

/***/ }),
/* 216 */
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.htmlContent)
    }
  })
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-dcbaac28", module.exports)
  }
}

/***/ }),
/* 217 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(218)
}
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(219),
  /* template */
  __webpack_require__(233),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-af7af802",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/WelcomeScreen.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] WelcomeScreen.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-af7af802", Component.options)
  } else {
    hotAPI.reload("data-v-af7af802", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 218 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 219 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _LoginForm = __webpack_require__(220);

var _LoginForm2 = _interopRequireDefault(_LoginForm);

var _RegisterForm = __webpack_require__(224);

var _RegisterForm2 = _interopRequireDefault(_RegisterForm);

var _Welcome = __webpack_require__(228);

var _Welcome2 = _interopRequireDefault(_Welcome);

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

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

exports.default = {
    name: 'WelcomeScreen',
    props: ['formType', 'formData'],
    components: {
        welcome: _Welcome2.default,
        loginForm: _LoginForm2.default,
        registerForm: _RegisterForm2.default
    },
    data: function data() {
        return {
            logo: quark.Atoms.Media.Image.getModule({
                src: __webpack_require__(232),
                alt: "FlowGig logo"
            })
        };
    }
};

/***/ }),
/* 220 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(221)
}
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(222),
  /* template */
  __webpack_require__(223),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-e38bb6b6",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/auth/LoginForm.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] LoginForm.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-e38bb6b6", Component.options)
  } else {
    hotAPI.reload("data-v-e38bb6b6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 221 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 222 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'LoginForm',
    data: function data() {
        return {
            inputEmail: quark.Molecules.FormElements.InputField.getModule({
                id: "login-email",
                name: "email",
                label: "E-Mail Address",
                type: "email",
                value: this.$parent.formData.oldEmail,
                attributes: ["required", "autofocus"]
            }),
            inputPassword: quark.Molecules.FormElements.InputField.getModule({
                id: "login-password",
                name: "password",
                label: "Password",
                type: "password",
                attributes: ["required"]
            }),
            checkboxRemember: quark.Molecules.FormElements.Checkbox.getModule({
                id: "login-remember",
                name: "remember",
                label: "Remember Me",
                value: "true"
            }),
            loginButton: quark.Atoms.Buttons.Button.getModule({
                submit: true,
                theme: "primary",
                content: "Log in"
            }),
            csrfToken: window.Laravel.csrfToken
        };
    }
}; //
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

/***/ }),
/* 223 */
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "box z-2 login-box"
  }, [_c('div', {
    staticClass: "content"
  }, [_c('form', {
    attrs: {
      "method": "POST",
      "action": _vm.$parent.formData.loginUrl
    }
  }, [_c('input', {
    attrs: {
      "type": "hidden",
      "name": "_token"
    },
    domProps: {
      "value": _vm.csrfToken
    }
  }), _vm._v(" "), _vm._m(0, false, false), _vm._v(" "), _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.inputEmail)
    }
  }), _vm._v(" "), _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.inputPassword)
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "checkbox-container",
    domProps: {
      "innerHTML": _vm._s(_vm.checkboxRemember)
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "input-group float-right"
  }, [_c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.loginButton)
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "clearfix"
  }), _vm._v(" "), _c('div', {
    staticClass: "text-center"
  }, [_c('a', {
    attrs: {
      "href": _vm.$parent.formData.resetUrl
    }
  }, [_vm._v("Forgot Your Password?")])])])])])
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "login-box-header"
  }, [_c('p', [_vm._v("Log in")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-e38bb6b6", module.exports)
  }
}

/***/ }),
/* 224 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(225)
}
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(226),
  /* template */
  __webpack_require__(227),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-50f58f42",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/auth/RegisterForm.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] RegisterForm.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-50f58f42", Component.options)
  } else {
    hotAPI.reload("data-v-50f58f42", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 225 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 226 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _quarkGui = __webpack_require__(0);

var quark = _interopRequireWildcard(_quarkGui);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

exports.default = {
    name: 'RegisterForm',
    data: function data() {
        return {
            inputName: quark.Molecules.FormElements.InputField.getModule({
                id: "register-name",
                name: "name",
                label: "Name",
                type: "text",
                value: this.$parent.formData.oldName,
                attributes: ["required", "autofocus"]
            }),
            inputEmail: quark.Molecules.FormElements.InputField.getModule({
                id: "register-email",
                name: "email",
                label: "E-Mail Address",
                type: "email",
                value: this.$parent.formData.oldEmail,
                attributes: ["required"]
            }),
            inputPassword: quark.Molecules.FormElements.InputField.getModule({
                id: "register-password",
                name: "password",
                label: "Password",
                type: "password",
                attributes: ["required"]
            }),
            inputPasswordConfirmation: quark.Molecules.FormElements.InputField.getModule({
                id: "register-password_confirmation",
                name: "password_confirmation",
                label: "Confirm Password",
                type: "password",
                attributes: ["required"]
            }),
            inputCaptcha: quark.Molecules.FormElements.InputField.getModule({
                id: "captcha",
                name: "captcha",
                label: "Enter the characters shown",
                type: "text",
                attributes: ["required"]
            }),
            registerButton: quark.Atoms.Buttons.Button.getModule({
                submit: true,
                theme: "primary",
                content: "Register"
            }),
            csrfToken: window.Laravel.csrfToken
        };
    }
}; //
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

/***/ }),
/* 227 */
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "box z-2 login-box"
  }, [_c('div', {
    staticClass: "content"
  }, [_c('form', {
    attrs: {
      "method": "POST",
      "action": _vm.$parent.formData.registerUrl
    }
  }, [_c('input', {
    attrs: {
      "type": "hidden",
      "name": "_token"
    },
    domProps: {
      "value": _vm.csrfToken
    }
  }), _vm._v(" "), _vm._m(0, false, false), _vm._v(" "), _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.inputName)
    }
  }), _vm._v(" "), _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.inputEmail)
    }
  }), _vm._v(" "), _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.inputPassword)
    }
  }), _vm._v(" "), _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.inputPasswordConfirmation)
    }
  }), _vm._v(" "), _c('img', {
    staticClass: "captcha",
    attrs: {
      "src": _vm.$parent.formData.captchaSrc
    }
  }), _vm._v(" "), _c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.inputCaptcha)
    }
  }), _vm._v(" "), _c('div', {
    staticClass: "input-group float-right"
  }, [_c('div', {
    domProps: {
      "innerHTML": _vm._s(_vm.registerButton)
    }
  })]), _vm._v(" "), _c('div', {
    staticClass: "clearfix"
  })])])])
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "login-box-header"
  }, [_c('p', [_vm._v("Register")])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-50f58f42", module.exports)
  }
}

/***/ }),
/* 228 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(229)
}
var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(230),
  /* template */
  __webpack_require__(231),
  /* styles */
  injectStyle,
  /* scopeId */
  "data-v-6c4e89ba",
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "/Users/benjamindehli/Sites/flowgig/resources/assets/js/components/auth/Welcome.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Welcome.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6c4e89ba", Component.options)
  } else {
    hotAPI.reload("data-v-6c4e89ba", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 229 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 230 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
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

exports.default = {
    name: 'Welcome'
};

/***/ }),
/* 231 */
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "float-right"
  }, [_c('custom-button-row', {
    attrs: {
      "button-row": {
        id: 'buttonRow',
        buttons: [{
            link: '/register',
            theme: 'primary',
            content: 'Register'
          },
          {
            link: '/login',
            theme: 'primary',
            content: 'Log in'
          } ]
      }
    }
  })], 1)
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-6c4e89ba", module.exports)
  }
}

/***/ }),
/* 232 */
/***/ (function(module, exports) {

module.exports = "/fonts/flowgig-logo-white.svg?c459988ca87c3c370f8dbc3b416cf9fb";

/***/ }),
/* 233 */
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "welcome-screen"
  }, [_c('div', {
    staticClass: "container"
  }, [_c('div', {
    staticClass: "content"
  }, [_c('div', {
    staticClass: "title",
    domProps: {
      "innerHTML": _vm._s(_vm.logo)
    }
  }), _vm._v(" "), (_vm.formType == 'welcome') ? _c('div', [_c('welcome')], 1) : (_vm.formType == 'login') ? _c('div', [_c('login-form')], 1) : (_vm.formType == 'register') ? _c('div', [_c('register-form')], 1) : _vm._e()])])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-af7af802", module.exports)
  }
}

/***/ }),
/* 234 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 235 */,
/* 236 */,
/* 237 */,
/* 238 */,
/* 239 */,
/* 240 */,
/* 241 */,
/* 242 */,
/* 243 */,
/* 244 */,
/* 245 */,
/* 246 */,
/* 247 */,
/* 248 */,
/* 249 */,
/* 250 */,
/* 251 */,
/* 252 */,
/* 253 */,
/* 254 */,
/* 255 */,
/* 256 */,
/* 257 */,
/* 258 */,
/* 259 */,
/* 260 */,
/* 261 */,
/* 262 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
],[36]);