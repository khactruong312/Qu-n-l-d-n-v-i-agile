<div class="animate__animated animate__zoomIn animate__faster">
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div>
            <h4 class="font-semibold text-3xl ">Categories</h4>
            <p class="text-neutral-500 mt-1">List of the category</p>
        </div>
        <a class="btn md:btn-md btn-sm  rounded-full bg-slate-700 hover:bg-slate-900 text-white  "
            href="index.php?act=add_category">
            <p class="capitalize">Add new category</p>
            <i class="bi bi-plus-circle text-xl"></i>
        </a>
    </div>
    <?php
    if (count($list_category) > 0) {
        ?>
        <div class="w-full h-full mt-5 border border-neutral-200">
            <table class="table lg:table-lg md:table-md sm:table-sm table-xs">
                <!-- head -->
                <thead class="bg-slate-700 text-white text-base">
                    <tr>
<<<<<<< HEAD
                        <th>ID</th>
                        <th>Image</th>
=======
                        <th>STT</th>
>>>>>>> 89eefd2ef4a47f8bb08fa836d715773661267d71
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    foreach ($list_category as $category) {
<<<<<<< HEAD
                        extract($category);
                        if (!empty($parent_id)) {
                            $parent_category = getone_category($parent_id);
                        }
                        ?>
                        <tr>
                            <th><?php echo $category_id ?></th>
                            <td>
                                <img src="../<?php echo $image_path . $image_url; ?>" alt="<?php echo $name ?>"
                                    class="w-12 h-12 object-cover rounded">
                            </td>
                            <td class="font-semibold"><?php echo $name ?></td>
                            <td>
                                <p class="line-clamp-1"><?php echo $description ?></p>
                            </td>
                            <td>
                                <?php echo isset($parent_category) ? $parent_category['name'] : "NULL" ?></p>
                            </td>
                            <td>
                                <div class="dropdown dropdown-bottom dropdown-end">
                                    <label tabindex="0" class="cursor-pointer m-1">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </label>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                                        <li><a class=" font-semibold"
                                                href="index.php?act=update_category&category_id=<?php echo $category_id ?>"><i
                                                    class="bi bi-pencil"></i> Update</a></li>
                                        <li>
                                            <a class=" font-semibold"
                                                href="index.php?act=delete_category&category_id=<?php echo $category_id ?>"
                                                onclick="confirmDelete(this.href); return false;"> <i
                                                    class="bi bi-trash3"></i>Remove </a>
                                        </li>
                                    </ul>
                                </div>
=======
                    ?>
                        <tr>
                            <td><?php echo $index++; ?></td>
                            <td class="font-semibold"><?php echo $category['name'] ?></td>
                            <td class="space-x-2">
                                <a class="btn btn-sm btn-outline" href="index.php?act=update_category&category_id=<?php echo $category['category_id'] ?>">
                                    <i class="bi bi-pencil"></i> Update
                                </a>
                                <a class="btn btn-sm btn-error text-white" href="index.php?act=delete_category&category_id=<?php echo $category['category_id'] ?>" onclick="confirmDelete(this.href); return false;">
                                    <i class="bi bi-trash3"></i> Remove
                                </a>
>>>>>>> 89eefd2ef4a47f8bb08fa836d715773661267d71
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        ?>
        <div class="w-full text-center py-10">No category created! Create now!</div>
        <?php
    }
    ?>

</div>