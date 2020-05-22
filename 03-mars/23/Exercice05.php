<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice06</title>
</head>

<body>
    <?php
    //========================================================================//
    //========================================================================//
    //===============  Bienvenue sur mon code ==================2020==========//
    //=====================================================El Amrani Mounir===//

    session_start();

    //Verifie si le premier formulaire a etait aficher sinon l'affiche.
    if (!isset($_POST["valider"])) {

        //Déclaration des variables session.
        $_SESSION["position"] = 0;
        $_SESSION["compteur"] = 1;
        $_SESSION["tableau"] = array();

        //afficher un formulaire avec 9 entrer.
        echo
            '<form action="" method="post">
            <p>Remplir la matrice : </p>
            <table>
                <tr>
                    <td><input type="number" name="nbEntre1"></td>
                    <td><input type="number" name="nbEntre2"></td>
                    <td><input type="number" name="nbEntre3"></td>
                </tr>
                <tr>
                    <td><input type="number" name="nbEntre4"></td>
                    <td><input type="number" name="nbEntre5"></td>
                    <td><input type="number" name="nbEntre6"></td>
                </tr>
                <tr>
                    <td><input type="number" name="nbEntre7"></td>
                    <td><input type="number" name="nbEntre8"></td>
                    <td><input type="number" name="nbEntre9"></td>
                </tr>
            </table>
            <input type="submit" value="envoyer" name="valider" >
        </form>';
    } else {

        //Stocke la valeur envoyer a partir du formulaire a la bonne position
        $tableau = $_SESSION["tableau2"][][] = array();

        $i = 0;
        $cpt = 1;

        //Ajoute toutes les valeurs envoyer a partir du formulaire dans un tableau
        while ($i < 3) {
            $j = 0;
            while ($j < 3) {
                $tableau[$i][$j] = $_POST["nbEntre" . $cpt];
                $cpt++;
                $j++;
            }
            $i++;
        }

        /**
         * Calcul le detrminet d'une matrice
         * et retoune le resultat.
         * @param array tab
         */
        function calculDeterminent($tab)
        {

            $detemninent = $tab[0][1] * (-1) * (($tab[1][0] * $tab[2][2]) -  ($tab[1][2] * $tab[2][0])) +
                $tab[1][1] * (1) * (($tab[0][0] * $tab[2][2]) -  ($tab[2][0] * $tab[0][2])) +
                $tab[2][1] * (-1) * (($tab[0][0] * $tab[1][2]) -  ($tab[1][0] * $tab[0][2]));

            return $detemninent;
        }
        
        //Affiche le déterminnent d'un ematrice données.
        echo calculDeterminent($tableau);

    }


    //========================================================================//
    //=============================Fin de code================================//

    ?>
</body>

</html>