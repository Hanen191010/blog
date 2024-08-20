<?php
require_once("database.php");
require_once("post.php");

$db = new Database();
$post = new Post($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($post->read($id)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['title']) || empty($_POST['content'])) {
                echo "Please enter a title and content for the article.";
              }
            else{
            $title = $_POST['title'];
            $content = $_POST['content'];
            $author = $_POST['author'];
        
            if ($post->update($id, $title, $content, $author)) {
                echo "The article has been updated successfully!";
                header('Location: list_posts.php');
            } else {
                echo "An error occurred while updating the article";
            }}
        } else {
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
            <title>Edit Article</title>
            </head>
            <body>
                <!-- <h1>تعديل مقالة</h1> -->
            <div class="container"><br>
                <form method="POST">
                 <div class="mb-3">
                    <label class="form-label" for="title">Article Title</label>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input class="form-control" type="text" name="title" id="title" value="<?php echo $post->title; ?>" required>
                 </div>
                 
                 <div class="mb-3">
                    <label class="form-label" for="content">Article Content</label>
                    <textarea class="form-control" name="content" id="content" rows="5" cols="20" required><?php echo $post->content; ?></textarea>
                 </div>
                 <div class="col-sm-3">
                    <label class="form-label" for="author">Author Name</label>
                    <input class="form-control" type="text" name="author" id="author" value="<?php echo $post->author; ?>"><br>
                </div>
                    <button class="btn btn-primary mb-3" type="submit">Save Changes</button>
                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            </body>
            </html>
            <?php
        }
    } else {
        echo "Article not found.";
    }
} else {
    echo "Article ID not specified.";
}
?>