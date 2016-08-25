<?php
session_start();
require_once "connection.php";
if(isset($_POST['set_active']))
{
	/* $list=array(array("Who is the creator of C Language?","Bjarne Stroustrup","Dennis Ritche","Bill Gates","Roger Von Hussy",2),
		array("Who is the creator of C++ Language?","Bjarne Stroustrup","Dennis Ritche","Bill Gates","Roger Von Hussy",1),
		array("Which one of this is a functional programming language?","C++","JAVA","Python","Huskell",4),
		array("Who is one of the founder of Apple?","William Gates","Mark Zuckerberg","steve wozniak","Andre Pulton",3),
		array("Who is the creator of JAVA","James Gosling","Dennis Ritchie","Bill Gates","Andrew Gill",1)

		); */
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
	$op1=mysqli_real_escape_string($con,$_POST['op1']);
	$op2=mysqli_real_escape_string($con,$_POST['op2']);
	$op3=mysqli_real_escape_string($con,$_POST['op3']);
	$op4=mysqli_real_escape_string($con,$_POST['op4']);
	$correct=$_POST['correct'];
	if(empty($question) or empty($op1) or empty($op2) or empty($op3) or empty($op4))
		die("Please Fill All the fields");
	if(mysqli_query($con,"INSERT INTO questions(question, op1, op2,op3,op4,correct) VALUES('$question','$op1','$op2','$op3','$op4','$correct')"))
		echo "Problem Added";
	else
		echo "Unable to add problem";
}

?>