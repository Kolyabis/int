<?php
$dbhost ='localhost';
$dbuser ='root';
$dbpass ='';
$dbname='int';
$sqlchar='utf8';
try{
    $db = new PDO ( 'mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpass);
    $db->query ( 'SET character_set_connection = '.$sqlchar );
    $db->query ( 'SET character_set_client = '.$sqlchar );
    $db->query ( 'SET character_set_results = '.$sqlchar );
}catch (PDOException $e){
    echo $e->getMessage();
}
echo $idUser = $_POST['idUser'];
