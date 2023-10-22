<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/style1.css">

</head>
<body>
   
<div class="form-container">

   <form id ="sign_up_form" onsubmit="event.preventDefault()">
      <h3>  SING UP  delivery_person </h3>
      <i class="fal fa-shipping-fast"></i>
      <input type="text" name="name" required placeholder="Name">
      <input type="text" name="last_name" required placeholder="last name">

      <input id="email" type="email" name="email" required placeholder="email">
      <input id="cin" type="text" name="cin" required placeholder="CIN">
      <input type="text" name="num" required placeholder="Number">
      <input type="text" name="vin" required placeholder="Vehicle identification number (VIN)">
      <input type="password" name="password" required placeholder="Password">
      
      <select name="user_type">
         <option value="user">user</option>
         <option value="delivery_person  "><i class="fal fa-shipping-fast"></i> delivery person</option>
         <option value="user">Company</option>
</select>
      <input type="submit" name="sign_up" value="register" onclick="execute_sign_up_delivery_person()" class="form-btn">
      <p id="result"></p>
      <p>already have an account? <a href="index.php?controller=delivery_person&action=login_delivery_person">login now</a></p>
   </form>

</div>

</body>
<script src="./js/utils.js"></script>
<script>
   function execute_sign_up_delivery_person()
   {
      var form = document.getElementById('sign_up_form');
      var formData = new FormData(document.getElementById('sign_up_form'));
      console.log(formData);
      MakeRequest('index.php?controller=delivery_person&action=execute_sign_up_delivery_person','POST',SignUpRespone,formData);
   }  

   function SignUpRespone(response) 
   {
      if(response.includes("fail"))
             {
               DisplayError("result","save error");
             } 
             else if(response.includes("success"))
             {
               NavigateTo("index.php?controller=delivery_person&action=login_delivery_person");
             } 
             else if(response.includes("missing"))
             {
               DisplayError("result","fill all data");
             }
             else if(response.includes("Cin exists"))
             {
               DisplayError("result","Cin exists");
               document.getElementById("email").style.color="red";
             }   
   }  
</script>

</html>