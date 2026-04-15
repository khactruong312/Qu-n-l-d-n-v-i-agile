<?php
require_once "../../model/pdo.php";
include "../../model/orders.php";
include '../../global.php';

$orderStatus = $_GET['order_status'];

$sql = "SELECT * FROM orders WHERE 1 ORDER BY order_id DESC";

if ($orderStatus !== 'all') {
    $safeStatus = strtolower($orderStatus);
    $sql = "SELECT * FROM orders WHERE LOWER(order_status)= '$safeStatus' ORDER BY order_id DESC";
}

$orders = pdo_query($sql);

if (count($orders) > 0) {
    foreach ($orders as $key => $order) {

        extract($order);

        $order_details = getall_order_details_by_orderId($order_id);
        $order_statuss = get_OrderStatus();
?>

        <div class="border p-4">

            <h3 class="font-semibold text-xl">Order ID: <?php echo $order_id ?></h3>

            <?php echo order_item($order, $order_details) ?>

            <div>

                <form action="index.php?act=update_order&order_id=<?php echo $order_id ?>" method="post">

                    <h4 class="font-semibold text-xl mb-6">Update Orders</h4>

                    <div class="flex items-end space-x-3">

                        <div class="flex flex-col space-y-4 md:w-1/2 w-full">

                            <label>Order Status</label>

                            <?php
                            $current_status = $order_status;

                            // FLOW ORDER
                            $flow = [
                                'Pending' => 1,
                                'Processing' => 1,
                                'In Transit' => 2,
                                'Delivered' => 3,
                                'Return Requested' => 4,
                                'Returned' => 5,
                                'Cancelled' => 6
                            ];

                            $current_index = $flow[$current_status] ?? 0;
                            ?>

                            <select name="order_status" class="w-full px-3 py-2">

                                <?php foreach ($order_statuss as $status): ?>

                                    <?php
                                    $status = trim($status, "'");

                                    $disabled = '';
                                    $status_index = $flow[$status] ?? 0;

                                    if ($current_status === 'Delivered' && $status !== 'Delivered') {
                                        $disabled = 'disabled';
                                    }

                                    // ❌ Admin KHÔNG được phép hủy đơn
                                    elseif ($status === 'Cancelled') {
                                        $disabled = 'disabled';
                                    }

                                    // ❌ không cho chọn trạng thái đã qua
                                    elseif ($status_index < $current_index && $current_index > 0) {
                                        $disabled = 'disabled';
                                    }

                                    // ❌ admin không được chọn Return Requested
                                    elseif ($status == 'Return Requested') {
                                        $disabled = 'disabled';
                                    }

                                    // ❌ Returned chỉ mở khi user đã request
                                    elseif ($status == 'Returned' && $current_status != 'Return Requested') {
                                        $disabled = 'disabled';
                                    }

                                    $selected = ($status == $order_status) ? 'selected' : '';
                                    ?>

                                    <option value="<?= $status ?>" <?= $selected ?> <?= $disabled ?>
                                        style="<?= $disabled ? 'color:#999;background:#f3f4f6;' : '' ?>">
                                        <?= $status ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <button type="submit" name="update_order"
                            class="capitalize btn bg-slate-700 hover:bg-slate-800 text-white">
                            Update
                        </button>

                    </div>

                </form>

            </div>

        </div>

    <?php
    }
} else {
    ?>

    <div class="h-full w-full p-20 grid place-items-center">
        <p class="text-sm">No orders found!</p>
    </div>

<?php
}
?>