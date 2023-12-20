<?php
include 'classes.php';
if (isset($_POST['update'])) {
    $article = new Article();
    $article->update($_POST['id'],$_POST['title'],$_POST['text']);
    header("Location: index.php");
}