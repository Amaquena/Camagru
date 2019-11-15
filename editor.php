<?php require 'header.php' ?>

<main>
	<?php
	if ($_SESSION['verify'] == 0) {
		echo '<h2 id="verify-tag">Verify account to access Editor page</h2>';
	} else {
		?>
		<!-- <div class="grid">
			<div class="item1"></div>
			<div class="item2"></div>
			<div class="item3"></div>
			<div class="item4"></div>
		</div> -->

		<div class="grid-container">
			<div class="item1">stickers</div>
			<div class="item2">
				<video id="video" autoplay></video>
				<button id="snap">capture</button>
			</div>
			<div class="item3">
			</div>
			<div class="item4">
				<canvas id="canvas" width="640" height="480"></canvas>
				<button id="upload">Upload</button>
			</div>
		</div>
		<!-- 
	
		 -->

	<?php
	}
	?>

	<script type="text/javascript" async src="functions/webcam.js"></script>
</main>


<?php require 'footer.php' ?>