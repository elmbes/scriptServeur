<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo '<form method="post" action ="">';
    echo '<input type ="numeric" name ="nbr"/>';
    echo '<input type ="submit" name ="valider"/>';
    echo '</form>';

    $nbr = $_POST['nbr']; // On stcke le nombre entrer par l'utilisateur 
    $factorielle = $nbr; // On decalre une variable factorielle et on l'initialise au nombre entrer par l'utilisateur 
    if (isset($_POST['valider'])) // si on valide le post 
    {

        if ($nbr === 0) // condition d'arret // si le nombre entrer par l'utilisateur est à 0 , alors le resultat est  1
            echo   $nbr = 1;  // 
        else
            for ($i = 0; $i <= $nbr; $i++) // sinon on boucle tant que l'indice est plus patit du nombre entrer par l'utilisateur
            {
                $factorielle *= ($nbr - 1); // factorielle = lui même fois le nombre entrer par l'utilisateur -1
                $nbr--; // on dimunie le nombre à chaque fois on boucle 
            }
        echo $factorielle; // on affiche le résultat ,
    }
    ?>
</body>

</html>