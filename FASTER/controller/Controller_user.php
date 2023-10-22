<?php
require "model/Model_user.php";
require "model/Model_order.php";


switch($action)
{
    case "login":
        {if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {    
            require_once "views/Dashboard.php";
        } else {

            require "views/login.php";
        }
        break;           
        }
        

        case "sign_up":
            {if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
                require "views/Dashboard.php";
            } else {
                require_once "views/sing_up.php";
            }
                break;
            }
        case "execute_sign_up":
            {          
                $name = $_POST["name"];
                $email = $_POST["email"];
                $ps = $_POST["password"];
                $num=(int)$_POST["num"];
                $user_email=User::getByemail($email);
                
                if ($user_email != false )
                    {
                        echo "eMail exists";
                        break; 
                    }

                if (!empty($name) &&  !empty($email) &&  !empty($ps) &&  !empty($num)  )
                {    
                    $user = new User($name,$email,$num,$ps);
                    $resultat = $user->insert();
                    if ( $resultat )
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


        case "execute_login":
            {         
                $email = $_POST["email"];
                $ps = $_POST["password"];
                $user=User::getByemail($email);
                
                if ($user != false )
                {
                    if ($user->email ==$email && $user->password==$ps ) 
                    {   $_SESSION["email"]=$email;
                        $_SESSION["name"] =$user->username;
                        $_SESSION["id"]=$user->id;
                        echo "success";
                    }
                    else
                    {
                        echo "fail";
                    }
                } else{

                    echo "eMail exists";
                } 
                
                break;
            }

        case "Dashboard":
            {  
                
                if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) 
                {   
                    $id=$_SESSION["id"];
                    $order= new Order;
                    $order->connect();
                    
                    

                    
                        if (isset($_POST["tracking_order"]))
                        {
                            $record=$order->getById_traking($_POST["tracking_order"]);
                            //echo $record->id;
                                if ($record)
                                {  
                                    
                                $resultat = $order->updatee([
                                    "id_client" => $_SESSION["id"],    
                                ], $record->id);
                                }
                                else
                                {
                                    echo "pas trouvé  id ";
                                }
                        }  
                        $list=$order->getById_client($_SESSION["id"]);
                            

                    require "views/Dashboard.php";
                } else 
                    {
                    require "views/login.php";
                    }
                break;
            } 





            case "logout": 
            {
                require_once "views/logout.php";
            }



            case "setting_user":{
                if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
                    
                    $user=User::getByemail($_SESSION["email"]);
                    require_once "views/setting_user.php";
                    
                } else 
                {
                    require "views/login.php";
                }
        
            }
                break;

            case "modify_user": {
                
                $name = $_POST["username"];
                $email = $_POST["email"];
                $num=(int)$_POST["number"];
                $ps = $_POST["password"];
                $ps2 = $_POST["password_2"];

                if (!empty($name) &&  !empty($email) &&  !empty($ps) &&  !empty($num)&& !empty($ps)&& !empty($ps2) )
                {       if ($ps ==$ps2)
                    { $user= new User($name,$email,$num,$ps) ;

                    $resultat = $user->update($_SESSION["email"]);

                  
                    echo ("<script>alert('bien modifier ');</script>");
                    

                }else{
                    echo ("<script>alert('password incorect ');</script>");
                    
                }



                }else {

                    echo "<script>alert('veuiller saisir le champ  ');</script>";
                   
                }
                  
                    //ki isir modification isir affichage imta3 dash
                    $order = new Order();
                    $order->connect();
                    $list=$order->getById_client($_SESSION["id"]);
                    require "views/Dashboard.php";
                }

                
                break; 

}

