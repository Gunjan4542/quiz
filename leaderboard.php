<!DOCTYPE html>
<?php
require_once "connection.php";
?>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scle=1.0">
<link rel="stylesheet" type="text/css" href="tabs.css">
</head>
<body>
<table class="table" cellspacing="0">
<tr class="table-header-row">
<td class="table-header">Rank</td>
<td class="table-header">User Id</td>
<td class="table-header">Name</td>
<td class="table-header">Year</td>
<td class="table-header">Score</td>
</tr>
<?php
session_start();
$query=mysqli_query($con,"SELECT uid,name,year,score FROM users ORDER BY score DESC");
$i=1;
$previous_rank=1;
$previous_score=0;
while($result=mysqli_fetch_assoc($query))
{
	$status="";
	if($result['score']<$previous_score)
		$i=++$previous_rank;
	$class='table-row';
	if(isset($_SESSION['uid']))
	if($result['uid']==$_SESSION['uid'])
	{
		$class='current-user';
		$status.="<img src='extra/user.jpg' style='width: 17px; height: 17px; '>";
	}
	if($result['score']<0){ $class='danger'; $status="<img src='extra/warning.png' style='height: 20px; widht: 20px;'>"; }
	if($i==1){ $class='winner'; $status.="<img src='extra/cup.png' style='width: 30px; height: 20px;'>"; }
	echo "<tr class=$class>";
	echo "<td > $i $status </td><td>".$result['uid']."</td><td>".$result['name']."</td><td>".
	$result['year']."</td><td>".$result['score']."</td></tr>";
	$previous_score=$result['score'];
	//$i++;
}

?>
</table>

