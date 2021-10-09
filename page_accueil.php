
<!DOCTYPE HTML>
<html>
    <head>
        <title>Accueil</title>
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
            require_once("Dao.php");
            session_start();
            

            ?>
        <div id="content" class="container">
            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- The slideshow -->
                <div class="carousel-inner">
                    
                    <div class="carousel-item active">
            
                        <img src="images/caroussel/b1.png" alt="Los Angeles" width="1100" height="400">
                                 
            <?php
            if (isset($_SESSION['utilisateur'])) {
                $utitilisateur = $_SESSION['utilisateur']['prenom'] . " " . $_SESSION['utilisateur']['nom'];
                echo "Bienvenue $utitilisateur";
                echo " <a class='utilisateur' href = 'logout.php' title = 'Logout'>Me déconnecter </a>";
            }
            ?>  
                 
                    </div>
                    <div class="carousel-item">
                        <img src="images/caroussel/b2.png" alt="Los Angeles" width="1100" height="400">
                    </div>
                    <div class="carousel-item">
                        <img src="images/caroussel/b3.png" alt="Los Angeles" width="1100" height="400">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <br>
            <h1 style="text-align: center;">ENTREZ VOS CRITÈRES</h1>       <h3><center>Envolez vous avec Air Austral !<center></h3> <p><center> la meilleure façon de voyager dans toute la partie australe du globe<center></p>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="search-bar">
                    
                        <div> 
                            <form action="page_resultats_vol.php" method="get">
                                Lieu de départ:    
                                <?php
                                require_once("Dao.php");
                                // effacer les résultats de la recherche précedente de la session
                                $elements = array("placess", "places", "nb_personnes", "vols");

                                foreach ($elements as $element) {
                                    if (isset($_SESSION[$element])) {
                                        unset($_SESSION[$element]);
                                    }
                                }

                                function afficherOptionsAeroports($name, $idDefault) {
                                    echo "<select name=$name >";
                                    $dao = Dao::getDao();
                                    $aeroports = $dao->getAeroports();
                                    foreach ($aeroports as $aeroport) {
                                        if ($aeroport->getId() == $idDefault) {
                                            $selected = "selected";
                                        } else {
                                            $selected = '';
                                        }
                                        echo "<option value = " . $aeroport->getId() . " $selected>" . $aeroport->getNom() . " | " . $aeroport->getPays()->getNom() . "</option>";
                                    }
                                    echo "</select>";
                                    //echo "<br>";
                                }

                                function afficherOptionsClasses($idDefault) {
                                    echo "<select name='classe' >";
                                    $dao = Dao::getDao();
                                    $aeroports = $dao->getClasses();

                                    foreach ($aeroports as $aeroport) {
                                        if ($aeroport->getId() == $idDefault) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }
                                        echo "<option value = " . $aeroport->getId() . " $selected>" . $aeroport->getNom() . "</option>";
                                    }
                                    echo "</select>";
                                    echo "<br>";
                                }

                                afficherOptionsAeroports("depart", 1);
                                ?>

                                Lieu d'arrivée :    
                                <?php
                                afficherOptionsAeroports("arrivee", 2);
                                ?>
                                <br><br>
                                Date de départ: <input type='date' name='date_depart'>

                                Nombre de personnes : <input type="text" name="nb_personnes" value="1"><br>     
                                <br>
                                Classe :
                                <?php
                                afficherOptionsClasses(2);


                                ?>
                                <br>
                                <input  class="btn btn-primary"  role="button"  type="submit" value ="Chercher">
                            </form>
                        </div>
                         
                    </div>
                </div>
            </div>
            <br>
            <h1 style="text-align: center;">DESTINATIONS PHARES  </h1>

            <br>
            <div class="row">
                <div class="col-sm-4">
                    <div class="dest">
                        <img src="images/caroussel/paris.png">
                        <h3>PARIS</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dest">
                        <img src="images/caroussel/kwt.png">
                        <h3>KUWAIT CITY</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dest">
                        <img src="images/caroussel/inde.png">
                        <h3>INDIA</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dest">
                        <img src="images/caroussel/dxb.png">
                        <h3>DUBAI</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dest">
                        <img src="images/caroussel/reu.png">
                        <h3>REUNION</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dest">
                        <img src="images/caroussel/seyc.png">
                        <h3>SEYCHELLES</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dest">
                        <img src="images/caroussel/mia.png">
                        <h3>MIAMI</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dest">
                        <img src="images/caroussel/mada.png">
                        <h3>MADAGASCAR</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dest">
                        <img src="images/caroussel/bali.png">
                        <h3>BALI</h3>
                    </div>
                </div>
            </div>
    </body>
</html>

