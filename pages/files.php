
<?php 
if (!empty($_SESSION['email']))
{
	?>
<div id="aboutbox">
		<h1>Vos fichiers</h1>
		<table><tr>
		<th>Nom fichier</th>
		<th>&nbsp;&nbsp;&nbsp;</th>
		<th>Date de création</th>
		<th>&nbsp;&nbsp;&nbsp;</th>
		<th>Dernière modification</th>
		<th>&nbsp;&nbsp;&nbsp;</th>
		<th>Modifier</th>
		<th>&nbsp;&nbsp;&nbsp;</th>
		<th>Exporter</th>
		
		</tr>
<?php
	$email=$_SESSION['email'];
	
	$requeteFile = mysql_query("SELECT noFile, nameFile, creationDate, lastEditDate FROM vectae_files VF JOIN vectae_users VU ON VF.idUser=VU.id WHERE VU.email='".$email."'");
    while ($files = mysql_fetch_array($requeteFile))
    {
    	
    	
    	
?>
	
		
		
		<tr>
		<td><?php echo stripslashes($files['nameFile']); ?></td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo date('d/m/Y à H:i:s', $files['creationDate']); ?></td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo date('d/m/Y à H:i:s', $files['lastEditDate']); ?></td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo '<a href="index.php?page=file&id=' . $files['noFile'] . '">'; ?>Modifier</a></td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo '<a href="index.php?page=export&id=' . $files['noFile'] . '">'; ?>Exporter en PDF</a></td>
		
		
		
		</tr>
	<?php }
	?>	
		</table>
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