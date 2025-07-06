<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['cart_items'])) {
        $_SESSION['cart_items'] = [];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
        $product_id = $_POST["product_id"] ?? 0;
        $product_name = $_POST["product_name"] ?? "Unknown Product";
        $product_price = isset($_POST["product_price"]) ? (float)$_POST["product_price"] : 0;
        $quantity = isset($_POST["quantity"]) ? (int)$_POST["quantity"] : 1;
        $color = $_POST["color"] ?? "Default";
        $cart_key = $product_id . '-' . $color;
        $found = false;
        foreach ($_SESSION['cart_items'] as $key => $item) {
            if ($item['id'] == $product_id && $item['color'] == $color) {
                $_SESSION['cart_items'][$key]['quantity'] += $quantity;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $_SESSION['cart_items'][] = [
                'id' => $product_id,
                'name' => $product_name,
                'price' => $product_price,
                'quantity' => $quantity,
                'color' => $color
            ];
        }
        header("Location: cart.php");
        exit;
    }
    header("Location: index.php");
    exit;
?>