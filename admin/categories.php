<?php

include "includes/admin_header.php";
?>

    <div id="wrapper">

        
        
        
        
        
        <!-- Navigation -->
        
        
  <?php
include "includes/admin_navigation.php";
?>
        
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welocme to Admin 
                            <small>Author</small>
                        </h1>
                       <div class="col-xs-6">
                           
                <?php           
                           
                if(isset($_POST['submit'])) {
                    
                $cat_title=$_POST['cat_title'];
                if($cat_title== "" ||empty($cat_title)){
                    
                    
                    echo "This field should not be empty";
                    
                } 
                else
                {
                    $query="INSERT INTO categories(cat_title) VALUE('{$cat_title}') ";
                   
                    $create_query=mysqli_query($conn,$query);
                    if(!$create_query){
                        die("query failed" .mysqli_error($conn));
                    }
                }
                }  
                ?>             
                           
                        <form action="" method="post">
                        <div class="form-group">
                        <label for="cat_title">Add Categories</label>
                        <input type="text" class="form-control" name="cat_title">
                        </div>
                        <div class="from-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Add category"> 
                            
                            </div>
                      </form>
                           
  
                           
   
    <?php
                           
            if(isset($_GET['edit']))
            {
                $cat_id=$_GET['edit'];
                include "includes/edit_category.php";
                header('location :category.php');
            }
       ?>
                           
                           
                           
                      
                           
                           
                            
                           </div> 
                            <div class="col-xs-6">
                                
<?php

$query="SELECT *FROM categories";
$my_selectedcategory=mysqli_query($conn,$query);




?>
                        
                                
                                
                                
                             <table class="table table-bordered table-hover">
                            <thead>
                                 <tr>
                                  <th>Id</th>
                                     <th>Category title</th>
                                  </tr>
                                 </thead>
                                 <tbody>
                                     
                             
                                     
                <?php

while($row=mysqli_fetch_assoc($my_selectedcategory))  {
$cat_id=$row['cat_id'];
$cat_title=$row['cat_title'];
echo   "<tr>";
echo "<td>{$cat_id}</td>";
echo "<td>{$cat_title}</td>";
echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    
    

echo   "<tr>";

}      
?>            
                                                     
                                     
                                 </tbody>
                                 
  <?php                               
if(isset($_GET['delete'])){
                                  
                 $del_catid=$_GET['delete'];
                $query="DELETE FROM categories WHERE cat_id={$del_catid}";
                $delete_query=mysqli_query($conn,$query);
         header("location:categories.php");
                                  
                                 
                         }                                 
                                 
                                 
    ?>                            
                                </table>
                        
                            
                        
                        
                            </div>
                            
                       
                        
                        
                        
                        
                        
                        
                        

                        
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

           
        <?php
include "includes/admin_footer.php";
?>
      