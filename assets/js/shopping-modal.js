function initModalEventListeners() {
    const inscreaseQtyBtn = document.querySelector('.inscrease-cart-qty');
    const decreaseQtyBtn = document.querySelector('.descrease-cart-qty');
    const cartQtyInput = document.getElementById('cart-qty-input');
    const currentVariantStock = document.querySelector('.variant-stock');

    if (
        inscreaseQtyBtn &&
        decreaseQtyBtn &&
        cartQtyInput &&
        currentVariantStock
    ) {
        inscreaseQtyBtn.addEventListener('click', () => {
            const currentVariantStockValue = Number(
                currentVariantStock.dataset.stock,
            );
            // Không cho tăng nếu hàng hết
            if (currentVariantStockValue <= 0) {
                return;
            }
            const newQuantity = parseInt(cartQtyInput.value) + 1;
            if (newQuantity > currentVariantStockValue) {
                alert(
                    'The quantity purchased is too much so it must remain in stock',
                );
            } else {
                cartQtyInput.value = newQuantity;
            }
        });

        decreaseQtyBtn.addEventListener('click', () => {
            if (parseInt(cartQtyInput.value) > 1) {
                let qty = parseInt(cartQtyInput.value) - 1;
                cartQtyInput.value = qty;
            } else {
                alert('quantity must be more than one');
            }
        });
        cartQtyInput.onchange = () => {
            const currentVariantStockValue = Number(
                currentVariantStock.dataset.stock,
            );
            const inputQuantity = parseInt(cartQtyInput.value) || 1;
            if (inputQuantity > currentVariantStockValue) {
                alert(
                    'The quantity purchased is too much so it must remain in stock',
                );
                cartQtyInput.value = 1;
            } else if (inputQuantity < 1) {
                cartQtyInput.value = 1;
            }
        };
    }
}

function openModal(product, variants) {
    const productImages = product.image_urls.split(',');

    document.getElementById('modalOverlay').style.display = 'flex';
    document.getElementById('modal__product-name').innerText = product.name;

    const renderVariant = variants
        .map((variant, index) => {
            return `
        <label for="variant_${
            variant.variant_id
        }" class="flex p-3 w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
            <input onchange='handleModalVariantChange(${JSON.stringify(variants)})' type="radio" name="variant_id" id="variant_${
                variant.variant_id
            }" ${index === 0 ? 'checked' : ''} value="${
                variant.variant_id
            }" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
            <div class="text-sm text-gray-500 ms-3 dark:text-gray-400">
                <p class="text-sm">${variant.variant_name}</p>
                <p class="text-sm font-bold mt-4"><span class="text-xs">(-${
                    product.discount
                }%)$</span>${
                    Number(variant.price) -
                    (Number(variant.price) * Number(product.discount)) / 100
                }</p>
            </div>
        </label>`;
        })
        .join('');

    document.getElementById('modal__product-variant').innerHTML =
        `<div class="grid md:grid-cols-2 grid-cols-1 gap-2 mb-6">${renderVariant}</div>`;

    document.getElementById('modal__product-image').src =
        `./upload/${productImages[0]}`;

    const divElm = document.createElement('div');
    divElm.innerHTML = `
        <input type="hidden" name="product_id" value="${product.product_id}">
        <input type="hidden" name="name" value="${product.name}">
        <input type="hidden" name="discount" value="${product.discount}">
        <input type="hidden" name="image_url" value="${productImages[0]}">
    `;
    const form = document.getElementById('add-to-cart-form');
    // Xóa input hidden cũ nếu có
    form.querySelectorAll('input[type="hidden"]').forEach((inp) =>
        inp.remove(),
    );
    form.prepend(divElm);

    // ✅ Reset quantity input về 1 mỗi khi mở modal
    document.getElementById('cart-qty-input').value = '1';

    // ✅ Update button state dựa trên variant được chọn
    updateModalButtonState(variants);

    // ✅ Initialize event listeners cho modal elements
    setTimeout(() => {
        initModalEventListeners();
    }, 100);

    // ✅ Add form submit validation
    form.onsubmit = function (e) {
        const selectedVariantId = document.querySelector(
            'input[name=variant_id]:checked',
        ).value;
        const selectedVariant = variants.find(
            (v) => v.variant_id == selectedVariantId,
        );
        const requestedQty = Number(
            document.getElementById('cart-qty-input').value,
        );

        if (!selectedVariant || selectedVariant.quantity <= 0) {
            e.preventDefault();
            alert('Sản phẩm này đã hết hàng - This product is out of stock!');
            return false;
        }

        if (requestedQty > selectedVariant.quantity) {
            e.preventDefault();
            alert(
                'Số lượng vượt quá hàng trong kho - Only ' +
                    selectedVariant.quantity +
                    ' items available!',
            );
            return false;
        }
    };
}

