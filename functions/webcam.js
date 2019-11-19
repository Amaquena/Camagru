"use strict";
var width = 320;
var height = 240;
const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const snap = document.getElementById("snap");

var ctx = canvas.getContext("2d");
var save_canvas;

// Display webcam
navigator.mediaDevices
	.getUserMedia({ video: { width: 320, height: 240} , audio: false })
	.then(function (stream) {
		video.srcObject = stream;
		video.play();
	})
	.catch(function (err) {
		console.log("An error occurred! " + err);
	});

// Draw image of webcam on canvas
snap.addEventListener("click", function () {
	ctx.drawImage(video, 0, 0, width, height);
	console.log(canvas.toDataURL());
	ctx.save();
	// save();
});

// Draw image of sticker onto canvas
function merge(url) {
	// ctx.clearRect(0,0,width,height);
	var image = new Image();
	image.onload = function() {
		ctx.drawImage(image,0,0,width,height);
	}
	image.src = url;
	// img.src = strDataURI
}

function save_image() {
	var img = new Image();
	img.src = canvas.toDataURL();
	var btn = document.getElementById("upload");
	btn.value = img.src;
}


function save() {
	save_canvas = canvas.toDataURL('image/jpeg',1.0);
}

function clear() {
	ctx.clearRect(0, 0, width, height);
	// ctx.restore();
	// console.log(save_canvas);
	// var img = Image();
	// img.onload = function () {
	// 	ctx.drawImage(img,0,0,width,height);
	// }
	// img.src = save_canvas;
}