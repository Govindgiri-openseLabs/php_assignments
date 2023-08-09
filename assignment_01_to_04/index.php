
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index.css">
</head>
<body>

<h2>Home Page</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
   <div class="container">
   <button type="submit"name="action" value="signup">Sign up</button>
   <button type="submit"name="action"value="signin">Login</button>
  </div>
</form>

<?php 
setcookie("user", "govind", time() - 3600);
                 
if($_SERVER['REQUEST_METHOD']=='POST')
{ 

   $action=$_POST['action'];

   if($action==='signin')
     {
      header("Location:http://localhost/assignment_01_to_04/auth_pages/sign_in_page.php");
     } 
    else 
     {
      header("Location:http://localhost/assignment_01_to_04/auth_pages/sign_up_page.php");

     }
    exit();
}

?>

</body>
</html>
