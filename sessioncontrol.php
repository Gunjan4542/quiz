<?php
session_name("techc");
session_start();
require_once "connection.php";
if(isset($_POST['set_active']))
{
	$_SESSION['list']=array();
	$query=mysqli_query($con,"SELECT question,op1,op2,op3,op4,correct FROM questions ORDER BY rand() LIMIT 10");
	while($arr=mysqli_fetch_array($query))
	{
		array_push($_SESSION['list'], $arr);
	}
	$_SESSION['flag']=0;
	$_SESSION['active']=true;
	$_SESSION['start']=time();
	//$_SESSION['list']=$list;
echo $_SESSION['active'];
}
if(isset($_POST['gettime']))
{
	echo time()-$_SESSION['start'];
}
if(isset($_POST['addproblem']))
{
	$question=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$_POST['q'])));
	$op1=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$_POST['op1'])));
	$op2=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$_POST['op2'])));
	$op3=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$_POST['op3'])));
	$op4=mysqli_real_escape_string($con,nl2br(str_replace(' ', '&nbsp;',$_POST['op4'])));
	$correct=$_POST['correct'];
	if(empty($question) or empty($op1) or empty($op2) or empty($op3) or empty($op4))
		die("Please Fill All the fields");
	if(mysqli_query($con,"INSERT INTO questions(question, op1, op2,op3,op4,correct) VALUES('$question','$op1','$op2','$op3','$op4','$correct')"))
		echo "<b style='color: green; '>Problem Added</b>";
	else
		echo "<b style='color: #a94442;'>Unable to add problem </b>";
}

?>