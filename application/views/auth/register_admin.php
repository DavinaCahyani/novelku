<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register page</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="min-h-screen bg-gray-200 flex items-center justify-center">

    <div class="bg-white p-5 md:p-10 flex flex-col-reverse md:flex-row rounded-2xl shadow-lg max-w-3xl w-full">

        <div class="md:w-1/2 md:px-5">
            <h2 class="text-2xl font-bold text-[#002D74]">Register</h2>
            <form class="mt-6" action="<?php echo base_url(); ?>auth/aksi_register_admin" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700"> Email</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan Alamat Email"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        autofocus autocomplete required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Username</label>
                    <input type="text" name="username" id="username" placeholder="Masukkan Username"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        autofocus autocomplete required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi" minlength="8"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                        focus:bg-white focus:outline-none" required>
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Register</button>
            </form>
        </div>

        <div class="w-full md:w-1/2 mt-10 hidden md:block">
            <img src="https://cdn.pixabay.com/photo/2016/02/18/16/09/books-1207435_1280.jpg" class="rounded-2xl w-full"
                alt="Gambar halaman">
        </div>
    </div>

</body>

</html>