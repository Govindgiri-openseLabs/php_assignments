
<?php
 $name='';
 include ('api_call.php');
 if($_SERVER['REQUEST_METHOD']=='POST')
   {  
      $name=$_POST['name'];
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container">
  <h1>Welcome <?php echo $name ?></h1>
  <div class="data">
  <h2 class="title">user name</h2>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
  <input type="text" placeholder="enter your name"name="name">
  <button name="submit">submit</button>
  <form>
  <h1 class="title">weather data</h1>
  <span>City name- </span><span><?php echo $city_name;?></span><br>
  <span>current tempreture- </span><span><?php echo $temp-273.15,'°C';?></span><br>
  <span>max tempreture- </span><span><?php echo $max_temp-273.15,'°C';?></span><br>
  <span>min tempreture- </span><span><?php echo $min_temp-273.15,'°C';?></span><br>
  <span>pressure- </span><span><?php echo $pressure;?></span><br>
  <span>humidity- </span><span><?php echo $humidity;?></span><br>
  <span>wind speed- </span><span><?php echo $wind_speed,"KMPH";?></span><br>
  <span>sun rise- </span><span><?php echo $sun_rise;?></span><br>
  <span>sun set- </span><span><?php echo $sun_set;?></span>
</div>
  <!-- .clear or .sunny -->
  <div class="weatherIcon">
    <div class="sunny">
      <div class="inner"></div>
    </div>
  </div>
  <!-- .mostlysunny or .partlycloudy -->
  <div class="weatherIcon">
    <div class="mostlysunny">
      <div class="inner"></div>
    </div>
  </div>
  <!-- .mostlycloudy or .partlysunny -->
  <div class="weatherIcon">
    <div class="mostlycloudy">
      <div class="inner"></div>
    </div>
  </div>
  <!-- .cloudy -->
  <div class="weatherIcon">
    <div class="cloudy">
      <div class="inner"></div>
    </div>
  </div>
  <!-- .fog or .hazy -->
  <div class="weatherIcon">
    <div class="fog">
      <div class="inner"></div>
    </div>
  </div>
  <!-- .chancerain or .rain -->
  <div class="weatherIcon">
    <div class="rain">
      <div class="inner"></div>
    </div>
  </div>
  <!-- .chancetstorms or .tstorms -->
  <div class="weatherIcon">
    <div class="tstorms">
      <div class="inner"></div>
    </div>
  </div>
  <!-- .chancesleet or .sleet -->
  <div class="weatherIcon">
    <div class="sleet">
      <div class="inner"></div>
    </div>
  </div>
  <!-- .chanceflurries or .flurries -->
  <div class="weatherIcon">
    <div class="flurries">
      <div class="inner"></div>
    </div>
  </div>
  <!-- .chancesnow or .snow -->
  <div class="weatherIcon">
    <div class="snow">
      <div class="inner"></div>
    </div>
  </div>
</div>
<?php
?>

</body>
</html>