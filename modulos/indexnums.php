<?php 
$n = 50;
    for($i=1; $i<= $n ;$i++){
    echo "<div class=\"checkbox-container\"><input type=\"checkbox\" name=\"n$i\" id=\"n$i\" value=\"$i\">
    <label for=\"n$i\">$i</label></div>";
    }
    ?>