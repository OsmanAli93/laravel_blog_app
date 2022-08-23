/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/image_preview.js ***!
  \***************************************/
var upload = document.getElementById("upload");
var image = document.querySelector(".preview");

var imageUpload = function imageUpload(event) {
  var file = event.target.files[0];

  if (file) {
    var reader = new FileReader();
    reader.addEventListener("load", function (event) {
      var avatar = document.querySelector(".avatar-null");
      avatar.style.display = "none";
      image.setAttribute("src", event.target.result);
      image.style.display = "block";
    });
    reader.readAsDataURL(file);
  }

  image.style.display = null;
  avatar.style.display = "block";
};

upload.addEventListener("change", imageUpload);
/******/ })()
;