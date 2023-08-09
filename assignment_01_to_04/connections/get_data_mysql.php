<?php

$sql = "SELECT * FROM information WHERE email='$email'";
$user_data=$conn->query($sql);
$conn->close();
?>