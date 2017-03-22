

<menu> 
<<<<<<< HEAD

<div class="navbar navbar-default" role="navigation">
    <!-- Partie de la barre toujours affichée -->
    <div class="navbar-header">
        <!-- Bouton d'accès affiché à droite si la zone d'affichage est trop petite -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
            <span class="sr-only">Activer la navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Menu</a>
    </div>
    <!-- Partie de la barre masquée si la surface d'affichage est insuffisante -->
    <div class="collapse navbar-collapse" id="navbar-collapse-target">
        <ul class="nav navbar-nav">
<?php
=======
<ul id="menu_horizontal">
<?php

>>>>>>> refs/remotes/origin/master
echo '<li><a href="index.php?action=creerpartie&user='. $args['user'].'&controller='. $args['controller']->getRequest()->getController(). '" >Créer une partie</a></li>';
?>
<li><a href="index.php?action=partiesencours">Parties en cours</a></li>
            <li><a href="index.php?action=partiesjoignables">Parties joignables</a></li>
			<li><a href="index.php">Déconnexion</a></li>
        </ul>
    </div>
</div>

</menu>
