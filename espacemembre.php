<?php

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Page d'inscription</title>
</head>
<body>
	<?php
		echo "<p>Bonjour, " . $_SESSION['pseudo'] . " !</p>";
	?>

	<p>
		<a href="deconection.php">Deconection</a>
	</p>
	
</body>
</html>