<?php
include 'db_connect.php';
session_start();

if (isset($_GET['id'])) {
    $article_id = $_GET['id'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (!in_array($article_id, $_SESSION['cart'])) {
        array_push($_SESSION['cart'], $article_id);
    }
}

header('Location: add_to_cart.php');
