<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <?php $this->load->view('style/css') ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png');?>" />

</head>

<body class="bg-gray-100">

    <div class="all">
        <header class="bg-blue-500">
            <div class="container mx-auto flex items-center justify-between p-4">
                <!-- Logo -->
                <img src="<?php echo base_url('davina/logo-tipis.png'); ?>" alt="Logo" width="150px">
            </div>
        </header>

        <!-- Welcome Section -->
        <div class="welcome-page min-h-screen bg-blue-500 flex items-center justify-center p-4">
            <div class="text-center text-white">
                <h1 class="text-xl md:text-5xl font-bold mb-2 md:mb-4">Selamat Datang di Aplikasi Novel Kami</h1>
                <p class="text-sm md:text-lg mb-4">Temukan dunia cerita di ujung jari Anda. Telusuri novel-novel menarik
                    dan jelajahi petualangan baru dengan aplikasi novel kami.</p>
                <a href="auth"
                    class="inline-block bg-white text-blue-500 py-2 px-4 md:py-2 md:px-6 rounded-full transition duration-300 hover:bg-blue-400 hover:text-white">Mulai</a>
            </div>
        </div>

        <!-- Featured Books Section -->
        <div class="bg-white p-4 md:p-16 md:flex-row shadow-lg max-w-full w-full">
            <div class="mb-8 mx-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Buku 1 -->
                <div class="card w-full md:w-full mb-4 md:mb-0 flex justify-center">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-slate-50">
                        <img class="w-full h-auto mx-auto mt-6 rounded-lg" src="" alt="Gambar Buku">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Judul buku 01</div>
                            <p class="text-gray-700 text-base">
                                Penulis: Penulis buku 01
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Buku 2 -->
                <div class="card w-full md:w-full mb-4 md:mb-0 flex justify-center">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-slate-50">
                        <img class="w-full h-auto mx-auto mt-6 rounded-lg" src="" alt="Gambar Buku">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Judul buku 02</div>
                            <p class="text-gray-700 text-base">
                                Penulis: Penulis buku 02
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Buku 3 -->
                <div class="card w-full md:w-full mb-4 md:mb-0 flex justify-center">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-slate-50">
                        <img class="w-full h-auto mx-auto mt-6 rounded-lg" src="" alt="Gambar Buku">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Judul buku 03</div>
                            <p class="text-gray-700 text-base">
                                Penulis: Penulis buku 03
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Buku 4 -->
                <div class="card w-full md:w-full mb-4 md:mb-0 flex justify-center">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-slate-50">
                        <img class="w-full h-auto mx-auto mt-6 rounded-lg" src="" alt="Gambar Buku">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Judul buku 04</div>
                            <p class="text-gray-700 text-base">
                                Penulis: Penulis buku 04
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <a href="#"
                class="inline-block bg-blue-500 text-white py-2 px-6 rounded-full transition duration-300 hover:bg-white hover:text-blue-500 border border-blue-500">Lihat
                Lebih Banyak</a>

        </div>

        <!-- Informasi Kontak dan Alamat -->
        <div class="bg-gray-200 p-4 md:p-16">
            <div class="container mx-auto">

                <div class="grid grid-cols-3">
                    <!-- Informasi Kontak -->
                    <div class="">
                        <h3 class="text-lg md:text-xl font-semibold mb-2">Informasi Kontak</h3>
                        <p>Email: davinacahyaniputri@gmail.com</p>
                        <p>Telepon: +62 895-3607-54764</p>
                    </div>

                    <!-- Alamat -->
                    <div class="">
                        <h3 class="text-lg md:text-xl font-semibold mb-2">Alamat</h3>
                        <p>Gg. Mondosari Tim. No.5, Mondosari, Batursari, Kec. Mranggen, Kabupaten Demak, Jawa Tengah
                            59567</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>