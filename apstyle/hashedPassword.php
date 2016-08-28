<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<br />
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<input type="password" name="password" class="input-text" placeholder="Your Password">
<button type="submit" class="btn-success" style="padding: 10px 10px;">GENERATE</button>
</form>
<br />

<?php
	if(isset($_POST['password']))
	{
		echo "<b> Encrypted Password: </b>";
		echo md5($_POST['password']);
	}

?>
</html>