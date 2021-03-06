<?php
/* Fonction sans parametres qui renvoi un <p> avec la date du jour.*/
function getTheDate(){
	$jour = date('d');
	$mois = date('m');
	$annee = date('Y');
	$heure = date('H');
	$minutes = date('i');
	$jours_de_semaine = array('Dimanche' , 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
	$jour_de_semaine = date('w');

	$date = '<p>'. $jours_de_semaine[$jour_de_semaine]. '/' . $jour . '/' .$mois . '/' .$annee. '</p>';
	return $date;
}

/**
*	Donne l'age d'une date par rapport avec la date actuelle.
*	@param $msgDate date de l'objet à dater
*
*	@return un string
*/
function getOld ($msgDate){
	$msgDate = date_create($msgDate);
	$currentTime = date_create('now');
	$time = date_diff($msgDate, $currentTime);
	$age = explode("/", $time->format('%i/%h/%d/%m/%y'));
	$age = ["minutes" => $age[0], "heures" => $age[1], "jours" => $age[2], "mois" => $age[3], "an" => $age[4]];
	foreach($age as $element => $value){
		if(!empty($value)){
			$max_element_value = $value;
			$max_element = $element;
		}
	}
	if (empty($max_element_value)) {
		$max_element_value = 'moins de 1';
		$max_element = 'minute';
	}
	if ($max_element === 'heures' && $max_element_value === '1') {
		$max_element = 'heure';
	}if ($max_element === 'minutes' && $max_element_value === '1') {
		$max_element = 'minute';
	}if ($max_element === 'jours' && $max_element_value === '1') {
		$max_element = 'jour';
	}if ($max_element === 'ans' && $max_element_value === '1') {
		$max_element = 'an';
	}
	//TODO Ajouter une valeur dans certains cas.
	return 'il y a ' . $max_element_value . ' ' . $max_element;
}

function userMention($matches){
	global $UsersManager;
	if($UsersManager->userTest($matches[1])){
		$user_info = $UsersManager->getUser($matches[1]);
		$matches[0] = '['.$matches[0].'](/profile/'. $user_info['ID'] .')';
	}
	$mention = '**'.$matches[0].'**';

	return $mention;
}