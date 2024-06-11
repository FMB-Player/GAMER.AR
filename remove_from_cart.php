<?php
session_start();

// Comprueba si el ID del artículo está establecido
if (isset($_GET['id'])) {
    $article_id = $_GET['id'];

    // Busca el artículo en el carrito
    $key = array_search($article_id, $_SESSION['cart']);

    // Si el artículo está en el carrito, lo elimina
    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

// Redirige al usuario de vuelta al carrito
header('Location: add_to_cart.php');
?>