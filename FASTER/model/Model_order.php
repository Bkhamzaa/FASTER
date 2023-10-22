
<?php
require_once "Model.php";

class Order extends Model  {

    protected  $table = 'order_company';
    protected $clePrimaire = "id";
    public $order_id = "order_id";
    public $id_d_person = "id_d_person";
    public $id_client = "id_client";

    private string $Name_company ;
    private string $Order_id;
    private string $Id_d_person;
    private string $Tracking_order;
    private string $Delivery;
    private string $Name_client;
    private string $Num_client;
    private string $Payment;
    private string $Total;
    private string $Delivery_status;
    private string $Date;
    private string $Id_client;
    

    public function getName_company(){
        return $this->Name_company;
    }
    public function getOrder_id(){
        return $this->Order_id;
    }
    public function getId_d_person(){
        return $this->Id_d_person;
    }
    public function getTracking_order(){
        return $this->Tracking_order;
    }
    public function getDelivery(){
        return $this->Delivery;
    }
    public function getName_client(){
        return $this->Name_client;
    }
    public function getNum_client(){
        return $this->Num_client;
    }
    public function getPayment(){
        return $this->Payment;
    }
    public function getTotal(){
        return $this->Total;
    }
    public function getDelivery_status(){
        return $this->Delivery_status;
    }
    public function getDate(){
        return $this->Date;
    }
    public function getId_client(){
        return $this->DaId_clientte;
    }




    

    public function getlist($order_id_company){
        // Se connecter à la base de données
        $db = self::connect();
        // Créer une chaîne de caractère contenant la requête à exécuter
        $sql = "SELECT * FROM {$this->table} where {$this->order_id} = $order_id_company";
        $liste = [];
        try{
            $resultat = $db->query($sql); // Exécuter la requêtes SQL
            $liste = $resultat->fetchAll(PDO::FETCH_CLASS, get_class($this));
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
        finally{
            // Libérer les ressources
            $resultat->closeCursor();
        }
        return $liste;
    }


    public function get_order_disp(){
        // Se connecter à la base de données
        $db = self::connect();
        // Créer une chaîne de caractère contenant la requête à exécuter
        $sql = "SELECT * FROM   {$this->table} where id_d_person IS NULL ";
        $liste = [];
        try{
            $resultat = $db->query($sql); // Exécuter la requêtes SQL
            $liste = $resultat->fetchAll(PDO::FETCH_CLASS, get_class($this));
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
        finally{
            // Libérer les ressources
            $resultat->closeCursor();
        }
        return $liste;
    }

    public function updatee($ligne, $id){
        // Se connecter à la base de données
        $db = self::connect();
        // Créer une chaîne de caractère contenant la requête à exécuter
        $sql = "UPDATE {$this->table} SET ";
        foreach($ligne as $key=>$value){
            $sql .= $key . " = :" . $key . ",";
        }
        $sql = rtrim($sql, ",") . " WHERE " . $this->clePrimaire . " = :id";
        $requete = $db->prepare($sql);
        foreach($ligne as $key=>$value){
            $requete->bindValue($key, $value);
        }
        $requete->bindValue(':id', $id);
        try{
            $resultat = $requete->execute();
            
            return $resultat;
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
        public function update_id_client($ligne, $id){
            // Se connecter à la base de données
            $db = self::connect();
            // Créer une chaîne de caractère contenant la requête à exécuter
            $sql = "UPDATE {$this->table} SET ";
            foreach($ligne as $key=>$value){
                $sql .= $key . " = :" . $key . ",";
            }
            $sql = rtrim($sql, ",") . " WHERE " . $this->id_client . " = :id";
            $requete = $db->prepare($sql);
            foreach($ligne as $key=>$value){
                $requete->bindValue($key, $value);
            }
            $requete->bindValue(':id', $id);
            try{
                $resultat = $requete->execute();
                
                return $resultat;
            }
            catch(PDOException $ex){
                die($ex->getMessage());
            }
        }

public function getbyId_d_per($id_d_persen){
    // Se connecter à la base de données
    $db = self::connect();
    // Créer une chaîne de caractère contenant la requête à exécuter
    $sql = "SELECT * FROM {$this->table} where {$this->id_d_person} = $id_d_persen";
    $liste = [];
    try{
        $resultat = $db->query($sql); // Exécuter la requêtes SQL
        $liste = $resultat->fetchAll(PDO::FETCH_CLASS, get_class($this));
    }
    catch(PDOException $ex){
        die($ex->getMessage());
    }
    finally{
        // Libérer les ressources
        $resultat->closeCursor();
    }
    return $liste;
}

public function getById_client($id){
    // Se connecter à la base de données
    $db = self::connect();
    // Créer une chaîne de caractère contenant la requête à exécuter
    $sql = "SELECT * FROM {$this->table} where id_client = $id";
    $liste = [];
    
    try{
        $resultat = $db->query($sql); // Exécuter la requêtes SQL
        $liste = $resultat->fetchAll(PDO::FETCH_CLASS, get_class($this));
    }
    catch(PDOException $ex){
        die($ex->getMessage());
    }
    finally{
        // Libérer les ressources
        $resultat->closeCursor();
    }
    return $liste;
}

public function getById_traking($id){
    // Se connecter à la base de données
    $db = self::connect();
    // Créer une chaîne de caractère contenant la requête à exécuter
    $sql = "SELECT * FROM {$this->table} where tracking_order = '$id'";
    
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
