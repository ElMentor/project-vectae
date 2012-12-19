
<div class="conteneurInput">

<?php
if ( !empty($_POST['login']) AND !empty($_POST['password']) )
{
    $email = addslashes($_POST['login']);
    $mdp = sha1($_POST['password']);
    
    $requetelogin = mysql_query("SELECT mdp,confirmok FROM vectae_users WHERE email='".$email."'");
    $login = mysql_fetch_array($requetelogin);
    
    if (($login['mdp']== $mdp) AND ($login['confirmok']==1))
    {
    	$_SESSION['email'] = $email;
       	echo "Vous êtes connecté. ";
       	?>
       	<script language='javascript'>
document.location.href="index.php?page=account";
</script>
<?php
       	
    }
    else
    {
    	echo "<b>Erreur de connexion</b>";
    ?>
    	
			<form method="post" action="">
				<input type="text" name="login" class="login" value="E-Mail" onclick="this.value=''" onblur="if (this.value=='') this.value='E-Mail'"/>
				 <input type="password" name="password" class="password" value="motdepasse" onclick="this.value=''" onblur="if (this.value=='') this.value='motdepasse'"/>
				 <input type="submit" name="connecter" class="buttonok" value="Se connecter"  />
			</form>
			<a href="index.php">S'inscrire</a> - <a href="index.php?page=forgottenpassword">Mot de passe perdu</a>
		
    <?php
	}
	
}
else {
	?>
			
			<form method="post" action="">
				<input type="text" name="login" class="login" value="E-Mail" onclick="this.value=''" onblur="if (this.value=='') this.value='E-Mail'"/>
				 <input type="password" name="password" class="password" value="motdepasse" onclick="this.value=''" onblur="if (this.value=='') this.value='motdepasse'"/>
				 <input type="submit" name="connecter" class="buttonok" value="Se connecter"  />
			</form>
			<a href="index.php">S'inscrire</a> - <a href="index.php?page=forgottenpassword">Mot de passe perdu</a>
		
<?php
	
	
}

?>
</div>