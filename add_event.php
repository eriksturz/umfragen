<?php
include("inc/dbconnect.php");

$insert_event = $conn->prepare(
    "INSERT into `event`
    SET
    `eventname` = :eventname"
);

$insert_event->bindValue(':eventname', $_POST['eventname']);

$insert_event->execute();
$id = $conn->lastInsertId();
print_r($id);
$insert_termin = $conn->prepare(
    "INSERT into `termin`
    SET
    `datum` = :datum , 
    `event_id` = :id"  
);
$insert_termin->bindValue(':id', $id);
foreach($_POST["termine"] as $value){ // Für jeden Durchlauf in Termine wird ein Element in der Variable Value gespeichert
    $insert_termin->bindValue(':datum', $value);

    $insert_termin->execute();
}


header("Location: ./event.php?event=".$_POST['eventname']);
die();

?>