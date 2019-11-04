<!-- starting  each page -->
<?php $title="liste des livres"; ?> 
<?php ob_start(); ?>
<!-- end of starting -->

<?php
    $firstBook = $books[0];
    $firstBook = $books[1];
    $firstBook = $books[2];
    $firstBook = $books[3];
    $books=
?>
   
<div class="container">

        <div class="card" style="width: 18rem;">
        <span class="newboobs"><h1> Nouveautés Livres</h1></span>
            <img class="card-img-top" src="<?php echo $firstBook['imageLink']?>" alt="books picture">
            <div class="card-body">
                <h2 class="card-title"><?php $firstBook ['title']?></h2>
                <p class="card-text"><?php echo $firstBook['author']?></p>
                <a href="#" class="btn btn-primary">Ajouter au panier</a>                                            

            </div>
            
        
   
        </div>
   

</div>

<!-- ending each page -->
<?php $content=ob_get_clean();?>
<?php require ('public/index.php');?>
<!--end of ending-->