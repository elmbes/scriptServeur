<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Double du nombre GET</title>
    </head>
    <body>
        <!--

            -----------------------------
            EXPLICATION pour les absents:
            -----------------------------

            Pour OUVRIR CE FICHIER via XAMPP, WAMP ou un autre service de serveur php:
                (S'assurer qu'un logiciel tel que XAMPP ou WAMP est installer sur la machine.)
                Le mettre dans le dossier C:\xampp\htdocs\[mon dossier de travail] pour XAMPP 
                ou dans le dossier C:\wamp\www\[mon dossier de travail] pour WAMP.
                Puis aller dans un navigateur web (Firefox, Google Chrome, …) 
                à l'adresse: localhost/[mon dossier de travail]
                et cliquer sur le nom du fichier



            DÉTAILS DU CODE:
                But: doubler la valeur introduit par dans l'URL
                exemple: entrer comme URL: localhost/[mon dossier de travail]/method_get.php?a=5"
                    ce qui affichera "Le double de 5 vaut 10", 
                    vous pouvez donc changer la valeur de après le a par n'importe quel nombre.

                1 - La méthode qu'on emploie pour envoyer des donner à PHP: la méthode "get"
                    Il existe deux méthodes: "post" ou "get".
                    M. Dewez préconise l'utilisation de la méthode "post" pour tous les formulaires, du moins au début.

                    Mais ici c'est la seconde, la méthode "get", qui va nous intéresser pour ce fichier. 
                    Elle permet d'envoyer des valeurs à PHP d'une page à l'autre en l'inscrivant dans l'URL. 
                    C'est donc très accessible pour l'utilisateur.
                    Les utilités peuvent paraitres floues au début mais
                    M. Dewez explique que si on n'utilise pas de formulaire et qu'on a besoin de quand même envoyer des variables à PHP, on passe d'office par "get".

                    La structure de méthode "get" fonctionne comme suit: [URL de la page .php]?ma_variable=valeur&autre_variable=valeur&variable3=valeur&...
                    pour y accéder en PHP on devra employer la variable spéciale "$_GET"
                    exemple: $_GET['ma_variable'] ou $_GET['autre_variable'] etc...

                    /!\ Ce n'est que très rarement si pas jamais qu'on demande à l'utilisateur d'entrer une valeur par la méthode "get".
                    /!\ c'est donc en général le développeur ou plus souvent le code PHP lui même qui va écrire la valeur de l'URL.

                    (Pour la méthode "post" voir le second fichier "method_post.php".)

                2 - La partie PHP
                    Elle commence par un "if(isset())", "isset()" permet de savoir si une variable existe, si c'est le cas ça renvoie "true" (vrai en français) sinon "false" (faux en français).
                    Ici on vérifie donc si la variable $_GET['a'] existe, cette dernière n'existe que si l'utilisateur à cliquer sur le bouton "envoyer" du formulaire.
                    Si l'utilisateur n'a donc pas envoyé le formulaire alors on ne fais même pas le code PHP

                    Quand on utilise la méthode "get" les données sont stockées à l'intérieur de la variable $_GET.
                    Pour accéder à chaque donnée on doit utiliser le nom donné dans l'URL. 
                        exemple: 
                            si l'URL est: localhost/method_get.php?a=5&age=25&recherche=pantalon
                            $_GET['a'] qui vaut donc 5 ou $_GET['age'] qui vaut 25 ou encore $_GET['recherche'] qui vaut "pantalon"

                    Après le if(isset()) c'est du PHP assez classique,
                    les "$" indique une variable,
                    les "=" premettent de donner une valeur à la variable écrite à leur gauche, (dans ce sens: $ma_variable = valeur)
                    les "+", "-", "*" et "/" permettent respectivement d'additionner, soustraire, multiplier et diviser.

                    Le "echo" est un peu moins facile à comprendre au début car ce dernier ressemble à une fonction d'affichage de texte mais ce n'est pas le cas.
                    "echo" injecte enfait du code html à l'endroit où ce dernier est placé dans la page.
                    Il va donc effectivement afficher du texte si on l'écrit dedans mais c'est parce que si on mets du texte dans un fichier html, il sera afficher,
                    mais on peut très bien mettre des balises html dedans !
                    exemple: echo '<p>Ceci affiche un age en gras: vous êtes âgé de <strong>'.$age.'</strong> ans.</p>'
                        dans cette exemple, on concatène (on "fusionne") trois paramêtres ensemble: 
                        la première chaine de caractère allant de "Ceci" à "<strong>", 
                        la valeur de la variable "$age" 
                        et également la seconde chaine de caractère "</strong> ans."
                        après les avoir concaténer on demande au "echo" de les inscrire à cet endroit dans le code HTML tel quel 
                        et derrière le navigateur lira la balise <strong> et mettra l'âge en gras.

                        On aura donc dans le code HTML par exemple "<p>Ceci affiche un age en gras: vous êtes agé de <strong>25</strong> ans.</p>"
                        et dans le navigateur "Ceci affiche un gae un gras: vous êtes agé de 25 ans." où il faut imaginé le 25 en gras
                
                POUR RÉSUMER: 
                    Ce code récupère la valeur de "a" dans la variable $_GET qui provient de l'URL

        -->

        <?php
            if(isset($_GET['a'])){ // On vérifie si la variable spéciale $_GET['a'] existe.
                $a = $_GET['a'];   // On récupère la valeur introduite dans "$_GET['a']" depuis l'URL.
                $doubleA = $a*2;
                echo "Le double de ".$a." vaut ".$doubleA;
            }
        ?>
    </body>
</html>