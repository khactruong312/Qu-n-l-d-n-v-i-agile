<div class="flex flex-col">
    <form id="form-price" action="" method="post">
        <!-- Keyword -->
        <div class="w-full mb-4">
            <input type="text" name="keyword" placeholder="Search something..." class="w-full rounded-md"
                   value="<?= isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword']) : '' ?>">
        </div>

        <!-- Price -->
        <div class="grid grid-cols-2 gap-x-3">
            <div>
                <label for="min-price" class="text">Min price</label>
                <input class="form-input rounded-md mt-2 w-full" 
                       type="number" min=1 max=4999 name="min-price" id="min-price"
                       value="<?= isset($_POST['min-price']) ? htmlspecialchars($_POST['min-price']) : '' ?>">
            </div>
            <div>
                <label for="max-price" class="text">Max price</label>
                <input class="form-input rounded-md mt-2 w-full" 
                       type="number" min=1 max=4999 name="max-price" id="max-price"
                       value="<?= isset($_POST['max-price']) ? htmlspecialchars($_POST['max-price']) : '' ?>">
            </div>
        </div>

        <?php 
        if(!empty($price_error)){
            echo '<span class="text-red-500 text-sm">' . $price_error . '</span>';
        } 
        ?>

        <button type="submit" name="filter" class="btn bg-slate-700 hover:bg-slate-800 text-white mt-5 rounded-md w-full">Apply</button>
    </form>
</div>

<!-- Categories -->
<div class="flex flex-col pt-6">
    <h3 class="font-semibold text-lg">Categories</h3>
    <ul class="flex flex-col space-y-4 mt-4">
        <li>
            <a href="index.php?act=shop&category_id=all" 
               class="flex items-center justify-between text-sm cursor-pointer hover:text-violet-700
               <?= (isset($_GET['category_id']) && $_GET['category_id'] == 'all') ? 'font-bold text-violet-700' : '' ?>">
                All
            </a>
        </li>
        <?php foreach ($product_in_categorys as $item): ?>
            <li>
                <a href="index.php?act=shop&category_id=<?= $item['category_id'] ?>" 
                   class="flex items-center justify-between text-sm cursor-pointer hover:text-violet-700
                   <?= (isset($_GET['category_id']) && $_GET['category_id'] == $item['category_id']) ? 'font-bold text-violet-700' : '' ?>">
                    <span><?= $item['category_name'] ?></span>
                    <span><?= $item['product_count'] ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<!-- Brands -->
<div class="flex flex-col pt-6">
    <h3 class="font-semibold text-lg">Brands</h3>
    <ul class="flex flex-col space-y-4 mt-4">
        <?php foreach ($brands as $brand): ?>
            <li>
                <a href="index.php?act=shop&brand_id=<?= $brand['brand_id'] ?>" 
                   class="text-sm cursor-pointer hover:text-violet-700
                   <?= (isset($_GET['brand_id']) && $_GET['brand_id'] == $brand['brand_id']) ? 'font-bold text-violet-700' : '' ?>">
                    <span><?= $brand['name'] ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>