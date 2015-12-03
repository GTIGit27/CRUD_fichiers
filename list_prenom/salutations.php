<?php



$fichier = "liste_prenom.txt";
$texte = file_get_contents($fichier);

if(file_exists("liste_prenom.txt")) {
    
}



$handle = fopen("liste_prenom.txt", "r"); // fopen("liste_prenom.txt", "c") créer le fichier s'il n'existe pas
while($prenom = fgets($handle)) {
    echo "Bonjour" . " ". $prenom . "<br/>";
    
fclose($handle);
}

?>