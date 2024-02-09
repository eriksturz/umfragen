<?php
include("inc/dbconnect.php");

$update = $conn->prepare(
    "UPDATE `person`
    SET
    `name` = :name
    WHERE `person_id` = :id"
);

$update->bindValue(':id', (int)$_POST['id']);
$update->bindValue(':name', $_POST['name']);

$update->execute();

header("Location: ./event.php?event=".$_POST['eventname']);
die();

?>