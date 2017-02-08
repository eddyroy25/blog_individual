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
	   $query = $pdo->query("SELECT * FROM articles WHERE nom_auteur='".$_GET['auteur']."' ORDER BY id_auteur DESC");
	   
   }
   else if (isset($_GET['categorie'])) {
	   $query = $pdo->query("SELECT * FROM articles WHERE nom_categorie='".$_GET['categorie']."' ORDER BY id_categorie DESC");
   }
   
   
   $result = $query->fetchAll();
   

   foreach ($result as $row){
    echo "<div class='divarticle'><br>";
    
    print "<h2 class='titre'>".$row["titre"]."</h2>";
    print "<p class='text'>".$row["contenu"]."<p>";
    print "<p class='cat'>".$row["nom_categorie"]."</p>";
    print "<h5 class='autor'>Article de ".$row["prenom_auteur"]. "".$row["nom_auteur"]."</h5>";
    echo "<div class='box'><a class='button' href='popup.php?id_article=".$row["id_article"]."' id_article='".$row["id_article"]."'>Afficher l'article</a></div><br>";
   }

?>
	
	
	</div>
</main>

	
