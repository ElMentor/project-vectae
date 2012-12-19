
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


			<?php }
?>
			
			
		</div>
		
		
