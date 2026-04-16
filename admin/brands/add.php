<?php
$old = [
    'name' => $_POST['name'] ?? '',
    'description' => $_POST['description'] ?? ''
];
?>

<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div>
            <h4 class="font-semibold text-3xl">Add brands</h4>
            <p class="text-neutral-500 mt-1">Add new brand</p>
        </div>
    </div>

    <div class="py-10">

        <form action="" method="post" enctype="multipart/form-data">

            <!-- GRID -->
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">

                <!-- NAME -->
                <div class="flex flex-col space-y-2">
                    <label class="font-semibold">Name</label>

                    <input type="text"
                           name="name"
                           id="name"
                           class="form-input text-slate-900"
                           placeholder="Example: Gucci"
                           value="<?= htmlspecialchars($old['name']) ?>">

                    <?php if (!empty($error['name'])): ?>
                        <span class="text-red-500 text-sm"><?= $error['name'] ?></span>
                    <?php endif; ?>
                </div>

                <!-- DESCRIPTION -->
                <div class="flex flex-col space-y-2">
                    <label class="font-semibold">Description</label>

                    <textarea name="description"
                              id="description"
                              class="textarea textarea-bordered border-2 border-neutral-600"
                              placeholder="Bio"><?= htmlspecialchars($old['description']) ?></textarea>

                    <?php if (!empty($error['description'])): ?>
                        <span class="text-red-500 text-sm"><?= $error['description'] ?></span>
                    <?php endif; ?>
                </div>

            </div>

            <!-- BUTTON -->
            <button class="btn md:btn-md btn-sm capitalize bg-slate-700 hover:bg-slate-900 text-white mt-5"
                    type="submit"
                    name="add_brand">
                Add brand
            </button>

        </form>

    </div>
</div>