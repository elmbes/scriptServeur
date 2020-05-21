<?php
    //========================================================================//
    //========================================================================//
    //===============  Bienvenue sur mon code ==================2020==========//
    //=====================================================El Amrani Mounir===//

   
    /**
     * Parcours un tableau recu en parametre et retourne
     * le nombre de fois que la valeur maximum du tableau a ete trouver dans celui-ci.
     * La taille du tableau est recu en parametre.
     * @$tab : un tableau.
     * @$DimTableau : un entier. 
     */
    function NbMaxTab($tab, $DimTableau){
        $cpt = 0;
        $plusGrandeValaur = $tab[0];
        //Boucle qui cherche le maximum d'un tableau.
        while($cpt<$DimTableau){
            if($plusGrandeValaur<$tab[$cpt]){
                $plusGrandeValaur = $tab[$cpt];
            }
            $cpt++;;
        }

        $cpt = 0;
        $nbMax = 0;
        //Boucle pour compter le nombre de fois que la maximum se trouve dans le tableau.
        while($cpt<$DimTableau){
            if($plusGrandeValaur==$tab[$cpt]){
                $nbMax++;
            }
            $cpt++;
        }
        return $nbMax;
    }

    /**
     * Affiche le min et le max recu en paramtre.
     * @$max : un enteier.
     * @$min : un enteier.
     */
    function OutputNbMinMaxTab($min,$max){
        
        echo "
                <table border=1 >
                    <thead>
                        <th colspan ='2'>Voici el nombre de fois que le min et le max sont apparut dans le tableau</th>  
                    </thead>
                    <tr>
                        <td>Min</td>
                        <td>Max</td>
                    </tr>
                    
                    <tr>
                        <td>".$min."</td>
                        <td>".$max."</td>
                    </tr>
                </table>
        ";

    }

    //========================================================================//
    //=============================Fin de code================================//
    
    ?>