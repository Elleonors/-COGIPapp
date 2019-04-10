<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=COGIP;charset=utf8', 'elleonors', 'BEcode2019');
} catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
}
$resultat = $bdd->query('SELECT * FROM facture');
$facture = $resultat->fetchAll();
$resultat = $bdd->query('SELECT * FROM societe');
$societe = $resultat->fetchAll();
$resultat->closeCursor();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="assets/img/cogip.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-image: url("../assets/img/landing-page.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        } img {
            height: 15vh;
        } .container {
            padding-top: 2vh;
            margin-top: 2vh;
            background-color: rgba(158, 204, 137, 0.6);
            border-radius: 15px;
        } #container{
            margin-top : 10vh;
        }
    </style>
    <title>COGIP APP</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="offset-md-3 text-center col-md-6">
                        <a href="main.php"><img src="../assets/img/cogip.png" alt="cogip icon"></a>
                    </div>
                    <div class="col-md-2 border border-dark rounded">
                        <p class="text-center">Connecté !</p>
                        <p class="text-center">jean-christian RANU</p>
                    </div>
                </div>
                <div class="row text-center" id="container">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <h2>DATE</h2>
                                <?php
                                    foreach ($facture as $value) { ?>
                                        <div class="row">
                                            <div class="col-md-12">  <!-- select date from facture -->
                                                <p> <?=$value['date']?> </p>
                                            </div>
                                        </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-4">
                                <h2>NOM-DE-SOCIETE</h2>
                                    <?php
                                    foreach ($societe as $value) { ?>
                                        <div class="col-md-12">  <!-- select nom from societe -->
                                            <p> <?=$value['nom']?> </p>        
                                        </div>
                                    <?php } ?>
                            </div>
                            <div class="col-md-4">
                                <h2>NUMERO DE FACTURE</h2>
                                <?php
                                foreach ($facture as $value) { ?>
                                    <div class="col-md-2">  <!-- select numero from facture -->
                                        <p> <?=$value['numero']?> </p>
                                    </div>
                                <?php } ?>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>