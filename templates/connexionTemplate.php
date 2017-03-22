<h2>Connexion</h2>
<?php
if(isset($inscErrorText))
echo '<span class="error">' . $inscErrorText . '</span>';
?>
<form action="index.php" method="post">
<table>
<tr>
<th>Login :</th>
<td><input type="text" name="connexLogin"/></td>
</tr>
<tr>
<th>Mot de passe* :</th>
<td><input type="password" name="connexPassword"/></td>
</tr>
<tr>
<th />
<td><input type="submit" value="Se connecter" /></td>
</tr>
</table>
</form