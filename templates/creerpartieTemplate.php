<h2>Créer une partie</h2>
<?php
if(isset($inscErrorText))
echo '<span class="error">' . $inscErrorText . '</span>';
?>
<form action="index.php" method="post">
<p> La partie est elle publique? <p>
<SELECT name="Partiepublique" size="1">
<OPTION>oui
<OPTION>non
</SELECT>
</table>
</form>