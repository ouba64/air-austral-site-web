<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Liste des vols correspondant à votre recherche</title>
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
        <div id="content">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">


                    <?php
                    
                    

                    /*
                     * To change this license header, choose License Headers in Project Properties.
                     * To change this template file, choose Tools | Templates
                     * and open the template in the editor.
                     */

                    require_once("Dao.php");
                    session_start();
                    
                    $dao = Dao::getDao();
                    $criteres = $_GET;
                    $vols = $dao->getVols($criteres);
                    $classe = $criteres['classe'];
                    $nbPlaces = $criteres['nb_personnes'];
                    $placesTotalesDisponibles = $dao->getPlacesDisponiblesPourLesVols($vols, $classe, $nbPlaces);

                    $places = $placesTotalesDisponibles[0];
                    $vols = $placesTotalesDisponibles[1];
                    if (sizeof($vols) > 0) {
                        // sauvegarder les places et vols dans la session de sorte que ces informations
                        // soient disponible lors de l'affichage du détail du vol
                        $_SESSION['placess'] = $places;
                        $_SESSION['vols'] = $vols;
                        $_SESSION['nb_personnes'] = $nbPlaces;
                        ?>
                    <h6> Voila les vols que nous avons trouvés : </h6>
                        <?php
                        foreach ($vols as $vol) {
                            $duree = $vol->getDuree();
                            $heureDepart = $vol->getHeureDepart();
                            $heureArrivee = $vol->getHeureArrivee();
                            //$heureArrivee = $heureDepart + $duree;
                            echo "<div class = 'resultat'>";
                            echo "  <div>" . $vol->getAeDepart()->getNom() . "</div>";
                            echo "  <div>" . $vol->getAeArrivee()->getNom() . "</div>";
                            echo "  <div>" . $heureDepart->format('d-m-Y H:i') . "</div>";
                            echo "  <div>" . $heureArrivee->format('d-m-Y H:i') . "</div>";
                            echo "  <div>" . $duree->format("%H  %I") . "</div>";
                            echo "  <div>" . $vol->getNom() . "</div>";
                            echo "  <div class = 'cache'>" . $vol->getId() . "</div>";
                            echo "</div>";
                        }
                    } else {
                        ?>
                        <p> Désolé, aucun vol satisfaisant vos critères n'a été trouvé,
                            essayez avec un autre jour.</p>
                        <a class="btn btn-primary" href="page_accueil.php" role="button">Faire une nouvelle recherche</a> 


    <?php
}
?>


                    <script>
                        $("div.resultat").click(function () {
                            var id = jQuery(this).find(".cache").text();
                            location.href = 'login.php?idVol=' + id;
                        });
                    </script>


                </div>
            </div>
        </div>

    </body>
</html>
