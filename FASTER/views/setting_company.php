<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title> setting_company</title>
<link rel="stylesheet" href="css/style_dash.css" />
<!-- Font Awesome Cdn Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>



<div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="./img/icon.png">
          <span class="nav-item"><?php  echo $_SESSION["business_name"]; ?></span>
        </a></li>
        <li><a href="index.php?controller=Company&action=Dashboard_Company">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>

        <li><a href="index.php?controller=Company&action=add_order_Company">
        <i class="fas fa-upload"></i>
        <span class="nav-item">ADD ORDER</span>
        </a></li>

        <li><a href="index.php?controller=Company&action=setting_company">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Setting</span>
        </a></li>

        <li><a href="index.php?controller=Company&action=logout" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <h1>Account Setting</h1>
        <i class="fas fa-user-cog"></i>
      </div>
   
        
        

      <section class="attendance">
        <div class="attendance-list">
          <h1>------</h1>
          <div class ="form_ ">
            <form action="index.php?controller=Company&action=modify_company" method="post" id="">
            <label for="tax_registration_number">tax_registration_number :</label>
            <input type="text" id="tax_registration_number" value="<?= $_SESSION["tax_number"]?>" name="tax_registration_number" readonly><br><br>
             <label for="business_name">business_name:</label>
            <input type="text" id="business_name"  value ="<?= $Company->business_name?>"name="business_name">
            <label for="email">email:</label>
            <input type="email" id="email" value ="<?= $Company->email ?>" name="email">
            <label for="number">number</label>
            <input type="text" id="number" value ="<?= $Company->number ?>" name="number">
            <label for="password">password</label>
            <input type="password" id="password" name="password">
            <label for="password_2">Conformation password</label>
            <input type="password" id="password_2" name="password_2">
            <button  type =" submit " value ="submit" class="custom-button">Modify </button>




</form>

</div>


        </div>

      </section>

    </section>

  </div>

</body>
</html>
