
<?php
session_start();

//Verifie si le premier formulaire a etait aficher sinon l'affiche.
if (!isset($_POST["valider"])) {
    $_SESSION["position"] = 0;
    $_SESSION["compteur"] = 1;
    $_SESSION["tableau"] = array();

    //afficher le formulaire.
    echo
        '<form action="" method="post">
        <label for="">Entrez une valeur sentinelle: </label>
        <input type="number" name="sentinelle">
        
        <label for="">Entrez la valeur "'. $_SESSION["compteur"].'" : </label>
        <input type="number" name="nbEntre">
        <input type="submit" value="envoyer" name="valider" >
    </form>';

} else {
    $_SESSION["sentinelle"] = $_POST["sentinelle"];
    $_SESSION["tableau"][$_SESSION["position"]] = $_POST["nbEntre"];
    $_SESSION["compteur"]++;
    $_SESSION["position"]++;

    //Affiche un formulaire si le compteur est inferieur ou egal a 10.
    if ( $_SESSION["tableau"][$_SESSION["position"]] != $_SESSION["sentinelle"]) {
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
Exercice du 25 mars 

Fonction NbMaxTab(T, DimTableau)
Proc OutputNbMinMaxTab(NbMinTab, NbMaxTab) 