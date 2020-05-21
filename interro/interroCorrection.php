<html lang ="fr-be">
<?php
	session_start();
	
	if(!isset($_POST['NouvelleValMinMax']) && !isset($_POST['NouvelleCote']))
	// Initialisation des variables minimales & maximales
	{
		echo
			('<form action="" method="post">
			<p>Entrez la cote minimum admise :<input type="number" name="ValMin"/></p>
			<p>Entrez la cote maximale admise :<input type="number" name="ValMax"/></p>
			<p><input type="submit" value="OK" name="NouvelleValMinMax"></p>
			</form>');
	} else 
	{
		if(isset($_POST['NouvelleValMinMax']))
		//Initialisation de la variable Nbre de Cotes et affichage de formulaire initial
		{		$_SESSION['NbCotes']=0; //Initialisation de la variable globale NbCotes
				$_SESSION['ValMin'] = $_POST['ValMin']; // Initialisation de la variable globale ValMin
				$_SESSION['ValMax'] = $_POST['ValMax']; //Initialisation de la variable globale ValMax
				$valSentinel=$_SESSION['ValMin']-1;
				$_SESSION['valSentinel']=$valSentinel;
		 
		 		//Affichage du formulaire initial
				echo ('<form action="" method="post">');
				echo ('<p>Entrez la cote n°1 ('.$_SESSION['valSentinel'].' si vous voulez arrêter la saisie directement) : <input type="number" name="Cote"/></p>');
				echo ('<p><input type="submit" value="OK" name="NouvelleCote"></p>');
				echo ('</form>');
		}
		else if(isset($_POST['NouvelleCote'])) //Boucle d'input des cotes dans le tableau et d'affichage des formulaires d'input consécutifs
		{	
			
			if ($_POST['Cote']!=$_SESSION['valSentinel'] ) //Ce n'est pas la cote sentinelle
			{	
				if ($_POST['Cote'] >= $_SESSION['ValMin'] && $_POST['Cote'] <= $_SESSION['ValMax']) // Si la cote rentrée est bien comprise entre la valeur min & max alors on poursuit le code : 
				{
					$_SESSION['Cotes'][$_SESSION['NbCotes']]=$_POST['Cote']; //Ajout de la nouvelle cote dans le tableau
					$_SESSION['NbCotes']++; //Incrémentation du nombre de cotes
				
					//Affichage du formulaire de la boucle
					echo ('<form action="" method="post">');
					echo ('<p>Entrez la cote n°'.($_SESSION['NbCotes']+1).' ('.$_SESSION['valSentinel'].' quand vous avez fini) : <input type="number" name="Cote"/></p>');
					echo ('<p><input type="submit" value="OK" name="NouvelleCote"></p>');
					echo ('</form>');
				}
				else // Si elle n'est pas comprise entre le min & le max
				{
					echo // Affiche un message d'erreur
						('Erreur: La cote rentrée est incorrecte par rapport aux valeurs minimumes et maximales configurées au début. </br>
						<form action="" method="post">
							<p>Veuillez rentrer une nouvelle cote :<input type="number" name="Cote"/></p>
							<p><input type="submit" value="OK" name="NouvelleCote"></p>
						</form>');				
				}
			}
			else //Cote sentinelle --> Traitement (calcul de la moyenne)
			{	$i=0; // On initialise un compteur pour la boucle
				$SommeCote=0;
				while ($i<$_SESSION['NbCotes'])
				{	$SommeCote += $_SESSION['Cotes'][$i];
					$i++;
				}
				
			 	$i = 0; // On réinitialise la valeur de i
				$NbCoteMin = 0;
				$NbCoteMax = 0;
				while ( $i < $_SESSION['NbCotes']) // Une boucle qui va compter le nombre de valeur min & max
				{
					if ($_SESSION['Cotes'][$i] == min($_SESSION['Cotes'])) 
					{
						$NbCoteMin++;	
					} else if ($_SESSION['Cotes'][$i] == max($_SESSION['Cotes'])) 
					{
						$NbCoteMax++;	
					}
					$i++;	
				}
				
			 	// calcule ecart-type
			 	$Moyenne = $SommeCote/$_SESSION['NbCotes'];
                $i = 0;
                $sommeEcart = 0;
                while($i < $_SESSION['NbCotes'])
                {
                    $difference = $_SESSION['Cotes'][$i]-$Moyenne; // on calcule la différence (ou l'écart) entre la cote et la moyenne
                    $sommeEcart += ($difference*$difference); // on ajoute le carrée de cette différence à la somme. (Je ne mets pas la différence en valeur absolue parce que le carrée d'un nombre négatif est identique au carrée de ce nombre en positif, le carrée de 2 est 4 et le carrée de -2 est aussi 4, cette valeur absolue ne me semble avoir d'intérêt qu'avec les nombres imaginaires qu'on ne rencontrera jamais ici.)
                    $i++;
                }
                $ecartType = sqrt($sommeEcart/$_SESSION['NbCotes']); // on calcule l'écart type en divisant la somme par le nombre de cote et en faisant la racine carrée du tout.

				
				//Output : affichage de la moyenne et destruction des variables sessions
				echo
					('Résultat : </br>
					La moyenne est de : '.$Moyenne.'.</br>
					La meilleure cote obtenu est un '.max($_SESSION['Cotes']).'. Il y en a eu '.$NbCoteMax.'.</br>
					La pire cote obtenu est un '.min($_SESSION['Cotes']).'. Il y en a eu '.$NbCoteMin.'.</br>
					L\'écart type est de : '.$ecartType.'.');
				session_destroy();
			}		
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