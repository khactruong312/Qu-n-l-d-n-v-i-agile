<?php
$old = [
    'name' => $_POST['name'] ?? '',
    'discount' => $_POST['discount'] ?? '',
    'category_id' => $_POST['category_id'] ?? '',
    'brand_id' => $_POST['brand_id'] ?? '',
    'description' => $_POST['description'] ?? '',
    'is_featured' => $_POST['is_featured'] ?? ''
];
?>

<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div>
            <h4 class="font-semibold text-3xl">Add product</h4>
            <p class="text-neutral-500 mt-1">Add new product</p>
        </div>
    </div>

    <div class="mt-6">

        <form action="" method="post" enctype="multipart/form-data">

            <!-- IMAGES -->
            <div class="preview-image flex items-center space-x-4"></div>

            <div class="flex flex-col space-y-2 my-6 w-1/3">
                <label class="font-medium text-sm">Upload Images</label>

                <input type="file"
                       name="images[]"
                       multiple
                       class="image-upload border border-slate-700 rounded-lg p-3 cursor-pointer">

                <?php if (!empty($error['images'])): ?>
                    <span class="text-red-500 text-xs"><?= $error['images'] ?></span>
                <?php endif; ?>
            </div>

            <!-- BASIC INFO -->
            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4">

                <!-- NAME -->
                <div class="flex flex-col space-y-2">
                    <label>Name</label>
                    <input type="text"
                           name="name"
                           class="form-input rounded text-slate-900"
                           value="<?= htmlspecialchars($old['name']) ?>">

                    <?php if (!empty($error['name'])): ?>
                        <span class="text-red-500 text-xs"><?= $error['name'] ?></span>
                    <?php endif; ?>
                </div>

                <!-- DISCOUNT -->
                <div class="flex flex-col space-y-2">
                    <label>Discount (%)</label>
                    <input type="number"
                           name="discount"
                           min="0"
                           step="0.01"
                           class="form-input rounded text-slate-900"
                           value="<?= htmlspecialchars($old['discount']) ?>">

                    <?php if (!empty($error['discount'])): ?>
                        <span class="text-red-500 text-xs"><?= $error['discount'] ?></span>
                    <?php endif; ?>
                </div>

                <!-- CATEGORY -->
                <div class="flex flex-col space-y-2">
                    <label>Category</label>
                    <select name="category_id" class="px-4 py-[8px] rounded-md">

                        <option value="">--Select category--</option>

                        <?php foreach ($list_category as $category): ?>
                            <option value="<?= $category['category_id'] ?>"
                                <?= $old['category_id'] == $category['category_id'] ? 'selected' : '' ?>>
                                <?= $category['name'] ?>
                            </option>
                        <?php endforeach; ?>

                    </select>

                    <?php if (!empty($error['category_id'])): ?>
                        <span class="text-red-500 text-xs"><?= $error['category_id'] ?></span>
                    <?php endif; ?>
                </div>

                <!-- BRAND -->
                <div class="flex flex-col space-y-2">
                    <label>Brand</label>
                    <select name="brand_id" class="px-4 py-[8px] rounded-md">

                        <option value="">--Select brand--</option>

                        <?php foreach ($list_brand as $brand): ?>
                            <option value="<?= $brand['brand_id'] ?>"
                                <?= $old['brand_id'] == $brand['brand_id'] ? 'selected' : '' ?>>
                                <?= $brand['name'] ?>
                            </option>
                        <?php endforeach; ?>

                    </select>

                    <?php if (!empty($error['brand_id'])): ?>
                        <span class="text-red-500 text-xs"><?= $error['brand_id'] ?></span>
                    <?php endif; ?>
                </div>

            </div>

            <!-- DESCRIPTION -->
            <div class="flex flex-col space-y-2 mt-6 w-full">
                <label>Description</label>

                <textarea name="description" id="description">
<?= htmlspecialchars($old['description']) ?>
                </textarea>

                <?php if (!empty($error['description'])): ?>
                    <span class="text-red-500 text-xs"><?= $error['description'] ?></span>
                <?php endif; ?>
            </div>

            <!-- FEATURED -->
            <div class="flex items-center gap-x-3 mt-5">
                <input type="checkbox"
                       name="is_featured"
                       value="1"
                       <?= !empty($old['is_featured']) ? 'checked' : '' ?>>

                <label class="font-semibold">This product is featured?</label>

                <?php if (!empty($error['is_featured'])): ?>
                    <span class="text-red-500 text-xs"><?= $error['is_featured'] ?></span>
                <?php endif; ?>
            </div>

            <hr class="my-6">

            <!-- VARIANTS -->
            <h5 class="font-semibold text-xl mb-6">Add product variant</h5>

            <div id="variants-container">

                <div class="variant grid md:grid-cols-3 grid-cols-1 gap-4">

                    <div class="flex flex-col space-y-2">
                        <label>Variant Name</label>
                        <input type="text" name="variant_name[]" class="form-input rounded">
                    </div>

                    <div class="flex flex-col space-y-2">
                        <label>Price</label>
                        <input type="number" name="variant_price[]" class="form-input rounded">
                    </div>

                    <div class="flex flex-col space-y-2">
                        <label>Quantity</label>
                        <input type="number" name="variant_quantity[]" class="form-input rounded">
                    </div>

                </div>

            </div>

            <?php if (!empty($error['variant'])): ?>
                <span class="text-red-500 text-xs block my-4"><?= $error['variant'] ?></span>
            <?php endif; ?>

            <div class="flex justify-end mt-6">
                <span class="btn rounded-full btn-sm" onclick="addVariant()">Add new variant</span>
            </div>

            <hr class="my-6">

            <button type="submit"
                    name="add_product"
                    class="btn bg-slate-700 hover:bg-slate-900 text-white rounded-full">
                Add product
            </button>

        </form>

    </div>
</div>

<!-- CKEDITOR -->
<script>
    CKEDITOR.replace('description', {
        width: '100%',
        height: 500
    });
</script>

<!-- IMAGE PREVIEW -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const imageUpload = document.querySelector('.image-upload');
    const previewContainer = document.querySelector('.preview-image');

    if (imageUpload) {
        imageUpload.addEventListener('change', function () {
            previewContainer.innerHTML = "";

            for (const file of this.files) {
                const reader = new FileReader();
                const img = document.createElement("img");

                img.className = "w-[120px] h-[120px] object-cover rounded";

                reader.onload = e => img.src = e.target.result;

                reader.readAsDataURL(file);
                previewContainer.appendChild(img);
            }
        });
    }

});
</script>

<!-- VARIANTS -->
<script>
function addVariant() {
    const container = document.getElementById('variants-container');

    const div = document.createElement('div');
    div.className = "variant grid md:grid-cols-3 grid-cols-1 gap-4 mt-4";

    div.innerHTML = `
        <input type="text" name="variant_name[]" class="form-input rounded" placeholder="Name">
        <input type="number" name="variant_price[]" class="form-input rounded" placeholder="Price">
        <input type="number" name="variant_quantity[]" class="form-input rounded" placeholder="Qty">
    `;

    container.appendChild(div);
}
</script>