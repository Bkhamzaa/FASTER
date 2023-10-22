<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title> setting_delivery_person</title>
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
          <span class="nav-item"><?php  echo $_SESSION["name"]; ?></span>
        </a></li>
        <li><a href="index.php?controller=delivery_person&action=Dashboard_delivery_person">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>
        <li><a href="index.php?controller=delivery_person&action=order_delivery_person">
        <i class="fas fa-truck-loading"></i>
        <span class="nav-item">Order</span>
        </a></li>
       

        <li><a href="index.php?controller=delivery_person&action=setting_delivery_person">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Setting</span>
        </a></li>

        <li><a href="index.php?controller=delivery_person&action=logout" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <h1>setting_delivery_person</h1>
        <i class="fas fa-user-cog"></i>
      </div>
   
        
        

      <section class="attendance">
        <div class="attendance-list">
          <h1>setting_company</h1>
          <div class ="form_ ">
            <form action="index.php?controller=delivery_person&action=execute_setting_delivery_person" method="post" id="">
            <label for="tax_registration_number"> CIN :</label>
            <input type="text" id="tax_registration_number" value="<?= $delivery_person->CIN?>" name="tax_registration_number" readonly><br><br>
             <label for="business_name">Name:</label>
            <input type="text" id="name"  value ="<?= $delivery_person->name?>"name="name">
            <label for="last_name">Last name:</label>
            <input type="text" id="last_name" value ="<?= $delivery_person->last_name ?>" name="last_name">
            <label for="email">Email</label>
            <input type="email" id="email" value ="<?= $delivery_person->email ?>" name="email">
            <label for="number">Number</label>
            <input type="text" id="number" value ="<?= $delivery_person->number ?>" name="number">
            <label for="vin">Vin</label>
            <input type="text" id="vin" value ="<?= $delivery_person->vin ?>" name="vin">

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
