<?php
ob_start();
session_start();
if (isset($_SESSION['utilisateur'])) {
    // si idVol est donné, l'execution de cette page PHP est faite à 
    // partir de 
    if(isset($_GET['idVol'])){
        $idVol = $_GET['idVol'];
        header("Location: page_detail_reservation.php?idVol=$idVol");
    }
    else{
        header("Location: page_accueil.php");
    }
    exit;
}
?>


<html lang = "en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Inscrivez-vous</title>
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

    <body class="text-center">
        <?php
        include_once 'header.php';

        ?>
        <div class = "container">

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <h1 class="h3">Entrez vos identifiants pour vous connecter</h1> 
                    <form class = "form-signin" role = "form" 
                          action = "gestion_login.php" method = "post">
                        <label for="logi" class="sr-only">Adresse email</label>
                        <input class="form-control" type="text" name="logi" required autofocus> <br>

                        <label for="mdp" class="sr-only">Mot de passe</label>
                        <input type = "password" class = "form-control"
                               name = "mdp"  required></br>
                        <?php
                        if(isset($_GET['idVol'])){
                            $idVol = $_GET['idVol'];
                            echo "<input type='hidden' id='idVol' name='idVol' value='$idVol'>";
                        }                        
                        ?>
                        <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
                                name = "login">Connexion</button>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div> 
    </body>
</html>