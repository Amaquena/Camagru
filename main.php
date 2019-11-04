<?php require 'header.php' ?>

<main>
	<?php
	if (!$_SESSION && !$_GET['guest'])
	{
		header("Location: index.php");
		exit();
	}
	?>
	<body>
		
	</body>
</main>

<?php require "footer.php"; ?>