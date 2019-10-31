<!-- starting  each page -->
<?php $title="liste des livres"; ?> 
<?php ob_start(); ?>
<!-- end of starting -->

<h1> Liste des livres </h1>
<p> Bienvenue sur la page des livres</p>

<ul>
    <?php
    foreach ($books as $book) {
       
        echo'<li>' . $book['title'] . '</li>';
        
    }
    ?>
</u>







<pre>
    <?php var_dump($books); ?>
</pre>
<!-- ending each page -->
<?php $content=ob_get_clean();?>
<?php require ('public/index.php');?>
<!--end of ending-->