<?php
include 'classes.php';
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
    $user = new Article($title,$text);
    $user->setTitle($title);
    $user->setText($text);
    $user->add();
    header('Location: index.php');
}
?>