
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

