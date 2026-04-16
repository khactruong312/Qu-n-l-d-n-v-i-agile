<?php
$old = [
    'title' => $_POST['title'] ?? '',
    'subtitle' => $_POST['subtitle'] ?? ''
];
?>

<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div>
            <h4 class="font-semibold text-3xl">Add billboards</h4>
            <p class="text-neutral-500 mt-1">Add new billboard</p>
        </div>
    </div>

    <div class="py-10">

        <form action="" method="post" enctype="multipart/form-data">

            <!-- IMAGE PREVIEW -->
            <div class="preview-image mb-4"></div>

            <!-- IMAGE INPUT -->
            <div class="flex flex-col space-y-2 w-full md:w-2/3 mb-6">
                <label class="font-semibold">Upload image</label>

                <input class="image-upload p-2 bg-neutral-100 rounded-md cursor-pointer"
                       name="image_url"
                       type="file">

                <?php if (!empty($error['image_url'])): ?>
                    <span class="text-red-500 text-sm"><?= $error['image_url'] ?></span>
                <?php endif; ?>
            </div>

            <!-- TITLE + SUBTITLE -->
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">

                <div class="flex flex-col space-y-2">
                    <label class="font-semibold">Title</label>

                    <input type="text"
                           name="title"
                           class="form-input rounded text-slate-900"
                           value="<?= htmlspecialchars($old['title']) ?>"
                           placeholder="Example: welcome halloween">

                    <?php if (!empty($error['title'])): ?>
                        <span class="text-red-500 text-sm"><?= $error['title'] ?></span>
                    <?php endif; ?>
                </div>

                <div class="flex flex-col space-y-2">
                    <label class="font-semibold">Subtitle</label>

                    <input type="text"
                           name="subtitle"
                           class="form-input rounded text-slate-900"
                           value="<?= htmlspecialchars($old['subtitle']) ?>">

                    <?php if (!empty($error['subtitle'])): ?>
                        <span class="text-red-500 text-sm"><?= $error['subtitle'] ?></span>
                    <?php endif; ?>
                </div>

            </div>

            <!-- BUTTON -->
            <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5"
                    type="submit"
                    name="add_billboard">
                Add billboard
            </button>

        </form>

    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {

    const imageUpload = document.querySelector('.image-upload');
    const previewContainer = document.querySelector('.preview-image');

    if (!imageUpload || !previewContainer) return;

    imageUpload.addEventListener('change', function () {

        previewContainer.innerHTML = "";

        for (const file of this.files) {

            const reader = new FileReader();
            const img = document.createElement("img");

            img.className = "w-[150px] h-[150px] object-cover rounded";

            reader.onload = function (e) {
                img.src = e.target.result;
            };

            reader.readAsDataURL(file);
            previewContainer.appendChild(img);
        }
    });

});
</script>