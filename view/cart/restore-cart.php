<?php
session_start();
require_once "../../model/pdo.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Read JSON input
    $input = json_decode(file_get_contents("php://input"), true);
    
    if (isset($input['carts']) && is_array($input['carts'])) {
        // ✅ Restore cart from backup
        $_SESSION['carts'] = $input['carts'];
        
        // Log restore
        error_log("CART RESTORED FROM BACKUP: " . count($input['carts']) . " items");
        
        // Force save session
        session_write_close();
        
        echo json_encode(['success' => true, 'message' => 'Cart restored']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid cart data']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