function updateModalButtonState(variants) {
    const selectedVariantId = document.querySelector(
        'input[name=variant_id]:checked',
    ).value;
    const selectedVariant = variants.find(
        (v) => v.variant_id == selectedVariantId,
    );
    const addBtn = document.querySelector('.add-to-cart-btn');
    const qtyInput = document.getElementById('cart-qty-input');
    const variantStockDiv = document.querySelector('.variant-stock');
    const increaseBtn = document.querySelector('.inscrease-cart-qty');
    const decreaseBtn = document.querySelector('.descrease-cart-qty');

    if (selectedVariant && selectedVariant.quantity > 0) {
        document.querySelector('.product-quantity-wrapper').innerHTML = `
            <p class="product-quantity text-violet-700 mr-2">${selectedVariant.quantity}</p>
            <p class="text-violet-700">In Stock <i class="bi bi-check"></i></p>
        `;
        variantStockDiv.dataset.stock = selectedVariant.quantity;
        addBtn.disabled = false;
        addBtn.classList.remove('btn-disabled');
        qtyInput.disabled = false;
        if (increaseBtn) increaseBtn.disabled = false;
        if (decreaseBtn) decreaseBtn.disabled = false;
    } else {
        document.querySelector('.product-quantity-wrapper').innerHTML = `
            <p class="text-red-700">Hết hàng - Out of Stock <i class="bi bi-emoji-expressionless"></i></p>
        `;
        variantStockDiv.dataset.stock = selectedVariant
            ? selectedVariant.quantity
            : 0;
        addBtn.disabled = true;
        addBtn.classList.add('btn-disabled');
        qtyInput.disabled = true;
        if (increaseBtn) increaseBtn.disabled = true;
        if (decreaseBtn) decreaseBtn.disabled = true;
    }
}

function handleModalVariantChange(variants) {
    updateModalButtonState(variants);
}

function handlerChangeInput(variants) {
    const selectedInput = document.querySelector(
        'input[name=variant_id]:checked',
    ).value;
    const currentVariant = variants.find(
        (variant) => variant.variant_id === selectedInput,
    );
    const addBtn = document.querySelector('.add-to-cart-btn');

    if (Number(currentVariant.quantity) > 0) {
        document.querySelector('.product-quantity-wrapper').innerHTML = `
        <p class="product-quantity text-violet-700 mr-2">${currentVariant.quantity}</p>
            <p class="text-violet-700">In Stock <i class="bi bi-check"></i></p>
        `;
        addBtn.classList.remove('btn-disabled');
        addBtn.disabled = false;
    } else {
        document.querySelector('.product-quantity-wrapper').innerHTML =
            `<p class="text-red-700">Hết hàng - Out of Stock <i class="bi bi-emoji-expressionless"></i></p>`;
        addBtn.classList.add('btn-disabled');
        addBtn.disabled = true;
    }
    document.querySelector('.variant-stock').dataset.stock =
        currentVariant.quantity;
}

function closeModal() {
    document.getElementById('modalOverlay').style.display = 'none';
}
