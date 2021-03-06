<?php
require __DIR__.'/bootstrap.php';


//POST scenarijus - saskaitos sukurimas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'] ?? 0;   //paimam id, jeigu ji nera, tada grazinam 0.
    $id =(int) $id;   
       
    $balance = $_POST['balance'] ?? 0;
    $balance = (int) $balance;

    updateAdd($id,$balance,);
   
    header('Location: '.URL.'table.php'); // einam i lenteles puslapi
    die;
}

//GET scenarijus - 
if($_SERVER['REQUEST_METHOD'] =='GET'){
    $id = $_GET['id'] ?? 0;   //paimam id, jeigu ji nera, tada grazinam 0.
    $id =(int) $id;           // id priverstinai padarome int.
    $user = getAccount($id);
    if (!$user) {              //psisaugojam, jeigu tokio user id nera, redirectinam i index.php
        header('Location: '.URL.'index.php');
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
<title>Nuskaičiuoti lėšas</title>

<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./css/components/header.css">
<link rel="stylesheet" href="./public/css/app.css">

</head>
<body>


<div class="topnav">
<a class="active" href="<?=URL?>index.php">Pagrindinis</a>
<a href="<?=URL?>newAcc.php">Sukurti naują sąskaita</a>
<a href="<?=URL?>incoming.php">pridėti lėšas</a>
<a href="<?=URL?>cashOut.php">nuskaičiuoti lėšas</a>
<a href="<?=URL?>table.php">sąskaitų sąrašas</a>
</div>

<table id="customers">
  <tr>
    <th>Sąskaitos Nr.</th>
    <th>Vardas</th>
    <th>Pavardė</th>
    <th>Balansas</th>
    <th>Įrašyti sumą</th>
    <!-- <th>Nuskaičiuoti</th> -->
  </tr>
  <tr>
    <td><?=$user['acc'] ?></td>
    <td><?=$user['name'] ?></td>
    <td><?=$user['surname'] ?></td>
    <td><?=$user['balance'] ?></td>
    <td> 
    <form action="<?= URL ?>incoming.php?id=<?=$user['id'] ?>" method="post">
    <input type="number" value="-<?= $user['balance'] ?>" name="balance">
    <button type="submit">Nuskaičiuoti</button>
    </form>
    </td>
  </table>

  <h1>Nuskaičiuoti lėšas</h1>


</body>
</html>