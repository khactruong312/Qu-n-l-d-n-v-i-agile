<!DOCTYPE html>
<!-- 
    Khai báo kiểu tài liệu HTML5.
    Trình duyệt sẽ hiểu đây là file HTML chuẩn hiện đại.
-->

<html lang="vi">
<!-- 
    Thẻ gốc của tài liệu HTML.
    lang="vi" cho biết nội dung chính là tiếng Việt.
    Điều này giúp SEO, trình duyệt và trình đọc màn hình hiểu đúng ngôn ngữ.
-->

<head>
  <!-- 
      Phần head chứa các thông tin cấu hình cho trang:
      - bảng mã
      - responsive
      - tiêu đề trang
      - file script / css
  -->

  <meta charset="UTF-8">
  <!-- 
      Khai báo bảng mã UTF-8.
      Giúp hiển thị đúng tiếng Việt có dấu.
  -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- 
      Giúp giao diện responsive trên điện thoại.
      width=device-width: chiều rộng trang bằng chiều rộng thiết bị
      initial-scale=1.0: tỉ lệ zoom ban đầu là 100%
  -->

  <title>FAQ - Shop TDVM</title>
  <!-- 
      Tiêu đề trang hiển thị trên tab trình duyệt.
  -->

  <script src="https://cdn.tailwindcss.com"></script>
  <!-- 
      Nạp Tailwind CSS bằng CDN.
      Nhờ đó có thể dùng trực tiếp các class utility như:
      - bg-gray-100
      - text-center
      - rounded-lg
      - shadow-lg
      mà không cần tự viết CSS riêng.
  -->
</head>

