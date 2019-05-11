
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
    <div class="container">

        <div class="row">
            
            
            

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                
          
          
             
                
                
                
                
                
                
                
                
                
                
                
                
                
                <?php
                
                
                if(isset($_GET['page']))
                          

                {
                   
                    $page=$_GET['page'];
                    
                 }
                else
                {
                    $page="";
                }
                if($page>1)
                    
                {
                          $page_1 =($page*2)-2;
                }
                else
                {
                    
              
                        $page_1=0;
                }
                    
            
                
                
                 $findcount="SELECT *FROM posts ";
                 $my_totalpost=mysqli_query($conn,$findcount);
                $count=mysqli_num_rows($my_totalpost);
                $count=ceil($count/2);
               
                echo" <h3> page count =$count</h3></br>";
                
                echo "<h4>post starts from=$page_1</h4>";
                
             
                
                 
                
                
                $query="SELECT *FROM posts LIMIT $page_1,2";
                
                
                  $my_selectedposts=mysqli_query($conn,$query);
                        
                while($row=mysqli_fetch_assoc($my_selectedposts))  {
                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];
                    
               
                ?>
                
                
               <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                    <?php
                           
            if(isset($_GET['post_id']))
            {
                $post_id=$_GET['post_id'];
                include "post.php";
                header("location :post.php");
            }
       ?>
                           
                    
                    
                    
                    
                    
                    
                    
                    
                <h2>    
               <?php echo "<a href='post.php?post_id={$post_id}'> $post_title </a>";?>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo "$post_author" ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date" ?></p>
                <hr>
                <img class="img-responsive" src=images/<?php echo $post_image;?> alt="">
                <hr>
                <p><?php echo "$post_content" ?>.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                
                
                   
 
                
                
            <?php    }   ?>   
                
                
                
                
                
                
                
               
                </div> 
                
                
                
                
               

        

            <!-- Blog Sidebar Widgets Column -->
        <?php
        include "includes/sidebar.php";
        ?>

        </div>
        <!-- /.row -->

        <hr>
     <ul class="pager">
         
       <?php
         
         
         
         
         for($i=1;$i<=$count;$i++)
         
         
         
         {
             
             if($i==$page)
             {
                 echo "<li><a class='active_page' href='index.php?page={$i}'>{$i}</a></li>";
             }
             
             
             else {
                      echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                  }
             
             
                                 
                                }
         
     
        
        ?>
        
        
        
        
        
        </ul>
        
        
        
        
        <!-- Footer -->
        
        
        
       <?php
        include "includes/footer.php";
        ?>