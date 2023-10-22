<?php
require_once "Model.php";


class User extends Model  {

    
    protected static $table = 'user';
    protected static $clePrimaire = "email";
    private string $Username;
    private string $Email;
    private int $Phone;
    private string $Password;



public function __construct($username,$email,$phone,$password)
    {
    
    $this->Email =$email;
    $this->Username =$username;
    $this->Phone =$phone;
    $this->Password =$password;
    
    }

public function getEmail(){
    return $this->Email;
}

public function getUsername(){
    return $this->Username;
    }

public function getPhone(){
    return $this->Phone;
    }
    
public function getPassword(){
    return $this->Password;
    }  
    
    


   


public function insert(){
    // Se connecter à la base de données
    $db = self::connect();
    // Créer une chaîne de caractère contenant la requête à exécuter
    $sql = "INSERT INTO `".self::$table
    ."` ( `username` , `email` , `number`, `password` )"
    ." VALUES ('{$this->Username}','{$this->Email}','{$this->Phone}','{$this->Password}')";
   
    $requete = $db->prepare($sql);
    
    try{
        $resultat = $requete->execute();
        
        if($resultat)
        {
            return $db->lastInsertId();
        }
        else
        {
            return false;
        }
    }
    catch(PDOException $ex){
        die($ex->getMessage());
    }
}

public static function getByemail($email){
    // Se connecter à la base de données
    
    $db = self::connect();
    $sql = "SELECT * FROM ".self::$table." where ".self::$clePrimaire ." =  '$email' ";
    try{
        $resultat = $db->query($sql); // Exécuter la requêtes SQL
        if($resultat->rowCount() == 1){
            $record = $resultat->fetchObject();
            
            return $record;
        }
        else{
            return false;
        }
    }
    catch(PDOException $ex){
        die($ex->getMessage());
    }
    finally{
        // Libérer les ressources
        $resultat->closeCursor();
    }
}


public function update( $email){
    $db = self::connect();
    $sql="UPDATE " . self::$table." SET `email` = '{$this->Email}',`number` = '{$this->Phone}',`username` = '{$this->Username}',`password` = '{$this->Password}' where `email`='". $email."';";
    $requete = $db->prepare($sql);
    try{
        $resultat = $requete->execute();
        
        
        return $resultat;
    }
    catch(PDOException $ex){
        die($ex->getMessage());
    }

}

}


?>