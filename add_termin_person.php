<?php 
include("inc/dbconnect.php");
require __DIR__ . "/database_helper.php";
if(count($_POST["auswahl"])=== count($_POST["termine"])){
    for($i=0; $i<count($_POST["termine"]);$i++){
        if($_POST["auswahl"][$i]==="zusage"){
            post_termin_person($_POST["person_id"],$_POST["termine"][$i],1);
        }
        if($_POST["auswahl"][$i]==="absage"){
            post_termin_person($_POST["person_id"],$_POST["termine"][$i],0);
        }
    }
}

header("Location: ./event.php?event=".$_POST['eventname']);
die();
?>