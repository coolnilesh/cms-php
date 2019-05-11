<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
        
        
        <?php
        if(isset($_POST['submit']))
           {
                $user_name=$_POST['username'];
                $user_password=$_POST['password'];
                $user_email=$_POST['email'];

                $user_name=mysqli_real_escape_string($conn,$user_name);
                $user_password=mysqli_real_escape_string($conn,$user_password);
                $user_email=mysqli_real_escape_string($conn,$user_email);


                $randquery="SELECT rand_salt FROM users";
                $select_randquery=mysqli_query($conn,$randquery);
                $row=mysqli_fetch_array($select_randquery);
                $salt=$row['rand_salt'];
                $user_password=crypt($user_password,$salt);

                $user_query="SELECT username FROM users WHERE username='$user_name'";
                $result=mysqli_query($conn,$user_query);


                if(mysqli_num_rows($result)>0)
                        {
                        $message= "username already exist" ;
                        }

                if(mysqli_num_rows($result)==0) 
                {

                        if(!empty($user_name) && !empty($user_password) && !empty($user_email))
                            {
                                    $query="INSERT INTO `users` (`user_id`, `username`, `password`, `image`, `email`, `user_role`, `first name`, `last name`, `rand_salt`) VALUES (NULL, '$user_name', '{$user_password}', '', '{$user_email}', 'subscriber', '', '', '')";
                                    $adduser_query=mysqli_query($conn,$query);
                                    $message="your registration has been submitted";
                            }

                        else
                            {
                                    $message="fieldempty";
                            }

                } 
        }
        else
        {
               $message="";
        }
        
        
   
        
        
        
        
        ?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        
                        <h4><?php echo $message;
                            ?></h4>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
