<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold text-3xl ">Update users</h4>
            <p class="text-neutral-500 mt-1">Update new user</p>
        </div>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="preview-image mt-2">
                <img class="w-[150px] h-[150px] object-cover"
                    src="<?php echo !empty($current_user['image_url']) ? "../" . $image_path . $current_user['image_url'] : '.././assets/img/mock-avatar.svg' ?>"
                    alt="">
            </div>
            <div class="flex flex-col space-y-2 w-1/2 my-6">
                <label class="font-semibold" for="image_url">Upload image</label>
                <input class="image-upload p-2 bg-neutral-100 cursor-pointer" id="image_url" name="image_url"
                    type="file">
                <?php echo !empty($error['image_url']) ? '<span class="text-red-500 text-sm">' . $error['image_url'] . '</span>' : "" ?>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-1 gap-4">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Username</label>
                    <input type="text" class="form-input text-slate-900" name="name" id="name"
                        placeholder="Example: nedd" value="<?php echo $current_user['name'] ?>" />
                    <?php echo !empty($error['name']) ? '<span class="text-red-500 text-sm">' . $error['name'] . '</span>' : "" ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="email" class="font-semibold">Email</label>
                    <input type="email" class="form-input text-slate-900" name="email" id="email"
                        value="<?php echo $current_user['email'] ?>" />
                    <?php echo !empty($error['email']) ? '<span class="text-red-500 text-sm">' . $error['email'] . '</span>' : "" ?>
                </div>

            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="flex flex-col space-y-2">
                    <label for="phone" class="font-semibold">Phone</label>
                    <input type="tel" class="form-input text-slate-900" name="phone" id="phone"
                        value="<?php echo $current_user['phone'] ?>" />
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Roles</label>
                    <select class="px-4 py-[8px]" name="role_id">
                        <option value="">--Select User Account Role--</option>
                        <option value="2" <?php echo $current_user["role_id"] == 2 ? "selected" : "" ?>>User</option>
                        <option value="1" <?php echo $current_user["role_id"] == 1 ? "selected" : "" ?>>Admin</option>
                    </select>
                    <?php echo !empty($error['role_id']) ? '<span class="text-red-500 text-sm">' . $error['role_id'] . '</span>' : "" ?>
                </div>
            </div>
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-x-4 mt-6 ">
                <div class="flex flex-col space-y-2">
                    <label class="font-semibold">Address</label>
                    <div class="flex flex-col md:items-center md:justify-between md:flex-row gap-4">
                        <div>
                            <select class="w-full px-4 lg:w-[200px] md:w-[210px] py-2" id="city"
                                aria-label=".form-select-sm" name="city">
                                <option value="">--Choose City--</option>
                            </select>
                            <?php echo !empty($error['city']) ? '<span class="text-red-500 text-sm">' . $error['city'] . '</span>' : "" ?>
                        </div>
                        <div>
                            <select class="w-full px-4 lg:w-[200px] md:w-[210px] py-2" id="district"
                                aria-label=".form-select-sm" name="district">
                                <option value="">--Choose District--</option>
                            </select>
                            <?php echo !empty($error['district']) ? '<span class="text-red-500 text-sm">' . $error['district'] . '</span>' : "" ?>
                        </div>
                        <div>
                            <select class="w-full px-4 lg:w-[200px] md:w-[210px] py-2" id="ward"
                                aria-label=".form-select-sm" name="ward">
                                <option value="">--Choose Ward--</option>

                            </select>
                            <?php echo !empty($error['ward']) ? '<span class="text-red-500 text-sm">' . $error['ward'] . '</span>' : "" ?>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn md:btn-md btn-sm capitalize bg-slate-700 hover:bg-slate-900 text-white mt-5"
                type="submit" name="update_user">Update user</button>
        </form>
    </div>
</div>





