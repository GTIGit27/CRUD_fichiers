<?php
$fichier = "fableOrigin.txt";

file_put_contents($fichier, "LE CERF MALADE

En pays pleins de Cerfs un Cerf tomba malade.
            Incontinent maint camarade
Accourt à son grabat le voir, le secourir,
Le consoler du moins : multitude importune.
            Eh ! Messieurs, laissez-moi mourir.
            Permettez qu'en forme commune (1)
La Parque (2) m'expédie, et finissez vos pleurs.
            Point du tout : les Consolateurs
De ce triste devoir tout au long s'acquittèrent ;
            Quand il plut à Dieu s'en allèrent.
            Ce ne fut pas sans boire un coup,
C'est-à-dire sans prendre un droit de pâturage.
Tout se mit à brouter les bois du voisinage.
La pitance du Cerf en déchut de beaucoup ;
            Il ne trouva plus rien à frire.
            D'un mal il tomba dans un pire,
            Et se vit réduit à la fin
            A jeûner et mourir de faim.
            Il en coûte à qui vous réclame,
            Médecins du corps et de l'âme.
            O temps, ô moeurs (3) ! J'ai beau crier,
            Tout le monde se fait payer.");

$texte = file_get_contents($fichier);
echo "<pre>" . $texte . "</pre>"; // affiche le texte dans le navigateur

$str = $texte;
$str = strtoupper($str);
echo "<pre>" . $str . "</pre>";

file_put_contents($fichier, $str, FILE_APPEND);
// modifie le fichier fableOrigin.txt. Pour voir la modification, il faut rouvrir à chaque fois le txt, pas de maj dynamique.



