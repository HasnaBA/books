<?php $title="liste des livres"; ?> 
<?php ob_start(); ?>






<div class="container-fluid">
    <div class="container"> 
    <h1> Livre</h1>    
        <div class="row">
            <?php  echo $book['title']; ?>  
                <div class="col-md-3 mt-4">
                    <div id="size">
                        <img src="<?php echo $book['image']?>" class="card-img-top" alt="...">
                    </div>
                        <div class="card-body">
                            <h5>
                            <?php  echo $book['title']; ?>
                            <?php  echo $book['author']; ?>

                            </h5>
                            <p class="card-text"> <?php echo $book['author']; ?> <span class= "autheur" >(autheur) </span></p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-primary">Ajouter au panier</a>
                        </div>
                    </div>
                </div>
    
            
        </div>
    </div>

</div>












































<?php $content=ob_get_clean();?>
<?php require ('public/index.php');?>