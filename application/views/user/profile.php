<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <?php $this->load->view('style/css'); ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png'); ?>" />
    <style>
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
            <form action="">
                <div class="grid grid-cols-2 gap-6 mt-10">
                    <!-- Left Column - Photo and Cover Photo -->
                    <div class="col-span-1 px-8 py-5">
                        <!-- Card for Changing Photo -->
                        <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                        <div class="mt-2 flex items-center gap-x-3">
                            <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <button type="button"
                                class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                        </div>

                        <!-- Card for Updating Cover Photo -->
                        <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900 mt-6">Cover
                            photo</label>
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Personal Information -->
                    <div class="col-span-1 mt-5 px-8 py-8">
                        <h2>Informasi Pribadi</h2>
                        <div class="mt-2">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Username
                            </label>
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-1">
                        </div>

                        <div class="mt-2">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Email
                            </label>
                            <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-1">
                        </div>

                        <div class="mt-2">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Password lama
                            </label>
                            <input id="email" name="email" type="email" autocomplete="email"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-1">
                        </div>

                        <div class="mt-2">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Password baru
                            </label>
                            <input id="email" name="email" type="email" autocomplete="email"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mt-1">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- <div id="page2" class="tab-content">
            <div class="grid grid-cols-2 gap-6 mt-10">
                <div class="col-span-1">
                    <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <button type="button"
                            class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                    </div>
                </div>
                <div class="col-span-1">
                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover
                        photo</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>

                <div class="col-span-1">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                    <div class="mt-2">
                        <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="col-span-1">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                    <div class="mt-2">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="col-span-1">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div id="page3" class="tab-content">Content for Page 3</div>
    <div id="page4" class="tab-content">Content for Page 4</div>
    <div id="page5" class="tab-content">Content for Page 5</div>
    <?php endforeach; ?>

    </div>

    <!-- <div class="container mx-auto my-8 p-8 bg-white shadow-lg rounded-lg">
        <?php foreach ($auth as $user) : ?>
        <div class="md:flex">
            <div class="md:flex-shrink-0">
                <img class="h-48 w-full object-cover md:w-48"
                    src="<?php echo base_url('images/user/' . $user->image) ?>" alt="User Image">
            </div>
            <div class="p-8">
                <h2 class="text-2xl font-semibold text-indigo-500 mb-4">Informasi Pribadi</h2>
                <p class="text-gray-500"><strong>Username:</strong> <?php echo $user->username; ?></p>
                <p class="text-gray-500"><strong>Email:</strong> <?php echo $user->email; ?></p>
                <p class="text-gray-500"><strong>Tingkatan:</strong> <?php echo $user->tingkatan; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div> -->
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
</body>

</html>