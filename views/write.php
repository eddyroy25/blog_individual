<?php 	
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include("../model/pdo.php");
include("head.php");
header('Content-Type: text/html; charset=utf-8');
?>
<main>				
						<div class="container">
							<div class="editarticle">
								<div class="row"> 
									<form method="post" action="../controller/script_write.php" name="formulaire" id="formulaire" >
											<h2>Créer un article</h2>	
										<div class="col-xs-12 col-md-12 col-md-offset-3">
											<div>
												<input id="nom" name="nom" placeholder="Nom" value="<?php echo $_SESSION["nom"];?>"><br>
												<span id="nomerr" class="error"><?php echo $_SESSION["errnom"];?></span>
											</div>
											<div>
												<input id="prenom" name="prenom" placeholder="Prénom" value="<?php echo $_SESSION["prenom"];?>"><br>
												<span id="prenomerr" class="error"><?php echo $_SESSION["errprenom"];?></span>
											</div>
											<div>
												<input id="titre" name="titre" placeholder="Titre" value="<?php echo $_SESSION["titre"];?>"><br>
												<span id="titreerr" class="error"><?php echo $_SESSION["errtitre"];?></span>
											</div>

											<div>
												<input id="categorie" name="categorie" placeholder="Catégorie" value="<?php echo $_SESSION["categorie"];?>"><br>
												<span id="caterr" class="error"><?php echo $_SESSION["errcategorie"];?></span>
											</div>
											<div>
												<textarea id="article" name="article" rows="9" cols="100" placeholder="Écrivez votre article ici" value="<?php echo $_SESSION["article"];?>"></textarea><br>
												<span id="articleerr" class="error"><?php echo $_SESSION["errarticle"];?></span><br>
											</div>
										</div>
										<div class="col-xs-12 col-md-12 col-md-offset-5">
											<input class="publier" type="submit" value="Publier"/>
										</div>
									</form>
								</div>
							</div>
						</div>
						<span id="message"></span>
						<span id="msg_all"></span>
</main>

					<script src ="fichier.js" type="text/javascript"></script>
					<script src ="ajax.js" type="text/javascript"></script>
					<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

					<!----<script>

						    $(function(){

						        $("#formulaire").submit(function(event){

						            
									var monnom = $("#nom").val();
									var monprenom = $("#prenom").val();
									var montitre = $("#titre").val();
						            var monarticle = $("#article").val();
						            var macategorie = $("#categorie").val();
						            var meschamps = montitre + monarticle + macategorie;
									var message = "Veuillez remplir tous les champs"
						            var nomalerte = "Veuillez entrer votre nom";
									var prenomalerte = "Veuillez entrer votre prénom";
									var titrealerte  = "Veuillez entrer votre titre";
									var articlealerte  = "Veuillez entrer votre article";
									var categoriealerte  = "Veuillez entrer une catégorie";
									var erreurenvoi = false;
									
									$("#titreerr").html("");
									$("#articleerr").html("");
									$("#caterr").html("");
						            if (meschamps  == "") {
						                $("#msg_all").html(message);
										var erreurenvoi = true;
						            } 
									if (monnom == "") {
						                $("#nomerr").html(nomalerte);
										var erreurenvoi = true;
						            }
									if (monprenom == "") {
						                $("#prenomerr").html(prenomalerte);
										var erreurenvoi = true;
						            }
									if (montitre == "") {
						                $("#titreerr").html(titrealerte);
										var erreurenvoi = true;
						            } 
									if (monarticle == "") {
						                $("#articleerr").html(articlealerte);
										var erreurenvoi = true;
						            } 
						            if (macategorie == "") {
						                $("#caterr").html(categoriealerte);
										var erreurenvoi = true;
						            } 

									if (erreurenvoi == false) {
						                $.ajax({
						                    type : "POST",
						                    url: $(this).attr("action"),
						                    data: $(this).serialize(),
						                    success : function() {
						                        $("#formulaire").html("<div class='col-xs-12 col-md-8 col-md-offset-3'><p>L'article a bien été publié !</p></div><br><div class='col-xs-12 col-md-8 col-md-offset-3'><a class='accueil' href='index.php'>Retourner à l'accueil</a></div>");
											
						                    },
						                });
						            }
						            return false;
						        });
						    });
						</script>---->
						
<?php
session_unset();
session_destroy();
?>						