<div class="container mx-auto max-w-[1440px] my-8 mt-[140px] md:mt-[100px] md:p-8 ">
    <!-- 
        Khối bao ngoài cùng của trang xác nhận đặt hàng.
        class:
        - container: vùng chứa chính
        - mx-auto: căn giữa theo chiều ngang
        - max-w-[1440px]: chiều rộng tối đa 1440px
        - my-8: margin trên dưới
        - mt-[140px]: margin-top 140px trên màn hình thường
        - md:mt-[100px]: từ màn hình md trở lên thì margin-top là 100px
        - md:p-8: từ màn hình md trở lên có padding 8

        Mục đích:
        - tạo khoảng cách với phần header phía trên
        - giữ nội dung không quá rộng
        - căn giữa toàn bộ khối nội dung
    -->

    <div class="sm:mx-auto mx-8 max-w-[900px] my-8 mt-16 p-6 md:p-8 rounded-lg border shadow-md relative">
        <!-- 
            Khối card chính hiển thị thông báo đặt hàng thành công.
            class:
            - sm:mx-auto: từ màn hình sm trở lên căn giữa ngang
            - mx-8: margin trái/phải trên mobile
            - max-w-[900px]: chiều rộng tối đa 900px
            - my-8: margin trên dưới
            - mt-16: margin-top
            - p-6: padding bên trong mặc định
            - md:p-8: từ màn hình md trở lên padding lớn hơn
            - rounded-lg: bo góc
            - border: viền
            - shadow-md: đổ bóng vừa
            - relative: làm mốc định vị cho phần tử absolute bên trong

            Mục đích:
            - tạo một "card" nổi bật ở giữa trang
            - chứa icon, tiêu đề, mô tả và chi tiết đơn hàng
        -->

        <i class="bi bi-check-circle-fill absolute -top-7 left-[50%] -translate-x-[50%] text-violet-600 text-6xl rounded-full shadow-md"></i>
        <!-- 
            Icon dấu check thành công.
            class:
            - bi bi-check-circle-fill: icon từ Bootstrap Icons
            - absolute: định vị tuyệt đối
            - -top-7: đẩy icon lên phía trên card
            - left-[50%]: đặt mép trái icon ở 50% chiều ngang card
            - -translate-x-[50%]: kéo icon ngược lại 50% chiều rộng của chính nó để căn giữa thật sự
            - text-violet-600: màu tím
            - text-6xl: kích thước icon lớn
            - rounded-full: bo tròn hoàn toàn
            - shadow-md: đổ bóng

            Mục đích:
            - hiển thị biểu tượng xác nhận đơn hàng thành công
            - đặt nổi ở phía trên card cho đẹp mắt
        -->

        <div class="flex items-center flex-col">
            <!-- 
                Khối chứa phần tiêu đề và mô tả.
                class:
                - flex: dùng flexbox
                - items-center: căn giữa theo trục ngang
                - flex-col: xếp các phần tử theo cột

                Mục đích:
                - căn giữa nội dung thông báo
            -->

            <h4 class="text-center mt-5 font-bold text-2xl">
                Thank you for order <?php echo '#TKQ00' . $order['order_id'] ?>
            </h4>
            <!-- 
                Tiêu đề cảm ơn sau khi đặt hàng thành công.
                class:
                - text-center: căn giữa chữ
                - mt-5: cách phía trên
                - font-bold: chữ đậm
                - text-2xl: cỡ chữ lớn

                Phần PHP:
                - '#TKQ00' . $order['order_id']
                - ghép chuỗi mã đơn hàng hiển thị ra giao diện
                - ví dụ nếu order_id = 15 thì sẽ hiển thị:
                  #TKQ0015

                Mục đích:
                - cho người dùng biết đơn hàng đã tạo thành công
                - hiển thị mã đơn hàng để dễ tra cứu
            -->

            <p class="text-neutral-600 text-sm mt-2 text-center">
                We'll send you an email with tracking information when your item ships
            </p>
            <!-- 
                Đoạn mô tả ngắn bên dưới tiêu đề.
                class:
                - text-neutral-600: màu chữ xám trung tính
                - text-sm: cỡ chữ nhỏ
                - mt-2: cách phía trên
                - text-center: căn giữa

                Nội dung:
                - thông báo rằng hệ thống sẽ gửi email khi hàng được giao/vận chuyển
            -->

        </div>

        <div class="mt-8">
            <!-- 
                Khối chứa chi tiết đơn hàng.
                - mt-8: tạo khoảng cách với phần thông báo phía trên
            -->

            <?php echo order_item($order, $order_details, true, true) ?>
            <!-- 
                Gọi hàm order_item(...) để render ra nội dung chi tiết đơn hàng.

                Tham số truyền vào:
                1. $order
                   - thông tin chung của đơn hàng
                   - có thể bao gồm: order_id, ngày đặt, tổng tiền, trạng thái, người nhận,...

                2. $order_details
                   - danh sách sản phẩm thuộc đơn hàng
                   - có thể bao gồm: tên sản phẩm, số lượng, giá, biến thể,...

                3. true
                4. true
                   - hai tham số boolean này dùng để điều khiển cách hiển thị của hàm order_item()
                   - ví dụ: có hiện thêm thông tin nào đó hay không
                   - chính xác phụ thuộc vào cách bạn định nghĩa hàm order_item trong project

                Lưu ý:
                - Hàm này trả về HTML, sau đó echo ra giao diện
                - Mình giữ nguyên hoàn toàn, không thay đổi
            -->
        </div>

    </div>

</div>
<!-- 
    Kết thúc toàn bộ khối trang xác nhận đơn hàng.
-->