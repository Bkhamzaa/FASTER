<?php
require "model/Model_delivery_person.php";
require_once  "model/Model_order.php";



switch($action)
{
    case "login_delivery_person":
        {
            require_once "views/login_delivery_person.php";
            break;
        }
        
        case "sign_up_delivery_person":
            {
                require_once "views/sign_up_delivery_person.php";   
                break;
            }
        case "execute_sign_up_delivery_person":
            {
                
                $name = $_POST["name"];
                $last_name=$_POST["last_name"];
                $email = $_POST["email"];
                $ps = $_POST["password"];
                $num=(int)$_POST["num"];
                $cin=(int)$_POST["cin"];
                $vin=(int)$_POST["vin"];
                if (!empty($name) &&  !empty($email) &&  !empty($ps) &&  !empty($num) && !empty($last_name) && !empty($cin) && !empty($vin) )
                {    
                    $delivery_person = new Delivery_person();
                    $delivery_person->connect();
                    $delivery_person_cin=$delivery_person->getBycin($cin);
                    if ($delivery_person_cin != false )
                    {
                        echo "Cin exists";
                        break; 
                    }
                    $resultat = $delivery_person->insert([
                        "name" => $name,
                        "last_name" => $last_name,
                        "email" => $email,
                        "password" => $ps,
                        "number"=>$num,
                        "CIN"=>$cin,
                        "vin"=>$vin

                    ]);
                    if ( $resultat =! false )
                    {  
                        echo "success";

                    }
                    else
                    {
                        echo "fail";   
                    } 
                }
                else
                {
                    echo "missing";
                }
            
            } 
            
              break;
        case "execute_login_delivery_person":
            {        
                $cin=$_POST["cin"];
                $ps = $_POST["password"];
                $delivery_person = new Delivery_person();
                $delivery_person->connect();
                $delivery_person=$delivery_person->getBycin($cin);
                if ($delivery_person != false )
                {
                    if ($delivery_person->CIN ==$cin &&$delivery_person->password==$ps ) 
                    {   $_SESSION["cin"]=$cin;
                        $_SESSION["name"] =$delivery_person->name;
                        $_SESSION["id"] =$delivery_person->id;
                        
                        echo "success";
                    }
                    else
                    {
                        echo "fail";
                    }
                } else{

                    echo "Cin exists";
                } 
                break;
            }

        case "Dashboard_delivery_person":
            {  if (isset($_SESSION["cin"]) && !empty($_SESSION["cin"])) {

                    

                    
                    $order= new Order;
                    $order->connect();
                    $list=$order->get_order_disp();
                    //print_r($list);





                require "views/Dashboard_delivery_person.php";
            } else {
                require "views/login_delivery_person.php";
            }
                break;
            } 

            case "setting_delivery_person":
                {   $delivery_person = new Delivery_person();
                    $delivery_person->connect();
                    $delivery_person=$delivery_person->getBycin($_SESSION["cin"]);

                    require "views/setting_delivery_person.php";
                    break;
                } 
                case "execute_setting_delivery_person":
                    {   $delivery_person = new Delivery_person();
                        $delivery_person->connect();

                        $name = $_POST["name"];
                        $last_name=$_POST["last_name"];
                        $email = $_POST["email"];
                        $ps = $_POST["password"];
                        $ps2 = $_POST["password_2"];

                        $num=(int)$_POST["number"];
                        $vin=(int)$_POST["vin"];
                        if (!empty($name) &&  !empty($email)&&  !empty($vin) &&  !empty($last_name) &&  !empty($num)&& !empty($ps)&& !empty($ps2) )
                {       if ($ps ==$ps2)
                    {
                    $resultat = $delivery_person->update([
                    "name" => $name,
                    "last_name" => $last_name,
                    "email" => $email,
                    "number" => $num,
                    "vin" => $vin,
                    "password" => $ps,
                    ], $_SESSION["id"]);
                    echo ("<script>alert('bien modifier ');</script>");
                    $delivery_person = new Delivery_person();
                    $delivery_person->connect();
                    $delivery_person=$delivery_person->getBycin($_SESSION["cin"]);
                    require "views/setting_delivery_person.php";
                }else{
                    echo ("<script>alert('password incorect ');</script>");
                    require "views/Dashboard_delivery_person.php";
                }



                }else {

                    echo "<script>alert('veuiller saisir le champ  ');</script>";
                    require "views/Dashboard_delivery_person.php";
                }

                        //require "views/setting_delivery_person.php";
                        break;
                    } 

                case "order_delivery_person":
                    { 
                        $order= new Order;
                        $order->connect();
                        $list=$order->getbyId_d_per($_SESSION["id"]);

                        require "views/order_delivery_person.php";
                        break;
                    }


                case "add_order" :
                {  if (isset($_SESSION["cin"]) && !empty($_SESSION["cin"])) {
                    $id = $_POST["id"];

                    $order= new Order;
                    $order->connect();
                    

                    $resultat = $order->updatee([
                       
                        "id_d_person" => $_SESSION["id"],
                       
                        ], $id);

                        $list=$order->getbyId_d_per($_SESSION["id"]);
                        
                  

                    require "views/order_delivery_person.php";
                } else {
                require "views/login_delivery_person.php";
            }
                break;
            } 


            case "delete_order":
            {  if (isset($_SESSION["cin"]) && !empty($_SESSION["cin"])) {
                $id = $_POST["id"];

                $order= new Order;
                $order->connect();
                

                $resultat = $order->updatee([
                   
                    "id_d_person" => NULL,
                   
                    ], $id);

                    $list=$order->getbyId_d_per($_SESSION["id"]);
                    
                    echo" delete";

                require "views/order_delivery_person.php";
            } else {
            require "views/login_delivery_person.php";
        }
            break;
        } 






                case "logout":
                    {
                        require_once "views/logout.php";
                        break;
                    }

                



















}


















?>