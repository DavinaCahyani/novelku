<!DOCTYPE html>
<html lang="en">

<head>
    <title> Login page</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php $this->load->view('style/css') ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png'); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi"
                                class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-blue-500
                                focus:bg-white focus:outline-none" required>
                            <i class="far fa-eye-slash absolute top-1/2 right-4 transform -translate-y-1/2 text-black-400 cursor-pointer mt-1"
                                id="toggle-password"></i>
                        </div>
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

    <!-- Added jQuery for toggle password functionality -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#toggle-password').click(function() {
            var passwordField = $('#password');
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
</body>

</html>