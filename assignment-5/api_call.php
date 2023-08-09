<?php
// longitude and lattitue from ip address
$long='';
$latt='';
// Initialize cURL session
$ch = curl_init();
// api url
$url='https://ipinfo.io?token=81d01a120d9f76';
// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url); // API endpoint URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it directly

// Execute cURL request and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Process the API response
if ($response) {
    $data = json_decode($response, true); // Convert JSON response to an associative array
     $loc= $data['loc'];
    // echo $loc;
} else {
    echo 'Error: No response from the API.';
}
$i=0;
for(;$i<strlen($loc);$i++)
 {
    if($loc[$i]==',')
      {$i++;break;}
     $long= $long . $loc[$i];      
 }
 for(;$i<strlen($loc);$i++)
 {
   $latt= $latt . $loc[$i];      
 } 
 
 $latt = (float)$latt;
 $long=(float)$long;


$ch = curl_init();
$url="https://api.openweathermap.org/data/2.5/weather?lat=$long&lon=$latt&appid=01cc85098b0ba461c22b44aa802486b8";
// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url); // API endpoint URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it directly

$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

$city_name="";
$temp="";
$max_temp='';
$min_temp='';
$sun_rise='';
$sun_set='';
$pressure='';
$humadity='';
$wind_speed='';
// Process the API response
if ($response) {
    $data = json_decode($response, true); // Convert JSON response to an associative array
    $city_name = $data['name'];
    $temp=$data['main']['temp'];
    $max_temp=$data['main']['temp_max'];
    $min_temp=$data['main']['temp_min'];
    $sun_rise=$data['sys']['sunrise'];
    $sun_set=$data['sys']['sunset'];
    $pressure=$data['main']['pressure'];
    $humidity=$data['main']['humidity'];
    $wind_speed=$data['wind']['speed'];


    $sun_rise=date('Y-m-d H:i:s', $sun_rise);
    $sun_set=date('Y-m-d H:i:s', $sun_set);

} else {
    echo 'Error: No response from the API.';
}
?>
