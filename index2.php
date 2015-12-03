<?php

$fichier = "bonjour2.txt";
// écritures

file_put_contents($fichier, "Pascual\r\n"); // r et n pour passer à la ligne
file_put_contents($fichier, "Pierre", FILE_APPEND); // on inscrit en ajoutant

// lecture
?>