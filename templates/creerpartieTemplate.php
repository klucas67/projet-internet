<h2>Créer une partie</h2>
<?php
if(isset($inscErrorText))
echo '<span class="error">' . $inscErrorText . '</span>';
?>
<?php
echo '<form action="index.php?user='.SESSION::get('user').'&controller=user" method="post">'
?>
<p> La partie est elle publique? <p>
<SELECT name="Partiepublique" size="1">
<OPTION>oui
<OPTION>non
</SELECT>
<td><input type="submit" value="Creer Partie" /></td>
</form>