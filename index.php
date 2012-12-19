<?php 
session_start(); 

mysql_connect("localhost", "root", "root");
mysql_select_db("vectae");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">  
	<head>
		<title>Vectae</title>
       	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       	<meta name="keywords" lang="fr" content="" />
     	<meta name="description" content="" />
     	<meta name="copyright" content="© VECTAE" />
     	<meta http-equiv="Content-Language" content="fr" />
     	<meta http-equiv="Content-Script-Type" content="text/javascript" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="jquery-ui.js"></script>
        <script type="text/javascript" src="righter.js"></script>

        
        <?php 
        if (($_GET['page'])=='workzone') {
        	
		        	echo '<link rel="stylesheet" type="text/css" href="workzone/workzone.css" />';
		        	echo '<script type="text/javascript" src="workzone/workzone.js"></script>';
		 
        	 }
        	?>
        	
                <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />

	</head>

<body
<?php 
if (($_GET['page']=='login') OR ($_GET['page']=='confirm') OR ($_GET['page']=='subscribe')OR ($_GET['page']=='workzone')) {
	echo 'onLoad="manip();"';	
}
?>>

	<div id="righter">
		<div class="bouton"></div>
		<div class="inner">
		
			<?php 
if (!empty($_SESSION['email']))
{?>
			<h1>Compte</h1>
			<div class="conteneurInput">
<?php
	echo '<img src="images/user-grey.png" alt="user" width="64px" height="64px"/><p>Vous êtes connecté sous l\'identifiant <b>';
    echo $_SESSION['email'];
    echo '</b>';
    echo '<ul><li><a href="index.php?page=workzone">Créer un fichier</a></li><li><a href="index.php?page=account">Gérer votre compte</a></li><li><a href="index.php?page=files">Vos fichiers enregistrés</a></li><li><a href="index.php?page=logoff">Déconnexion</a></li></ul></p>';
?>
<?php }
else {
	?>
			<h1>Connexion</h1>
			<div class="conteneurInput">
	
			<form method="post" action="index.php?page=login">
			<input type="text" name="login" class="login" value="E-Mail" onclick="this.value=''" onblur="if (this.value=='') this.value='E-Mail'"/>
			<input type="password" name="password" class="password" value="motdepasse" onclick="this.value=''" onblur="if (this.value=='') this.value='motdepasse'"/>
			<input type="submit" name="connecter" class="buttonok" value="Se connecter"  />
			</form>
			 Mot de passe perdu ?
			
			
			
<?php } ?>
	</div>
	
<?php 
if (empty($_SESSION['email'])) {
	?>
		
		<h1>Inscription</h1>
<div class="conteneurInput">

<?php
if ( !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['verifmdp']) )
{
    $email = addslashes($_POST['email']);
    $mdp = sha1($_POST['mdp']);
    $ip = $_SERVER['REMOTE_ADDR'];
    $requeteemail = mysql_query("SELECT id FROM vectae_users WHERE email='".$email."'");
    $doublonemail = mysql_fetch_array($requeteemail);
    
    if (($_POST['mdp'] == $_POST['verifmdp']) AND ($doublonemail['id']==''))
    {
        $code=sha1(md5($_POST['email']));
        mysql_query("INSERT INTO vectae_users VALUES('', '" . $email . "', '" . $mdp . "', '" . $ip . "', '" . time() . "','','". $code ."')");
           $email = $_POST['email'];
           
		    $from = "no-reply@vectae.com";
		    $sujet = 'Votre inscription sur Vectae';
		    $entete  = 'MIME-Version: 1.0' . "\r\n";
     		$entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		    $entete .= 'From: '.$from.'';
		    $message = 'Bonjour,<br /><br />Vous avez fait une demande d\'inscription sur notre plateforme Vectae.<br />Afin de finaliser votre inscription veuillez cliquer sur le lien suivant : <a href="http://www.vectae.com/index.php?page=confirm&subscribecode='.$code.'">http://www.vectae.com/index.php?page=confirm&subscribecode='.$code.'</a>.<br /><br />Si vous pensez que ce mail ne vous est pas adressé, que vous ne vous êtes pas inscrit sur le site vectae.com, vous pouvez l\'ignorer.<br /><br />Cordialement,<br />L\'équipe Vectae.com';
		    mail($email, $sujet, $message, $entete);
		    echo "<p>Félicitations votre compte a été créé. Pour finaliser l'inscription vous devez cliquer sur le lien qui vous a été envoyé par mail.</p>";

    }
    else if ($_POST['mdp'] != $_POST['verifmdp']){?>
<p><b>Les champs de mots de passes ne sont pas équivalents.</b></p>
<p>Votre e-mail sera votre identifiant:</p>

<form method="post" action="">
E-Mail :<input type="text" name="email" class="login"/><br />
Mot de passe :<input type="password" name="mdp"  class="login" /><br />
Mot de passe (confirmation) :<input type="password" name="verifmdp"  class="login"/><br />
<input type="submit" value="S'inscrire" class="buttonok" />
</form>
    <?php
    }
    else if ($doublonemail['id']!='') {?>
    <p><b>Cet email existe déjà.</b></p>
<p>Votre e-mail sera votre identifiant:</p>

<form method="post" action="">
E-Mail :<input type="text" name="email" class="login"/><br />
Mot de passe :<input type="password" name="mdp"  class="login" /><br />
Mot de passe (confirmation) :<input type="password" name="verifmdp"  class="login"/><br />
<input type="submit" value="S'inscrire" class="buttonok" />
</form>
    
    <?php
    }
    

 
}


else {
?>
			
<p><b>Vous devez remplir tous les champs.</b></p>
<p>Votre e-mail sera votre identifiant:</p>

<form method="post" action="">
E-Mail :<input type="text" name="email" class="login"/><br />
Mot de passe :<input type="password" name="mdp"  class="login" /><br />
Mot de passe :<input type="password" name="verifmdp"  class="login"/><br />
<input type="submit" value="S'inscrire" class="buttonok" />
</form>


			<?php }
?>
			
			
		</div>
		<?php } 
if (empty($_SESSION['email']))
{?>
<h1>Testez Vectae !</h1>

<?php } ?>
		</div>
	</div>

	
	
		
		<?php if (($_GET['page'])!='workzone') {
        	
		        	echo '<div id="cadre"><a href="index.php"><div id="logo"></div></a>';
        	 }
        	 else {
        	 	echo '<div id="frameWorkZone">';	
        	 }
        	?>

		<?php 
					switch($_GET['page']) { 
					
					case'subscribe':  
					include("pages/subscribe.php");  
					break;  
					
					case'login':  
					include("pages/login.php");  
					break;  
					
					case'account':  
					include("pages/account.php");  
					break;  
					
					case'confirm':  
					include("pages/confirm.php");  
					break;  
					
					case'files':  
					include("pages/files.php");  
					break;  
					
					case'logoff':  
					include("pages/logoff.php");  
					break;  
					
					case'workzone':
					include("workzone/workzone.php");
					break; 
					
					default:
					include("pages/home.php");
					break; 

								} 
				?>	
	<div id="disclaimer">© Vectae 2012 - Tous droits réservés</div>
	</div>
	
	</body>
</html>
<?php

mysql_close(); 
?>