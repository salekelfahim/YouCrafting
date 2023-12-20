<?php
include 'classes.php';
    $article = new Article();
    $article->delete($_GET['id']);
    header("Location: index.php");
