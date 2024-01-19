<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <?php $this->load->view('style/css') ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png');?>" />
    <style>
    /* Tambahkan gaya CSS berikut untuk membuat navbar tetap di bagian atas halaman */
    nav {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        /* Sesuaikan dengan kebutuhan, pastikan lebih besar dari konten utama */
    }

    .content-container {
        margin-top: 60px;
        /* Sesuaikan dengan tinggi navbar untuk menghindari tumpang tindih */
    }
    </style>
</head>

<body class="bg-gray-100">

    <div class="all">
        <nav class="bg-blue-500 p-4">
            <div class="container mx-auto flex items-center justify-between">
                <img src="<?php echo base_url('davina/logo-tipis.png'); ?>" alt="Logo" width="150px">
                <div class="space-x-4">
                    <a href="<?php echo base_url(); ?>user/cerita" class="text-white">Beranda</a>
                    <a href="<?php echo base_url(); ?>user/profile" class="text-white">Profil</a>
                    <a href="<?php echo base_url(); ?>auth" class="text-white">Keluar</a>
                </div>
            </div>
        </nav>
        <!-- Welcome Section -->
        <div class="welcome-page min-h-screen bg-blue-500 flex items-center justify-center p-4">
            <div class="text-center text-white">
                <h1 class="text-xl md:text-5xl font-bold mb-2 md:mb-4">Selamat Datang di Aplikasi Novel Kami</h1>
                <p class="text-sm md:text-lg mb-4">Temukan dunia cerita di ujung jari Anda. Telusuri novel-novel menarik
                    dan jelajahi petualangan baru dengan aplikasi novel kami.</p>
                <a href="<?php echo base_url(); ?>user/cerita"
                    class="inline-block bg-white text-blue-500 py-2 px-4 md:py-2 md:px-6 rounded-full transition duration-300 hover:bg-blue-400 hover:text-white">Mulai</a>
            </div>
        </div>

        <div class="bg-white p-4 md:p-16 md:flex-row shadow-lg max-w-full w-full">
            <div class="mb-8 mx-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php
                        $counter = 0;
                        foreach ($cerita as $novel) :
                            if ($novel->status == 'disetujui' && $counter < 4) :
                     ?>
                    <!-- Buku -->
                    <div class="card w-full md:w-full flex justify-center">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-slate-50">
                            <img class="w-full h-auto mx-auto max-h-48 rounded-lg"
                                src="<?php echo base_url('images/cerita/' . $novel->image) ?>" alt="Gambar Buku">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2"><?php echo $novel->judul ?></div>
                                <p class="text-gray-700 text-base">
                                    <?php echo $novel->penulis ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                            $counter++;
                        endif;
                    endforeach;
                     ?>
                </div>
            </div>

            <a href="<?php echo base_url('user/cerita'); ?>"
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