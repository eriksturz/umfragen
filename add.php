<?php
include("inc/dbconnect.php");

require __DIR__ . "/database_helper.php";


$insert = $conn->prepare(
    "INSERT into person
    SET
    name = :name, 
    event_id = :id"
);

$insert->bindValue(':name', $_POST['name']);
$insert->bindValue(':id', get_event_id_by_event_name($_POST['eventname']));

$insert->execute();

header("Location: ./event.php?event=".$_POST['eventname']);
die();

?>