<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <?php $this->load->view('style/css') ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png'); ?>" />
    <style>
    #navbar {
        position: fixed;
        width: 100%;
        z-index: 1000;
        background-color: #3498db;
        /* Adjust the background color */
        color: #fff;
        /* Adjust the text color */
    }
    </style>
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
            <nav id="navbar" class="bg-blue-500 p-4">
                <div class="container mx-auto flex items-center justify-between">
                    <!-- Toggle Sidebar Button for Mobile -->
                    <button id="toggleSidebar" class="md:hidden">
                        <i class="fas fa-bars text-white"></i>
                    </button>
                    <!-- Navbar Brand -->
                    <h1 class="text-2xl font-bold text-white ml-4 md:ml-0">Dashboard
                    </h1>
                </div>
            </nav>


            <!-- Konten Dashboard -->
            <div class="p-4 mt-16">
                <!-- Kartu-kartu -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Kartu 1: Jumlah Cerita -->
                    <div class="bg-gray-100 rounded-md p-6 shadow-md flex items-center">
                        <i class="fas fa-book fa-3x text-black mr-4"></i>
                        <div>
                            <h3 class="text-lg font-bold text-black mb-2"><?php echo $total_cerita_disetujui; ?></h3>
                            <p class="text-gray-700">Jumlah Cerita</p>
                        </div>
                    </div>

                    <!-- Kartu 2: Jumlah Pengguna -->
                    <div class="bg-gray-100 rounded-md p-6 shadow-md flex items-center">
                        <i class="fas fa-users fa-3x text-black mr-4"></i>
                        <div>
                            <h3 class="text-lg font-bold text-black mb-2"><?php echo $total_user; ?></h3>
                            <p class="text-gray-700">Jumlah Pengguna</p>
                        </div>
                    </div>

                    <!-- Kartu 3: Jumlah Kontributor -->
                    <div class="bg-gray-100 rounded-md p-6 shadow-md flex items-center">
                        <i class="fas fa-user-plus fa-3x text-black mr-4"></i>
                        <div>
                            <h3 class="text-lg font-bold text-black mb-2"><?php echo $total_kontributor; ?></h3>
                            <p class="text-gray-700">Jumlah Kontributor</p>
                        </div>
                    </div>

                    <!-- Kartu 4: Cerita Belum Dikonfirmasi -->
                    <div class="bg-gray-100 rounded-md p-6 shadow-md flex items-center">
                        <i class="fas fa-exclamation-circle fa-3x text-black mr-4"></i>
                        <div>
                            <h3 class="text-lg font-bold text-black mb-2"><?php echo $total_cerita_belum_disetujui; ?>
                            </h3>
                            <p class="text-gray-700">Cerita Belum Dikonfirmasi</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-2 gap-5 p-5 m-5 shadow-xl rounded-xl">
                <div class="rounded-lg shadow-xl p-4 md:p-6">
                    <p class="text-2xl font-bold text-black">
                        Cerita Per Minggu
                    </p>
                    <div id="grafik-perminggu" class="text-black">
                    </div>
                </div>

                <div class="rounded-lg shadow-xl p-4 md:p-6">
                    <p class="text-2xl font-bold text-black">
                        Cerita Per Bulan
                    </p>
                    <div id="grafik-perbulan" class="text-black"></div>
                </div>
            </div>

            <div class="overflow-x-auto p-5 m-5 shadow-xl rounded-xl">
                <p class="text-2xl font-bold text-black">
                    Daftar User
                </p>
                <table class="min-w-full bg-white rounded-md p-6 border border-gray-300 mt-3">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-black">No</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Username</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Email</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Tingkatan</th>
                            <!-- <th class="border border-gray-300 px-4 py-2 text-black">Aksi</th> -->
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
                            <!-- <td class="border border-gray-300 px-4 py-2 text-black text-center">
                                <button onClick="hapus(<?php echo $row->id ?>)"
                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-600 border border-red-700 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                    data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td> -->
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="overflow-x-auto p-5 m-5 shadow-xl rounded-xl">
                <p class="text-2xl font-bold text-black">
                    Daftar Cerita Belum Disetujui
                </p>
                <table class="min-w-full bg-white rounded-md p-6 border border-gray-300 mt-3">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-black">No</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Username</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Judul</th>
                            <th class="border border-gray-300 px-4 py-2 text-black">Penulis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; foreach($cerita_belum_disetujui as $row): $no++?>
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
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var navbar = document.getElementById("navbar");

        window.addEventListener("scroll", function() {
            if (window.scrollY > navbar.offsetTop) {
                navbar.classList.add("fixed");
            } else {
                navbar.classList.remove("fixed");
            }
        });
    });
    </script>

    <script>
    window.addEventListener("load", function() {
        // Assuming $grafik_perminggu is an array with dynamic data from your PHP controller
        const dynamicData = <?php echo json_encode($grafik_perminggu); ?>;

        const options = {
            colors: ["#1A56DB"],
            series: [{
                name: "Cerita yang diunggah",
                color: "#1A56DB",
                data: dynamicData,
            }, ],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
        }

        if (document.getElementById("grafik-perminggu") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("grafik-perminggu"), options);
            chart.render();
        }
    });
    </script>
    <script>
    window.addEventListener("load", function() {
        const options = {
            colors: ["#1A56DB", "#FDBA8C"],
            series: [{
                name: "Social media",
                color: "#FDBA8C",
                data: [{
                        x: "Mon",
                        y: 232
                    },
                    {
                        x: "Tue",
                        y: 113
                    },
                    {
                        x: "Wed",
                        y: 341
                    },
                    {
                        x: "Thu",
                        y: 224
                    },
                    {
                        x: "Fri",
                        y: 522
                    },
                    {
                        x: "Sat",
                        y: 411
                    },
                    {
                        x: "Sun",
                        y: 243
                    },
                ],
            }, ],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
        }

        if (document.getElementById("grafik-perbulan") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("grafik-perbulan"), options);
            chart.render();
        }
    });
    </script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>
    <script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        var sidebar = document.querySelector('.md\\:block');
        sidebar.classList.toggle('hidden');
    });
    </script>


</body>

</html>