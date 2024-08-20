<?php
require_once("database.php");
require_once("post.php");

$db = new Database();
$post = new Post($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($post->read($id)) {
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
            <title><?php echo $post->title; ?></title>
        </head>
        <body>
        <div class="container"><br>
            <h1><?php echo $post->title; ?></h1>
            <p style="background-color: #e3f2fd;"><?php echo $post->content;?></p>
            <p><strong>Author :</strong> <?php echo $post->author; ?></p>
            <p><strong>the Date of publish :</strong> <?php echo $post->created_at; ?></p>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
    } else {
        echo "Article not found.";
    }
} else {
    echo "Article ID not specified.";
}
?>