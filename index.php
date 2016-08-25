<!DOCTYPE html>
<html>
<?php
session_start();
require_once "connection.php";
if(isset($_SESSION['uid']))
    header("Location: quiz.php");
if(isset($_POST['login']))
{
    $uid=$_POST['uid'];
    $password=md5($_POST['password']);
    if($ex=mysqli_query($con,"SELECT * from users WHERE uid='$uid' and password='$password'"))
    {
        $result=mysqli_fetch_assoc($ex);
        if((!empty($result)) && ($result['attempt']==0))
        {
            session_start();
            $_SESSION['uid']=$uid;
            $_SESSION['problem1']=0;
            $_SESSION['problem2']=0;
            $_SESSION['problem3']=0;
            $_SESSION['flag1']=false;
            $_SESSION['flag2']=false;
            $_SESSION['flag3']=false;
            $_SESSION['remaining']=3600; 
            $_SESSION['active']=false;
            $_SESSION['setno']=rand(1,3);
            //mysqli_query($con,"UPDATE users SET attempt='1' WHERE uid='$uid'");
            mkdir("submissions/".$uid);           
            header("Location: quiz.php");
        }
        else if($result['attempt']==1)
            echo "<script> alert('Sorry!! you have already attempted the contest \\nPlease wait for the results!!'); </script>";
        else 
            echo "<script> alert('Wrong user id or password \\n Please check again!!'); </script>";
    }
}
if(isset($_POST['register']))
{
    $uid=$_POST['uid'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $year=$_POST['year'];
    $crn=$_POST['crn'];
    $password=md5($_POST['password']);
    if(mysqli_query($con,"INSERT INTO users values('$uid','$name','$email','$year','$crn','$password',0,0)"))
        echo "<script>alert('Successfully registered!!'); </script>";
    else
        echo "<script>alert('Already registered..'); </script>";
}
?>
<head>
    <title>Quiz</title>

    <meta name="viewport" content="height=device-height,initial-scale=1.0">
    <script src="apstyle/js/apstyle.js"></script>
    <link rel="stylesheet" type="text/css" href="apstyle/css/main.css">
    <link rel="stylesheet" href="tabs.css">
   <!--  <nav class="nav">
        
        <button type="button" class="fold" data-fold="#topBar"></button>
        <div class="folded" id="topBar">
        <ul >
             <li class="nav-title"><img src="extra/logo.png" style='height: 50px; float: left;'></li>
            <li class="dropdown">
                <span style="color: white;"><a href="#" class="dropbtn" style="color: white;">Other Events</a></span>
                <div class="dropdown-content">
                    <span>Tech OOP</span>
                    <span>Codathon</span>
                    <span>Debate</span>
                </div>
            </li>
        </ul>
        </div>
    </nav> -->
    <style>
    .ip {
        border: 1.5px solid red important;
    }
    </style>
</head>
<body >

        <div class="col6" style="width: 40%;"></div>
        <div class="col4" style="margin: 10% auto;">
            <div class="panel-flat" >
                <center><h1 style="text-shadow: 5px 2px 5px gray;">LOGIN!</h1></center>
                <form method="POST" action="index.php">
                <div style=" position: relative;">
                <input type="text" required name="uid" class="input-text" placeholder="user id" style="padding-left: 42px;">
                <img src="extra/user.png" style="width: 30px; height: 30px; position: absolute;
                left: 15px; top: 2px;">
                </div>
                <div style=" position: relative;">
                <input type="password" class="input-text" required name="password" placeholder="password" style="padding-left: 42px;">
                <img src="extra/password.png" style="width: 30px; height: 30px; position: absolute;
                left: 15px; top: 2px;">
                </div>
                <center>
                <button type="submit" class="btn-flat-blue" name="login" style="margin-left: 15px;">LOGIN</button>
                <button type="button" class="btn-warning" data-show="#signup">REGISTER</button>
                </center>
                </form>
            </div>
        </div>
    
<div class="popup" id="signup">
        <div class="popup-content" style="margin-top: 5%; max-width: 400px;" tabindex="0">
            <div class="popup-head" style="background-color: #E9E4E1; color: black; border-bottom: 1px solid #A19F9D;">
                <span class="popup-close"><b>X</b></span>
                <center><h3>Register For TECH C 2k16</h3></center>
            </div>
            <div class="popup-body" style="margin-top: 0px; " >
                <form method="POST" action="index.php" style="margin-top: 10px;">
                <center>
                <table>
                <tr> <td>User Id</td>
                <td>
                <div style="display: inline-block; position: relative;">
                <input type="text" class="input-text" id="uid" class="ip tick-icon" name="uid" placeholder="User Id" required >
                <span style="position: absolute; top: 0; right: 5px;" id="exist"></span>
                </div>
                </td> 
                </tr>
                <tr> <td>User Name</td>
                <td>
                <input type="text" class="input-text" name="name" placeholder="User Name" required>
                </td><td></td>
                </tr>
                <tr><td>Email Id</td>
                <td>
                <input type="email" class="input-text" name="email" placeholder="Email Id" required>
                </td><td></td>
                </tr>
                <tr><td>Year</td>
                <td>
                
                <select class="select" name="year" placeholder="Year" required>
                    <option value="1">1st year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                </select>
                
                </td><td></td>
                </tr>
                <tr><td>Class Roll No</td>
                <td>
                <input type="text" name="crn" class="input-text" placeholder="Class Roll No" required>
                </td><td></td></tr>
                <tr><td>Password</td><td>
                <input type="password" name="password" class="input-text" placeholder="Password" required>
                </td><td></td>
                </tr>

                </table>
                <button type="submit" name="register" class="btn-flat-success">REGISTER</button>
                <button type="button" class="btn-flat-danger" data-close="#signup">CLOSE</button>
                </center>
                

            </div>
            <!-- <div class="popup-footer">
                
                </form>
            </div> -->
        </div>
</div>
<script>

$(document).ready(function(){
$('#uid').blur(function(){
    var val=$(this).val();
    $('#exist').html("<img src='extra/loading36.gif'style='height: 33px; width: 33px;'>");
    $.post('check.php',{uid:val},function(data){ 
        $('#exist').html(data);
    });
});

});

</script>
</body>
</html>