<?php
	session_start();
	include("../model/pdo.php");
	error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Projet mini blog acs</title>
        <meta name="description" content="Bootstrap" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<meta charset="utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="templates/bootstrap/js/bootstrap.min.js"></script>
        <script src="templates/popup.js"></script>
	</head>
	<body>
		<h1>Le Blog d'Eddy</h1>
		<header>
			<div class="container">
				<nav class="navbar">
					<ul class="nav navbar-nav">
						
							
							<li class="dropdown">
								<a class="link dropdown-toggle" data-toggle="dropdown" href="#">Auteurs
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									  <?php 
											 $category = $pdo->query("SELECT nom_auteur,prenom_auteur FROM auteurs GROUP BY nom_auteur");
											 $rlt = $category->fetchAll();
											 foreach ($rlt as $aut) {
												print "<li><a href='accueil.php?auteur=".$aut["nom_auteur"]."'>".$aut["prenom_auteur"]. " ".$aut["nom_auteur"]."</a></li>";
											 }
										?>
								</ul>
							</li>
							<li class="dropdown">
								<a class="link dropdown-toggle" data-toggle="dropdown" href="#">Catégories
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									  <?php 
											 $category = $pdo->query("SELECT nom_cat FROM categories GROUP BY nom_cat");
											 $rlt = $category->fetchAll();
											 foreach ($rlt as $cat) {
												print "<li><a href='accueil.php?categorie=".$cat["nom_cat"]."'>".$cat["nom_cat"]."</a></li>";
											 }
										?>
								</ul>
							</li>
							
							
							<li class="writearticle">
								<a href="write.php">+ Ecrire un nouvel article</a>
							</li>
							
						
					</ul>	
				</nav>
			</div>
		</header>