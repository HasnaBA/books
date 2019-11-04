<!-- starting  each page -->
<?php $title="liste des livres"; ?> 
<?php ob_start(); ?>
<!-- end of starting -->

<h1> Liste des livres </h1>
<p> Bienvenue sur la page des livres</p>

<ul>
    <?php foreach ($books as $book) { ?>
       <li>
           <a href="?action=book&id=<?php echo $book['id']; ?>">
                <?php echo $book['title']; ?>
            </a>
        </li>
    <?php } ?>
</u>







<pre>
    <?php var_dump($books); ?>
</pre>
<!-- ending each page -->
<?php $content=ob_get_clean();?>
<?php require ('public/index.php');?>
<!--end of ending-->