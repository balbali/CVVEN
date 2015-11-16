<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" media="screen" href="css/feuille.css" />
        <title></title>
    </head>
    <body>
        <?php
        require("calendrier/class.calendrier.inc.php");
        if (isset($_GET['annee'])) {
            $annee = $_GET['annee'];
        } else {
            $annee = date('Y');
        }


        //Affichage du calendrier du mois en cours
        $cal = new calendrier($annee);
        $cal->afficher_calendrier_annee(date('n'),date('Y'));
        $cal->afficher_calendrier_annee();
        

        echo '<table class="cal-navig">
                                        <tr>
                                            <td class="anneeprec">
                                                <a href="index.php?annee=' . ($annee - 1) . '">
                                                    <img src="img/prec.png" alt="' . ($annee - 1) . '" style="border:none;" />
                                                </a>
                                            </td>
                                            <td class="anneesuiv">
                                                <a href="index.php?annee=' . ($annee + 1) . '">
                                                    <img src="img/suiv.png" alt="' . ($annee + 1) . '" style="border:none;" />
                                                </a>
                                            </td>
                                       </tr>
              </table>';
        

        ?>
    </body>
</html>
