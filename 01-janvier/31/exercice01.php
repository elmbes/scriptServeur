<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Double du nombre POST</title>
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
                But: doubler la valeur introduit par l'utilisateur

                1 - Dans la balise <form> on a un formulaire html tout ce qu'il y a de plus classique qui va prendre en entrée une valeur par l'utilisateur.
                    2 points importants: d'abord l'attribut "action" et ensuite l'attribut "method" de la balise <form>

                    - l'attribut "action" définit la page par laquelle le formulaire doit être traité (là où il y a le code PHP qui va travailler sur les informations envoyées.)
                      ici l'attribut action redirige vers la même page, c'est donc sur cette page que va se trouver le code PHP qui va traiter les données du formulaire.
                    
                    - l'attribut "method" définit la méthode qu'on va employé pour envoyer les données. Il existe deux méthodes: "post" ou "get".
                      M. Dewez préconise l'utilisation de la méthode "post" pour tous les formulaires, du moins au début.
                      Celle-ci permet d'envoyer les données de manière "caché" à l'utilisateur 
                      (! MAIS quand même accessible par ce dernier via des logiciels tiers ! Ce n'est pas une méthode pour sécuriser les informations de son site, 
                      c'est surtout par allégé l'URL pour l'utilisateur que la méthode "get" rallongerait excessivement.)

                      (Pour la méthode "get" voir le second fichier "method_get.php".)

                2 - La partie PHP
                    Elle commence par un "if(isset())", "isset()" permet de savoir si une variable existe, si c'est le cas ça renvoie "true" (vrai en français) sinon "false" (faux en français).
                    Ici on vérifie donc si la variable $_POST['envoyer'] existe, cette dernière n'existe que si l'utilisateur à cliquer sur le bouton "envoyer" du formulaire.
                    Si l'utilisateur n'a donc pas envoyé le formulaire alors on ne fais même pas le code PHP

                    Quand on utilise la méthode "post" les données sont stockées à l'intérieur de la variable $_POST.
                    Pour accéder à chaque donnée on doit utiliser le nom donné au champ dans l'attribut "name" dans le formulaire html. 
                        exemple: $_POST['email'] ou $_POST['age'] ou $_POST['valeur_de_lattribut_name']

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
                    On a un formulaire HTML qui renvoie ses données sur la même page et ses données sont ensuite lu par le code PHP, traitées et enfin affichés.

        -->

        <form action="method_post.php" method="post">
            <label for="a">Veuillez entrer une valeur : </label>
            <input type="text" name="a" value="0">
            <input type="submit" name="envoyer" value="Envoyer">
        </form>
        <?php
            if(isset($_POST['envoyer'])){ // On vérifie que le formulaire à bien été envoyé grâce au isset: si oui on le traite, si non on fait rien.
                $a = $_POST['a'];         // On récupère la valeur "a" dans la variable "$_POST"
                $doubleA = $a*2;
                echo "Le double de ".$a." vaut ".$doubleA;
            }
        ?>
    </body>
</html>
