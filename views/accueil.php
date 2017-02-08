<?php 	
header('Content-Type: text/html; charset=utf-8');
include("head.php");
?>
<main class="container">
	<div class="display">
	<?php       
   if (empty($_GET)) {
       
       $query = $pdo->query("SELECT * FROM articles ORDER BY id_article DESC");
   }
   else if (isset($_GET['auteur'])) {
	   $query = $pdo->query("SELECT * FROM articles WHERE nom_auteur='".$_GET['auteur']."' ORDER BY nom_auteur DESC");
	   
   }
   else if (isset($_GET['categorie'])) {
	   $query = $pdo->query("SELECT * FROM articles WHERE nom_categorie='".$_GET['categorie']."' ORDER BY nom_categorie DESC");
   }
   else if (isset($_GET['article'])) {
	   $query = $pdo->query("SELECT * FROM articles WHERE id_article='".$_GET['article']."'");
   }
   
   
   $result = $query->fetchAll();
   

   foreach ($result as $row){
    echo "<div class='divarticle'><br>";
    
    print "<h2 class='titre'>".$row["titre"]."</h2>";
    print "<p class='text'>".$row["contenu"]."<p>";
    print "<p class='cat'>".$row["nom_categorie"]."</p>";
    print "<h5 class='author'>Article de ".$row["prenom_auteur"]. " ".$row["nom_auteur"]."</h5>";
    echo "<div class='box'><a class='popup' href='accueil.php?article=".$row["id_article"]."'>Afficher l'article</a></div><br>";
   }

?>
</div>
<script>
$(document).ready(function(e) { 	
		
		$('.popup').on('click',function(e) {
		e.preventDefault();	
		$("body").append('<div id="green"></div>');
		$('div#pop').fadeIn()				
	
		});
	
		$('.bouton').on('click',function() { 
		$("#green").remove();

		$('div#pop').fadeOut()         
		});
});
</script>
	<div id="pop">
		<?php 	print "<h2 class='titre'>".$row["titre"]."</h2>";
					print "<p class='text'>".$row["contenu"]."<p>";
					print "<p class='cat'>".$row["nom_categorie"]."</p>";
					print "<h5 class='author'>Article de ".$row["prenom_auteur"]. " ".$row["nom_auteur"]."</h5>";
			?>
		
		<button class="bouton" onClick="hide()">Cacher</button>
	</div>
	<img class="branch" src="../images/branch.png">
</main>