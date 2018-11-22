<?php
require('config/config.php');
require('config/db.php');

//check for submit
if (isset($_POST['submit'])){
    //get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    
    $query = "INSERT INTO posts(title, author, body) VALUES ('$title', '$author', '$body')";
    
    if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL. '');
    }else {
        echo 'ERROR: '.mysqli_error($conn);
    }
    
}

?>


<?php include ('inc/header.php'); ?>
  <div class="container">
   <h1> Add Posts</h1>
   <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
       <div class="form-group">
           <label for="">Title</label>
           <input type="text" name="title" class="form-control">
       </div>
       <div class="form-group">
           <label for="">Author</label>
           <input type="text" name="author" class="form-control">
       </div>
       <div class="form-group">
           <label for="">Body</label>
           <textarea type="text" name="body" class="form-control"></textarea>
       </div>
       <input type="submit" name="submit" value="Submit" class="btn btn-primary">
   </form>
    </div>
<?php include ('inc/footer.php'); ?>