er = "root";
$password = "";

// connexion à la base de données en root
// avec gestion exception

try {
    // connexion en local à la base
        $h_db = new PDO('mysql:host=127.0.0.1;dbname=Exercice_3;charset=utf8', $user, $password);
	    $h_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // mode de gestion d'erreur
	        $h_db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // http://php.net/manual/fr/pdo.setattribute.php

		} catch(PDOException $ex) {
		    echo "ERREUR...";
		    }



		    $req = $h_db->exec("CREATE TABLE IF NOT EXISTS `contacts` (
		        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			    `E3con_lastname` VARCHAR(40) NOT NULL ,
			        `E3con_firstname` VARCHAR(40) NOT NULL ,
				    `E3con_mail` VARCHAR(80) NOT NULL ,
				        `E3con_dob` DATE NOT NULL ,
					    `E3con_address` VARCHAR(255) NOT NULL ,
					        `E3con_zipcode` VARCHAR(5) NOT NULL,
						    `E3con_city` VARCHAR(40) NOT NULL)");

						    // Preparation de la requete d'insertion
						    $stmtI = $h_db->prepare("INSERT INTO contacts(E3con_lastname, E3con_firstname, E3con_mail, E3con_dob, E3con_address, E3con_zipcode, E3con_city) VALUES(?, ?, ?, ?, ?, ?, ?)");
						    // preparation de la requete de verification de mail
						    $stmtP = $h_db->query("SELECT * FROM contacts WHERE E3con_mail LIKE 'roger.dalon@gmail.com'" );
						    $result = $stmtP->fetch();
						    //print_r($result); // debug contenu de l'array
						    // Si l'array est pas nul alors l'adresse existe
						    // si elle ,'existe pas :
						    if (empty($result)) {
						        $stmtI->execute(array('Dalon', 'Roger', 'roger.dalon@gmail.com' , '1960/05/01', '25 Rue Jules Guesde', '75012', 'Paris'));
							}




							$err = "";
							$lastname = "";
							$firstname = "";
							$dob ="";
							$mail = "";
							$address = "";
							$zipcode = "";
							$city = "";

							try { 

							    if (isset($_POST["post"])) {

							            // échappement des caractères html
								            $lastname = htmlentities($_POST["lastname"]);
									            $firstname = htmlentities($_POST["firstname"]);
										            $dob = htmlentities($_POST["dob"]);
											            $mail = htmlentities($_POST["mail"]);
												            $address = htmlentities($_POST["address"]);
													            $zipcode = htmlentities($_POST["zipcode"]);
														            $city = htmlentities($_POST["city"]);

															            // Si aucun des hamps n'est vide 
																            if(!empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["dob"]) && !empty($_POST["mail"]) && !empty($_POST["address"]) && !empty($_POST["zipcode"])&& !empty($_POST["city"])) {


																	                // Si le nom correspond az AZ 09 entre 1 et 40 char
																			            if (preg_match("#^[a-zA-Z][a-zA-Z0-9_-]{1,40}$#", $lastname)){
																				                    // alors le nom est ok
																						                    $dbok_lastname = $lastname;
																								                    //sinon : message d'erreur
																										                } else {
																												                $err .= '<strong>Le nom saisi est incorrect.</strong><br />';
																														            }

																															                // Si le prenom correspond az AZ 09 entre 1 et 40 char
																																	            if (preg_match("#^[a-zA-Z][a-zA-Z0-9_-]{1,40}$#", $firstname)){
																																		                    // alors le prenom est ok
																																				                    $dbok_firsname = $lastname;
																																						                    //sinon : message d'erreur
																																								                } else {
																																										                $err .= '<strong>Le prénom saisi est incorrect.</strong><br />';
																																												            }

																																													                // Vérification s'il s'agit bien d'une date à faire
																																															            if ($dob != ""){
																																																                    // alors le prenom est ok
																																																		                    $dbok_dob = $dob;
																																																				                    //sinon : message d'erreur
																																																						                } else {
																																																								                $err .= '<strong>La date de naissance est incorrecte.</strong><br />';
																																																										            }

																																																											                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)){

																																																													                // verification de l'existence du mail en base de donnees               
																																																															                $stmt = $h_db->prepare("select id from contacts where E3con_mail  = '".$mail."'" );
																																																																	                $result = $stmt->fetch();
																																																																			                //print_r($result);
																																																																					                if (empty($result)) {

																																																																							                    $dbok_mail = $mail;
																																																																									                    } else {
																																																																											                        $err .= "<strong>L'adresse " . $mail . ' existe déjà.</strong><br />';
																																																																														                }
																																																																																                // si l'adresse existe
																																																																																		                //  $err .= "L'adresse " . $mail . " existe déjà.";



																																																																																				                $dbok_mail = $mail;
																																																																																						            } else {
																																																																																							                    $err .= "<strong>L'adresse " . $mail . " ne respecte pas les critères de validité.</strong><br />";
																																																																																									                }

																																																																																											            if ($address != ''){
																																																																																												                    $dbok_address = $address;
																																																																																														                } else {
																																																																																																                $err .= "<strong>Le code postal ne respecte pas les critères de validité.</strong><br />";
																																																																																																		            }

																																																																																																			                if (preg_match("#^[0-9]{5}$#", $zipcode)){
																																																																																																					                $dbok_zipcode = $zipcode;
																																																																																																							            } else {
																																																																																																								                    $err .= "<strong>Le code postal ne respecte pas les critères de validité.</strong><br />";
																																																																																																										                }

																																																																																																												            if ($city != ""){
																																																																																																													                    $dbok_city = $city;
																																																																																																															                } else {
																																																																																																																	                $err .= "<strong>La ville n'est pas correcte.</strong><br />";
																																																																																																																			            }







																																																																																																																				                // Si Tous les champs ont été validé, alors on peut les inscrire dans la BDD
																																																																																																																						            if (!empty($dbok_lastname) && !empty($dbok_firsname) && !empty($dbok_mail) && !empty($dbok_dob) && !empty($dbok_address) && !empty($dbok_zipcode) && !empty($dbok_city)) {
																																																																																																																							                    $stmto = $h_db->prepare("INSERT INTO contacts(E3con_lastname, E3con_firstname, E3con_mail, E3con_dob, E3con_address, E3con_zipcode, E3con_city) VALUES(?, ?, ?, ?, ?, ?, ?)");
																																																																																																																									                    $stmto->execute(array($dbok_lastname, $dbok_firsname, $dbok_mail, $dbok_dob, $dbok_address, $dbok_zipcode, $dbok_city));
																																																																																																																											                    $lastname = "";
																																																																																																																													                    $firstname = "";
																																																																																																																															                    $dob ="";
																																																																																																																																	                    $mail = "";
																																																																																																																																			                    $address = "";
																																																																																																																																					                    $zipcode = "";
																																																																																																																																							                    $city = "";
																																																																																																																																									                    // Sinon on affiche les erreurs qui ont été trouvée
																																																																																																																																											                } else {
																																																																																																																																													                echo  $err;
																																																																																																																																															            }
																																																																																																																																																            } else {
																																																																																																																																																	                echo 'Merci de remplir tout les champs du formulaire';
																																																																																																																																																			        }
																																																																																																																																																				    }
																																																																																																																																																				    } catch(PDOException $ex) {
																																																																																																																																																				        echo $ex->getMessage();
																																																																																																																																																					}


																																																																																																																																																					?>

																																																																																																																																																					<!doctype html>
																																																																																																																																																					<html>
																																																																																																																																																					    <head>
																																																																																																																																																					            <meta charset="utf-8">
																																																																																																																																																						            <title>Formulaire</title>
																																																																																																																																																							        </head>
																																																																																																																																																								    <body>
																																																																																																																																																								            <div>
																																																																																																																																																									                <form method="post">
																																																																																																																																																											                <div id="lastname"><span>Nom : <input type="text" name="lastname" value="<?php echo $lastname; ?>"></span></div>
																																																																																																																																																													                <div id="firstname"><span>Prénom : <input type="text" name="firstname" value="<?php echo $firstname; ?>"></span></div>
																																																																																																																																																															                <div id="dob"><span>Date de naissance : <input type="date" name="dob" value="<?php echo $dob; ?>"></span></div>
																																																																																																																																																																	                <div id="mail"><span>Adresse e-mail : <input type="email" name="mail" value="<?php echo $mail; ?>" ></span></div>
																																																																																																																																																																			                <div id="address"><span>Adresse : <input type="text" name="address" value="<?php echo $address; ?>" ></span></div>
																																																																																																																																																																					                <div id="zipcode"><span>Code postal : <input type="text" name="zipcode" value="<?php echo $zipcode; ?>" ></span></div>
																																																																																																																																																																							                <div id="city"><span>Ville : <input type="text" name="city" value="<?php echo $city; ?>" ></span></div>
																																																																																																																																																																									                <input type="submit" name="post" value="Envoyer"><input type="submit" name="reset" value="Annuler">
																																																																																																																																																																											            </form>
																																																																																																																																																																												            </div>
																																																																																																																																																																													        </body>
																																																																																																																																																																														</html>
