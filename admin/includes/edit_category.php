     
                          <form action="" method="post">
                        <div class="form-group">
                        <label for="cat_title">Edit Category</label>
                        
                        </div>
                              
                          <?php
                           
       if(isset($_GET['edit']))
       {
        
        $cat_id=$_GET['edit'];o
           
      
       $query="SELECT *FROM categories WHERE  cat_id=$cat_id";
       $my_editedcategory=mysqli_query($conn,$query);
              
 $row=mysqli_fetch_assoc($my_editedcategory) ;
$cat_id=$row['cat_id'];
$cat_title=$row['cat_title'];                       
       ?>    
    <input value="<?php echo $cat_title ;?>" type="text" class="form-control" name="update_title">
                           
   <?php    }   ?>
                           
                           
    
                           
                           
                           

<?php

if(isset($_POST['update'])){

$update_cat_title=$_POST['update_title'];
$query="UPDATE categories SET cat_title='{$update_cat_title}' WHERE cat_id={$cat_id}";
$update_query=mysqli_query($conn,$query);
if(!$update_query)
{
die("query failed" .mysqli_error($conn));
}



}                                 





?>
                                 
                              
                              
                              
                              
                              
                        <div class="from-group">
                        <input class="btn btn-primary" type="submit" name="update" value="update category"> 
                            
                            </div>
                      </form>   
                           
                           