<!-- user image display -->
<script>
    const imageUpload = document.querySelector('.image-upload');
    const previewContainer = document.querySelector('.preview-image')

    imageUpload.addEventListener('change', function() {
        previewContainer.innerHTML = "";
        for (const file of imageUpload.files) {
            if (file) {
                const reader = new FileReader();
                const img = document.createElement("img");
                img.classList.add("product-upload-img");
                reader.onload = function(e) {
                    img.src = e.target.result;
                };

                reader.readAsDataURL(file);
                previewContainer.appendChild(img);
            }
        }
    });
</script>


<!-- select address viet nam -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    let cityId = "<?= $arrayAddress[0] ?? '' ?>";
    let districtId = "<?= $arrayAddress[1] ?? '' ?>";
    let wardId = "<?= $arrayAddress[2] ?? '' ?>";
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        // =========================
        // IMAGE PREVIEW
        // =========================
        const imageUpload = document.querySelector('.image-upload');
        const previewContainer = document.querySelector('.preview-image');

        if (imageUpload && previewContainer) {
            imageUpload.addEventListener('change', function() {

                previewContainer.innerHTML = "";

                for (const file of this.files) {
                    const reader = new FileReader();
                    const img = document.createElement("img");

                    img.className = "w-[150px] h-[150px] object-cover rounded";

                    reader.onload = function(e) {
                        img.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                    previewContainer.appendChild(img);
                }
            });
        }

        // =========================
        // ADDRESS VIETNAM API
        // =========================
        const citis = document.getElementById("city");
        const districts = document.getElementById("district");
        const wards = document.getElementById("ward");

        if (!citis || !districts || !wards) return;

        axios.get("https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json")
            .then(function(response) {
                const data = response.data;
                renderCity(data);
            });

        function renderCity(data) {

            // CITY
            data.forEach(city => {
                citis.add(new Option(
                    city.Name,
                    city.Id,
                    city.Id === cityId,
                    city.Id === cityId
                ));
            });

            // LOAD DISTRICT nếu có cityId
            if (cityId) {
                const city = data.find(c => c.Id === cityId);

                if (city) {
                    city.Districts.forEach(d => {
                        districts.add(new Option(
                            d.Name,
                            d.Id,
                            d.Id === districtId,
                            d.Id === districtId
                        ));
                    });
                }
            }

            // LOAD WARD nếu có districtId
            if (cityId && districtId) {
                const city = data.find(c => c.Id === cityId);
                if (!city) return;

                const district = city.Districts.find(d => d.Id === districtId);
                if (district) {
                    district.Wards.forEach(w => {
                        wards.add(new Option(
                            w.Name,
                            w.Id,
                            w.Id === wardId,
                            w.Id === wardId
                        ));
                    });
                }
            }

            // CHANGE CITY
            citis.onchange = function() {
                districts.length = 1;
                wards.length = 1;

                const city = data.find(c => c.Id === this.value);
                if (!city) return;

                city.Districts.forEach(d => {
                    districts.add(new Option(d.Name, d.Id));
                });
            };

            // CHANGE DISTRICT
            districts.onchange = function() {
                wards.length = 1;

                const city = data.find(c => c.Id === citis.value);
                if (!city) return;

                const district = city.Districts.find(d => d.Id === this.value);
                if (!district) return;

                district.Wards.forEach(w => {
                    wards.add(new Option(w.Name, w.Id));
                });
            };
        }

        // =========================
        // LOAD CITY
        // =========================
        data.forEach(city => {
            citis.add(new Option(city.Name, city.Id));
        });

        // =========================
        // CHANGE CITY -> LOAD DISTRICT
        // =========================
        citis.onchange = function() {

            districts.length = 1;
            wards.length = 1;

            const city = data.find(c => c.Id === this.value);
            if (!city) return;

            city.Districts.forEach(d => {
                districts.add(new Option(d.Name, d.Id));
            });
        };

        // =========================
        // CHANGE DISTRICT -> LOAD WARD
        // =========================
        districts.onchange = function() {

            wards.length = 1;

            const city = data.find(c => c.Id === citis.value);
            if (!city) return;

            const district = city.Districts.find(d => d.Id === this.value);
            if (!district || !district.Wards) return;

            district.Wards.forEach(w => {
                wards.add(new Option(w.Name, w.Id));
            });
        };
    }

    );
</script>