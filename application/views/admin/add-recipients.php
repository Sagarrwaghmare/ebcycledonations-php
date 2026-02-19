<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Recipient</title>
    <!-- Tailwind CSS -->
</head>

<body class="m-0 p-0 font-sans min-h-screen flex justify-center items-center bg-gradient-to-b from-[#87CEEB] via-[#e0f7fa] to-[#556B2F]">

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
    $userId = $data["userId"];
    $user_name = 'Supporter';

    $pageTitle = 'Recipient >> Add';
    $btnText = 'Add Recipient';
    $btnColor = 'bg-[#FF8C00] hover:bg-orange-600'; // Orange for Add

    // Check data provided in the prompt
    if (isset($data)) {
        if (isset($data['create']) && $data['create'] === false) {
            $isCreate = false;
            $pageTitle = 'Recipient >> Edit';
            $btnText = 'Update Recipient';
            $btnColor = 'bg-[#4682B4] hover:bg-sky-700'; // Blue for Update

            // Extract values if available
            // Note: The array key in your dump is 'supporter', containing recipient data
            if (isset($data['recipient']) && !empty($data['recipient'][0])) {
                $rec = $data['recipient'][0];
                $recipientId = $rec['id'] ?? '';
                $studentName = $rec['studentName'] ?? '';
                $schoolName = $rec['schoolName'] ?? '';
                $standard = $rec['standard'] ?? '';
                $location = $rec['location'] ?? '';
                $photoUrl = $rec['photoUrl'] ?? '';
            }
            if (isset($data['user_info']) && !empty($data['user_info'][0])) {
                $user_name = $data['user_info'][0]['name'];
            }
        }
    }
    ?>

    <!-- Main Container -->
    <div class="bg-white w-[90%] max-w-[900px] p-10 rounded-lg shadow-2xl border-t-8 border-[#FF8C00] my-10">

        <!-- Header -->
        <div class="mb-8 border-b-2 border-gray-100 pb-4">
            <h2 class="text-[#2E8B57] m-0 text-3xl font-bold"><?php echo $pageTitle; ?></h2>
            <h3 class="text-gray-600 mt-2 text-lg font-normal">
                Supporter: <span class="text-[#FF8C00] font-bold"><?php echo $user_name; ?></span>
            </h3>
        </div>

        <!-- <form action="<?php echo base_url("admin/add_update_recipient/" . $recipientId); ?>" method="POST" enctype="multipart/form-data"> -->
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
                    <input
                        type="text"
                        id="studentName"
                        name="studentName"
                        value="<?php echo htmlspecialchars($studentName); ?>"
                        placeholder="e.g. Priya Mahadik"
                        class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700">
                </div>

                <!-- School -->
                <div class="mb-5">
                    <label for="schoolName" class="block mb-2 text-gray-800 font-bold">School</label>
                    <input
                        type="text"
                        id="schoolName"
                        name="schoolName"
                        value="<?php echo htmlspecialchars($schoolName); ?>"
                        placeholder="e.g. Saraswati School"
                        class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700">
                </div>

                <!-- Standard -->
                <div class="mb-5">
                    <label for="standard" class="block mb-2 text-gray-800 font-bold">Standard</label>
                    <input
                        type="text"
                        id="standard"
                        name="standard"
                        value="<?php echo htmlspecialchars($standard); ?>"
                        placeholder="e.g. 8th"
                        class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700">
                </div>

                <!-- Location -->
                <div class="mb-5">
                    <label for="location" class="block mb-2 text-gray-800 font-bold">Location</label>
                    <input
                        type="text"
                        id="location"
                        name="location"
                        value="<?php echo htmlspecialchars($location); ?>"
                        placeholder="Map coordinates or Address"
                        class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700">
                </div>

                <div class="mb-5 hidden">
                    <label for="userId" class="block mb-2 text-gray-800 font-bold">User Id</label>
                    <input
                        type="number"
                        id="userId"
                        name="userId"
                        value="<?php echo htmlspecialchars($userId); ?>"
                        placeholder="Map coordinates or Address"
                        class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700">
                </div>

                <!-- <div class="mb-5  hidden">
                        <label for="photoUrl" class="block mb-2 text-gray-800 font-bold">Photo Url</label>
                        <input 
                            type="text" 
                            id="photoUrl" 
                            name="photoUrl" 
                            value="<?php echo "example3.jpg"; ?>"
                            placeholder="Map coordinates or Address" 
                            class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700"
                        >
                    </div> -->

                <!-- Action Button -->
                <div class="mt-8 pt-6 border-t border-gray-100 flex gap-4">
                    <button
                        type="submit"
                        class="w-full sm:w-auto px-8 py-3 <?php echo $btnColor; ?> text-white rounded font-bold shadow-md transition cursor-pointer">
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
                    <img id="photoPreview"
                        src="<?php echo $photoUrl ? base_url('assets/images/' . $photoUrl) : ''; ?>"
                        alt="Preview"
                        class="w-full h-full object-cover <?php echo $photoUrl ? 'block' : 'hidden'; ?>">

                    <!-- Placeholder Text (Shown if no image) -->
                    <div id="placeholderText" class="text-[#5F9EA0] text-sm font-medium <?php echo $photoUrl ? 'hidden' : 'block'; ?>">
                        No Image Selected
                    </div>
                </div>

                <!-- File Input -->
                <div class="w-full text-center">
                    <label for="photo" class="cursor-pointer inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition text-sm font-bold">
                        Choose Photo
                    </label>
                    <input
                        type="file"
                        id="photo"
                        name="photo"
                        accept="image/*"
                        class="hidden"
                        onchange="previewImage(this)">
                    <p id="fileName" class="text-xs text-gray-500 mt-2 truncate">Max size: 2MB</p>
                    <p id="fileName" class="text-xs text-gray-500 mt-2 truncate">File Type: PNG, JPG</p>
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

                reader.onload = function(e) {
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