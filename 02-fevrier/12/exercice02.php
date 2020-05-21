<html lang ="fr-be">

	<?php

	session_start();

	

	//Initialisations de la variable Nbre de Cotes et affichage de formulaire initial

	if(!isset($_POST['NouvelleCote']))

	{		$_SESSION['NbCotes']=0; //Initialisation de la variable globale NbCotes

			

			//Affichage du formulaire initial

			echo ('<form action="ex7.php" method="post">');

			echo ('<p>Entrez la première cote (-1 si vous voulez arrêter la saisie directement) :<input type="number" name="Cote"/></p>');

			echo ('<p><input type="submit" value="OK" name="NouvelleCote"></p>');

			echo ('</form>');

	}

	else //Boucle d'input des cotes dans le tableau et d'affichage des formulaires d'input consécutifs

	{	if ($_POST['Cote']!=-1) //Ce n'est pas la cote sentinelle

		{	$_SESSION['NbCotes']++; //Incrémentation du nombre de cotes

			$_SESSION['Cotes'][$_SESSION['NbCotes']]=$_POST['Cote']; //Ajout de la nouvelle cote dans le tableau

			

			//Affichage du formulaire de la boucle

			echo ('<form action="ex7.php" method="post">');

			echo ('<p>Entrez la cote suivante (-1 quand vou avez fini) :<input type="number" name="Cote"/></p>');

			echo ('<p><input type="submit" value="OK" name="NouvelleCote"></p>');

			echo ('</form>');

		}

		else //Cote sentinelle --> Traitement (calcul de la moyenne)

		{	$i=0;

			$SommeCote=0;

			while ($i<=$_SESSION['NbCotes'])

			{	$SommeCote += $_SESSION['Cotes'][$i];

				$i++;

			}

			$Moyenne = $SommeCote/$_SESSION['NbCotes'];

			

			//Output : affichage de la moyenne et destruction des variables sessions

			echo('Résultat '.$Moyenne);

			session_destroy();

		}		

	}

	// Exercices suivants :

	// - Afficher le nombre de cotes supérieurs à la moyenne calculée, le nombre de cotes inférieurs à la moyenne calculée et le nombre de cotes égales

	// - Quand on rentre -1 à l'entrée de la première cote, la réponse montre une erreur. Il vaudrait mieux un message avenant, du genre

			// "Merci d'avoir utilisé ce programme, au plaisir de vous lors d'une prochaine session"

	// - Adaptez le programme avec les fonctions qui permet de retrouver la taille actuelle d'un tableau (vous trouverez en googelant un peu).

			//Faites attention à tout ce que vous risquez de trouver sur Google, il vous suffit de vous contenter de le fonction qui donne la taille d'un tableau à une dimension.

	// - Adaptez le programme en paramétrant la cote sentinelle. Donc en demandant en début de programme la valeur de la valeur de la sentinelle plutôt que d'imposer la valeur -1

	// Remarque : ne pas confondre la notion de tableau numéroté (Tableau de 10 valeurs de même type) et de tableau associatif (POST, GET, COOKIES, SESSIONS, ENVIRONNEMENT)

	//		Dans le premier, la notion d'ordre compte (ex inverser le tableau ou calculer le déterminant d'une matrice). Dans la deuxième la notion d'ordre n'existe pas.

	// /Applications/MAMP/htdocs sur MAMPS

	?>

	

</html>