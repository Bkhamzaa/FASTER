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
      <h3>  SING UP  Company </h3>
      <i class="fal fa-shipping-fast"></i>
      <input type="text" name="business_name" required placeholder="business_name">

      <input id="email" type="email" name="email" required placeholder="email">
      <input type="text" name="num" required placeholder="Number">
      <input type="text" name="tax_registration_number" required placeholder="tax_registration_number">
      <input type="password" name="password" required placeholder="Password">
      
      <select name="user_type">
         <option value="user">user</option>
         <option value="Company  "><i class="fal fa-shipping-fast"></i> delivery person</option>
         <option value="user">Company</option>
</select>
      <input type="submit" name="sign_up" value="register" onclick="execute_sign_up_Company()" class="form-btn">
      <p id="result"></p>
      <p>already have an account? <a href="index.php?controller=Company&action=login_Company">login now</a></p>
   </form>

</div>

</body>
<script src="./js/utils.js"></script>
<script>
   function execute_sign_up_Company()
   {
      var form = document.getElementById('sign_up_form');
      var formData = new FormData(document.getElementById('sign_up_form'));
      console.log(formData);
      MakeRequest('index.php?controller=Company&action=execute_sign_up_Company','POST',SignUpRespone,formData);
   }  

   function SignUpRespone(response) 
   {
      if(response.includes("fail"))
             {
               DisplayError("result","save error");
             } 
             else if(response.includes("success"))
             {
               NavigateTo("index.php?controller=Company&action=login_Company");
             } 
             else if(response.includes("missing"))
             {
               DisplayError("result","fill all data");
             }
             else if(response.includes("tax_registration_number exists"))
             {
               DisplayError("result","tax_registration_number exists");
               document.getElementById("email").style.color="red";
             }   
   }  
</script>

</html>