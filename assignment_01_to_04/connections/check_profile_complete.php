<?php
$sql="SELECT * FROM information WHERE email = '$email'";
$user_data=$conn->query($sql);


$percentage=0;

while ($row = $user_data->fetch_object()) {
    if($row->name) $percentage++;
    if($row->email) $percentage++;
    if($row->password) $percentage++;
    if($row->interest) $percentage++;
    if($row->education) $percentage++;
    if($row->profession) $percentage++;
    if($row->hobbies) $percentage++;
    if($row->state) $percentage++;
    if($row->city) $percentage++;
    if($row->post) $percentage++;
}

$conn->close();
?>