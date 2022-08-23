/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/body.js ***!
  \******************************/
var toasts = document.querySelectorAll(".custom-toast");

var hideToast = function hideToast(timer) {
  var body = document.querySelector("body");
  toasts.forEach(function (toast) {
    if (!toast.classList.contains("show")) return;
    setTimeout(function () {
      toast.classList.remove("show");
    }, timer);
    setTimeout(function () {
      return body.removeChild(toast);
    }, 5000);
  });
};

window.addEventListener("DOMContentLoaded", hideToast(3000));
var x = document.querySelector(".custom-toast");
console.log(x);
/******/ })()
;