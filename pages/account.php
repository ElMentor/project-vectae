
<?php 
if (!empty($_SESSION['email']))
{
	?>
<div id="aboutbox">
		<h1>Mon compte</h1>
<?php
	$email=$_SESSION['email'];
	
	$requeteDateInsc = mysql_query("SELECT subscribe FROM vectae_users WHERE email='".$email."'");
    $dateInsc = mysql_fetch_array($requeteDateInsc);
    
    echo "<p>Bonjour, votre identifiant est ";
    echo $_SESSION['email'];
    echo "</p><p>Votre date d'inscription est ";
    echo date('d/m/Y à H:i:s', $dateInsc['subscribe']);
?>
	
		<p><b>Vous êtes connecté</b></p>
		<h1>Faux Texte</h1>
		<p>Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, quod tibi ita videri necesse 			est, non satis politus iis artibus, quas qui tenent, eruditi appellantur aut ne deterruisset alios a studiis. quamquam te quidem video minime 			esse deterritum.
		
		Iamque lituis cladium concrepantibus internarum non celate ut antea turbidum saeviebat ingenium a veri consideratione detortum et nullo 				inpositorum vel conpositorum fidem sollemniter inquirente nec discernente a societate noxiorum insontes velut exturbatum e iudiciis fas omne 			discessit, et causarum legitima silente defensione carnifex rapinarum sequester et obductio capitum et bonorum ubique multatio versabatur per 			orientales provincias, quas recensere puto nunc oportunum absque Mesopotamia digesta, cum bella Parthica dicerentur, et Aegypto, quam necessario 		aliud reieci ad tempus.
		
		Ex turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae 				Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; aut pugnaciter aleis certant turpi sono fragosis naribus 				introrsum reducto spiritu concrepantes; aut quod est studiorum omnium maximum ab ortu lucis ad vesperam sole fatiscunt vel pluviis, per minutias 		aurigarum equorumque praecipua vel delicta scrutantes.
		</p>
		<p><a href="index.php?page=logoff">Se deconnecter</a></p>
		</div>
<?php
}
else {

?>
<script language='javascript'>
document.location.href="index.php?page=login";
</script>
<?php }
?>