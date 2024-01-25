<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Cerita</title>
    <?php $this->load->view('style/css'); ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png'); ?>" />
    <style>
    nav {
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        /* Ensure the navbar is on top of other elements */
    }

    /* Add some padding to the body to avoid content being hidden behind the fixed navbar */
    body {
        padding-top: 50px;
        /* Adjust this value based on your navbar's height */
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

    <div class="p-3">
        <div class="grid grid-cols-1 gap-5">
            <div class="p-8 rounded-lg bg-white">
                <h2 class="text-3xl font-bold text-indigo-600 mb-6">Ubah Cerita</h2>
                <form action="<?php echo base_url('user/aksi_ubah_novel') ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id_novel" value="<?php echo $cerita_novel->id_novel ?>">
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="foto">
                            Foto
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="foto" id="foto" type="file">
                        <div class="mb-3 col-md-12 font-bold mt-4 text-sm">
                            <h5>Preview Image : </h5>
                        </div>
                        <div class="mb-3 col-md-12 image-container">
                            <div id="preview-container">
                                <img class="rounded-circle"
                                    src="<?php echo base_url('images/user/'.$cerita_novel->image) ?>" id="preview-image"
                                    width="150" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="penulis">
                            Penulis
                        </label>
                        <input value="<?php echo $cerita_novel->penulis; ?>"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="penulis" id="penulis" type="text" placeholder="Nama penulis">
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                            Judul Cerita
                        </label>
                        <input value="<?php echo $cerita_novel->judul; ?>"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="judul" id="judul" type="text" placeholder="Judul Cerita">
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="isi_cerita">
                            Isi Cerita
                        </label>

                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="isi_cerita" id="isi_cerita" rows="5"
                            placeholder="Isi Cerita"><?php echo $cerita_novel->isi_cerita; ?></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-5 py-3 mt-6">Ubah
                        Cerita</button>
                </form>
            </div>
        </div>
    </div>

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

</body>

</html>