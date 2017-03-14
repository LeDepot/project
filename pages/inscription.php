<?php 

require_once('dao/DaoEtudiant.php');

$etudiant = new DaoEtudiant();

$form['erreur'] = false;
$form['message'] = "";


if(isset($_POST['submit'])) {

	if(!empty($_POST['login']) 
		&& !empty($_POST['password']) 
		&& !empty($_POST['passwordVerif']) 
		&& !empty($_POST['name']) 
		&& !empty($_POST['firstName'])
		&& !empty($_POST['mail'])
		&& !empty($_POST['promo']) 
		&& !empty($_POST['groupe'])
		&& $_POST['password'] == $_POST['passwordVerif']) 
	{
		$form['erreur'] = false;
		$form['message'] = "";
	} elseif ($_POST['password'] != $_POST['passwordVerif']) {
		$form['erreur'] = true;
		$form['message'] = 'les mots de passe ne correspondent pas';
	} {
		$form['erreur'] = true;
		$form['message'] = 'Merci de bien remplir tous les champs';
	}

	if($form['erreur'] == false) {
		$newStudent = new Etudiant(
			array(
				'NOM' 		=> $_POST['name'],
				'PRENOM' 	=> $_POST['firstName'],
				'LOGIN' 	=> $_POST['login'],
				'MDP' 		=> sha1($_POST['password']),
				'MAIL' 		=> $_POST['mail'],
				'PROMO' 	=> $_POST['promo'],
				'GROUPE' 	=> $_POST['groupe'],
				'BLACKLIST'	=> 0,
				'PANIER'	=> "",
				'VALIDE' 	=> 0
			)
		);

		$etudiant->insert($newStudent);

		$form['message'] = "Votre compte a bien été créé, mais doit maintenant être validé par un administrateur.";
	}
}

$param = array('msg' => $form['message']);

?>