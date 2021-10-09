<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Résultat de l'opération</title>
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
        session_start();

        $enregistrer = false;
        $debiter = false;
        $eok = false;
        if(isset($_GET['enregistrer'])){
            $eok = $_GET['enregistrer'];
            $enregistrer = true;
        }
        if(isset($_GET['debiter'])){
            $dok = $_GET['debiter'];
            $debiter = true;
        }
        ?>
        
        <?php if ($enregistrer) { ?>
            <?php if ($eok) { ?>
            <p>Votre carte a été enregistrée avec succès.</p>
            <?php } else { ?>
            <p>Les identifiants de cartes bancaires donnés semblent être incorrects.  </p>           
            <?php } ?>
        <?php } ?>
        
        <?php if ($debiter) { ?>
            <?php if ($dok) { ?>
            <p>Votre réservation a été effectuée avec succès.</p>
            <?php } else { ?>
            <p> Votre établissement bancaire n'a pas accepté le débit de votre
            carte.</p>
            <?php } ?>
        <?php } ?>
        
                <a class="btn btn-primary" href="page_accueil.php" role="button">Revenir à la page d'accueil</a>  
                
                </div>
            </div>
        </div>
    </body>
</html>