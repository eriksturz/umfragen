<?php
function get_event_id_by_event_name($eventname){
    global $conn; 
    $sql = "SELECT event_id FROM event WHERE eventname= :eventname";
    $sqlTest = $conn->prepare($sql);
    $sqlTest->bindParam(":eventname", $eventname);
    $sqlTest->execute();
    $result = $sqlTest->fetchAll();
    return $result[0][0];
}

function get_termine_by_event_id($event_id){
    global $conn; 
    $sql = "SELECT * FROM termin WHERE event_id= :event_id";
    $sqlTest = $conn->prepare($sql);
    $sqlTest->bindParam(":event_id", $event_id);
    $sqlTest->execute();
    $result = $sqlTest->fetchAll();
    return $result;
}

function post_termin_person($person_id, $termin_id, $auswahl){
    global $conn;
    $sql = "INSERT into termin_person SET person_id = :person_id, termin_id = :termin_id, auswahl = :auswahl";
    $sqlTest = $conn->prepare($sql);
    $sqlTest->bindValue(':termin_id', $termin_id);
    $sqlTest->bindValue(':person_id', $person_id);
    $sqlTest->bindValue(':auswahl', $auswahl); 
    $sqlTest->execute();
} 

function get_termin_person_by_person_id($person_id){
    global $conn;
    $sql = "SELECT auswahl, termin_id FROM termin_person WHERE person_id = :person_id";
    $sqlTest = $conn->prepare($sql);
    $sqlTest->bindParam(":person_id", $person_id);
    $sqlTest->execute();
    $result = $sqlTest->fetchAll();
    return $result;
}

function get_person_by_event_id($event_id){
    global $conn;
    $sql = "SELECT * FROM person WHERE event_id =:event_id";
    $sqlTest = $conn->prepare($sql);
    $sqlTest->bindParam(":event_id", $event_id);
	$sqlTest->execute();
    $result = $sqlTest->fetchAll();
    return $result;
    }
?>


<!-- Array ( 
[0] => Array ( [termin_id] => 14 [0] => 14 [datum] => 2022-11-30 22:02:00 [1] => 2022-11-30 22:02:00 [event_id] => 30 [2] => 30 ) 
[1] => Array ( [termin_id] => 15 [0] => 15 [datum] => 2022-11-29 22:22:00 [1] => 2022-11-29 22:22:00 [event_id] => 30 [2] => 30 ) 
[2] => Array ( [termin_id] => 16 [0] => 16 [datum] => 2022-11-28 22:22:00 [1] => 2022-11-28 22:22:00 [event_id] => 30 [2] => 30 ) 
)  --> 

<!-- Fatal error: Uncaught Error: Call to a member function prepare() on null in 
C:\xampp\htdocs\puudel\database_helper.php:29 Stack trace: #0 C:\xampp\htdocs\puudel\add_termin_person.php(6): 
post_termin_person('6', '14', 1) #1 {main} thrown in C:\xampp\htdocs\puudel\database_helper.php on line 29 -->