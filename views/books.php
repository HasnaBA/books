<!-- starting  each page -->
<?php $title="liste des livres"; ?> 
<?php ob_start(); ?>
<!-- end of starting -->

<h1> Liste des livres </h1>
<p> Bienvenue sur la page des livres</p>

<div class="container">   
    <div class='row'> 
        <div class="col-md-6">
            <ul>
            
                <?php foreach ($books as $book) { ?>
                
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $books['imageLink']?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="<?php echo $book['id']; ?>"></h5>
                                <p class="card-text"><?php echo $book['title']; ?></p>
                                <a href="#" class="btn btn-primary">Ajouter au panier</a>
                            </div>
                    </div>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>






<pre>
    <?php var_dump($books); ?>
</pre>
<!-- ending each page -->
<?php $content=ob_get_clean();?>
<?php require ('public/index.php');?>
<!--end of ending-->