"use strict";
var width = 640;
var height = 480;
const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const snap = document.getElementById("snap");

// navigator.mediaDevices
//   .getUserMedia({ video: true, audio: false })
//   .then(function (stream) {
//     video.srcObject = stream;
//     video.play();
//   })
//   .catch(function (err) {
//     console.log("An error occurred! " + err);
//   });

// Draw image
var context = canvas.getContext("2d");
snap.addEventListener("click", function () {
	context.drawImage(video, 0, 0, width, height);
});

function save_image() {
	var img = new Image();
	img.src = canvas.toDataURL();
	var btn = document.getElementById("upload");
	btn.value = img.src;
}