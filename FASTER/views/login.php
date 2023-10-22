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

   <form onsubmit="event.preventDefault()" id="login_form">
      <h3>login now</h3>

      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="login" value="login" onclick="execute_login()" class="form-btn" >
      
      <p id="result"></p>
      <p>don't have an account? <a href="index.php?controller=user&action=sign_up">register now</a></p>
   </form>

</div>
<script src="./js/utils.js"></script>
</body>

<!-- <script>
   function execute_login()
   {
      var form = document.getElementById('login_form');
      var formData = new FormData(document.getElementById('login_form'));
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'index.php?controller=user&action=execute_login', true);
      xhr.onload = function() {
             if(xhr.responseText.includes("fail"))
             {
               document.getElementById('result').innerText ="Wrong password or email";
               document.getElementById('result').style.color = "red";
             } 
             else if(xhr.responseText.includes("success"))
             {
               form.action="index.php?controller=user&action=Dashboard";
               form.method="post";
               form.submit();
             }         
        };
        xhr.send(formData);
   }     
  // action="index.php?controller=user&action=login_Dashboard" method="post"
  </script> -->
  <script>
   function execute_login()
   {
      var form = document.getElementById('login_form');
      var formData = new FormData(document.getElementById('login_form'));
      console.log(formData);
      MakeRequest('index.php?controller=user&action=execute_login','POST',loginRespone,formData);
   }  

   function loginRespone(response) 
   {
      if(response.includes("fail"))
             {
               DisplayError("result","Wrong password or email");
             } 
             else if(response.includes("success"))
             {
               NavigateTo("index.php?controller=user&action=Dashboard");
             } 
             else if (response.includes("eMail exists"))
             {
               DisplayError("result","eMail exists");
             } 
             
   }  
</script>


</html>

