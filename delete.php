<?php

include("inc/dbconnect.php");

$id = intval($_POST["id"]);

$delete = $conn->prepare(
    "DELETE from `person` WHERE `person_id` = :id"
);

$delete->bindValue(':id', $id);
$delete->execute();

header("Location: ./event.php?event=".$_POST['eventname']);
die();

?>