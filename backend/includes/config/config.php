<?php


$string = 'mysql:host=localhost;dbname=tut';
try{
    $conn=new PDO($string,'root','');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Connected to ' . $string . PHP_EOL;;
}catch(PDOException $e){
    echo $e->getMessage();
}



