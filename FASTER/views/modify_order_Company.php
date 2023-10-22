<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title> Dashboard delivery person</title>
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
        <h1>Attendance</h1>
        <i class="fas fa-user-cog"></i>
      </div>
   
        
        

      <section class="attendance">
        <div class="attendance-list">
          <h1>Modify order </h1>
          <div class ="form_ ">
            <form action="index.php?controller=Company&action=execute_modify_order_Company" method="post" id="">
            <label for="delivery">Delivery:</label>
            <input type="text" id="delivery" name="delivery" value="<?=$record->delivery ?>"> <br><br>
             <label for="name_client">Name_client:</label>
            <input type="text" id="name_client" name="name_client" value="<?=$record->name_client ?>">
            <label for="num_client">Num_client:</label>
            <input type="text" id="num_client" name="num_client"value="<?=$record->num_client ?>">
            <label for="payment">Payment:</label>
            <input type="text" id="payment"value="<?=$record->payment ?>" name="payment">
            <label for="total">Total:</label>
            <input type="text" id="total" name="total" value="<?=$record->total ?>">
            <label for="delivery_status">Delivery_status:</label>
            <input type="text" id="delivery_status" name="delivery_status" value="<?=$record->delivery_status ?>" >
            


            <button  type ="submit "class="custom-button">Modify  ORDER</button>

</form>

</div>


        </div>

      </section>

    </section>

  </div>

</body>
</html>
