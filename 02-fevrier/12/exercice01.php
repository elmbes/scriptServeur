<html>
<?php

session_start();

if (!ISSET($_POST['OK'])){
	$_SESSION['compteur'] = 0;
	echo '
		<form action="ex7.php" method="post">
			<p>Entrez une cote :<input type="number" name="cote"/></p>
			<p><input type="submit" value="OK" name="OK"></p>
		</form>';
} else {
	
	if ($_POST['cote'] != -1) {
		$_SESSION['cotes'][$_SESSION['compteur']] = $_POST['cote'];
		$_SESSION['compteur']++;
		
		echo'
			<form action="ex7.php" method="post">
				<p>Entrez la cote suivante :<input type="number" name="cote"/></p>
				<p><input type="submit" value="OK" name="OK"></p>
			</form>
		';
	} else {
		$i = 0;
		$total = 0;
		while ($i < $_SESSION['compteur'])
		{
			$total = $total + $_SESSION['cotes'][$i];
			$i++;
		}
		$moy = $total/$_SESSION['compteur'];
		echo 'Le total est de '.$total;
		echo 'La moyenne est de '.$moy.'/20.';
	
	}

}
?>
</html>