<?php

 $sql = "INSERT INTO information (id,name,email,password) VALUES (1,'$name','$email','$user_password')";
 $conn->query($sql);
 $conn->close();
?>