<?php
require __DIR__.'/bootstrap.php';


//POST scenarijus - saskaitos sukurimas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'] ?? 0;   //paimam id, jeigu ji nera, tada grazinam 0.
    $id =(int) $id;   
   
    deleteAccount($id);     //trina 
   
    header('Location: '.URL.'table.php'); // einam i lenteles puslapi
    die;
}

header('Location: '.URL.'table.php'); // einam i lenteles puslapi
    die;