<?php

$fichier = "bonjour5fgetc.txt";
// écritures

file_put_contents($fichier, "Pascual\r\n"); // r et n pour passer à la ligne
file_put_contents($fichier, "Paul", FILE_APPEND); // on inscrit en ajoutant

// lecture
$texte = file_get_contents($fichier);
echo $texte; // on affiche le texte dans un navigateur

$handle = fopen("bonjour5fgetc.txt", "r");

$car = fgetc($handle);
echo "Le premier caractère du fichier est $car";
fclose($handle);

// résultat : Pascual PaulLe premier caractère du fichier est P
?>