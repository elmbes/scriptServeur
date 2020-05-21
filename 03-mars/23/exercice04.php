<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice04</title>
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
        $_SESSION["position"] = 0;
        $_SESSION["compteur"] = 1;
        $_SESSION["tableau"] = array();

        //afficher le formulaire.
        echo
            '<form action="" method="post">
            <label for="">Entrez un nombre : </label>
            <input type="number" name="nbEntre">
            <input type="submit" value="envoyer" name="valider" >
        </form>';

    } else {
        //Stocke la valeur envoyer a partir du formulaire a la bonne position
        $_SESSION["tableau"][$_SESSION["position"]] = $_POST["nbEntre"];
        $_SESSION["compteur"]++;
        $_SESSION["position"]++;

        //Affiche un formulaire si le compteur est inferieur ou egal a 10.
        if ($_SESSION["compteur"] <= 10) {
            echo
                '<form action="" method="post">
                    <label for="">Entrez un nombre : </label>
                    <input type="number" name="nbEntre">
                    <input type="submit" value="envoyer" name="valider" >
                </form>';
        } else {

            $i = 0;
            //Boucle qui parcours le tableau et affiche les elements.
            while ($i < sizeof($_SESSION["tableau"])) {
                echo $_SESSION["tableau"][$i];
                echo "    ";
                $i++;
            }
            //reinstalisation du i;
            $i = 0;
            echo "<br>";

            //Inversion du tableau grace a la fonction array_reverse
            $inverserTableau = array_reverse($_SESSION["tableau"], false);
            //Boucle qui parcours le tableau et affiche les elements.
            while ($i < sizeof($inverserTableau)) {
                echo $inverserTableau[$i];
                echo "    ";
                $i++;
            }
        }
    }



    //========================================================================//
    //=============================Fin de code================================//

    ?>
</body>

</html>