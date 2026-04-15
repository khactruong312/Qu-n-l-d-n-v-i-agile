<div class="container mx-auto max-w-[1440px] my-8 p-4 md:p-8">

    <!-- Stock Error Alert -->
    <?php if (!empty($_SESSION['error_stock'])): ?>
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg" role="alert">
            <h3 class="font-semibold mb-2"><i class="bi bi-exclamation-triangle"></i> Lỗi hàng hóa - Stock Issue</h3>
            <p>
                <?php echo $_SESSION['error_stock']; ?>
            </p>
        </div>
        <?php unset($_SESSION['error_stock']); ?>
    <?php endif; ?>

    <div class="grid md:grid-cols-2 grid-cols-1 gap-8">

        <div class="w-full">
            <swiper-container class="h-[470px]" style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                loop="true" space-between="10" navigation="true">
                <?php
                foreach ($image_urls as $image) {
                    ?>
                    <swiper-slide class="h-full">
                        <img class="w-full h-full object-cover rounded-lg" src="./<?php echo $image_path . $image ?>" />
                    </swiper-slide>
                    <?php
                }
                ?>
            </swiper-container>

        </div>

        <form id="add-to-cart-form" class="flex flex-col space-y-4" action="index.php?act=addtocart" method="post">
            <h3 class="text-xl font-medium"><?php echo $name ?></h3>

            <div>

                <div class="grid md:grid-cols-2 grid-cols-1 gap-2 ">
                    <?php
                    $variantDataJson = json_encode($variants);
                    foreach ($variants as $key => $variant) {
                        $discountPrice = floatval($variant['price']) - (floatval($variant['price']) * floatval($discount)) / 100;
                        ?>
                        <label for="variant_<?php echo $variant['variant_id'] ?>"
                            class="flex p-3 w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <input type="radio" <?php echo $key === 0 ? "checked" : "" ?> onchange="updateButtonState()"
                                name="variant_id" value="<?php echo $variant['variant_id'] ?>"
                                id="variant_<?php echo $variant['variant_id'] ?>"
                                class=" shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                            <div class="text-sm text-gray-500 ms-3 dark:text-gray-400">
                                <p class="text-sm"><?php echo $variant['variant_name'] ?></p>
                                <p class="text-sm font-bold mt-4"><span
                                        class="text-neutral-300 line-through text-xs mr-2">$<?php echo $variant['price'] ?></span>$<?php echo $discountPrice ?>
                                </p>
                            </div>

                        </label>

                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class="w-full rounded-md border relative">
                <div class="absolute w-full h-[40px] top-0 bg-violet-500 rounded-md flex items-center px-3 text-white">
                    <i class="bi bi-gift mr-3"></i>

                    Promotion

                </div>
                <div class="mt-[40px] p-4 text-sm">
                    <ul>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-violet-600 mr-2"></i>Additional discount
                            of up to 1% for Smember members (applies depending on product)</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-violet-600 mr-2"></i>Additional 5%
                            discount up to 200,000 VND when paying via Kredivo</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-violet-600 mr-2"></i>Get YouTube Premium
                            offer for Samsung Galaxy owners now</li>
                    </ul>

                </div>

            </div>
            <p class="text-sm text-neutral-500 uppercase">Category: <span
                    class="font-semibold text-slate-900"><?php echo $category_name ?></span></p>

            <p class="text-sm text-neutral-500 uppercase">Brand: <span
                    class="font-semibold text-slate-900"><?php echo $brand_name ?></span></p>

            <div class="product-quantity-wrapper flex items-center space-x-1 text-sm">
                <!-- Sẽ được cập nhật bởi JavaScript -->
            </div>

            <div class="variant-stock" data-stock=""></div>
            <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
            <input type="hidden" name="name" value="<?php echo $name ?>">
            <input type="hidden" name="discount" value="<?php echo $discount ?>">

            <input type="hidden" name="image_url" value="<?php echo $image_urls[0] ?>">

            <div class="flex items-center space-x-3">

                <p class="font-semibold">Quantity:</p>

                <span
                    class="descrease-cart-qty btn btn-square btn-sm rounded-full btn-outline cursor-pointer font-bold text-xl">-</span>
                <input id="cart-qty-input" type="number" min=1 value="1" name="quantity" class="form-input w-[80px] ">
                <span
                    class="inscrease-cart-qty btn btn-square btn-sm rounded-full btn-outline cursor-pointer font-bold text-xl">+</span>
            </div>
            <button id="submit-add-to-cart-btn"
                class="add-to-cart-btn btn mt-6 bg-slate-700 hover:bg-slate-800 text-white w-full rounded-full"
                type="submit" name="add-to-cart">Add to cart</button>
        </form>

    </div>
    <hr class="my-10">

    <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">

        <!-- Product Description -->
        <div class="w-full mt-10 border rounded-md px-6 p-8">
            <h3 class="font-medium mb-4 text-xl">Products descriptions</h3>
            <div class="product-description text-sm h-[600px] overflow-y-auto styled-scrollbar">
                <?php echo $description ?>
            </div>
        </div>

        <!-- Product Comments -->
        <div class="w-full mt-10 border rounded-md px-6 p-8">
            <h3 class="font-medium text-xl">Comments</h3>
            <p class="text-sm text-neutral-400 mb-8">Please ask questions, someone will help you answer</p>
            <hr class="my-6 w-full h-1">
            <div class="product-description text-sm">
                <?php include 'comment/comment.php' ?>
            </div>
        </div>
    </div>

</div>


<script>
    // Variables toàn cục
    let addToCartForm;
    let initialSubmitBtn;
    let allVariants;

    // Function cập nhật trạng thái button dựa trên variant được chọn
    function updateButtonState() {
        const selectedRadio = document.querySelector('input[name=variant_id]:checked');
        if (!selectedRadio || !initialSubmitBtn || !allVariants) return;

        const selectedVariantId = selectedRadio.value;
        const selectedVariant = allVariants.find(v => v.variant_id == selectedVariantId);

        const wrapper = document.querySelector('.product-quantity-wrapper');
        const variantStock = document.querySelector('.variant-stock');
        const qtyInput = document.getElementById('cart-qty-input');

        if (!wrapper || !variantStock) {
            return;
        }

        if (selectedVariant && selectedVariant.quantity > 0) {
            wrapper.innerHTML = `
                <p class="product-quantity text-violet-700 mr-2">${selectedVariant.quantity}</p>
                <p class="text-violet-700">In Stock <i class="bi bi-check"></i></p>
            `;
            variantStock.dataset.stock = selectedVariant.quantity;
            initialSubmitBtn.disabled = false;
            initialSubmitBtn.classList.remove('btn-disabled');
            if (qtyInput) qtyInput.disabled = false;
        } else {
            wrapper.innerHTML = `<p class="text-red-700">Hết hàng - Out of Stock <i class="bi bi-emoji-expressionless"></i></p>`;
            variantStock.dataset.stock = selectedVariant ? selectedVariant.quantity : 0;
            initialSubmitBtn.disabled = true;
            initialSubmitBtn.classList.add('btn-disabled');
            if (qtyInput) qtyInput.disabled = true;
        }
    }

    // Backward compatibility
    function handlerChangeInput(variants) {
        updateButtonState();
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Khởi tạo biến toàn cục
        addToCartForm = document.getElementById('add-to-cart-form');
        initialSubmitBtn = document.getElementById('submit-add-to-cart-btn');
        allVariants = <?php echo json_encode($variants); ?>;

        // Kiểm tra trạng thái ban đầu
        updateButtonState();

        // Lắng nghe thay đổi variant
        const variantRadios = document.querySelectorAll('input[name=variant_id]');
        variantRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                updateButtonState();
            });
        });

        // ✅ Thêm handler cho nút +/-
        const increaseBtn = document.querySelector('.inscrease-cart-qty');
        const decreaseBtn = document.querySelector('.descrease-cart-qty');
        const qtyInput = document.getElementById('cart-qty-input');

        if (increaseBtn) {
            increaseBtn.addEventListener('click', () => {
                const currentQty = parseInt(qtyInput.value) || 1;
                const selectedVariantId = document.querySelector('input[name=variant_id]:checked').value;
                const selectedVariant = allVariants.find(v => v.variant_id == selectedVariantId);
                const maxQty = selectedVariant ? selectedVariant.quantity : 0;

                if (maxQty <= 0) return;

                const newQty = currentQty + 1;
                if (newQty > maxQty) {
                    alert('The quantity purchased is too much so it must remain in stock');
                } else {
                    qtyInput.value = newQty;
                }
            });
        }

        if (decreaseBtn) {
            decreaseBtn.addEventListener('click', () => {
                const currentQty = parseInt(qtyInput.value) || 1;
                if (currentQty > 1) {
                    qtyInput.value = currentQty - 1;
                }
            });
        }

        // Validation trước khi submit
        if (addToCartForm) {
            addToCartForm.addEventListener('submit', function (e) {
                const selectedVariantId = document.querySelector('input[name=variant_id]:checked').value;
                const currentVariant = allVariants.find(variant => variant.variant_id == selectedVariantId);
                const qtyInput = document.getElementById('cart-qty-input');
                const requestedQty = qtyInput ? Number(qtyInput.value) : 1;

                if (!currentVariant || currentVariant.quantity <= 0) {
                    e.preventDefault();
                    alert('Sản phẩm này đã hết hàng - This product is out of stock!');
                    return false;
                }

                if (requestedQty > currentVariant.quantity) {
                    e.preventDefault();
                    alert('Số lượng vượt quá hàng trong kho - Only ' + currentVariant.quantity + ' items available!');
                    return false;
                }
            });
        }
    });
</script>