
<?php
  session_start();
  $email=$_SESSION['email'];
  if($_SERVER['REQUEST_METHOD']=='POST')
    {  
        $country=$_POST['country'];
        $state=$_POST['state'];
        $city=$_POST['city'];
        $post=$_POST['post'];

      $country=='select country'?$country="":'';
         $state=='select state'?$state="":'';
          $city=='select city'?$city="":'';
       


        include ("../connections/mysql_connection.php");
        $sql = "UPDATE information SET country='$country',state='$state',city='$city',post='$post'  WHERE email='$email'"; 
        $conn->query($sql);
        $conn->close();

        header("Location:http://localhost/assignment_01_to_04/modules/session_start.php");
       exit();
    }

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
   <label for="uname"><b>country</b></label>
   <input type="text" id="country" name="country" value="select country" onclick='select_country()'readonly>
    <label for="uname"><b>state</b></label>
   <input id="state" type="text" name="state" value="select state"onclick='select_state()'readonly>
    <label for="uname"><b>district</b></label>
  <input id="city" type="text" name="city" value="selec city"onclick='select_city()' readonly>

    <label for="psw"><b>postal code</b></label>
    <input  type="number" placeholder="Enter Postal code" name="post" value="post">
    <button type="submit"name="submit"value="submit">submit</button>
  </div>

</form>
<form id="radioForm">
        <div id="dynamicRadioList">
            <br>
            <!-- Radio buttons will be added here -->
        </div>
 </form>

   
<script>

// data for country

function country_data(data)
      {   const radioContainer = document.getElementById('dynamicRadioList');
          data.forEach(country => {
            const new_div= document.createElement('input');
            new_div.id=country.id;
            new_div.addEventListener('click', checked_country_btn); 
            new_div.value =country.name;
            new_div.setAttribute("readonly", "true");
            radioContainer.appendChild(new_div);
        });      
    }    

function select_country()
    {    // fetch data by api

         fetch('https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/master/countries%2Bstates%2Bcities.json')
          .then(response => response.json())
          .then(data => {
              country_data(data);
          })
    } 
function checked_country_btn(e)
{
    console.log('country-', e.target.value);
    document.getElementById('country').value=e.target.value;
 
     // remove all country
    const myDiv = document.getElementById('dynamicRadioList');

       while (myDiv.firstChild) {
           myDiv.removeChild(myDiv.firstChild);
        }
}

//  data for states
function state_data(data)
      {   const radioContainer = document.getElementById('dynamicRadioList');
          data.forEach(state => {
            const new_div= document.createElement('input');
            new_div.id=state.id;
            new_div.addEventListener('click', checked_state_btn); 
            new_div.value =state.name;
            new_div.setAttribute("readonly", "true");
            radioContainer.appendChild(new_div);
        });      
    }    

function select_state()
    {    const country_name=document.getElementById('country').value;
         fetch('https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/master/countries%2Bstates%2Bcities.json')
          .then(response => response.json())
          .then(data => {
              data.forEach(country=>{
                  if(country.name===country_name)
                    {   state_data(country.states);
                    }
              })
              
          })
    }
  
function checked_state_btn(e)
{
    console.log('state-', e.target.value);
    document.getElementById('state').value=e.target.value;
 
     // remove all country
    const myDiv = document.getElementById('dynamicRadioList');

       while (myDiv.firstChild) {
           myDiv.removeChild(myDiv.firstChild);
        }
}

// data city


function city_data(data)
      {   const radioContainer = document.getElementById('dynamicRadioList');
          data.forEach(city => {
            const new_div= document.createElement('input');
            new_div.id=city.id;
            new_div.addEventListener('click', checked_city_btn); 
            new_div.value =city.name;
            new_div.setAttribute("readonly", "true");
            radioContainer.appendChild(new_div);
        });      
    }    

function select_city()
    {    const state_name=document.getElementById('state').value;
         const country_name=document.getElementById('country').value;
         fetch('https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/master/countries%2Bstates%2Bcities.json')
          .then(response => response.json())
          .then(data => {
              data.forEach(country=>{
                  if(country.name===country_name)
                    {   country.states.forEach(state=>{
                                          if(state.name===state_name)
                                             {
                                                city_data(state.cities);
                                                
                                             }
                                        })
                    }
              })
              
          })
    }
  
function checked_city_btn(e)
{
    console.log('city-', e.target.value);
    document.getElementById('city').value=e.target.value;
 
     // remove all country
    const myDiv = document.getElementById('dynamicRadioList');

       while (myDiv.firstChild) {
           myDiv.removeChild(myDiv.firstChild);
        }
}
</script>

</body>
</html>