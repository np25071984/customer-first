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

/***/ "./resources/js/admin.js":
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.changeLogo = function () {
  document.getElementById("logo").click();
};

window.refreshLogo = function (input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.filename = input.files[0].name;

    reader.onload = function (e) {
      document.getElementById("preview").src = e.target.result;
      document.getElementById("filename").value = e.target.filename;
      document.getElementById("filename").classList.remove("d-none");
    };

    var imgPath = input.value;
    var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

    if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
      reader.readAsDataURL(input.files[0]);
    } else {
      input.value = '';
      alert('Принимаются только файлы форматов gif, png и jpg');
    }
  }
};

window.removeLogo = function () {
  var setRemove = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
  document.getElementById("filename").value = '';
  document.getElementById("filename").classList.add("d-none");
  document.getElementById("preview").src = '/noimage.jpeg';

  if (setRemove) {
    document.getElementById("remove").value = 1;
  }
};

window.changeImage = function (elementId) {
  document.querySelector("div#".concat(elementId, " > input[type=file]")).click();
};

window.refreshImage = function (input) {
  if (input.files && input.files[0]) {
    var elementId = input.parentNode.id;
    var reader = new FileReader();
    reader.filename = input.files[0].name;

    reader.onload = function (e) {
      document.querySelector("div#".concat(elementId, " > img")).src = e.target.result;
      var inputText = document.querySelector("div#".concat(elementId, " > input[type=text]"));
      inputText.value = e.target.filename;
      inputText.classList.remove("d-none");
    };

    var imgPath = input.value;
    var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

    if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
      reader.readAsDataURL(input.files[0]);
    } else {
      input.value = '';
      alert('Принимаются только файлы форматов gif, png и jpg');
    }
  }
};

window.removeImage = function (elementId) {
  var element = document.getElementById(elementId);
  element.parentNode.removeChild(element);
};

window.addImage = function (parentId) {
  var parent = document.getElementById(parentId);
  var position = null;
  var lastChild = parent.lastChild;

  if (lastChild) {
    position = parseInt(lastChild.id.split('-')[1]) + 1;
  } else {
    position = 1;
  }

  var elementId = 'image-' + position;
  var inputFile = document.createElement("INPUT");
  inputFile.type = "file";
  inputFile.name = "image[".concat(position, "]");

  inputFile.onchange = function () {
    window.refreshImage(this);
  };

  inputFile.classList.add("d-none");
  var inputText = document.createElement("INPUT");
  inputText.type = "text";
  inputText.name = "filename[".concat(position, "]");
  inputText.classList.add("form-control");
  inputText.classList.add("mb-3");
  inputText.classList.add("d-none");
  var imageDiv = document.createElement("DIV");
  imageDiv.classList.add("mb-4");
  imageDiv.id = elementId;
  var img = document.createElement("IMG");
  img.src = '/noimage.jpeg';
  var br = document.createElement("BR");
  var changeLink = document.createElement("A");
  changeLink.href = "#";

  changeLink.onclick = function () {
    window.changeImage(elementId);
  };

  var changeText = document.createTextNode("Изменить");
  changeLink.appendChild(changeText);
  var seporatorText = document.createTextNode(" | ");
  var removeLink = document.createElement("A");
  removeLink.href = "#";
  var removeText = document.createTextNode("Удалить");
  removeLink.appendChild(removeText);

  removeLink.onclick = function () {
    window.removeImage(elementId);
  };

  imageDiv.appendChild(inputFile);
  imageDiv.appendChild(inputText);
  imageDiv.appendChild(img);
  imageDiv.appendChild(br);
  imageDiv.appendChild(changeLink);
  imageDiv.appendChild(seporatorText);
  imageDiv.appendChild(removeLink);
  parent.appendChild(imageDiv);
};

/***/ }),

/***/ 1:
/*!*************************************!*\
  !*** multi ./resources/js/admin.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /app/resources/js/admin.js */"./resources/js/admin.js");


/***/ })

/******/ });