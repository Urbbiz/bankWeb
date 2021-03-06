<?php

function readData() : array  // sita funkcija nuskaito json failus, ir privalomai turi grazinti masyva (:array)
{
    if(!file_exists(DIR.'data/accounts.json')){    // pirma karta sukuriam json faila, jeigu jo dar nera
        $data = json_encode([]); //uzkoduojam sita faila i json kaip masyva,
        file_put_contents(DIR.'data/accounts.json', $data); //irasom i json faila.
    }

    $data = file_get_contents(DIR.'data/accounts.json'); //pasiimu faila
    return json_decode($data, 1); //grazinu iskoduoda json faila ir parasau 1, kad grazintu MASYVA
}

function writeData(array $data) : void //void del to, kad funkcija nieko nereturnins, bet reikalausim, kad argumentas butu arejus(array $data)
{
    $data = json_encode($data);
    file_put_contents(DIR.'data/accounts.json',$data);  //tiesiog irasom i sita faila ir nieko negrazinam
}

function getAccount(int $id) : ?array //paduodu saskaitos $id, o funkcija man grazina areju su saskaitos informacija.
{
    foreach(readData() as $user) {
        if($user['id'] == $id){ // jeigu $user[id] sutama su mano iieskoma $id
            return $user;   // tada ir grazinu to sutampancio id user masyva
        }
    }
    return null;  //jeigu tokios saskaitos neranda, tuomet grazina null.
}

function create( $name, $surname, $acc, $personalId, $balance) : void // nieko negrazina, bet paima kieki
{
    $saskaiteles = readData();
    $id = getNextId();
    $user =['id' => $id, 'name' => $name, 'surname' =>$surname, 'acc'=> $acc , 'personalId' => $personalId, 'balance' => $balance ];
    $saskaiteles[] = $user;
    writeData($saskaiteles);
}

function updateAdd($id, $balance) : void // nieko negrazina, bet paima kieki ir prideda pinigus
{
    $saskaiteles = readData();     // pasiimu visas saskaitas
    $user = getAccount($id);       // tada paimu ta saskaita kurios man reikia
    if(!$user) {
        return;
    }

    // if($user['balance'] < $_POST['balance'] & $user['balance']  < 0 ){
    //    unset($_POST['balance']);
    // }
    $user['balance'] +=$_POST['balance'];   // paredaguoju balansa
    if ($user['balance']  < 0){   //jeigu minusuojama daugiau negu yra saskaitoj, tada gryztam atgal nepadare pakeitimu;
        return;
    }
    

    deleteAccount($id);    // tada su deleteAccoint funkcija istrinu sena saskaita
    $saskaiteles = readData(); //vel perskaitau naujai saskaitas jau be istrintos.

    $saskaiteles[] = $user;  // pakeistos naujos saskaitos idejimas, vietoj senos redaguotos
    writeData($saskaiteles);
}


function deleteAccount(int $id) : void //nurodom kokia saskaita deletinam
{
    $saskaiteles = readData();

    foreach($saskaiteles as $key => $user) {
        if($user['id'] == $id ){ // jeigu $user[id] sutama su mano iieskoma $id
            unset($saskaiteles[$key]);   // tada ir istrinu to sutampancio id user masyva
            writeData($saskaiteles);   // ir irasom pakeista faila
            return;
        }
    }
}



function getNextId() : int  //privalomai turi grazinti skaiciu (:int)
{
    if(!file_exists(DIR.'data/indexes.json')){    // pirma karta sukuriam json faila, jeigu jo dar nera
        $index = json_encode(['id' =>1]); //uzkoduojam sita faila i json su pirmu indexu.,
        file_put_contents(DIR.'data/indexes.json', $index); //irasom i json faila.
    }
    $index = file_get_contents(DIR.'data/indexes.json');
    $index = json_decode($index,1);
    $id =(int) $index['id'];  // paverciam ji i (int), kad gautume skaiciu.
    $index['id'] = $id + 1; // sukuriam nauja masyva ir pridedam jam +1
    $index = json_encode($index);
    file_put_contents(DIR.'data/indexes.json', $index);
    return $id;
}
?>