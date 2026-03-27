<?php require_once("config.php"); ?>

<?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $order = getone_order($order_id);
} else {
    header('Location: index.php');
    exit;
}
?>

<?php
if (isset($_POST['redirect'])) {

    // ✅ Tạo mã giao dịch unique
    $vnp_TxnRef = $_POST['order_id'] . "_" . time();

    // ✅ Fix cứng để tránh lỗi
    $vnp_OrderInfo = "Thanh toan don hang";
    $vnp_OrderType = "billpayment";
    $vnp_Amount = (int)$_POST['amount'] * 100;
    $vnp_Locale = "vn";
    $vnp_IpAddr = "127.0.0.1";

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_ExpireDate" => $expire,
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );

    // ✅ Build chuẩn VNPAY
    ksort($inputData);
    $query = "";
    $hashdata = "";

    foreach ($inputData as $key => $value) {
        $hashdata .= urlencode($key) . "=" . urlencode($value) . '&';
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $hashdata = rtrim($hashdata, '&');
    $query = rtrim($query, '&');

    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

    $vnp_Url = $vnp_Url . "?" . $query . '&vnp_SecureHash=' . $vnpSecureHash;

    // 👉 Redirect sang VNPAY
    header('Location: ' . $vnp_Url);
    exit;
}
?>

<!-- FORM -->
<div class="container mx-auto max-w-[600px] my-8 p-4 md:p-8 border shadow-md rounded-lg">
    <div class="flex flex-col items-center ">
        <h3 class="text-xl font-semibold uppercase">Start your payment</h3>
    </div>

    <form action="" method="post" class="grid gap-4 mt-6">

        <div>
            <label>Order ID</label>
            <input type="text" name="order_id" value="<?php echo $order['order_id'] ?>" readonly class="w-full border p-2">
        </div>

        <div>
            <label>Số tiền</label>
            <input type="number" name="amount" value="<?php echo $order['total_amount'] * 23000 ?>" hidden>
            <p><b><?php echo number_format($order['total_amount'] * 23000) ?> VND</b></p>
        </div>

        <button type="submit" name="redirect" class="bg-black text-white p-2 rounded">
            Thanh toán VNPAY
        </button>

    </form>
</div>