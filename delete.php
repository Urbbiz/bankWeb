<?php
require __DIR__.'/bootstrap.php';


//POST scenarijus - saskaitos sukurimas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'] ?? 0;   //paimam id, jeigu ji nera, tada grazinam 0.
    $id =(int) $id;

   $user = getAccount($id);
   if($user['balance'] > 0){   // jeigu saskaitoj ne 0, tada saskaitos netrinam
   
    $_SESSION['message'] = 'Operacija nutraukta! Ištrinti galima tik tuščią sąskaitą!';
    header('Location: '.URL.'table.php');
       die;
   } else {                    
    deleteAccount($id);     //trina 
   }
   $_SESSION['message'] = 'Operacija atlikta!';
    header('Location: '.URL.'table.php'); // einam i lenteles puslapi
    die;
}

header('Location: '.URL.'table.php'); // einam i lenteles puslapi
    die;