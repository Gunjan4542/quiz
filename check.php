<?php
require_once "connection.php";
if(isset($_POST['uid']))
{
	$uid=$_POST['uid'];
	if(empty($uid)) die("<b style='color: darkorange; font-size: 30px;'>!</b>");
	$query="SELECT uid FROM users WHERE uid='$uid'";
	$result=mysqli_fetch_assoc(mysqli_query($con,$query));
	if(!empty($result))
		echo "<span style='color: red;  font-size: 24px; font-family: arial;'>X</span>";
	else
		echo "<b style='color: darkblue; font-size: 24px;'>&#10004;</b>";
}

?>
