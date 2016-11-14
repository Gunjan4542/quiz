<!DOCTYPE html>
<html>
<head>
<script src="apstyle/js/apstyle.js"></script>
<?php
session_name("techc");
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
        if($result['active']==1)
        {
            echo "<script> alert('You are already logged in from other browser or machine'); </script>";
        }
        else
        if((!empty($result)) && ($result['attempt']==0))
        {
            //session_start();
            $_SESSION['uid']=$uid;
            $_SESSION['remaining']=3600; 
            $_SESSION['active']=false;
            $_SESSION['setno']=rand(1,3);
            $client_ip=$_SERVER['REMOTE_ADDR'];
            mysqli_query($con,"UPDATE users SET active='1' WHERE uid='$uid'");
            mysqli_query($con,"UPDATE users SET ip='$client_ip' WHERE uid='$uid'");         
            header("Location: quiz.php");
        }
        else if($result['attempt']==1)
            echo "<script> alert('Sorry!! you have already attempted the contest \\nPlease wait for the results!!'); </script>";
        else 
            echo "<script> alert('Wrong user id or password \\n Please check again!!'); </script>";
?>
<script>
    $(function(){ 
        $('#log').show();
    });
</script>
<?php
    }
}
if(isset($_POST['register']))
{
    $uid=$_POST['uid'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $year=$_POST['year'];
    $crn=$_POST['crn'];
    $contact=$_POST['contact'];
    $password=md5($_POST['password']);
    if(mysqli_query($con,"INSERT INTO users values('$uid','$name','$email','$contact','$year','$crn','$password',0,0,0,0,'')"))
        echo "<script>alert('Successfully registered!!'); </script>";
    else
        echo "<script>alert('Already registered..'); </script>";
}
?>

    <title>Quiz</title>

    <meta name="viewport" content="height=device-height,initial-scale=1.0">
    
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
    .btn-default { background-color: lightgray; box-shadow: none; padding: 12px 12px; }
    #log
    {
        display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,.7); /* Black w/ opacity */
    display: none;
    }
    body { background-image: url('extra/pic1.jpg');
            background-size: cover; background-position: -300px -10px; overflow: hidden; }
    @media only screen and (max-width: 1200px){
    body{ background-image: none !important;  }
    #log{ display: block !important; }

    }
    .popup { overflow-y: hidden !important; }
    </style>
</head>
<body >

        <button type="button" class="btn-flat-danger" style="position: absolute; top: 540px; left: 500px; " 
        onclick="$('#log').fadeIn('slow');">Click Here »</button>
        
        
        <div id="log" class="log">
        <div class="col6" style="width: 40%; position: relative;"></div>
        <div class="col4" style="margin: 10% auto;  position: relative;" >

            <div class="panel-flat" style="border-left: 4px solid #670766; background-color: white; box-shadow: 2px 2px 10px 2px black; " id="login_block">
                <span style="font-weight: bold; float: right; padding: 5px 5px; color: darkgray; font-family: arial; font-size: 24px; cursor: pointer;" id="expand" onclick="$('#log').fadeOut('slow')">X</span>
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
                <button type="button" class="btn-flat-danger" data-show="#signup">REGISTER</button>
                </center>
                </form>
            </div>
        </div>
        </div>
    
<div class="popup" id="signup">
        <div class="popup-content" style="margin-top: 5%; max-width: 450px;" tabindex="0">
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
                <tr><td>Contact No</td>
                <td>
                <input type="text" class="input-text" maxlength="10" name="contact" placeholder="Contact No" required>
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
                <input type="password" name="password" class="input-text" placeholder="Password" id="pwdd" required>
                </td><td></td>
                               <tr><td>
                    <div style="display: inline-block; position: relative;">
                    Confirm Password</td><td>
                <input type="password" name="confirm" class="input-text" id="confirm_password" placeholder="Confirm Password" required>
                </td><td></td>
                </tr>

                </table>
                <button type="submit" name="register" class="btn-flat-success" id="register_btn">REGISTER</button>
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
$(document).on('keydown', '#confirm_password', function(e) {
    if (e.keyCode == 32) return false;
});
$(document).on('keydown', 'input[type=password]', function(e) {
    if (e.keyCode == 32) return false;
});
$('#confirm_password').on('keyup',function(){
        var x=$(this).val();
        var y=$("#pwdd").val();
        if(x==y)
        {
            $('#register_btn').removeAttr('disabled','disabled');
            $('#register_btn').removeClass('btn-default');
        }
        else
        {
            $('#register_btn').attr('disabled','disabled');
            $('#register_btn').addClass('btn-default');
        }
        });
$('#confirm_password').blur(function(){ 
    var x=$(this).val();
        var y=$("#pwdd").val();
        if(x==y)
        {
            $('#register_btn').removeAttr('disabled','disabled');
            $('#register_btn').removeClass('btn-default');
        }
        else
        {
            $('#register_btn').attr('disabled','disabled');
            $('#register_btn').addClass('btn-default');
        }
});
$('#pwdd').blur(function(){ 
    var x=$(this).val();
        var y=$("#confirm_password").val();
        if(x==y)
        {
            $('#register_btn').removeAttr('disabled','disabled');
            $('#register_btn').removeClass('btn-default');
        }
        else
        {
            $('#register_btn').attr('disabled','disabled');
            $('#register_btn').addClass('btn-default');
        }
});
});

</script>
</body>
</html>