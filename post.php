
<?php
include "includes/db.php";
?>

<?php
include "includes/header.php";
?>
    <!-- Navigation -->

<?php
include "includes/navigation.php";
?>
   

  

    <!-- Page Content -->


<?php
if(isset($_GET['post_id']))
{
    $post_id=$_GET['post_id'];
    
    $query="SELECT * FROM posts where post_id={$post_id}";
    $myselectedpost=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($myselectedpost);
    
    
    $post_title=$row['post_title'];
    $post_author=$row['post_author'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];

    
}



?>
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date" ?></p>

                <hr>

                <!-- Preview Image -->
                   <img class="img-responsive" src=images/<?php echo $post_image;?> alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post_content; ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    
        <?php
                           
            if(isset($_POST['comment']))
            {
               $post_id=$_GET['post_id'];
                $post_comment=$_POST['comments'];
               $query="UPDATE posts SET post_comment='{$post_comment}' WHERE post_id={$post_id}";
                $myselected=mysqli_query($conn,$query);
               
            }
       ?>                
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <textarea  name="comments" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="comment" name="comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>
  
                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                         <?php
                        $query="SELECT post_comment FROM posts WHERE post_id={$post_id}";
                        $commentquery=mysqli_query($conn,$query);
                        $row=mysqli_fetch_array($commentquery);
                        $comments=$row['post_comment'];
                        
                       ?>
                         
                      <?php  echo "<h4>$comments </h4>";
                          ?>
                        
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                              
                      
                  
                        
                        
                        
                        
                      
                        
                        
                        
                        
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
          <?php
        include "includes/sidebar.php";
        ?>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
