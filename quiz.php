<!DOCTYPE html>
<html>
<?php
require_once "connection.php";
session_start();
if(isset($_POST['logout'])){
	session_destroy(); 
	header('Location: index.php');
}
if(!isset($_SESSION['uid']))
	header('Location: index.php');

?>

<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="height=device-height,initial-scale=1.0">
    <script src="apstyle/js/apstyle.js"></script>
    <link rel="stylesheet" type="text/css" href="apstyle/css/main.css">
    <link rel="stylesheet" type="text/css" href="tabs.css">
    <script src="script.js"></script>
    <style>
    	.pageno
{
    box-shadow: 0 0 10px gray;
  padding:  10px 15px;
  border-radius: 50%;
  cursor: pointer;
  float: left;
  margin-left: 5px;
}
.page-active { background-color: #defefa; }
.pageno:hover
{
  background-color: #defefa;;
}
    </style>
</head>
<body>
<?php

	/* $list=array(array("Who is the creator of C Language?","Bjarne Stroustrup","Dennis Ritche","Bill Gates","Roger Von Hussy",2),
		array("Who is the creator of C++ Language?","Bjarne Stroustrup","Dennis Ritche","Bill Gates","Roger Von Hussy",1),
		array("Which one of this is a functional programming language?","C++","JAVA","Python","Huskell",4),
		array("Who is one of the founder of Apple?","William Gates","Mark Zuckerberg","steve wozniak","Andre Pulton",3),
		array("Who is the creator of JAVA","James Gosling","Dennis Ritchie","Bill Gates","Andrew Gill",1)

		); */
	if(isset($_POST['submit']))
	{
		?>
<script>
$(function(){

		$('#start').attr('disabled','disable');
	$('#start').removeClass("btn-success");
	$('#start').addClass("btn-default");
	$("#main").hide();
});
</script>
<?php
		$score=0;
		
		$_SESSION['active']="done";
		echo "<div class='panel-warning' style='box-shadow: 1px 0px 10px gray;
		margin-top: 50px; margin-left: 30px; float: left;'>";
		echo "<span class='panel-close'>X</span>";
		$_SESSION['flag']++;

		for($i=0;$i<10;$i++)
		{
			$no=$i;
			if(isset($_POST[$no]))
			{
				$ans=$_POST[$no];
				echo "Question ".($i+1).": ".$ans.",";

				if($ans==$_SESSION['list'][$i][5])
				{
					echo "<b> Corrent Answer </b><br />";
					$score+=2;
				}
				else
				{
					echo "<b> Wrong Answer </b><br />";
					$score-=1;
				}
			}
			else
				echo "Question ".($i+1).": Not Attempted<br />";
		}
		$id=$_SESSION['uid'];
		mysqli_query($con,"UPDATE users SET score='$score' WHERE uid='$id'");
		echo "<h1 style='color: green;'>Your Score is : $score/20 </h1>";
		echo "</div>";
		
	}
?>
<div class="panel-right panel-flat" style="box-shadow: none; background-color: white; border-left: 1px solid lightgray;">
<div style="border-radius: 10px; border: 1px solid lightgray; box-shadow: 0px 2px 1px gray;">
<center>
		<img src="extra/account.png" style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid darkgray; "><br />
		<b style="font-family: arial; font-size: 24px;"> <?php echo $_SESSION['uid']; ?> </b>
</center>
<form method="post" action="quiz.php">
<button type="submit" name="logout" class="btn-flat-blue fulldock" style="padding: 5px 5px; box-shadow: none;">
<img src="extra/logout.png" style="height: 20px; width: 20px;">
logout</button>
<br /> <br />
</form>
</div>
<br /><br />
<div class="panel-light" style="background-color: white; box-shadow: none; color: black; border: none;" >
		<div style="border-radius: 10px; border: 1px solid lightgray; box-shadow: 0px 2px 1px gray;">
		<center>
		<h1> Time Left  </h1><hr /><h1 id="time">10:00 </h1>
		</center>
		</div>
		<br />
		<center>
		<button type="button" id="start" class="btn-success fulldock" style="border: none; ">START</button>
		</center>
		</div>
	
		<!-- <div class="panel-warning" style="background-color: #333; color: white; ">
		 <h2>SCORE: <span id="score">0pts </span></h2> 
		
		</div>  -->

</div>
<div class="popup" id="over" style="z-index: 99;">
 <div class="popup-content" style="margin-top: 5%; max-width: 400px;" tabindex="0">
            <div class="popup-head" style="background-color: #E9E4E1; color: black; border-bottom: 1px solid #A19F9D;">
                <span class="popup-close"><b>X</b></span>
                <center><h3>MESSAGE</h3></center>
            </div>
            <div class="popup-body" style="margin-top: 0px; " >
            	Thanks for your participation...
            	<br />
                <button style="float: right;" type="button" class="btn-flat-danger" data-close="#over">CLOSE</button>

                </center>

            </div>
  </div>
</div>
<form method="post" action="quiz.php">
<?php
$prefix="question";
echo "<div id='main' class='tabcontent' style='box-shadow: 1px 0px 10px gray;margin-top: 50px; max-width: 900px; margin-bottom: 30px; display: none;'>";
echo "<div id='page1' class='page'>";
echo "<h1>Page 1</h1>";
for($i=0;$i<5;$i++)
{
	$name=$i;
	echo "<div class='panel-flat' style='float: none; display: block; margin-top: 10px; margin-left: 10px; box-shadow: none;'>";
	echo "<b>". ($i+1).") ".$_SESSION['list'][$i][0]." </b><br/ >";
	echo "<input type=radio name=$name value=1 > ".$_SESSION['list'][$i][1];
	echo "<br /><input type=radio name=$name value=2 > ".$_SESSION['list'][$i][2];
	echo "<br /><input type=radio name=$name value=3 > ".$_SESSION['list'][$i][3];
	echo "<br /><input type=radio name=$name value=4 > ".$_SESSION['list'][$i][4];
	echo "<button class='reddish undo' type='button' data-clear=$name>UNDO</button>";
	echo "</div>";

}
echo "</div>";
/* ---------------- page 2 */
echo "<div id='page2' class='page' style='display: none;'>";
echo "<h1> Page 2</h1>";
for($i=5;$i<10;$i++)
{
	$name=$i;
	echo "<div class='panel-flat' style='float: none; display: block; margin-top: 10px; margin-left: 10px; box-shadow: none;'>";
	echo "<b>". ($i+1).") ".$_SESSION['list'][$i][0]." </b><br/ >";
	echo "<input type=radio name=$name value=1> ".$_SESSION['list'][$i][1];
	echo "<br /><input type=radio name=$name value=2> ".$_SESSION['list'][$i][2];
	echo "<br /><input type=radio name=$name value=3> ".$_SESSION['list'][$i][3];
	echo "<br /><input type=radio name=$name value=4> ".$_SESSION['list'][$i][4];
	echo "<button class='reddish undo' type='button' data-clear=$name>UNDO</button>";
	echo "</div>";

}
echo "</div>";


/*---------- */

echo "<div><br />";
echo "<span class='pageno page-active' data-show='#page1'> 1 </span>";
echo "<span class='pageno' data-show='#page2'> 2 </span>";
echo "<span class='pageno'> 3 </span>";
echo "<span class='pageno'> 4 </span>";
echo "</div>";
echo '<button type="button" style="margin-left: 40%;" class="btn-flat-success" id="ready_submit" data-show="#warning">SUBMIT</button>';
echo "</div>";
?>

<div class="popup" id="warning" style="z-index: 999999;">
 <div class="popup-content" style="margin-top: 5%; max-width: 400px;" tabindex="0">
            <div class="popup-head" style="background-color: #E9E4E1; color: black; border-bottom: 1px solid #A19F9D;">
                <span class="popup-close"><b>X</b></span>
                <center><h3>Please Read Before Final Submission</h3></center>
            </div>
            <div class="popup-body" style="margin-top: 0px; " id="submission_status">

            </div>
            <div class="popup-footer">
            	<center>
                <button type="submit" name="submit" class="btn-flat-success" id="submit">FINISH</button>
                <button type="button" class="btn-flat-danger" data-close="#warning">CLOSE</button>
                </center>
                </center>
         </form>  

            </div>
  </div>
</div>

<!-- attempted message -- >

<!-- end of message -->


<script>
	$(function(){
		$('#start').click(function(){
		    $(this).attr('disabled','disabled');
		    $(this).removeClass("btn-success");
		    $(this).addClass("btn-default");
		    $('#start').css('box-shadow','none');
		    $('#main').slideDown();
		    $.post("sessioncontrol.php",{set_active: "Active"},function(data){
		    	
		    });
		    setInterval(countdown,1000);
		    location.reload();
		    //setInterval(getScore,1000);
		});
		$('.undo').click(function(){
			$(this).parent().children('input:radio').each(function () {
        		$(this).removeAttr("checked");

    	});

		});
		$('.pageno').click(function(){
			$('#page1').hide();
			$('#page2').hide();
			$('#page3').hide();
			$('#page4').hide();
			$('.page-active').removeClass('page-active');
			$(this).addClass('page-active');
			$($(this).attr('data-show')).show();
		});
		$('#ready_submit').click(function(){
			var prefix="question";
			$('#submission_status').html("<b>Attempted Questions : </b>");
			// for(var i=0;i<10;i++)
			// {
			// 	var n=prefix+i;
			// 	var value=$("input:radio[name="+n+"]").val();
			// 	$('#submission_status').append(value+"<br />");
			// }
			// $(':radio:checked').each(function(){
			// 	var value=$(this).val();
		 //   		$('#submission_status').append(value+"<br />");
			// });
			var i=1;
			$(":radio:checked").each(function(){
				var no=parseInt($(this).attr("name"))+1;
  				$('#submission_status').append("<span style='display: inline-block; width: 17px; height: 17px; margin-top: 5px;padding: 3px 4px; border-radius: 50%; border: 1px solid lightgray;'>"+no+"</span>,");
			});
		});
	});

</script>

<?php
	if($_SESSION['active']===true)
	{
?>
<script>
$('#main').slideDown('slow');
$.post("sessioncontrol.php",{gettime: "Active"},function(data){
				var time_in_second=600; // add your desired time in seconds
				var time=time_in_second-data;
		     	m=Math.floor(time/60);
				 s=time%60;
		    });
	$('#start').attr('disabled','disable');
	$('#start').removeClass("btn-success");
	$('#start').addClass("btn-default");
	$('#start').css('box-shadow','none');
	setInterval(countdown,1000);
	//setInterval(getScore,1000);
</script>
	<?php
}
if(isset($_SESSION['flag']) and ($_SESSION['flag']>=1) )
{
	?>
<script>
$(function(){ 
	$('#start').attr('disabled','disable');
	$('#start').removeClass("btn-success");
	$('#start').addClass("btn-default");
	$('#start').css('box-shadow','none');
	$('#over').show();
	$("#main").hide();
	$("#time").html("DONE");

});

</script>
<?php	
}
?>
</body>
</html>
