<?php 
// SOUS PROGRAMMES

// declaration de la procédure AfficherBonjour (output)
function AfficherBonjour()
{
    $GLOBALS['nom']="Flo"; // var local a la procedure
    echo ("Bonjour ".$GLOBALS['nom']."<br>");
    
    
}

function AfficherSalut()
{
    global $nom;
     // var local a la procedure
    echo ("Salur ".$nom."<br>");
    
}
 
?>