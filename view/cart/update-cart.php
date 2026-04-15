<?php
session_start();
require_once "../../model/pdo.php";
include "../../model/comments.php";
include "../../model/users.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int) $_POST["id"];
    $quantity = (int) $_POST['quantity'];
    $carts = $_SESSION['carts'];
    $totalPrice = 0;

    // Log để debug
    error_log("UPDATE CART: id=$id, quantity=$quantity, current_qty=" . $carts[$id]['quantity']);

    // 更新購物車中的數量
    if (isset($carts[$id])) {
        $_SESSION['carts'][$id]['quantity'] = $quantity;
    }

    // 重新計算總價
    foreach ($_SESSION['carts'] as $cart) {
        $totalPrice += (int) ($cart['price']) * (int) ($cart['quantity']);
    }

    // 強制保存 Session 到文件
    session_write_close();
    
    // Log verify
    error_log("AFTER SAVE: new_qty=" . $_SESSION['carts'][$id]['quantity']);

    echo json_encode(['success' => true, 'totalPrice' => $totalPrice, 'carts' => $_SESSION['carts']]);
}
?>