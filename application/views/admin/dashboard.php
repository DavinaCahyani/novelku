<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <?php $this->load->view('style/css') ?>
    <link rel="icon" type="image/jpeg" href="<?php echo base_url('davina/logooo.png');?>" />

</head>

<body class="font-sans bg-blue-50 text-blue-900">

    <!-- Sidebar -->
    <div class="flex h-screen bg-blue-500 text-white">

        <!-- Sidebar Content -->
        <div class="flex-shrink-0 w-64 bg-blue-500">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center h-16 bg-blue-500 border-b border-blue-700">
                    <div class="container mx-auto flex items-center justify-between p-4">
                        <!-- Logo -->
                        <img src="<?php echo base_url('davina/logo-tipis.png'); ?>" alt="Logo" width="150px">
                    </div>
                </div>
                <nav class="flex-1 overflow-y-auto">
                    <a href="#" class="flex items-center p-4 hover:bg-blue-700">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="#" class="flex items-center p-4 hover:bg-blue-700">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Novels
                    </a>
                    <!-- Add more links as needed -->
                </nav>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
            <div class="p-4">
                <h1 class="text-2xl font-bold mb-4 text-black">Welcome to Novel Admin Dashboard</h1>
                <!-- Add your novel-related content here -->
            </div>
        </div>
    </div>

</body>

</html>