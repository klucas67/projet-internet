

<menu> 
<ul id="menu_horizontal">
<?php

echo '<li><a href="index.php?action=creerpartie&user='. $args['user'].'&controller='. $args['controller']->getRequest()->getController(). '" >Créer une partie</a></li>';
?>
<li><a href="index.php?action=partiesencours">Parties en cours</a></li>
<li><a href="index.php?action=partiesjoignables">Parties joignables</a></li>
<li><a href="index.php">Déconnexion</a></li>
</ul>

</menu>

