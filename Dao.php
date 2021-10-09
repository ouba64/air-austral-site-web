<?php
require_once("./model/Aeroport.php");
require_once("./model/Pays.php");
require_once("./model/Vol.php");
require_once("./model/Classe.php");
require_once("./model/Place.php");
require_once("./model/Cb.php");
require_once("./model/PlaceReservee.php");
require_once("./gestion/Gestion.php");

//require_once("./model/Sujet.php") ;
require_once("./mappers/AeroportMapper.php");
require_once("./mappers/PaysMapper.php");
require_once("./mappers/VolMapper.php");
require_once("./mappers/ClasseMapper.php");
require_once("./mappers/CbMapper.php");
require_once("./mappers/GestionMapper.php");
//session_start();
/**
 * Classe d'accès aux données. 

 */
class Dao {

    private static $serveur = 'mysql:host=localhost'; //mysql2.alwaysdata.com
    private static $bdd = 'dbname=airaustral';  // lafleurppe_alex		
    private static $user = 'root';
    private static $mdp = '';
    private $monPdo;
    private static $dao = null;
    private static $gestion = null;
    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct() {
        try {
            $this->monPdo = new PDO(Dao::$serveur . ';' . Dao::$bdd, Dao::$user, Dao::$mdp);
            //  $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
            $this->monPdo->query("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /* //put your code here
      public function map($todo, $properties) {
      if (array_key_exists('id', $properties)) {
      $todo->setId($properties['id']);
      }
      if (array_key_exists('prenom', $properties)) {
      $todo->setPrenom($properties['prenom']);
      }
      if (array_key_exists('nom', $properties)) {
      $todo->setNom($properties['nom']);
      }
      } */

    public function _destruct() {
        $this->monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     *
     * Appel : $instancePdolafleur = $this->getEtudiantDao();
     * @return l'unique objet de la classe Dao
     */
    public static function getDao() {
        if(isset(Dao::$dao)){
            return Dao::$dao;
        }
        $dao =new Dao();
        Dao::$dao = $dao;
        return $dao;
    }
    
    public static function getGestionStatic() {
        if(isset(Dao::$gestion)){
            return Dao::$gestion;
        }
        $dao = Dao::getDao();
        $gestion = $dao->getGestion();
        Dao::$gestion = $gestion;
        return $gestion;
    }

    public function getVols($criteres) {
        $depart = $criteres['depart'];
        $arrivee = $criteres['arrivee'];
        $date_depart = $criteres['date_depart'];
        if(isset($criteres['date_retour'])){
            $date_retour = $criteres['date_retour'];
        }
        $nb_personnes = $criteres['nb_personnes'];
        //$animaux = $criteres['animaux_autorises'];
        $classe = $criteres['classe'];
        
        $sql = "SELECT v.id, v.heure_depart, v.idAvion, v.duree, v.nom, `ae_depart`, `ae_arrivee`, a1.`nom` as nom_ae_depart, a2.nom as nom_ae_arrivee
             FROM vol v, aeroport a1, aeroport a2
             WHERE v.`ae_depart` = a1.`id`
             AND v.`ae_arrivee` = a2.`id`
             AND ae_depart = $depart
             AND ae_arrivee= $arrivee
             AND date(heure_depart)='$date_depart'";
        try {
            $res = $this->monPdo->query($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $lesLignes = $res->fetchAll();
        $vols = array();
        foreach ($lesLignes as $row) {
            if (!$row) {
                return null;
            }
            $vol = new Vol();
            VolMapper::map($vol, $row, $this);
            array_push($vols, $vol);
        }
        return $vols;
    }
    
    
    public function getPlacesTotales($idAvion, $classe){
        /*$sql = "SELECT `place`.*\n"
        . "FROM `place`\n"
        . "WHERE (`place`.`idAvion` = $idAvion)"
        . "AND `place`.`idClasse` = $classe\n";*/
             
        $sql = "SELECT `place`.*\n"
        . "FROM `place`\n"
        . "WHERE `place`.`idAvion` = $idAvion AND `place`.`idClasse` =$classe\n";
        try {
            $res = $this->monPdo->query($sql);
        } 
        catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $lesLignes = $res->fetchAll();
        $vols = array();
        foreach ($lesLignes as $row) {
            if (!$row) {
                return null;
            }
            $id = $row['id'];
            $idAvion = $row['idAvion'];
            $idClasse = $row['idClasse'];
            $numero = $row['numero'];
            
            $vol = new Place($id,$idAvion,$idClasse,$numero);

            array_push($vols, $vol);
        }
        return $vols;  
    }
    
    public function getPlacesReservees($idVol, $classe){
        /*$sql = "SELECT `reservation`.`idClient`, `reservation`.`idVol`, `reservation`.`idPlace`\n"
        . "FROM `reservation`\n"
        . "WHERE (`reservation`.`idVol` =$idVol)\n";*/
        
        
        
        $sql = "SELECT `reservation`.`idClient` , `reservation`.`idVol` , `reservation`.`idPlace` , `place`.`id` , `place`.`idClasse` \n"
            . "FROM `reservation` , `place` \n"
            . "WHERE `reservation`.`idVol` = $idVol\n"
            . "AND `reservation`.`idPlace` = `place`.`id`\n"
            . "AND `place`.`idClasse` = $classe ";
        
        
        try {
            $res = $this->monPdo->query($sql);
        } 
        catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $lesLignes = $res->fetchAll();
        $vols = array();
        foreach ($lesLignes as $row) {
            if (!$row) {
                return null;
            }

            $idClient = $row['idClient'];
            $idVol = $row['idVol'];
            $idPlace = $row['idPlace'];
            $placeReservee = new PlaceReservee($idPlace, $idClient, $idVol);
            $vols[$idPlace]=$placeReservee;
        }
        return $vols;  
    }
    public function getPlacesDisponibles($vol, $classe){
        $placeDisponibles = array();
        $placesTotales = $this->getPlacesTotales($vol->getIdAvion(), $classe);
        $placesReservees = $this->getPlacesReservees($vol->getId(), $classe);
        foreach ($placesTotales as $place) {
            // si la place est disponible, la prendre
            if(!array_key_exists($place->getId(), $placesReservees)){
                array_push($placeDisponibles, $place);
            }
        }
        return $placeDisponibles;
    }
    
    /**
     * Donne la liste des places de la classe donnée en paramètre disponibles 
     * pour les vols donnés en paramètre.
     * @param type $vols
     * @param type $classe
     * @return type $paire Deux tableaux associatifs.
     * La 1ere entrée un tableau associatif qui donne pour chaque id de vol
     * la liste des places disponibles.
     * La 2e entrée est un tableau associatif qui donne pour chaque id de vol
     * l'objet Vol associé.
     */
    public function getPlacesDisponiblesPourLesVols($vols, $classe,$nbPlaces){
        $placesDisponiblesTotales = array();
        $id2Vol = array();

        // pour chaque vol, trouver les places disponibles
        foreach($vols as $vol){
            $placeDisponibles = $this->getPlacesDisponibles($vol, $classe);
            $placesDisponiblesTotales[$vol->getId()]  = $placeDisponibles;
            if(sizeof($placeDisponibles)>=$nbPlaces){
                $id2Vol[$vol->getId()] = $vol;
            }
        }
        
        $paire = array();
        $paire[0] = $placesDisponiblesTotales;
        $paire[1] = $id2Vol;
        return $paire;
    }
    
    

    public function getAeroportById($idAeroport) {
        $sql = "SELECT * FROM `aeroport` WHERE id = $idAeroport ";
        try {
            $res = $this->monPdo->query($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $row = $res->fetch();
        if (!$row) {
            return null;
        }
        $ae = new Aeroport();
        AeroportMapper::map($ae, $row, $this);
        return $ae;
    }
    
    /**
     * Retourne un object Gestion, qui represente la politique tarifaire
     * en vigueur de la compagnie aérienne.
     * @return \Gestion
     */
    public function getGestion() {
        $sql = "SELECT * FROM `gestion`";
        try {
            $res = $this->monPdo->query($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $row = $res->fetch();
        if (!$row) {
            return null;
        }
        $gestion = new Gestion();
        GestionMapper::map($gestion, $row, $this);
        return $gestion;
    }
    
        /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     *
     * @return le tableau associatif des catégories 
     */
    public function getAeroports() {
        $sql = "SELECT * FROM `aeroport`";
        try {
            $res = $this->monPdo->query($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $lesLignes = $res->fetchAll();
        $aeroports = array();
        foreach ($lesLignes as $row) {
            if (!$row) {
                return null;
            }
            $aeroport = new Aeroport();
            AeroportMapper::map($aeroport, $row, $this);
            array_push($aeroports, $aeroport);
        }
        return $aeroports;
    }
    
    public function getClasses() {
        $sql = "SELECT * FROM `classe`";
        try {
            $res = $this->monPdo->query($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $lesLignes = $res->fetchAll();
        $aeroports = array();
        foreach ($lesLignes as $row) {
            if (!$row) {
                return null;
            }
            $classe = new Classe();
            ClasseMapper::map($classe, $row, $this);
            array_push($aeroports, $classe);
        }
        return $aeroports;
    }

    
    public function getClasseById($idClasse) {
        $sql = "SELECT * FROM `classe` WHERE id = $idClasse ";
        try {
            $res = $this->monPdo->query($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $row = $res->fetch();
        if (!$row) {
            return null;
        }
        $classe = new Classe();
        ClasseMapper::map($classe, $row, $this);
        return $classe;
    }

    public function getPaysById($idPays) {
        $sql = "SELECT * FROM `pays` WHERE id = $idPays ";
        try {
            $res = $this->monPdo->query($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $row = $res->fetch();
        if (!$row) {
            return null;
        }
        $ae = new Pays();
        PaysMapper::map($ae, $row, $this);
        return $ae;
    }
    
    public function getCbById($idPays) {
        $sql = "SELECT * FROM `cb` WHERE id = $idPays ";
        try {
            $res = $this->monPdo->query($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $row = $res->fetch();
        if (!$row) {
            return null;
        }
        $ae = new Cb();
        CbMapper::map($ae, $row, $this);
        return $ae;
    }

    
    public function login($login, $mdp) {
        $req = "SELECT * FROM personne where email='$login' and mdp='$mdp'";
        $res = $this->monPdo->query($req);
        $ligne = $res->fetch();
        $estConnecte = false;
        if ($ligne['email'] == $login and $ligne['mdp'] == $mdp) {
            $_SESSION['utilisateur'] = $ligne;
            $estConnecte = true;
        }
        return $estConnecte;
    }
    
    public function getCbs($idClient) {
        $sql = "SELECT * FROM `cb` WHERE idClient = $idClient ";
        try {
            $res = $this->monPdo->query($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $lesLignes = $res->fetchAll();
        $cbs = array();
        foreach ($lesLignes as $row) {
            if (!$row) {
                return null;
            }
            $cb = new Cb();
            CbMapper::map($cb, $row, $this);
            array_push($cbs, $cb);
        }
        return $cbs;

    }
    
    public function enregistrerCb($nom, $numero, $expiration, $cvv, $idClient) {
        $sql = "INSERT INTO `airaustral`.`cb` (`id`, `nom`, `numero`, `expiration`, `cvv`,`idClient`) "
                . "VALUES (NULL, '$nom', '$numero', '$expiration', '$cvv','$idClient');";

        try {
            $res = $this->monPdo->exec($sql);
        } 
        catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        return $res;
    }
    
    public function enregistrerReservations($vol, $places,$idClient ){
        $sql = "INSERT INTO `airaustral`.`reservation` "
                . "(`idClient`, `idVol`, `idPlace`) VALUES ";

        
        $values = array();
        $idVol = $vol->getId();
        foreach($places as $place){
            $idPlace = $place->getId();
            array_push($values, "('$idClient', '$idVol', '$idPlace')");
        }
        $valuesS = implode(",", $values);
        $sql = $sql . $valuesS;
        try {
            $res = $this->monPdo->exec($sql);
        } 
        catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        return $res;
    }
    

    

}
?>