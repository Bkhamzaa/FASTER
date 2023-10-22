<?php
require_once "model/Model_Company.php";
require_once  "model/Model_order.php";



switch($action)
{
    case "login_Company":
        {   
            if (isset($_SESSION["tax_number"]) && !empty($_SESSION["tax_number"])){
                    require_once "views/Dashboard_Company.php";
            }else
            {
            require_once "views/login_Company.php";
            }
            break;
        }
        
        case "sign_up_Company":
            {
                require_once "views/sign_up_Company.php";   
                break;
            }
        case "execute_sign_up_Company":
            {
                
                $business_name = $_POST["business_name"];
                $email = $_POST["email"];
                $ps = $_POST["password"];
                $num=(int)$_POST["num"];
                $tax_registration_number=(int)$_POST["tax_registration_number"];
                if (!empty($business_name) &&  !empty($email) &&  !empty($ps) &&  !empty($num) && !empty($tax_registration_number) )
                {    
                    
                    $Company_tax_n=Company::getBytax_n($tax_registration_number);
                    if ($Company_tax_n != false )
                    {
                        echo "tax_registration_number exists";
                        break; 
                    }   $Company= new Company($tax_registration_number,$business_name,$email,$ps,$num);
                        $resultat = $Company->insert();
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
        case "execute_login_Company":
            {         
                $tax_registration_number=(int)$_POST["tax_registration_number"];
                $ps = $_POST["password"];
                
                $Company=Company::getBytax_n($tax_registration_number);
                if ($Company != false )
                {
                    if ($Company->tax_registration_n  ==$tax_registration_number && $Company->password==$ps ) 
                    {   
                        $_SESSION["tax_number"]=$tax_registration_number;
                        $_SESSION["business_name"]=$Company->business_name;
                        echo "success";
                    }
                    else
                    {
                        echo "fail";
                    }
                } else{

                    echo "tax_registration_number exists";
                } 
                break;
            }


            case "execute_add_order_Company":{
                if (isset($_SESSION["tax_number"]) && !empty($_SESSION["tax_number"])){
                    $name_company=$_SESSION["business_name"];
                    $delivery = $_POST["delivery"];
                    $name_client = $_POST["name_client"];
                    $num_client = (int)$_POST["num_client"];
                    $payment = $_POST["payment"];
                    $total = (int)$_POST["total"];
                    $delivery_status = $_POST["delivery_status"];
                    $date= date("Y/m/d");
                    if (!empty($delivery) &&  !empty($name_client) &&  !empty($num_client) &&  !empty($payment) && !empty($total)&&!empty($delivery_status) ){

                    $order = new Order();
                    $order->connect();

                    $resultat = $order->insert([
                        "name_company"=>$name_company,
                        "delivery" => $delivery,
                        "name_client" => $name_client,
                        "num_client"=>$num_client,
                        "payment" => $payment,
                        "total" => $total,
                        "delivery_status"=>$delivery_status,
                        "date"=>$date,
                        "order_id" =>$_SESSION["tax_number"],
                        "tracking_order"=>"null",
                        
                        

                    ]);
                    if ( $resultat )
                    {  $order= new Order;
                        $order->connect();
                        $list=$order->getlist($_SESSION["tax_number"]);
                        echo ("<script>alert('Order ADD ');</script>");
                        require_once "views/Dashboard_Company.php";
                    }
                    else
                    {
                        die ("<script>alert('problem insert  ');</script>");  
                    } 
                }else {

                    die ("<script>alert('vide ');</script>"); 
                }
                   



                    

                }
                else{
                require "views/login_Company.php";
                }
                break;
            }
                case "add_order_Company":{

                require "views/add_order_Company.php";
                }
                break;

                case "delete_order_Company":{
                    $order = new Order();
                    $order->connect();
                    $id = $_POST["id"];
                    $order=$order->delete($id);
                    if ($order){

                        echo "true";
                    }else{
                        echo 'false';
                    }
                    require "views/add_order_Company.php";
                    //header('index.php?controller=Company&action=Dashboard_Company');
                    
                    break;
                }

            case "Dashboard_Company":{
                if (isset($_SESSION["tax_number"]) && !empty($_SESSION["tax_number"])){
                    
                    
                    $Company=Company::getBytax_n($_SESSION["tax_number"]);

                    $_SESSION["business_name"]=$Company->business_name;
                    $order= new Order;
                    $order->connect();
                    $list=$order->getlist($_SESSION["tax_number"]);
                    
                   

                require_once "views/Dashboard_Company.php";
                }else 
                {
                    require_once "views/login_Company.php";
                }
                break;
            }
        
            case "logout":{
            
                require "views/logout.php";
                break;
            }
            
            case "setting_company":
                {
                
                $Company=Company::getBytax_n($_SESSION["tax_number"]);

                require "views/setting_company.php";
                break;

            }

            case "modify_company":
            {
                    

                $business_name = $_POST["business_name"];
                $email = $_POST["email"];
                $num=(int)$_POST["number"];
                $ps = $_POST["password"];
                $ps2 = $_POST["password_2"];

                if (!empty($business_name) &&  !empty($email) &&  !empty($num) && !empty($ps)&& !empty($ps2) )
                    {       
                        if ($ps ==$ps2)
                    {   $company = new Company($_SESSION["tax_number"],$business_name,$email,$ps,$num);
                    $resultat = $company->update( $_SESSION["tax_number"]);

                    $_SESSION["business_name"] = $business_name;
                    $order= new Order;
                    $order->connect();
                    $list=$order->getlist($_SESSION["tax_number"]);
                    //require "views/Dashboard.php";
                    echo ("<script>alert('bien modifier ');</script>");

                    require_once "views/Dashboard_Company.php";
                    }else 
                    {
                        $order= new Order;
                        $order->connect();
                        $list=$order->getlist($_SESSION["tax_number"]);
                    
                        

                    echo ("<script>alert('Password dot not match  ');</script>");
                    require "views/Dashboard_Company.php";



                    }   


                    }else{
                        require "views/setting_company.php";

                    }
                    
                    break;
                }


               
                case 'modify_order_Company':
                    {
                    $order = new Order();
                    $order->connect();
                    $_SESSION["id"]=$_POST["id"];
                      $record =$order->getById($_SESSION["id"]);
                      require "views/modify_order_Company.php";
                    
        
                        break;
                    }

                    case 'execute_modify_order_Company':
                        {
                       
                            $name_company=$_SESSION["business_name"];
                            $delivery = $_POST["delivery"];
                            $name_client = $_POST["name_client"];
                            $num_client = (int)$_POST["num_client"];
                            $payment = $_POST["payment"];
                            $total = (int)$_POST["total"];
                            $delivery_status = $_POST["delivery_status"];
                            $date= date("Y/m/d");
                            if (!empty($delivery) &&  !empty($name_client) &&  !empty($num_client) &&  !empty($payment) && !empty($total)&&!empty($delivery_status) ){
        
                            $order = new Order();
                            $order->connect();
        
                            $resultat = $order->update([
                                "name_company"=>$name_company,
                                "delivery" => $delivery,
                                "name_client" => $name_client,
                                "num_client"=>$num_client,
                                "payment" => $payment,
                                "total" => $total,
                                "delivery_status"=>$delivery_status,
                                "date"=>$date,
                                "order_id" =>$_SESSION["tax_number"],
                                "tracking_order"=>"null",
                                
                                
        
                            ], $_SESSION["id"]);
                            if ( $resultat )
                            {  
                                $list=$order->getlist($_SESSION["tax_number"]);
                                echo ("<script>alert('Order modify ');</script>");
                                require "views/Dashboard_Company.php";                            }
                            else
                            {
                                die ("<script>alert('problem update  ');</script>");  
                            } 
                        }else {
        
                            die ("<script>alert('vide ');</script>"); 
                        }
            
                            break;
                        }


























            }
    

        






            

?>