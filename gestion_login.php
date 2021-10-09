<?php
   session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Liste des étudiants</title>
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
        include_once 'header.php';
        require_once("Dao.php");
        
        $dao = Dao::getDao();
        $login = $_POST["logi"];
        $mdp = $_POST["mdp"];
        $idVol  = $_POST["idVol"];
        $connexionReussie = $dao->login($login, $mdp);
  
        // si on a trouvé un étudiant le login est bon
        if($connexionReussie){
            header("location: page_detail_reservation.php?idVol=$idVol");
        }
        // les identifiants sont pas bon, ramener l'utilisateur à la page de login
        else{
            header("location: index.php");
        }
       
        ?>

    </body>
</html>