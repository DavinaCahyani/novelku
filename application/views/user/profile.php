<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <?php $this->load->view('style/css'); ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png'); ?>" />
    <!-- Tambahkan link Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
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

    <!-- Profile Content -->
    <div class="container mx-auto my-8 p-8 bg-white shadow-lg rounded-lg">
        <?php foreach ($auth as $user) : ?>
        <!-- Personal Information Card -->
        <div class="md:flex">
            <div class="md:flex-shrink-0">
                <img class="h-48 w-full object-cover md:w-48"
                    src="<?php echo base_url('images/user/' . $user->image) ?>" alt="User Image">
            </div>
            <div class="p-8">
                <h2 class="text-2xl font-semibold text-indigo-500 mb-4">Informasi Pribadi</h2>
                <p class="text-gray-500"><strong>Username:</strong> <?php echo $user->username; ?></p>
                <p class="text-gray-500"><strong>Email:</strong> <?php echo $user->email; ?></p>
                <p class="text-gray-500"><strong>Tingkatan:</strong> <?php echo $user->tingkatan; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</body>

</html>