<?php
    $chaine = 'test de texte assez long pour engendrer des retours à la ligne automatique...';
    $chaine.= ', répétitif car besoin d\'un retour à la ligne';
    $chaine.= ', répétitif car besoin d\'un retour à la ligne';
    $chaine.= ', répétitif car besoin d\'un retour à la ligne';
    $chaine.= ', répétitif car besoin d\'un retour à la ligne';
?>
<style type="text/css">
<!--
ul
{
    background: #FFDDDD;
    border: solid 1px #FF0000;
}

ol
{
    background: #DDFFDD;
    border: solid 1px #00FF00;
}

ul li
{
    background: #DDFFAA;
    border: solid 1px #AAFF00;
}

ol li
{
    background: #AADDFF;
    border: solid 1px #00AAFF;
}
-->
</style>
<page style="font-size: 11px">
    <ul style="list-style-type: disc; width: 80%">
        <li>
            Point 1 :<br><?= $chaine; ?>
        </li>
        <li>
            Point 2 :<br><?= $chaine; ?>
            <ul style="list-style-type: circle">
                <li>
                    Point 1 :<br><?= $chaine; ?>
                </li>
                <li>
                    Point 2 :<br><?= $chaine; ?>
                    <ul style="list-style-type: square">
                        <li>
                            Point 1 :<br><?= $chaine; ?>
                        </li>
                        <li>
                            Point 2 :<br><?= $chaine; ?>
                        </li>
                        <li>
                            Point 3 :<br><?= $chaine; ?>
                            <ul style="list-style-image: url(./res/puce.gif)">
                                <li>
                                    Puce en image 1 :<br><?= $chaine; ?>
                                </li>
                                <li>
                                    Puce en image 2 :<br><?= $chaine; ?>
                                </li>
                                <li>
                                    Puce en image 3 :<br><?= $chaine; ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    Point 3 :<br><?= $chaine; ?>
                </li>
            </ul>
        </li>
        <li>
            Point 3 :<br><?= $chaine; ?>
        </li>
    </ul>
    <hr><hr>
    <ol style="list-style-type: upper-roman">
        <li>
            Point 1 :<br><?= $chaine; ?>
        </li>
        <li>
            Point 2 :<br><?= $chaine; ?>
            <ol style="list-style-type: lower-alpha">
                <li>
                    Point 1 :<br><?= $chaine; ?>
                </li>
                <li>
                    Point 2 :<br><?= $chaine; ?>
                    <ol style="list-style-type: decimal">
                        <li>
                            Point 1 :<br><?= $chaine; ?>
                        </li>
                        <li>
                            Point 2 :<br><?= $chaine; ?>
                        </li>
                        <li>
                            Point 3 :<br><?= $chaine; ?>
                        </li>
                    </ol>
                </li>
                <li>
                    Point 3 :<br><?= $chaine; ?>
                </li>
            </ol>
        </li>
        <li>
            Point 3 :<br><?= $chaine; ?>
        </li>
    </ol>
</page>