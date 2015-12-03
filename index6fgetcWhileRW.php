<?php

$fichier = "bonjour6fgetcWhileRW.txt";
// écritures

file_put_contents($fichier, "Pascual\r\n"); // r et n pour passer à la ligne
file_put_contents($fichier, "Paul", FILE_APPEND); // on inscrit en ajoutant


// lecture
$texte = file_get_contents($fichier);
echo $texte; // on affiche le texte dans un navigateur

$handle = fopen("bonjour6fgetcWhileRW.txt", "r");

$car = fgetc($handle);
echo "Le premier caractère du fichier est $car <br/> <br/>";
fclose($handle);


//boucle de lecture
$handle = fopen("bonjour6fgetcWhileRW.txt", "r");
while(FALSE !== ($char = fgetc($handle))) {
    echo $char . " ";
}

//boucle en lecture/écriture
$handle = fopen("bonjour6fgetcWhileRW", "r+");
$texte = "";
while($char = fgetc($handle)) {
    // lire le premier caractère
    // écrire ce caractère puis écrire un espace
    $texte .= $char . " ";
}
fclose($handle);
file_put_contents($fichier, $texte);
?>