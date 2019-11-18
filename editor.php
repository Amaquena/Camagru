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
			<div class="item1">
				<!-- <select>
					<option value="stickers/doggo1">doggo1</option>
					<option value="stickers/frame1">frame1</option>
					<option value="stickers/frame2">frame2</option>
					<option value="stickers/frame3">frame3</option>
					<option value="stickers/frame4">frame4</option>
					<option value="stickers/frame5">frame5</option>
					<option value="stickers/frame6">frame6</option>
					<option value="stickers/frame7">frame7</option>
					<option value="stickers/frame8">frame8</option>
					<option value="stickers/frame9">frame9</option>
					<option value="stickers/frame10">frame10</option>
					<option value="stickers/frame11">frame11</option>
					<option value="stickers/frame12">frame12</option>
					<option value="stickers/frame13">frame13</option>
				</select> -->
				<?php
					$dirname = "stickers/";
					$images = glob($dirname . "*.png");

					foreach ($images as $image) {
						echo '<a href="#"><img src="' . $image . '" /></a><br />';
					}
					?>
			</div>
			<div class="item2">
				<video id="video" autoplay></video>
				<button id="snap">capture</button>
			</div>
			<div class="item3">
			</div>
			<div class="item4">
				<canvas id="canvas" width="640" height="480"></canvas>
				<button id="upload" onclick="save_image()">Upload</button>
			</div>
			<div class="item5">
				<form enctype="multipart/form-data" method="post" name="changer">
					<input name="image" accept="image/jpeg" type="file">
					<input value="Submit" type="button">
				</form>
			</div>
		</div>
	<?php
	}
	?>

	<script type="text/javascript" async src="functions/webcam.js"></script>
</main>


<?php require 'footer.php' ?>