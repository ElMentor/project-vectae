

<div id="aboutbox">
		<h1>Confirmation</h1>
<?php 
$code = $_GET['subscribecode'];
$requetecode = mysql_query("SELECT id FROM vectae_users WHERE confirmcode='".$code."'");
$confirmaccount = mysql_fetch_array($requetecode);

if	($confirmaccount['id']!='') {
		$id=$confirmaccount['id'];
		mysql_query("UPDATE vectae_users SET confirmok='1' WHERE id='".$id."'");


?>
		Votre compte a bien été activé, vous pouvez désormais vous connecter grâce au panneau sur la droite de la page.
		
<?php 
}
else {
?>
	Votre compte n'a pas été activé car le code de confirmation n'est pas valide.

<?php 
}?>


</div>
		


