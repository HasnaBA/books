<!-- starting  each page -->
<?php $title="liste des livres"; ?> 
<?php ob_start(); ?>
<!-- end of starting -->

<style>
.autheur{
    font-family:'Jomolhari', serif!important;
    font-size: 20px;
    font-weight: bolder;
    text-align: center;
    
}
.book_title{
    font-family:'Jomolhari', serif!important;
    font-size: 30px;
    text-align: center;
    
}
.titre{
    font-family:'Jomolhari', serif!important;
    font-size: 20px;
    font-weight: bolder;
    text-align: center;
}

#size{
    display: flex;
    height: 300px;
}

#size img {
    height: 100%;
    width: 100%;
}
</style>

<h1> Liste des livres </h1>

<div class="container">     
    <div class="row">
        <?php foreach ($books as $book) { ?>
            <div class="col-md-3 mt-4">
                <div class="card h-100">
                    <div id="size">
                        <img src="<?php echo $book['imageLink']?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5><?php echo $book['title']; ?></h5>
                        <p class="card-text"><span class= "autheur" >Autheur: </span> <?php echo $book['author']; ?> </p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        
    </div>
        </div>






<pre>
    <?php var_dump($books); ?>
</pre>
<!-- ending each page -->
<?php $content=ob_get_clean();?>
<?php require ('public/index.php');?>
<!--end of ending-->