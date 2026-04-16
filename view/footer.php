<footer class="footer bg-slate-900 text-white p-10 bg-base-200 text-base-content w-full">
    <!-- 
        Thẻ footer: phần chân trang của website.
        class:
        - footer: class giao diện footer, thường là từ DaisyUI/Tailwind component
        - bg-slate-900: nền màu xám đen đậm
        - text-white: màu chữ trắng
        - p-10: padding bên trong lớn
        - bg-base-200: class màu nền theo DaisyUI
        - text-base-content: class màu chữ theo DaisyUI
        - w-full: chiều rộng full màn hình

        Lưu ý:
        - Ở đây đang có cả bg-slate-900 và bg-base-200
        - đồng thời có text-white và text-base-content
        - nếu framework xử lý trùng class thì class phía sau hoặc CSS ưu tiên cao hơn sẽ thắng
        - nhưng mình giữ nguyên theo code của bạn, không sửa
    -->

    <aside>
        <!-- 
            Khối aside thường dùng để chứa thông tin phụ hoặc thông tin thương hiệu.
            Ở đây đang dùng để chứa logo và tên shop.
        -->

        <img src="./assets/img/logo.png" alt="logo" class="w-16 h-16" style="border-radius: 20px;">
        <!-- 
            Ảnh logo của shop.
            - src: đường dẫn đến file ảnh logo
            - alt="logo": văn bản thay thế nếu ảnh lỗi hoặc cho trình đọc màn hình
            - class="w-16 h-16": chiều rộng và chiều cao 16 đơn vị Tailwind
            - style="border-radius: 20px;": bo góc ảnh 20px

            Lưu ý:
            - đang dùng style inline để bo góc
            - mình giữ nguyên, không đổi sang class Tailwind
        -->

        <p class="font-bold">TDVM Shop llc.<br />FPT Polytechnic 2025</p>
        <!-- 
            Đoạn văn bản giới thiệu thương hiệu.
            - font-bold: chữ đậm
            - <br />: xuống dòng giữa tên shop và dòng thông tin trường/năm
        -->
    </aside>

    <nav>
        <!-- 
            Cột điều hướng số 1: Services
            Dùng thẻ nav để nhóm các liên kết điều hướng.
        -->

        <header class="footer-title">Services</header>
        <!-- 
            Tiêu đề nhóm liên kết.
            class="footer-title" thường là class của DaisyUI để làm nổi bật tiêu đề cột.
        -->

        <a class="link link-hover">Branding</a>
        <!-- 
            Liên kết mục Branding.
            Hiện tại chưa có href nên chưa điều hướng đi đâu.
            class:
            - link: style link
            - link-hover: có hiệu ứng khi hover
        -->

        <a class="link link-hover">Design</a>
        <!-- Liên kết mục Design, hiện chưa có href -->

        <a class="link link-hover">Marketing</a>
        <!-- Liên kết mục Marketing, hiện chưa có href -->

        <a class="link link-hover">Advertisement</a>
        <!-- Liên kết mục Advertisement, hiện chưa có href -->
    </nav>

    <nav>
        <!-- 
            Cột điều hướng số 2: Company
            Chứa các liên kết liên quan đến doanh nghiệp / thông tin shop.
        -->

        <header class="footer-title">Company</header>
        <!-- Tiêu đề cột Company -->

        <a href="index.php?act=about">About us</a>
        <!-- 
            Link đến trang giới thiệu.
            Khi click sẽ chuyển đến:
            index.php?act=about
        -->

        <a href="index.php?act=contact">Contact</a>
        <!-- 
            Link đến trang liên hệ.
            Khi click sẽ chuyển đến:
            index.php?act=contact
        -->

        <a class="link link-hover">Jobs</a>
        <!-- 
            Link mục Jobs.
            Hiện chưa có href nên chưa dẫn đi đâu.
        -->

        <a class="link link-hover">Press kit</a>
        <!-- 
            Link mục Press kit.
            Hiện chưa có href nên chưa dẫn đi đâu.
        -->
    </nav>

    <nav>
        <!-- 
            Cột điều hướng số 3: Legal
            Chứa các mục liên quan đến điều khoản, chính sách, pháp lý.
        -->

        <header class="footer-title">Legal</header>
        <!-- Tiêu đề cột Legal -->

        <a class="link link-hover">Terms of use</a>
        <!-- 
            Mục điều khoản sử dụng.
            Hiện chưa có href.
        -->

        <a class="link link-hover">Privacy policy</a>
        <!-- 
            Mục chính sách bảo mật.
            Hiện chưa có href.
        -->

        <a class="link link-hover">Cookie policy</a>
        <!-- 
            Mục chính sách cookie.
            Hiện chưa có href.
        -->
    </nav>
</footer>
<!-- 
    Kết thúc footer.
    Footer này đang chia làm nhiều khối:
    1. Logo + thương hiệu
    2. Services
    3. Company
    4. Legal
-->