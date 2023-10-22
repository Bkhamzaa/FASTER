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
      <h3>login now delivery_person</h3>

      <input type="text" name="cin" required placeholder="CIN">
      <input type="password" name="password" required placeholder=" password">
      <input type="submit" name="login" value="login now" onclick="execute_login_delivery_person()" class="form-btn">
      <p id="result"></p>
      <p>don't have an account? <a href="index.php?controller=delivery_person&action=login_delivery_person">register now</a></p>
   </form>

</div>
<script src="./js/utils.js"></script>
</body>
<script>
   function execute_login_delivery_person()
   {
      var form = document.getElementById('login_form');
      var formData = new FormData(document.getElementById('login_form'));
      console.log(formData);
      MakeRequest('index.php?controller=delivery_person&action=execute_login_delivery_person','POST',loginRespone,formData);
   }  

   function loginRespone(response) 
   {
      if(response.includes("fail"))
             {
               DisplayError("result","Wrong password or email");
             } 
             else if(response.includes("success"))
             {
               NavigateTo("index.php?controller=delivery_person&action=Dashboard_delivery_person");
             } 
             else if (response.includes("eMail exists"))
             {
               DisplayError("result","eMail exists");
             } 
             
   }  
</script>

</html>