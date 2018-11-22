<?php
require('config/config.php');
require('config/db.php');

//create Query
$query = ' SELECT * FROM posts ORDER by created_at desc ';

//Get results
$result = mysqli_query($conn, $query);

//fetch data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($posts);
//Free Result
mysqli_free_result($result);
//xlose conn
mysqli_close($conn);

?>


<?php include ('inc/header.php'); ?>
  <div class="container">
   <h1>Posts</h1>
   <?php foreach($posts as $post): ?>
       
        <div class="well">
            <h3><?php echo $post['title']?></h3>
            <small>Created on <?php echo $post['created_at'];?> by <?php echo $post['author'];?></small>
            <p><?php echo $post['body'];?></p>
            <a class="btn btn-info" href="<?php echo ROOT_URL;?>post.php?id=<?php echo $post['id'];?>">Read More</a>
        </div>
    <?php endforeach;?>
    </div>
<?php include ('inc/footer.php'); ?>