<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Recipient</title> 
</head>

<body class="m-0 p-0 font-sans min-h-screen flex flex-col items-center bg-gradient-to-b from-[#87CEEB] via-[#e0f7fa] to-[#556B2F]">

    <?php
    // --- LOGIC BLOCK ---
    
    // Default values (Create Mode)
    $isCreate = true;
    $recipientId = '';
    $studentName = '';
    $schoolName = '';
    $standard = '';
    $location = '';
    $photoUrl = '';
    $userId = isset($data["userId"]) ? $data["userId"] : '';
    $user_name = 'Supporter';

    $pageTitle = 'Recipient >> Add';
    $pageDesc = 'Add a new recipient to the supporter record.';
    $btnText = 'Add Recipient';
    $btnColor = 'bg-[#FF8C00] hover:bg-orange-600'; // Orange for Add
    
    // Check data provided in the prompt
    if (isset($data)) {
        // Check for User Info (Supporter Name)
        if (isset($data['user_info']) && !empty($data['user_info'][0])) {
            $user_name = $data['user_info'][0]['name'];
        }

        if (isset($data['create']) && $data['create'] === false) {
            $isCreate = false;
            $pageTitle = 'Recipient >> Edit';
            $pageDesc = 'Modify details for the selected recipient.';
            $btnText = 'Update Recipient';
            $btnColor = 'bg-[#4682B4] hover:bg-sky-700'; // Blue for Update
    
            // Extract values if available
            if (isset($data['recipient']) && !empty($data['recipient'][0])) {
                $rec = $data['recipient'][0];
                $recipientId = $rec['id'] ?? '';
                $studentName = $rec['studentName'] ?? '';
                $schoolName = $rec['schoolName'] ?? '';
                $standard = $rec['standard'] ?? '';
                $location = $rec['location'] ?? '';
                $photoUrl = $rec['photoUrl'] ?? '';
            }
        }
    }
    ?>

    <!-- 1. Header Navbar -->
    <nav class="w-full bg-white shadow-md border-b-4 border-[#FF8C00] px-6 py-3 flex justify-between items-center sticky top-0 z-50">
        
        <!-- Left Side: Home Icon & Page Info -->
        <div class="flex items-center gap-4">
            <!-- Home Icon -->
            <a href="<?php echo base_url('admin'); ?>" class="text-[#2E8B57] hover:text-[#FF8C00] transition transform hover:scale-110" title="Go Home">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>

            <!-- Separator Line -->
            <div class="h-8 w-px bg-gray-300 mx-1"></div>

            <!-- Page Info (Dynamic Title) -->
            <div>
                <h1 class="text-[#2E8B57] m-0 text-xl font-bold leading-tight"><?php echo $pageTitle; ?></h1>
                <p class="text-gray-500 m-0 text-xs"><?php echo $pageDesc; ?></p>
            </div>
        </div>

        <!-- Right Side: Logout Button -->
        <div>
            <a href="<?php echo base_url('admin/logout'); ?>" class="flex items-center gap-2 px-4 py-2 bg-red-500 text-white text-sm font-bold rounded hover:bg-red-600 transition shadow-sm no-underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </a>
        </div>
    </nav>

    <!-- Main Container -->
    <!-- Removed border-t-8, added mt-8 -->
    <div class="bg-white w-[90%] max-w-[900px] p-10 rounded-lg shadow-2xl mt-8 mb-10">

        <!-- Header Context (Kept Supporter Name here for context) -->
        <div class="mb-8 border-b-2 border-gray-100 pb-4">
            <!-- Main Title moved to Navbar, Context kept here -->
            <h3 class="text-gray-600 mt-2 text-lg font-normal">
                Supporter: <span class="text-[#FF8C00] font-bold">
                    <a href="<?php echo base_url("admin/supporters");?>" class="no-underline hover:underline">
                        <?php echo $user_name; ?>
                    </a>
                </span>
            </h3>
        </div>

        <?php echo form_open_multipart("admin/add_update_recipient/" . $recipientId); ?>
        <!-- Hidden ID for Edit Mode -->
        <?php if (!$isCreate): ?>
            <input type="hidden" name="id" value="<?php echo $recipientId; ?>">
        <?php endif; ?>

        <!-- Content Wrapper (Flexbox for Side-by-Side layout) -->
        <div class="flex flex-col md:flex-row gap-10">

            <!-- LEFT COLUMN: Form Inputs -->
            <div class="flex-1 min-w-[300px]">

                <!-- Recipient Name -->
                <div class="mb-5">
                    <label for="studentName" class="block mb-2 text-gray-800 font-bold">Recipient Name</label>
                    <input type="text" id="studentName" name="studentName"
                        value="<?php echo htmlspecialchars($studentName); ?>" placeholder="e.g. Priya Mahadik"
                        class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700">
                </div>

                <!-- School -->
                <div class="mb-5">
                    <label for="schoolName" class="block mb-2 text-gray-800 font-bold">School</label>
                    <input type="text" id="schoolName" name="schoolName"
                        value="<?php echo htmlspecialchars($schoolName); ?>" placeholder="e.g. Saraswati School"
                        class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700">
                </div>

                <!-- Standard -->
                <div class="mb-5">
                    <label for="standard" class="block mb-2 text-gray-800 font-bold">Standard</label>
                    <input type="text" id="standard" name="standard" value="<?php echo htmlspecialchars($standard); ?>"
                        placeholder="e.g. 8th"
                        class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700">
                </div>

                <!-- Location -->
                <div class="mb-5">
                    <label for="location" class="block mb-2 text-gray-800 font-bold">Location</label>
                    <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($location); ?>"
                        placeholder="e.g 'Pune, India' or '18.545865, 73.833161' "
                        class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700">
                </div>

                <div class="mb-5 hidden">
                    <label for="userId" class="block mb-2 text-gray-800 font-bold">User Id</label>
                    <input type="number" id="userId" name="userId" value="<?php echo htmlspecialchars($userId); ?>"
                        class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700">
                </div>

                <!-- Action Button -->
                <div class="mt-8 pt-6 border-t border-gray-100 flex gap-4">
                    <button type="submit"
                        class="w-full sm:w-auto px-8 py-3 <?php echo $btnColor; ?> text-white rounded font-bold shadow-md transition cursor-pointer border-none">
                        <?php echo $btnText; ?>
                    </button>
                </div>

            </div>

            <!-- RIGHT COLUMN: Photo Upload & Preview -->
            <div class="w-full md:w-[250px] flex flex-col items-center justify-start md:border-l md:border-gray-100 md:pl-8">

                <label class="text-gray-800 font-bold text-lg mb-4">Recipient Photo</label>

                <!-- Preview Box -->
                <div class="w-[180px] h-[180px] border-2 border-dashed border-[#87CEEB] bg-[#f0f8ff] rounded-lg flex items-center justify-center mb-6 overflow-hidden relative">

                    <!-- Image Element (Hidden if no src, or shows current photo) -->
                    <img id="photoPreview" src="<?php echo $photoUrl ? base_url('assets/images/' . $photoUrl) : ''; ?>"
                        alt="Preview" class="w-full h-full object-cover <?php echo $photoUrl ? 'block' : 'hidden'; ?>">

                    <!-- Placeholder Text (Shown if no image) -->
                    <div id="placeholderText"
                        class="text-[#5F9EA0] text-sm font-medium <?php echo $photoUrl ? 'hidden' : 'block'; ?>">
                        No Image Selected
                    </div>
                </div>

                <!-- File Input -->
                <div class="w-full text-center">
                    <label for="photo"
                        class="cursor-pointer inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition text-sm font-bold">
                        Choose Photo
                    </label>
                    <input type="file" id="photo" name="photo" accept="image/*" class="hidden"
                        onchange="previewImage(this)">
                    <p class="text-xs text-gray-500 mt-2 truncate">Max size: 2MB</p>
                    <p id="fileName" class="text-xs text-gray-500 mt-2 truncate font-bold"></p>
                </div>

            </div>

        </div>
        </form>
    </div>

    <!-- Script to handle Image Preview -->
    <script>
        function previewImage(input) {
            const preview = document.getElementById('photoPreview');
            const placeholder = document.getElementById('placeholderText');
            const fileNameDisplay = document.getElementById('fileName');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }

                reader.readAsDataURL(input.files[0]);
                fileNameDisplay.textContent = input.files[0].name;
            }
        }
    </script>

</body>

</html>