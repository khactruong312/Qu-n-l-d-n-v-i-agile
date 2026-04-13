<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold text-3xl ">Add category</h4>
            <p class="text-neutral-500 mt-1">Add new category</p>
        </div>
    </div>
    <div class="py-10">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="preview-image mb-4"></div>
            <div class="flex flex-col space-y-2 w-full md:w-2/3 mb-6">
                <label class="font-semibold" for="image_url">Upload image</label>
                <input class="image-upload p-2 bg-neutral-100 rounded-md cursor-pointer" id="image_url" name="image_url"
                    type="file">
                <?php echo !empty($error['image_url']) ? '<span class="text-red-500 text-sm">' . $error['image_url'] . '</span>' : "" ?>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Category name</label>
                    <input type="text" class="form-input rounded text-slate-900" name="name" id="name"
                        placeholder="Example: Electronics" />
                    <?php echo !empty($error['name']) ? '<span class="text-red-500 text-sm">' . $error['name'] . '</span>' : "" ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="parent_id" class="font-semibold">Parent category</label>
                    <select class="form-select rounded text-slate-900" name="parent_id" id="parent_id">
                        <option value="">-- No parent --</option>
                        <?php if (count($list_category) > 0): ?>
                            <?php foreach ($list_category as $cat): ?>
                                <option value="<?php echo $cat['category_id']; ?>"><?php echo $cat['name']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 w-full mb-6">
                <label for="description" class="font-semibold">Description</label>
                <textarea class="form-textarea rounded text-slate-900" name="description" id="description"
                    placeholder="Enter category description"></textarea>
                <?php echo !empty($error['description']) ? '<span class="text-red-500 text-sm">' . $error['description'] . '</span>' : "" ?>
            </div>
            <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5"
                type="submit" name="add_category">Add category</button>
        </form>
    </div>
</div>

<script>
    const imageUpload = document.querySelector('.image-upload');
    const previewContainer = document.querySelector('.preview-image')

    imageUpload.addEventListener('change', function () {
        previewContainer.innerHTML = "";
        for (const file of imageUpload.files) {
            if (file) {
                const reader = new FileReader();
                const img = document.createElement("img");
                img.classList.add("product-upload-img");
                reader.onload = function (e) {
                    img.src = e.target.result;
                };

                reader.readAsDataURL(file);
                previewContainer.appendChild(img);
            }
        }
    });
</script>