<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Les détails de votre réservation</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/airaustral.css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>   
    </head>

    <body>
        <?php

        include_once 'header.php';
        ?>
        <?php

        require_once("Dao.php");
        require_once("./gestion/Gestion.php");
        require_once("./model/Aeroport.php");
        require_once("./model/Pays.php");
        require_once("./model/Vol.php");
        require_once("./model/Classe.php");
        require_once("./model/Place.php");
        require_once("./model/PlaceReservee.php");
        session_start();
        ?>
        
        <div id="content">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    
                    
        <?php
        
        $gestion = Dao::getGestionStatic();
        $dao =Dao::getDao();
        $idVol = $_GET['idVol'];
        $placess = $_SESSION['placess'];
        $vols = $_SESSION['vols'];
        $nbPlaces = $_SESSION['nb_personnes'];
        // toutes les places disponibles sur le vol
        $toutesLesPlaces = $placess[$idVol];
        // les places assignées à cette réservation
        $places = $gestion->choisirPlaces($toutesLesPlaces, $nbPlaces);
        $_SESSION['places']=$places;
        $vol = $vols[$idVol];
        
        $duree = $vol->getDuree();
        $heureDepart = $vol->getHeureDepart();
        $heureArrivee=$vol->getHeureArrivee();
        
        
        ?>
        <h3> Voila les détails de votre réservation </h3>
        <table class='table'>
            <tr>
                <td>Départ</td>
                <td><?php echo $vol->getAeDepart()->getNom(); ?></td>
            </tr>
            <tr>
                <td>Arrivée</td>
                <td><?php echo $vol->getAeArrivee()->getNom(); ?></td>
            </tr>
            <tr>
                <td>Jour et heure de départ</td>
                <td><?php echo $heureDepart->format('d-m-Y H:i'); ?></td>
            </tr>
            <tr>
                <td>Jour et heure d'arrivée</td>
                <td><?php echo $heureArrivee->format('d-m-Y H:i'); ?></td>
            </tr>
            <tr>
                <td>Durée</td>
                <td><?php 
                    echo ($duree->format('%I mn')); 
                    ?>
                </td>
            </tr>
            <tr>
                <td>Nombre de personnes</td>
                <td><?php echo sizeof($places); ?></td>
            </tr>
            <tr>
                <td>Places et tarif</td>
                <td>
                    <table style="width:100%" class='table'>
                        <tr>
                            <th>N°</th>
                            <th>Classe</th> 
                            <th>Tarif</th>
                        </tr>
                        <?php
                        // pour l'affichage de la monnaie en euro
                        setlocale(LC_MONETARY, 'fr_FR');
                        $prixTotal = 0;
                        foreach($places as $place){
                            $classe = $dao->getClasseById($place->getIdClasse());
                            $place->setClasse($classe);
                            echo "<tr>";
                            echo "    <td>".$place->getNumero()."</td>";
                            echo "    <td>".$classe->getNom()."</td>";
                            $prix = $gestion->calculerTarif($place, $vol);
                            $prixTotal+=$prix;
                            echo "<td> ".Gestion::afficherPrix($prix) ."</td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>

                </td>
            </tr>

            <tr>
                <td>N° du vol</td>
                <td> <?php echo $vol->getNom(); ?>  </td>
            </tr>
      
            <tr>
                <td>Prix total</td>
                <td><?php echo Gestion::afficherPrix($prixTotal); ?></td>
            </tr>
        </table>
        <a class="btn btn-primary" href="page_paiement.php?idVol='<?php echo $idVol;?>'" role="button">Choisir et aller à la page de paiement</a>
        
        
                </div>
            </div>
        </div>
        
    </body>
</html>