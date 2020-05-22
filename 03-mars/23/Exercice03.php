<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //========================================================================//
    //========================================================================//
    //===============  Bienvenue sur mon code ==================2020==========//
    //=====================================================El Amrani Mounir===//

    /**
     *  Mets aucube la valeur recu en paramétre.
     *  @param integer x
     */
    function cube($x)
    {
        return $x * $x * $x;
    }


    $centaine = 0;
    $dizaine = 0;
    $unite = 0;

    /**
     *Boucle qui affiche tous les nombres de 3 chiifres aui sont egaux a la 
     *somme des cubes de leurs chiffres.
     */
    while ($centaine < 10) {
        while ($dizaine < 10) {
            while ($unite < 10) {
                $total = $centaine . $dizaine . $unite;
                $somme = cube($centaine) + cube($dizaine) + cube($unite);
                if ($total == $somme) {
                    echo "<br>";
                    echo $total;   
                }

                $unite++;
            }
            if ($unite >= 10) {
                $unite = 0;
            }
            $dizaine++;
        }
        if ($dizaine >= 10) {
            $dizaine = 0;
        }
        $centaine++;
    }

    //========================================================================//
    //=============================Fin de code================================//

    ?>
</body>

</html>