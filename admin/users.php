
<?php


include "includes/admin_header.php";
?>

    <div id="wrapper">

        
        
        <?php
        if($_SESSION['user_role']!=='admin')
        {
            header("location:index.php");
        }
        
        ?>
        
        
        
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

                        
                        
                        
                                      <table class="table table-bordered table-hover">
                    <thead>
                        <th>id</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                     
                        <th>role</th>
                       
                  
                    </thead> 
                         
                         
                         
                    <tbody>


    

<?php
$query="SELECT *FROM users";
$my_selectedusers=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($my_selectedusers))  {
$user_id=$row['user_id'];
$user_name=$row['username'];
$user_first=$row['first name'];
$user_last=$row['last name'];
$user_email=$row['email'];
$user_role=$row['user_role'];

    
    
    
echo      " <tr>";
echo      " <td>{$user_id}</td>";
echo     " <td>{$user_name}</td>";
echo     " <td>{$user_first}</td>";
echo     " <td>{$user_last}</td>";
echo     " <td>{$user_email}</td>";

echo     " <td>{$user_role}</td>";
echo     " </tr>";
    
    
    
    
?><?php }?>
                        
                        
              
    
    
    
    

                        
                        
                        
                 
                   </tbody>
                        
                        
                    </table>
                        
                        
                        
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
                         