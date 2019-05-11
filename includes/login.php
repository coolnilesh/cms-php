<?php
include "db.php";
?>
<?php
session_start();

?>



<?php
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $user_password=$_POST['password'];
   
     $query="SELECT * FROM users where username='{$username}'";
     $select_user_query=mysqli_query($conn,$query);
    
   $row=mysqli_fetch_array( $select_user_query);
        $db_user_id=$row['user_id'];
          $db_username=$row['username'];
          $db_password=$row['password'];
          $db_name=$row['first name'];
          $db_email=$row['email'];
          $db_user_role=$row['user_role'];
    
      
       $user_password=crypt($user_password,$db_password) ;
        
         if($db_username==$username && $db_password===$user_password)
         {
          
             

            $_SESSION['user_id']= $db_user_id;
            $_SESSION['username']= $db_username;
            $_SESSION['name']= $db_name;
            $_SESSION['email']= $db_email;
            $_SESSION['user_role']= $db_user_role;
             
             if($_SESSION['user_role']!==null)
        {
            header("location:../admin/index.php");
      
        
        }
         }
    else
{
   header("location:../registration.php"); 
}
    
}

               
      
?>
