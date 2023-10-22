<?php
require_once "Model.php";

class Company extends Model  {


protected static $table = 'Company';
protected static $clePrimaire = "tax_registration_n";



private string $Tax_registration_n ;
private string $Business_name;
private string $Email;
private string $Password;
private int $Phone;

    public function __construct($tax_registration_n,$business_name,$email,$password,$number)
    {
    
    $this->Tax_registration_n =$tax_registration_n;
    $this->Business_name =$business_name;
    $this->Email =$email;
    $this->Password =$password;
    $this->Phone =$number;
    
    }



    public function getTax_registration_n(){
        return $this->Tax_registration_n;
    }
    public function getBusiness_name(){
        return $this->Business_name;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getPassword(){
        return $this->Password;
    }
    public function getPhone(){
        return $this->Phone;
    }






public static function getBytax_n($tax_registration_number){
    // Se connecter à la base de données
    $db = self::connect();
    // Créer une chaîne de caractère contenant la requête à exécuter
    $sql = "SELECT * FROM ".Self::$table." where ". self::$clePrimaire." = '$tax_registration_number' ";
    echo $sql;
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
public function update($tax_registration_n){
    $db = self::connect();
    $sql="UPDATE " . self::$table." SET `email` = '{$this->Email}',`number` = '{$this->Phone}',`business_name` = '{$this->Business_name}',`password` = '{$this->Password}',`tax_registration_n` = '{$this->Tax_registration_n}' where `tax_registration_n`='". $tax_registration_n."';";
    //echo $sql;
    $requete = $db->prepare($sql);
    try{
        $resultat = $requete->execute();
        
        
        return $resultat;
    }
    catch(PDOException $ex){
        die($ex->getMessage());
    }

}
public function insert(){
    // Se connecter à la base de données
    $db = self::connect();
    // Créer une chaîne de caractère contenant la requête à exécuter
    $sql = "INSERT INTO `".self::$table
    ."` ( `tax_registration_n` , `business_name` , `email`, `password`, `number` )"
    ." VALUES ('{$this->Tax_registration_n}','{$this->Business_name}','{$this->Email}','{$this->Password}','{$this->Number}')";
   
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
/* public function update($ligne, $id){
    // Se connecter à la base de données
    $db = self::connect();
    // Créer une chaîne de caractère contenant la requête à exécuter
    $sql = "UPDATE {$this->table} SET ";
    foreach($ligne as $key=>$value){
        $sql .= $key . " = :" . $key . ",";
    }
    $sql = rtrim($sql, ",") . " WHERE " . $this->clePrimaire . " = :" . $id;
    echo $sql;
    $requete = $db->prepare($sql);
    foreach($ligne as $key=>$value){
        $requete->bindValue($key, $value);
    }
    $requete->bindValue($this->clePrimaire, $id);
    try{
        $resultat = $requete->execute();
        return $resultat;
    }
    catch(PDOException $ex){
        die($ex->getMessage());
    }
}
 */
}



