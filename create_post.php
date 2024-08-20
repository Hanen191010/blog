<?php
require_once("database.php");
require_once("post.php");

$db = new Database();
$post = new Post($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (empty($_POST['title']) || empty($_POST['content'])) {
    echo "Please enter a title and content for the article.";
  }
  else{ 
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    
      if ($post->create($title, $content, $author)) {
          echo "Article created successfully!";
          header('Location: list_posts.php');
      } else {
          echo "An error occurred while creating the article.";
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
body {
  background-image: url('unnamed.jpg');
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
    <title>Create Article</title>
</head>
<body>

 <div class="container"><br>
 <!-- <center><h3>Create New Article</h3></center> -->
    <form method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Article Title</label>
        <input type="text" class="form-control" name="title" id="title" required>
    </div>

    <div class="mb-3">
        <label for="content">Article Content</label>
         <textarea name="content" id="content" class="form-control" rows="5" cols="20" required></textarea>
    </div>

    <div class="col-sm-3">
        <label for="author">Author Name</label>
         <input type="text" class="form-control" name="author" id="author"><br>
    </div>
        <button type="submit" class="btn btn-primary mb-3" >Create Article</button>
    </form>
 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>