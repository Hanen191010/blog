<?php
require_once("database.php");
require_once("post.php");

$db = new Database();
$post = new Post($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($post->delete($id)) {
        header('Location: list_posts.php');
        echo "The article has been successfully deleted!";
    } else {
        echo "An error occurred while deleting the article.";
    }
} else {
    echo "Article ID not specified.";
}
?>