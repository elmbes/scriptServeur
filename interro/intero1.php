<?php
session_start();

?>
<html lang="fr-be">
<?php

//Affichage du premier formulaire.

if (!isset($_POST['MinMax']) && !isset($_POST['NouvelleCote'])) {
	echo '<form action="exercice1.php" method="post">
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
		$_SESSION['sentinelle'] = $_POST['sentinelle'];

		echo '<form action="exercice1.php" method="post">
            <p>Entrez la cote 1 (Sentinelle si vous voulez arrêter la saisie directement) :
            <input type="number" name="Cote"/></p>
            <p><input type="submit" value="OK" name="NouvelleCote"></p>
            </form>';
	} else {

		//Verifier si la cote entrée est comprise entre entre le min et le max choisi par l'utilisateur.

		if ($_POST['Cote'] >= $_SESSION['coteMin'] && $_POST['Cote'] <= $_SESSION['coteMax']) {

			$_SESSION['Cotes'][$_SESSION['NbCotes']] = $_POST['Cote'];
			$_SESSION['NbCotes']++;
			$numeroCote = 2;
			
			echo '<form action="exercice1.php" method="post">
                <p>Entrez la cote suivante ( sentinelle quand vou avez fini) :
                <input type="number" name="Cote"/></p>
                <p><input type="submit" value="OK" name="NouvelleCote"></p>
				</form>';

		} else if ($_POST['Cote'] == $_SESSION['sentinelle']) { //Verifie si la cote envoyer dans le formulaire et la valeur sentinelle.
			$i = 0;
			$SommeCote = 0;
			while ($i < $_SESSION['NbCotes']) {
				$SommeCote += $_SESSION['Cotes'][$i];
				$i++;
			}
			$Moyenne = $SommeCote / $_SESSION['NbCotes'];
			echo '<br>';
			echo ('Résultat ' . $Moyenne);
		} else { //affiche le formulaire en cas d'ereur introiduite
			echo 'la cote introduite et soit inferieur ou superieur au cotes admises.';
			echo '<br>';
			echo '<form action="exercice1.php" method="post">
                <p>Entrez la cote (Sentinelle quand vou avez fini) :
                <input type="number" name="Cote"/></p>
                <p><input type="submit" value="OK" name="NouvelleCote"></p>
                </form>';
		}
	}
}
?>

</html>