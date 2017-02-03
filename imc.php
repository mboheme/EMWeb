<?php
$poids = 0;
$taille = 0;

if(isset($_POST['poids']) && isset($_POST['taille']) ){
	$poids = $_POST['poids'];
	$taille = $_POST['taille'];
	if($poids > 0 && $taille > 0){
		$imc = $poids / (cm2m($taille)*cm2m($taille));
	}
	$return = array("imc" => round($imc, 2), "msg" => corespondanceIMC($imc));
	echo json_encode($return);
	return true ;
}

function cm2m($taille){
	$m  = $taille / 100;
	return $m;
}

function corespondanceIMC($imc){

	switch($imc){	
	case ($imc <= 16.5): // famine
		return 'Famine';
	break;
	
	case ($imc <= 18.5): // maigreur
		return 'Maigreur';
	break;
	
	case ($imc <= 25): // corpulence normale
		return 'Corpulence normale';
	break;
	
	case ($imc <= 30): // surpoids
		return 'Surpoids';
	break;
	
	case ($imc <= 30): // obésité modérée
		return 'Obésité modérée';
	break;
	
	case ($imc <= 40): // obésité sévère
		return 'Obésité sévère';
	break;
	
	case ($imc > 40): // obésité morbide ou massive
		return 'Obésité morbide ou massive';
	break;
	
	default :
		return '';
	break;
	}
}

?>
