<?php
require __DIR__.'/bootstrap.php';
//POST scenarijus - saskaitos sukurimas

if(!empty($_POST)){
    if(($_POST['name'] === '') || ($_POST['surname'] === '') || ($_POST['acc'] === '') || ($_POST['personalId'] === '')){
        $_SESSION['message'] = 'Įveskite visus duomenis!';
         header ('Location: ' . URL .'newAcc.php');
        die;
    } else if
($_SERVER['REQUEST_METHOD'] == 'POST') {
    $saskaita = $_POST["name"] ?? 0;
    $balance = $_POST['balance']?? 0;  // pasidariau sita, kad pradine saskaita butu = 0
    // $saskaita = (int) $saskaita;
    create($_POST['name'],$_POST['surname'],$_POST['acc'], $_POST['personalId'], $balance);
    $_SESSION['message'] = 'Sąskaita pridėta!';
    header ('Location: ' . URL .'newAcc.php'); // einam i lenteles puslapi
    die;
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nauja Sąskaita</title>

<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./css/components/header.css">
<!-- <link rel="stylesheet" href="./public/css/app.css"> -->

</head>
<body>
<div class="topnav">
<a class="active" href="<?=URL?>index.php">Pagrindinis</a>
<a href="<?=URL?>newAcc.php">Sukurti naują sąskaita</a>
<!-- <a href="<?=URL?>incoming.php">pridėti lėšas</a>
<a href="<?=URL?>cashOut.php">nuskaičiuoti lėšas</a> -->
<a href="<?=URL?>table.php">sąskaitų sąrašas</a>
</div>

<div>
    <h1 style="color: red;"> <?= $_SESSION['message'] ?? '' ?> </h1>
    <?php unset($_SESSION['message']); ?>
</div>
<form class="newacc" action="<?=URL?>newAcc.php" method="post">
    <h2>Sukurti naują sąskaita</h2>
    <div class="input">
        <label for="name">Vardas:</label>
        <input type="text" name="name" minlength ="4" placeholder="Vardas" id="name" value="">
        <!-- <span>Vardas error</span> -->
    </div>
    <div class="input">
        <label for="surname">Pavardė:</label>
        <input type="text" name="surname" minlength ="4") placeholder="Pavardė" id="surname" value="">
        <!-- <span>Pavardė error</span> -->
    </div>
    <div class="input">
        <label for="acc">Sąskaitos Numeris:</label>
        <input type="text" readonly name="acc" placeholder="Sąskaitos Numeris" id="acc" value="<?=accountNumber()?>">
        <!-- <span>Sąskaitos Numeris error</span> -->
    </div>
    <div class="input">
        <label for="personalId">a/k kodas:</label>
        <input type="text" name="personalId" placeholder="a/k kodas" id="personalId" value="">
        <!-- <span>a/k kodas error</span> -->
    </div>
    <div class="submit">
        <input class="btn" type="submit" name="newacc" value="Patvirtinti">
    </div>
</form>

</body>
</html>