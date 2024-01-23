<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <?php $this->load->view('style/css') ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png'); ?>" />
</head>

<body class="font-sans bg-blue-50 text-blue-900">

    <!-- Sidebar -->
    <div class="flex flex-col md:flex-row h-screen bg-blue-500 text-white">

        <!-- Sidebar Content -->
        <div class="md:w-64 bg-blue-500 flex flex-col">
            <div class="flex items-center justify-center md:h-16 bg-blue-500 border-b border-blue-700">
                <div class="container mx-auto flex items-center justify-between p-4">
                    <!-- Logo -->
                    <img src="<?php echo base_url('davina/logo-tipis.png'); ?>" alt="Logo" width="150px">
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto md:block hidden">
                <a href="<?php echo base_url('admin/dashboard')?>" class="flex items-center p-4 hover:bg-blue-700">
                    <i class="fas fa-tachometer-alt w-6 h-6 mr-2"></i>
                    Dashboard
                </a>
                <a href="<?php echo base_url('admin/daftar_novel')?>" class="flex items-center p-4 hover:bg-blue-700">
                    <i class="fas fa-book w-6 h-6 mr-2"></i>
                    Novels
                </a>
                <a href="<?php echo base_url('admin/data_user')?>" class="flex items-center p-4 hover:bg-blue-700">
                    <i class="fa-solid fa-user w-6 h-6 mr-2"></i>
                    Data User
                </a>
                <!-- Add more links as needed -->
            </nav>

            <!-- Logout Link (placed at the bottom) -->
            <a href="<?php echo base_url('auth') ?>" class="flex items-center p-4 hover:bg-blue-700 mt-auto">
                <i class="fas fa-sign-out-alt w-6 h-6 mr-2"></i>
                Logout
            </a>
        </div>

        <!-- Content -->
        <div class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
            <!-- Navbar -->
            <nav class="bg-blue-500 p-4">
                <div class="container mx-auto flex items-center justify-between">
                    <!-- Toggle Sidebar Button for Mobile -->
                    <button id="toggleSidebar" class="md:hidden">
                        <i class="fas fa-bars text-white"></i>
                    </button>
                    <!-- Navbar Brand -->
                    <h1 class="text-2xl font-bold text-white ml-4 md:ml-0">Daftar Novel
                    </h1>
                </div>
            </nav>

            <div class="overflow-x-auto p-5 m-5 shadow-xl rounded-xl">
                <p class="text-2xl font-bold text-black">
                    Daftar Novel
                </p>
                <table class="min-w-full bg-white rounded-md p-6 border border-gray-300 mt-3">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-black">No</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Username</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Judul</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Penulis</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; foreach($cerita as $row): $no++?>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-black text-center"><?php echo $no ?></td>
                            <td class="border border-gray-300 px-4 py-2 text-black text-center">
                                <?php echo tampil_username($row->id_user) ?>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-black text-center">
                                <?php echo $row->judul ?></td>
                            <td class="border border-gray-300 px-4 py-2 text-black text-center">
                                <?php echo $row->penulis ?>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-black justify-center flex gap-3">
                                <button onClick="hapus(<?php echo $row->id_novel ?>)"
                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-600 border border-red-700 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <!-- Tombol Setuju -->
                                <?php if ($row->status == 'disetujui' || $row->status == 'ditolak') : ?>
                                <button type="button" disabled
                                    class="cursor-no-drop inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-green-800 border border-green-800 rounded-md shadow-sm hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-800">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                                <?php else : ?>
                                <button onClick="disetujui(<?php echo $row->id_novel ?>, <?php echo $row->id_user ?>)"
                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-green-600 border border-green-700 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                                <?php endif; ?>

                                <!-- Tombol Tolak -->
                                <?php if ($row->status == 'ditolak' || $row->status == 'disetujui') : ?>
                                <button type="button" disabled
                                    class="cursor-no-drop inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-800 border border-red-800 rounded-md shadow-sm hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-800">
                                    <i class="fa-solid fa-times"></i>
                                </button>
                                <?php else : ?>
                                <button onClick="ditolak(<?php echo $row->id_novel ?>)"
                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-600 border border-red-700 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <i class="fa-solid fa-times"></i>
                                </button>
                                <?php endif; ?>
                                <!-- Tombol Detail -->
                                <a href="<?php echo base_url('admin/detail_cerita/') . $row->id_novel; ?>"
                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-500 border border-blue-600 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include FontAwesome and other dependencies if not already included -->
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>
    <script>
    // Toggle Sidebar for Mobile
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        var sidebar = document.querySelector('.md\\:block');
        sidebar.classList.toggle('hidden');
    });

    function hapus(id) {
        swal.fire({
            title: 'Yakin untuk menghapus data ini?',
            text: "Data ini akan terhapus permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Dihapus',
                    showConfirmButton: false,
                    timer: 1500,

                }).then(function() {
                    window.location.href = "<?php echo base_url('admin/hapus_cerita/')?>" + id;
                });
            }
        });
    }

    function disetujui(id_novel, id_user) {
        swal.fire({
            title: 'Yakin untuk menyetujui cerita ini?',
            text: "Cerita ini akan ditampilkan ke seluruh user",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya Setuju'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Disetujui',
                    showConfirmButton: false,
                    timer: 1500,

                }).then(function() {
                    window.location.href = "<?php echo base_url('admin/aksi_setuju/')?>" + id_novel +
                        "/" + id_user;
                });
            }
        });
    }

    function ditolak(id_novel) {
        swal.fire({
            title: 'Yakin untuk menolak cerita ini?',
            text: "Cerita ini tidak akan ditampilkan ke seluruh user",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya Tolak'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Cerita Ditolak',
                    showConfirmButton: false,
                    timer: 1500,

                }).then(function() {
                    window.location.href = "<?php echo base_url('admin/aksi_tolak/')?>" + id_novel;
                });
            }
        });
    }
    </script>
</body>

</html>