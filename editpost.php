<?php
require('config/config.php');
require('config/db.php');

//check for submit
if (isset($_POST['submit'])){
    //get form data
    $update_id= mysqli_real_escape_string($conn, $_POST['update_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    
    $query = "UPDATE posts SET
    title='$title',
    author='$author',
    body= '$body'
      WHERE id = {$update_id}";
    
    
    if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'');
    }else {
        echo 'ERROR: '.mysqli_error($conn);
    }
}
//get id
$id = mysqli_real_escape_string($conn, $_GET['id']);

//create Query
$query = ' SELECT * FROM posts WHERE id =' . $id;

//Get results
$result = mysqli_query($conn, $query);

//fetch data
$post = mysqli_fetch_assoc($result);
//var_dump($posts);
//Free Result
mysqli_free_result($result);
//xlose conn
mysqli_close($conn);


?>


<?php include ('inc/header.php'); ?>
  <div class="container">
   <h1> Add Posts</h1>
   <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
       <div class="form-group">
           <label for="">Title</label>
           <input type="text" name="title" class="form-control" value="<?php echo $post['title']?>">
       </div>
       <div class="form-group">
           <label for="">Author</label>
           <input type="text" name="author" class="form-control" value="<?php echo $post['author']?>">
       </div>
       <div class="form-group">
           <label for="">Body</label>
           <textarea type="text" name="body" value="<?php echo $post['body']?>" class="form-control"></textarea>
       </div>
       <input type="hidden" name="update_id" value="<?php echo $post['id']?>">
       <input type="submit" name="submit" value="Submit" class="btn btn-primary">
   </form>
    </div>
<?php include ('inc/footer.php'); ?>