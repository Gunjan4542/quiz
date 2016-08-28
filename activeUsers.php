<!DOCTYPE html>
<?php
require_once "connection.php";
//date_default_timezone_set("Asia/Kolkata");
?>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scle=1.0">
<link rel="stylesheet" type="text/css" href="tabs.css">
    <script src="apstyle/js/apstyle.js"></script>
    <link rel="stylesheet" type="text/css" href="apstyle/css/main.css">
    <link rel="stylesheet" type="text/css" href="tabs.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="css/styles.css">

	<nav class="main-block-home">
	<ul>
	<li style="padding: 0 0; "><h1 style="text-shadow: 3px 3px 2px gray; margin-top: 7px; height: 100%;">Admin Panel</h1></li>
	<li class="menu" class='active' onclick="location.href='admin.php';"><a href='admin.php'>Add Problem</li></a>
	<li class="menu" onclick="location.href='edit.php';" ><a href="edit.php">Show All Questions</li></a>
	<li class="menu dropdown" style="display: inline-block;" tabindex="0">More Options
	<div class="dropdown-content" style="top: 37px;">
	<a href="leaderboard.php">leaderboard</a>
	<a href="activeUsers.php">Active Users</a>
	</div>
	</li>
	</ul>
	</nav>
<style>
.btn {
display: inline-block;
padding: 5px 7px;
padding-top: 7px;
margin-bottom: 0;
font-size: 14px;
line-height: 20px;
color: #5e5e5e;
text-align: center;
vertical-align: middle;
cursor: pointer;
background-color: #d1dade;
-webkit-border-radius: 3px;
-webkit-border-radius: 3px;
-webkit-border-radius: 3px;
background-image: none !important;
border: none;
text-shadow: none;
box-shadow: none;
border-radius: 8px;
transition: all 0.4s linear 0s !important;
font: 14px/20px "Helvetica Neue",Helvetica,Arial,sans-serif;
font-weight: bold;
margin-right: 2px; margin-left: 2px;
}
.btn-cons {
margin-right: 5px;
min-width: 120px;
margin-bottom: 8px;
}
.btn-default {
color: #333;
background-color: #fff;
border-color: #ccc;
}
.btn-primary {
color: #fff;
background-color: #428bca;
border-color: #357ebd;
}
.btn-success {
color: #fff;
background-color: #5cb85c;
border-color: #4cae4c;
}
.btn-info {
color: #fff;
background-color: #5bc0de;
border-color: #46b8da;
}
.btn-warning {
color: #fff;
background-color: #f0ad4e;
border-color: #eea236;
}
.btn-danger {
color: #fff;
background-color: #d9534f;
border-color: #d43f3a;
}
.btn-white {
color: #5e5e5e;
background-color: #fff;
border: 1px solid #e5e9ec;
}
h1
{
	font: "Helvetica Neue",Helvetica,Arial,sans-serif;	
	color: white;
	display: inline-block;
	background-color: #383333;
	border-radius: 8px;
	box-shadow: 1px 0px 5px white;
	padding: 2px 2px;
	text-shadow: 1px 0px 3px black;
}
.btn-link, .btn-link:active, .btn-link[disabled], fieldset[disabled] .btn-link {
background-color: transparent;
-webkit-box-shadow: none;
box-shadow: none;
}
.btn-link, .btn-link:hover, .btn-link:focus, .btn-link:active {
border-color: transparent;
}
.btn-link {
color: #5e5e5e;
background-color: transparent;
border: none;
}
.btn-link, .btn-link:hover, .btn-link:focus, .btn-link:active {
border-color: transparent;
}
.btn-default, .btn-primary, .btn-success, .btn-info, .btn-warning, .btn-danger {
text-shadow: 0 -1px 0 rgba(0,0,0,0.2);
-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.15),0 1px 1px rgba(0,0,0,0.075);
box-shadow: inset 0 1px 0 rgba(255,255,255,0.15),0 1px 1px rgba(0,0,0,0.075);
}
.panel-flat
{
  box-shadow: 3px 0px 7px gray;
  padding:  10px 10px;
  background-color:  #F2F0F0;
  
  
}
.btn:hover {  box-shadow: none; color: white;}
</style>
</head>
<body>
<div class='panel-flat' style="margin-top: 90px; width: 97%; margin-left: 15px;">
<h1>Active User Logs </h1>

<table class="table" cellspacing="0" style='border: 1px solid lightgray;'>
<tr class="table-header-row" >
<td class="table-header" style='background-color: white; border-bottom: 4px solid gray;color: black;'>Sl No.</td>
<td class="table-header" style='background-color: white; border-bottom: 4px solid gray;color: black;'>User Id</td>
<td class="table-header" style='background-color: white; border-bottom: 4px solid gray;color: black;'>Name</td>
<td class="table-header" style='background-color: white; border-bottom: 4px solid gray;color: black;'>Email Id</td>
<td class="table-header" style='background-color: white; border-bottom: 4px solid gray;color: black;'>Year</td>
<td class="table-header" style='background-color: white; border-bottom: 4px solid gray;color: black;'>Roll No</td>
<td class="table-header" style='background-color: white; border-bottom: 4px solid gray;color: black;'>attempt</td>
<td class="table-header" style='background-color: white; border-bottom: 4px solid gray;color: black;'>Score</td>
<td class="table-header" style='background-color: white; border-bottom: 4px solid gray;color: black;'>Start Time</td>
<td class="table-header" style='background-color: white; border-bottom: 4px solid gray; color: black;'>IP Address</td>
<td class="table-header" style='background-color: white; border-bottom: 4px solid gray; color: black;'>Control</td>
</tr>
<?php

$query=mysqli_query($con,"SELECT uid,name,email,year,crn,attempt,score,start,ip,active FROM users ORDER BY score DESC");
$i=1;
while($result=mysqli_fetch_assoc($query))
{
	$tme="-";
	if($result['start']!=0)
	{
		$tme=date('h:i:sa Y-m-d',$result['start']);
	}
	$class='table-row';
	$status="";
	if($result['active']==1)
		$status="<img src='extra/online.png' style='height: 15px; width: 15px;'>";
	else
		$status="<img src='extra/offline.png'>";
	echo "<tr class=$class>";
	echo "<td > $i</td><td>$status ".$result['uid']."</td><td>".$result['name']."</td><td>".$result['email']."</td><td><center>".
	$result['year']."</center></td><td>".$result['crn']."</td><td><center>".$result['attempt']."</center></td><td><center>".$result['score']."</center></td><td>".$tme."</td><td>".$result['ip']."</td><td><button type='button' class='btn btn-white'>KICK</button><button type='button' class='btn btn-warning'>BAN</button><button type='button' class='btn btn-danger'>DELETE</button></tr>";
	$i++;
}
mysqli_free_result($query);

?>