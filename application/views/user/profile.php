<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <?php $this->load->view('style/css'); ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png'); ?>" />
    <style>
    .image-container {
        text-align: center;
    }

    .image-container img {
        display: block;
        margin: 0 auto;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .label-column p,
    .value-column p {
        border-bottom: 1px solid #ccc;
        padding-bottom: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .label-column p:last-child,
    .value-column p:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
    }

    .user-info-container {
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .user-info-container img {
        margin-right: 10px;
        /* Jarak antara gambar dan tulisan */
    }

    .user-text {
        font-size: 1.5rem;
        /* Ukuran font lebih besar */
        font-weight: bold;
        /* Memberikan keberatan teks */
        color: #333;
        /* Warna teks sesuai kebutuhan */
    }

    .username-text {
        font-size: 1rem;
        /* Ukuran font untuk username */
        color: #666;
        /* Warna teks username */
    }

    .input-container {
        position: relative;
    }

    .eye-icon {
        position: absolute;
        right: 10px;
        top: 70%;
        /* Sesuaikan nilai ini */
        transform: translateY(-50%);
        cursor: pointer;
    }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <img src="<?php echo base_url('davina/logo-tipis.png'); ?>" alt="Logo" width="150px">
            <div class="space-x-4">
                <a href="<?php echo base_url(); ?>home" class="text-white">Home</a>
                <a href="<?php echo base_url(); ?>auth" class="text-white">Keluar</a>
            </div>
        </div>
    </nav>

    <!-- Profile Content -->

    <div class="all font-web bg-slate-100 min-h-screen">
        <?php foreach ($auth as $user) : ?>

        <div
            class="bg-[url('https://png.pngtree.com/background/20210716/original/pngtree-white-cloud-watercolor-blue-background-picture-image_1379272.jpg')] h-[80px] bg-no-repeat bg-cover">
        </div>
        <div class="px-10 user-info-container">
            <img src="<?php echo base_url('images/user/' . $user->image); ?>"
                class="rounded-full border-4 border-white -mt-[50px]" alt="Logo" width="160px">
            <p class="user-text">User</p>
            <p class="username-text"><?php echo $user->username; ?></p>
        </div>
        <ul class="grid grid-flow-col text-center border-b border-gray-200 text-gray-500 mt-12">
            <li>
                <a href="#page1"
                    class="flex justify-center border-b-4 border-transparent hover:text-indigo-600 hover:border-indigo-600 py-4">My
                    Profile</a>
            </li>
            <li>
                <a href="#page2"
                    class="flex justify-center border-b-4 border-transparent hover:text-indigo-600 hover:border-indigo-600 py-4">Edit
                    Profile
                </a>
            </li>
            <li>
                <a href="#page3"
                    class="flex justify-center border-b-4 border-transparent hover:text-indigo-600 hover:border-indigo-600 py-4">Cerita
                    Saya</a>
            </li>
        </ul>
        <div id="page1" class="tab-content">
            <div class="p-8">
                <h2 class="text-3xl font-bold text-indigo-600 mb-6">User Profile</h2>

                <div class="grid-container">
                    <!-- Left Column - Label -->
                    <div class="col-span-1 label-column">
                        <div class="mb-2">
                            <p class="text-gray-700 mb-1 mt-3"><strong>Username:</strong></p>
                            <p class="text-gray-700 mb-1 mt-3"><strong>Email:</strong></p>
                            <p class="text-gray-700 mb-1 mt-3"><strong>Tingkatan:</strong></p>
                        </div>
                    </div>

                    <!-- Right Column - Value -->
                    <div class="col-span-1 value-column">
                        <div class="mb-2">
                            <p class="text-md font-bold text-gray-900 mt-3"><?php echo $user->username; ?></p>
                            <p class="text-md font-bold text-gray-900 mt-3"><?php echo $user->email; ?></p>
                            <p class="text-md font-bold text-gray-900 mt-3"><?php echo $user->tingkatan; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="page2" class="tab-content">
            <form action="<?php echo base_url('user/aksi_image') ?>" enctype="multipart/form-data" method="post">
                <div class="grid grid-cols-2 gap-6 mt-10">
                    <!-- Left Column - Photo and Cover Photo -->
                    <div class="col-span-1 px-8 py-5">
                        <!-- Card for Changing Photo -->
                        <div class="row">
                            <h5>Ubah Foto Profil</h5>
                            <hr>
                            <div class="mb-3 px-5 col-md-12 image-container">
                                <img class="rounded-circle" src="<?php echo base_url('images/user/'.$user->image) ?>"
                                    width="150" />
                            </div>
                            <div class="mb-3 px-3 col-md-12">
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <div class="mb-3 px-3 col-md-12">
                                <h5>Preview Image : </h5>
                            </div>
                            <div class="mb-3 px-5 col-md-12 image-container">
                                <img class="rounded-circle" id="preview-image" width="150" />
                            </div>
                            <div class="mb-3 px-3 col-md-12">
                                <button type="submit"
                                    class="w-full bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Ubah</button>
                            </div>
                        </div>
                    </div>
            </form>
            <!-- Right Column - Personal Information -->
            <div class="col-span-1 px-8 py-8">
                <form action="<?php echo base_url('user/aksi_ubah_profil') ?>" enctype="multipart/form-data"
                    method="post">
                    <h2>Informasi Pribadi</h2>
                    <div class="mt-2">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username
                        </label>
                        <input type="text" name="username" id="username" autocomplete="username"
                            value="<?php echo $user->username; ?>"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-1">
                    </div>

                    <div class="mt-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                        </label>
                        <input type="text" name="email" id="email" autocomplete="email"
                            value="<?php echo $user->email; ?>"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-1">
                    </div>
                    <div>
                        <h2>Ubah Password</h2>
                        <div class="mt-2 input-container">
                            <label for="password_lama" class="block text-sm font-medium leading-6 text-gray-900">
                                Password lama
                            </label>
                            <input id="password_lama" name="password_lama" type="password" autocomplete="password_lama"
                                class="flex-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-1">
                            <i class="far fa-eye-slash absolute top-1/2 right-4 transform -translate-y-1/2 text-black-400 cursor-pointer mt-1"
                                id="toggle-password"></i>
                        </div>

                        <div class="mt-2 input-container">
                            <label for="konfirmasi_password" class="block text-sm font-medium leading-6 text-gray-900">
                                Konfirmasi password
                            </label>
                            <input id="konfirmasi_password" name="konfirmasi_password" type="password"
                                autocomplete="konfirmasi_password"
                                class="flex-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-1">
                            <i class="far fa-eye-slash absolute top-1/2 right-4 transform -translate-y-1/2 text-black-400 cursor-pointer mt-1"
                                id="toggle-password"></i>
                        </div>

                        <div class="mt-2 input-container">
                            <label for="password_baru" class="block text-sm font-medium leading-6 text-gray-900">
                                Password baru
                            </label>
                            <input id="password_baru" name="password_baru" type="password" autocomplete="password_baru"
                                class="flex-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-1">
                            <i class="far fa-eye-slash absolute top-1/2 right-4 transform -translate-y-1/2 text-black-400 cursor-pointer mt-1"
                                id="toggle-password"></i>
                        </div>
                        <div class="mb-3 px-3 col-md-12">
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="page3" class="tab-content">Content for Page 3</div>
    <div id="page4" class="tab-content">Content for Page 4</div>
    <div id="page5" class="tab-content">Content for Page 5</div>
    <?php endforeach; ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".grid a").on("click", function(event) {
            event.preventDefault();

            // Hapus kelas 'active' dari semua tab
            $(".grid a").removeClass("active");

            // Tambahkan kelas 'active' ke tab yang diklik
            $(this).addClass("active");

            // Ambil ID tab yang diklik
            var tabId = $(this).attr("href").substring(1);

            // Sembunyikan semua konten tab
            $(".tab-content").removeClass("active");

            // Tampilkan konten tab yang sesuai dengan tab yang diklik
            $("#" + tabId).addClass("active");
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        // Ketika input file berubah
        $('#foto').on('change', function(e) {
            var fileInput = $(this)[0];
            var file = fileInput.files[0];
            var reader = new FileReader();

            // Jika ada file yang dipilih
            if (file) {
                reader.onload = function(e) {
                    // Menampilkan pratinjau gambar
                    $('#preview-image').attr('src', e.target.result);
                    $('#preview-container').show();
                }
                // Membaca data gambar sebagai URL
                reader.readAsDataURL(file);
            } else {
                // Jika tidak ada file yang dipilih, sembunyikan pratinjau
                $('#preview-container').hide();
            }
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('.eye-icon').click(function() {
            var passwordField = $(this).prev('input');
            var passwordToggle = $(this);

            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text');
                passwordToggle.removeClass('far fa-eye-slash').addClass('far fa-eye');
            } else {
                passwordField.attr('type', 'password');
                passwordToggle.removeClass('far fa-eye').addClass('far fa-eye-slash');
            }
        });
    });
    </script>


    <script>
    var error_password_lama = "<?php echo $error_password_lama; ?>";
    if (error_password_lama) {
        Swal.fire({
            icon: 'error',
            title: 'Kata Sandi Lama Salah',
            text: "Silakan masukkan kata sandi lama yang benar.",
            showConfirmButton: false,
            timer: 2000
        });
    }

    var error_konfirmasi_password = "<?php echo $error_konfirmasi_password; ?>";
    if (error_konfirmasi_password) {
        Swal.fire({
            icon: 'error',
            title: 'Konfirmasi Kata Sandi Tidak Cocok',
            text: "Kata sandi baru dan konfirmasi kata sandi harus sama.",
            showConfirmButton: false,
            timer: 2000
        });
    }
    </script>
</body>

</html>