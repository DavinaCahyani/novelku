<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Cerita</title>
    <?php $this->load->view('style/css') ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png'); ?>" />
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

<body class="bg-white">

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

        <div class="bg-white p-4 md:p-16 md:flex-row shadow-lg max-w-full w-full content-container">
            <!-- Isi konten halaman -->
            <div class="mb-8 mx-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php foreach ($cerita as $novel) : ?>
                    <?php if ($novel->status == 'disetujui') : ?>
                    <!-- Buku 1 -->
                    <a href="<?php echo base_url('user/detail_cerita/' . $novel->id_novel); ?>"
                        class="max-w-sm rounded overflow-hidden shadow-lg bg-slate-50">
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
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>