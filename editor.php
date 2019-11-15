<?php require 'header.php' ?>

<main>
	<?php
	if ($_SESSION['verify'] == 0) {
		echo '<h2 id="verify-tag">Verify account to access Editor page</h2>';
	} else {
		// include 'cam.html';
		?>
		<video id="video" autoplay></video>
		<button id="snap">capture</button>
		<canvas id="canvas" width="640" height="480"></canvas>
		<button id="upload">Upload</button>

	<?php
	}
	?>

	<script>
		'use strict';
		const video = document.getElementById('video');
		const canvas = document.getElementById('canvas');
		const snap = document.getElementById('snap');
		const errorMsgElement = document.getElementById('span#ErrorMsg');

		const constraints = {
			audio: false,
			video: {
				width: 640,
				height: 480
			}
		};
		// Access webcam
		async function init() {
			try {
				const stream = await navigator.mediaDevices.getUserMedia(constraints);
				handleSuccess(stream);
			} catch (e) {
				errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
			}
		}
		// Success
		function handleSuccess(stream) {
			window.stream = stream;
			video.srcObject = stream;
		}
		init();

		var context = canvas.getContext('2d');
		width = 640;
		height = 480;
		snap.addEventListener("click", function() {
			capture = 1;
			context.save();
			context.scale(-1, 1);
			context.drawImage(video, 0, 0, width * -1, height);
			context.restore();
			saveState(canvas);
		});

		function saveState(c) {
			s_canvas = c.toDataURL('image/jpeg', 1.0);
			//copy the data into some variable
			// console.log(s_canvas);
		}
	</script>
</main>


<?php require 'footer.php' ?>