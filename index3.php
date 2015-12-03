<?php

$fichier = "bonjour3.txt";
// écritures

file_put_contents($fichier, "Pascual\r\n"); // r et n pour passer à la ligne
file_put_contents($fichier, "Paul", FILE_APPEND); // on inscrit en ajoutant

// lecture
$texte = file_get_contents($fichier);
echo $texte;
?>