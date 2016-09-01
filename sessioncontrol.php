<?php
session_name("techc");
session_start();
require_once "connection.php";
if(isset($_POST['set_active']))
{
	$_SESSION['list']=array();

	$query=mysqli_query($con,"SELECT question,op1,op2,op3,op4,correct FROM questions ORDER BY rand() LIMIT 13");
	while($arr=mysqli_fetch_array($query))
	{
		// $arr[0]=str_replace(">", '&gt; ',$arr[0]);
		array_push($_SESSION['list'], $arr);
	}
	$_SESSION['flag']=0;
	$_SESSION['active']=true;
	$_SESSION['start']=time();
	//$_SESSION['list']=$list;

	echo $_SESSION['active'];
	$time=$_SESSION['start'];
	$id=$_SESSION['uid'];
	mysqli_query($con,"UPDATE users SET start='$time' WHERE uid='$id'");
}
if(isset($_POST['gettime']))
{
	echo time()-$_SESSION['start'];
}
if(isset($_POST['addproblem']))
{
	$question=htmlspecialchars( $_POST['q']);
	$op1=htmlspecialchars($_POST['op1']);
	$op2=htmlspecialchars($_POST['op2']);
	$op3=htmlspecialchars($_POST['op3']);
	$op4=htmlspecialchars($_POST['op4']);
	$question=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$question)));
	$op1=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$op1)));
	$op2=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$op2)));
	$op3=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$op3)));
	$op4=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$op4)));
	$correct=$_POST['correct'];
	if(empty($question) or empty($op1) or empty($op2) or empty($op3) or empty($op4))
		die("Please Fill All the fields");
	if(mysqli_query($con,"INSERT INTO questions(question, op1, op2,op3,op4,correct) VALUES('$question','$op1','$op2','$op3','$op4','$correct')"))
		echo "<span class='panel-warning'><b style='color: green; '>Problem Added</b></span>";
	else
		echo "<span class=panel-danger><b style='color: #a94442;'>Unable to add problem </b></span>";
}
if(isset($_POST['edit']))
{
	$id=$_POST['id'];
	$question=htmlspecialchars( $_POST['q']);
	$op1=htmlspecialchars($_POST['op1']);
	$op2=htmlspecialchars($_POST['op2']);
	$op3=htmlspecialchars($_POST['op3']);
	$op4=htmlspecialchars($_POST['op4']);
	$question=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$question)));
	$op1=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$op1)));
	$op2=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$op2)));
	$op3=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$op3)));
	$op4=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$op4)));
	$correct=$_POST['correct'];
	if(empty($question) or empty($op1) or empty($op2) or empty($op3) or empty($op4))
		die("Please Fill All the fields");
	if(mysqli_query($con,"UPDATE questions SET question='$question',op1='$op1',op2='$op2',op3='$op3',op4='$op4',correct='$correct' WHERE id='$id'"))
		echo "Problem Updated";
	else
		echo "Unable to update problem";
}
if(isset($_POST['delete']))
{
	$id=$_POST['id'];
	if(mysqli_query($con,"DELETE FROM questions WHERE id='$id'"))
		echo "Problem deleted successfully";
	else
		echo "Unable to delete problem";
}
?>