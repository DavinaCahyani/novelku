<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Cerita</title>
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

    /* Gaya responsif untuk mode ponsel */
    @media screen and (max-width: 768px) {
        .bg-white {
            padding: 2rem;
        }

        .card {
            width: 100%;
        }
    }
    </style>
</head>

<body class="bg-gray-100">

    <div class="all">
        <nav class="bg-blue-500 p-4">
            <div class="container mx-auto flex items-center justify-between">
                <img src="<?php echo base_url('davina/logo-tipis.png'); ?>" alt="Logo" width="150px">
                <div class="space-x-4">
                    <a href="<?php echo base_url(); ?>admin/daftar_novel" class="text-white">Back</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="bg-white p-4 md:p-16 md:flex-row shadow-lg max-w-full w-full content-container">
        <div class="mb-8 mx-4">
            <div class="grid grid-cols-1 gap-4">
                <div class="w-full md:w-full">
                    <img class="h-auto mx-auto max-h-96 rounded-lg"
                        src="<?php echo base_url('images/cerita/' . $novel->image) ?>" alt="Gambar Buku">
                </div>
                <div class="card w-full md:w-full">
                    <div class="px-6 py-4 text-center">
                        <div class="font-bold text-xl mb-2"><?php echo $novel->judul ?></div>
                        <p class="text-gray-700 text-base">
                            <?php echo $novel->penulis ?>
                        </p>
                    </div>
                </div>
                <div class="card w-full md:w-full">
                    <div class="px-6 py-4 text-center">
                        <div class="font-bold text-xl mb-2">Cerita</div>
                        <p class="text-gray-700 text-base overflow-y-auto max-h-80">
                            <?php echo $novel->isi_cerita ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>