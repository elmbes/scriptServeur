<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorielle</title>
</head>

<body>
    <?php
    //========================================================================//
    //========================================================================//
    //===============  Bienvenue sur mon code ==================2020==========//
    //=====================================================El Amrani Mounir===//
    /**
     *  Verifie si le formulaire a été envoyer (si oui traite les donnes envoyer par celui-ci)
     *  sinon affiche le formulaire.
     */
    if (isset($_POST['btnCalculer'])) {

        //récupération des données du formulaire
        $nbEntre = $_POST['nbEntre'];
        //Déclaration d'un compteur;
        $cpt = $nbEntre;
        //Resultat de la factorielle
        $factorielleNb = 1;

        /**
         * boucle qui calcul la factorielle d'un nombre donnée.
         */
        while ($nbEntre > 0) {
            $factorielleNb = $factorielleNb * $nbEntre;
            $nbEntre--;
        }

        //Afficher le resultat.
        echo '<h1>voici la factorielle de ' . $nbEntre . '</h1>' .'<br><p>' . $factorielleNb . '</p>';

    } else {

        //afficher le formulaire.
        echo  '<form action="" method="post">
        <label for="">Entrez un nombre : </label>
        <input type="number" name="nbEntre">
        <input type="submit" value="envoyer" name="btnCalculer" >
        </form>';
    }

    //========================================================================//
    //=============================Fin de code================================//

    ?>
</body>

</html>