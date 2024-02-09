<?php
	include("inc/dbconnect.php");

    require __DIR__ . "/database_helper.php";

	
    $event_id = get_event_id_by_event_name($_GET["event"]);
    $testdata = get_person_by_event_id($event_id);
    $termine = get_termine_by_event_id($event_id);
  
	include("inc/header.php");
?>
    <div class="container py-4">
<h2> <?php echo $_GET["event"];?> </h2>
        <ul style="list-style-type: none;" class="list-group flex-row ">
            <li class="col-3" ></li>
            <?php  
            foreach($termine as $termin){
                $datum = $termin["datum"];
            ?>
            <li class=" col py-2 list-group-item d-flex justify-content-between align-items-start">
                <?php echo $datum ?>
            </li> 
            <?php } ?>
        </ul>  
        <ul class="list-group">
            <?php foreach ($testdata as $row) { 
                $person_id = $row['person_id'];
                $name = $row['name'];
                $termin_abstimmung = get_termin_person_by_person_id($person_id);
                ?>
                <li class=" py-2 list-group-item d-flex align-items-start">
                    <div class= "col-3">
                        <div>
                            <div class="me-auto">
                                <div class="text-secondary mb-1">
                                    <i class="bi bi-clipboard-data mr-2"></i>
                                    <span>ID: <?php echo $person_id ?></span>
                                </div>
                                <h5 class="fw-bold">
                                    <span><?php echo $name ?></span>
                                </h5>
                            </div>
                        </div>
                        <div>
                            <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $person_id ?>">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $person_id ?>">
                                <i class="bi bi-trash"></i>
                            </button>
                            </div>
                        </div>
                    </div>    
                    <div class="modal fade" id="delete<?php echo $person_id ?>" tabindex="-1" aria-labelledby="delete<?php echo $person_id ?>label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <form action="./delete.php" method="POST" class="modal-content">
                                <input type="hidden" name="id" value="<?php echo $person_id ?>" />
                                <input type="hidden" name="eventname" value="<?php echo $_GET["event"];?>" />
                                <div class="modal-body">
                                    Wollen Sie <b><?php echo $name ?></b> wirklich löschen?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                                    <button type="submit" class="btn btn-danger">löschen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="edit<?php echo $person_id ?>" tabindex="-1" aria-labelledby="edit<?php echo $person_id ?>label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <form action="./edit.php" method="POST" class="modal-content">
                                <input type="hidden" name="id" value="<?php echo $person_id ?>" />
                                <input type="hidden" name="eventname" value="<?php echo $_GET["event"];?>" />
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit<?php echo $person_id ?>label">Eintrag bearbeiten</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Abbrechen"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                    <input type="text" required name="name" class="form-control" id="name" value="<?php echo $name ?>">
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Bearbeiten</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                        <?php if(count($termin_abstimmung)>0): ?>
                    <div class="row" style="width:100%;"> 
                    <?php
                        for($i = 0; $i<count($termine);$i++){
                            ?>
                        <div style="list-style-type: none;" class="col">
                            <div><?php echo $termin_abstimmung[$i]["auswahl"]=== 1? "Bin dabei!" : "Leider keine Zeit." ?></div>
                        </div> 
                        <?php } ?>
                    </div> <?php elseif(count($termin_abstimmung)<=0): ?>
                    <form  class="row" style="width:100%;" action="./add_termin_person.php" method="POST">          
                        <input type="hidden" name="eventname" value="<?php echo $_GET["event"];?>" />     
                         <?php
                        for($i = 0; $i<count($termine);$i++){
                            ?>
                        <div style="list-style-type: none;" class="col">
                            <input type = "radio" name = "auswahl[<?php echo $i ?>]" value="zusage" required>
                            <label for="zusage">Ich bin dabei!</label><br> 
                            <input type = "radio" name = "auswahl[<?php echo $i ?>]" value="absage" required>
                            <label for="absage">Ich kann leider nicht.</label>
                        </div> 
                        <?php } ?>
                        <?php 
                        foreach($termine as $key=>$termin){
                        $id = $termin["termin_id"]; 
                        ?>
                        <input type="hidden" name="termine[<?php echo $key?>]" value="<?php echo $id;?>" />
                        <input type="hidden" name="person_id" value="<?php echo $person_id;?>" />
                        <?php } ?>
                        <button type="submit" class="btn btn-primary btn-sm">Speichern</button>
                        
                    </form> <?php endif; ?>
                </li>
            <?php } ?>
            <li class=" bg-light list-group-item ">
                <h5 class="mb-1 pt-2"><i class="bi bi-plus-circle px-1"></i> HINZUFÜGEN</h5>
                <form action="./add.php" method="POST" class="py-2" >
                    <div class="mb-3">
                    <input type="text" required name="name" class="form-control" id="name" value="">
                    <input type="hidden" name="eventname" value="<?php echo $_GET["event"];?>" />
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Eintragen</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>



<?php
    include("inc/footer.php");
?>