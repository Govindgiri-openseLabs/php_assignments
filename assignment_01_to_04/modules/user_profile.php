<?php
   session_start();
   $name=$_SESSION['name'];
   $email=$_SESSION['email'];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
   <div class="container">
    <h1>hello <?php echo $name ?></h1>
    <h2>Complete your profile</h2>
    
    <label for="uname"><b>Topic Of Interest</b></label>
    <input type="text" placeholder="Enter interest" name="interest">

    <label for="uname"><b>Education</b></label>
    <input type="text" placeholder="Enter Education" name="education">

    <label for="uname"><b>Profession</b></label>
    <input type="text" placeholder="Enter Profession" name="profession">

    <label for="psw"><b>Hobbies</b></label>
    <input type="text" placeholder="Enter Hobbies" name="hobbies">
    <button type="submit"name="action" value="address">Save & Next</button>
   <button type="submit"name="action"value="save">Save & Back</button> 
  </div>
</form>


<?php
  
  if($_SERVER['REQUEST_METHOD']=='POST')
   {  
      $interest=$_POST['interest'];
      $education=$_POST['education'];
      $profession=$_POST['profession'];
      $hobbies=$_POST['hobbies'];
      include ("../connections/mysql_connection.php");
      include ("../connections/update_data.php");


      
       $action=$_POST['action'];
      if($action=='save') 
        {
          header("Location:http://localhost/assignment_01_to_04/modules/session_start.php");
        }
      else 
        {
          header("Location:http://localhost/assignment_01_to_04/modules/ajax_form.php");
        }
   }
     



?>







</body>
</html>