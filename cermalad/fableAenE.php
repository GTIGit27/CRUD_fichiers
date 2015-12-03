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
echo $texte . "<br/>"; // affiche le texte dans le navigateur


// texte en majsucule
$str = $texte;
$str = strtoupper($str);
echo $str . "<br/>";

// remplacer les A en E
$in = array('A');
$out = array('E');
$str = str_replace($in, $out, $str);
echo $str ."<br/>";

// remplacer les E en A
$in = array('E');
$out = array('A');
$str = str_replace($in, $out, $str);
echo $str;






