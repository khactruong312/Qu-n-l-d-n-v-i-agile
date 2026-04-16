<div class="animate__animated animate__zoomIn animate__faster min-h-screen h-full">
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5 px-2">
        <div>
            <h4 class="font-semibold text-3xl">Add Category</h4>
            <p class="text-neutral-500 mt-1">Create a new category for products</p>
        </div>
    </div>
    <div class="py-10">
        <form action="" method="post" enctype="multipart/form-data" class="space-y-6">
            <div class="preview-image mb-4">
                <img id="preview-img" class="w-[150px] h-[150px] object-cover rounded-md hidden" alt="Preview">
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-semibold" for="image_url">Upload image</label>
                <input class="image-upload p-2 bg-neutral-100 rounded-md cursor-pointer" id="image_url" name="image_url"
                    type="file">
                <?php echo !empty($error['image_url']) ? '<span class="text-red-500 text-sm">' . $error['image_url'] . '</span>' : '' ?>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Category name</label>
                    <input type="text" class="form-input rounded text-slate-900" name="name" id="name"
                        placeholder="Example: Electronics"
                        value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" />
                    <?php echo !empty($error['name']) ? '<span class="text-red-500 text-sm">' . $error['name'] . '</span>' : '' ?>
                </div>
            </div>
            <div class="flex flex-col space-y-2 w-full">
                <label for="description" class="font-semibold">Description</label>
                <textarea class="form-textarea rounded text-slate-900 h-32" name="description" id="description"
                    placeholder="Enter category description"><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '' ?></textarea>
                <?php echo !empty($error['description']) ? '<span class="text-red-500 text-sm">' . $error['description'] . '</span>' : '' ?>
            </div>
            <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5"
                type="submit" name="add_category">Add category</button>
        </form>
    </div>
</div>

<script>
    const imageUpload = document.querySelector('.image-upload');
    const previewImg = document.querySelector('#preview-img');

    imageUpload.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>