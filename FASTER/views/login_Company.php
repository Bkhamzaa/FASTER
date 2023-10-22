<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/style1.css">

</head>
<body>
   
<div class="form-container">

   <form onsubmit="event.preventDefault()" method="post" id="login_form" >
      <h3>login now Company</h3>

      <input type="text" name="tax_registration_number" required placeholder="tax_registration_number">
      <input type="password" name="password" required placeholder=" password">
      <input type="submit" name="login" value="login now" onclick="execute_login_company()" class="form-btn">
      <p id="result"></p>

      <p>don't have an account? <a href="index.php?controller=Company&action=sign_up_Company">register now</a></p>
   </form>

</div>
<script src="./js/utils.js"></script>

</body>
<script>
   function execute_login_company()
   {
      var form = document.getElementById('login_form');
      var formData = new FormData(document.getElementById('login_form'));
      console.log(formData);
      MakeRequest('index.php?controller=Company&action=execute_login_Company','POST',loginRespone,formData);
   }  

   function loginRespone(response) 
   {
      if(response.includes("fail"))
             {
               DisplayError("result","Wrong password or email");
             } 
             else if(response.includes("success"))
             {
               NavigateTo("index.php?controller=Company&action=Dashboard_Company");
             } 
             else if (response.includes("tax_registration_number exists"))
             {
               DisplayError("result","tax_registration_number exists");
             } 
             
   }  
</script>
</html>