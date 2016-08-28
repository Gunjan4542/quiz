<!DOCTYPE html>
<html>
<?php
require_once "connection.php";
$no_of_problems=13;
session_name("techc");
session_start();
if(isset($_POST['logout'])){
	$uid=$_SESSION['uid'];
	mysqli_query($con,"UPDATE users SET active='0' WHERE uid='$uid'");
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
.panelcurrent
{
  background-color: #77F38C;
  word-wrap: break-word;
}
.un
{	background-color: #f2dede;
word-wrap: break-word; }
    </style>

</head>
<body>
<?php
	if(isset($_POST['submit']))
	{
		?>
<script>
$(function(){
	$('.logmeOut').removeAttr('disabled','disabled');
	$('.logmeOut').removeClass('btn-default');
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
		 margin : 100px auto; width: 650px; '>";
		echo "<span class='panel-close'>X</span>";
		$_SESSION['flag']++;

		for($i=0;$i<$no_of_problems;$i++)
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
		mysqli_query($con,"UPDATE users SET attempt='1' WHERE uid='$id'");
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
<button type="submit" name="logout" class="logmeOut btn-flat-blue fulldock" onclick="localStorage.clear();" style="padding: 5px 5px; box-shadow: none;">
<img src="extra/logout.png" style="height: 20px; width: 20px;">
logout</button>
<br /> 
</form>
</div>
<br />
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
<div id="jump" style="display: none; overflow: scroll;">
<div style="border-radius: 10px; border: 1px solid lightgray; box-shadow: 0px 2px 1px gray; height: 360px;
 " >
<b>Jump To Question : </b>
<br />
<?php
	for($i=0;$i<30;$i++)
		echo "<a href=#$i class='jump_me'><span style='display: inline-block; width: 21px; height: 21px; margin-top: 5px;padding: 5px 4px; border-radius: 50%; border: 1px solid lightgray; border: 1px solid lightgray margin-left: 3px; margin-right: 3px; cursor: pointer;'>".($i+1)."</span></a>";
?>
<button type="button" class="btn-success fulldock" style="box-shadow: none;" onclick="$('#ready_submit').click();">STATUS</button>
</div>
</div>
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
for($i=0;$i<$no_of_problems;$i++)
{
	$name=$i;
	echo "<div class='panel-flat' style='float: none; display: block; margin-top: 10px; margin-left: 10px; box-shadow: none;' id=$i>";
	echo "<b>". ($i+1).") ".$_SESSION['list'][$i][0]." </b><br/ >";
	echo "<input type=radio name=$name value=1 class='opt1'> ".$_SESSION['list'][$i][1];
	echo "<br /><input type=radio name=$name value=2 class='opt2'> ".$_SESSION['list'][$i][2];
	echo "<br /><input type=radio name=$name value=3 class='opt3'> ".$_SESSION['list'][$i][3];
	echo "<br /><input type=radio name=$name value=4 class='opt4'> ".$_SESSION['list'][$i][4];
	echo "<button class='reddish undo' type='button' data-clear=$name>UNDO</button>";
	echo "</div>";

}
echo "</div>";
/* ---------------- page 2 */
// echo "<div id='page2' class='page' style='display: none;'>";
// echo "<h1> Page 2</h1>";
// for($i=5;$i<10;$i++)
// {
// 	$name=$i;
// 	echo "<div class='panel-flat' style='float: none; display: block; margin-top: 10px; margin-left: 10px; box-shadow: none;' id=$i>";
// 	echo "<b>". ($i+1).") ".$_SESSION['list'][$i][0]." </b><br/ >";
// 	echo "<input type=radio name=$name value=1> ".$_SESSION['list'][$i][1];
// 	echo "<br /><input type=radio name=$name value=2> ".$_SESSION['list'][$i][2];
// 	echo "<br /><input type=radio name=$name value=3> ".$_SESSION['list'][$i][3];
// 	echo "<br /><input type=radio name=$name value=4> ".$_SESSION['list'][$i][4];
// 	echo "<button class='reddish undo' type='button' data-clear=$name>UNDO</button>";
// 	echo "</div>";

// }
// echo "</div>";


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
		    $('.logmeOut').attr('disabled','disabled');
			$('.logmeOut').addClass('btn-default');
			$('.logmeOut').css('box-shadow','none');
		    $(this).removeClass("btn-success");
		    $(this).addClass("btn-default");
		    $('#start').css('box-shadow','none');
		    $('#main').slideDown();
		    $('#jump').show();
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
			var id='#'+$(this).parent().attr('id');
			localStorage[id] = null;
		});
		$('.jump_me').on("click",function(){ 
			$('.jump_me').children('span').css('background-color','white');
			$(this).children('span').css('background-color','#defefa;');
			$('#main .panel-flat').removeClass('panelcurrent');
			$('#main .panel-flat').removeClass('un');
			var id=$(this).attr('href');
			$(id).addClass('panelcurrent');
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
			var arr=[];
			for(var i=0;i<13;i++)
			{
				arr.push(false);
			}
			$(":radio:checked").each(function(){
				var no=parseInt($(this).attr("name"))+1;
  				$('#submission_status').append("<a class='goto' href=#"+(no-1)+" <span style='display: inline-block; width: 17px; height: 17px; margin-top: 5px;padding: 3px 4px; border-radius: 50%; border: 1px solid lightgray;'>"+no+"</span></a>,");
  				arr[no-1]=true;
			});
			$('#submission_status').append("<br /><b>Not Attempted : </b>");
			for(var i=0;i<13;i++)
			{ 
				if(!arr[i])
				{
					$("input[name="+i+"]").parent().addClass('un');
					$('#submission_status').append("<a href=#"+i+"><span style='display: inline-block; width: 17px; height: 17px; margin-top: 5px;padding: 3px 4px; border-radius: 50%; border: 1px solid lightgray;'>"+(i+1)+"</span></a>,");
				}
				else 
					$("input[name="+i+"]").parent().removeClass('un');
			}
		});
		 $( '#submission_status' ).on( 'click', 'a', function () { 
		 	$('.panel-flat').css('border','none');
		 	$($(this).attr('href')).css('border','3px solid green');
		 });
		 $(':radio').on('click',function(){
		 	var id="#"+$(this).parent().attr('id');
		 	localStorage[id] = $(this).attr('class');
		 });
		 for(var i=0;i<13;i++)
		 {
		 	var id="#"+i;
		 	$(id).find("."+localStorage[id]).attr('checked','checked');
		 }
	});

</script>

<?php
	if($_SESSION['active']===true)
	{
?>
<script>
$('#main').show();
$('#jump').show();
$('.logmeOut').attr('disabled','disabled');
$('.logmeOut').addClass('btn-default');
$('.logmeOut').css('box-shadow','none');

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
