<?php
	include("inc/header.php");
?>
 <li class=" bg-light list-group-item ">
                <h5 class="mb-1 pt-2"><i class="bi bi-plus-circle px-1"></i> Neues Event erstellen </h5>
                <form action="./add_event.php" method="POST" class="py-2" >
                    <div class="mb-3">
                    <input type="text" required name="eventname" class="form-control" id="eventname" value="">
                    </div>
                    <div id=termine> <input id="date-input-0" type="datetime-local" name="termine[0]"> </div>
                    <div class="mt-3">
                        <button type="button" onclick="addtermin()" class="btn btn-primary btn-sm">+</button>
                    </div>
                    <div class="mt-3">
                        <button type="button" onclick="removetermin()" class="btn btn-primary btn-sm">-</button>
                    </div>
                    <div class="mt-3">  
                        <!-- Button type submit übergibt Daten aus Form hier "eventname" und "termine" an Folgeseite --> 
                        <button type="submit" class="btn btn-primary btn-sm">Erstellen</button> 
                    </div>
                </form>
            </li>

<script> 
let terminediv=document.getElementById("termine") 
let termincount=0 
let values=[]

//Dies Funktion ist für die Anzeige der Termine in HTML //
function displaytermin(){ 
    terminediv.innerHTML='<input id="date-input-0" type="datetime-local" name="termine[0]">' //Erzeugt den ersten Termin. Gewährleistet dass immer ein Termin vorhanden ist
    for(let i = 0; i < termincount; i++){
        terminediv.innerHTML+='<input id="date-input-'+(i+1)+'" type="datetime-local" name="termine['+(i+1)+']">' //Fügt für die Anzahl von Termincount einen neuen Termin hinzu
    }
    for(let i = 0; i <= termincount; i++){
        document.getElementById("date-input-"+ i).value=values[i]
    }
}
function addtermin(){ //Erhöht Termincount um 1 --> displaytermin = Sorgt für die Anzeige des "Kalenders" im Browser
    save_all_values()
    termincount++
    displaytermin()
}
function removetermin(){ // Veringert Termincount um 1 und gewährleistet, dass mindestens 1 Termin übrig bleibt --> displaytermin = Sorgt für die Anzeige des "Kalenders" im Browser 
    save_all_values()
    if(termincount > 0){
    termincount--
    displaytermin()
    }  
}
function save_all_values(){
    values=[]
    for(let i = 0; i < termincount +1; i++){
        values.push(document.getElementById("date-input-"+ i).value)
    } console.log(values)
}
</script>
<?php
    include("inc/footer.php");
?>