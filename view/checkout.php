<div class="container mx-auto max-w-[1440px] my-12 p-4  pt-14 md:p-8">
    <!-- 
        Khối bao ngoài toàn bộ trang checkout.
        - container: khối chứa chính
        - mx-auto: căn giữa theo chiều ngang
        - max-w-[1440px]: chiều rộng tối đa 1440px
        - my-12: margin trên dưới
        - p-4 / md:p-8: padding mặc định và trên màn hình md trở lên
        - pt-14: padding-top lớn hơn để tạo khoảng cách phía trên
    -->

    <!-- Stock Error Alert -->
    <?php if (!empty($error['stock'])): ?>
        <!-- 
            Hiển thị thông báo lỗi liên quan đến số lượng tồn kho.
            Điều kiện:
            - Nếu mảng $error có phần tử 'stock' và giá trị không rỗng
            - Thì render khối cảnh báo màu đỏ
        -->
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg" role="alert">
            <!-- 
                mb-6: khoảng cách phía dưới
                p-4: padding bên trong
                bg-red-100: nền đỏ nhạt
                border border-red-400: viền đỏ
                text-red-700: chữ đỏ đậm
                rounded-lg: bo góc
                role="alert": giúp trình đọc màn hình hiểu đây là cảnh báo
            -->
            <h3 class="font-semibold mb-2"><i class="bi bi-exclamation-triangle"></i> Lỗi hàng hóa - Stock Issue</h3>
            <!-- 
                Tiêu đề cảnh báo.
                Icon bootstrap-icons: bi bi-exclamation-triangle
            -->

            <p><?php echo $error['stock']; ?></p>
            <!-- 
                In ra nội dung lỗi tồn kho từ backend.
                Ví dụ có thể là: sản phẩm không đủ số lượng, sản phẩm đã hết hàng,...
            -->

            <p class="text-sm mt-2">
                Vui lòng quay lại giỏ hàng để cập nhật số lượng - Please go back to your cart to update
                quantities.
            </p>
            <!-- 
                Dòng mô tả hướng dẫn người dùng xử lý lỗi.
                text-sm: cỡ chữ nhỏ
                mt-2: margin-top
            -->

            <a href="index.php?act=view-cart" class="text-red-600 hover:underline font-semibold">
                Quay lại giỏ hàng / Back to Cart
            </a>
            <!-- 
                Link quay lại trang giỏ hàng để người dùng chỉnh lại số lượng sản phẩm.
            -->
        </div>
    <?php endif; ?>
    <!-- Kết thúc khối cảnh báo tồn kho -->

    <form class="grid grid-cols-5 gap-6 gap-x-8" action="" method="post">
        <!-- 
            Form checkout chính.
            - action="" : submit về chính URL hiện tại
            - method="post" : gửi dữ liệu bằng phương thức POST
            - grid grid-cols-5 : chia bố cục thành 5 cột
            - gap-6 / gap-x-8 : khoảng cách giữa các phần tử
        -->

        <div class="md:col-span-2 col-span-full">
            <!-- 
                Cột bên trái: thông tin người nhận / địa chỉ giao hàng
                - Trên md trở lên chiếm 2 cột
                - Trên màn hình nhỏ chiếm toàn bộ chiều rộng
            -->

            <h2 class="font-semibold text-xl">Enter your Shipping address</h2>
            <!-- Tiêu đề phần nhập địa chỉ giao hàng -->

            <div class="grid grid-cols-1 gap-4 mt-5">
                <!-- 
                    Nhóm input name / email / phone
                    - Mỗi input nằm trên 1 hàng
                    - gap-4: khoảng cách giữa các dòng
                    - mt-5: margin-top
                -->

                <div class="flex flex-col space-y-2">
                    <!-- 
                        Input Name
                        - flex flex-col: xếp label + input + lỗi theo chiều dọc
                        - space-y-2: khoảng cách dọc giữa các phần tử
                    -->
                    <label for="name" class="font-semibold text-sm">Name</label>
                    <!-- Label liên kết với input id="name" -->

                    <input type="text" class="form-input rounded text-slate-900" name="name" id="name"
                        placeholder="Example: nedd" value="<?php echo $_SESSION['user']['name'] ?>" />
                    <!-- 
                        Ô nhập tên người nhận.
                        - type="text": nhập chuỗi văn bản
                        - name="name": tên field gửi lên server
                        - id="name": để label liên kết tới input
                        - placeholder: gợi ý dữ liệu
                        - value lấy sẵn từ session user hiện tại
                        => giúp tự động điền tên người dùng đã đăng nhập
                    -->

                    <?php echo !empty($error['name']) ? '<span class="text-red-500 text-sm">' . $error['name'] . '</span>' : "" ?>
                    <!-- 
                        Hiển thị lỗi validate cho trường name nếu có.
                        - Nếu $error['name'] không rỗng -> hiện span đỏ
                        - Nếu không có lỗi -> in chuỗi rỗng
                    -->
                </div>

                <div class="flex flex-col space-y-2">
                    <!-- Khối nhập email -->
                    <label for="email" class="font-semibold text-sm">Email</label>
                    <!-- Label cho ô email -->

                    <input type="email" class="form-input rounded text-slate-900" name="email" id="email"
                        value="<?php echo $_SESSION['user']['email'] ?>" />
                    <!-- 
                        Ô nhập email.
                        - type="email" giúp trình duyệt kiểm tra định dạng email cơ bản
                        - value lấy từ session user
                    -->

                    <?php echo !empty($error['email']) ? '<span class="text-red-500 text-sm">' . $error['email'] . '</span>' : "" ?>
                    <!-- Hiển thị lỗi của email nếu có -->
                </div>

                <div class="flex flex-col space-y-2">
                    <!-- Khối nhập số điện thoại -->
                    <label for="phone" class="font-semibold text-sm">Phone</label>
                    <!-- Label cho ô phone -->

                    <input type="tel" class="form-input rounded text-slate-900" name="phone" id="phone"
                        value="<?php echo $_SESSION['user']['phone'] ?>" />
                    <!-- 
                        Ô nhập số điện thoại.
                        - type="tel" dùng cho số điện thoại
                        - value lấy từ session user
                    -->

                    <?php echo !empty($error['phone']) ? '<span class="text-red-500 text-sm">' . $error['phone'] . '</span>' : "" ?>
                    <!-- Hiển thị lỗi validate cho phone nếu có -->
                </div>

            </div>

            <div class="flex flex-col space-y-2 mt-6">
                <!-- 
                    Khối nhập địa chỉ chi tiết
                    mt-6: cách phần phía trên một khoảng
                -->

                <label class="font-semibold text-sm">Address</label>
                <!-- Label cho ô địa chỉ -->

                <input type="text" class="form-input rounded text-slate-900" name="address" />
                <!-- 
                    Ô nhập địa chỉ giao hàng.
                    Lưu ý:
                    - Ở đây chưa có value mặc định từ session hoặc postback
                    - Nhưng mình giữ nguyên theo code của bạn, chỉ ghi chú
                -->

                <?php echo !empty($error['address']) ? '<span class="text-red-500 text-sm">' . $error['address'] . '</span>' : "" ?>
                <!-- Hiển thị lỗi validate cho address nếu có -->

            </div>
        </div>
        <!-- Kết thúc cột thông tin giao hàng -->

        <div class="md:col-span-3 col-span-full">
            <!-- 
                Cột bên phải: danh sách giỏ hàng + phương thức ship + thanh toán + tổng tiền
                - md chiếm 3 cột
                - mobile chiếm full
            -->

            <h2 class="font-semibold text-xl">Your cart items</h2>
            <!-- Tiêu đề phần giỏ hàng -->

            <div class="mt-6">
                <?php
                // Khởi tạo biến tổng tiền hàng ban đầu
                // Chỉ cộng tiền sản phẩm, chưa bao gồm phí vận chuyển
                $totalPrice = 0;

                // Duyệt toàn bộ sản phẩm trong giỏ hàng
                foreach ($carts as $key => $cart) {
                    // extract($cart) chuyển key trong mảng $cart thành biến riêng
                    // Ví dụ: $cart['price'] -> $price, $cart['quantity'] -> $quantity,...
                    extract($cart);

                    // Cộng dồn tổng tiền = giá * số lượng
                    $totalPrice += (int) ($price) * (int) ($quantity);

                    // Lấy thông tin biến thể hiện tại (variant) theo variant_id của sản phẩm trong giỏ
                    // Ví dụ: màu sắc, kích thước, phiên bản,...
                    $variant = getone_variant($cart['variant_id']);

                    // Nếu tồn tại variant thì lấy quantity tồn kho
                    // Nếu không tồn tại thì mặc định stock = 0
                    $variantStock = $variant ? $variant['quantity'] : 0;
                ?>
                    <div class="grid grid-cols-4 items-center gap-x-4 cart-item text-sm md:text-base">
                        <!-- 
                            Mỗi sản phẩm giỏ hàng hiển thị trên 1 dòng 4 cột:
                            1. Ảnh
                            2. Tên sản phẩm + tên variant
                            3. Số lượng
                            4. Giá
                        -->

                        <img class=" col-span-1 h-[90px] rounded-lg object-cover"
                            src="./<?php echo $image_path . $image_url ?>" alt="">
                        <!-- 
                            Ảnh sản phẩm.
                            src ghép từ:
                            - $image_path: thư mục chứa ảnh
                            - $image_url: tên file ảnh
                            object-cover giúp ảnh đầy khung mà không méo
                        -->

                        <h3 class=" col-span-1 line-clamp-2"><?php echo $name . " - " . $variant_name ?></h3>
                        <!-- 
                            Hiển thị tên sản phẩm + tên biến thể.
                            line-clamp-2: giới hạn 2 dòng, tránh vỡ layout nếu tên dài
                        -->

                        <h4 class="col-span-1 text-center text-sm font-semibold">x<?php echo $quantity ?></h4>
                        <!-- Hiển thị số lượng sản phẩm đã đặt -->

                        <h4 class="col-span-1 text-right text-base font-bold">$<?php echo $price ?></h4>
                        <!-- Hiển thị giá 1 sản phẩm -->
                    </div>

                    <!-- Stock Status Display in Checkout -->
                    <div class="text-xs mb-3">
                        <?php
                        // Kiểm tra tình trạng tồn kho của từng variant để hiển thị cảnh báo phù hợp

                        if ($variantStock <= 0) {
                            // Trường hợp 1: hết hàng hoàn toàn
                        ?>
                            <p class="text-red-600 font-semibold">
                                <i class="bi bi-exclamation-circle"></i> Hết hàng - Out of Stock
                            </p>
                        <?php
                        } elseif ($variantStock < $quantity) {
                            // Trường hợp 2: còn hàng nhưng số lượng tồn kho nhỏ hơn số lượng người dùng đang đặt
                        ?>
                            <p class="text-orange-600 font-semibold">
                                <i class="bi bi-exclamation-triangle"></i> Chỉ còn
                                <?php echo $variantStock ?> sản phẩm (bạn đặt <?php echo $quantity ?>)
                            </p>
                        <?php
                        } elseif ($variantStock < 5) {
                            // Trường hợp 3: vẫn đủ cho đơn hàng hiện tại nhưng tồn kho thấp (< 5)
                        ?>
                            <p class="text-orange-600 font-semibold">
                                <i class="bi bi-exclamation-triangle"></i> Chỉ còn
                                <?php echo $variantStock ?> sản phẩm
                            </p>
                        <?php
                        } else {
                            // Trường hợp 4: hàng còn ổn
                        ?>
                            <p class="text-green-600 font-semibold">
                                <i class="bi bi-check-circle"></i> Còn hàng
                                (<?php echo $variantStock ?> sản phẩm)
                            </p>
                        <?php
                        }
                        ?>
                    </div>

                    <hr class="my-3 w-full h-1">
                    <!-- Đường kẻ phân cách giữa các sản phẩm trong giỏ -->

                <?php
                }
                ?>
            </div>

            <div class="grid md:grid-cols-2 grid-cols-1 gap-y-8 gap-x-10">
                <!-- 
                    Khu vực dưới danh sách giỏ hàng chia 2 cột:
                    - Bên trái: ghi chú đơn hàng
                    - Bên phải: shipping, total, payment, button đặt hàng
                -->

                <div class="flex flex-col space-y-2 mt-4">
                    <!-- Cột ghi chú cho người bán -->
                    <label for="order-note" class="font-semibold text-sm">Note to seller?</label>
                    <!-- Label cho textarea ghi chú -->

                    <textarea name="order-note" id="order-note" cols="3" rows="5" class="rounded-md py-2 px-3"
                        placeholder="Enter something for order"></textarea>
                    <!-- 
                        Textarea để khách ghi chú thêm cho đơn hàng.
                        Ví dụ: giao giờ hành chính, gọi trước khi giao, đóng gói kỹ,...
                    -->
                </div>

                <div class="flex flex-col items-center w-full self-end">
                    <!-- 
                        Cột phải:
                        - Shipping method
                        - Tổng tiền
                        - Payment method
                        - Nút đặt hàng
                    -->

                    <div class="grid grid-cols-1 gap-y-3 w-full mb-4">
                        <label for="" class="text-sm font-semibold">Shipping Method</label>
                        <!-- Tiêu đề danh sách phương thức vận chuyển -->

                        <?php
                        // Duyệt danh sách các phương thức vận chuyển từ backend
                        foreach ($shippingTypes as $type) {
                        ?>
                            <div class="self-start flex items-center justify-between">
                                <!-- 
                                    Mỗi dòng shipping gồm:
                                    - radio + tên phương thức
                                    - giá ship
                                -->
                                <div>
                                    <input type="radio" value="<?php echo $type['shipping_type_id'] ?>" name="shipping_type"
                                        id="shipping_type_<?php echo $type['shipping_type_id'] ?>" <?php echo $type['shipping_type_id'] == 1 ? "checked" : "" ?> />
                                    <!-- 
                                        Radio chọn phương thức vận chuyển.
                                        - value: id của loại ship
                                        - name="shipping_type": để các radio thuộc cùng 1 nhóm
                                        - id động để label click được
                                        - shipping_type_id == 1 thì mặc định checked
                                    -->

                                    <label for="shipping_type_<?php echo $type['shipping_type_id'] ?>"
                                        class="cursor-pointer text-sm"><?php echo $type['shipping_type_name'] ?></label>
                                    <!-- Hiển thị tên phương thức vận chuyển -->
                                </div>

                                <p class="font-medium text-base">$<?php echo $type['shipping_type_price'] ?></p>
                                <!-- Hiển thị giá ship của phương thức hiện tại -->
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="flex items-center justify-between w-full font-semibold text-lg">
                        <!-- 
                            Khối hiển thị tổng tiền đơn hàng
                            Tổng này = tổng tiền sản phẩm + phí ship mặc định đầu tiên
                        -->
                        <h3>Total: </h3>

                        <input type="hidden" name="total-price" id="total-price"
                            value="<?php echo $totalPrice + $shippingTypes['0']['shipping_type_price']; ?>">
                        <!-- 
                            Input hidden dùng để gửi tổng tiền cuối cùng về server khi submit form.
                            id="total-price" sẽ được JavaScript cập nhật lại nếu người dùng đổi shipping method.
                        -->

                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['user_id'] ?>">
                        <!-- 
                            Input hidden chứa user_id của người dùng đang đăng nhập.
                            Dùng để backend biết đơn hàng thuộc user nào.
                        -->

                        <h3 class="total-price">$<?php echo $totalPrice + $shippingTypes['0']['shipping_type_price']; ?>
                        </h3>
                        <!-- 
                            Hiển thị tổng tiền mặc định ra giao diện.
                            class="total-price" để JavaScript tìm tới và cập nhật text khi đổi ship.
                        -->
                    </div>

                    <hr class="my-3 w-full h-1">
                    <!-- Đường kẻ phân cách -->

                    <div class="w-full mb-4">
                        <label for="" class="text-sm font-semibold">Payment Method</label>
                        <!-- Tiêu đề danh sách phương thức thanh toán -->

                        <div class="grid md:grid-cols-2 grid-cols-1 gap-3 mt-3">
                            <?php
                            // Duyệt danh sách phương thức thanh toán
                            foreach ($paymentMethods as $key => $value) {
                                // Loại bỏ dấu nháy đơn ở đầu/cuối chuỗi nếu có
                                $value = trim($value, "'");
                            ?>
                                <div
                                    class="flex space-x-2 rounded-md shadow-sm hover:shadow-lg border py-4 px-2 cursor-pointer">
                                    <!-- 
                                        Khung hiển thị 1 phương thức thanh toán
                                        - Có hover shadow để nhìn đẹp hơn
                                        - border / rounded-md: tạo card nhỏ
                                    -->

                                    <input type="radio" name="payment_method" <?php echo $key === 0 ? 'checked' : '' ?>
                                        value="<?php echo $value ?>" id="payment_<?php echo $key ?>">
                                    <!-- 
                                        Radio chọn phương thức thanh toán
                                        - name giống nhau để chọn 1 trong nhiều
                                        - key === 0 thì mặc định chọn phần tử đầu tiên
                                        - value là tên phương thức sau khi trim
                                    -->

                                    <label for="payment_<?php echo $key ?>"
                                        class="capitalize text-sm cursor-pointer"><?php echo $value ?></label>
                                    <!-- 
                                        Label hiển thị tên phương thức thanh toán.
                                        capitalize: viết hoa chữ cái đầu
                                    -->
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>

                    <div class="w-full">
                        <!-- Khu vực nút submit và link quay lại mua hàng -->

                        <div class="submit-placeorder-button">
                            <!-- 
                                Có thể class này được dùng để style hoặc JS xử lý riêng nút đặt hàng
                            -->

                            <button class="btn btn-outline w-full my-2" type="submit" name="place-order">
                                Place order
                            </button>
                            <!-- 
                                Nút gửi form đặt hàng.
                                - type="submit": submit toàn bộ form
                                - name="place-order": backend có thể dùng để kiểm tra form này được submit từ nút nào
                            -->
                        </div>

                        <div class="flex items-center mt-1">
                            <!-- Link quay lại trang mua sắm -->

                            <i class="bi bi-arrow-left mr-2"></i>
                            <!-- Icon mũi tên trái -->

                            <a href="index.php" class="text-xs">Continue to shopping</a>
                            <!-- Link quay về trang chính / tiếp tục mua sắm -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kết thúc cột phải -->
    </form>
    <!-- Kết thúc form checkout -->
</div>
<!-- Kết thúc container chính -->


<!-- select shipping types -->
<script>
    // Lấy toàn bộ radio button thuộc nhóm shipping_type
    const shippingTypeRadios = document.querySelectorAll("input[name='shipping_type']")

    // Duyệt từng radio để gắn sự kiện change
    shippingTypeRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            // this.value là shipping_type_id mà người dùng vừa chọn
            const typeId = this.value

            // Lấy danh sách shippingTypes từ PHP chuyển sang JavaScript bằng json_encode
            // Sau đó tìm phần tử có shipping_type_id trùng với typeId vừa chọn
            const selectedShippingType = <?php echo json_encode($shippingTypes); ?>.find(function(type) {
                return type.shipping_type_id == typeId;
            });

            // Tính tổng tiền mới:
            // tổng tiền hàng ban đầu + phí ship của phương thức mới được chọn
            let newTotalPrice = <?php echo $totalPrice; ?> + Number(selectedShippingType.shipping_type_price);

            // Cập nhật tổng tiền hiển thị ra giao diện
            document.querySelector('.total-price').textContent = '$' + newTotalPrice

            // Cập nhật giá trị input hidden để khi submit form backend nhận đúng tổng tiền mới
            document.getElementById('total-price').value = newTotalPrice;
        })
    })
</script>