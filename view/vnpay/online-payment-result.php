<?php
require_once("config.php");

// Lấy SecureHash từ VNPAY
$vnp_SecureHash = $_GET['vnp_SecureHash'] ?? '';

// Lấy toàn bộ dữ liệu vnp_
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

// Xóa hash để tạo lại
unset($inputData['vnp_SecureHash']);
unset($inputData['vnp_SecureHashType']);

// Sắp xếp
ksort($inputData);

// Tạo chuỗi hash
$hashdata = "";
foreach ($inputData as $key => $value) {
    $hashdata .= urlencode($key) . "=" . urlencode($value) . '&';
}
$hashdata = rtrim($hashdata, '&');

// Tạo lại chữ ký
$vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
?>

<div class="container mx-auto max-w-[1440px] my-8 mt-[140px] md:mt-[100px] md:p-8">
    <div>
        <?php
        // Kiểm tra chữ ký
        if ($vnpSecureHash == $vnp_SecureHash) {

            // Kiểm tra thanh toán thành công
            if (isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == '00') {

                // Tách order_id từ TxnRef
                $txnRef = $_GET['vnp_TxnRef'];
                $order_id = explode('_', $txnRef)[0];

                // Update trạng thái
                update_paymentStatus_when_payment_succeeded($order_id);

                // Lấy dữ liệu đơn hàng
                $order = getone_order($order_id);
                $order_details = getall_order_details_by_orderId($order_id);
        ?>

                <div class="sm:mx-auto mx-8 max-w-[900px] my-8 mt-16 p-6 md:p-8 rounded-lg border shadow-md relative">
                    <i class="bi bi-check-circle-fill absolute -top-7 left-[50%] -translate-x-[50%] text-violet-600 text-6xl"></i>

                    <div class="flex items-center flex-col">
                        <h4 class="text-center mt-5 font-bold text-2xl">
                            Thank you for order <?php echo '#TKQ00' . $order['order_id'] ?>
                        </h4>
                        <p class="text-neutral-600 text-sm mt-2 text-center">
                            We'll send you an email when your item ships
                        </p>
                    </div>

                    <div class="mt-8">
                        <?php echo order_item($order, $order_details, true, true) ?>
                    </div>
                </div>

        <?php
            } else {
                echo "<span style='color:red'>Thanh toán thất bại</span>";
            }

        } else {
            echo "<span style='color:red'>Chữ ký không hợp lệ</span>";
        }
        ?>
    </div>
</div>

<script>
function confirmCancle(url) {
    if (confirm("Are you sure to cancel this order?")) {
        window.location.href = url;
    }
}
</script>