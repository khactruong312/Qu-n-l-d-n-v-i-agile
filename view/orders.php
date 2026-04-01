<?php

// Kiểm tra login
if (!isset($_SESSION['user'])) {
?>
    <div class="flex justify-center items-center h-[60vh]">
        <div class="bg-white shadow-lg rounded-2xl p-8 text-center max-w-md w-full">
            
            <!-- ICON / IMAGE -->
            <div class="mb-4">
                <img src="assets/img/empty_cart.png" alt="login required" class="mx-auto w-24 h-24">
            </div>

            <h2 class="text-xl font-bold mb-2">
                Bạn chưa đăng nhập
            </h2>

            <p class="text-gray-500 text-sm mb-6">
                Vui lòng đăng nhập để xem lịch sử đơn hàng của bạn
            </p>

            <a href="index.php?act=login" 
               class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg transition">
                🔑 Đăng nhập ngay
            </a>

            <p class="text-sm mt-3 text-gray-400">
                Chưa có tài khoản? <a href="index.php?act=sign-up" class="text-blue-500">Đăng ký</a>
            </p>

        </div>
    </div>
<?php
    return;
}

// Lấy danh sách đơn hàng của user
$user_id = $_SESSION['user']['user_id'];
$orders = getall_order_by_userId($user_id);
?>

<div class="container mx-auto max-w-[1200px] my-10 p-4">

    <h2 class="text-2xl font-bold mb-6">📦 Đơn hàng của tôi</h2>

    <?php if (empty($orders)) { ?>
        <div class="text-center py-20 text-gray-500">
            Bạn chưa có đơn hàng nào
        </div>
    <?php } else { ?>

        <div class="space-y-6">
            <?php foreach ($orders as $order) { 
                $order_details = getall_order_details_by_orderId($order['order_id']);
            ?>

            <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">

                <!-- HEADER -->
                <div class="flex justify-between items-center mb-3">
                    <h3 class="font-bold text-lg">
                        #TKQ00<?php echo $order['order_id'] ?>
                    </h3>

                    <span class="text-xs px-3 py-1 rounded-full
                        <?php 
                            if ($order['order_status'] == 'Processing') echo 'bg-orange-200 text-orange-700';
                            if ($order['order_status'] == 'In Transit') echo 'bg-blue-200 text-blue-700';
                            if ($order['order_status'] == 'Delivered') echo 'bg-green-200 text-green-700';
                            if ($order['order_status'] == 'Cancelled') echo 'bg-red-200 text-red-700';
                        ?>">
                        <?php echo $order['order_status'] ?>
                    </span>
                </div>

                <!-- DATE -->
                <p class="text-sm text-gray-400 mb-3">
                    Ngày: <?php echo $order['created_at'] ?>
                </p>

                <!-- ITEMS -->
                <div class="space-y-2 border-t border-b py-2">
                    <?php foreach ($order_details as $item) { ?>
                        <div class="flex justify-between text-sm">
                            <span><?php echo $item['product_name'] ?> (x<?php echo $item['quantity'] ?>)</span>
                            <span>$<?php echo $item['price_per_unit'] ?></span>
                        </div>
                    <?php } ?>
                </div>

                <!-- TOTAL -->
                <div class="flex justify-between mt-3 font-semibold text-gray-700">
                    <span>Tổng:</span>
                    <span>$<?php echo $order['total_amount'] ?></span>
                </div>

                <!-- ACTION -->
                <div class="mt-3 flex gap-3">
                    <a href="index.php?act=order_detail&order_id=<?php echo $order['order_id'] ?>" 
                       class="text-blue-500 text-sm hover:underline">
                        Xem chi tiết
                    </a>

                    <?php if ($order['order_status'] == 'Processing') { ?>
                        <a href="index.php?act=cancel_order&order_id=<?php echo $order['order_id'] ?>" 
                           class="text-red-500 text-sm hover:underline"
                           onclick="return confirm('Bạn có chắc muốn hủy đơn này?');">
                            Hủy đơn
                        </a>
                    <?php } ?>
                </div>

            </div>

            <?php } ?>
        </div>

    <?php } ?>

</div>