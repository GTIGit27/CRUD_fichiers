<?php
$fichier = "cerfmalade.txt";
// écritures
$fable =<<<EOD
LE CERF MALADE
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
            Tout le monde se fait payer.
EOD;
file_put_contents($fichier, $fable);

$texte = file_get_contents($fichier);

// en majuscule
$texte = strtoupper($texte);

//afficher
echo "<pre>" . $texte . "</pre>";

// modifier le fichier txt en majuscule
file_put_contents($fichier, $texte);

//Inverser A et E
$temporaire = "";
$handle = fopen($fichier, "r");
while ($caractere = fgetc($handle)) {
	// E => A
	if ($caractere == 'E') {
		$temporaire = $temporaire . 'A'; // .=
	} elseif ($caractere == 'A') {		// A => E
		$temporaire .= 'E';
	} else {
		$temporaire .= $caractere;
	}
}
fclose($handle);
file_put_contents($fichier, $temporaire);
echo "<pre>" . $temporaire . "</pre>";

