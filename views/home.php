<!-- starting  each page -->
<?php $title="liste des livres"; ?> 
<?php ob_start(); ?>
<!-- end of starting -->

<h1>  MyBooks </h1>
<p> Accueil</p>


<div class="container">
    <span class="newboobs"><h2> Nouveautés Livres</h2></span>


</div>

<!-- ending each page -->
<?php $content=ob_get_clean();?>
<?php require ('public/index.php');?>
<!--end of ending-->