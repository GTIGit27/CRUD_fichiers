<?php

$fichier = "bonjour4handle.txt";
// écritures

file_put_contents($fichier, "Pascual\r\n"); // r et n pour passer à la ligne
file_put_contents($fichier, "Paul", FILE_APPEND); // on inscrit en ajoutant

// lecture
$texte = file_get_contents($fichier);
echo $texte; // on affiche le texte dans un navigateur

$handle = fopen("bonjour4handle.txt", "r");
var_dump($handle); // ouvre le fichier
fclose($handle); // ferme le fichier

// résultat dans le navigateur : Pascual Paulresource(6) of type (stream) 
?>