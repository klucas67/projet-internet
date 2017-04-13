<h2>Votre Profil</h2>
<?php
if(isset($inscErrorText))
echo '<span class="error">' . $inscErrorText . '</span>';

echo "<p> Vous êtes " . $args['user']->PSEUDO .  "</p>";
echo "<p> Votre adresse mail associée est : " . $args['user']->ADRESSE_MAIL .  "</p>";
echo "<p> Vous avez joué  : " . $args['user']->NB_PARTIES_JOUEES .  " parties pour ".$args['user']->NB_PARTIES_GAGNEES." victoires </p>";
echo "<p> Par consèquent votre score est : " .$args['user']->SCORE_CUMULE . " </p>";

?>