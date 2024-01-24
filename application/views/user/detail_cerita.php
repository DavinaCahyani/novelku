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
        z-index: 1000;
        /* Sesuaikan dengan kebutuhan, pastikan lebih besar dari konten utama */
    }

    .content-container {
        margin-top: 60px;
        /* Sesuaikan dengan tinggi navbar untuk menghindari tumpang tindih */
    }
    </style>
</head>

<body class="bg-[#e5e7eb] font-web">

    <div class="all flex justify-center">
        <div class="max-w-[425px]">
            <nav class="bg-blue-500 p-4 w-[425px] rounded-b-xl">
                <div class="container mx-auto flex items-center justify-between">
                    <img src="<?php echo base_url('davina/logo-tipis.png'); ?>" alt="Logo" width="150px">
                    <div class="space-x-4">
                        <a href="<?php echo base_url(); ?>" class="text-white">Beranda</a>
                    </div>
                </div>
            </nav>

            <div class="max-w-full w-full flex justify-center content-container">
                <div class="card bg-white shadow-xl rounded-xl w-[425px] my-5 py-5">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="w-full md:w-full">
                            <img class="h-auto mx-auto max-h-96 rounded-lg"
                                src="<?php echo base_url('images/cerita/' . $novel->image) ?>" alt="Gambar Buku">
                        </div>
                        <div class="content px-4 mt-5">
                            <div class="judul grid grid-cols-12">
                                <div class="col-span-3 text-xl font-bold">
                                    Judul
                                </div>
                                <div class="col-span-1 text-xl">
                                    :
                                </div>
                                <div class="col-span-8 text-md pt-1">
                                    <?php echo $novel->judul ?>
                                </div>
                            </div>
                            <div class="penulis grid grid-cols-12">
                                <div class="col-span-3 text-xl font-bold">
                                    Penulis
                                </div>
                                <div class="col-span-1 text-xl">
                                    :
                                </div>
                                <div class="col-span-8 text-md pt-1">
                                    <?php echo $novel->penulis ?>
                                </div>
                            </div>
                            <div class="card mt-8">
                                <div class="font-bold text-xl mb-2 text-center">Cerita</div>
                                <p class="text-gray-700 text-base overflow-y-auto max-h-80">
                                    <?php echo $novel->isi_cerita ?>
                                </p>
                            </div>
                            <div class="komentar mt-8">
                                <div class="judul-komentar font-bold text-xl text-center">
                                    Komentar
                                </div>
                                <div class="input-komentar mt-5">
                                    <form action="<?php echo base_url('user/komentar') ?>" method="post"
                                        enctype="multipart/form-data">
                                        <div class="relative">
                                            <input type="hidden" value="<?php echo $novel->id_novel ?>" name="id_novel">
                                            <input
                                                class="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                name="komentar" id="komentar" type="text" placeholder="Tulis Komentar">
                                            <button
                                                class="absolute right-0 top-0 mt-2 mr-4 cursor-pointer text-gray-600 hover:text-gray-900"
                                                type="submit">
                                                <i class="fa-solid fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="user-komentar mt-5">
                                    <?php foreach ($komentar as $komen) : ?>
                                    <div class="grid grid-cols-5 mt-3">
                                        <div class="profile col-span-1">
                                            <?php $imageSrc = tampil_image($komen->id_user); ?>
                                            <img src="<?php echo base_url('images/user/' . $imageSrc); ?>" alt=""
                                                width="50" class="rounded-full">
                                        </div>
                                        <div class="text-komentar col-span-4">
                                            <div class="user-info grid grid-cols-2">
                                                <div class="username-user font-bold text-lg">
                                                    <?php echo tampil_username($komen->id_user) ?>
                                                </div>
                                                <div class="tanggal-komentar text-xs ml-auto">
                                                    <?php echo date('d-m-Y H:i', strtotime($komen->tanggal . ' ' . $komen->jam)); ?>
                                                </div>
                                            </div>
                                            <div class="komentar-user text-sm">
                                                <?php echo $komen->komentar ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>