<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title> setting user </title>
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
          <span class="nav-item"><?=$_SESSION["name"];?> </span>
        </a></li>
        <li><a href="index.php?controller=user&action=Dashboard">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>

    <!--     <li><a href="index.php?controller=user&action=add_order_Company">
        <i class="fas fa-upload"></i>
        <span class="nav-item">ADD ORDER</span>
        </a></li> -->

        <li><a href="index.php?controller=user&action=setting_user">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Setting</span>
        </a></li>

        <li><a href="index.php?controller=user&action=logout" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <h1>setting_user</h1>
        <i class="fas fa-user-cog"></i>
      </div>
   
        
        

      <section class="attendance">
        <div class="attendance-list">
          <h1>setting User</h1>
          <div class ="form_ ">
            <form action="index.php?controller=user&action=modify_user" method="post" id="">
            <label for="Username">Username :</label>
            <input type="text" id="Username" name="username" value ="<?php echo $user->username ;?>" ><br><br>

            <label for="email">email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user->email ;?>">
            
            <label for="number">number</label>
            <input type="text" id="number" name="number" value =" <?php echo $user->number ;?>">
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
