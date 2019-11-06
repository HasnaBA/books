<?php $title="liste des livres"; ?> 
<?php ob_start(); ?>

<style>
.container{
    background-color: grey;
}
.title{
    font-family: 'Jomolhari', serif;
    font-size: 25px ;
 
}






</style>







<div class="container-fluid">
    <div  class="container"> 
        <div class="row">
             
                <div class="col-md-3 mt-4">
                <span class="title"><?php  echo $book['title']; ?></span> 
                    <div >
                        <img src="<?php echo $book['image']?>" class="card-img-top" alt="...">
                        
                </div>
    
            
        </div>
    </div>

</div>












































<?php $content=ob_get_clean();?>
<?php require ('public/index.php');?>