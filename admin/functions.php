<?php

function insertcategory(){
    
  global $conn;
   if(isset($_GET['edit']))
            {
                
                include "includes/edit_category.php";
            }
       ?>
                           
                           
                           
                      
                           
                           
                            
                           </div> 
                            <div class="col-xs-6">
                                
<?php

$query="SELECT *FROM categories";
$my_selectedcategory=mysqli_query($conn,$query);



}







?>