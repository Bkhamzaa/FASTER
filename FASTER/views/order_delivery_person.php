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
          <span class="nav-item"><?php echo $_SESSION["name"]; ?> </span>
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
          <h1>Attendance List</h1>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Delivery</th>
                <th>Name_company</th>
                <th>Payment</th>
                <th>Total</th>
                <th>Delivery_status</th>
                <th>Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
             
            <?php foreach ($list as $item) {
              echo '<tr>';
              echo '<td>' . $item->id . '</td>';
              echo '<td>' . $item->delivery . '</td>';
              echo '<td>' . $item->name_company . '</td>';
              echo '<td>' . $item->payment . '</td>';
              echo '<td>' . $item->total . '</td>';
              echo '<td>' . $item->delivery_status . '</td>';
              echo '<td>' . $item->date . '</td>';
              echo '<form action="index.php?controller=delivery_person&action=delete_order" method="post" >';
              echo ' <input type="hidden" value="'.$item->id.'" name="id">';

              echo '<td><button type="submit"  >Delete</button></td>';
              echo '</tr>';
              } ?>
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
