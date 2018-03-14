<?php

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Call of Duty Quiz </title>
    </head>
    <body>
        
        <form>
            <fieldset id="Question1">
                <legend>Which of this games were developed by Treyarch</legend>
                <input id="CODGhost" type="checkbox" name="Call of Duty Ghost">
                <label for="CODGhost">Call of Duty Ghost</label><br>
                <input id="COD3" type="checkbox" name="Call of Duty 3"/>
                <label for="COD3">Call of Duty 3</label><br>
                <input id="CODBO" type="checkbox" name="Call of Duty Black Ops"/>
                <label for="CODBO">Call of Duty Black Ops</label><br>
                <input id="COD4" type="checkbox" name="Call of Duty 4"/>
                <label for="COD4">Call of Duty 4 Modern Warfare</label><br>
            </fieldset>
            
            <br>
            
            <fieldset id="Question2">
                <legend>Which Assault Rifle was in every Modern Warfare installation?</legend>
                <input id="G36C" type="radio" name="assault"/>
                <label for="G36C">G36C</label><br>
                <input id="Galil" type="radio" name="assault"/>
                <label for="Galil">Galil</lable><br>
                <input id="SCARL" type="radio" name="assault"/>
                <label for="SCARL">SCAR-L</label><br>
            </fieldset>
            
            <br><br>
            
            <label for="OP">All of these are/were OVERPOWER except</label>
            <select id="OP" name="select">
            <option value="0">-select-</option>
            <option value="1">One Man Army</option>
            <option value="2">Commando Pro</option>
            <option value="3">Nuke</option>
            <option value="4">Dual FMG9</option>
            <option value="5">Dual Model887</option>
            </select>
            
            <br><br><br>
            
            <fieldset id="Question4">
                <legend>Call of Duty is based on which war was not yet set in? </legend>
                <input id="WW2" type="radio" name="war"/>
                <label for="WW2">World War 2</label><br>
                <input id="WW3" type="radio" name="war"/>
                <label for="WW3">World War 3</label><br>
                <input id="Vietnam" type="radio" name="war"/>
                <label for="Vietnam">Vietnam War</label><br>
                <input id="Cold" type="radio" name="war"/>
                <label for="Cold">Cold War</label><br>
                <input id="Korean" type="radio" name="war"/>
                <label for="Korean">Korean War</label><br>
            </fieldset>
            
            <fieldset id="Question5">
                <legend>Which map is fan favorite</legend>
                <input id="Nuketown" type="checkbox" name="map">
                <label for="Nuketown">Nuketown</label><br>
                <input id="FR" type="checkbox" name="map">
                <label for="FR">Firing Range</label><br>
                <input id="Rust" type="checkbox" name="map">
                <label for="Rust">Rust</label><br>
                <input id="Terminal" type="checkbox" name="map">
                <label for="Terminal">Terminal</label><br>
            </fieldset>
            
        </form>
        
        
        
        
 <!--<input type="submit" value="Submit"/>-->
    </body>
</html>