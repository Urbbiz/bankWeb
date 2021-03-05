<?php
require __DIR__.'/bootstrap.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/components/table.css">
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
    <th>a/k kodas</th>
    <th>Papildyti</th>
    <th>Nuskaičiuoti</th>
    <th>ištrinti</th>
  </tr>

  <?php foreach(readData() as $user) : ?>
    <tr>
    <td><?=$user['acc'] ?></td>
    <td><?=$user['name'] ?></td>
    <td><?=$user['surname'] ?></td>
    <td><?=$user['personalId'] ?></td>
    <td><a class="add" href="<?=URL?>incoming.php?id=<?=$user['id']?>">Pridėti</a></td>
    <td><a class="add" href="<?=URL?>cashOut.php?id=<?=$user['id']?>">Atimti</a></td>
    <td>
           <form action="<?=URL?>delete.php?id=<?=$user['id']?>" method="post">         
        <button type="submit" class="btn delete">Ištrinti</button>
        </form></td>
              
  </tr>

    <?php endforeach?>
  <!-- <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr> -->
  <!-- <td><a class="add" href="add.php?userNR=<?= $key ?>">Pridėti</a></td>
                    <td><a class="cashout" href="cashout.php?userNR=<?= $key ?>">Nuskaičiuoti</a></td>
                    <td><form action="<?= URL ?>delete.php?id=<?= $user['acc'] ?>"method="post">
        <button type="submit" class="btn delete">Ištrinti</button> -->
</table>
    
</body>
</html>