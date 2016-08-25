<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
	 <meta name="viewport" content="height=device-height,initial-scale=1.0">
    <script src="apstyle/js/apstyle.js"></script>
    <link rel="stylesheet" type="text/css" href="apstyle/css/main.css">
    <link rel="stylesheet" type="text/css" href="tabs.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="css/styles.css">

	<nav class="main-block-home">
	<ul>
	<li><h1 style="text-shadow: 3px 3px 2px gray;">Admin Panel</h1></li>
	<li class="menu" class='active'>Add Problem</li>
	<li class="menu dropdown" style="display: inline-block;" tabindex="0">
	Others>
	<div class="dropdown-content" style="top: 37px;">
	<a href="leaderboard.php">leaderboard</a>
	<a>Sub Menu</a>
	</div>
	</li>
	</ul>
	</nav>
</head>
<body>
	<button type="button" class='primary btn-flat-danger' id='plus' style='margin-left: 30px;'>+Add Another</button>
	<div style="margin-left: 15px;  float: left; padding: 15px 15px;" id="main">
		<div class='panel-flat' style="box-shadow: 1px 0px 10px black; margin-top: 15px; background-color: white;">
		<textarea   class='input-text' placeholder="Problem Statement"></textarea>
		<input type="text" class="input-text op1" name="op1" placeholder="Option 1">
		<input type="text" class="input-text op2" name="op2" placeholder="Option 2">
		<input type="text" class="input-text op3" name="op3" placeholder="Option 3">
		<input type="text" class="input-text op4" name="op4" placeholder="Option 4">
		<b> Correct Option : </b>
		<select name="correct" class="select" placeholder="Correct Option" style='width: 100px;'>
			<option value="1">Option 1</option><option value="2">Option 2</option>
			<option value="3">Option 3</option><option value="4">Option 4</option> 
		</select>
		<button type="button" class='btn-success'>ADD</button>

	</div>

	</div>
<script>
$(function(){
	$('#plus').click(function(){
		$('#main').append("<div class='panel-flat' style='box-shadow: 1px 0px 10px black; margin-top: 15px; background-color: white;'><textarea   class='input-text' placeholder='Problem Statement'></textarea><input type='text' class='input-text op1' name='op1' placeholder='Option 1'><input type='text' class='input-text op2' name='op2' placeholder='Option 2'><input type='text' class='input-text op3' name='op3' placeholder='Option 3'><input type='text' class='input-text op4' name='op4' placeholder='Option 4'><b> Correct Option : </b><select name='correct' class='select' placeholder='Correct Option' style='width: 100px;'><option value='1'>Option 1</option><option value='2'>Option 2</option><option value='3'>Option 3</option><option value='4'>Option 4</option> </select><button type='button' class='btn-success'>ADD</button></div>");
	});
	$(document).on('click','.btn-success',function(){
  		var q=$(this).parent().find('textarea').val();
  		var op1=$(this).parent().find('.op1').val();
  		var op2=$(this).parent().find('.op2').val();
  		var op3=$(this).parent().find('.op3').val();
  		var op4=$(this).parent().find('.op4').val();
  		var correct=$(this).parent().find('select').val();
  		if(q=="" || op1=="" || op2=="" || op3=="" || op4=="")
  		{
  			alert("Please Fill all the fields...");
  			return ;
  		}
  		var flag=false;
		$.post("sessioncontrol.php",{ addproblem: "add", q: q, op1: op1, op2: op2,op3: op3,op4: op4, correct: correct},function(data){
			alert(data);
		});
		$(this).parent().fadeOut('slow');
});

});
</script>
</body>
<?php




?>

</html>