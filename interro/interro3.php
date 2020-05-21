<?php
session_start();

?>
<html lang="fr-be">
<?php
//Affichage du premier formulaire.
if (!isset($_POST['MinMax']) && !isset($_POST['NouvelleCote'])) {
    echo '<form action="interro3.php" method="post">
		<p>Entrez la cote minimum :<input type="number" name="coteMin"/></p>
		<p>Entrez la cote maximum :<input type="number" name="coteMax"/></p>
        <p>Entrez la valeur Sentinelle :<input type="number" name="sentinelle"/></p>

		<input type="submit" name="MinMax">
		</form>';
} else {


    //Initialisation des diffferentes variables session ainsi que l'affichage du formulaire.
    if (!isset($_POST['NouvelleCote'])) {
        $_SESSION['NbCotes'] = 0;
        $_SESSION['coteMin'] = $_POST['coteMin'];
        $_SESSION['coteMax'] = $_POST['coteMax'];
        $_SESSION['sentinelle'] = $_POST['sentinelle']; // Sentinelle choisi par l'user.
        $_SESSION['nbCoteCpt'] = 1; // utiliser pour afficher les numero des interro.

        echo '<form action="interro3.php" method="post">
            <p>Entrez la cote n°'.$_SESSION['nbCoteCpt'].' (Sentinelle si vous voulez arrêter la saisie directement) :
            <input type="number" name="Cote"/></p>
            <p><input type="submit" value="OK" name="NouvelleCote"></p>
            </form>'; 
            $_SESSION['nbCoteCpt']++; 
           

    } else {

        //Verifier si la cote entrée est comprise entre entre le min et le max choisi par l'utilisateur.
        if ($_POST['Cote'] >= $_SESSION['coteMin'] && $_POST['Cote'] <= $_SESSION['coteMax']) {

            $_SESSION['Cotes'][$_SESSION['NbCotes']] = $_POST['Cote'];//Stocke la cote envoyer a aprtit du tableau dans la session.
            $_SESSION['NbCotes']++;
            
            //affcihage du formualire avec le numéro de la cote.
            echo '<form action="interro3.php" method="post">
                <p>Entrez la cote n° ' . $_SESSION['nbCoteCpt'] . ' (Sentinelle quand vou avez fini) :
                <input type="number" name="Cote"/></p>
                <p><input type="submit" value="OK" name="NouvelleCote"></p>
                </form>';

            $_SESSION['nbCoteCpt']++; //incrémentation du nombre de cote
            

        } else if ($_POST['Cote'] == $_SESSION['sentinelle']) { //Verifie si la cote envoyer dans le formulaire et la valeur sentinelle.
            $i = 0; // premiere boucle
            $SommeCote = 0;
            $cpt = 0; // deuxieme boucle
            // Boucle qui parcours le tableau et calcule la sommme de toutes les valeurs stockées.
            while ($i < $_SESSION['NbCotes']) {
                $SommeCote += $_SESSION['Cotes'][$i];
                $i++;
            }


            $Moyenne = $SommeCote / $_SESSION['NbCotes'];
            echo '<br>';
            echo 'Résultat ' . $Moyenne;



            $nbEgaleMin = 0;//nb de cote egale minimum
            $nbEgaleMax = 0;//nb de cote egale maxmimum
            $coteMin = $_SESSION['Cotes'][0];
            $coteMax = $_SESSION['Cotes'][0];

            while ($cpt < $_SESSION['NbCotes']) {


                if( $_SESSION['Cotes'][$cpt] <= $coteMin){
                    $coteMin = $_SESSION['Cotes'][$cpt];
                    $nbEgaleMin++;
                }else if($_SESSION['Cotes'][$cpt]>= $coteMax ){
                    $coteMax = $_SESSION['Cotes'][$cpt];
                    $nbEgaleMax++;
                }
                $cpt++;
            }



            echo 'La cote minimum est de  : '.$coteMin;
            echo '<br>';

            echo 'La cote maxmimum est de  : '.$coteMax;
            echo '<br>';

            echo 'Le nombre de cote égales au minimum : '.$coteMin.' est de '.$nbEgaleMin;
            echo '<br>';

            echo 'Le nombre de cote égales au maximum : '.$coteMax.' est de '.$nbEgaleMax;
            echo '<br>';


        } else {
            
            $_SESSION['nbCoteCpt']--; 

            echo 'la cote introduite et soit inferieur ou superieur au cotes admises.';
            echo '<br>';
            echo '<form action="interro3.php" method="post">
                <p>Entrez la cote ' . $_SESSION['nbCoteCpt'] . ' (Sentinelle quand vou avez fini) :
                <input type="number" name="Cote"/></p>
                <p><input type="submit" value="OK" name="NouvelleCote"></p>
                </form>';
            $_SESSION['nbCoteCpt']++;
        }
    }
}
?>

</html>