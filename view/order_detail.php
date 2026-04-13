<?php
if (!isset($_SESSION['user'])) {
    echo "<p class='text-center mt-10'>Vui lòng đăng nhập để xem chi tiết đơn hàng</p>";
    return;
}

if (!isset($_GET['order_id'])) {
    echo "<p class='text-center mt-10'>Đơn hàng không tồn tại</p>";
    return;
}

$order_id = $_GET['order_id'];
$order = getone_order($order_id);

if ($order['user_id'] != $_SESSION['user']['user_id']) {
    echo "<p class='text-center mt-10'>Bạn không có quyền xem đơn hàng này</p>";
    return;
}

$order_details = getall_order_details_by_orderId($order_id);
?>

<div class="container mx-auto max-w-[1200px] my-10 p-4">

    <h2 class="text-2xl font-bold mb-6">📦 Chi tiết đơn hàng #TDVM00<?php echo $order['order_id'] ?></h2>

    <div class="bg-white shadow-lg rounded-xl p-6">

        <!-- Thông tin khách hàng -->
        <h3 class="font-semibold text-lg mb-3">Thông tin khách hàng</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
            <div><span class="font-medium">Họ tên:</span> <?php echo $order['order_username'] ?></div>
            <div><span class="font-medium">Email:</span> <?php echo $order['order_user_email'] ?></div>
            <div><span class="font-medium">SĐT:</span> <?php echo $order['order_tel'] ?></div>
            <div><span class="font-medium">Địa chỉ:</span> <?php echo $order['shipping_address'] ?></div>
            <div><span class="font-medium">Ngày đặt:</span> <?php echo $order['created_at'] ?></div>
        </div>

        <!-- Thông tin sản phẩm -->
        <h3 class="font-semibold text-lg mb-3">Sản phẩm</h3>
        <div class="space-y-2 border-t border-b py-2">
            <?php foreach ($order_details as $item) { ?>
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center space-x-3">
                        <img src="upload/<?php echo $item['image'] ?>"
                            class="w-16 h-16 rounded-md object-cover"
                            alt="<?php echo $item['product_name'] ?>">
                        <div>
                            <p class="font-medium"><?php echo $item['product_name'] ?></p>
                            <p class="text-gray-500 text-sm">Số lượng: <?php echo $item['quantity'] ?></p>
                        </div>
                    </div>
                    <span class="font-medium">$<?php echo $item['price_per_unit'] ?></span>
                </div>
            <?php } ?>
        </div>

        <!-- Tổng tiền -->
        <div class="flex justify-between mt-4 font-semibold text-gray-700">
            <span>Tổng tiền:</span>
            <span>$<?php echo $order['total_amount'] ?></span>
        </div>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <span class="font-medium">Phương thức thanh toán:</span>
                <div class="mt-1 badge text-white px-2 py-1 <?php echo $order['payment_methods'] === 'payment on delivery' ? 'bg-blue-500' : 'bg-green-500' ?>">
                    <?php echo $order['payment_methods'] ?>
                </div>
            </div>
            <div>
                <span class="font-medium">Trạng thái thanh toán:</span>
                <div class="mt-1 badge text-white px-2 py-1
                    <?php echo $order['payment_status'] === 'Processing' ? 'bg-orange-500' : '' ?>
                    <?php echo $order['payment_status'] === 'Succeeded' ? 'bg-green-500' : '' ?>
                    <?php echo $order['payment_status'] === 'Return' ? 'bg-red-500' : '' ?>">
                    <?php echo $order['payment_status'] ?>
                </div>
            </div>
            <div>
                <span class="font-medium">Trạng thái đơn hàng:</span>
                <?php
                $normalizedOrderStatus = trim($order['order_status']);
                $lowerOrderStatus = strtolower($normalizedOrderStatus);
                $orderStatusClass = 'bg-gray-500';
                if ($lowerOrderStatus === 'processing') {
                    $orderStatusClass = 'bg-orange-500';
                } elseif ($lowerOrderStatus === 'in transit') {
                    $orderStatusClass = 'bg-blue-500';
                } elseif ($lowerOrderStatus === 'delivered') {
                    $orderStatusClass = 'bg-green-500';
                } elseif ($lowerOrderStatus === 'cancelled' || $lowerOrderStatus === 'returned' || $lowerOrderStatus === 'return') {
                    $orderStatusClass = 'bg-red-500';
                }
                $orderStatusLabel = $normalizedOrderStatus !== '' ? $normalizedOrderStatus : 'Unknown';
                ?>
                <div class="mt-1 badge text-white px-2 py-1 <?php echo $orderStatusClass ?>">
                    <?php echo $orderStatusLabel ?>
                </div>
            </div>
        </div>

        <!-- Nút hành động -->
        <div class="mt-6 flex gap-3">
            <a href="index.php?act=orders"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition">
                ← Quay lại danh sách đơn hàng
            </a>

            <?php if ($order['order_status'] === 'Processing') { ?>
                <a href="index.php?act=cancel_order&order_id=<?php echo $order['order_id'] ?>"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition"
                    onclick="return confirm('Bạn có chắc muốn hủy đơn này?');">
                    Hủy đơn
                </a>
            <?php } ?>
        </div>

    </div>
</div>