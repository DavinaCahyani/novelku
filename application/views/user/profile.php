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
        <div id="page1" class="tab-content p-5 ">
            <div class="bg-white p-3 rounded-lg">
                <h2 class="text-3xl font-bold text-indigo-600 mb-6">User Profile</h2>
                <div class="grid grid-cols-2 border-b-4 p-5">
                    <div>
                        <p class="text-gray-700 mb-1 mt-3 text-lg"><strong>Username</strong></p>
                    </div>
                    <div>
                        <p class="text-md font-bold text-gray-900 mt-3 text-lg"><?php echo $user->username; ?></p>
                    </div>
                </div>
                <div class="grid grid-cols-2 border-b-4 p-5">
                    <div>
                        <p class="text-gray-700 mb-1 mt-3 text-lg"><strong>Email</strong></p>
                    </div>
                    <div>
                        <p class="text-md font-bold text-gray-900 mt-3 text-lg"><?php echo $user->email; ?></p>
                    </div>
                </div>
                <div class="grid grid-cols-2 border-b-4 p-5">
                    <div>
                        <p class="text-gray-700 mb-1 mt-3 text-lg"><strong>Tingkatan</strong></p>
                    </div>
                    <div>
                        <p class="text-md font-bold text-gray-900 mt-3 text-lg"><?php echo $user->tingkatan; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="page2" class="tab-content">
            <div class="p-3">
                <div class="grid grid-cols-2 gap-5">
                    <div class="p-8 rounded-lg bg-white">
                        <form action="<?php echo base_url('user/aksi_image') ?>" enctype="multipart/form-data"
                            method="post">
                            <div class="row">
                                <h5>Ubah Foto Profil</h5>
                                <hr>
                                <div class="mb-3 px-5 col-md-12 image-container">
                                    <img class="rounded-circle"
                                        src="<?php echo base_url('images/user/'.$user->image) ?>" width="150" />
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
                        </form>
                    </div>
                    <div class="p-8 rounded-lg bg-white">
                        <h2 class="block text-gray-700 mb-2 text-xl">Ubah Data User</h2>
                        <form action="<?php echo base_url('user/aksi_ubah_profil') ?>" enctype="multipart/form-data"
                            method="post">
                            <div class="mt-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input value="<?php echo $user->email; ?>"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="email" id="email" type="text" placeholder="Email">
                            </div>
                            <div class="mt-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Username
                                </label>
                                <input value="<?php echo $user->username; ?>"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="username" id="username" type="text" placeholder="username">
                            </div>
                            <div class="mt-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                                    Nama
                                </label>
                                <input value="<?php echo $user->nama; ?>"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="nama" id="nama" type="text" placeholder="nama">
                            </div>
                            <div class="mt-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                                    Gender
                                </label>

                                <div class="flex items-center">
                                    <input class="mr-2 leading-tight focus:outline-none focus:shadow-outline"
                                        name="gender" id="male" type="radio" value="Laki-laki"
                                        <?php echo ($user->gender === 'Laki-laki') ? 'checked' : ''; ?>>
                                    <label class="text-sm" for="male">
                                        Laki-laki
                                    </label>

                                    <input class="ml-4 mr-2 leading-tight focus:outline-none focus:shadow-outline"
                                        name="gender" id="female" type="radio" value="Perempuan"
                                        <?php echo ($user->gender === 'Perempuan') ? 'checked' : ''; ?>>
                                    <label class="text-sm" for="female">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-5 py-3 mt-6">Ubah</button>
                        </form>

                        <div class="mb-3 col-md-12">
                            <form action="<?php echo base_url('user/aksi_ubah_password') ?>"
                                enctype="multipart/form-data" method="post">
                                <div class="mt-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_lama">
                                        Password lama
                                    </label>
                                    <div class="relative">
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            name="password_lama" id="password_lama" type="password"
                                            placeholder="Password lama">
                                        <span
                                            class="absolute right-0 top-0 mt-2 mr-4 cursor-pointer text-gray-600 hover:text-gray-900"
                                            id="togglePassword_lama">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_baru">
                                        Password baru
                                    </label>
                                    <div class="relative">
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            name="password_baru" id="password_baru" type="password"
                                            placeholder="Password baru">
                                        <span
                                            class="absolute right-0 top-0 mt-2 mr-4 cursor-pointer text-gray-600 hover:text-gray-900"
                                            id="togglePassword_baru">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="konfirmasi_password">
                                        Konfirmasi password
                                    </label>
                                    <div class="relative">
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            name="konfirmasi_password" id="konfirmasi_password" type="password"
                                            placeholder="Konfirmasi Password">
                                        <span
                                            class="absolute right-0 top-0 mt-2 mr-4 cursor-pointer text-gray-600 hover:text-gray-900"
                                            id="togglePassword_konfirmasi">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="w-full bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-5 py-3 mt-6">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <div id="page3" class="tab-content">
            <div class="bg-white p-4 md:p-16 md:flex-row shadow-lg max-w-full w-full">
                <div class="mb-8 mx-4 text-center">
                    <a href="<?php echo base_url('user/upload_cerita'); ?>"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Mulai Menulis
                    </a>
                </div>

                <div class="mb-8 mx-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <?php foreach ($cerita_novel as $cerita) : ?>
                        <!-- Buku 1 -->
                        <div class="card w-full md:w-full flex justify-center">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-slate-50">
                                <img class="w-full h-auto mx-auto mt-6 rounded-lg"
                                    src="<?php echo base_url('images/cerita/'.$cerita->image) ?>" alt="Gambar Buku">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2"><?php echo $cerita->judul ?></div>
                                    <p class="text-gray-700 text-base">
                                        <?php echo $cerita->penulis ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>

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
    const passwordInput_lama = document.getElementById('password_lama');
    const togglePassword_lama = document.getElementById('togglePassword_lama');

    const passwordInput_konfirmasi = document.getElementById('konfirmasi_password');
    const togglePassword_konfirmasi = document.getElementById('togglePassword_konfirmasi');

    const passwordInput_baru = document.getElementById('password_baru');
    const togglePassword_baru = document.getElementById('togglePassword_baru');

    togglePassword_lama.addEventListener('click', () => {
        togglePassword(passwordInput_lama, togglePassword_lama);
    });

    togglePassword_konfirmasi.addEventListener('click', () => {
        togglePassword(passwordInput_konfirmasi, togglePassword_konfirmasi);
    });

    togglePassword_baru.addEventListener('click', () => {
        togglePassword(passwordInput_baru, togglePassword_baru);
    });

    function togglePassword(passwordInput, togglePassword) {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePassword.innerHTML = type === 'password' ? '<i class="fas fa-eye-slash"></i>' :
            '<i class="fas fa-eye"></i>';
    }
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var error_password_lama = "<?php echo $this->session->flashdata('error_password_lama'); ?>";
        if (error_password_lama) {
            Swal.fire({
                icon: 'error',
                title: 'Kata Sandi Lama Salah',
                text: "Silakan masukkan kata sandi lama yang benar.",
                showConfirmButton: false,
                timer: 2000
            });
        }

        var error_konfirmasi_password =
            "<?php echo $this->session->flashdata('error_konfirmasi_password'); ?>";
        if (error_konfirmasi_password) {
            Swal.fire({
                icon: 'error',
                title: 'Konfirmasi Kata Sandi Tidak Cocok',
                text: "Kata sandi baru dan konfirmasi kata sandi harus sama.",
                showConfirmButton: false,
                timer: 2000
            });
        }
    });
    </script>
</body>

</html>