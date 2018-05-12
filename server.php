<?php

//start session
session_start();

//check token already generated or not
if(empty($_SESSION['tokenkey']))
{
    //generate and set the token to the SESSION
    $_SESSION['tokenkey']=bin2hex(random_bytes(32));
    
}

//generate CSRF token
$token = sha1( $_SESSION['tokenkey']. $_SESSION['sessionId'].'IT16128200' );

$_SESSION['CSRF'] = $token; //store CSRF token in session variable

ob_start(); 

echo $token;


if(isset($_POST['submit']))
{
    ob_end_clean();
    
    //validate user login
    validate_login($_POST['CSRF'],$_COOKIE['session_id'],$_POST['user_name'],$_POST['user_pass']);

}


//login validation function
function validate_login($CSRF,$session_ID, $username, $password)
{
    if($username=="testuser" && $password=="testuserpass" && $CSRF==$_SESSION['CSRF'] && $session_ID== $_SESSION['sessionId'])
    {
        echo "<script> alert('Login Sucessful') </script>";
        echo "Login successful! welcome"."<br/>"; 
       
       
    }
    else
    {
        echo "<script> alert('Login Failed') </script>";
        echo "Login Failed ! "."<br/>";
        
    }
}


?>