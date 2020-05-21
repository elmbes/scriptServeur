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

    $unite = 0;
    $dizaine = 0;
    /**
     * boucle aui affiche les nombres de 00 a 99.
     */
    while ($dizaine < 10) {
        while ($unite < 10) {
            echo $dizaine.$unite;
            echo '<br>';
            $unite++;
        }
        if($unite>=10){
            $unite = 0;
        }
        $dizaine++;
    }

    //========================================================================//
    //=============================Fin de code================================//

    ?>
</body>

</html>