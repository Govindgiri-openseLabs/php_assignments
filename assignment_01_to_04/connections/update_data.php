<?php
$sql = "UPDATE information SET interest='$interest',education='$education',profession='$profession',hobbies='$hobbies'  WHERE email='$email'"; 
// (id,name,email,password,interest,education,profession,hobbies)
 $conn->query($sql);
 $conn->close();
?>