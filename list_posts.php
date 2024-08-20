<?php
require_once("database.php");
require_once("post.php");

$db = new Database();
$post = new Post($db);
$posts = $post->listAll();
?>

<!-- اختبار القيم المرجعة في المصفوفة posts
<?php var_dump($posts) ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
<style>
body {
  background-image: url('unnamed.jpg');
}
.card {
  padding: 16px;
  text-align: center;
}
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" >My Plog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="list_posts.php">Articles</a>
      </div>
    </div>
  </div>
</nav>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Article Lists</title>
</head>
<body>
    <!-- <h1>جميع المقالات</h1> -->
     <br>
    <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4" >
        <?php
        if (!empty($posts)) {
            foreach ($posts as $post_data) {
                ?>
                
                 <div class="col">
                  <div class="card" style="max-width: 18rem;">
                  <img src="unnamed.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><a href="view_post.php?id=<?php echo $post_data['id']; ?>"><?php echo $post_data['title']; ?></a></h5>
                    <p class="card-text"><strong>Author :</strong> <?php echo $post_data['author']; ?></p>
                    <a href="edit_post.php?id=<?php echo $post_data['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="delete_post.php?id=<?php echo $post_data['id']; ?>" class="btn btn-primary">Delete</a>
                  </div>
                </div>
            </div>
            
                
                <?php
            }
        } else {
            echo "<p>There are currently no articles</p>";
        }
        ?>
        </div>
      </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>