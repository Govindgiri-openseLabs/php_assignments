
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index.css">
</head>
<body>

<h2>Sign up Form</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
   <div class="container">
   <label for="uname"><b>Name</b></label>
    <input type="text" placeholder="Enter Email" name="name">

    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="uname"><b>Password</b></label>
    <input type="text" placeholder="Enter Email" name="password" required>

    <label for="psw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter Password" name="confirm_password" required>
    <button type="submit">Submit</button>
  </div>
</form>




<?php 
session_start();
                 
if($_SERVER['REQUEST_METHOD']=='POST')
{ $name=$_POST['name'];
  $email= $_POST['email']; 
  $user_password=$_POST['password'];
  $cnf_user_password=$_POST['confirm_password']; 
  // check email (regex)
   $email_validation= '/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/';
   if(!preg_match($email_validation, $email))
     {
      echo "invalid email formate";
         exit();
     } 
  // check password
  if($user_password!==$cnf_user_password)
    {
       echo "password does not match";
       exit();
    }

  //  add data to session
   $_SESSION['name']=$name;
   $_SESSION['email']=$email;
  // include session start file
  include('../connections/mysql_connection.php');
  include('../connections/add_data_mysql.php');
  

  // redirect to session page

  header("Location:http://localhost/assignment_01_to_04/modules/session_start.php");

}
?>

</body>
</html>
