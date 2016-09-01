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
	<li style="padding: 0 0; "><h1 class='title' style="text-shadow: 3px 3px 2px gray; ;height: 100%; margin-top: 7px;">Admin Panel</h1></li>
	<li class="menu" onclick="location.href='admin.php';"><a href='admin.php'>Add Problem</li></a>
	<li class="menu" style='background-color: #464040; box-shadow: 0px -4px #f0ad4e inset;'><a href="edit.php">Show All Questions</a></li>
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
	#main{margin-top: 130px;  }
	.fixed { position: fixed; top: 10px; opacity: 1; left: 1px; }
	@media only screen and (max-width: 900px){
		.fixed { position: relative; top: 0; }
		#main { margin-top: 10px; }
	}
	</style>
</head>
<body>

	<div style="margin-left: 15px;  padding: 15px 15px; z-index: -1">
			<div class='panel fixed' style='background-color: white; display: inline-block; margin-top: 50px; border: 2px solid gray; width: 100%; '>
	<div style='float: right; margin-right: 10px; margin-top: 10px;'>
	<div style='float: right; margin-right: 10px; margin-top: 10px;'><b>Total Problems in database : </b> <span id="total">
	<?php
		$result=mysqli_query($con,"SELECT * FROM questions");
		$count=mysqli_num_rows($result);
		mysqli_free_result($result);
		echo $count;
	?>
	 </span> </div>
	</div>
	<button type="button" class='primary btn-flat-blue' id='save' style='margin-left: 30px; margin-top: 3px; '>Save All</button>
	<button type="button" class='primary btn-warning mark_all' style='margin-left: 5px; margin-top: 3px;'>Select/Deselect ALL</button>
	<button type="button" class='primary btn-flat-danger delete_marked' style='margin-left: 5px; margin-top: 3px;'>DELETE MARKED</button>
	</div>
	<div id="main" style='box-shadow: 1px 0px 10px gray;  display: block;'>
		<?php
			$query=mysqli_query($con,"SELECT * from questions");
			$i=1;
			while($result=mysqli_fetch_assoc($query))
			{
				$s1=""; $s2=""; $s3="";$s4="";
				if($result['correct']==1) $s1="selected='selected'";
				if($result['correct']==2) $s2="selected='selected'";
				if($result['correct']==3) $s3="selected='selected'";
				if($result['correct']==4) $s4="selected='selected'";
				$qs=str_replace('&nbsp;', ' ', $result['question']);
				$qs=str_replace("<br />", "", $qs);
				echo "<div class='panel-light' style='box-shadow: none;'>";
				echo "<b><span class='problem_no'>$i</span>)</b>"; $i++;
				echo "<input type='checkbox' class='mark_deleted'>(Mark to delete)";
				echo "<input type=hidden value='".$result['id']."' class='problem_id'>";
				echo "<textarea class='question input-text'>".$qs."</textarea>";
				echo "<textarea class='op1 input-text opt'>".str_replace("<br />","",str_replace('&nbsp;',' ',$result['op1']))."</textarea>";
				echo "<textarea class='op2 input-text opt'>".str_replace("<br />","",str_replace('&nbsp;',' ',$result['op2']))."</textarea>";
				echo "<textarea class='op3 input-text opt'>".str_replace("<br />","",str_replace('&nbsp;',' ',$result['op3']))."</textarea>";
				echo "<textarea class='op4 input-text opt'>".str_replace("<br />","",str_replace('&nbsp;',' ',$result['op4']))."</textarea>";
				echo "<br /><span><b>Correct Option : </b> <span class='current-correct'>".$result['correct']."</span></span>";
				echo "<b> Change Correct Option to : </b> ";
				echo "<select class='select correct' style='width: 80px;'>
				 	  <option value='1' $s1>1</option><option value='2' $s2>2</option><option value='3' $s3>3</option><option value='4' $s4>4</option></select>";
				echo "<button type='button' class='btn-success' style='box-shadow: none; margin-left: 5px;'>UPDATE</button>";
				echo "<button type='button' class='reddish del' style='margin-left: 5px; box-shadow: none;'>REMOVE</button>";
				echo "</div><br /><br />";
			}
			mysqli_free_result($query);
		?>
		</div>
	</div>
	</div>
<script>
var flag=false;
$(function(){
	$('.btn-success').click(function(){
		var id=$(this).parent().find('.problem_id').val();
		var q=$(this).parent().find('.question').val();
	  	var op1=$(this).parent().find('.op1').val();
	  	var op2=$(this).parent().find('.op2').val();
	  	var op3=$(this).parent().find('.op3').val();
	  	var op4=$(this).parent().find('.op4').val();
	  	var correct=$(this).parent().find('select').val();
	  	var current=$(this);
	  	var ask=confirm("Are you sure want to update?");
	  	if(ask){
		 $.post("sessioncontrol.php",{ edit: "edit",id: id,q: q, op1: op1, op2: op2,op3: op3,op4: op4, correct: correct},function(data){
		 	alert(data);
		 	current.parent().find('.current-correct').html(correct);
		 });	
		}
	});
	$('.del').on('click',function(){ 
		var current=$(this).parent();
		var id=$(this).parent().find('.problem_id').val();
		var ask=confirm("Are you sure want to delete this problem?");
		if(ask)
		{
		$.post("sessioncontrol.php",{ delete: "delete",id: id},function(data){ 
			if(data.indexOf("successfully")>-1)
			{
				alert("Problem deleted successfully");
				current.remove();
				$('#total').html(parseInt($('#total').html())-1);
				sort();
			}
		});
	}
	
	});
	$('.mark_all').on('click',function(){ 
		if(flag==false) {
		$('#main').find('.mark_deleted').prop('checked',true);
		flag=true;
		}
		else { $('#main').find('.mark_deleted').prop('checked',false);
		flag=false;}

	});
	$('#save').on('click',function(){
		var count=0;
		$('#main').find('.panel-light').each(function()
		{
			count++;
			var id=$(this).find('.problem_id').val();
			var q=$(this).find('.question').val();
	  		var op1=$(this).find('.op1').val();
	  		var op2=$(this).find('.op2').val();
	  		var op3=$(this).find('.op3').val();
	  		var op4=$(this).find('.op4').val();
	  		var current=$(this);
	  		var correct=$(this).find('select').val();
	  		$.post("sessioncontrol.php",{ edit: "edit",id: id,q: q, op1: op1, op2: op2,op3: op3,op4: op4, correct: correct},function(data){
		 	current.find('.current-correct').html(correct);
		 });	
		} );
		alert(count+" Items saved");
	});
	$('.delete_marked').on('click',function(){
		var count=0;
		var ask=confirm("Are you sure want to delete all selected questions?");
		if(ask){
			$('#main').find('input[type=checkbox]:checked').each(function()
			{
				count++;
				var id=$(this).parent().find('.problem_id').val();
				var current=$(this).parent();
				$.post("sessioncontrol.php",{ delete: "delete",id: id},function(data){ 
					if(data.indexOf("successfully")>-1)
					{
						current.remove();
						$('#total').html(parseInt($('#total').html())-1);
					}
				});
			});
		alert(count+" questions deleted successfully!");
		sort();
		}
	});
	sort();
		function sort()
	{
		var counter=1;
		$('#main').children('.panel-light').each(function(){
			$(this).find('.problem_no').html(counter);
			counter++;
		});
		
	}

});

</script>
</body>
</html>
