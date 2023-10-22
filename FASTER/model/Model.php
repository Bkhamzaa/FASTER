<?php
require_once $ROOT . $DS . "Config/conf.php";


class Model {

    private $table; // Nom de la table
    private $clePrimaire; // Nom de la clé primaire
    protected static $db = null;


    public static function connect(){
        
        
        if(self::$db == null){
            try{
                self::$db = new PDO("mysql:host=" . conf::$HOST . ";dbname=" . conf::$DB, conf::$USER, conf::$PASSWORD);
                self::$db->query("SET NAMES 'utf8'");
            }
            catch(PDOException $exception){
                die($exception->getMessage());
            }
        }
        return self::$db;
    }

    /**
     * Lister tous les enregistrements d'une table
     *
     * @return array Liste des enregistrements trouvés
     */
    public function getAll(){
        // Se connecter à la base de données
        $db = self::connect();
        // Créer une chaîne de caractère contenant la requête à exécuter
        $sql = "SELECT * FROM " . $this->table;
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

    /**
     * Récupérer un enregistrement par son identifiant (clé primaire) unique
     *
     * @param int $id La valeur de la clé primaire
     * @return false si l'objet est introuvable sinon une instance de la classe en question
     */
    public function getById($id){
        // Se connecter à la base de données
        $db = self::connect();
        // Créer une chaîne de caractère contenant la requête à exécuter
        $sql = "SELECT * FROM {$this->table} where {$this->clePrimaire} = $id";
        
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

    /**
     * Supprimer un enregistrement par son identifiant (clé primaire) unique
     *
     * @param int $id La valeur de la clé primaire
     * @return int Nombre de ligne affectées par la la requête
     */
    public function delete($id){
        // Se connecter à la base de données
        $db = self::connect();
        // Créer une chaîne de caractère contenant la requête à exécuter
        $sql = "DELETE FROM {$this->table} WHERE {$this->clePrimaire} = $id";
        try{
            $resultat = $db->exec($sql);
            return $resultat;
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    /**
     * Insérer un enregistrement
     *
     * @param array $ligne Tableau associatif representant l'enregistrement à insérer
     * @return int Identifiant de la dernière ligne insérée
     */
    //public function insert(){
       /*  // Se connecter à la base de données
        $db = self::connect();
        // Créer une chaîne de caractère contenant la requête à exécuter
        $sql = "INSERT INTO {$this->table} (";
        foreach($ligne as $key=>$value){
            $sql .= $key. ",";
        }
        $sql = rtrim($sql, ",") . ") VALUES (";
        foreach($ligne as $key=>$value){
            $sql .= ":" . $key. ",";
        }
        $sql = rtrim($sql, ",") . ")";
        
        $requete = $db->prepare($sql);
    
        foreach($ligne as $key=>$value){
            $requete->bindValue($key, $value);

            

        }
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
        } */
    //}

    /**
     * Modifier un enregistrement
     *
     * @param array $ligne Tableau associatif representant l'enregistrement à remplacer
     * @param int $id clé primaire de la ligne à modifier
     * @return int Nombre de ligne affectées par la la requête
     */
     /*  public function update($ligne, $id){
        // Se connecter à la base de données
        $db = self::connect();
        // Créer une chaîne de caractère contenant la requête à exécuter
        $sql = "UPDATE {$this->table} SET ";
        foreach($ligne as $key=>$value){
            $sql .= $key . " = :" . $key . ",";
        }
        $sql = rtrim($sql, ",") . " WHERE " . $this->clePrimaire . " = :" . $this->clePrimaire;
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
    }  */
 






    












    
}

?>