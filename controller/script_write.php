<?php 
session_start();
header('Content-Type: text/html; charset=utf-8');

$nom = $prenom = $titre = $categorie = $article = "";
$error = false;

	if ( (isset($_POST["nom"])) && (strlen(trim($_POST["nom"])) > 0) ) {
        $nom = stripslashes(strip_tags($_POST["nom"]));	
    }
	else {
        $_SESSION["errnom"] = "Merci d'écrire votre nom <br />";
		$error = true;
        $nom = "";
	}	
    if ( (isset($_POST["prenom"])) && (strlen(trim($_POST["prenom"])) > 0) ) {
        $prenom = stripslashes(strip_tags($_POST["prenom"]));	
    }
	else {
        $_SESSION["errprenom"] = "Merci d'écrire votre prénom <br />";
		$error = true;
        $prenom = "";
    }
    if ( (isset($_POST["titre"])) && (strlen(trim($_POST["titre"])) > 0) ) {
        $titre = stripslashes(strip_tags($_POST["titre"]));	
    }
	else {
        $_SESSION["errtitre"] = "Merci d'écrire un titre <br />";
		$error = true;
        $titre = "";
    }

    if ( (isset($_POST["categorie"])) && (strlen(trim($_POST["categorie"])) > 0) ) {
        $categorie = stripslashes(strip_tags($_POST["categorie"]));	
    } 
	else {
        $_SESSION["errcategorie"] = "Merci d'écrire une catégorie <br />";
		$error = true;
        $categorie = "";
    }

    if ( (isset($_POST["article"])) && (strlen(trim($_POST["article"])) > 0) ) {
        $article = stripslashes(strip_tags($_POST["article"]));	
    } 
	else {
        $_SESSION["errarticle"] = "Merci d'écrire votre article <br />";
		$error = true;
        $article = "";
    }
	
	if ($error == false) {
	
	include("../model/pdo.php");
	$sqlart="INSERT INTO articles (titre, contenu, nom_auteur, prenom_auteur, nom_categorie) VALUES (:titre, :article, :nom, :prenom, :categorie)";
	$sqlcat="INSERT INTO categories (nom_cat) VALUES (:categorie)";
	$sqlaut="INSERT INTO auteurs (nom_auteur, prenom_auteur) VALUES (:nom, :prenom)";
	
	$prep= $pdo->prepare("$sqlart");
	$prep2= $prep->execute(array(	'titre' => $titre, 
									'article' => $article,
									'nom' => $nom,
									'prenom' => $prenom,
									'categorie' => $categorie));
	$prep3= $pdo->prepare("$sqlcat");
	$prep4= $prep3->execute(array(	'categorie' => $categorie));
	$prep5= $pdo->prepare("$sqlaut");
	$prep6= $prep5->execute(array(	'nom' => $nom,
									'prenom' => $prenom));
	$pdo = null;
	
	}

	 header('Location: ../views/write.php');
	 ?>