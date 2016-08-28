<!DOCTYPE html>
<html>
<head>
	<?php require_once "connection.php"; ?>
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
	<li style="padding: 0 0; "><h1 class='title' style="text-shadow: 3px 3px 2px gray; height: 100%; margin-top: 7px;">Admin Panel</h1></li>
	<li class="menu" style='background-color: #464040; box-shadow: 0px -4px #f0ad4e inset;'>Add Problem</li>
	<li class="menu" onclick="location.href='edit.php';"><a href="edit.php">Show All Questions</li></a>
	<li class="menu dropdown" style="display: inline-block;" tabindex="0">More Options
	<div class="dropdown-content" style="top: 37px;">
	<a href="leaderboard.php">leaderboard</a>
	<a href="activeUsers.php">Active Users</a>
	</div>
	</li>
	</ul>
	</nav>
	<style>
	.opt
	{
		width: 200px;
	} 
	.title
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
	.reddish { border: none; background-color: transparent; box-shadow: none; color: lightgray; font-size: 24px; margin-top: 0;}
	.reddish:hover { box-shadow: none; background-color: transparent; color: gray; }
	</style>
</head>
<body>

	<div style="margin-left: 15px;  float: left; padding: 15px 15px;" id="main">
			<div class='panel' style='box-shadow: none; display: inline-block; margin-top: 50px; border: 2px solid green; '>
	
	<button type="button" class='primary btn-flat-danger' id='plus' style='margin-left: 30px;'>+Add Another</button>
	<button type="button" class='primary btn-flat-blue' id="all">ADD ALL </button>
	
	<div style='float: right; margin-right: 10px; margin-top: 10px;'>
	<b> Problems Added : </b> <span id="counter">0</span> </div>
	<div style='float: right; margin-right: 10px; margin-top: 10px;'><b>Total Problems in database : </b> <span id="total">
	<?php
		$result=mysqli_query($con,"SELECT * FROM questions");
		$count=mysqli_num_rows($result);
		mysqli_free_result($result);
		echo $count;
	?>
	 </span> </div>
	</div>
		<div class='panel-flat' style="box-shadow: 1px 0px 10px black; margin-top: 15px; background-color: white; margin-top: 40px;">
		<button style='float: right;' type='button' class='reddish' onclick='hideMe($(this));'> X</button>
		<textarea   class='input-text' placeholder="Problem Statement"></textarea>
		<textarea class="input-text op1 opt" name="op1" placeholder="Option 1"></textarea>
		<textarea class="input-text op2 opt" name="op2" placeholder="Option 2"></textarea>
		<textarea class="input-text op3 opt" name="op3" placeholder="Option 3"></textarea>
		<textarea class="input-text op4 opt" name="op4" placeholder="Option 4"></textarea>
		<b> Correct Option : </b>
		<select name="correct" class="select" placeholder="Correct Option" style='width: 100px;'>
			<option value="1">Option 1</option><option value="2">Option 2</option>
			<option value="3">Option 3</option><option value="4">Option 4</option> 
		</select>
		<button type="button" class='btn-success'>ADD</button>

	</div>

	</div>
<script>
var c=0;
function hideMe(x)
	{
		x.parent().remove();
	}
$(function(){

	$('#plus').click(function(){
		$('#main').append("<div class='panel-flat' style='box-shadow: 1px 0px 10px black; margin-top: 15px; background-color: white;'><button style='float: right;' type='button' class='reddish' onclick='hideMe($(this));'> X</button><textarea class='input-text' placeholder='Problem Statement'></textarea><textarea class='input-text op1 opt' name='op1' placeholder='Option 1'></textarea><textarea class='input-text op2 opt' name='op2' placeholder='Option 2'></textarea><textarea class='input-text op3 opt' name='op3' placeholder='Option 3'></textarea><textarea class='input-text op4 opt' name='op4' placeholder='Option 4'></textarea><b> Correct Option : </b><select name='correct' class='select' placeholder='Correct Option' style='width: 100px;'><option value='1'>Option 1</option><option value='2'>Option 2</option><option value='3'>Option 3</option><option value='4'>Option 4</option> </select><button type='button' class='btn-success'>ADD</button></div>");
	});
	$('#all').on('click',function(){
		var i=0;
		var txt="";
		$("#main").children('.panel-flat').each(function(){
			var current=$(this);
			if(current.find(".panel-warning").html()!=undefined)
				return;
			var q=$(this).children('textarea').val();
	  		var op1=$(this).children('.op1').val();
	  		var op2=$(this).children('.op2').val();
	  		var op3=$(this).children('.op3').val();
	  		var op4=$(this).children('.op4').val();
	  		var correct=$(this).children('select').val();
	  		if(q=="" || op1=="" || op2=="" || op3=="" || op4=="")
  			{
  				current.append("<br/><div class='panel-danger'><b>Please Fill all the fields...</b></div>");
  			}
  			else{
  				$.post("sessioncontrol.php",{ addproblem: "add", q: q, op1: op1, op2: op2,op3: op3,op4: op4, correct: correct},function(data){
					var current1=current;
					current=current.children('.btn-success');
					if(data.indexOf("Added")>-1)
					{
						current1.append("<br /><div class='panel-warning'>"+data+"</div>");
						current.attr('disabled','disabled');
						current.removeClass('btn-success');
						current.addClass("btn-default");
						current.css('box-shadow','none');
						c++;
						$('#counter').html(c);
						$('#total').html(parseInt($('#total').html())+1);
					}
					else
						current1.append("<br /><div class='panel-danger'>"+data+"</div>");

				});
  			}	  		
		});
	});
	$(document).on('click','.btn-success',function(){
		var current=$(this);
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
			current.parent().append("<br /><div class='panel-warning'>"+data+"</div>");
			if(data.indexOf("Added")>-1)
			{
				current.attr('disabled','disabled');
				current.removeClass('btn-success');
				current.addClass("btn-default");
				current.css('box-shadow','none');
				c++;
				$('#counter').html(c);
				$('#total').html(parseInt($('#total').html())+1);
			}
		});	
});

});
</script>
</body>
<?php




?>

</html>