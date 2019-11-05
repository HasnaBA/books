<!-- starting  each page -->
<?php $title="liste des livres"; ?> 
<?php ob_start(); ?>
<!-- end of starting -->
<
<style>

*{
    font-family:'Jomolhari', serif; 

}
.container{
    background-color:#B0BEC5;
  
}

.container-fluid{
    background-color:#607D8B;
}




.autheur{
    font-family:'Jomolhari', serif!important;
    font-size: 20px;
    text-align: center;
    
}
.book_title{
    font-family: 'Shadows Into Light', cursive;
    font-size: 50px ;
    text-align: center;
    
}
.titre{
    font-family:'Jomolhari', serif;
    font-size: 30px;
    font-weight: bolder;
    text-align: center;
}

#size{
    display: flex;
    height: 300px;
    border: 10px solid transparent;
    padding: 15px;
    
    
}
.card {
    border-radius:15px;
}
#size img {
    height: 100%;
    width: 100%;
    border-width:1px;
    border-style: solid;
    border-color:black;
    padding:10px;
}
h1{
    text-align: center;
    padding: 40px;
    font-family: 'Jomolhari', serif;
    font-size: 60px;
    border-bottom-style: solid;
}
</style>


<div class="container-fluid">
    <div class="container"> 
        <h1> Liste des livres </h1>    
            <div class="row">
                <?php foreach ($books as $book) { ?>
                    <div class="col-md-3 mt-4">
                        <div class="card h-100">
                            <div id="size">
                                <img src="<?php echo $book['image']?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5>
                                    <a href="?action=book&id=<?php echo $book['id']; ?>">
                                        <?php echo $book['title']; ?>
                                    </a>
                                </h5>
                                <p class="card-text"> <?php echo $book['author']; ?> <span class= "autheur" >(autheur) </span></p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#" class="btn btn-primary">Ajouter au panier</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                
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