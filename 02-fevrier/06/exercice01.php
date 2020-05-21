<html lang ="fr-be">



<?php
	// Input du nombre de cotes et des cotes entrées par l'enseignant.
	if(isset($_POST['EnvNbCotes']))
    {   $i = 1;
		echo '<form action="ex7.php" method="post">';
		while ($i <= ($_POST['Nbcotes'])) 
        {   echo '<p>Cotes n°'.$i.' :<input type="number" name="cote'.$i.'"/></p>'."\n";
			$i++;
		}
		echo'   <p><input type="submit" value="Afficher la moyenne" name="CalculMoy"></p> 
                </form>';
	}
    elseif(!isset($_POST['CalculMoy']))
    {   echo  '<form action="ex7.php" method="post">
	           <p>Nombre de cotes :<input type="number" name="Nbcotes"/></p>
	           <p><input type="submit" value="Envoyez le nombre de cotes" name="EnvNbCotes"></p>
               </form>';
	};
    
    // Traitement
    if(isset($_POST['CalculMoy']))
    {
        $i =1;
        $total =0;
        while(isset($_POST['cote'.$i]))
        {
            $total += $_POST['cote'.$i];
            $i++;
        }
        $moy = $total / ($i-1);
        
    }
    
    // Output
    if(isset($_POST['CalculMoy']))
    {
        echo 'La moyenne des cotes est de '.$moy.'.';
    }
    
?>
</html>