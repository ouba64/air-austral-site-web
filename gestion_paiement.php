<?php
    require_once("./model/Cb.php");
    require_once("./model/Vol.php");
    require_once("./model/Place.php");
    require_once("./model/Classe.php");
    require_once("./gestion/Gestion.php");
   session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Paiement</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>


    <body>
        <?php
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */
        require_once("Dao.php");
        $dao = Dao::getDao();
        $type = $_POST["type"];
        $idClient = $_SESSION['utilisateur']['id'];
        // enregistrement d'une nouvelle carte
        if($type=='nouvelle'){
            $nom = $_POST["nom"];
            $numero = $_POST["numero"];
            $expiration  = $_POST["expiration"];
            $cvv = $_POST["cvv"];
            $cb = new Cb();
            $cb->setCvv($cvv);
            $cb->setExpiration($expiration);
            $cb->setNom($nom);
            $cb->setNumero($numero);

            // enregistrerCb($nom, $numero, $expiration, $cvv, $idClient)
            $ok = $dao->enregistrerCb($nom, $numero, $expiration, $cvv, $idClient);   
            $parametres = "enregistrer=$ok";
        }
        // utilisation d'une carte déjà enregistrée
        else{
            $id = $_POST["cb"];
            $cb = $dao->getCbById($id);
        }   
        $gestion = new Gestion();
        $ok = $gestion->debiterCompte($cb);
        // enregistrer la réservation (assigner les places, etc.
        if($ok){
            $idVol = $_POST["idVol"];     
            $vols = $_SESSION['vols'];
            // les places assignées à la réservation du client
            $places = $_SESSION['places'];
            $vol = $vols[$idVol];
            $nbPlaces = $_SESSION['nb_personnes'];

            $dao->enregistrerReservations($vol, $places,$idClient );
        }
        if(isset($parametres)){
            $parametres = $parametres."&debiter=$ok";
        }
        else{
            $parametres = "debiter=$ok";
        }
        header("location: page_resultat_paiement.php?$parametres");  
        ?>

    </body>
</html>