

<menu> 


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
echo '<li><a href="index.php?action=showuserprofil&user='. Session::get('user').'&controller='. $args['controller']->getRequest()->getController(). '" >Profil</a></li>';
echo '<li><a href="index.php?action=creerpartie&user='. Session::get('user').'&controller='. $args['controller']->getRequest()->getController(). '" >Créer une partie</a></li>';
echo '<li><a href="index.php?action=partiesencours&user='. Session::get('user').'&controller='. $args['controller']->getRequest()->getController(). '" >Parties en cours</a></li>';
echo '<li><a href="index.php?action=partiesjoignables&user='. Session::get('user').'&controller='. $args['controller']->getRequest()->getController(). '" >Parties joignables</a></li>';


?>
			<li><a href="index.php" >Deconnexion</a></li>
        </ul>
    </div>
</div>

</menu>
