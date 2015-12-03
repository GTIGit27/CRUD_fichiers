<?php

$fichier = "bonjour.txt";
file_put_contents($fichier, "Pascual");
file_put_contents($fichier, "Pierre");
?>


<!-- Pascual est ecrit dans le fichier bonjour.txt -->
<!-- rajout de la ligne 5 : Pierre écrase Pascual -->