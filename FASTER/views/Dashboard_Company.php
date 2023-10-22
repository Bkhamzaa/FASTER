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
          <span class="nav-item"><?php  echo $_SESSION["business_name"]; ?> </span>
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
        <h1>List Order</h1>
        <i class="fas fa-user-cog"></i>
      </div>
   
        
        

      <section class="attendance">
        <div class="attendance-list">
          <h1> ------ </h1>
          <table class="table">
            <thead>
              <tr>
              <th>ID </th>
                <th>Delivery person </th>
                <th>Name_client</th>
                <th>Num_client</th>
                <th>Payment</th>
                <th>Total</th>
                <th>Delivery</th>
                <th>Delivery_status</th>
                <th>Date</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($list as $item) {
              echo '<tr>';
              echo '<td>' . $item->id . '</td>';
              echo '<td>' . $item->id_d_person . '</td>';
              echo '<td>' . $item->name_client . '</td>';
              echo '<td>' . $item->num_client . '</td>';
              echo '<td>' . $item->payment . '</td>';
              echo '<td>' . $item->total . '</td>';
              echo '<td>' . $item->delivery . '</td>';
              echo '<td>' . $item->delivery_status . '</td>';
              echo '<td>' . $item->date . '</td>';
              echo '<form action="index.php?controller=company&action=delete_order_Company" method="post" >';
              echo ' <input type="hidden" value="'.$item->id.'" name="id">';

              echo '<td><button type="submit" id="delete"  >Delete</button></td>';
              echo '</form>';
              echo '<form action="index.php?controller=Company&action=modify_order_Company" method="post" >';
              echo ' <input type="hidden" value="'.$item->id.'" name="id">';

              echo '<td><button type="submit"  >Modify</button></td>';
              echo '</form>';

              
              echo '</tr>';
              } ?>
            <!--   <tr class="active">
                <td>02</td>
                <td>Balbina Kherr</td>
                <td>Coding</td>
                <td>03-24-22</td>
                <td>9:00AM</td>
                <td>4:00PM</td>
                <td>4:00PM</td>
                <td><button>Delete</button></td>
              </tr>
              <tr>
                <td>03</td>
                <td>Badan John</td>
                <td>testing</td>
                <td>03-24-22</td>
                <td>8:00AM</td>
                <td>3:00PM</td>
                <td>3:00PM</td>
                <td><button>Delete</button></td>
              </tr>
              <tr>
                <td>04</td>
                <td>Sara David</td>
                <td>Design</td>
                <td>03-24-22</td>
                <td>8:00AM</td>
                <td>3:00PM</td>
                <td>3:00PM</td>
                <td><button>Delete</button></td>
              </tr> -->
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
