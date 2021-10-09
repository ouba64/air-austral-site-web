<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Effectuez votre paiement</title>
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
        
         
        <p>Vous pouvez à présent effectuer votre paiement en toute sécurité.</p>
        <?php
           
            
            session_start();
            require_once("Dao.php");
            function afficherRadiosCb($cbs){
                $i=0;
                foreach ($cbs as $cb){
                    if($i==0){
                        $selected = "checked";
                    }
                    else{
                        $selected = "";
                    }
                    echo "<input type='radio' name = 'cb' value = ".$cb->getId()." $selected>" . $cb->getNomMasque() . "</option><br>";
                    $i++;
                }
                echo "<br>";
            }
            $dao =Dao::getDao();
            $idClient = $_SESSION['utilisateur']['id'];
            $idVol = $_GET['idVol'];
            $cbs = $dao->getCbs($idClient);
            if(sizeof($cbs)>0){
        ?>   
        <h4>Utilisez l’une des cartes bancaires déjà enregistrées :</h4>
            <form method='post' action="gestion_paiement.php">
                <?php
                
                 afficherRadiosCb($cbs);
                ?>
                <input type='hidden' name='type' value = 'ancienne'>
                <input type='hidden' name='idVol' value = <?php echo $idVol; ?>>
                <input type="submit" value="Payer">
            </form>
        <?php
            }
        ?>
            
        
        <h4>Enregistrer une nouvelle carte et effectuer le paiement avec :</h4>
        <form method='post' action="gestion_paiement.php">
            Nom du titulaire de la carte:<br>
            <input type="text" name="nom">
            <br>
            Numéro de la carte:<br>
            <input type="text" name="numero">
            <br>
            Expiration:<br>
            <input type="text" name="expiration">
            <br>
            CVV:<br>
            <input type="text" name="cvv" >
            <br>   
            <input type='hidden' name='type' value="nouvelle">
            <input type='hidden' name='idVol' value = <?php echo $idVol; ?>>
            <input type="submit" value="Enregistrer et payer">
         </form> 
        
         
                </div>
            </div>
        </div>
         
    </body>
</html>