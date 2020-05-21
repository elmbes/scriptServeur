El Amrani <elamrani.mounir.ph@gmail.com>

    mer. 11 mars 21:01 (il y a 12 jours)

    À jeanphilippedewez
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
         *  Verifie si le formulaire a été envoyer (si oui traite les donnes envoyer par celui-ci)
         *  sinon affiche le formulaire.     
         */
        if (isset($_POST['btnCalculer'])) {

            //récupération des données du formulaire
            $x = $_POST['nbEntre'];
            $y = $_POST['nbEntre2'];
            //Affiche les donnes entrer par l'utilisateur.
            echo  'x = ' . $x . '<br> y = ' . $y;

            /**
             * recois l'adresse référance de chaque valeur et fait l'echange
             * des deux valeur recu en paramétre.
             */
            function echanger(&$x, &$y)
            {
                $temp = $x;
                $x = $y;
                $y = $temp;
            }

            //Appel de la procédure echanger
            echanger($x, $y);
            echo '<br>';
            //Affiche les nouvel valeur.
            echo  'x = ' . $x . '<br> y = ' . $y;
        } else {
            //afficher le formulaire.
            echo  '<form action="" method="post">
            <label for="">Entrez un nombre : </label>
            <input type="number" name="nbEntre">
            <label for="">Entrez un nombre : </label>
            <input type="number" name="nbEntre2">
            <input type="submit" value="envoyer" name="btnCalculer" >
            </form>';
        }
        //========================================================================//
        //=============================Fin de code================================//

        ?>
    </body>

    </html>