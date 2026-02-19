<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body class="m-0 p-0 font-sans h-screen flex justify-center items-center bg-gradient-to-b from-sky-400 via-cyan-100 to-green-900">

    <!-- Main Card Container -->
    <div class="bg-white w-full max-w-md p-10 rounded-lg shadow-2xl border-t-8 border-orange-500">
        
        <!-- Title -->
        <h2 class="text-center text-green-700 mt-0 mb-8 text-3xl">Admin Login</h2>

        <!-- Login Form -->
        <!-- <form action="#" method="POST"> -->
            <?php echo form_open('admin/login_submit');?>
            <!-- Username Field -->
            <div class="mb-5">
                <label for="username" class="block mb-2 text-gray-800 font-semibold">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username" class="w-full p-3 border border-sky-400 rounded-md box-border text-sm outline-none">
            </div>

            <!-- Password Field -->
            <div class="mb-8">
                <label for="password" class="block mb-2 text-gray-800 font-semibold">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" class="w-full p-3 border border-sky-400 rounded-md box-border text-sm outline-none">
            </div>
            
            <div class="mb-4 text-red-500 text-md">
                <p><?php echo $this->session->flashdata("error");?></p>
            </div>
            <!-- Buttons Area -->
            <div class="flex justify-between gap-4">
                
                <!-- Reset Button -->
                <button type="reset" class="flex-1 p-3 bg-cyan-600 text-white border-none rounded-md text-base cursor-pointer transition-opacity duration-300 hover:opacity-90">
                    Reset
                </button>

                <!-- Login Button -->
                <button type="submit" class="flex-1 p-3 bg-orange-500 text-white border-none rounded-md text-base font-bold cursor-pointer">
                    Login
                </button>
            </div>

        </form>
    </div>

</body>
</html>