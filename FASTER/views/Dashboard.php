<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title> Dashboard</title>
<link rel="stylesheet" href="./css/style_dash.css" />
<!-- Font Awesome Cdn Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>

<div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="./img/icon.png">
          <span class="nav-item"><?= $_SESSION["name"] ?></span>
        </a></li>
        <li><a href="index.php?controller=user&action=Dashboard">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>

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
        <h1>Attendance</h1>
        <i class="fas fa-user-cog"></i>
      </div>
        <div class="card">
          <label for="id">TRAKING ID</label>
          <form method="post" action="index.php?controller=user&action=Dashboard">
          <input type="text" id="id" name="tracking_order" placeholder="ID">
          <button class="traking" type ="submit">TRAKING</button>
          </form>
      </div>
        

      <section class="attendance">
        <div class="attendance-list">
          <h1>Attendance List</h1>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name_client</th>
                <th>Order ID</th>
                <th>Name company</th>
                <th>traking ID</th>
                <th>payment</th>
                <th>Total</th>
                <th>Date_order</th>
              </tr>
            </thead>
            <tbody>
            <?php 
          
            foreach ($list as $item) {
              echo '<tr>';
              echo '<td>' . $item->id . '</td>'; 
              echo '<td>' . $item->name_client . '</td>';
              echo '<td>' . $item->order_id. '</td>';
              echo '<td>' . $item->name_company . '</td>';
              echo '<td>' . $item->tracking_order . '</td>';
              echo '<td>' . $item->payment . '</td>';
              echo '<td>' . $item->total . '</td>';
              echo '<td>' . $item->date . '</td>';
              /* echo '<form action="index.php?controller=company&action=delete_order_Company" method="post" >';
              echo ' <input type="hidden" value="'.$item->id.'" name="id">';

              echo '<td><button type="submit" id="delete"  >Delete</button></td>';
              echo '</form>';
              echo '<form action="index.php?controller=Company&action=modify_order_Company" method="post" >';
              echo ' <input type="hidden" value="'.$item->id.'" name="id">';

              echo '<td><button type="submit"  >Modify</button></td>';
              echo '</form>';
 */ 
              
              echo '</tr>';
               }?>
              <!-- <tr >
                <td>05</td>
                <td>Salina</td>
                <td>Coding</td>
                <td>03-24-22</td>
                <td>9:00AM</td>
                <td>4:00PM</td>
                <td><button>View</button></td>
              </tr>
              <tr >
                <td>06</td>
                <td>Tara Smith</td>
                <td>Testing</td>
                <td>03-24-22</td>
                <td>9:00AM</td>
                <td>4:00PM</td>
                <td><button>View</button></td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>

</body>
</html>