<body class="bg-gray-100 font-sans">
  <!-- 
      Phần thân trang web.
      class:
      - bg-gray-100: nền xám nhạt
      - font-sans: dùng font sans-serif mặc định
  -->

  <!-- view/faqs.php -->
  <!-- view/faqs.php -->
  <!-- 
      Ghi chú tên file.
      Có 2 dòng comment giống nhau, mình giữ nguyên theo code của bạn.
  -->

  <div class="max-w-3xl mx-auto p-6 mt-10">
    <!-- 
        Khối bao ngoài toàn bộ nội dung FAQ.
        - max-w-3xl: chiều rộng tối đa mức 3xl
        - mx-auto: căn giữa ngang
        - p-6: padding bên trong
        - mt-10: margin-top tạo khoảng cách phía trên
    -->

    <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">FAQs - Shop TDVM</h1>
    <!-- 
        Tiêu đề chính của trang FAQ.
        class:
        - text-4xl: chữ lớn
        - font-bold: chữ đậm
        - mb-6: cách dưới 1 khoảng
        - text-center: căn giữa
        - text-gray-800: màu chữ xám đậm
    -->

    <p class="text-center text-gray-500 mb-8">
      Các câu hỏi thường gặp về sản phẩm, dịch vụ và chính sách của chúng tôi
    </p>
    <!-- 
        Đoạn mô tả ngắn bên dưới tiêu đề.
        Giúp người dùng hiểu nội dung trang là gì.
    -->

    <div class="space-y-4">
      <!-- 
          Khối chứa toàn bộ danh sách FAQ.
          - space-y-4: tạo khoảng cách dọc giữa các câu hỏi
      -->

      <!-- FAQ 1 -->
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- 
            Mỗi FAQ là một "card".
            class:
            - bg-white: nền trắng
            - shadow-lg: đổ bóng
            - rounded-lg: bo góc
            - overflow-hidden: nội dung không tràn ra ngoài góc bo
        -->

        <button class="w-full flex justify-between items-center px-6 py-4 text-left faq-btn hover:bg-gray-100 transition-colors">
          <!-- 
              Nút bấm để mở/đóng nội dung câu hỏi.
              class:
              - w-full: chiếm toàn bộ chiều ngang
              - flex: dùng flexbox
              - justify-between: đẩy nội dung sang 2 đầu
              - items-center: căn giữa theo chiều dọc
              - px-6 py-4: padding ngang/dọc
              - text-left: căn chữ về trái
              - faq-btn: class riêng để JS chọn
              - hover:bg-gray-100: hover đổi nền
              - transition-colors: hiệu ứng chuyển màu mượt
          -->

          <span class="font-medium text-gray-800">Làm thế nào để đặt hàng trên Shop TDVM?</span>
          <!-- Nội dung câu hỏi -->

          <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <!-- 
                Icon mũi tên xuống.
                - w-6 h-6: kích thước icon
                - transition-transform duration-300: hiệu ứng xoay mượt khi toggle
            -->
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            <!-- 
                Đường vẽ mũi tên SVG.
                Đây là icon hiển thị cho trạng thái đóng/mở FAQ.
            -->
          </svg>
        </button>

        <div class="px-6 py-4 hidden faq-content text-gray-600">
          <!-- 
              Phần nội dung câu trả lời.
              class:
              - px-6 py-4: padding
              - hidden: ban đầu bị ẩn
              - faq-content: class nhận diện nội dung FAQ
              - text-gray-600: màu chữ xám
          -->
          Để đặt hàng, bạn làm theo các bước sau: <br>
          1. Truy cập trang <strong>Shop</strong> và chọn sản phẩm mong muốn. <br>
          2. Chọn biến thể sản phẩm (màu sắc, dung lượng, kích thước) nếu có. <br>
          3. Nhấn <strong>Thêm vào giỏ hàng</strong> và kiểm tra lại số lượng, giá. <br>
          4. Vào <strong>Giỏ hàng</strong> và nhấn <strong>Thanh toán</strong>. <br>
          5. Nhập thông tin giao hàng, chọn phương thức thanh toán (COD hoặc online payment). <br>
          6. Xác nhận đơn hàng, sau đó bạn sẽ nhận email hoặc SMS thông báo xác nhận từ Shop TDVM.
        </div>
      </div>

      <!-- FAQ 2 -->
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Card FAQ số 2 -->

        <button class="w-full flex justify-between items-center px-6 py-4 text-left faq-btn hover:bg-gray-100 transition-colors">
          <!-- Nút mở/đóng nội dung FAQ 2 -->
          <span class="font-medium text-gray-800">Chính sách đổi trả và bảo hành sản phẩm như thế nào?</span>
          <!-- Câu hỏi -->

          <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <!-- Icon mũi tên -->
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>

        <div class="px-6 py-4 hidden faq-content text-gray-600">
          <!-- 
              Câu trả lời cho FAQ 2.
              hidden => mặc định ẩn, chỉ hiện khi click.
          -->
          Shop TDVM cam kết bảo hành và đổi trả sản phẩm như sau: <br>
          - **Đổi trả trong 7 ngày** kể từ ngày nhận hàng, với hóa đơn và sản phẩm còn nguyên tem, chưa sử dụng. <br>
          - **Bảo hành** từ 6–12 tháng tùy sản phẩm (theo chính sách hãng). <br>
          - Các sản phẩm lỗi do người dùng hoặc hư hỏng do va đập sẽ <strong>không được bảo hành</strong>. <br>
          - Liên hệ trực tiếp qua hotline hoặc email để được hướng dẫn đổi trả/bảo hành.
        </div>
      </div>

      <!-- FAQ 3 -->
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Card FAQ số 3 -->

        <button class="w-full flex justify-between items-center px-6 py-4 text-left faq-btn hover:bg-gray-100 transition-colors">
          <!-- Nút mở/đóng FAQ 3 -->
          <span class="font-medium text-gray-800">Thời gian và phí giao hàng như thế nào?</span>
          <!-- Câu hỏi -->

          <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <!-- Icon mũi tên -->
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>

        <div class="px-6 py-4 hidden faq-content text-gray-600">
          <!-- Nội dung trả lời FAQ 3 -->
          - Thời gian giao hàng từ 1–3 ngày làm việc đối với các khu vực nội thành, và 3–7 ngày cho ngoại thành hoặc tỉnh xa. <br>
          - Phí vận chuyển sẽ tính theo trọng lượng và địa chỉ giao hàng, hiển thị rõ trước khi thanh toán. <br>
          - Chúng tôi cung cấp nhiều phương thức giao hàng, từ tiêu chuẩn đến nhanh, khách hàng có thể lựa chọn phù hợp.
        </div>
      </div>

      <!-- FAQ 4 -->
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Card FAQ số 4 -->

        <button class="w-full flex justify-between items-center px-6 py-4 text-left faq-btn hover:bg-gray-100 transition-colors">
          <!-- Nút mở/đóng FAQ 4 -->
          <span class="font-medium text-gray-800">Cách thanh toán online và an toàn?</span>
          <!-- Câu hỏi -->

          <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <!-- Icon mũi tên -->
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>

        <div class="px-6 py-4 hidden faq-content text-gray-600">
          <!-- Nội dung trả lời FAQ 4 -->
          - Shop TDVM hỗ trợ các phương thức thanh toán online: thẻ ngân hàng, ví điện tử (Momo, ZaloPay…), chuyển khoản trực tuyến. <br>
          - Tất cả thanh toán được xử lý qua cổng thanh toán an toàn, mã hóa SSL 256-bit. <br>
          - Sau khi thanh toán thành công, bạn sẽ nhận được email hoặc SMS xác nhận đơn hàng.
        </div>
      </div>

      <!-- FAQ 5 -->
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Card FAQ số 5 -->

        <button class="w-full flex justify-between items-center px-6 py-4 text-left faq-btn hover:bg-gray-100 transition-colors">
          <!-- Nút mở/đóng FAQ 5 -->
          <span class="font-medium text-gray-800">Làm sao để liên hệ hỗ trợ khách hàng?</span>
          <!-- Câu hỏi -->

          <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <!-- Icon mũi tên -->
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>

        <div class="px-6 py-4 hidden faq-content text-gray-600">
          <!-- Nội dung trả lời FAQ 5 -->
          Bạn có thể liên hệ Shop TDVM bằng các cách sau: <br>
          - Gọi trực tiếp đến hotline: <strong>1900 1234</strong> (8:00–21:00 hàng ngày). <br>
          - Gửi email về: <strong>support@shopTDVM.vn</strong> <br>
          - Chat trực tiếp qua fanpage Facebook hoặc Zalo Official Account. <br>
          - Chúng tôi cam kết phản hồi mọi thắc mắc trong vòng 24h.
        </div>
      </div>

    </div>
    <!-- Kết thúc danh sách FAQ -->
  </div>
  <!-- Kết thúc khối nội dung chính -->

  <script>
    // Accordion toggle
    // Chức năng đóng/mở từng câu hỏi FAQ khi người dùng click

    const buttons = document.querySelectorAll('.faq-btn');
    // 
    // Lấy tất cả các nút có class .faq-btn
    // Mỗi nút tương ứng với 1 câu hỏi FAQ
    //

    buttons.forEach(btn => {
        // Duyệt từng nút FAQ

        btn.addEventListener('click', () => {
            // Gắn sự kiện click cho từng nút
            // Khi click sẽ thực hiện mở/đóng phần nội dung bên dưới

            const content = btn.nextElementSibling;
            // 
            // Lấy phần tử HTML đứng ngay sau nút hiện tại
            // Trong cấu trúc này, phần tử ngay sau button chính là div chứa nội dung trả lời
            //

            content.classList.toggle('hidden');
            // 
            // Thêm hoặc xóa class 'hidden'
            // - Nếu đang ẩn thì sẽ hiện
            // - Nếu đang hiện thì sẽ ẩn đi
            //

            btn.querySelector('svg').classList.toggle('rotate-180');
            // 
            // Tìm icon SVG bên trong nút vừa click
            // Sau đó thêm/xóa class rotate-180 để xoay mũi tên
            // Mục đích: tạo cảm giác accordion đang mở/đóng
            //
        });
    });
  </script>

</body>
</html>