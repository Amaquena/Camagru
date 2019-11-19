<?php
require 'header.php';
include 'functions/get_images.php';
?>

<main>
	<?php
	if ($_SESSION['verify'] == 0) {
		echo '<h2 id="verify-tag">Verify account to access Editor page</h2>';
	} else {
		$images = get_images();
		?>
		<div class="grid-container">
			<div class="item1">

				<!-- <img class="frame" src="./stickers/doggo1.png" onclick="merge('./stickers/doggo1.png')"><br /> -->
				<img class="frame" src="./stickers/frame1.png" onclick="merge('./stickers/frame1.png')"><br />
				<img class="frame" src="./stickers/frame2.png" onclick="merge('./stickers/frame2.png')"><br />
				<img class="frame" src="./stickers/frame3.png" onclick="merge('./stickers/frame3.png')"><br />
				<img class="frame" src="./stickers/frame4.png" onclick="merge('./stickers/frame4.png')"><br />
				<img class="frame" src="./stickers/frame5.png" onclick="merge('./stickers/frame5.png')"><br />
				<img class="frame" src="./stickers/frame6.png" onclick="merge('./stickers/frame6.png')"><br />
				<img class="frame" src="./stickers/frame7.png" onclick="merge('./stickers/frame7.png')"><br />
				<img class="frame" src="./stickers/frame8.png" onclick="merge('./stickers/frame8.png')"><br />
				<img class="frame" src="./stickers/frame9.png" onclick="merge('./stickers/frame9.png')"><br />
				<img class="frame" src="./stickers/frame10.png" onclick="merge('./stickers/frame10.png')"><br />
				<img class="frame" src="./stickers/frame11.png" onclick="merge('./stickers/frame11.png')"><br />
				<img class="frame" src="./stickers/frame12.png" onclick="merge('./stickers/frame12.png')"><br />
				<img class="frame" src="./stickers/frame13.png" onclick="merge('./stickers/frame13.png')"><br />
			</div>
			<div class="item2">
				<video id="video" autoplay></video><br />
				<button id="snap">Snap</button>
			</div>
			<div class="item3">
				<img src="<?php echo $images[1]; ?>" />
			</div>
			<div class="item4">
				<form action="includes/image_save.inc.php" method="post">
					<canvas style="background-color:bisque" id="canvas" width="320" height="240"></canvas><br />
					<button id="upload" type="submit" name="upload" onclick="save_image()">Upload</button>
				</form>
				<button id="clear" onclick="clear()">Clear</button>
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