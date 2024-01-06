<!DOCTYPE html>
<html lang="en">

<head>
    <title> Login page</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php $this->load->view('style/css') ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png');?>" />

</head>

<body class="min-h-screen bg-white-200 flex items-center justify-center">

    <div class="bg-blue-200 p-5 md:p-10  rounded-2xl shadow-lg max-w-3xl w-full">
        <div class="container mx-auto flex items-center justify-center">
            <img src="<?php echo base_url('davina/logo-tipis.png'); ?>" alt="Logo" width="150px">
        </div>
        <div class="flex flex-col-reverse md:flex-row">
            <div class="md:w-1/2 md:px-5">
                <h2 class="text-2xl font-bold text-[#002D74]">Login</h2>
                <form class="mt-6" action="<?php echo base_url(); ?>auth/aksi_login" method="post">
                    <div class="mb-4">
                        <label class="block text-black-700"> Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan Alamat Email"
                            class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                            autofocus autocomplete required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-black-700">Kata Sandi</label>
                        <input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi"
                            minlength="8" class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-blue-500
            focus:bg-white focus:outline-none" required>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Masuk</button>
                </form>
                <p class="mt-4">Belum punya akun? <a href="<?php echo base_url(); ?>auth/register"
                        class="text-blue-700">Daftar sekarang</a></p>
            </div>

            <div class="w-full md:w-1/2 mt-10 hidden md:block">
                <img src="https://cdn.pixabay.com/photo/2016/02/18/16/09/books-1207435_1280.jpg"
                    class="rounded-2xl w-full" alt="">
            </div>
        </div>
    </div>

</body>

</html>