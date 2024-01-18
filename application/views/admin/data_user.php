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
                    <h1 class="text-2xl font-bold text-white ml-4 md:ml-0">Data User
                    </h1>
                </div>
            </nav>

            <div class="overflow-x-auto p-5 m-5 shadow-xl rounded-xl">
                <p class="text-2xl font-bold text-black">
                    Data User
                </p>
                <table class="min-w-full bg-white rounded-md p-6 border border-gray-300 mt-3">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-black">No</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Username</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Email</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Tingkatan</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; foreach($auth as $row): $no++?>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-black text-center"><?php echo $no ?></td>
                            <td class="border border-gray-300 px-4 py-2 text-black text-center">
                                <?php echo $row->username ?>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-black text-center">
                                <?php echo $row->email ?></td>
                            <td class="border border-gray-300 px-4 py-2 text-black text-center">
                                <?php echo $row->tingkatan ?>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-black text-center">
                                <button onClick="hapus(<?php echo $row->id ?>)"
                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-600 border border-red-700 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
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
    </script>

    <script>
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
                    window.location.href = "<?php echo base_url('admin/hapus_user/')?>" + id;
                });
            }
        });
    }
    </script>
</body>

</html>