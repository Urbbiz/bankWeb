<?php

require __DIR__.'/bootstrap.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagrindinis</title>
    <link rel="stylesheet" href="./css/components/header.css?ver=<?= time() ?>">
    <link rel="stylesheet" href="./public/css/app.css?ver=<?= time() ?>">
    <link rel="stylesheet" href="./css/components/firstpg.css?ver=<?= time() ?>">
    <link rel="stylesheet" href="./css/main.css?ver=<?= time() ?>">
    
</head>
<body>

<div class="topnav">
<a class="active" href="<?=URL?>index.php">Pagrindinis</a>
<a href="<?=URL?>newAcc.php">Sukurti naują sąskaita</a>
<!-- <a href="<?=URL?>incoming.php">pridėti lėšas</a>
<a href="<?=URL?>cashOut.php">nuskaičiuoti lėšas</a> -->
<a href="<?=URL?>table.php">sąskaitų sąrašas</a>
</div>

    
    <!-- <img class="background" src="./img/<?=$backgroundImage?>" alt=""> -->
    <div style="text-align: center;">
        <h1>SVEIKI ATVYKĘ</h1> 
    </div>
       
        

</body>
</html>