<h2>Partis Joignables !</h2>
<?php
if(isset($inscErrorText))
echo '<span class="error">' . $inscErrorText . '</span>';



echo "<table> \n";
ECHO " <tr>\n <th>Identifiant partie </th> \n";
echo " <th> Créateur </th> \n";
echo " <th> Joueurs </th></tr> \n";

foreach ($args['parties'] as $number => $partie) {
	echo "<tr> \n";
	echo "<td> ".$partie->IDENTIFIANT_PARTIE . " </td>\n";
	echo "<td> " . $partie->PSEUDO_CREATEUR . " </td>\n ";
	echo "<td> " .$partie->NB_JOUEURS ."/10 </td>\n ";
	echo"</tr>\n";
}

	echo " </table>\n";
?>
