
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index.css">
</head>
<body>

<h2>Login Form</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
   <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <button type="submit"name="submit">Login</button>
  </div>
</form>


<?php 
session_start();

// check cookies

if (isset($_COOKIE['email'])) {

  $email = $_COOKIE['email'];
  $_SESSION['name']=$mysql_name;
  $_SESSION['email']=$email;
  header("Location:http://localhost/assignment_01_to_04/modules/session_start.php");
  exit();
} 

// login manually
                 
if($_SERVER['REQUEST_METHOD']=='POST')
{ 
  // session start for store data
  
  // ui data  
   $email=$_POST['email'];
   $user_password=$_POST['password'];   

  include ('../connections/mysql_connection.php');
  include ('../connections/get_data_mysql.php');
  
  // verify user
  $mysql_password=""; 
  $mysql_name="";
if($user_data->num_rows)
  {
    while ($row = $user_data->fetch_object()) {
        $mysql_password=$row->password;
        $mysql_name=$row->name;
    }
   
    if($user_password===$mysql_password)
       {
           // store data n session and send to new redirected page
            $_SESSION['name']=$mysql_name;
            $_SESSION['email']=$email;
            header("Location:http://localhost/assignment_01_to_04/modules/session_start.php");
       }  
    else echo "incorrect password";
 } 
 else echo "email not found";

}

?>

</body>
</html>
