<?php
$error_password = $this->session->flashdata('error_password');
$error_email = $this->session->flashdata('error_email');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register page</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <?php $this->load->view('style/css') ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png');?>" />

</head>

<body class="min-h-screen bg-white-200 flex items-center justify-center">

    <div class="bg-blue-200 p-5 md:p-10 rounded-2xl shadow-lg max-w-3xl w-full">
        <div class="container mx-auto flex items-center justify-center">
            <img src="<?php echo base_url('davina/logo-tipis.png'); ?>" alt="Logo" width="150px">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 mt-12 gap-4">
            <div>

                <h2 class="text-2xl font-bold text-[#002D74]">Register</h2>
                <form class="mt-6" action="<?php echo base_url(); ?>auth/aksi_register" method="post">
                    <div class="mb-4">
                        <label class="block text-black-700"> Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan Alamat Email"
                            class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                            autofocus autocomplete required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-black-700">Username</label>
                        <input type="text" name="username" id="username" placeholder="Masukkan Username"
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
                        <p>*Password minimal 8 karakter</p>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Register</button>
                </form>
                <p class="mt-4">Sudah punya akun? <a href="<?php echo base_url(); ?>auth" class="text-blue-700">Login
                        sekarang</a></p>
            </div>

            <div class="hidden md:flex items-center">
                <img src="https://cdn.pixabay.com/photo/2016/02/18/16/09/books-1207435_1280.jpg"
                    class="rounded-2xl w-full" alt="Gambar halaman">
            </div>
        </div>
    </div>
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
    <script>
    var error_email = "<?php echo $error_email; ?>";
    if (error_email) {
        Swal.fire({
            icon: 'error',
            title: 'Kesalahan!!',
            text: "Alamat email sudah terdaftar!!",
            showConfirmButton: false,
            timer: 2000
        });
    }

    var error_password = "<?php echo $error_password; ?>";
    if (error_password) {
        Swal.fire({
            icon: 'error',
            title: 'Kesalahan!!',
            text: "Password harus memiliki minimal 8 karakter!!",
            showConfirmButton: false,
            timer: 2000
        });
    }
    </script>
</body>

</html>