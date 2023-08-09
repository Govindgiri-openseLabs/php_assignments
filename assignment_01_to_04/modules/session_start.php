<?php
   session_start(); 
   // set start time of session
   setcookie('start_time',time(),0,'/');
   
   // check profile percentage
   $email=$_SESSION['email'];
   include('../connections/mysql_connection.php');
   include('../connections/check_profile_complete.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style='width:100%;height:100%;border:1px black solid;text-align:center'>
       <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"> 
        <h1>session start</h1>
        <h2>Welcome</h2>
        <h3><?php echo $_SESSION['name'];   ?></h3>
        <button name="action" type="submit" value="profile"style="background-color:#74fd04;color:grey">Profile </button>
        <button name="action" type="submit" value="back"style="background-color:#0292f3;color:white" >Back</button>
        <button name="action" type="submit" value="log_out"style="background-color:#f38908;color:white" >Log out</button> <br><br>
        <!-- <div style="border:1px black solid;background-color:orange;text-alien:center;position:relative;width:100%"><span style="position:relative;background-color:green;width:1%">%</span></div>
     -->  <span> <?php  echo $percentage*10,"%";  ?></span>
     <progress  value="<?php  echo $percentage*10;  ?>" max="100"></progress>
       </form>  
    </div>
</body>
</html>



<?php

$email=$_SESSION['email'];


if($_SERVER['REQUEST_METHOD']=='POST')
    { 
     
    // check time for real time of session expire
       $start_time=$_COOKIE['start_time'];
       if(time()-$start_time>=120)
         {
            header("Location:http://localhost/assignment_01_to_04/index.php");
            exit();
         }     
     // operations on session page   
      $action=$_POST['action'];
      if($action=='log_out')    
       header("Location:http://localhost/assignment_01_to_04/index.php");
      else
      {  // set cookies
          setcookie('email',$email, time() +120, '/');
         
         if($action=='back')
            header("Location:http://localhost/assignment_01_to_04/index.php");
         else
           header("Location:http://localhost/assignment_01_to_04/modules/user_profile.php"); 
      }

    }

?>