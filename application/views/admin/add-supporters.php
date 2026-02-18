<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Supporter</title>
    <!-- Tailwind CSS -->
</head>

<body class="m-0 p-0 font-sans min-h-screen flex justify-center items-center bg-gradient-to-b from-[#87CEEB] via-[#e0f7fa] to-[#556B2F]">

    <?php
    // --- 1. LOGIC HANDLER ---
    
    // Default values (Create Mode)
    $isCreate = true;
    $supporterId = '';
    $supporterName = '';
    $photoUrl = '';
    $pageTitle = 'Add New Supporter';
    $btnText = 'Save Supporter';

    // Check if data exists and if we are in edit mode
    if (isset($data)) {
        // The boolean check
        if (isset($data['create']) && $data['create'] === false) {
            $isCreate = false;
            $pageTitle = 'Edit Supporter';
            $btnText = 'Update Supporter';

            // Extract supporter details if available
            if (isset($data['supporter']) && !empty($data['supporter'][0])) {
                $supp = $data['supporter'][0];
                $supporterId = $supp['id'] ?? '';
                $supporterName = $supp['name'] ?? '';
                $photoUrl = $supp['photoUrl'] ?? '';
            }
        }
    }
    ?>

    <!-- Main Card Container -->
    <div class="bg-white w-[90%] max-w-[900px] p-10 rounded-lg shadow-2xl border-t-8 border-[#FF8C00] my-10">

        <!-- Header -->
        <div class="mb-8 border-b-2 border-gray-100 pb-4">
            <h2 class="text-[#2E8B57] m-0 text-3xl font-bold"><?php echo $pageTitle; ?></h2>
            <p class="text-gray-600 mt-2 text-sm">Enter details below to generate a QR code for the supporter.</p>
        </div>

        <!-- Content Wrapper -->
        <div class="flex flex-col md:flex-row gap-10">

            <!-- LEFT COLUMN: Form Inputs -->
            <div class="flex-1 min-w-[300px]">
                <form action="<?php echo base_url('admin/add_update_supporter/'.$supporterId)?>" method="POST" enctype="multipart/form-data">
                    
                    <!-- Hidden ID field (Only needed for Edit) -->
                    <!-- <?php if(!$isCreate): ?> -->
                        <!-- <input type="hidden" name="id" value="<?php echo $supporterId; ?>"> -->
                    <!-- <?php endif; ?> -->

                    <!-- Supporter Name -->
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-gray-800 font-bold">Supporter Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="<?php echo htmlspecialchars($supporterName); ?>" 
                            placeholder="Enter full name" 
                            class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700 placeholder-gray-400"
                        >
                    </div>

                    <div class="mb-6 hidden">
                        <label for="photoUrl" class="block mb-2 text-gray-800 font-bold">Photo Name</label>
                        <input 
                            type="text" 
                            id="photoUrl" 
                            name="photoUrl" 
                            value="<?php echo "example1.jpg"; ?>" 
                            placeholder="Enter full name" 
                            class="w-full p-3 border border-[#87CEEB] rounded focus:outline-none focus:ring-2 focus:ring-[#2E8B57] text-gray-700 placeholder-gray-400"
                        >
                    </div>

                    <div class="mb-8">
                        <label for="photoUpload" class="block mb-2 text-gray-800 font-bold">Photo Upload</label>
                        
                        <?php if(!$isCreate && !empty($photoUrl)): ?>
                            <div class="mb-3 flex items-center gap-4">
                                <img src="<?php echo $photoUrl; ?>" alt="Current Photo" class="w-16 h-16 rounded-full object-cover border border-gray-300">
                                <span class="text-xs text-gray-500">Current Photo</span>
                            </div>
                        <?php endif; ?>

                        <div class="border-2 border-dashed border-[#87CEEB] bg-[#f0f8ff] p-6 text-center rounded-lg hover:bg-blue-50 transition cursor-pointer relative">
                            <input type="file" id="photoUpload" name="photoUpload" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="text-gray-500">
                                <p class="text-sm">Click to upload or drag image here</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 mt-8">
                        <!-- JS Trigger for QR -->
                        <button type="button" onclick="generateQR()" class="flex-1 py-3 px-4 bg-[#4682B4] text-white rounded font-bold hover:bg-[#36648b] transition">
                            Generate QR
                        </button>
                        <!-- Submit Form -->
                        <button type="submit" class="flex-1 py-3 px-4 bg-[#FF8C00] text-white rounded font-bold shadow-md hover:bg-orange-600 transition">
                            <?php echo $btnText; ?>
                        </button>
                    </div>

                </form>
            </div>

            <!-- RIGHT COLUMN: QR Display -->
            <div class="w-full md:w-[250px] flex flex-col items-center justify-start md:border-l md:border-gray-100 md:pl-8">
                
                <h3 class="text-gray-800 mt-0 text-xl font-bold mb-4">QR Preview</h3>
                
                <!-- QR Box -->
                <div class="w-[200px] h-[200px] bg-white border-2 border-[#2E8B57] rounded-lg flex items-center justify-center mb-6 shadow-lg">
                    <!-- Dynamic QR Code Image -->
                    <img id="qrImage" 
                         src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode($supporterName ?: 'Example'); ?>" 
                         alt="QR Code" 
                         class="w-[150px] h-[150px] opacity-90"
                    >
                </div>

                <!-- Download Button -->
                <button class="w-[200px] py-2.5 bg-white text-gray-700 border-2 border-gray-500 rounded font-bold hover:bg-gray-50 transition flex items-center justify-center gap-2">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    Download QR
                </button>

            </div>

        </div>
    </div>

    <!-- Simple Script to update QR on button click -->
    <script>
        function generateQR() {
            const name = document.getElementById('supporterName').value;
            const qrImage = document.getElementById('qrImage');
            if(name.trim() !== "") {
                qrImage.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(name)}`;
            } else {
                alert("Please enter a supporter name first.");
            }
        }
    </script>

</body>
</html>