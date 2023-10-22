<?php
require_once "Model.php";

class Delivery_person extends Model {


    protected  $table = 'Delivery_person';
    protected $clePrimaire = "cin";

    










public function getBycin($cin){
    // Se connecter à la base de données
    $db = self::connect();
    // Créer une chaîne de caractère contenant la requête à exécuter
    $sql = "SELECT * FROM {$this->table} where {$this->clePrimaire} = '$cin'";
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































}




?>